<?php


use App\Util\MCrypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

/**
 * Class ClienteController
 */
class ClienteController extends ApiController
{

	function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /cliente/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		try {
			$mcrypt = new MCrypt();
			$bkp    = $id;
			$temp   = $mcrypt->decrypt($id);
			$temp   = explode('|', $temp);

			$id      = $mcrypt->decrypt($temp[0]);
			$campana = $temp[1];
			$proceso = $mcrypt->decrypt($temp[2]);


			$cliente = Cliente::find($id);

			if (isset($cliente) && !$cliente->isDesinscrito()) {
				return View::make('landings.c1')->withCliente($cliente)->withCampana($campana)->withProceso($proceso)->withId($bkp);
			}
			else {
				$this->getLog()->error("CLIENTE NO ENCONTRADO: " . $id);

				return Redirect::to(Config::get('api.company.url'));
			}
		} catch (Exception $e) {
			$this->getLog()->error($e);
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /cliente/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$cliente = new Cliente();
		$changes = false;

		try {
			if ($cliente->validate(Input::all())) {
				$cliente = Cliente::find($id);

				if ($cliente->nombreCliente != Input::get('nombreCliente')) {
					$cliente->nombreCliente = Input::get('nombreCliente');
					$changes                = true;
				}

				if ($cliente->fonoCelular != Input::get('fonoCelular')) {
					$cliente->fonoCelular = Input::get('fonoCelular');
					$changes              = true;
				}

				if ($cliente->fonoComercial != Input::get('fonoComercial')) {
					$cliente->fonoComercial = Input::get('fonoComercial');
					$changes                = true;
				}

				if ($cliente->fonoParticular != Input::get('fonoParticular')) {
					$cliente->fonoParticular = Input::get('fonoParticular');
					$changes                 = true;
				}

				if ($cliente->emailCliente != Input::get('emailCliente')) {
					$cliente->emailCliente = Input::get('emailCliente');
					$changes               = true;
				}

				if ($changes) {
					$cliente->save();

					$this->getLog()->warning("CLIENTE ACTUALIZADO: ID CLIENTE (%s)", array($cliente->idCliente));

					$message = array('message' => 'Cliente actualizado con exito', 'ID Cliente' => $cliente->idCliente);

					$idProceso = Input::get('proceso');
					ApiController::mailEjecutivo($idProceso);
				}
				else {
					$this->getLog()->warning("CLIENTE SIN CAMBIOS: ID CLIENTE (%s)", array($cliente->idCliente));
					$message = array('message' => 'Cliente actualizado con exito', 'ID Cliente' => $cliente->idCliente);
				}

				Session::flush();

				return Redirect::to('thanks')->withMessages($message)->withInput(Input::except('_token'));

			}
			else {
				return Redirect::route('clientes.edit', array(Input::get('id')))->withErrors($cliente->errors())->withInput(Input::except('_token'));
			}
		} catch (Exception $e) {
			$this->getLog()->warning("ERROR: CLIENTE NO ENCONTRADO: %s", array($id));

			Session::flush();

			return Redirect::to(Config::get('api.company.url'));
		}
	}
}