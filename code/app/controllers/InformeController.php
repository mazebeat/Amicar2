<?php

use Illuminate\Support\Facades\View;

/**
 * Class HomeController
 */
class InformeController extends ApiController
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
		return View::make('dashboard.informe.index');
	}
}
