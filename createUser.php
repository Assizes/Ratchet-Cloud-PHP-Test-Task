<?php
if(isset($_POST["userName"]) && isset($_POST["pass"])){
    include './connect.php';
    
    $pepper = "The quick brown fox jumps over the lazy dog";
    $userName = $_POST["userName"];
    $pass = $_POST["pass"];
    $time = time();
    $errors = [];
    
    $cookedPass = $time.$userName.$pepper;
    $passHash = password_hash($cookedPass, PASSWORD_DEFAULT);
    
    try{
        $insertNewUser = "INSERT INTO users (username, password, created_at) "
                . "VALUES(:username, :password, :created_at)";
    
        $db->begintransaction();
        
        $res = $db->prepare($insertNewUser);
        $quary = $res->execute(array(":username" => $userName, ":password" => $passHash, ":created_at" => $time));
        
        $db->commit();
        
        if (!$quary){
            echo "\nPDO::errorInfo():\n";
            $errors["query"]=$db->errorInfo();
        }else{
            session_start();
            $_SESSION['siteUsername'] = $userName;
            $errors["session"] = $_SESSION['siteUsername'];
        }
        
        
    }catch (PDOException $e) {
        $db->rollBack();
        $errors["transaction"] = $e->getMessage();
        //die($e->getMessage());
    }
    
    echo json_encode($errors);
}
?>