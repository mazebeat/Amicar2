<?php

class Cliente extends Eloquent
{
	public    $timestamps = false;
	protected $table      = 'clientes';
	protected $fillable
	                      = array(
			'rutCliente',
			'emailCliente',
			'nombreCliente',
			'sexoCliente',
			'fonoCliente',
			'automovilCliente',
			'idGrupo',
			'idBody',
			'fecha'
		);
	protected $hidden     = array();
	protected $guarded
	                      = array(
			'idCliente'
		);
	protected $primaryKey = 'idCliente';
	protected $rules
	                      = array(
			'emailCliente'  => 'required|email',
			'nombreCliente' => 'required',
		);
	private   $errors;

	public function scopeDesiscritos($query)
	{
		return $query->where('desinscrito', 1);
	}

	public function scopeInscritos($query)
	{
		return $query->where('desinscrito', 0);
	}

	public function isDesinscrito()
	{
		if ($this->desinscrito) {
			return true;
		}

		return false;
	}

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
