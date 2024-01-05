<?php
session_start();

// Database connection
include ('koneksi.php');
$username = $_POST['username'];
$password = $_POST['password'];
$selectedRole = $_POST['jabatan'];
$query = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$username' AND password='$password'");

$cekData = mysqli_num_rows($query);

if ($cekData > 0) {
    $row = mysqli_fetch_assoc($query);
    

    if($selectedRole == $row['role']){
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $selectedRole;

        // if($selectedRole == "dokter"){
        //     $id_dokter = ambil_id_dokter($username, $koneksi);
        //     $_SESSION['id_dokter'] = $id_dokter;
        // }
        
       
        // Redirect ke halaman dashboard berdasarkan role
        if ($selectedRole == "admin") {
            header('Location:../admin_dashboard.php');
        } else if ($selectedRole == "dokter") {
            $id_dokter = ambil_id_dokter($username, $koneksi);
            $_SESSION['id_dokter'] = $id_dokter;

            header('Location:../dokter_dashboard.php');
        } else{
            header('Location:../index.php?error=3');
        }
    } else {
        header('Location:../index.php?error=3');
    } 
}
else if($username == '' || $password == ''){
    header('Location:../index.php?error=2');
} 
else{
    header('Location:../index.php?error=1');
}
?>