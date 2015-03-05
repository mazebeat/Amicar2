<?php
use App\Util\MCrypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

/**
 * Class ServletController
 */
class ServletController extends ApiController
{
	private $idCliente;
	private $idCotizacion;
	private $campana;

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return mixed
	 */
	public function readAmicar()
	{
		$this->getLog()->info("Lectura");
		$idCliente    = Input::get('cliente', null);
		$idCotizacion = Input::get('cotizacion', null);

		//		dd(Input::all());
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
				//				dd($process);
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

	/**
	 * @return mixed
	 */
	public function clickAmicar()
	{
		$this->getLog()->info("Click");
		$idCliente    = Input::get('cliente', null);
		$idCotizacion = Input::get('cotizacion', null);
		$campana      = Input::get('campana', null);

		//		dd(Input::all());
		$this->getLog()->info("Parametros de entrada: Cliente $idCliente - Cotizacion $idCotizacion");
		if (isset($idCliente) && isset($idCotizacion)) {
			$this->setIdCliente($idCliente);
			$this->setIdCotizacion($idCotizacion);
			$this->setCampana($campana);

			$this->getLog()->info("Actualizando registro click");
			$this->updateProcess('click');

			if (isset($campana)) {
				return Redirect::route('clientes.edit', array($idCliente))->withTemplate($campana);
			}

			return Redirect::route('clientes.edit', array($idCliente));
		}

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
}
