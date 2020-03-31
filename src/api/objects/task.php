<?php
namespace ToDo\api\objects;

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
        $query = "SELECT id,Task_name,Status FROM " . $this->table_name . " ORDER BY id DESC";
        // print_r($query);
        // exit;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function create(){
        $query = "INSERT INTO " . $this->table_name . " SET Task_name=:Task_name";//, Status=:Status";
        // print_r($query);
        // exit;
        $stmt = $this->conn->prepare($query);
        $this->task_name=htmlspecialchars(strip_tags($this->task_name));
        // $this->status=htmlspecialchars(strip_tags($this->status));
        $stmt->bindParam(":Task_name", $this->task_name);
        // $stmt->bindParam(":Status", $this->status);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // update the product
    function update(){
    
        // update query
        $query = "UPDATE " . $this->table_name . " SET Task_name = :Task_name, Status = :Status WHERE id = :id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->task_name=htmlspecialchars(strip_tags($this->task_name));
        $this->status=htmlspecialchars(strip_tags($this->status));
        
    
        // bind new values
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':Task_name', $this->task_name);
        $stmt->bindParam(':Status', $this->status);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
// delete the product
    function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);
    
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
?>