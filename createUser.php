<?php
if(isset($_POST["userName"]) && isset($_POST["pass"])){
    include './connect.php';

    global $pepper;
    $userName = $_POST["userName"];
    $pass = $_POST["pass"];
    $time = time();
    $response = [];
    
    $cookedPass = $time.$pass.$pepper;
    $passHash = password_hash($cookedPass, PASSWORD_DEFAULT);
    
    try{
        $insertNewUser = "INSERT INTO users (username, password, created_at) "
                . "VALUES(:username, :password, :created_at)";
    
        $db->begintransaction();
        
        $res = $db->prepare($insertNewUser);
        $quary = $res->execute(array(":username" => $userName, ":password" => $passHash, ":created_at" => $time));
        $userid = intval($db->lastInsertId()); 
        $db->commit();
        
        if (!$quary){
            $response['errors']["query"]=$db->errorInfo();
        }else{
            session_start();
            $_SESSION['userid'] = $userid;
            $_SESSION['siteUsername'] = $userName;
        }
        
        
    }catch (PDOException $e) {
        $db->rollBack();
        $response['errors']["transaction"] = $e->getMessage();
        //die($e->getMessage());
    }
    
    echo json_encode($response);
}
?>