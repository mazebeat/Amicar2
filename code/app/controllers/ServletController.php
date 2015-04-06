<?php
use App\Util\MCrypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

/**
 * Class ServletController
 */
class ServletController extends ApiController
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
	 * @return mixed
	 */
	public function readAmicar()
	{
		$this->getLog()->info("Lectura");
		$idCliente    = Input::get('cliente', null);
		$idCotizacion = Input::get('cotizacion', null);
		$this->getLog()->info("Parametros de entrada: Cliente $idCliente - Cotizacion $idCotizacion");
		if (isset($idCliente) && isset($idCotizacion)) {
			$this->setIdCliente($idCliente);
			$this->setIdCotizacion($idCotizacion);
			$this->getLog()->info("Actualizando lectura");
			$this->updateProcess('read');
			$this->getLog()->info("Insertando imagen");
			header('Content-Type', 'image/png');
			$image = File::get(public_path() . '/images/blank.png');

			return $image;
		}
	}

	/**
	 * @param string $type
	 */
	public function updateProcess($type = 'read')
	{
		$this->getLog()->info("Update Fecha");
		$mcrypt       = new MCrypt();
		$idCliente    = $mcrypt->decrypt($this->getIdCliente());
		$idCotizacion = $mcrypt->decrypt($this->getIdCotizacion());
		//		dd($this);
		$this->getLog()->info("Actualizando registro para: Cliente $idCliente - Cotizacion $idCotizacion");
		if (isset($idCliente) && isset($idCotizacion)) {
			try {
				$process = Proceso::find($idCotizacion);
				if (isset($process)) {
					$this->getLog()->info("Proceso encontrado");
					if ($type == 'read' && $process->fechaAperturaMail == null) {
						$process->fechaAperturaMail = Carbon::now();
						$process->save();
						$this->getLog()->info("Fecha de lectura actualizada");
					}
					if ($type == 'click' && $process->fechaClickLink == null) {
						$process->fechaClickLink = Carbon::now();
						$process->save();
						$this->getLog()->info("Fecha click actualizada");
					}
					$this->getLog()->info("Registrando click Cliente $idCliente - Cotizacion $idCotizacion - Fecha: " . Carbon::now());
				}
			} catch (Exception $e) {
				$this->getLog()->error($e->getMessage());
			}
		}
		else {
			$this->getLog()->error("PARAMETROS INVALIDOS O NULOS");
		}
	}

	/**
	 * @return mixed
	 */
	public function clickAmicar()
	{
		$this->getLog()->info('INGRESANDO LANDING %s', array(__CLASS__));

		$params = new Params(Input::all());

		$this->getLog()->info('PARAMETROS DE ENTRADA: CLIENTE: %s COTIZACION: %s CAMPAÑA: %s', Input::all());

		if ($params->validate()) {
			$action = $params->getAction();

			if (isset($action) && $action == 'removeSends') {
				return Redirect::to('bye')->withMessages('<h5>Su solicitud ha sido procesada.</h5><br><h3>Gracias!</h3>')->with('action', $action)->withInput(Input::except('_token'));
			}

			$idCliente = $params->getIdCliente();
			$campana   = $params->getCampana();

			return Redirect::route('clientes.edit', array($idCliente))->withCampana($campana)->withAction('')->withInput(Input::except('_token'));
		}

		return Redirect::to(Config::get('api.company.url'));
	}

	public function clickAmicar2()
	{
		$this->getLog()->info("Click");
		$idCliente    = Input::get('cliente', null);
		$idCotizacion = Input::get('cotizacion', null);
		$campana      = Input::get('campana', null);
		$this->getLog()->info("Parametros de entrada: Cliente $idCliente - Cotizacion $idCotizacion");
		if (isset($idCliente) && isset($idCotizacion)) {
			$this->setIdCliente($idCliente);
			$this->setIdCotizacion($idCotizacion);
			$this->setCampana($campana);
			$this->getLog()->info("Actualizando registro click");
			$this->updateProcess('click');
			//  Con campaña
			if (isset($campana)) {
				return Redirect::route('clientes.edit', array($idCliente))->withTemplate($campana);
			}

			//  Sin campaña
			return Redirect::route('clientes.edit', array($idCliente));
		}
		if (Input::get('response') == 'nomore') {
			// do something to say thanks
		}

		return Redirect::to(Config::get('api.company.url'));
	}
}
