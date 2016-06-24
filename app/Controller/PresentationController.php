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

		// $params est un tableau permettant de transmettre des variables à la vue, les clé de ce tableau deviendront les variables (dans la vue)
		$params = ['pres' -> $pres];
		var_dump($pres);
		// $this->show('dossier/fichier') est la méthode permettant d'avoir un rendu visuel
		$this->show('adminHome/home_admin', $params);
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
