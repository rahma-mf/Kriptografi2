<?php
session_start();
include('../config.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
$queryupdate = mysqli_query($connect,$sqlupdate);
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
    <link rel="stylesheet" type="text/css" href="../assets/plugins/datatables/css/jquery.dataTables.css">
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
            <h1><i class="fa fa-dashboard"></i> History Aplikasi Kriptografi Kunci Simetris</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="index.php">Dashboard</a></li>
              <li>Daftar List Enkripsi dan Dekripsi</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="file" class="table striped">
                    <thead>
                        <tr>
                          <td><strong>ID File</strong></td>
                          <td><strong>Username</strong></td>
                          <td><strong>Nama File</strong></td>
                          <td><strong>Nama File Enkripsi</strong></td>
                          <td><strong>Ukuran File</strong></td>
                          <td><strong>Tanggal</strong></td>
                          <td><strong>Status</strong></td>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <td><strong>ID File</strong></td>
                          <td><strong>Username</strong></td>
                          <td><strong>Nama File Sumber</strong></td>
                          <td><strong>Nama File Enkripsi</strong></td>
                          <td><strong>Ukuran File</strong></td>
                          <td><strong>Tanggal</strong></td>
                          <td><strong>Status</strong></td>
                        </tr>
                      </tfoot>
                        <tbody>
                        <?php
                          $query = mysqli_query($connect,"SELECT * FROM file");
                          while ($data = mysqli_fetch_array($query)) { ?>
                          <tr>
                            <td><?php echo $data['id_file']; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['file_name_source']; ?></td>
                            <td><?php echo $data['file_name_finish']; ?></td>
                            <td><?php echo $data['file_size']; ?> KB</td>
                            <td><?php echo $data['tgl_upload']; ?></td>
                            <td><?php if ($data['status'] == 1) {
                              echo "<span class='btn btn-success'>Terenkripsi</span>";
                            }elseif ($data['status'] == 2) {
                              echo "<span class='btn btn-info'>Sudah Didekripsi</span>";
                            }else {
                              echo "<span class='btn btn-danger'>Status Tidak Diketahui</span>";
                            }
                             ?></td>
                          </tr>
                          <?php
                        } ?>
                        </tbody>
                      </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#file').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": true,
          "order": [0, "asc"]
        });
        });
        </script>
    <script src="../assets/js/essential-plugins.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/datatables/js/jquery.dataTables.js"></script>
    <script src="../assets/js/plugins/pace.min.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
