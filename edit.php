<?php
// include database connection file
include_once("koneksi.php");
include('session.php');
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
        $id = $_POST['id'];

        $pasien = $_POST['pasien'];
        $tgl = $_POST['tgl'];
        $diagnosa = $_POST['diagnosa'];
        $tindakan = $_POST['tindakan'];
        $keterangan = $_POST['keterangan'];

    // update user data
    $result = mysqli_query($conn, "UPDATE rekammedis SET kd_pasien='$pasien',tgl_periksa='$tgl',diagnosa='$diagnosa',ket='$keterangan',tindakan='$tindakan' WHERE kd_RM=$id");
    // Redirect to homepage to display updated user in list
    echo "<script>alert('Sukses Mengedit Data');";
    echo "window.location.href = 'index.php';</script>";
    
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetch user data based on id
$result = mysqli_query($conn, "SELECT * FROM rekammedis WHERE kd_RM=$id");
$pasien = mysqli_query($conn, "SELECT * FROM rekampasien order by kd_pasien DESC");
while($rekam_medis = mysqli_fetch_array($result))
{   
    $kdpas=$rekam_medis['kd_pasien'];
    $tgl=$rekam_medis['tgl_periksa'];
    $diagnosa=$rekam_medis['diagnosa']; 
    $keterangan=$rekam_medis['ket'];
    $tindakan=$rekam_medis['tindakan'];
}
?>
<html>
<head>  
    <title>Edit Data Rekam Medis</title>
    <style>
        #section{
          position: absolute;
          margin: auto;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          width: 55%;
          height: 550px;
          background-color: white;
          border-radius: 3px;
        }
        body
        {
          background-color: #bcbcbc;

        }
        #formx{
          position: absolute;
          margin: auto;
          left: 30px;

        }
        form{
          font-weight: bold;
        }
    
        .tombol{
          background-color: #d66300;
          width: 100px;
          height: 30px;
          border: 1px solid white;
          color : white;
        }

        .home{
            color: white;
            
        }
        table{
            margin-left: 200px;
            font-size: 20px;
            
        }
         ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: #333;
        }

        li {
          float: left;
        }

        li a {
          display: block;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        li a:hover {
          background-color: #111;
        }
        #footer{

  position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    color: white;

    text-align: center;
    padding-top: 10px;
    padding-bottom: 10px;
  background-color: #0b4654;
}
        input[type=text],textarea{
  width :100%;
}

    </style>
</head>

<body>
    <ul>
  <li><a  href="index.php">Home</a></li>
  <li><a class="active" href="add.php">Edit Rekam Medis</a></li>
        
  <li><a href="logout.php">Logout</a></li>
  
</ul><div id="section">
    <h1 align="center">Halaman Tambah Rekam Medis</h1>
    <br/><br/>
    <form name="update_rekammedis" method="post" action="edit.php">
        <table width="500px" border="0">
            <tr> 
                <td width="50%">Nama Pasien</td>
                <td><select name="pasien">
                <?php while($rekam_pasien = mysqli_fetch_array($pasien)) { 
                    if($rekam_pasien['kd_pasien']!=$kdpas){
                         echo '<option value="'.$rekam_pasien['kd_pasien'].'">'.$rekam_pasien['namaPasien'].'</option>';
                    }
                    else{
                        echo '<option value="'.$rekam_pasien['kd_pasien'].'" selected>'.$rekam_pasien['namaPasien'].'</option>';
                   }
}?></select>
                </td>
            </tr>
            <tr> 
                <td>Tanggal Periksa</td>
                <td><input type="date" name="tgl"value='<?php echo $tgl;?>'></td>
            </tr>
            <tr> 
                <td>Diagnosa</td>
                <td><input type="text" name="diagnosa"value='<?php echo $diagnosa;?>'></td>
            </tr>
            <tr> 
                <td>Tindakan</td>
                <td><input type="text" name="tindakan"value='<?php echo $tindakan;?>'></td>
            </tr>
            <tr> 
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value='<?php echo $keterangan;?>'></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value='<?php echo $_GET['id'];?>'></td>
                <td><input type="submit" name="update" value="Update" class="tombol"></td>
            </tr>
        </table>
    </form></div>
</body>
    <?php include('footer.php'); ?>
</html>