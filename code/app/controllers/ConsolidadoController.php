<?php

use Illuminate\Support\Facades\View;

/**
 * Class HomeController
 */
class ConsolidadoController extends ApiController
{
	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return mixed
	 */
	public function index()
	{
		return View::make('dashboard.consolidado.index');
	}

	/**
	 * @return mixed
	 */
	public function consolidadoIndividual()
	{
		return View::make('dashboard.consolidado.individual');
	}
}
