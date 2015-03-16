<?php

class Params
{
	private $idCliente;
	private $idCotizacion;
	private $campana;
	private $action;

	function __construct(array $inputs = array())
	{
		return $this->__construct2($inputs);
	}

	function __construct2(array $inputs = array())
	{
		$params = null;

		if (!is_array($inputs) && count($inputs) <= 0) {
			return $params;
		}

		if (!array_key_exists('cliente', $inputs) && !array_key_exists('cotizacion', $inputs)) {
			return $params;
		}

		$mcrypt = new App\Util\MCrypt();
		$this->setIdCliente(array_get($inputs, 'cliente', null));
		$this->setIdCotizacion(array_get($inputs, 'cotizacion', null));

		$c = array_get($inputs, 'campana', null);
		if (isset($c)) {
			$c = $mcrypt->decrypt($c);
		}
		else {
			$c = 1;
		}
		$this->setCampana($c);
		$a = array_get($inputs, 'action', null);
		if (isset($a)) {
			$a = $mcrypt->decrypt($a);
		}
		else {
			$a = '';
		}
		$this->setAction($a);


		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCampana()
	{
		return $this->campana;
	}

	/**
	 * @param mixed $campana
	 */
	public function setCampana($campana)
	{
		$this->campana = $campana;
	}

	/**
	 * @return mixed
	 */
	public function getAction()
	{
		return $this->action;
	}

	/**
	 * @param mixed $action
	 */
	public function setAction($action)
	{
		$this->action = $action;
	}

	public function validate()
	{
		$a = $this->getIdCliente();
		$b = $this->getIdCotizacion();

		if (!(isset($a) && isset($b))) {
			return false;
		}

		return true;
	}

	/**
	 * @return mixed
	 */
	public function getIdCliente()
	{
		return $this->idCliente;
	}

	/**
	 * @param mixed $idCliente
	 */
	public function setIdCliente($idCliente)
	{
		$this->idCliente = $idCliente;
	}

	/**
	 * @return mixed
	 */
	public function getIdCotizacion()
	{
		return $this->idCotizacion;
	}

	/**
	 * @param mixed $idCotizacion
	 */
	public function setIdCotizacion($idCotizacion)
	{
		$this->idCotizacion = $idCotizacion;
	}
}
