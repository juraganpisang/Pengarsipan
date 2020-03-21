<?php 
include "../koneksi.php";
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
$query_mysql = mysqli_query($koneksi, "SELECT * FROM tbl_peminjaman");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
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
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">  
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
        <div class="row">
          <div class="col-xs-12">

            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Peminjam</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nama Peminjam</th>
                      <th>Indeks</th>
                      <th>Kode Surat</th>
                      <th>No Surat</th>
                      <th>No Laci</th>
                      <th>Perihal</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                      <th style="width:90px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while($user_data = mysqli_fetch_array($query_mysql)) {
                      ?>
                      <tr>
                        <td><?php echo $user_data['nama_peminjam'];?></td>
                        <td><?php echo $user_data['indeks'];?></td>
                        <td><?php echo $user_data['kode_surat'];?></td>
                        <td><?php echo $user_data['no_surat'];?></td>
                        <td><?php echo $user_data['no_laci'];?></td>
                        <td><?php echo $user_data['perihal'];?></td>
                        <td><?php echo $user_data['tanggal_pinjam'];?></td>
                        <td><?php echo $user_data['tanggal_kembali'];?></td>
                        <td>
                          <a href="javascript:konfirmasiDulu('proses/hapus_peminjam.php?id=<?php echo $user_data['id'];?>')">
                            <button class="btn btn-success"><i style="color:white;" class="fa fa-check fa-lg "></i></button>
                          </a>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit<?php echo $user_data['id']; ?>"><i style="color:white;" class="fa fa-pencil fa-lg "></i></button>
                        </td>
                      </tr>
                      <!-- MODAL Edit -->
                      <?php
                      $id = $user_data['id']; 
                      $query_edit = mysqli_query($koneksi,"SELECT * FROM tbl_peminjaman WHERE id='$id'");
                      while ($data = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <div class="modal fade" id="modal-edit<?php echo $user_data['id']; ?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Edit Peminjam</h4>
                                </div>
                                <div class="modal-body">
                                  <form action="proses/edit_peminjam.php" role="form" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                    <div class="form-group">
                                      <label>Nama Peminjam</label>
                                      <input type="text" name="nama_peminjam" class="form-control" placeholder="Masukkan Nama Peminjam" value="<?php echo $data['nama_peminjam'];?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Indeks</label>
                                      <input onkeyup="getTextEdit()" id="indeksEdit" name="indeks" type="text" class="form-control" placeholder="Masukkan Indeks" value="<?php echo $data['indeks'];?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Kode Surat</label>
                                      <input id="kdSuratEdit" name="kode_surat"  type="text" class="form-control" placeholder="Masukkan Kode Surat" value="<?php echo $data['kode_surat'];?>" readonly>
                                    </div>
                                    <!-- select -->
                                    <div class="form-group">
                                      <label>No Surat</label>
                                      <select class="form-control" name="no_surat">
                                        <?php
                                        $query = "SELECT * FROM tbl_arsip";
                                        $result = mysqli_query($koneksi, $query);
                                        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
                                        {
                                          ?>
                                          <option value="<?php echo $row['no_surat']; ?>"><?php echo $row["no_surat"]; ?></option>
                                          <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label>No Laci</label>
                                      <select name="no_laci" class="form-control">
                                        <option value="A-G" <?php if($data['no_laci'] == "A-G"){echo "selected";}?>>A-G</option>
                                        <option value="H-N" <?php if($data['no_laci'] == "H-N"){echo "selected";}?>>H-N</option>
                                        <option value="O-S" <?php if($data['no_laci'] == "O-S"){echo "selected";}?>>O-S</option>
                                        <option value="T-Z" <?php if($data['no_laci'] == "T-Z"){echo "selected";}?>>T-Z</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label>Perihal</label>
                                      <input type="text" name="perihal" class="form-control" placeholder="Masukkan Perihal" value="<?php echo $data['perihal'];?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Tanggal Pinjam</label>
                                      <input type="text" name="tanggal_pinjam" class="form-control" value="<?php echo date("Y-m-d");?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Tanggal Kembali</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="tanggal_kembali" class="form-control pull-right" id="datepickerEdit" value="<?php echo $data['tanggal_kembali'];?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                    <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                                  </div>
                                </form>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
                          <?php  
                        }
                      } 
                      ?>

                      
                    </tbody>
                  </table>
                  <div class="row">
                    <div class="col-md-6">
                      <i class="fa fa-check fa-lg"></i> : <small>Jika Surat Sudah Dikembalikan</small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <i class="fa fa-pencil fa-lg"></i> &nbsp: <small>Jika Ada Perubahan Data</small>
                    </div>
                  </div>
                  <button style="margin-top:20px;" type="button" href="#" label="Tambah" data-toggle="modal" data-target="#modal-tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Peminjam</button>




                  <!-- MODAL Tambah -->
                  <div class="modal fade" id="modal-tambah">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Tambah Peminjam</h4>
                          </div>
                          <!-- form start -->
                          <form action="proses/insert_peminjam.php" role="form" method="post" enctype="multipart/form-data">

                            <div class="modal-body">
                              <div class="form-group">
                                <label>Nama Peminjam</label>
                                <input name="nama_peminjam" type="text" class="form-control" placeholder="Masukkan Nama Peminjam">
                              </div>
                              <div class="form-group">
                                <label>Indeks</label>
                                <input onkeyup="getTextInsert()" id="indeksInsert" name="indeks" type="text" class="form-control" placeholder="Masukkan Indeks">
                              </div>
                              <div class="form-group">
                                <label>Kode Surat</label>
                                <input id="kdSuratInsert" name="kode_surat" type="text" class="form-control" placeholder="Masukkan Kode Surat" readonly>
                              </div>
                              <!-- select -->
                              <div class="form-group">
                                <label>No Surat</label>
                                <select class="form-control" name="no_surat">
                                  <?php
                                  $query = "SELECT * FROM tbl_arsip";
                                  $result = mysqli_query($koneksi, $query);
                                  while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
                                  {
                                    ?>
                                    <option value="<?php echo $row['no_surat']; ?>"><?php echo $row["no_surat"]; ?></option>
                                    <?php
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>No Laci</label>
                                <select name="no_laci" class="form-control">
                                  <option value="A-G">A-G</option>
                                  <option value="H-N">H-N</option>
                                  <option value="O-S">O-S</option>
                                  <option value="T-Z">T-Z</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Perihal</label>
                                <input type="text" class="form-control" name="perihal" placeholder="Masukkan Perihal">
                              </div>
                              <div class="form-group">
                                <label>Tanggal Pinjam</label>
                                <input type="text" name="tanggal_pinjam" class="form-control" value="<?php echo date("Y-m-d");?>" readonly>
                              </div>
                              <div class="form-group">
                                <label>Tanggal Kembali</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" name="tanggal_kembali" class="form-control pull-right" id="datepickerInsert">
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                              <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </div>
                        </form>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


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
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap datepicker -->
        <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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
          function getTextEdit() {
            var x = document.getElementById("indeksEdit");
            var y = document.getElementById("kdSuratEdit");
            y.value = x.value.substr(0,2);
          }

          function getTextInsert() {
            var x = document.getElementById("indeksInsert");
            var y = document.getElementById("kdSuratInsert");
            y.value = x.value.substr(0,2);
          }
          $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : false,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : false
            })
          })
//Date picker
$('#datepickerEdit').datepicker({
  autoclose: true,
  format: "yyyy-mm-dd"
})
$('#datepickerEdit').datepicker({
  autoclose: true
})

//Date picker
$('#datepickerInsert').datepicker({
  autoclose: true,
  format: "yyyy-mm-dd"
})
$('#datepickerInsert').datepicker({
  autoclose: true
})
function konfirmasiDulu(delUrl){
  if (confirm("Apakah anda yakin?")) {
   document.location = delUrl;
 }
}

</script>
</body>
</html>
