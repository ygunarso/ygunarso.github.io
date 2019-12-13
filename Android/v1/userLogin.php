<?php

require_once '../includes/DbOperations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST') {
    if(!empty(trim($_POST['username'])) and !empty(trim($_POST['password']))) {
        $db = new DbOperations();

        if($db->userLogin($_POST['username'], $_POST['password'])) {
            $user = $db->getUserByUsername($_POST['username']);
            $response['error'] = false;
            $response['message'] = "User successfully logged in";
            $response['id'] = $user[id];
            $response['email'] = $user[email];
            $response['username'] = $user[username];
        }
        else {
            $response['error'] = true;
            $response['message'] = "Invalid username or password";
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