<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Where the templates for the generators are stored...
	|--------------------------------------------------------------------------
	|
	*/
	'model_template_path'               => app_path() . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'model.txt',
	'scaffold_model_template_path'      => app_path() . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'scaffolding/model.txt',
	'controller_template_path'          => app_path() . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'controller.txt',
	'scaffold_controller_template_path' => app_path() . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'scaffolding/controller.txt',
	'migration_template_path'           => app_path() . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'migration.txt',
	'seed_template_path'                => app_path() . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'seed.txt',
	'view_template_path'                => app_path() . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'view.txt',
	/*
	|--------------------------------------------------------------------------
	| Where the generated files will be saved...
	|--------------------------------------------------------------------------
	|
	*/
	'model_target_path'                 => app_path('models'),
	'controller_target_path'            => app_path('controllers'),
	'migration_target_path'             => app_path('database/migrations'),
	'seed_target_path'                  => app_path('database/seeds'),
	'view_target_path'                  => app_path('views')

];
