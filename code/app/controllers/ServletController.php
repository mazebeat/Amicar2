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

		$this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
	}

	/**
	 * @return mixed
	 */
	public function clickAmicar()
	{
		$this->getLog()->info('INGRESANDO LANDING %s', array(__CLASS__));

		try {
			$params = new Params(Input::all());


			$this->getLog()->info('PARAMETROS DE ENTRADA: CLIENTE: %s COTIZACION: %s CAMPAÑA: %s', array($params->getIdCliente(), $params->getIdCotizacion(), $params->getCampana()));

			if ($params->validate()) {
				$action = $params->getAction();

				if (isset($action) && $action == 'removeSends') {
					return Redirect::to('bye')->withMessages('<h5>Su solicitud ha sido procesada.</h5><br><h3>Gracias!</h3>')->withAction($action)->withInput(Input::except('_token'));
				}

				$idCliente = $params->getIdCliente();
				$campana   = $params->getCampana();
				$idProceso = $params->getIdCotizacion();

				$mcrypt = new MCrypt();
				$id     = $idCliente . '|' . $campana . '|' . $idProceso;
				$id     = $mcrypt->encrypt($id);

				return Redirect::route('clientes.edit', array($id))->withInput(Input::except('_token'));
			}
			else {
				return Redirect::to(Config::get('api.company.url'));
			}
		} catch (Exception $e) {
			$this->getLog()->error($e);
		}
	}
}
