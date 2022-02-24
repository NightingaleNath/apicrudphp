<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../database.php';
include_once '../employees.php';
$database = new Database();

$db = $database->getConnection();
$items = new Employee($db);
$records = $items->getEmployees();
$itemCount = $records->num_rows;

if($itemCount > 0){
$employeeArr = array();
 $itemCountArr = array();
$employeeArr["body"] = array();
//$employeeArr["itemCount"] = $itemCount;
 $itemCountArr['itemCount'] = $itemCount; 
while ($row = $records->fetch_assoc())
{
array_push($employeeArr["body"], $row);
}
$finalArray = array_merge($employeeArr,$itemCountArr);
//echo json_encode($employeeArr);
 echo json_encode($finalArray);
}
else{
http_response_code(404);
echo json_encode(
array("message" => "No record found.")
);
}
?>
