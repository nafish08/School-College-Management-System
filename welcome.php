<?php
include 'config.php';
session_start();
if ($_SESSION["user_id"] == 'id') {
    if (!isset($_SESSION["user_id"])) {
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/navigation.css" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">Students Data</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="welcome.php">
                    <i class='bx bxs-layer'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="registered.php">
                    <i class='bx bx-user-check'></i>
                    <span class="links_name">Registered Students</span>
                </a>
                <span class="tooltip">Registered Students</span>
            </li>
            <li>
                <a href="form/index.html">
                    <i class='bx bxs-add-to-queue'></i>
                    <span class="links_name">Registration Form</span>
                </a>
                <span class="tooltip">Registration Form</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <div class="name_job">
                        <div class="name">Copyright &copy; 2021 <br> ARTHOR Limited</div>
                    </div>
                </div>
                <i class='bx bxs-copyright' id="copyright"></i>
            </li>
        </ul>
    </div>

    <main class="home-section">
        <header class="header">
            <div class="page-header-container">
                <h3 class="page-header">
                    Pending Requests For Addmission
                </h3>
            </div>
            <div class="logout_btn">
                <a class="logout" href="logout.php"><i class='bx bx-exit'></i></a>
            </div>

        </header>

        <!--Table Data Display Section-->
        <?php

        $search_sql = "SELECT * FROM student_info WHERE status=''";
        $res = mysqli_query($conn, $search_sql);
        ?>

        <section class="table-data">
            <table>
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Student Name</th>
                        <th>Student Class</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($res)) :
                    $_SESSION['birth_no'] = $row["birth_cirtificate_no"];
                ?>
                    <tbody>
                        <tr>
                            <td data-label="Sl."><?php echo $row["id"]; ?></td>
                            <td data-label="Student Name"><?php echo $row["student_name"]; ?></td>
                            <td data-label="Student Class"><?php echo $row["student_class"]; ?></td>
                            <td style="width: 200px;">
                                <div class="popup" id="popup-1">
                                    <div class="overlay"></div>
                                    <div class="content">
                                        <div class="close-btn" onclick="togglePopup()">&times;</div>
                                        <!-- <h1>Title</h1> -->
                                        <table id="popup-table">
                                            <tbody>
                                                <tr>
                                                    <th>Sl.</th>
                                                    <td data-label="Sl."><?php echo $row["id"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Student Name</th>
                                                    <td data-label="Student Name"><?php echo $row["student_name"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Student Class</th>
                                                    <td data-label="Student class"><?php echo $row["student_class"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Father's Name</th>
                                                    <td data-label="Father's Name"><?php echo $row["father_name"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Father's NID</th>
                                                    <td data-label="Father's NID"><?php echo $row["father_nid"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Father's Contact</th>
                                                    <td data-label="Father's Contact"><?php echo $row["father_contact"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Mother's Name</th>
                                                    <td data-label="Mother's Name"><?php echo $row["mother_name"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Mother's NID</th>
                                                    <td data-label="Mother's NID"><?php echo $row["mother_nid"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Mother's Contact</th>
                                                    <td data-label="Mother's Contact"><?php echo $row["mother_contact"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Gurdian's Name</th>
                                                    <td data-label="Gurdian's Name"><?php echo $row["gurdian_name"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Gurdian's NID</th>
                                                    <td data-label="Gurdian's NID"><?php echo $row["gurdian_nid"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Gurdian's Contact</th>
                                                    <td data-label="Gurdian's Contact"><?php echo $row["gurdian_contact"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Date of Birth</th>
                                                    <td data-label="Date of Birth"><?php echo $row["date_of_birth"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Birth Registration No.</th>
                                                    <td data-label="Birth Registration No"><?php echo $row["birth_cirtificate_no"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Blood Group</th>
                                                    <td data-label="Blood Group"><?php echo $row["blood_group"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td data-label="Present Address"><?php echo $row["address"]; ?></td>
                                                </tr>
                                                <tr class="space-between-table">
                                                    <th>Emergency Contact</th>
                                                    <td data-label="Emergency Contact"><?php echo $row["emergency_contact"]; ?></td>
                                                </tr>
                                                <tr id="btn-row">
                                                    <td colspan="2">
                                                        <form action="" method="POST">
                                                            <button id="approve" type="submit" name="approve">Approve</button>
                                                            <button id="reject" type="submit" name="reject">Reject</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <button id="show-details-btn" onclick="togglePopup()">Show Details</button>
                            </td>
                        </tr>
                    </tbody>
                <?php
                endwhile;
                ?>
            </table>
        </section>
        <?php

        // For Student Data Approve
        if (isset($_POST['approve'])) {
            mysqli_query($conn, "UPDATE student_info SET status='Approved' WHERE birth_cirtificate_no='$_SESSION[birth_no]';");
            unset($_SESSION['birth_no']);
        }

        // For Student Data Reject
        if (isset($_POST['reject'])) {
            mysqli_query($conn, "DELETE FROM student_info WHERE birth_cirtificate_no='$_SESSION[birth_no]';");
            unset($_SESSION['birth_no']);
        }
        ?>
    </main>

    <!--Popup Function-->
    <script>
        function togglePopup() {
            document.getElementById("popup-1").classList.toggle("active");
        }
    </script>

    <!--For navigation bar minimization-->
    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });
        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }
    </script>
</body>

</html>