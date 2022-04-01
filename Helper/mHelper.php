<?php 
class mHelper
{
	static function postVarible($value="")
	{
		if(isset($_POST[$value])):
		
			return strip_tags($_POST[$value]);
		else:
			return "";
		endif;
		
	}
	static function postIntegerVarible($value)
	{
		if(isset($_POST[$value])):
			return intval($_POST[$value]);
		else:
			return 0;
		endif;
	}

	static function getIntegerVarible($value)
	{

		if(isset($_GET[$value])):
			return intval($_GET[$value]);
		else:
			return 0;
		endif;

	}
}

 ?>