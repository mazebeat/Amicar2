<?php

use App\Util\MCrypt;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends ApiController
{
	function __construct()
	{
		parent::__construct();
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
		//		$id = Session::get('id');
		$mcrypt = new MCrypt();
		$id     = $mcrypt->decrypt($id);

		try {
			$cliente = Cliente::find($id);
			if (isset($cliente)) {
				return View::make('landings.c1')->withCliente($cliente)->withCampana(Session::get('campana', 'oferta'));
			}
			else {

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
				$cliente                = Cliente::find($id);
				$cliente->nombreCliente = Input::get('nombreCliente');
				$cliente->fonoCliente   = Input::get('fonoCliente');
				$cliente->emailCliente  = Input::get('emailCliente');
				$cliente->save();

				$message = array(
					'message'    => 'Cliente actualizado con exito',
					'ID Cliente' => $cliente->idCliente
				);

				return Redirect::to('clientes')->withMessages($message);

			} catch (Exception $e) {
				$this->getLog()->warning("No se econtró Cliente: $id");

				return Redirect::to('http://www.amicar.cl');
			}
		}
		else {
			return Redirect::to('clientes/' . $id . '/edit')->withErrors($cliente->errors())->withInput(Input::except('_token'));
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