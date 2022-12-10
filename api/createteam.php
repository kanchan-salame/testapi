<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


//creating response array
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){



  //getting values
  $teamName = $_POST['name'];
  $memberCount = $_POST['member'];

  // echo $teamName;

  //including the db operation file
  require_once '../includes/DbOperation.php';

  $db = new DbOperation();

  //   echo "string";
  // exit;

  // print_r($db);

  //inserting values
  if($db->createTeam($teamName,$memberCount)){
    $response['error']=false;
    $response['message']='Team added successfully';
  }else{

    $response['error']=true;
    $response['message']='Could not add team';
  }

}else{
  $response['error']=true;
  // print_r($response);
  $response['message']='You are not authorized';
}
echo json_encode($response);
