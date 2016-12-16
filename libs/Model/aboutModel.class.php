<?php
	class aboutModel {
		/**
		 * about me
		 */
		function aboutInfo() {
			return file_get_contents('data/txt/about.txt');
		}
	}