<?php

/**
 * Description:
 * This is the main Controller class.
 *
 */
class Controller
{
   	public $view;
	public $data = array();
	// protected $access;
	// if $access == 1 then nobody but the administrators should see that page.
	// If !isset($this->access) then fair game


	/**
	 * Description:
	 * Class constructor function. Initializes all class variables.
	 *
	 * @param $load       each load is passed
	 * @param $method     each method that is passed
	 * @param $parameters the arguments for each method
	 */
	function __construct($view, $method = null, $parameters = null)
	{
		// instantiate the View class
		$this->view = new View();
		// instantiate the Model class
		new Model();

		// check user object
		// $u = new User();

		// check access to the page
		// if ($this->access == 1 && !$u->isAdmin()) {

			// assign a session variable
			// $_SESSION['redirect'] = $load;

			// send them to the login page
			// header('Location: ' . BASE_URL . '/index.php/login/');

		// } else {

			// run any task methods
			if ($method) {

				$this->runTask($method, $parameters);

			} else {

				$this->index();
				$method = 'index';
			}

			// render the load
			if (file_exists('views/' . strtolower($view) . '/' . strtolower($method) . '.php')) {

				$this->view->load($view, $method, $this->data);
			} else {

				$this->view->load($view, 'index', $this->data);
				// view: class name
				// load($filename, $data): sees if $data is array & extracts it from the file
			}
		// }
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
