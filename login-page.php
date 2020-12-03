<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-pg.css">
    <title>Seminar Teknologi dan Informasi</title>
  </head>
  <body>
    <table class="logo">
        <tr>
            <td colspan="2">
                <div>
                <img src="asset/graduate.png" alt="" width="50" height="50">
                <h3>&nbsp;Seminar Teknologi dan Informasi</h3>
                </div>
            </td>
        </tr>
    </table>
    <div id="rec-bg"></div>
    <div class="container">
        <div class="row right">
            <div class="col-md-8">
                <h1 class="judul1">Masuk Akun</h1>
                <form action="" method="POST">
                    <div class="form-group col-md-8">
                        <label for="username">Username</label>
                        <input type="user" class="form-control" name="username" id="exampleInputUsername" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="validationDefault04">Identitas</label>
                        <select class="custom-select" id="validationDefault04"  name="identitas" required>
                            <option selected disabled value="">Pilih ...</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dospem">Dosen</option>
                            <option value="kaprodi">KAProdi</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-warning" name="login" value="Masuk">
                </form>
            
                <h4 class="judul3">Copyright &copy; 2020 || Developed By Team 7</h4>
            </div>
            <div class="col-md-4 right">
                <img class="img-right1" src="asset/path2.png" alt="">
                <img class="img-right2" src="asset/Pic.png" alt="">
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>

<?php

require_once("config.php");

if (isset($_POST['login'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $identitas = filter_input(INPUT_POST, 'identitas', FILTER_SANITIZE_STRING);


    if ($identitas == "mahasiswa") {
        $sql = "SELECT * FROM mahasiswa WHERE username=:username";
        $stmt = $db->prepare($sql);
        $params = array(
            ":username" => $username,
        );
        $stmt->execute($params);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($password == $user["password"]) {
            session_start();
            $_SESSION["user"] = $user;
            header("Location: mhs-listdosen.php");   
            $password_hash = password_hash($user["password"], PASSWORD_DEFAULT);
            $sql = "UPDATE mahasiswa SET password =:password WHERE username=:username";
            $stmt = $db->prepare($sql);
            $params = array(
                ":username" => $username,
                ":password" => $password_hash,
            );
            $stmt->execute($params);        
        } elseif(password_verify($password, $user["password"])){
            session_start();
            $_SESSION["user"] = $user;
            header("Location: mhs-listdosen.php");
        } // else password salah 
    }

    if ($identitas == "dospem") {
        $sql = "SELECT * FROM dospem WHERE username=:username";
        $stmt = $db->prepare($sql);
        $params = array(
            ":username" => $username,
        );
        $stmt->execute($params);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($password == $user["password"]) {
            session_start();
            $_SESSION["user"] = $user;
            header("Location: dosenpage.php");   
            $password_hash = password_hash($user["password"], PASSWORD_DEFAULT);
            $sql = "UPDATE dospem SET password =:password WHERE username=:username";
            $stmt = $db->prepare($sql);
            $params = array(
                ":username" => $username,
                ":password" => $password_hash,
            );
            $stmt->execute($params);        
        } elseif(password_verify($password, $user["password"])){
            session_start();
            $_SESSION["user"] = $user;
            header("Location: dosenpage.php");
        } // else password salah 
    }

    if ($identitas == "kaprodi") {
        $sql = "SELECT * FROM kaprodi WHERE username=:username";
        $stmt = $db->prepare($sql);
        $params = array(
            ":username" => $username,
        );
        $stmt->execute($params);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($password == $user["password"]) {
            session_start();
            $_SESSION["user"] = $user;
            header("Location: kaprodipage.php");   
            $password_hash = password_hash($user["password"], PASSWORD_DEFAULT);
            $sql = "UPDATE kaprodi SET password =:password WHERE username=:username";
            $stmt = $db->prepare($sql);
            $params = array(
                ":username" => $username,
                ":password" => $password_hash,
            );
            $stmt->execute($params);        
        } elseif(password_verify($password, $user["password"])){
            session_start();
            $_SESSION["user"] = $user;
            header("Location: kaprodipage.php");
        } // else password salah 
    }
}
?>