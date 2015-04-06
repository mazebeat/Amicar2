<?php namespace App\Util;

use Illuminate\Support\Facades\Config;

/**
 * HOW TO USE?
 * $mcrypt = new App\Util\MCrypt();
 *
 * $encrypted = $mcrypt->encrypt("1369");
 * var_dump($encrypted);
 *
 * #Decrypt
 * $decrypted = $mcrypt->decrypt("eeae04e6afb437c7e713045cc675b5ac");
 * var_dump($decrypted);
 *
 * Class MCrypt
 *
 * @package App\Util
 *
 */
class MCrypt
{
	private $iv;
	private $key;

	function __construct()
	{
		$this->key = Config::get('api.mcrypt.key'); // app/config/api.php -> Key
		$this->iv  = Config::get('api.mcrypt.iv'); // app/config/api.php -> initVector
	}

	/**
	 * @param $str
	 *
	 * @return string
	 */
	function encrypt($str)
	{
		$td = mcrypt_module_open('rijndael-128', '', 'cbc', $this->getIv());

		mcrypt_generic_init($td, $this->getKey(), $this->getIv());
		$encrypted = mcrypt_generic($td, $str);

		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);

		return bin2hex($encrypted);
	}

	/**
	 * @return mixed
	 */
	public function getIv()
	{
		return $this->iv;
	}

	/**
	 * @param mixed $iv
	 */
	public function setIv($iv)
	{
		$this->iv = $iv;
	}

	/**
	 * @return mixed
	 */
	public function getKey()
	{
		return $this->key;
	}

	/**
	 * @param mixed $key
	 */
	public function setKey($key)
	{
		$this->key = $key;
	}

	/**
	 * @param $code
	 *
	 * @return string
	 */
	function decrypt($code)
	{
		$code = $this->hex2bin($code);

		$td = mcrypt_module_open('rijndael-128', '', 'cbc', $this->getIv());

		mcrypt_generic_init($td, $this->getKey(), $this->getIv());
		$decrypted = mdecrypt_generic($td, $code);

		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);

		return utf8_encode(trim($decrypted));
	}

	/**
	 * @param $hexdata
	 *
	 * @return string
	 */
	protected function hex2bin($hexdata)
	{
		$bindata = '';

		for ($i = 0; $i < strlen($hexdata); $i += 2) {
			$bindata .= chr(hexdec(substr($hexdata, $i, 2)));
		}

		return $bindata;
	}

}