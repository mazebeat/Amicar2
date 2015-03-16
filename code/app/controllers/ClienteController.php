<?php

use App\Util\MCrypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ClienteController extends ApiController
{
	function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array(
			'on' => array(
				'post',
				'put',
				'patch',
				'delete'
			)
		));
	}


	/**
	 * Display a listing of the resource.
	 * GET /cliente
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /cliente/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /cliente
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /cliente/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		$mcrypt = new MCrypt();
		$id     = $mcrypt->decrypt($id);

		try {
			$cliente = Cliente::find($id);

			if (isset($cliente)) {
				return View::make('landings.c1')->withCliente($cliente)->withCampana(Session::get('campana', 1));
			}
			else {
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
		if ($cliente->validate(Input::all())) {
			try {
				$cliente                 = Cliente::find($id);
				$cliente->nombreCliente  = Input::get('nombreCliente');
				$cliente->fonoCelular    = Input::get('fonoCelular');
				$cliente->fonoComercial  = Input::get('fonoComercial');
				$cliente->fonoParticular = Input::get('fonoParticular');
				$cliente->emailCliente   = Input::get('emailCliente');
				$cliente->save();

				$this->getLog()->warning("CLIENTE ACTUALIZADO: %s", array($cliente->idCliente));

				$message = array(
					'message'    => 'Cliente actualizado con exito',
					'ID Cliente' => $cliente->idCliente
				);

				Session::flush();

				return Redirect::to('thanks')->withMessages($message)->withInput(Input::except('_token'));

			} catch (Exception $e) {
				$this->getLog()->warning("ERROR: CLIENTE NO ENCONTRADO: %s", array($id));

				return Redirect::to(Config::get('api.company.url'));
			}
		}
		else {
			$mcrypt = new MCrypt();
			$id     = $mcrypt->encrypt($id);

			return Redirect::route('clientes.edit', array($id))->withErrors($cliente->errors())->withInput(Input::except('_token'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /cliente/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}