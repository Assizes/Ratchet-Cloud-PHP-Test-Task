<?php
if(isset($_POST["userName"]) && isset($_POST["pass"])){
    include './connect.php';
    
    global $pepper;
    $userName = $_POST["userName"];
    $pass = $_POST["pass"];
    $response = [];
    
    $insertNewUser = "SELECT id, created_at, password FROM users WHERE username = :username";
    
    $res = $db->prepare($insertNewUser);
    $quary = $res->execute(array(":username" => $userName));
    $user = $res->fetch(PDO::FETCH_ASSOC);
    
    if($user){
        $cookedPass = $user["created_at"].$pass.$pepper;
        if(password_verify($cookedPass, $user["password"])){
            session_start();
            $_SESSION['userid'] = $user["id"];
            $_SESSION['siteUsername'] = $userName;
            //header("location: index.php");
        }else{
            $response["error"]["noUser"] = "Login or password is incorrect2";
        }
    }else{
        $response["error"]["noUser"] = "Login or password is incorrect1";
    }
    
    echo json_encode($response);
}