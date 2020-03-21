<?php
include "../koneksi.php";
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
$result = mysqli_query($koneksi, "SELECT * FROM tbl_arsip ORDER BY id ASC");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;

    }

    .gambar{
      margin-left: 5px;
      width: 25px;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="dashboard.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>PS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>S</b><span>upersip</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="user-menu">
              <a href="#">
                <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Menu Utama</li>
          <li>
            <a href="arsip_baru.php">
              <i class="fa fa-newspaper-o"></i> <span>Arsip Baru</span>
            </a>
          </li>
          <li>
            <a href="peminjaman.php">
              <i class="fa fa-edit"></i><span>Peminjaman</span>
            </a>
          </li>
          <li>
            <a href="manajemen_arsip.php">
              <i class="fa fa-th"></i> <span>Manajemen Arsip</span>
            </a>
          </li>
          <li>
            <a href="../logout.php">
              <i class="fa fa-sign-out"></i> <span>Keluar</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">
        <?php 
        if(isset($_GET['pesan'])){
         $pesan = $_GET['pesan'];
         if($pesan == "berhasil"){
          ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Data Berhasil Dirubah!</h4>
          </div>
          <?php
        }
      }
      ?>
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Arsip Manajemen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Status</th>
                      <th scope="col">Dari / Kepada</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Kota</th>
                      <th scope="col">Arsip Surat</th>
                      <th scope="col">No Surat</th>
                      <th scope="col">No Urut</th>
                      <th scope="col">Indeks</th>
                      <th scope="col">Kode Surat</th>
                      <th scope="col">Tanggal Surat</th>
                      <th scope="col">Tanggal Simpan</th>
                      <th scope="col">Perihal</th>
                      <th scope="col">Jenis Surat</th>
                      <th scope="col">B/R/SR</th>
                      <th scope="col">No Laci</th>
                      <th scope="col">Sistem Simpan</th>
                      <th scope="col">Unit</th>
                      <th scope="col">Isi Ringkas</th>
                      <th scope="col">Arsiparis</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $x = 1;
                    while($user_data = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                        <th scope="row"><?php echo $x;?></th>
                        <?php
                        if($user_data['status'] == 0){
                          ?>
                          <td>Surat Masuk</td>
                          <?php
                        } else {
                          ?>
                          <td>Surat Keluar</td>
                          <?php
                        }
                        ?>
                        <td><?php echo $user_data['dr_kpd'];?></td>
                        <td><?php echo $user_data['alamat'];?></td>
                        <td><?php echo $user_data['kota'];?></td>
                        <td>
                          <button class="btn btn-success" data-toggle="modal" data-target="#modal-arsip<?php echo $x?>" >
                            <i style="color:white;" class="fa fa-image fa-lg "></i>
                          </button>
                          <!-- MODAL Arsip -->
                          <div class="modal fade" id="modal-arsip<?php echo $x?>">
                           <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title">Scan Arsip</h4>
                               </div>
                               <div class="modal-body" align="center">
                                <?php
                                if($user_data['scan_arsip'] == null){
                                  ?>
                                  <h2>Belum ada scan arsip!</h2>
                                  <?php
                                } else {
                                  ?>
                                  <img class="img-responsive" src="../images/<?php echo $user_data['scan_arsip'];?>"/>
                                  <?php
                                }
                                ?>
                              </div>
                              <div class="modal-footer">
                               <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                             </div>
                           </div>
                           <!-- /.modal-content -->
                         </div>
                         <!-- /.modal-dialog -->
                       </div>
                       <!-- /.modal -->
                     </td>
                     <td><?php echo $user_data['no_surat'];?></td>
                     <td><?php echo $user_data['no_urut'];?></td>
                     <td><?php echo $user_data['indeks'];?></td>
                     <td><?php echo $user_data['kode_surat'];?></td>
                     <td><?php echo $user_data['tanggal_surat'];?></td>
                     <td><?php echo $user_data['tanggal_simpan'];?></td>
                     <td><?php echo $user_data['perihal'];?></td>
                     <td><?php echo $user_data['jenis_surat'];?></td>
                     <td><?php echo $user_data['b_s_sr'];?></td>
                     <td><?php echo $user_data['no_laci'];?></td>
                     <td><?php echo $user_data['sistem_simpan'];?></td>
                     <td><?php echo $user_data['unit'];?></td>
                     <td><?php echo $user_data['isi_ringkas'];?></td>
                     <td><?php echo $user_data['arsiparis'];?></td>
                     <td>
                      <a href="edit_arsip.php?id=<?php echo $user_data['id'];?>">
                        <button class="btn btn-success">
                          <i style="color:white;" class="fa fa-pencil fa-lg "></i>
                        </button>
                      </a>
                      <a href="javascript:konfirmasiDulu('proses/hapus_manajemen.php?id=<?php echo $user_data['id'];?>')">
                      <button class="btn btn-danger"><i style="color:white;" class="fa fa-trash fa-lg "></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php
                  $x++;
                }
                ?>
              </tbody>
            </table>
          </div>
          <div style="margin-top:30px;" class="row">
            <div class="col-md-6">
              <i class="fa fa-pencil fa-lg"></i> &nbsp: <small>Jika Ada Perubahan Data</small>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.1.0
  </div>
  <strong>Copyright &copy; 2019</strong>
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      "scrollX": true
    })
  })
  function konfirmasiDulu(delUrl){
    if (confirm("Apakah anda yakin?")) {
     document.location = delUrl;
   }
 }
</script>
</body>
</html>
