<?php
require_once("auth.php");
require_once("config.php");
if ($_SESSION["user"]["hasDaftar"] == 1) header('Location: mhs-listdosen.php');

// if (isset($_POST['submit'])) {
//     //header("Location: logout.php");
//     $namaMhs = $_SESSION["user"]["namaMhs"];
//     $judul = filter_input(INPUT_POST, 'judul', FILTER_SANITIZE_STRING);
//     $kategori = filter_input(INPUT_POST, 'kategori', FILTER_SANITIZE_STRING);
//     $idMhs = $_SESSION["user"]["id_mhs"];
//     $idDospem = $_GET["id_dospem"];

//     $sql = "INSERT INTO judul (id_mhs, id_dospem, penulis, judulprop, kategori, penerimaan, pengesahan) VALUES ('$idMhs', '$idDospem', '$namaMhs', '$judul', '$kategori', '-', '-')";
//     $stmt = $db->prepare($sql);
//     $stmt->execute();

//     $sql = "UPDATE dospem SET kuota=:kuota, pendaftar=:pendaftar WHERE id_dospem=:id_dospem";
//     $stmt = $db->prepare($sql);
//     $params = array(
//         ":kuota" => ($_GET["kuota"] - 1),
//         ":pendaftar" => ($_GET["pendaftar"] + 1),
//         ":id_dospem" => $_GET["id_dospem"],
//     );
//     $stmt->execute($params);

//     $sql = "UPDATE mahasiswa SET hasDaftar=1 WHERE id_mhs=$idMhs";
//     $stmt = $db->prepare($sql);
//     $stmt->execute();

    // $sql = "UPDATE mahasiswa SET hasDaftar=1, isTolak='0' WHERE id_mhs=$idMhs";
    // $stmt = $db->prepare($sql);
    // $stmt->execute();
// }

// if (isset($_POST['submit'])) {
//     header("Location: pengumuman.php");
//     $namaMhs = $_SESSION["user"]["namaMhs"];
//     $judul = filter_input(INPUT_POST, 'judul', FILTER_SANITIZE_STRING);
//     $kategori = filter_input(INPUT_POST, 'kategori', FILTER_SANITIZE_STRING);
//     $idMhs = $_SESSION["user"]["id_mhs"];
//     $idDospem = $_GET["id_dospem"];

//     $sql = "INSERT INTO judul (id_mhs, id_dospem, penulis, judulprop, kategori, penerimaan, pengesahan) VALUES ('$idMhs', '$idDospem', '$namaMhs', '$judul', '$kategori', '-', '-')";
//     $stmt = $db->prepare($sql);
//     $stmt->execute();

//     $sql = "UPDATE dospem SET kuota=:kuota, pendaftar=:pendaftar WHERE id_dospem=:id_dospem";
//     $stmt = $db->prepare($sql);
//     $params = array(
//         ":kuota" => ($_GET["kuota"] - 1),
//         ":pendaftar" => ($_GET["pendaftar"] + 1),
//         ":id_dospem" => $_GET["id_dospem"],
//     );
//     $stmt->execute($params);

//     $sql = "UPDATE mahasiswa SET hasDaftar=1, isTolak='0' WHERE id_mhs=$idMhs";
//     $stmt = $db->prepare($sql);
//     $stmt->execute();
// }
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
                <form action="" method="POST" id="myForm">
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
                    <input type="hidden" name="id_dospem" id="id_dospem" value="<?php echo $_GET["id_dospem"] ?>">
                    <input type="hidden" name="kuota" id="kuota" value="<?php echo $_GET["kuota"] ?>">
                    <input type="hidden" name="pendaftar" id="pendaftar" value="<?php echo $_GET["pendaftar"] ?>">
                    <input type="submit" class="btn btn-primary" id="formIn" name="submit" value="Submit">
                </form>

                <h4 class="judul3">Copyright &copy; 2020 || Developed By Team 7</h4>
            </div>

            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
            <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->
            <link rel="stylesheet" href="@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="js/sweetalert2.all.min.js"></script>

            <script type="text/javascript">
                //ALhamdulillah Fixx
                // $(function(){
                //     $('#formIn').click(function(e){

                //         var valid = this.form.checkValidity();
                        
                //         if(valid){

                //         var namaMhs 	= $('#namaMhs').val();
                //         var namaDospem	= $('#namaDospem').val();
                //         var judul 		= $('#judul').val();
                //         var kategori    = $('#kategori').val();
                //         var id_dospem   = $('#id_dospem').val();
                //         var kuota       = $('#kuota').val();
                //         var pendaftar   = $('#pendaftar').val();
                        

                //             e.preventDefault();	

                //             $.ajax({
                //                 type: 'POST',
                //                 url: 'proses.php',
                //                 data: {namaMhs: namaMhs,namaDospem: namaDospem,judul: judul,kategori: kategori,id_dospem : id_dospem,kuota:kuota,pendaftar:pendaftar},
                //                 success: function(data){
                //                 Swal.fire({
                //                             'title': 'Successful',
                //                             'text': data,
                //                             'type': 'success'
                //                             })
                                        
                //                 },
                //                 error: function(data){
                //                     Swal.fire({
                //                             'title': 'Errors',
                //                             'text': 'There were errors while saving the data.',
                //                             'type': 'error'
                //                             })
                //                 }
                //             });
                //         }else{
                            
                //         }
                //     });		
                // });

                $(function(){
                    $('#formIn').click(function(e){

                        var valid = this.form.checkValidity();
                        
                        if(valid){
                        
                        var namaMhs 	= $('#namaMhs').val();
                        var namaDospem	= $('#namaDospem').val();
                        var judul 		= $('#judul').val();
                        var kategori    = $('#kategori').val();
                        var id_dospem   = $('#id_dospem').val();
                        var kuota       = $('#kuota').val();
                        var pendaftar   = $('#pendaftar').val();
                        

                            e.preventDefault();

                            const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-success mr-2',
                                    cancelButton: 'btn btn-danger'
                                },
                                buttonsStyling: true
                            })
                            
                            swalWithBootstrapButtons.fire({
                                title: 'Yakin Data Sudah Benar ?',
                                text: "Pastikan Data Yang Diinput Telah Sesuai !",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Submit',
                                cancelButtonText: 'Batalkan',
                                reverseButtons: true
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                    type: 'POST',
                                    url: 'proses.php',
                                    data: {namaMhs: namaMhs,namaDospem: namaDospem,judul: judul,kategori: kategori,id_dospem : id_dospem,kuota:kuota,pendaftar:pendaftar},
                                    success: function(data){
                                    // Swal.fire({
                                    //             'title': 'Successful',
                                    //             'text': data,
                                    //             'icon': 'success'
                                    //             })
                                    //             document.location.href="logout.php";

                                    Swal.fire({
                                        title: 'Successful',
                                        text: data,
                                        icon: 'success',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Oke'
                                        }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.location.href="logout.php";
                                            }
                                        })
                                    },
                                    error: function(data){
                                        Swal.fire({
                                                'title': 'Errors',
                                                'text': 'There were errors while saving the data.',
                                                'icon': 'error'
                                                })
                                    }
                                });
                                } else if (
                                    /* Read more about handling dismissals below */
                                    result.dismiss === Swal.DismissReason.cancel
                                ) {
                                    swalWithBootstrapButtons.fire(
                                    'Cancelled',
                                    'Proses Submit Data Dibatalkan :)',
                                    'error'
                                    )
                                }
                            })

                            
                        }
                        else{
                            //Optional Aja
                        }
                    });		
                });
                
            </script>

            <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
            -->
</body>

</html>