<?php
	class adminController {

		public function index() {
			echo 'Hello World';
		}

		/**
		 * login
		 * @return void
		 */
		public function login() {
			VIEW::display('admin/login.html');
		}

	}