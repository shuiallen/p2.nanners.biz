<?php

class practicebase_controller {
	
	public $publicvar;
	protected $protectedvar;
	private $privatevar;
	public $template;

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		echo '<pre>'; echo "practicebase controller construct "; echo '</pre>';					
		# Set vars
		$publicvar = "This is public";
		$protectedvar = "This is protected, only derived objects can see me";
		$privatevar = "Can only use me in this controller class";

		# ?? So we can use $publicvar in views	
		$this->template 	  = View::instance('_v_template');		
		$this->template->set_global('publicvar', $publicvar);		
	}
	
} # eoc
