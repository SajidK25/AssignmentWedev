<?php
namespace ToDo\api\Task;
use ToDo\api\objects\task;
use ToDo\api\config\database;
use PDO;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once "../../../vendor/autoload.php";

$database = new Database();
$db = $database->getConnection();

$task = new Task($db);

$stmt = $task->read();
$num = $stmt->rowCount();

if($num>0){

    $tasks_arr=array();
    //$tasks_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        extract($row);

        $task_item=array(
            "id" => $id,
            "Task_name" => $Task_name,
            "Status" => $Status
        );

        array_push($tasks_arr, $task_item);
    }

    http_response_code(200);
    echo json_encode($tasks_arr);
}

else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No task found.")
    );
}