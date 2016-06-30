<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\NewsModel as News;

use \W\Security\AuthentificationModel as AuthModel;
use \Controller\PresentationController as PresentationControl;


class NewsController extends Controller
{
	public function news(){

		$newsModel = new NewsModel();
		
		$params = ['news' => $newsModel->findAll('id', 'ASC')];
		
		$this->show('adminNews/news', $params);
	}
}
