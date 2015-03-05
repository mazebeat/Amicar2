<?php
use App\Util\MCrypt;
use Illuminate\Support\Facades\Redirect;

class EjecutivoController extends ApiController
{

	/**
	 * Display a listing of the resource.
	 * GET /ejecutivo
	 *
	 * @return Response
	 */
	public function index()
	{
		$locales = Local::lists('nombreLocal', 'idLocal');

		return View::make('landings.e1')->withLocales($locales);
	}

	/**
	 * @return mixed
	 */
	public function success()
	{
		return View::make('landings.e2');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ejecutivo/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ejecutivo
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /ejecutivo/{id}
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
	 * GET /ejecutivo/{id}/edit
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
			$ejecutivo = Ejecutivo::find($id);
			if (isset($ejecutivo)) {
				$locales = Local::lists('nombreLocal', 'idLocal');

				return View::make('landings.e1')->withEjecutivo($ejecutivo)->withLocales($locales);
			}
			else {
				$this->getLog()->warning("No se econtró Ejecutivo: $id");

				return Redirect::to('http://www.amicar.cl');
			}
		} catch (Exception $e) {
			$this->getLog()->error($e);
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /ejecutivo/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$ejecutivo = new Ejecutivo();

		if ($ejecutivo->validate(Input::all())) {
			try {
				$ejecutivo                   = Ejecutivo::find($id);
				$ejecutivo->locales_idLocal1 = Input::get('locales_idLocal1');
				$ejecutivo->save();

				$message = array(
					'message'    => 'Cliente actualizado con exito',
					'ID Cliente' => $ejecutivo->idEjecutivo
				);

				return Redirect::to('ejecutivos')->withMessages($message);

			} catch (Exception $e) {
				$this->getLog()->error($e->getMessage());
				$error = array(
					"MESSAGE:" => $e->getMessage() . PHP_EOL,
					"LINE:"    => $e->getLine() . PHP_EOL,
					"FILE:"    => $e->getFile() . PHP_EOL
				);

				return Redirect::back()->withErrors($error)->withInput(Input::except('_token'));
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /ejecutivo/{id}
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