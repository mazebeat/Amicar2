<?php

use Illuminate\Support\Facades\View;

/**
 * Class HomeController
 */
class ConsultaController extends ApiController
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
	public function individual()
	{
		return View::make('dashboard.consulta.individual');
	}
}
