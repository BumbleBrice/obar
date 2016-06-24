<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\PresentationModel;





class PresentationController extends Controller
{

	public function getPresentation() 
	{
		$presentation = new PresentationModel();
		
		$pres = $presentation->find('id');

		return $pres;
	}
	
	public function addPresentation() 
	{
		
	}

	public function readPresentation()
	{

	}
	public function answerPresentation()
	{

	}
			
}
