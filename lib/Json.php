<?php

namespace JsonToArray;

use \ArrayAccess;

/**
 * Json file to array
 *
 * @author  izisaurio
 * @version 1
 */
class Json implements ArrayAccess
{
	/**
	 * Data container
	 *
	 * @access	public
	 * @var		array
	 */
	public $data;

	/**
	 * Json file path
	 *
	 * @access	public
	 * @var		array
	 */
	public $path;

	/**
	 * Construct
	 *
	 * Reads json file and decodes it
	 *
	 * @access	public
	 * @param	string	$path	Json file path
	 */
	public function __construct($path)
	{
		$this->path = $path;
		if (!file_exists($path)) {
			throw new JsonFileNotFoundException($path);
		}
		$this->data = json_decode(file_get_contents($path), true);
		if (JSON_ERROR_NONE !== \json_last_error()) {
			throw new JsonFormatException($path);
		}
	}

	/**
	 * Set item
	 *
	 * @access	public
	 * @param	mixed	$key	Array key
	 * @param	mixed	$value	Array value
	 */
	public function offsetSet($key, $value): void
	{
		if (is_null($key)) {
			$this->data[] = $value;
		} else {
			$this->data[$key] = $value;
		}
	}

	/**
	 * Array key exists
	 *
	 * @access	public
	 * @param	mixed	$key	Array key
	 * @return	bool
	 */
	public function offsetExists($key): bool
	{
		return isset($this->data[$key]);
	}

	/**
	 * Unset array key
	 *
	 * @access	public
	 * @param	mixed	$key	Array key
	 */
	public function offsetUnset($key): void
	{
		unset($this->data[$key]);
	}

	/**
	 * Returns a key value
	 *
	 * @access	public
	 * @param	mixed	$key	Array key
	 * @return	mixed
	 */
	public function offsetGet($key): mixed
	{
		return isset($this->data[$key]) ? $this->data[$key] : null;
	}

	/**
	 * Returns data as debug info
	 *
	 * @access	public
	 * @return	array
	 */
	public function __debugInfo()
	{
		return $this->data;
	}
}