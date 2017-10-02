<?php
class UserModel{
    
    private $userId = '';
    private $userName = '';
    private $pepper = "The quick brown fox jumps over the lazy dog";
    
    public function __constructor(){
        
    }
    public function Auth(){
       
        if(isset($_GET["logOff"])){
            $this->logOff();
        }
        
        if(isset($_SESSION['userId'])){
            $this->restoreSession();
        }
        else if(isset($_POST["logIn"]) && isset($_POST["userName"]) && isset($_POST["pass"])){
            $this->logIn();
        }
        else if(isset($_POST['registerUser']) && isset($_POST["userName"]) && isset($_POST["pass"])){
            $this->registerUser();
        }
    }
    
    public function getId(){
        return $this->userId;
    }
    
    public function getName(){
        return $this->userName;
    }
    
    private function restoreSession(){
        $this->userId = $_SESSION['userId'];
        $this->userName = $_SESSION['siteUsername'];
    }
    
    private function logIn(){
        $userName = $_POST["userName"];
        $pass = $_POST["pass"];
        $response = [];

        $insertNewUser = "SELECT id, created_at, password FROM users WHERE username = :username";

        $db = DB::getInstance();
        $res = $db->prepare($insertNewUser);
        $quary = $res->execute(array(":username" => $userName));
        $user = $res->fetch(PDO::FETCH_ASSOC);

        if($user){
            $cookedPass = $user["created_at"].$pass.$this->pepper;
            if(password_verify($cookedPass, $user["password"])){
                $_SESSION['userId'] = $user["id"];
                $_SESSION['siteUsername'] = $userName;
                //header("location: index.php");
            }else{
                $response["error"]["noUser"] = "Login or password is incorrect2";
            }
        }else{
            $response["error"]["noUser"] = "Login or password is incorrect1";
        }
        echo json_encode($response);
        exit;
    }
    
    private function registerUser(){

        $userName = $_POST["userName"];
        $pass = $_POST["pass"];
        $time = time();
        $response = [];
    
        $cookedPass = $time.$pass.$this->pepper;
        $passHash = password_hash($cookedPass, PASSWORD_DEFAULT);
    
        try{
            $insertNewUser = "INSERT INTO users (username, password, created_at) "
                . "VALUES(:username, :password, :created_at)";

            $db = DB::getInstance();
            $db->begintransaction();
        
            $res = $db->prepare($insertNewUser);
            $quary = $res->execute(array(":username" => $userName, ":password" => $passHash, ":created_at" => $time));
            $userid = intval($db->lastInsertId()); 
            $db->commit();
        
            if (!$quary){
                $response['errors']["query"]=$db->errorInfo();
            }else{
                $_SESSION['userId'] = $userid;
                $_SESSION['siteUsername'] = $userName;
            }
        
        
        }catch (PDOException $e) {
            $db->rollBack();
            $response['errors']["transaction"] = $e->getMessage();
            //die($e->getMessage());
        }
    
        echo json_encode($response);
        exit;
    }
    
    private function logOff(){
        global $sitePath;
        $_SESSION = array();
        session_destroy();
        header("location: ".str_replace('/?logOff=logOff',"",$_SERVER['REQUEST_URI']));
        exit;
    }
}
