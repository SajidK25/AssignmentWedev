<?php
namespace ToDo\api\Task;

use ToDo\api\config\database;
use ToDo\api\objects\task;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
require_once "../../../vendor/autoload.php";
  
$database = new Database();
$db = $database->getConnection();
$task = new Task($db);
  
$data = json_decode(file_get_contents("php://input"));
$task->id = $data->id;
$task->task_name = $data->Task_name;
$task->status = $data->Status;

if($task->update()){
    http_response_code(200);
    echo json_encode(array("message" => "Task was updated."));
}
else{
    http_response_code(503);
    echo json_encode(array("message" => "Unable to update task."));
}
?>