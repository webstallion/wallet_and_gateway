<?php
	class Globalvar {
		function global_var() {
			$array = array(
				'allowed_types' => 'jpeg|jpg|png|JPEG|JPG|PNG|gif',
				'max_size' => '20240',
				'max_width' => '15000',
				'max_height' => '15000',
			);
			return $array;
		}
		function global_var1() {
			$array = array(
				'allowed_types' => 'pdf|PDF',
				'max_size' => '20240',
				'max_width' => '15000',
				'max_height' => '15000',
			);
			return $array;
		}

		function global_certificate() {
			$array = array(
				'cha' => '339',
				'gru' => '71'
			);
			return $array;
		}

		function units() {
			$array = array(
				'sqm' => '4046.856'
			);
			return $array;			
		}
	}
?>