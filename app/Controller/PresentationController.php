<?php

namespace Controller;

use \W\Controller\Controller;
/*use \Model\PresentationModel;*/
use \W\Security\AuthentificationModel as AuthModel;
use \Controller\PresentationController as PresentationControl;

class PresentationController extends Controller
{

	public function presentation_edit() 
	{
		$this->allowTo(['admin']);
		
		$presentationControl = new PresentationControl();

		$params = [];

		$params['pres'] = $presentationControl->getPresentation();

		$this->show('adminHome/admin_presentation_edit', $params);
	}
				
}