<?php 

    session_start();

    include_once('function.php');
    // var_dump("Login!!");
   $output = "";

   $select_data = new DB_con();

   

    if(!empty($_POST['txt_username']) && !empty($_POST['txt_password']))
    {
        $password = $_POST['txt_password'];
        $username = $_POST['txt_username'];
         $sql = $select_data->selectuser($username); 

    while($row = mysqli_fetch_array($sql))
    {
        if($row['username'] == $username && $row['password'] == $password)
        {
            $_SESSION['name'] = $row['username'];
            $output = "Login Success!!!";
        }
        else{
            $output = "Login Fail Wrong Username or Password !!!";
        }
    }

    }
    else{
        $output.= "Not Found Username or Password!";
    }
    echo $output;
?>