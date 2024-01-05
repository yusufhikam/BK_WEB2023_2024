<?php
session_start();

// Menghapus semua data session
session_unset();

// Menghapus session
session_destroy();

// Mengalihkan ke halaman login
header("Location: index.php");
exit;
?>