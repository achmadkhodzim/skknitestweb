<?php
// include database connection file
include_once("koneksi.php");
include('session.php');
// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM rekammedis WHERE kd_RM=$id");

// After delete redirect to Home, so that latest user list will be displayed.

?>
<script>
alert("Sukses Menghapus Data");
window.location.href = 'index.php';
</script>