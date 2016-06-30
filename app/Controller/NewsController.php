<?php

namespace Controller;

use \W\Controller\Controller;
use \model\NewsModel as NewsModel;

use \W\Security\AuthentificationModel as AuthModel;
use \Controller\PresentationController as PresentationControl;

class NewsController extends Controller
{
	
	/**
	 * Page d'accueil news
	**/
	public function news()
	{
		$newsModel = new NewsModel();

		$params = [];
		
		$params['news3'] = $newsModel->findAll('id', 'ASC', 3);
		$params['news'] = $newsModel->findAll('id', 'ASC', 150, 4);


			
		$this->show('adminNews/news', $params);
	} /*Fin de la fonction news*/
}
