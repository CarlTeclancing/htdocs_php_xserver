  <?php
  require(HELPERS . "/dbselect.php");
  $systemInfo = selectGetAll('system');
  foreach ($systemInfo as $info) :
  ?>


    <?php
    // user role control
        $hideFromBoth;
        $hideFromStudent;
        $hideFromTeacher;
        
        if($_SESSION['roleId'] == 9 || $_SESSION['roleId'] == 10){
          $hideFromBoth = "d-none";
        }

        if($_SESSION['roleId'] == 8 || $_SESSION['roleId'] == 9){
          $hideFromAdminTeacher = 'd-none';
        }
       
        if($_SESSION['roleId'] == 10){
          $hideFromStudent = "d-none";
        }
       if($_SESSION['roleId'] == 9){
          $hideFromTeacher = "d-none";
        }

        if($_SESSION['roleId'] == 7){
          $hideFromAdmin = "d-none";
        }

      ?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?= BASEURL ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $info['name']; ?></span>
      </a>


      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <?php if (isset($_SESSION['profile'])) : ?>
              <img src="<?= BASEURL ?>/assets/dist/img/<?= $_SESSION['profile']; ?>" class="img-circle elevation-2" alt="User Image">
            <?php else : ?>
              <img src="<?= BASEURL ?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            <?php endif; ?>
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
              <a href="<?= BASEURL ?>/admin" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <?php

            /*  
            @ keep the menu open if any dropdown list is active
          
          */
            $showClassDropDown = "";

            if (basename($_SERVER["PHP_SELF"]) === "all-classes.php" || basename($_SERVER["PHP_SELF"]) === "add-class.php" || basename($_SERVER["PHP_SELF"]) === "edit-class.php") {
              $showClassDropDown = "menu-open";
            } else {
              $showClassDropDown = "menu-close";
            }

            ?>


            <li class="nav-item has-treeview <?= $showClassDropDown; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-school"></i>
                <p>
                  Class
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= BASEURL ?>/admin/class/all-classes.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Classes</p>
                  </a>
                </li>
                <li class="nav-item <?= $hideFromBoth; ?>">
                  <a href="<?= BASEURL ?>/admin/class/add-class.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Classes</p>
                  </a>
                </li>

              </ul>
            </li>


            <?php

            /*  
                @ keep the menu open if any dropdown list is active

              */
            $showCourseDropdown = "";

            if (basename($_SERVER["PHP_SELF"]) === "all-courses.php" || basename($_SERVER["PHP_SELF"]) === "add-course.php" || basename($_SERVER["PHP_SELF"]) === "edit-course.php") {
              $showCourseDropdown = "menu-open";
            } else {
              $showCourseDropdown = "";
            }

            ?>




            <li class="nav-item has-treeview <?= $hideFromBoth; ?> <?= $showCourseDropdown; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Course
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= BASEURL ?>/admin/course/all-courses.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Courses</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= BASEURL ?>/admin/course/add-course.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Courses</p>
                  </a>
                </li>

              </ul>
            </li>

            <?php

            /*  
              @ keep the menu open if any dropdown list is active

            */
            $showTeacherDropdown = "";

              if (basename($_SERVER["PHP_SELF"]) === "all-teachers.php" || basename($_SERVER["PHP_SELF"]) === "add-teacher.php" || basename($_SERVER["PHP_SELF"]) === "edit-teacher.php") {
                $showTeacherDropdown = "menu-open";
              } else {
                $showTeacherDropdown = "";
              }

            ?>



            <li class="nav-item has-treeview <?= $showTeacherDropdown; ?> <?= $hideFromBoth; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                  Teacher
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= BASEURL ?>/admin/teacher/all-teachers.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Teachers</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= BASEURL ?>/admin/teacher/add-teacher.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Teacher</p>
                  </a>
                </li>

              </ul>
            </li>

              <?php

            /*  
              @ keep the menu open if any dropdown list is active

            */
            $showStudentDropdown = "";

              if (basename($_SERVER["PHP_SELF"]) === "all-students.php" || basename($_SERVER["PHP_SELF"]) === "add-student.php" || basename($_SERVER["PHP_SELF"]) === "edit-student.php") {
                $showStudentDropdown = "menu-open";
              } else {
                $showStudentDropdown = "";
              }

            ?>



            <li class="nav-item has-treeview <?= $showStudentDropdown; ?> <?= $hideFromBoth; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                  Student
                  <i class="fas fa-angle-left right"></i>
                 
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= BASEURL ?>/admin/student/all-students.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Students</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= BASEURL ?>/admin/student/add-student.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Student</p>
                  </a>
                </li>

              </ul>
            </li>





            <?php  /*  
              @ keep the menu open if any dropdown list is active

            */
            $showUserDropdown = "";

              if (basename($_SERVER["PHP_SELF"]) === "all-users.php" || basename($_SERVER["PHP_SELF"]) === "add-user.php" || basename($_SERVER["PHP_SELF"]) === "edit-user.php") {
                $showUserDropdown = "menu-open";
              } else {
                $showUserDropdown = "";
              }

            ?>

             



            <li class="nav-item has-treeview <?= $showUserDropdown; ?> <?= $hideFromBoth?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                  User Accounts
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= BASEURL ?>/admin/user/all-users.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= BASEURL ?>/admin/user/add-user.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add User</p>
                  </a>
                </li>

              </ul>
            </li>





            <?php  /*  
              @ keep the menu open if any dropdown list is active

            */
            $showComplainDropdown = "";

              if (basename($_SERVER["PHP_SELF"]) === "all-complains.php" || basename($_SERVER["PHP_SELF"]) === "send-complain.php" || basename($_SERVER["PHP_SELF"]) === "edit-complain.php"  || basename($_SERVER["PHP_SELF"]) === "view-complain.php" || basename($_SERVER["PHP_SELF"]) === "reply-complain.php" || basename($_SERVER["PHP_SELF"]) === "see-reply.php") {
                $showComplainDropdown = "menu-open";
              } else {
                $showComplainDropdown = "";
              }

            ?>

             



            <li class="nav-item has-treeview <?= $showComplainDropdown; ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                  Complains
                  <i class="fas fa-angle-left right"></i>
                  <?php
                    $currentUser = $_SESSION['userId'];
                    $complainQuery = "SELECT * FROM complains WHERE view = 0 AND teacher_id = $currentUser";
                    $result = mysqli_query($connection, $complainQuery);
                      if(mysqli_num_rows($result) > 0):
                        
                      $newComplains = mysqli_num_rows($result);
                  ?>
                  <span class="badge badge-danger right"><?= $newComplains;?></span>
                  <?php else: ?>
                    <span></span>
                  <?php endif; ?>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item <?= $hideFromStudent;?>">
                  <a href="<?= BASEURL ?>/admin/complain/all-complains.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Complains</p>
                  </a>
                </li>
                <li class="nav-item <?= $hideFromAdminTeacher;?>">
                  <a href="<?= BASEURL ?>/admin/complain/send-complain.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Send a Complain</p>
                  </a>
                </li>

    
              </ul>
            </li>




            <?php  /*  
              @ keep the menu open if any dropdown list is active

            */
            $showAttendanceDropdown = "";

              if (basename($_SERVER["PHP_SELF"]) === "mark-attendance.php" || basename($_SERVER["PHP_SELF"]) === "attendance-sheet.php" || basename($_SERVER["PHP_SELF"]) === "all-attendance.php"|| basename($_SERVER["PHP_SELF"]) === "general-attendance.php") {
                $showAttendanceDropdown = "menu-open";
              } else {
                $showAttendanceDropdown = "";
              }

            ?>

             



            <li class="nav-item has-treeview <?= $showAttendanceDropdown; ?>">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-clock"></i>
                <p>
                  Attendance
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item <?= $hideFromAdminTeacher;?>">
                  <a href="<?= BASEURL ?>/admin/attendance/mark-attendance.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mark Attendance</p>
                  </a>
                </li>


                <li class="nav-item <?= $hideFromAdminTeacher;?>">
                  <a href="<?= BASEURL ?>/admin/attendance/attendance-sheet.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Attendance Sheet</p>
                  </a>
                </li>

                <li class="nav-item  <?= $hideFromStudent;?>">
                  <a href="<?= BASEURL ?>/admin/attendance/all-attendance.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>General Attendance</p>
                  </a>
                </li>


    
              </ul>
            </li>

         

            <?php  /*  
              @ keep the menu open if any dropdown list is active

            */
            $showSettingsDropdown = "";

              if (basename($_SERVER["PHP_SELF"]) === "settings.php") {
                $showSettingsDropdown = "menu-open";
              } else {
                $showSettingsDropdown = "";
              }

            ?>

             



            <li class="nav-item has-treeview <?= $hideFromBoth;?> <?= $showSettingsDropdown; ?>">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
                <p>
                  System
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= BASEURL ?>/admin/system/settings.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Settings</p>
                  </a>
                </li>

              </ul>
            </li>


<!-- 
            <li class="nav-item has-treeview">
              <a href="<?= BASEURL ?>/admin/logout.php" class="nav-link btn btn-danger btn-block">
                <i class="nav-icon fas fa-user-alt-slash"></i>
                <p>
                  Logout
                </p>
              </a>
            </li> -->


          </ul>

        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>


  <?php endforeach; ?>