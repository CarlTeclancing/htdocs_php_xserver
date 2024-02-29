<?php

    // if(isset($id)){
    //     $id = 1;
    // }else{
    //     $id = 0;
        
    // }
?>

<nav class="nav navbar navbar-expand justify-content-center bg-light text-uppercase w-60 m-auto shadow-sm" style="border-radius: 50px;">

    <ul class="navbar-nav justify-content-center">
        <li class="nav-item">
            <a href="<?= BASE_URL ?>" class="nav-link text-dark">Home</a>
        </li>

        <li class="nav-item">
            <a href="<?= BASE_URL ?>/search.php" class="nav-link text-dark">Search</a>
        </li>

        <li class="nav-item">
            <a href="<?= BASE_URL ?>/missingArchive.php" class="nav-link text-dark">All-Lost-Documents</a>
        </li>

        <li class="nav-item">
            <a href="<?= BASE_URL ?>/foundArchive.php" class="nav-link text-dark">All-Found-Documents</a>
        </li>

        <?php
if(isset($_SESSION['id'])== true) {

    ?>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Account</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= BASE_URL ?>/logout.php">logout</a>
              
            </div>
        </li>
            <?php
}else{
            
            ?>

<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Account</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= BASE_URL ?>/login.php">Login</a>
                <a class="dropdown-item" href="<?= BASE_URL ?>/signup.php">Register</a>
              
            </div>
        </li>

        <?php
        }
        ?>
    </ul>

</nav>