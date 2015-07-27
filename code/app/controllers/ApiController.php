<?php

use App\Util\MessageLog;
use Illuminate\Support\Facades\Crypt;

/**
 * Class ApiController
 */
class ApiController extends BaseController
{
	private $token;
	private $data;
	private $status;
	private $headers;
	private $credentials;
	private $log;

	/**
	 * @param null  $token
	 * @param array $data
	 * @param int   $status
	 * @param array $headers
	 */
	public function __construct($token = null, $data = array(), $status = 200, $headers = array('ContentType' => 'application/json', 'charset' => 'utf-8'))
	{
		$this->token   = isset($token) ? $token : Crypt::encrypt(str_random(40));
		$this->data    = $data;
		$this->status  = $status;
		$this->headers = $headers;

		$this->log = new MessageLog('amicarCotizante-landing');
	}

	/**
	 * @param $idProceso
	 */
	public static function mailEjecutivo($idProceso)
	{
		try {
			$api = new \ApiController();

			$proceso = \Proceso::find($idProceso);
			$id      = $proceso->idProceso;

			$api->getLog()->info('VERIFICANDO MAIL EJECUTIVO');
			static::verifyMailEjecutivo($id);

			// fonoparticular
			if ($proceso->cliente->fonoParticular != '') {
				$fono = $proceso->cliente->fonoParticular;
			}
			else {
				$fono = 'NULL';
			}

			// fonocomercial
			if ($proceso->cliente->fonoComercial != '') {
				$fono2 = $proceso->cliente->fonoComercial;
			}
			else {
				$fono2 = 'NULL';
			}

			// fonocelular
			if ($proceso->cliente->fonoCelular != '') {
				$cel = $proceso->cliente->fonoCelular;
			}
			else {
				$cel = 'NULL';
			}

			$list = array(\Texto::$LLAVE_INICIO,
			              $proceso->ejecutivo->correoEjecutivo, // correoejecutivo
			              $proceso->cliente->rutCliente, // rutcliente
			              $proceso->ejecutivo->local->nombreLocal, // nombrelocal
			              $proceso->cliente->emailCliente, // emailCliente
			              $proceso->vendedor->nombreVendedor, // nombrevendedor
			              $proceso->fechaClickLink, // fechaclicklink
			              $proceso->cliente->nombreCliente, // nombrecliente
			              $proceso->cliente->marcaVehiculo, // marcavehiculo
			              $proceso->cliente->modeloVehiculo, // modelovehiculo
			              $proceso->cliente->valorVehiculo, // valorvehiculo
			              $fono, // telefonocliente_particular
			              $fono2, // telefonocliente_comecial
			              $cel, // celularcliente
			              $proceso->cliente->idBody, // bodyid
			);

			$line     = static::formatLine($list);
			$nameFile = 'Ejecutivos' . $id . '_' . static::milliseconds() . '.txt';
			$path     = \Config::get('config.params.salidamailejecutivo');
			$file     = $path . $nameFile;

			$api->getLog()->info('GENERANDO ARCHIVO EJECUTIVO');
			$bw = \File::put($file, $line);

			if ($bw === false) {
				$api->getLog()->error('ERROR AL GENERAR ARCHIVO EJECUTIVO');
			}

			$api->getLog()->info('ARCHIVO EJECUTIVO GENERADO');
		} catch (Exception $e) {
			$api->getLog()->error($e->getMessage() . ' //     ' . $e->getLine());
		}
	}

	/**
	 * @return \MessageLog
	 */
	public function getLog()
	{
		return $this->log;
	}

	/**
	 * @param \MessageLog $log
	 */
	public function setLog($log)
	{
		$this->log = $log;
	}

	/**
	 * @param int    $idProceso
	 * @param string $path
	 *
	 * @return bool
	 */
	public static function verifyMailEjecutivo($idProceso = 0, $path = '')
	{
		try {
			if ($path == '') {
				$path = \Config::get('config.params.salidamailejecutivo');
			}

			$api = new \ApiController();
			$api->getLog()->info('CARPETA EJECUTIVO: ' . $path);

			if (\File::exists($path)) {
				if (isset($idProceso) && $idProceso != 0) {
					$api->getLog()->info('VERIFICANDO PROCESO: ' . $idProceso);

					$nameFile = 'Ejecutivos' . $idProceso;
					$files    = File::files($path);

					foreach ($files as $key => $value) {
						$tempName = explode('_', $value);
						$tempName = str_replace('/', '', str_replace($path, '', $tempName));

						if (count($tempName) > 1 && $tempName[0] != '') {
							if ($nameFile === $tempName[0]) {
								$api->getLog()->info('ARCHIVO ' . $value . ' ELIMINADO');
								\File::delete($value);
							}
						}
					}
				}
				else {
					$api->getLog()->info('ERROR ID PROCESO: ' . $idProceso);
				}
			}
			else {
				$api->getLog()->warning('NO SE ENCUENTRA DIRECTORIO: ' . $path);
			}
		} catch (Exception $e) {
			$api->getLog()->error($e->getMessage() . ' || ' . $e->getLine());
		}
	}

	/**
	 * @param array $list
	 *
	 * @return string
	 */
	public static function formatLine(array $list)
	{
		$line = '';

		try {
			foreach ($list as $key => $value) {
				$line .= $value . '|';
			}
		} catch (Exception $e) {
			echo $e->getMessage() . ' // ' . $e->getLine();
		}

		return $line;
	}

	/**
	 * @return mixed
	 */
	public static function milliseconds()
	{
		$mt = explode(' ', microtime());

		return $mt[1] * 1000 + round($mt[0] * 1000);
	}

	/**
	 * @return array
	 */
	public function getCredentials()
	{
		return $this->credentials;
	}

	/**
	 * @param array $credentials
	 */
	public function setCredentials($credentials)
	{
		$this->credentials = $credentials;
	}

	/**
	 * @return null
	 */
	public function getToken()
	{
		return $this->token;
	}

	/**
	 * @param null $token
	 */
	public function setToken($token)
	{
		$this->token = $token;
	}

	/**
	 * @param null $data
	 * @param null $status
	 * @param null $headers
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function response($data = null, $status = null, $headers = null)
	{
		$data    = isset($data) ? $this->getData() : $data;
		$status  = isset($status) ? $this->getStatus() : $status;
		$headers = isset($headers) ? $this->getHeaders() : $headers;

		return Response::json($data, $status, $headers);
	}

	/**
	 * @return array
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * @param array $data
	 */
	public function setData($data)
	{
		$this->data = $data;
	}

	/**
	 * @return int
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * @param int $status
	 */
	public function setStatus($status)
	{
		$this->status = $status;
	}

	/**
	 * @return array
	 */
	public function getHeaders()
	{
		return $this->headers;
	}

	/**
	 * @param array $headers
	 */
	public function setHeaders($headers)
	{
		$this->headers = $headers;
	}

}
