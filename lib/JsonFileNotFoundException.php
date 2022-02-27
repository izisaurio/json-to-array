<?php

namespace JsonToArray;

use \Exception;

/**
 * Json file not found
 *
 * @author	izisaurio
 * @version	1
 */
class JsonFileNotFoundException extends Exception
{
	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	string	$path		Json file path
	 */
	public function __construct($path)
	{
		parent::__construct("Json file not found ({$path})");
	}
}
