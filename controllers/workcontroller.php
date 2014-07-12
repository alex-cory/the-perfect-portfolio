<?php

/**
 * Description:
 * This is the main Controller class.
 *
 */
class Controller
{
	/**
	 * Description:
	 * Class constructor function. Initializes all class variables.
	 *
	 * @param $load       each load is passed
	 * @param $method     each method that is passed
	 * @param $parameters the arguments for each method
	 */
	function __construct()
	{
	}



	/**
	 * Description:
	 * The runTask() method is our way of grabbing the method from the URI string and parsing the
	 * parameters. (Uniform Resource Identifier: http://goo.gl/LyRUdP) This is what runs if there is
	 * nothing in the URL.
	 *
	 * @param  $method
	 * @param  $parameters
	 * @return
	 */
	public function runTask($method, $parameters = null)
	{
		if ($method && method_exists($this, $method)) {
			//the call_user_func_array expects an array so we create a null array if parameters is empty
			if (!is_array($parameters )) {
				$parameters = array();
			}
        	call_user_func_array(array($this, $method), $parameters);
     	}
	}

	/**
	 * Description:
	 * The index() method is the one run if no task method is run. Here as a placeholder for
	 * child classes.
	 *
	 * @return [type] [description]
	 */
	public function index()
	{
	}

	/**
	 * Description:
	 * This method allows us to more easily set the load variables.
	 *
	 * @param  $key   	key of the $data array
	 * @param  $value 	value of the $data array
	 */
	public function set($key, $value)
	{
		$this->data[$key] = $value;
	}
}
