<?php 
include "../koneksi.php";
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
$id = $_GET['id'];
$query_mysql = mysqli_query($koneksi, "SELECT * FROM tbl_arsip WHERE id='$id'");
$jmlSuratMasuk = mysqli_query($koneksi, "SELECT COUNT(id) AS 'jml' FROM tbl_arsip WHERE status='0'");
$jmlSuratKeluar = mysqli_query($koneksi, "SELECT COUNT(id) AS 'jml' FROM tbl_arsip WHERE status='1'");
while($data = mysqli_fetch_array($query_mysql)){
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Advanced form elements</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
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
      <!-- Content Header (Page header) -->
      <section class="content-header">
       <!-- form start -->
       <form action="proses/edit.php?id=<?php echo $id;?>" role="form" method="post" enctype="multipart/form-data">
        <div class="row" style="margin-bottom:20px;">
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>
                  <?php 
                  while($jml = mysqli_fetch_array($jmlSuratMasuk)) {
                    echo $jml['jml'];
                  }
                  ?>
                </h3>

                <p>Surat Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <span class="small-box-footer">Tambah <i class="fa fa-arrow-circle-right"></i></span> -->
            </div>
            <div align="center">
              <label>
                <input type="radio" name="status" class="minimal" value="0" <?php if($data['status'] == 0){echo "checked";}?>> Surat Masuk
              </label>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>
                  <?php 
                  while($jml = mysqli_fetch_array($jmlSuratKeluar)) {
                    echo $jml['jml'];
                  }
                  ?>
                </h3>

                <p>Surat Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <span class="small-box-footer">Tambah <i class="fa fa-arrow-circle-right"></i></span> -->
            </div>
            <div align="center">
              <label>
                <input type="radio" name="status" class="minimal" value="1" <?php if($data['status'] == 1){echo "checked";}?>> Surat Keluar
              </label>
            </div>
          </div>
        </div>
        <!-- BEDA KONTEN -->
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h1>Arsip Abjad</h1>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <label>Dari / Kepada</label>
                  <input name="dariKepada"type="text" class="form-control" placeholder="Masukkan Nama Perusahaan" value="<?php echo $data['dr_kpd'];?>">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat"><?php echo $data['alamat'];?></textarea>
                </div>
                <div class="form-group">
                  <label>Kota</label>
                  <input name="kota" type="text" class="form-control" placeholder="Masukkan Kota" value="<?php echo $data['kota'];?>">
                </div>
                <div class="box box-primary">
                </div>
                <div class="form-group">
                  <label>No Surat</label>
                  <input name="noSurat" type="text" class="form-control" placeholder="Masukkan Nomor Surat" value="<?php echo $data['no_surat'];?>">
                </div>
                <div class="form-group">
                  <label>No Urut</label>
                  <input name="noUrut" type="text" class="form-control" placeholder="Masukkan Nomor Urut" value="<?php echo $data['no_urut'];?>">
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Indeks</label>
                    <input onkeyup="getText()" id="indeks" name="indeks" type="text" class="form-control" placeholder="Masukkan Indeks" value="<?php echo $data['indeks'];?>">
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Kode Surat</label>
                    <input id="kdSurat" name="kodeSurat" type="text" class="form-control" readonly value="<?php echo $data['kode_surat'];?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Tanggal Surat</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="tanggalSurat" type="text" class="form-control pull-right" id="datepicker" value="<?php echo $data['tanggal_surat'];?>">
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Tanggal Simpan</label>
                    <input name="tanggalSimpan" type="text" class="form-control" value="<?php echo $data['tanggal_simpan'];?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label>Perihal</label>
                  <input name="perihal" type="text" class="form-control" placeholder="Masukkan Perihal" value="<?php echo $data['perihal'];?>">
                </div>
                <div class="form-group">
                  <label>Jenis Surat</label>
                  <input name="jenisSurat" type="text" class="form-control" placeholder="Masukkan Jenis Surat" value="<?php echo $data['jenis_surat'];?>">
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>B/R/SR</label>
                    <input name="bssr" type="text" class="form-control" placeholder="Masukkan B/R/SR" value="<?php echo $data['b_s_sr'];?>">
                  </div>
                  <div class="col-md-6 form-group">
                    <label>No Laci</label>
                    <select name="noLaci" class="form-control">
                      <option value="A-G" <?php if($data['no_laci'] == "A-G"){echo "selected";}?>>A-G</option>
                      <option value="H-N" <?php if($data['no_laci'] == "H-N"){echo "selected";}?>>H-N</option>
                      <option value="O-S" <?php if($data['no_laci'] == "O-S"){echo "selected";}?>>O-S</option>
                      <option value="T-Z" <?php if($data['no_laci'] == "T-Z"){echo "selected";}?>>T-Z</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Sistem Simpan</label>
                    <input name="sistemSimpan" type="text" class="form-control" placeholder="Sistem Simpan" value="<?php echo $data['sistem_simpan'];?>">
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Unit</label>
                    <input name="unit" type="text" class="form-control" placeholder="Masukkan Unit" value="<?php echo $data['unit'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label>Isi Ringkas</label>
                  <textarea name="isiRingkas" class="form-control" placeholder="Masukkan Isi Ringkas"><?php echo $data['isi_ringkas'];?></textarea>
                </div>
                <div class="box box-primary">
                  <div style="padding:20px;" class="form-group">
                    <label for="exampleInputFile">Scan Arsip</label>
                    <input name="scanArsip" type="file" id="exampleInputFile">
                    <p class="help-block">Masukkan gambar disini</p>
                  </div>
                </div>
                <div class="form-group">
                  <label>Arsiparis</label>
                  <input name="arsiparis" type="text" class="form-control" placeholder="Masukkan Nama Arsiparis" value="<?php echo $data['arsiparis'];?>">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button name="submit" type="submit" class="btn btn-primary pull-right">Simpan</button>
              </div>
            </form>
            <?php } ?>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page script -->
<script>
	function getText() {
   var x = document.getElementById("indeks");
   var y = document.getElementById("kdSurat");
   y.value = x.value.substr(0,2);
 }
 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    //$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd"
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
