<?php
namespace ToDo\api\Task;

use ToDo\api\config\database;
use ToDo\api\objects\task;

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
require_once "../../../vendor/autoload.php";
 
$database = new Database();
$db = $database->getConnection();
 
$task = new Task($db);
// print_r($task);
// exit;
$data = json_decode(file_get_contents("php://input"));
//  print_r($data);
//         exit;
if(!empty($data->Task_name))
{
    $task->task_name = $data->Task_name;
    // $task->status = $data->Status;

    if($task->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Task was created."));
    }
 
    else{
        http_response_code(503);
        echo json_encode(array("message" => "Unable to create Task."));
    }
}
 
else{
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create Task. Data is incomplete."));
}
?>