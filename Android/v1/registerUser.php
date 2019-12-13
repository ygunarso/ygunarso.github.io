<?php

require_once '../includes/DbOperations.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST') {
    if(!empty(trim($_POST['username'])) and 
        !empty(trim($_POST['email'])) and
            !empty(trim($_POST['password']))) {
        $db = new DbOperations();

        $result = $db->createUser($_POST['username'], $_POST['password'], $_POST['email']);
        if($result == 1) {
            $response['error'] = false;
            $response['message'] = "User registered successfully";
        }
        elseif ($result == 2) {
            $response['error'] = true;
            $response['message'] = "Some error occurred please try again";
        }
        else {
            $response['error'] = true;
            $response['message'] = "This username/email has already been registered, please use a different username/email";
        }
    }
    else {
        $response['error'] = true;
        $response['message'] = "Required fields are missing";
    }
}
else {
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}

echo json_encode($response);