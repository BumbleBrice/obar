<?php

	$w_routes = array(
		// Partie client
		['GET|POST', '/', 'Default#home', 'default_home'],
		['GET|POST', '/home_connect', 'Default#home_connect', 'default_home_connect'],
		['GET|POST', '/profil_membre/[i:id]', 'Default#profil_membre', 'default_profil_membre'],
		['GET|POST', '/amis', 'Friends#amis', 'friends_amis'],

		// Partie admin
		['GET|POST', '/admin_home', 'Admin#home', 'admin_home'],
		['GET|POST', '/admin_presentation_edit', 'Admin#presentation_edit', 'admin_presentation_edit'],
		['GET|POST', '/admin_slide_edit', 'Admin#slide_edit', 'admin_slide_edit'],
		['GET|POST', '/admin_slide_delete', 'Admin#slide_delete', 'admin_slide_delete'],

		['GET|POST', '/admin_bar_list', 'Bar#bar_list', 'admin_bar_list'],
		['GET|POST', '/admin_bar_add', 'Bar#bar_add', 'admin_bar_add'],
		['GET|POST', '/admin_bar_edit/[i:id]', 'Bar#bar_edit', 'admin_bar_edit'],
		['GET|POST', '/admin_bar_delete/[i:id][:delBar]', 'Bar#bar_delete', 'admin_bar_delete'],

		['GET|POST', '/admin_message', 'Message#message', 'admin_message'],
		['GET|POST', '/admin_message_read/[i:id]', 'Message#message_read', 'admin_message_read'],
		['GET|POST', '/admin_message_delete/[i:id][:delMessage]', 'Message#message_delete', 'admin_message_delete'],

		['GET|POST', '/admin_users', 'Users#users', 'admin_users'],
		['GET|POST', '/admin_user_add', 'Users#user_add', 'admin_user_add'],
		['GET|POST', '/admin_user_edit/[i:id]', 'Users#user_edit', 'admin_user_edit'],
		['GET|POST', '/admin_user_delete/[i:id][:delUser]', 'Users#user_delete', 'admin_user_delete'],

		['GET|POST', '/admin_news', 'News#news', 'admin_news'],
		['GET|POST', '/admin_news_add', 'News#news_add', 'admin_news_add'],
		['GET|POST', '/admin_news_edit/[i:id]', 'News#news_edit', 'admin_news_edit'],
		['GET|POST', '/admin_news_delete/[i:id][:delNews]', 'News#news_delete', 'admin_news_delete'],

		// partie confimation token
		['GET|POST', '/confirm/[:token]', 'Default#inscriptionConfirm', 'default_inscriptionConfirm'],
		['GET|POST', '/lostpassword/[:token]', 'Password#resetPassword', 'LostPassword_resetPassword'],
		['GET|POST', '/lostpassword', 'Password#lostPassword', 'LostPassword_lostPassword'],

		// ajax
    	['GET|POST', '/bar_detail', 'Default#barDetail', 'Default_barDetail'],



	);
