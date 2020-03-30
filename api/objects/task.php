<?php
class Task{
    private $conn;
    private $table_name="Tasks";

    public $id;
    public $task_name;
    public $status;

    public function __construct($db){
        $this->conn=$db;
    }

    function read(){

        // select all query
        $query = "SELECT id,Task_name,Status FROM " . $this->table_name . " ORDER BY id DESC";
        // print_r($query);
        // exit;

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}
?>