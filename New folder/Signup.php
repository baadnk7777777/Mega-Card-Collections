<?php 

    session_start();
    include_once('function.php');

    $signup = new DB_con();

    $output ="";

    if(!empty($_POST["txt_username"]) && !empty($_POST["txt_email"]) && !empty($_POST["txt_password"])){
        
        $username = $_POST['txt_username'];
        $email = $_POST['txt_email'];
        $password = $_POST['txt_password'];

        $sql = $signup->signup(trim($username),trim($email),trim($password));

        if(!isset($sql)){
            $output.="Cannot write to file userList.txt";
        }
        else{
            $_SESSION["name"] = $_POST["txt_username"];
            $output.= $_POST["txt_username"]." Have been recorded.";
        }
    }
    else $output.="Error: Not Found.";
    echo $output;
?>