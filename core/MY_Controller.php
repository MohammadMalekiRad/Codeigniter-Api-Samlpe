<?php

abstract class MY_Controller extends CI_Controller
{
	private $input_type;
	public $instance = null;

	public function __construct($input_type = null)
	{
		$this->input_type = $input_type;
		parent::__construct();
		$this->instance = $this;
	}

	public function model_loader($model_name, &$re = null)
	{
		$this->load->model($model_name);
		if (!is_null($re))
			$re = $this->$model_name;
	}

	public function _remap($method, $params = array())
	{
		$params[] = $this->inputFetch();
		if (method_exists($this, $method)) {
			return call_user_func_array(array($this, $method), $params);
		}
		return null;
	}

	private function inputFetch()
	{
		switch ($this->input_type):
			case 'post':
				return $this->input->post();
				break;

			case 'get':
			default:
				return $this->input->get();
				break;
		endswitch;
	}

}
