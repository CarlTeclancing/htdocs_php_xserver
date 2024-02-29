<?php
require (".././path.php");
require(DBCONNECT."/connection.php");
require(HELPERS."/redirect.php");

session_start();

if(isset($_POST['login'])){

    $emailLog = mysqli_real_escape_string($connection, $_POST["email"]);
    $passwordLog = mysqli_real_escape_string($connection, $_POST["password"]);

    $query = "SELECT * FROM users WHERE email = '{$emailLog}'";
    
    $result = mysqli_query($connection, $query);
    
            if(mysqli_num_rows($result) == 0){

                redirect(BASEURL."/login.php?error='usernotfound'");
                $_SESSION['error'] = "User not found";

            }else{
                
                while($row = mysqli_fetch_assoc($result)){
                    
                    $userId = $row["id"];
                    $roleId = $row["role_id"];
                    $uniqueId = $row['uniqueId'];
                    $email = $row['email'];
                    $password = $row['password'];
                    $statusId = $row['status_id'];


                    if($emailLog !== $email || $passwordLog !== $password){
                        redirect(BASEURL."/login.php?error='wrongemail'");
                        $_SESSION['error'] = "Incorrect user email or password";
                    }
                    elseif(empty($userId)){
                        redirect(BASEURL."/login.php?error='nouseraccount'");
                        $_SESSION['error'] = "Sorry you don't have a user account";
                    }elseif($statusId == 6){//status inactive
                        redirect(BASEURL."/login.php?error='inactiveaccount'");
                        $_SESSION['error'] = "Sorry your account is not active";
                    }
                    
                    else{


                        if($roleId == 8){  //admin
                            $query = "SELECT * FROM admin WHERE uniqueId = '{$uniqueId}'";
                        }elseif($roleId == 9){ //teacher
                            $query = "SELECT * FROM teachers WHERE uniqueId = '{$uniqueId}'";
                        }elseif($roleId == 10){ //student
                            $query = "SELECT * FROM students WHERE uniqueId = '{$uniqueId}'";
                        }else{
                            redirect(BASEURL);
                            $_SESSION['error'] = "User Role Error";
                        }
    
                        $result = mysqli_query($connection, $query);
    
                        foreach($result as $user){

                            $_SESSION["userId"] = $user['id'];
                            $_SESSION["firstName"] = $user['firstname'];
                            $_SESSION["lastName"] = $user['lastname'];
                            $_SESSION["uniqueId"] = $uniqueId;
                            $_SESSION["roleId"] = $roleId;
                            $_SESSION["classId"] = $user['class_id'];
        
                        
                            if($_SESSION['roleId'] == 8){  //admin
                                
                                redirect(BASEURL."/admin");
                                $_SESSION['success'] = "login successful";

                            }elseif($roleId == 9){ //teacher

                                redirect(BASEURL."/admin");
                                $_SESSION['success'] = "login successful";

                            }elseif($roleId == 10){ //student

                                redirect(BASEURL."/admin");
                                $_SESSION['success'] = "login successful";

                            }else{
                                redirect(BASEURL);
                            }
    
                        }

                    }

                }
                
         }
}else{
    redirect(BASEURL);
}



    