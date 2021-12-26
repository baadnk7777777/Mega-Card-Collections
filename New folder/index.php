<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="title-background">
        <div class="container-fluid">
            <nav class="nav navbar-expand-lg navbar-light">
                <!-- <a href="" class="nav-brand">
                    AnimeCard
                </a> -->
                <span class="navbar-text">
                    <h3 class="titleheading">AnimeCard</h3>

                </span>
                <?php 
                    if(!isset($_SESSION["name"])) {

                    
                ?>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#modalLogin">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#modalSignup">SignUp</a>
                    </li>
                </ul>

                <?php 
                    }else{
                ?>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" id="card">card </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link"><?php echo  $_SESSION["name"] ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                </ul>
                <?php 
                    }
                ?>

            </nav>
        </div>
    </div>
    <table class="table ">
        <tbody>
                <?php
                
                include_once('function.php');
                $fetchdata = new DB_con();

                $sql = $fetchdata->fetchdata_image();
                $count = 0;
                echo '<tr>';
                while($row = mysqli_fetch_array($sql))
                {

                if($count == 5)
                {
                    echo '</tr>';
                    $count = 0;
                }
                if($count < 5)
                {
                    echo '
                    
                    <td>
                    <div class="card mx-auto" style="width: 11rem;">
                    <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" class="card-img-top" alt="...">
                    <div class="card-body mx-auto">
                    <p class="card-text ">'.$row['name'].'</p>
                    </div>
                  </div>
                    </td>
                    ';
                    $count ++;
                }
                
            ?>



                <?php }?>
        </tbody>
    </table>

    <!-- modal Login -->

    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" id="frmLogin">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="loginmodalBody">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txt_username" placeholder="Username"
                                    require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control" name="txt_password" placeholder="Password"
                                    require>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="loginmodalFooter">
                        <button type="submit" class="btn btn-success">Login</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal SignUp -->

    <div class="modal fade" id="modalSignup">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="frmSignup">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="signupmodalbody">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txt_username" placeholder="Username"
                                    require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txt_email" placeholder="Email" require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control" name="txt_password" placeholder="Password"
                                    require>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="signmodalFooter">
                        <button type="submit" class="btn btn-success" value="Submit">Submit</button>
                        <button type="reset" class="btn btn-primary" value="Reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        console.log("Ready Faction!!");

        $("#frmLogin").submit(function() {
            console.log("Submit Pass")
            event.preventDefault();
            $.ajax({
                url: "login.php",
                type: "POST",
                data: $('form#frmLogin').serialize(),
                success: function(data) {
                    console.log("data:" + data);
                    $("#loginmodalBody").html(data);
                    var btnClose =
                        ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                    $("#loginmodalFooter").html(btnClose);
                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                }
            });
        });

        $("#frmSignup").submit(function() {
            console.log("Submit Pass")
            event.preventDefault();
            $.ajax({
                url: "signup.php",
                type: "POST",
                data: $('form#frmSignup').serialize(),
                success: function(data) {
                    console.log("data:" + data);
                    $("#signupmodalbody").html(data);
                    var btnClose =
                        ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                    $("#signmodalFooter").html(btnClose);
                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                }
            });
        });


        $(function() {
            $("#modalLogin, #modalSignup, #bookmodal, #modalbookedit, #modalbookdelete").on(
                "hidden.bs.modal",
                function() {
                    location.reload();
                });
        });



    });
    </script>
</body>

</html>