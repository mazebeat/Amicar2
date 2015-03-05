<?php

class Vendedor extends Eloquent
{
	public    $timestamps = false;
	protected $table      = 'vendedores';
	protected $fillable
	                      = array(
			'rutVendedor',
			'nombreVendedor',
			'locales_idLocal',
		);
	protected $hidden     = array();
	protected $guarded
	                      = array(
			'idVendedor'
		);
	protected $primaryKey = 'idVendedor';
	protected $rules
	                      = array(
			'rutVendedor'     => 'required',
			'nombreVendedor'  => 'required',
			'locales_idLocal' => 'required'
		);

}
