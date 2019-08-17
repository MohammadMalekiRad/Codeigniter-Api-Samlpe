<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V1 extends MY_Controller
{
	public $users_model = 'api/v1/UsersModel';

	public function __construct()
	{
		parent::__construct();
	}

	public function add_user($params)
	{
		$this->instance->model_loader($this->users_model, $model);
		$model->add_user();

	}

}
