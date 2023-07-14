<?php
include "../db/dbConn.php";
session_start();

if (isset($_GET['email']) && isset($_GET['v_cod'])) {
    $email = $_GET['email'];
    $v_cod = $_GET['v_cod'];

    $sql = "SELECT * FROM users WHERE Email = '$email' "; 
    $result = $connection->query($sql);
    
    if ($result) {

        if ($result->num_rows == 1) {
            
            $row = $result->fetch_assoc();
            $fetch_Email = $row['Email'];
            $NationalNumber = $row['NationalNumber'];
            $password = $row['Password'];
            $userId = $row['UserID'];
            $oldv_cod = $row['verification_id'];
            // if ($oldv_cod != $v_cod)
            if ($row['verification_status'] == 0 && $oldv_cod == $v_cod ) {
                $newv_cod=bin2hex(random_bytes(16));
                $update = "UPDATE users SET verification_status='1', verification_id = '$newv_cod' WHERE Email = '$fetch_Email'";

                if ($connection->query($update) === TRUE) {
                     $_SESSION['NationalNumber'] =$NationalNumber;
                     $_SESSION['password'] =$password;
                     $_SESSION['userId'] =$userId;
                    echo "
                        <script>
                            alert('verification successful');
                            window.location.href='user_dashboard.php'
                        </script>";
                } 
                // else {
                //     echo "
                //         <script>
                //             alert('query can not run');
                //             window.location.href='dashbord.php' 
                //         </script>";
                // }
            }
             else {
                echo "
                        <script>
                            alert('الرابط لم يعد صالح ');
                            window.location.href='user_dashboard.php'
                        </script>";
            }
        }
    }
} else {
    
    // echo "test";
    
    "
        <script>
            alert('server down!!');
            window.location.href='user_dashboard.php'
        </script>
    ";
}
