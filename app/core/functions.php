<?php

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";

} //End of show ($stuff)

function setValue($key)
{
	if(!empty($_POST[$key]))
	{
		return $_POST[$key];
	}
	return '';
} // End of setValue
function redirect($link)
{
	header("Location: ". ROOT."/".$link);
	die;
}

function message($msg = '',$erase = false)
{

	if(!empty($msg))
	{
		$_SESSION['message'] = $msg;
	}else{

		if(!empty($_SESSION['message']))
		{
			$msg = $_SESSION['message'];
			if($erase){
				unset($_SESSION['message']);
			}
			return $msg;
		}
	}

	return false;
}
