<?php
namespace ToDo\api\Task;

use ToDo\api\config\database;
use ToDo\api\objects\task;
use PDO;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
require_once "../../../vendor/autoload.php";
  
$database = new Database();
$db = $database->getConnection();
  
$task = new Task($db);
$keywords=isset($_GET["status"]) ? $_GET["status"] : "";
  
$stmt = $task->search($keywords);
$num = $stmt->rowCount();
// print_r($num);
// exit;
if($num>0){
    $task_arr=array();
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $task_item=array(
            "id" => $id,
            "Task_name" => $Task_name,
            "Status" => $Status,
        );
  
        array_push($task_arr, $task_item);
    }
  
    http_response_code(200);
    echo json_encode($task_arr);
}
  
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No task found.")
    );
}
?>