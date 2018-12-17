<?php require_once 'dataProvider.php'; ?>
<?php require_once 'module/functions.php'; ?>
<?php 
	require_once 'module/Database.php';
    $db = new Database;

    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    echo "<script>alert('Log out thanh cong');location.href = 'index.php'</script>";
?>