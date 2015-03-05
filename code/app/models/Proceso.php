<?php

class Proceso extends Eloquent
{
	public    $timestamps = false;
	protected $table      = 'proceso';
	protected $fillable
	                      = array(
			'fechaEnvio',
			'fechaAperturaMail',
			'fechaClickLink',
			'clientes_idCliente',
			'ejecutivos_idEjecutivos',
			'vendedores_idVendedor'
		);
	protected $hidden     = array();
	protected $guarded
	                      = array(
			'idProceso'
		);
	protected $primaryKey = 'idProceso';
	protected $rules
	                      = array(
			'fechaEnvio'              => 'required',
			'fechaAperturaMail'       => 'required',
			'fechaClickLink'          => 'required',
			'clientes_idCliente'      => 'required',
			'ejecutivos_idEjecutivos' => 'required',
			'vendedores_idVendedor'   => 'required'
		);


	private $errors;

	public function validate($inputs)
	{
		$validator = Validator::make($inputs, $this->rules);

		if ($validator->fails()) {
			$this->errors = $validator;

			return false;
		}

		return true;
	}

	public function errors()
	{
		return $this->errors;
	}

//	public static function getProcess($idCliente, $idVendedor)
	public static function getProcess($cotizacion)
	{
		return Proceso::find($cotizacion);
//		return Proceso::where('clientes_idCliente', $idCliente)->where('vendedores_idVendedor', $idVendedor)->orderBy('idProceso', 'DESC')->first();
	}

}
