<?php

	$w_routes = array(
		// Partie client
		['GET|POST', '/', 'Default#home', 'default_home'],



		// Partie admin
		['GET|POST', '/admin_home', 'admin#home', 'home_admin'],
		['GET|POST', '/admin_presentation_edit', 'admin#presentation_edit', 'admin_presentation_edit'],
		['GET|POST', '/admin_slide_edit', 'admin#slide_edit', 'admin_slide_edit'],
		['GET|POST', '/admin_slide_delete', 'admin#slide_delete', 'admin_slide_delete'],

		['GET|POST', '/admin_bar_list', 'admin#bar_list', 'admin_bar_list'],
		['GET|POST', '/admin_bar_add', 'admin#bar_add', 'admin_bar_add'],
		['GET|POST', '/admin_bar_edit', 'admin#bar_edit', 'admin_bar_edit'],
		['GET|POST', '/admin_bar_delete', 'admin#bar_delete', 'admin_bar_delete'],

		['GET|POST', '/admin_message', 'admin#message', 'admin_message'],

		['GET|POST', '/admin_users', 'admin#users', 'admin_users'],
		['GET|POST', '/admin_user_add', 'admin#user_add', 'admin_user_add'],
		['GET|POST', '/admin_user_edit', 'admin#user_edit', 'admin_user_edit'],
		['GET|POST', '/admin_user_delete', 'admin#user_delete', 'admin_user_delete'],

		['GET|POST', '/admin_newsletter', 'admin#newsletter', 'admin_newsletter'],



	);