
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title class="namahunian">Edit Hunian : Test</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/adminlte/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/adminlte/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/adminlte/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" type="text/css" href="/nest/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" type="text/css" href="/css/mycss.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
  hr {
    margin-top: 0px;
  }
</style>
</head>
<div id="overlay">
    <img src="/loading.gif" alt="Loading" />
</div>
<body class="hold-transition fixed skin-red-light sidebar-mini">
    
<div style="display:none" class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <span class="logo-lg">BUKA<b>SEWA</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/img/avatar/avatar4.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Wiranatha</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/img/avatar/avatar4.png" class="img-circle" alt="User Image">

                <p>
                  w@a.com
                  <small>2019-09-05 07:22:58</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                    <a  class="btn btn-default btn-flat" href="http://127.0.0.1:8000/logout"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" style="display: none;">
                        <input type="hidden" name="_token" value="3hsgmgyuCCIiMfoL58xbPVPV0JvaXcjni1buMCQa">
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
       
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/img/avatar/avatar4.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Wiranatha</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Pro</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashboard">
            <a href="pages/widgets.html">
              <i class="fa fa-th"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tag"></i>
            <span>Iklan</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/vendor/iklan/kelola"><i class="fa fa-circle-o"></i>Kelola Iklan</a></li>
            <li><a href="/vendor/iklan/tambah"><i class="fa fa-circle-o"></i>Tambahkan Iklan</a></li>
          </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-diamond"></i>
              <span>Paket bisnis & penagihan</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/belipaket"><i class="fa fa-circle-o"></i>Beli paket</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i>Penagihan</a></li>
            </ul>
          </li>
        <li >
            <a href="pages/widgets.html">
              <i class="fa  fa-question-circle"></i> <span>Bantuan</span>
            </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div style="min-height:600px" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="namahunian">
        Edit Hunian : Test      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active namahunian">Edit Hunian : Test</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <style>
 #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
        z-index: 20;
        margin:5px;
      }
      
        .modal{
            z-index: 9999;   
        }
        .modal-backdrop{
            z-index: 10;        
        }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #bdb9b9;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        margin:5px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #ff5159;
        font-size: 15px;
        font-weight: 500;
        padding: 6px 12px;
      }
</style>
<div class="row">
    <div class="col-lg-8 col-xs-12 col-md-12 col-sm-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Info Hunian <a href="/detail/properti/h5d976ca6d191d"><i class="fa fa-eye"></i></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form">
                <!-- text input -->
                <div class="form-group">
                    <label>Nama Hunian</label>                        <a id="editnama" href="#edit_nama"><i class="fa fa-edit pull-right"> Edit</i></a>

                    <div id="e_namaku" style="display:none" class="input-group">
                            <input value="Test" id="inamaku" type="text" class="form-control">
                            <div class="input-group-btn">
                                    <button id="update_nama" type="button" class="btn btn-danger">Ubah</button>
                            </div>
                                    <!-- /btn-group -->
                    </div>
                    <p id="properti"  class="text-muted">Test
                    </p>
                    <hr>
                </div>
                <!-- phone mask -->
                  <div class="form-group">
                    <label>Whatsapp</label>                        <a id="editwa" href="#edit_wa"><i class="fa fa-edit pull-right"> Edit</i></a>

                    <div id="e_wa" style="display:none" class="input-group">
                            <input value="0895386898095" id="iwa" type="number" class="form-control">
                            <div class="input-group-btn">
                                    <button id="update_wa" type="button" class="btn btn-danger">Ubah</button>
                            </div>
                                    <!-- /btn-group -->
                    </div>
                    <p id="wa"  class="text-muted">0895386898095
                    </p>
                    <hr>
                </div>
                  <!-- /.form group -->
                <div class="form-group">
                <label>Jenis Hunian</label>
                <select class="form-control" name="" id="jenishunian">
                                                                        <option selected="selected" value="1">Kos</option>
                                                                                                <option value="2">Rumah</option>
                                                                                                <option value="3">Villa</option>
                                                                                                <option value="4">Tanah</option>
                                                                                                <option value="5">Apartemen</option>
                                                            </select>
                </div>

                <!-- textarea -->
                <div class="form-group">
                <strong></i>Deskripsi</strong>
                <a id="editdesk" href="#edit_desk"><i class="fa fa-edit pull-right"> Edit</i></a>
                <br>
                <div style="display:none" id="e_deskripsiku">
                <textarea class="form-control" id="ideskripsi" cols="30" rows="8">Testing</textarea>
                <br>
                <button id="update_deskripsi" class="btn btn-primary small">Ubah</button>
                </div>
                <p style="margin-top:10px" id="deskripsi"><span>Testing</span>
                </p>
                </div>
                <hr>
                <div class="form-group">
                        <label for="">
                            Tambahkan Harga:
                        </label>
                        <div class="input-group">
                                <!-- /btn-group -->
                                <input id="nominal" type="number" class="form-control">
                                <div class="input-group-btn">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Jangka Sewa
                                            <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                            <li id="bulan" onclick="addharga('bulan')"><a href="#">/Bulan</a></li>
                                            <li id="tahun" onclick="addharga('tahun')"><a  href="#">/Tahun</a></li>
                                            <li id="hari" onclick="addharga('hari')"><a  href="#">/Hari</a></li>
                                        </ul>
                                </div>
                            </div>
                </div>
                <div id="labelharga">
                </div>
            </form>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Info Lokasi </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form">
                <!-- text input -->
                <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control" id="provinsi">
            	                    	                    	        <option selected value="1">
            	            Bali
            	        </option>
            	                    	                    	                    	        <option value="2">
            	            Yogyakarta
            	        </option>
            	                    	                    	                    	        <option value="3">
            	            Jakarta
            	        </option>
            	                    	                    	                    	        <option value="4">
            	            Bandung
            	        </option>
            	                    	                    	    </select>
                </div><div class="form-group">
                    <label>Lokasi Hunian</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-map"></i>
                      </div>
                      <input id="lokasihunian" onclick='openmap()' type="text" class="form-control" placeholder="Masukkan lokasi hunian">
                    </div>
                </div>
            </form>
            <button id="updatelokasi" class="btn btn-danger small pull-right"><i class="fa fa-save"></i> Update Lokasi</button>
            </div>
            <!-- /.box-body -->
            
        </div>
        <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Fasilitas hunian</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6 col-lg-3">
                            <div class="input-group">
                                <span class="input-group-addon">Kamar Tidur</span>
                                <input id="bed" value="2" type="number" class="form-control">
                            </div>
                        </div>
                        <div style="margin-bottom: 10px" class="col-xs-6 col-lg-3">
                            <div class="input-group">
                                <span class="input-group-addon">Toilet</span>
                                <input id="toilet" value="dalam" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <div class="input-group">
                                <span class="input-group-addon">Garasi</span>
                                <input id="garasi" value="0" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <div class="input-group">
                                <span class="input-group-addon">Tv</span>
                                <input id="tv" value="1" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div style="margin-top:20px;margin-left:20px" class=" grid-container">
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="1" class="get_value" value="1" type="checkbox" />
                                    <i class="flaticon flaticon-weightlifting"></i> Gym
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="2" class="get_value" value="2" type="checkbox" />
                                    <i class="flaticon flaticon-transport"></i> Parkir
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="3" class="get_value" value="3" type="checkbox" />
                                    <i class="flaticon flaticon-wifi"></i> Wifi
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="4" class="get_value" value="4" type="checkbox" />
                                    <i class="flaticon flaticon-air-conditioner"></i> AC
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="5" class="get_value" value="5" type="checkbox" />
                                    <i class="flaticon flaticon-people-2"></i> Kolam Renang
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="6" class="get_value" value="6" type="checkbox" />
                                    <i class="flaticon flaticon-building"></i> Alarm
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="7" class="get_value" value="7" type="checkbox" />
                                    <i class="flaticon flaticon-old-telephone-ringing"></i> Telepon
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="8" class="get_value" value="8" type="checkbox" />
                                    <i class="flaticon flaticon-monitor"></i> TV
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="9" class="get_value" value="9" type="checkbox" />
                                    <i class="flaticon flaticon-holidays"></i> Pemanas Air
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="10" class="get_value" value="10" type="checkbox" />
                                    <i class="flaticon flaticon-bars"></i> Dapur
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="11" class="get_value" value="11" type="checkbox" />
                                    <i class="flaticon flaticon-building"></i> Kebun
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="12" class="get_value" value="12" type="checkbox" />
                                    <i class="flaticon fa fa-group"></i> Ruang tamu
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="13" class="get_value" value="13" type="checkbox" />
                                    <i class="flaticon fa fa-history"></i> Kunjungan 24jam
                                </div>
                            </div>
                                                    <div class="form-group">
                                <div class="checkbox">
                                    <input id="14" class="get_value" value="14" type="checkbox" />
                                    <i class="flaticon flaticon-security"></i> Security
                                </div>
                            </div>
                                                  
                    </div>
                    <button id="savefasilitas" class="pull-right btn btn-danger"><i class="fa fa-save"></i> Update fasilitas</button>

                </div>
                <!-- /.box-body -->
            </div>
    </div>
    <div class="col-lg-4 col-xs-12 col-md-12 col-sm-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Gambar Hunian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <center>
                    <button id="add_img" class="btn btn-danger small"><span class="fa fa-plus"></span> Tambah Gambar</button>
                </center>
                <input onchange="uploadimgs()" accept="image/gif, image/jpeg, image/png" type="file" style="display:none" id="imgs">
                <!-- The grid: four columns -->
                <div id="myimg" class="row">
                                            <div  id="151" class="column">
                            <img src="/img/properties/img5da3d7486a00dimg5d870ff7ee3a9img5d870f0e1f1b2img5d870d0e7e033img5d8052a9805ffproperties-7.jpg" alt="gambar propertimu" style="width:100%" onclick="clickImg(this,'151');">
                        </div>
                                            <div  id="156" class="column">
                            <img src="/img/properties/img5da3e8c5a604eimg5d870d75c4ca7img5d8054a68e51bproperties-3 - Copy.jpg" alt="gambar propertimu" style="width:100%" onclick="clickImg(this,'156');">
                        </div>
                                        <div style="display: none" id="up-progress" style="background-color: #43480b63;
                    margin-top: 10px;" id="156" class="column">
                        <div class="progress progress-sm active">
                            <div id="progress" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"  style="width: 0%">
                            </div>
                        </div>
                    </div>
                      </div>
                      <div  id="expandedImg1" class="container">
                        <button style="font-size: 20px;" onclick="deleteImg()" class="btn btn-danger small closebtn"><i class="fa fa-trash-o"></i></button>
                        <img class="image_edit" id="expandedImg">
                      </div>
                        </div>
                        
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> Beta 1.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="/">buka<b>sewa</b>.com</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/adminlte/bower_components/raphael/raphael.min.js"></script>
<script src="/adminlte/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/adminlte/bower_components/moment/min/moment.min.js"></script>
<script src="/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->

<!-- FastClick -->
<script src="/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/dist/js/demo.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="/js/app.js"></script>

<script>
    $(document).ready(function () {
      $('#overlay').fadeOut();
      console.log("fadeot")
      $(".wrapper").fadeIn();
    });
</script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNc257lpFxxKmJxqKzdgshuSHDUdtRDmE&libraries=places"  defer></script>
<!-- Modal -->
        <div class="modal fade" id="mapmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div style="height:400px;width:400px;width:100%" id="maplokasi"></div>
                        <div class="modal-footer">
                            <input class="form-control" placeholder="masukkan lokasi" type="text" id="input-lokasi">        
                            <br>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button id="pilihlokasi" type="button" class="btn btn-danger"><i class="fa fa-map-signs"></i> Pilih</button>
                        </div>
                </div>
            </div>
        </div>
<script>
var myname;
var fasilitas=[];
var clickedImg="";
var lokasi={lat:-6.355400299999999,lng:106.78644370000006}
var geolat;
var geolng;
var endaddress;

$(document).ready(function () {

    $("#lokasihunian").val('Jl. Nusa Penida X No.1, Krukut, Kec. Limo, Kota Depok, Jawa Barat 16514, Indonesia');
    
    $("#pilihlokasi").click(function () { 
            $("#lokasihunian").val(endaddress);
            $("#mapmodal").modal("hide");
		});
		
    $.ajax({
        type: "post",
        url: "/api/getfitur/detail",
        data: {
            id:"h5d976ca6d191d",
            _token:"3hsgmgyuCCIiMfoL58xbPVPV0JvaXcjni1buMCQa"
        },
        dataType: "JSON",
        success: function (response) {
            for (let index = 0; index < response.length; index++) {
                var fitur=response[index].id_fitur;
                $("#"+fitur).attr("checked", "checked");
            }
        }
    });

    $("#add_img").click(function (e) { 
        document.getElementById('imgs').click();
    });

    $("#editnama").click(function (e) {  
            $("#properti").toggle('hide');
            $("#e_namaku").toggle('show');
    });
    
    $("#editwa").click(function (e) {  
            $("#wa").toggle('hide');
            $("#e_wa").toggle('show');
    });
    
    $("#editdesk").click(function (e) {  
            $("#deskripsi").toggle('hide');
            $("#e_deskripsiku").toggle('show');
            $(this).toggle('show');
    });
    $("#update_nama").click(function (e) {
            myname= $("#inamaku").val();
            updatedata("properti",myname);
            $("#properti").toggle('show');
            $("#e_namaku").toggle('show');
            $("#editnama").show();
    });
    
    $("#update_wa").click(function (e) {
            mywa= $("#iwa").val();
            updatedata("wa",mywa);
            $("#wa").toggle('show');
            $("#e_wa").toggle('show');
            $("#editwa").show();
    });
    
    $("#updatelokasi").click(function (e) {
        $.ajax({
            type: "POST",
            url: "/api/update/hunian/lokasi",
            data: {
                _token:"3hsgmgyuCCIiMfoL58xbPVPV0JvaXcjni1buMCQa",
                id:'h5d976ca6d191d',
                coordinate:lokasi,
                alamat:$('#lokasihunian').val(),
                provinsi:$('#provinsi').val()
            },
            dataType: "JSON",
            success: function (response) {
                toast("Sukses mengupdate lokasi","success")
            },
            error:function(){
                toast("Maaf, terjadi kesalahan","error")
            }
        });
    });
    
    $("#update_deskripsi").click(function (e) {
        $("#deskripsi").toggle('hide');
        $("#e_deskripsiku").toggle('show'); 
        $("#editdesk").show();
        updatedata("deskripsi",$("#ideskripsi").val())
    });
    $("#jenishunian").change(function (e) {
        Swal.fire({
        title: 'Ubah kategori ini?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Iya, saya ingin mengubah!'
        }).then((result) => {
        if (result.value) {
            updatedata("kategori",$(this).val());
        }
        }) 
    });
    $("#savefasilitas").click(function (e) { 
        $('.get_value').each(function() {
            if ($(this).is(":checked")) {
                fasilitas.push($(this).val());
            }
        });
        $.ajax({
            type: "POST",
            url: "/api/update/hunian/fasilitas",
            data: {
                _token:"3hsgmgyuCCIiMfoL58xbPVPV0JvaXcjni1buMCQa",
                bed:$("#bed").val(),
                toilet:$("#toilet").val(),
                garasi:$("#garasi").val(),
                tv:$("#tv").val(),
                fasilitas:fasilitas,
                id:"h5d976ca6d191d"
            },
            dataType: "JSON",
            success: function (response) {
                toast("Sukses mengupdate fasilitas","success")
            },
            error:function(){
                toast("Maaf, terjadi kesalahan","error")
            }
        });
    });
    //load map
    $("#mapmodal").on("shown.bs.modal", function () {
        
        init();
        mark(lokasi);
        //autocomplete
        var card = document.getElementById('pac-card');
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('input-lokasi'),
                { types: ['geocode'] });
                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                lokasi={lat:autocomplete.getPlace().geometry.location.lat(),lng:autocomplete.getPlace().geometry.location.lng()}
                marker.setMap(null);
                mark(lokasi);
            });
        
        
        
        
        $("#maplokasi").css("width", "100%");
        google.maps.event.trigger(map, "resize");
        console.log('modal loaded');
        
        

    });
    loadharga();
});
//semua fungsi

function openmap() {
    console.log("map open");
    $("#mapmodal").modal("show");
}

var uploadPercentage=0;
function uploadimgs() {
    var fd=new FormData();
    totalfiles = document.getElementById('imgs').files.length;
    for (var index = 0; index < totalfiles; index++) {
        fd.append("img[]", document.getElementById('imgs').files[index]);
    }
    fd.append("_token","3hsgmgyuCCIiMfoL58xbPVPV0JvaXcjni1buMCQa");
    fd.append("id","h5d976ca6d191d");

    axios.post("/api/insert/image",fd,
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: function( progressEvent ) {
                $("#up-progress").show();
                uploadPercentage = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
                console.log(uploadPercentage);
                $("div#progress").css("width", uploadPercentage+'%');
            }.bind(this)
        }
        )
        .then(res => {
            $("#up-progress").hide();
            $("#myimg").append('<div id="'+res.data.id+'" class="column"><img src="/'+res.data.link+'" alt="gambar propertimu" style="width:100%" onclick="clickImg(this,'+res.data.id+');"></div>');
            toast("Gambar berhasil ditambahkan","success")
            $("#expandedImg").attr("src","/"+res.data.link);
        })
        .catch(err => {
            console.error(err); 
        })
}
function insertharga(durasi,harga) {
    $.ajax({
        type: "POST",
        url: "/api/update/hunian/sewa",
        data: {
            _token:"3hsgmgyuCCIiMfoL58xbPVPV0JvaXcjni1buMCQa",
            harga:harga,
            durasi:durasi,
            id:'h5d976ca6d191d',
            index:"addsewa"
        },
        dataType: "JSON",
        success: function (response) {
            toast("Harga berhasil ditambahkan","success");
        },
        error:function(){
            toast("Terjadi kesalahan, coba lagi nanti","error");
        }
    });
}
function removeharga(durasi) {
    $.ajax({
        type: "POST",
        url: "/api/update/hunian/sewa",
        data: {
            _token:"3hsgmgyuCCIiMfoL58xbPVPV0JvaXcjni1buMCQa",
            durasi:durasi,
            id:'h5d976ca6d191d',
            index:"removesewa"
        },
        dataType: "JSON",
        success: function (response) {
            toast("Harga berhasil dihapus","success");
        },
        error:function(){
            toast("Terjadi kesalahan, coba lagi nanti","error");
        }
    });
}
function updatedata(index,value) {
    $.ajax({
        type: "post",
        url: "/api/update/hunian",
        data: {
            id:'h5d976ca6d191d',
            index:index,
            value:value,
            _token:"3hsgmgyuCCIiMfoL58xbPVPV0JvaXcjni1buMCQa"
        },
        dataType: "JSON",
        success: function (response) {
            $("#"+index).text(value);

            if (index=="properti") {
                $(".namahunian").text("Edit: "+value);
            }

            toast(index+" berhasil diubah","success");
        },
        error:function(){
            toast("Terjadi kesalahan coba lagi nanati","error");
        }
    });
}
function loadharga() {
    $.ajax({
        type: "POST",
        url: "/api/load/hargasewa",
        data: {
            _token:'3hsgmgyuCCIiMfoL58xbPVPV0JvaXcjni1buMCQa',
            id:'h5d976ca6d191d'
        },
        dataType: "JSON",
        success: function (response) {
            for (let index = 0; index < response.length; index++) {
                console.log(response[index].harga);
                nominal=formatRupiah(response[index].harga, "Rp.");
                waktu=response[index].durasi;
                $("#nominal").val("")
                $("#"+waktu).hide();
                $("#labelharga").append('<div style="margin-right:5px" class="alert alert-info alert-dismissible"><button type="button" class="close" onclick=xx("'+waktu+'") data-dismiss="alert" aria-hidden="true">×</button><span class="nominal">'+nominal+'</span><b>/'+waktu+'</b></div>');
                switch (waktu) {
                    case 'hari':
                        $hari=nominal;
                    break;
                    case 'tahun':
                        $tahun=nominal;
                    break;
                    default:
                        $bulan=nominal;
                    break;
                }
            }
        }
    });
}
function addharga(waktu) {
		if ($("#nominal").val()!="") {
			nominal=formatRupiah($("#nominal").val(), "Rp.");
            insertharga(waktu,nominal);
			$("#nominal").val("")
			$("#"+waktu).hide();
			$("#labelharga").append('<div style="margin-right:5px" class="alert alert-info alert-dismissible"><button type="button" class="close" onclick=xx("'+waktu+'") data-dismiss="alert" aria-hidden="true">×</button><span class="nominal">'+nominal+'</span><b>/'+waktu+'</b></div>');
			switch (waktu) {
				case 'hari':
					$hari=nominal;
				break;
				case 'tahun':
					$tahun=nominal;
				break;
				default:
					$bulan=nominal;
				break;
			}
		} else {
			toast("Masukkan harga dulu","error");
		}
}
/* Fungsi formatRupiah */
function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
function xx(waktu) {
    removeharga(waktu);
    $("#"+waktu).show();
    switch (waktu) {
            case 'hari':
                $hari="0";
            break;
            case 'tahun':
                $tahun="0";
            break;
            default:
                $bulan="0";
            break;
    }
    console.log("x"+waktu)
}
function toast(a,b) {
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
    })

    Toast.fire({
    type: b,
    title: a
    })
}

function clickImg(imgs,id) {
  // Get the expanded image
  $("#expandedImg1").slideDown();
  var expandImg = document.getElementById("expandedImg");
  clickedImg=id;
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
}

function deleteImg() {
    Swal.fire({
    title: 'Hapus gambar ini?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yap, Hapus!',
    cancelButtonText: "Batal"
    }).then((result) => {
    if (result.value) {
        if (clickedImg!="") {
            $.ajax({
                type: "POST",
                url: "/api/delete/img",
                data: {
                    _token:"3hsgmgyuCCIiMfoL58xbPVPV0JvaXcjni1buMCQa",
                    id:clickedImg
                },
                dataType: "JSON",
                success: function (response) {
                    toast(response,"success");
                    $("#"+clickedImg).remove();
                    $("#expandedImg1").hide();
                }
            });
        }
    }
    })
    

    function geocode(geocoder,map) {
            geocoder.geocode(
                {location:lokasi},
                function (results,status) {
                    if (status=="OK") {
                        if (results[0]) {
                            console.log("endaddress: "+results[0].formatted_address);
                            endaddress=results[0].formatted_address;
                        }
                        else{
                            window.alert("Error:Tidak Dapat Data Lokasi");
                        }
                    }
                    else{
                        window.alert("Error:Geocode, "+status);
                    }
                });
	}    

}
//map dan api

function init() {
     // The map, centered at L
     map = new google.maps.Map(document.getElementById('maplokasi'), {
          center: lokasi,
          zoom: 13
        });
     geocoder=new google.maps.Geocoder();
}
function mark(loc){
        console.log("mark")
        marker=new google.maps.Marker({
            position:loc,
            map:map,
            title:"Drag untuk memindahkan penentu lokasi",
            draggable: true
        });

        geolat=marker.position.lat();
        geolng=marker.position.lng();
        geocode(geocoder,map);
        map.setCenter(loc);
        //ketika marker di drag
        google.maps.event.addListener(marker,'dragend',function() {
            lokasi={lat:marker.position.lat(),lng:marker.position.lng()}
            geolat=marker.position.lat();
            geolng=marker.position.lng();
            geocode(geocoder,map);
        });
    }
function geocode(geocoder,map) {
        console.log(lokasi);
        geocoder.geocode(
            {location:lokasi},
            function (results,status) {
                if (status=="OK") {
                    if (results[0]) {
                        console.log("endaddress: "+results[0].formatted_address);
                        endaddress=results[0].formatted_address;
                        $("#input-lokasi").val(endaddress);
                    }
                    else{
                        window.alert("Error:Tidak Dapat Data Lokasi");
                    }
                }
                else{
                    window.alert("Error:Geocode, "+status);
                }
            });
}
</script>

</body>
</html>
