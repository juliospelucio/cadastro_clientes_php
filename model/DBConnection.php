<?php

class DBConnection extends PDO
{

    // array('driver' => 'mysql','host' => '','dbname' => '','username' => '','password' => '','options' => '',)
    protected $_config = array(
        'driver' => 'mysql',
        'port' => '3307',
        'host' => '127.0.0.1',
        'dbname' => 'users_crud',
        'username' => 'root',
        'password' => '',
        'options' => array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
    );

    // Database Connection
    public $dbc;

    /* function __construct
    * Opens the database connection
    * @param $config is an array of database connection parameters
    */
    public function __construct()
    {
        parent::__construct("mysql:host=127.0.0.1;port=3307;dbname=" . $this->_config['dbname'], $this->_config['username'], $this->_config['password'], array('charset' => 'utf8'));
        $this->getPDOConnection();
    }

    /* Function getPDOConnection
    * Retrieve a connection to the database using PDO.
    */
    private function getPDOConnection()
    {
        // Check if the connection is already established
        if ($this->dbc == NULL) {
            $this->createConnection();
        }
    }

    /* Function createConnection
    * Create a the database connection using PDO.
    */
    private function createConnection()
    {
        $dsn = "" .
            $this->_config['driver'] .
            ":host=" . $this->_config['host'] .
            ";port=". $this->_config['port'] .
            ";dbname=" . $this->_config['dbname'];
        try {
            $this->dbc = new PDO($dsn, $this->_config['username'], $this->_config['password'], $this->_config['options']);
            $this->dbc->exec("set names utf8");
        } catch (PDOException $e) {
            echo __LINE__ . $e->getMessage();
        }
    }

    /* Function runQuery
    * Runs a insert, update or delete query
    * @param string sql insert update or delete statement
    * @param array with all parameters names
    * @return int count of records affected by running the sql statement into users.
    */
    public function runQuery($sql, array $params = null)
    {
        try {
            $stmt = $this->dbc->prepare($sql);
            $stmt->execute($params) or print_r($this->dbc->errorInfo());
        } catch (PDOException $e) {
            echo "Database: " . __LINE__ . $e->getMessage();
        }
        return $stmt->rowCount();
    }

    /* Function getQuery
    * Runs a select query
    * @param string sql insert update or delete statement
    * @returns associative array
    */
    public function getQuery($sql, array $params = null)
    {
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute($params);
        // echo $stmt->debugDumpParams() . "<br />";
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
