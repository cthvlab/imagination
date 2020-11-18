<?php function ip() 
		{
			$ip=$_SERVER['REMOTE_ADDR'];
			Cookie::queue('ip',$ip, 60);
			return $ip;
		}