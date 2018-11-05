<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CountTagsDBClass
 *
 * @author eugene
 * 
 * Class to communicate with MySQL and give output specific 
 * to CountTagsClass Model. Can process entry into DB and 
 * display all of the results.
 * Constructor params: string string string string string string
 */
class CountTagsDBClass
{

    private $conn;
    private $query;
    private $message;
    private $result;
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function __construct($servername, $username, $password, $dbname, $query)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->query = $query;
    }

    //connect to DB using OOP MySQLi method
    public function connect()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname, 5000);
        //var_dump($this->conn);
        if ($this->conn->connect_error) {
            $this->message = "Connection failed: " . $this->conn->connect_error;
        }
    }

    public function disconnect()
    {
        $this->conn->close();
    }

    //change the query
    public function setQuery($query)
    {
        $this->query = $query;
    }

    //do the INSERT query
    public function processInsertQuery()
    {
        if ($this->conn->query($this->query) === TRUE) {
            $this->message = "Query Proceeded Successfully!";
        } else {
            $this->message = "Query Failed!" . $this->conn->error;
        }
    }

    //do the SELECT query
    public function processSelectQuery()
    {
        $this->result = $this->conn->query($this->query);

        //if the result is good, output it in table
        if ($this->result->num_rows > 0) {
            $this->message .= "<table class=\"table table-hover\">"
                . "<tr><th>ID</th><th>URL</th><th>Tag</th>"
                . "<th>Count</th></tr>";
            // output data of each row
            while ($row = $this->result->fetch_assoc()) {
                $this->message .= "<tr><td>" . $row["id"] . "</td><td>" .
                    $row["url"] . "</td><td>" . $row["tag"] .
                    "</td><td>" . $row["count"] . "</td></tr>";
            }
            $this->message .= "</table>";
        } else {
            $this->message = "0 results";
        }
    }

    public function getMessage()
    {
        return $this->message;
    }
}
