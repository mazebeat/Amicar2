<?php

use Illuminate\Support\Facades\View;

/**
 * Class AdminController
 */
class AdminController extends ApiController
{
	/**
	 *
	 */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return mixed
	 */
	public function adminUsuarios()
	{
		return View::make('dashboard.admin.users');
	}

	/**
	 * @return mixed
	 */
	public function adminCargaPlanes()
	{
		return View::make('dashboard.admin.loaddata');
	}
}
