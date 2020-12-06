<?php 
include_once("koneksi.php");
session_start();
if(isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>
<html>
<head>
    <style>
    #section{
          position: absolute;
          margin: auto;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          width: 20%;
          height: 350px;
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
        
        table{
            margin-left: 90px;
            font-size: 20px;
            
        }
        input[type=text],input[type=password]{
          width :200px%;
            height: 50px;
        }
    </style>
    <title>Login Page</title>
</head>

<body>
    <div id="section">
        <h1 align="center">Halaman Login</h1>
    <form action="login.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Username</td>
            </tr>
            <tr> 
                <td><input type="text" name="username"></td>
            </tr>
            <tr> 
                <td>Password</td>
                
            </tr>
            <tr> 
                <td><input type="password" name="password"></td>
            </tr>
           <tr><td><br><br></td></tr>
            
            <tr> 
                 
                <td align="center"><input type="submit" name="Submit" value="Login" class="tombol"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into rm table.
    if(isset($_POST['Submit'])) {
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) {
        
         $_SESSION['login_user'] = $username;
          echo "<script>alert('login berhasil');";
              
              echo "window.location.href = 'index.php';</script>";
          }else {
              $sql = "SELECT * FROM admin WHERE email = '$username' and password = '$password'";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          $active = $row['active'];

          $count = mysqli_num_rows($result);


          if($count == 1) {

             $_SESSION['login_user'] = $username;
              echo "<script>alert('login berhasil');";
              
              echo "window.location.href = 'index.php';</script>";
              

          }else {
              echo "<script>alert('Username Password Salah');";
          }
      }
        
        
    }
    ?></div>
</body>
    <?php include("footer.php"); ?>
</html>