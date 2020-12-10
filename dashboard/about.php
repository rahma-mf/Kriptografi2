<?php
session_start();
include('../config.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
$queryupdate = mysqli_query($connect, $sqlupdate);
?>
<!DOCTYPE html>
<html>
<?php
$user = $_SESSION['username'];
$query = mysqli_query($connect,"SELECT fullname,job_title,last_activity FROM users WHERE username='$user'");
$data = mysqli_fetch_array($query);
?>
  <head>
    <title>Halo, <?php echo $data['fullname']; ?> - Aplikasi Enkripsi dan Dekripsi PT Semanta Mulia Transport</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <?php include 'header.php'?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-info"></i> Tentang</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="index.php">Dashboard</a></li>
              <li>Tentang</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <legend>Aplikasi Kriptografi Kunci Simetris</legend>
                <p>Kriptografi kunci simetris adalah  algoritma kriptografi yang memakai kunci sama saat proses enkripsi (proses penyandian pesan) dan proses dekripsi (proses pengembalian pesan asli). Algoritma kunci simetris dibagi ke dalam 2 bagian yaitu:
                  <br><li>Stream Cipher (Cipher Aliran): proses enkripsi dan dekripsi dilakukan dengan cara bit per bit atau biasa disebut dengan enkripsi atau dekripsi terhadap aliran bit.
                  <br><li>Block Cipher (Cipher Blok): proses enkripsi dan dekripsi dilakukan terhadap data yang kemudian dibagi menjadi blok-blok data terlebih dahulu lalu proses enkripsi atau dekripsi dilakukan terpisah terhadap masing-masing blok data.
                  <br><br>Di era globalisasi saat ini, mendapatkan informasi sangatlah mudah. Setiap orang dengan mudah mendapatkan data ataupun berita yang diinginkan. Hal ini didukung dengan teknologi informasi dan komunikasi yang terus berkembang pesat dari tahun ke tahun. Akan tetapi kemudahan mendapatkan informasi juga memberikan ancaman. Beberapa ancaman yang diberikan adalah masalah tentang keamanan, kerahasiaan, dan keotentikan data. 
                  Kerahasiaan dari data atau informasi merupakan suatu kelengkapan pelayanan yang dibuat untuk menjaga agar informasi yang tersimpan tidak dapat dibaca atau dibuka oleh pihak yang tidak berhak. Upaya dalam menjaga kerahasiaan dari data informasi tersebut sudah tercetus sejak zaman dahulu tepatnya pada zaman romawi dengan metode pergeseran huruf atau karakter dengan dasar nilai tertentu.
                  Pada zaman modern berbasis teknologi komputer, upaya-upaya tersebut berkembang dengan menggunakan algoritma yang diciptakan oleh banyak ahli, namun hal tersebut masih saja dapat dipecahkan oleh pihak-pihak yang tidak bertanggung jawab, oleh karena itu diperlukan suatu sistem pengamanan data yang bertujuan untuk meningkatkan keamanan data, melindungi suatu data atau pesan agar tidak dibaca oleh pihak yang tidak berwenang, dan mencegah pihak yang tidak berwenang untuk menyisipkan, menghapus, ataupun merubah data. Salah satu ilmu pengamanan data yang terkenal adalah kriptografi.
                  Oleh karena itu, maka dibuatlah Aplikasi Enkripsi dan Dekripsi untuk menjaga keamanan file  <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/essential-plugins.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/pace.min.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
