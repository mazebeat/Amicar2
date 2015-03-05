<?php

class Ejecutivo extends Eloquent
{
	public    $timestamps = false;
	protected $table      = 'ejecutivos';
	protected $fillable
	                      = array(
			'nombreEjecutivo',
			'correoEjecutivo',
			'locales_idLocal1',
			'fechaIngreso',
			'fechaModificacion',
		);
	protected $hidden     = array();
	protected $guarded
	                      = array(
			'idEjecutivo'
		);
	protected $primaryKey = 'idEjecutivo';
	protected $rules
	                      = array(
//			'nombreEjecutivo'   => 'required',
//			'correoEjecutivo'   => 'required|email',
			'locales_idLocal1'  => 'required',
//			'fechaIngreso'      => 'required|date',
//			'fechaModificacion' => 'required|date',
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
}
