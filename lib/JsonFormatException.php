<?php

namespace JsonToArray;

use \Exception;

/**
 * Json file has a bad format
 *
 * @author	izisaurio
 * @version	1
 */
class JsonFormatException extends Exception
{
	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	string	$path		Json file path
	 */
	public function __construct($path)
	{
		parent::__construct("Json format error ({$path})");
	}
}
