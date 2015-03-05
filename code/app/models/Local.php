<?php

class Local extends Eloquent
{
	public    $timestamps = false;
	protected $table      = 'locales';
	protected $fillable
	                      = array(
			'nombreLocal',
		);
	protected $hidden     = array();
	protected $guarded
	                      = array(
			'idLocal'
		);
	protected $primaryKey = 'idLocal';
	protected $rules
	                      = array(
			'nombreLocal' => 'required',
		);

}
