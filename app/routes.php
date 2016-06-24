<?php

	$w_routes = array(
		// Partie client
		['GET|POST', '/', 'Default#home', 'default_home'],



		// Partie admin
		['GET|POST', '/admin_home', 'Admin#home', 'admin_home'],
		['GET|POST', '/admin_presentation_edit', 'adminHome#presentation_edit', 'admin_presentation_edit'],
		['GET|POST', '/admin_slide_edit', 'adminHome#slide_edit', 'admin_slide_edit'],
		['GET|POST', '/admin_slide_delete', 'adminHome#slide_delete', 'admin_slide_delete'],

		['GET|POST', '/admin_bar_list', 'adminBar#bar_list', 'admin_bar_list'],
		['GET|POST', '/admin_bar_add', 'adminBar#bar_add', 'admin_bar_add'],
		['GET|POST', '/admin_bar_edit', 'adminBar#bar_edit', 'admin_bar_edit'],
		['GET|POST', '/admin_bar_delete', 'adminBar#bar_delete', 'admin_bar_delete'],

		['GET|POST', '/admin_message', 'adminMessage#message', 'admin_message'],

		['GET|POST', '/admin_users', 'adminUsers#users', 'admin_users'],
		['GET|POST', '/admin_user_add', 'adminUsers#user_add', 'admin_user_add'],
		['GET|POST', '/admin_user_edit', 'adminUsers#user_edit', 'admin_user_edit'],
		['GET|POST', '/admin_user_delete', 'adminUsers#user_delete', 'admin_user_delete'],

		['GET|POST', '/admin_newsletter', 'adminNews#newsletter', 'admin_newsletter'],



	);