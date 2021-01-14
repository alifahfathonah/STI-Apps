<?php
require_once("auth.php");
require_once("config.php");
if ($_SESSION["user"]["hasDaftar"] == 1) header('Location: mhs-listdosen.php');

if (isset($_POST['submit'])) {
    header("Location: pengumuman.php");
    $namaMhs = $_SESSION["user"]["namaMhs"];
    $judul = filter_input(INPUT_POST, 'judul', FILTER_SANITIZE_STRING);
    $kategori = filter_input(INPUT_POST, 'kategori', FILTER_SANITIZE_STRING);
    $idMhs = $_SESSION["user"]["id_mhs"];
    $idDospem = $_GET["id_dospem"];

    $sql = "INSERT INTO judul (id_mhs, id_dospem, penulis, judulprop, kategori, penerimaan, pengesahan) VALUES ('$idMhs', '$idDospem', '$namaMhs', '$judul', '$kategori', '-', '-')";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE dospem SET kuota=:kuota, pendaftar=:pendaftar WHERE id_dospem=:id_dospem";
    $stmt = $db->prepare($sql);
    $params = array(
        ":kuota" => ($_GET["kuota"] - 1),
        ":pendaftar" => ($_GET["pendaftar"] + 1),
        ":id_dospem" => $_GET["id_dospem"],
    );
    $stmt->execute($params);

    $sql = "UPDATE mahasiswa SET hasDaftar=1, isTolak='0' WHERE id_mhs=$idMhs";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    // echo    "<script>Swal.fire({
    //             title: 'Submit Data Berhasil!',
    //             text: 'Mohon menunggu informasi berikutnya !!',
    //             icon: 'success',
    //             showCancelButton: false,
    //             confirmButtonColor: '#3085d6',
    //             cancelButtonColor: '#d33',
    //             confirmButtonText: 'Oke'
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 document.location.href = 'logout.php';
    //             }
    //         })</script>";
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mhsform.css">
    <script src='js/sweetalert2.all.min.js'></script>
    <title>Dashboard Mahasiswa - Form STI</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="mhs-listdosen.php">
            <img src="../STI-Apps/asset/icon/mhs.png" width="35" height="35" class="d-inline-block align-top" alt="" loading="lazy">
            &nbsp; Dashboard Mahasiswa
        </a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <!-- <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a> -->
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <span class="navbar-text">
                        &emsp;&emsp;&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                        Formulir Pengisian Proposal STI
                    </span>
                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </li>
            </ul>
            <h6 class="mr-3"><?php echo $_SESSION["user"]["namaMhs"] ?></h6>
            <li class="dropdown">
                <a href="#">
                    <img src="asset/Profile.png" alt="" width="40" height="40">
                </a>
                <ul class="isi-dropdown">
                    <li>
                        <a href="logout.php">
                            <img src="asset/icon/ic_log.png" alt="" width="75" height="30"></a>
                    </li>
                </ul>
            </li>
        </div>
    </nav>

    <div class="container">
        <div class="row right justify-content-center">
            <div class="col-md-6">
                <h1 class="judul1">Formulir <br> Seminar Teknologi dan Informasi</h1>
                <form action="" method="POST">
                    <div class="form-group col-md-12">
                        <label for="namaMhs">Nama Lengkap</label>
                        <input type="text" class="form-control" name="namaMhs" id="namaMhs" value="<?php echo $_SESSION["user"]["namaMhs"] ?>" disabled>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="namaDospem">Pilihan Dosen</label>
                        <input type="text" class="form-control" name="namaDospem" id="namaDospem" value="<?php echo $_GET["namaDospem"] ?>" disabled>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="judul">Judul Proposal</label>
                        <input type="text" class="form-control" id="judul" name="judul" required autofocus>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="kategori">Kategori</label>
                        <select class="custom-select" id="kategori" name="kategori" required>
                            <option selected disabled value="">Pilih ...</option>
                            <option value="AI">Artificial Intelligence</option>
                            <option value="Business">Business</option>
                            <option value="Cyber Security">Cyber Security</option>
                            <option value="Data Scientist">Data Scientist</option>
                            <option value="Software Engineer">Software Engineer</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary formIn" name="submit" value="Submit">
                </form>

                <h4 class="judul3">Copyright &copy; 2020 || Developed By Team 7</h4>
            </div>

            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
            <script src="js/sweetalert2.all.min.js"></script>
            <!-- <script>
                //$('.formIn').on('click', function(e){
                    //e.preventDefault();
                    Swal.fire({
                        title: 'Submit Data Berhasil!',
                        text: "Mohon menunggu informasi berikutnya !!",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oke'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Swal.fire(
                            // 'Submit Data Berhasil!',
                            // 'Mohon menunggu informasi berikutnya !',
                            // 'success'
                            // )

                            document.location.href = "logout.php";
                        }
                    })
                };


                // const tombol = document.querySelector('#formIn');
                // tombol.addEventListener('click', function(){
                //     Swal({
                //         title : 'Submit Data Berhasil !',
                //         text : 'Mohon menunggu informasi berikutnya',
                //         type: 'success',
                //         confirmButtonText:'Ok'
                //     }).then((result)=> {
                //         if(result.isConfirmed) {
                //             tombol.setAttribute("name", "submit");
                //         }
                //     });
                // });
            </script> -->
            <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>