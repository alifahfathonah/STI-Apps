<?php
require_once("auth.php");
require_once("config.php");
$idJudul = $_GET["id_judul"];
$idDospem = $_SESSION["user"]["id_dospem"];
if(empty($idJudul)) header("Location: dosenpage.php");

// if (isset($_POST['terima'])) {
//     header("Location: dosenpage.php");
//     $sql = "UPDATE judul SET penerimaan = '1' WHERE id_judul = $idJudul";
//     $stmt = $db->prepare($sql);
//     $stmt->execute();
// }

// if (isset($_POST['tolak'])) {
//     header("Location: dosenpage.php");
//     $sql = "UPDATE judul SET penerimaan = '0' WHERE id_judul = $idJudul";
//     $stmt = $db->prepare($sql);
//     $stmt->execute();

//     $sql = "UPDATE dospem SET kuota=(kuota+1), pendaftar=(pendaftar-1) WHERE id_dospem = $idDospem";
//     $stmt = $db->prepare($sql);
//     $stmt->execute();

//     $sql = "SELECT id_mhs FROM judul WHERE id_judul = $idJudul";
//     $stmt = $db->prepare($sql);
//     $stmt->execute();
//     $detailMhs = $stmt->fetch(PDO::FETCH_ASSOC);

//     $idMhs = $detailMhs["id_mhs"];
//     $sql = "UPDATE mahasiswa SET hasDaftar=0, isTolak='1' WHERE id_mhs = $idMhs";
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
    <link rel="stylesheet" href="css/dosenpage.css">
    <title>Dashboard Dosen</title>
    <style>
        .container {
        margin-top: 20px;
        margin-bottom: 20px;
        width: auto;
        height: 80%;
        background-color: white;
        border-radius: 10px;
    }
    .copyright{
            margin-top: 50px;
            margin-bottom: 50px;
            font-size: small;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="dosenpage.php">
            <img src="../STI-Apps/asset/icon/dosen.png" width="35" height="35" class="d-inline-block align-top" alt="" loading="lazy">
            &nbsp; Dashboard Dosen
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
                        &emsp;&emsp;&emsp;&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                        Detail Informasi Mahasiswa
                    </span>
                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </li>
            </ul>
            <h6 class="mr-3"><?php echo $_SESSION["user"]["namaDospem"] ?></h6>
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

    <?php
    $sql = "SELECT noInduk FROM mahasiswa, judul WHERE id_judul = $idJudul AND mahasiswa.id_mhs = judul.id_mhs";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $detail = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <div class="row right justify-content-center">
            <div class="col-md-12 ">
                <form action="" method="POST">
                    <div class="modal-body">
                        <ul class="detailInfo text-center">
                            <li>
                                <img src="../STI-Apps/asset/Profile.png" alt="Foto Mahasiswa" width="200" height="200">
                            </li>
                            <li>
                                <h3> Nama :  </h3>
                                <h2> <?php echo $_GET["penulis"] ?> </h2>
                            </li><br>
                            <li>
                                <h3> NIM : </h3>
                                <h2> <?php echo $detail["noInduk"] ?> </h2>
                            </li><br>
                            <li>
                                <h3> Judul Proposal : </h3>
                                <h2 class="text-center"> <?php echo $_GET["judulprop"] ?> </h2>
                            </li>
                        </ul>
                    </div> <br><br><br>
                    <div class="modal-footer justify-content-center">
                        <input type="submit" class="btn btn-danger btn-lg mr-5" id="tolak" name="tolak" value="TOLAK">
                        <input type="submit" class="btn btn-success btn-lg" id="terima" name="terima" value="TERIMA">
                    </div>
                    <input type="hidden" name='idDospem' id="idDospem" value="<?php echo $_SESSION["user"]["id_dospem"]; ?>">
                    <input type="hidden" name='idJudul' id="idJudul" value="<?php echo $_GET["id_judul"] ?>">
                </form>

                <h4 class="copyright">Copyright &copy; 2020 || Developed By Team 7</h4>
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript">
                                
                // $idJudul = $_GET["id_judul"];
                // $idDospem = $_SESSION["user"]["id_dospem"];
                $(function(){
                    $('#terima').click(function(e){

                        var valid = this.form.checkValidity();
                        
                        if(valid){

                        var idJudul 	= $('#idJudul').val();
                        var cek         = "terima";  
                        
                            e.preventDefault();

                            const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-success',
                                    cancelButton: 'btn btn-danger'
                                },
                                buttonsStyling: true
                            })
                            
                            swalWithBootstrapButtons.fire({
                                title: 'Apakah Anda Yakin ?',
                                text: "Pastikan Data Mahasiswa Telah Sesuai !",
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
                                    data: {cek : cek ,idJudul: idJudul},
                                    success: function(data){
                                    // Swal.fire({
                                    //             'title': 'Successful',
                                    //             'text': data,
                                    //             'icon': 'success'
                                    //             })
                                    //             document.location.href="logout.php";

                                    Swal.fire({
                                        title: 'Successful',
                                        text: 'Data Respon Telah Disimpan',
                                        icon: 'success',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Oke'
                                        }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.location.href="dosenpage.php";
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

                $(function(){
                    $('#tolak').click(function(e){

                        var valid = this.form.checkValidity();
                        
                        if(valid){
                        
                        var idJudul 	= $('#idJudul').val();
                        var idDospem 	= $('#idDospem').val();
                        var cek         = "tolak";  
                        

                            e.preventDefault();

                            const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-success mr-2',
                                    cancelButton: 'btn btn-danger'
                                },
                                buttonsStyling: true
                            })
                            
                            swalWithBootstrapButtons.fire({
                                title: 'Apakah Anda Yakin ?',
                                text: "Pastikan Sekali Lagi !",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Submit',
                                cancelButtonText: 'Kembali',
                                reverseButtons: true
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                    type: 'POST',
                                    url: 'proses.php',
                                    data: {cek : cek ,idJudul: idJudul, idDospem: idDospem},
                                    success: function(data){
                                    // Swal.fire({
                                    //             'title': 'Successful',
                                    //             'text': data,
                                    //             'icon': 'success'
                                    //             })
                                    //             document.location.href="logout.php";

                                    Swal.fire({
                                        title: 'Successful',
                                        text: 'Data Respon Telah Disimpan',
                                        icon: 'success',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Oke'
                                        }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.location.href="dosenpage.php";
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
</body>

</html>