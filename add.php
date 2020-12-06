<?php 
include_once("koneksi.php");
include('session.php');
$result = mysqli_query($conn, "SELECT * FROM rekampasien order by kd_pasien DESC");
?>
<html>
<head>
    <title>Tambah Rekam Medis</title>
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
  <li><a class="active" href="add.php">Tambah Rekam Medis</a></li>
        
  <li><a href="logout.php">Logout</a></li>
  
</ul>
    <div id="section">
        <h1 align="center">Halaman Tambah Rekam Medis</h1>
    <br/><br/>
    <form action="add.php" method="post" name="form1">
        
        <table width="500px" border="0">
            <tr> 
                <td width="50%">Nama Pasien</td>
                <td><select name="pasien">
                <?php while($rekam_pasien = mysqli_fetch_array($result)) {          
                    echo '<option value="'.$rekam_pasien['kd_pasien'].'">'.$rekam_pasien['namaPasien'].'</option>';}
                    ?></select>
                </td>
            </tr>
            <tr> 
                <td>Tanggal Periksa</td>
                <td><input type="date" name="tgl" required></td>
            </tr>
            <tr> 
                <td>Diagnosa</td>
                <td><input type="text" name="diagnosa" required></td>
            </tr>
            <tr> 
                <td>Tindakan</td>
                <td><input type="text" name="tindakan" required></td>
            </tr>
            <tr> 
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" required></td>
            </tr>
            <tr> 
                <td></td>
                <td><input class="tombol" type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    </div>
    <?php

    if(isset($_POST['Submit'])) {
        $pasien = $_POST['pasien'];
        $tgl = $_POST['tgl'];
        $diagnosa = $_POST['diagnosa'];
        $tindakan = $_POST['tindakan'];
        $keterangan = $_POST['keterangan'];
        $result = mysqli_query($conn, "INSERT INTO rekammedis(kd_pasien,tgl_periksa,diagnosa,tindakan,ket) VALUES('$pasien','$tgl','$diagnosa','$tindakan','$keterangan')");
        echo "<script>alert('Sukses Menambah Rekam Medis');";
        echo "window.location.href = 'index.php';</script>";
    }
    ?>
</body>
    <?php include('footer.php'); ?>
</html>