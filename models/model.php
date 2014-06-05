<?php
# Models are going to be grabbing stuff from the database or putting stuff to the database

include_once('application/libraries/adodb5/adodb.inc.php');

class Model
{
	protected $db;

	public function __construct()
	{
		try {

			# Successfully Connected So Set Everything Up
			// PDO (PHP Data Object- Represents a connection between PHP and a database server. http://goo.gl/9QdDX)
			// $this->db = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PASS);

			// ADOdb (Active Data Objects Data Base- This is a database abstraction library. http://goo.gl/Itetlw)
			// $this->db = NewADOConnection('mysql');
			// $this->db->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		} catch (exception $e) {
			# Unable To Connect so Display the Error Message
			echo 'Connection failed: ' . $e->getMessage();
		}
	}
}