<?php

class Body extends Eloquent
{
	public    $timestamps = false;
	protected $table      = 'body';
	protected $fillable
	                      = array(
			'bodyNombre'
		);
	protected $hidden     = array();
	protected $guarded
	                      = array(
			'idBody'
		);
	protected $primaryKey = 'idBody';
	protected $rules
	                      = array(
			'bodyNombre' => 'required',
		);

}
