<?php 
session_start(); 
include '../config/koneksi.php';

    if (isset($_SESSION['nama'] , $_SESSION['level'] , $_SESSION['id'])) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Inventory | System</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard23cd.css?v=1.2.1" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../../../maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/sweetalert.css">
</head>

<body>
    <div class="wrapper">
        <?php include 'menu.php';?>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php
                        if (isset($_GET['menu'])) {
                            $menu = $_GET['menu'];
                            if ($menu==1) {
                                include 'dashboard.php';
                            }else if ($menu==2) {
                                include 'barang/barang.php';
                            }else if ($menu==3) {
                                include 'pengguna/pengguna.php';
                            }else if ($menu==4) {
                                include 'peminjam/peminjam.php';
                            }else if ($menu==5) {
                                include 'peminjaman/peminjaman.php';
                            }else if ($menu==6) {
                                include 'pengembalian/pengembalian.php';
                            }else if ($menu==7) {
                                include 'peminjaman/viewbarang.php';
                            }else if ($menu==8) {
                                include 'pengembalian/viewbarang.php';
                            }
                            for ($i=0; $i < 7; $i++) { 
                                if ($i == $menu) {
                                   echo "<script>document.getElementById('menu$i').className = 'active'</script>";
                                }else{
                                    echo "<script>document.getElementById('menu$i').className = ''</script>";
                                }
                            }
                        }else{
                            include 'dashboard.php';
                            echo "<script>document.getElementById('menu1').className = 'active'</script>";
                        }
                        ?>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="../../../cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../assets/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../assets/js/jquery.sharrre.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1_8C5Xz9RpEeJSaJ3E_DeBv8i7j_p6Aw"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="../assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard23cd.js?v=1.2.1"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script src="../assets/chartjs/chart.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });
        $('#datatable').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });
        $('#customtables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": '5',
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });

        var table = $('#datatables').DataTable();

        

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>
<script>
    var ctx = document.getElementById('brskChart');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                <?php
                    if (isset($_POST['brng'])) {
                        $id = $_POST['idbrng'];
                        if ($id == "all") {
                            $qjr = mysqli_query($conn, "SELECT *,count(kondisi) as total FROM detail_barang group by kondisi");
                            while ($f=mysqli_fetch_array($qjr)) {
                                echo $f['total'].",";
                            }
                        }else{
                            $qjr = mysqli_query($conn, "SELECT *,count(kondisi) as total FROM detail_barang where id_barang='$id' group by kondisi");
                            while ($f=mysqli_fetch_array($qjr)) {
                                echo $f['total'].",";
                            }
                        }
                    }else{
                        $qjr = mysqli_query($conn, "SELECT *,count(kondisi) as total FROM detail_barang group by kondisi");
                        while ($f=mysqli_fetch_array($qjr)) {
                            echo $f['total'].",";
                        }
                    }
                ?>
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.35)',
                    'rgba(255, 99, 132, 0.35)',
                    //'rgba(54, 162, 235, 0.2)',
                    //'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    //'rgba(54, 162, 235, 1)',
                    //'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }],
            labels: ['Jumlah Bagus', 'Jumlah Rusak']
        }
    })
</script>
<?php 
    if (isset($_POST['brng'])) {
        $id = $_POST['idbrng'];
        if ($id == "all") {
            echo "<script>document.getElementById('jrusak').innerHTML = 'Grafik Data Semua Barang';</script>";
        }else{
            $qnr = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM barang where id_barang='$id'"));
            $nama = $qnr['nama'];
            echo "<script>document.getElementById('jrusak').innerHTML = 'Grafik Data $nama';</script>";
        }
    }
?>
<script type="text/javascript">
    //function test(){
        var abc = document.getElementById('pemChart');
        var a = new Chart(abc, {
            type: 'line',
            data: {
                labels: [
                <?php
                    $slabel = mysqli_query($conn, "SELECT tgl_pinjam FROM peminjaman group by tgl_pinjam");
                    while ($fetch = mysqli_fetch_array($slabel)) {
                ?>
                    "<?= $fetch['tgl_pinjam']?>",
                <?php
                    }
                ?>
                ],
                datasets: [{
                    label: 'Total',
                    data: [
                    <?php
                    $query = mysqli_query($conn, "SELECT count(id_peminjaman) as points FROM peminjaman group by tgl_pinjam");
                        while ($fetch = mysqli_fetch_array($query)) {
                    ?>
                        "<?= $fetch['points']?>",
                    <?php
                        }
                    ?>
                    ],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    //}
</script>
<script type="text/javascript">
    function hapus(link) {
        swal({
            title: "Yakin Data Akan Di Hapus?",
            text: "",
            icon: "warning",
            buttons: true,
        })
        .then((golink) => {
          if (golink) {
            window.location = link; 
          }
        })
      }
    function keluar() {
        swal({
            title: "Yakin Ingin Logout?",
            text: "",
            icon: "info",
            buttons: true,
        })
        .then((golink) => {
          if (golink) {
            window.location = 'logout.php'; 
          }
        })
      }
    <?php
        if (isset($_SESSION['notif'])) {
            $notif = $_SESSION['notif'];
            $icon = $_SESSION['icon'];
            echo "swal('$notif','','$icon')";
            unset($_SESSION['notif']);
            unset($_SESSION['icon']);
        }
    ?>
</script>
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jan 2018 06:14:54 GMT -->
</html>
<?php
    }else{
        $_SESSION['notif'] = "flogin";
        echo "<script>window.location='../index.php';</script>";
    }
?>
