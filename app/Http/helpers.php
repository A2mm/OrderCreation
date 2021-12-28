<?php 

// check_user_type
if(!function_exists('check_user_type'))
{
	function check_user_type($type)
	{
		switch($type)
		{
			case 'free':
				return 'free';
				break;
			case 'premium':
				return 'premium';
				break;
			default:
				return 'Invalid';
				break;
		}
	}
}
// check_user_type

// check_user_first_order
if(!function_exists('check_user_first_order'))
{
	function check_user_first_order($count_orders)
	{
		if ($count_orders <= 0) {
			return false;
		}else{
			return true;
		}
	}
}
// check_user_first_order
