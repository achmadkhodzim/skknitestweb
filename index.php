<?php
// Create database connection using config file
include_once("koneksi.php");
include('session.php');
// Fetch all users data from database
if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$result = mysqli_query($conn,"select * from rekammedis INNER JOIN rekampasien ON rekammedis.kd_pasien = rekampasien.kd_pasien where rekampasien.namaPasien like '%".$cari."%' ");				
	}else{
$result = mysqli_query($conn, "SELECT * FROM rekammedis INNER JOIN rekampasien ON rekammedis.kd_pasien = rekampasien.kd_pasien order by kd_RM DESC ");
}
?>

<html>
<head>
    <style>
    table.paleBlueRows {
      font-family: "Times New Roman", Times, serif;
      border: 1px solid #FFFFFF;
      text-align: center;
      border-collapse: collapse;
    font-size: 24px;
    }
    table.paleBlueRows td, table.paleBlueRows th {
      border: 1px solid #FFFFFF;
      padding: 3px 2px;
    }
    table.paleBlueRows tbody td {
      font-size: 20px;
        height: 100px;
    }
    table.paleBlueRows tr:nth-child(even) {
      background: #D0E4F5;
    }
    table.paleBlueRows thead {
      background: #0B6FA4;
      border-bottom: 5px solid #FFFFFF;
    }
    table.paleBlueRows thead th {
      font-size: 17px;
      font-weight: bold;
      color: #FFFFFF;
      text-align: center;
      border-left: 2px solid #FFFFFF;
    }
    table.paleBlueRows thead th:first-child {
      border-left: none;
    }

    table.paleBlueRows tfoot {
      font-size: 14px;
      font-weight: bold;
      color: #333333;
      background: #D0E4F5;
      border-top: 3px solid #444444;
    }
    table.paleBlueRows tfoot td {
      font-size: 14px;
    }
        .badan{
            margin-left: 200px;
        }
        h1{
            margin-left: 600px;
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
        html{
  font-family: calibri;
}
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

.tombol{
  background-color: #d66300;
  width: 100px;
  height: 30px;
  border: 1px solid white;
  color : white;
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

    </style>
    <title>Homepage</title>
    
</head>

<body>
    <ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="add.php">Tambah Rekam Medis</a></li>
        
  <li><a href="logout.php">Logout</a></li>
  
</ul>
    <div class="badan">
        <h1>Data Rekam Medis</h1>
    

    <form action="index.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari" placeholder="Masukkan Nama Pasien">
	<input type="submit" value="Cari"  class="tombol">
    </form>
    <table width='80%' border=1 class="paleBlueRows">

    <tr>
        <th>No</th> <th>Pasien</th> <th>Tanggal Periksa</th> <th>Diagnosa</th> <th>Tindakan</th> <th>Keterangan</th> <th>Aksi</th>
    </tr>
    <?php  
    while($rekam_medis = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$rekam_medis['kd_RM']."</td>";
        echo "<td>".$rekam_medis['namaPasien']."</td>";
        echo "<td>".$rekam_medis['tgl_periksa']."</td>";
        echo "<td>".$rekam_medis['diagnosa']."</td>"; 
        echo "<td>".$rekam_medis['tindakan']."</td>";
        echo "<td>".$rekam_medis['ket']."</td>";
        echo "<td><a href='edit.php?id=$rekam_medis[kd_RM]'>Edit</a> | <a href='delete.php?id=$rekam_medis[kd_RM]'>Delete</a></td></tr>";        
    }
    ?>
    </table></div>
</body>
    <?php include('footer.php'); ?>

</html>