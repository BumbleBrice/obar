<?php

	$w_routes = array(
		// Partie client
		['GET|POST', '/', 'Default#home', 'default_home'],



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

		['GET|POST', '/admin_newsletter', 'Newsletter#newsletter', 'admin_newsletter'],

		['GET|POST', '/lostpassword/[:token]', 'Password#resetPassword', 'LostPassword_resetPassword'],
		['GET|POST', '/lostpassword', 'Password#lostPassword', 'LostPassword_lostPassword']



	);
