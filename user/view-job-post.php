<?php

//To Handle Session Variables on This Page
session_start();

if (empty($_SESSION['name'])) {
  header("Location: ../index.php");
  exit();
}


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");

$sql = "SELECT * FROM apply_job_post WHERE id_user='$_SESSION[name]' AND id_jobpost='$_GET[id]'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

  $sql1 = "SELECT * FROM job_post INNER JOIN company ON job_post.id_company=company.id_company WHERE id_jobpost='$_GET[id]'";
  $result1 = $conn->query($sql1);
  if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
  }
} else {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Placement Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link href="../img/logo.png" rel="icon">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <?php
    include 'header.php';
    ?>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 bg-white padding-2">
              <div class="pull-left">
                <h2><b><?php echo $row['jobtitle']; ?></b></h2>
              </div>
              <div class="pull-right">
                <a href="index.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
              </div>
              <div class="clearfix"></div>
              <hr>
              <p><span class="margin-right-10"><i class="fa fa-location-arrow text-green"> Role: </i> <?php echo $row['experience']; ?> </span><span class="margin-right-10"> <i class="fa fa-money text-green"> CTC:</i> <?php echo "Rs " . $row['minimumsalary'] . "    "; ?></span> <span class="margin-right-10"><i class="fa fa-calendar text-green"> Drive Date:</i> <?php echo date("d-M-Y", strtotime($row['createdat'])); ?></span><span class="margin-right-10"><i class="fa fa-location-calendar text-green"> Eligibility: </i> <?php echo $row['maximumsalary'] . "%"; ?> </span></p>
              <div>
                <?php echo stripcslashes($row['description']); ?>
              </div>


            </div>
            <div class="col-md-2"></div>

          </div>
        </div>
      </section>



    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer" style="margin-left: 0px;">
      <div class="text-center">
        <strong>Copyright &copy; 2023 <a href="scsit@Davv">Placement Portal. Created by STRAW HAT PIRATES.</a>.</strong> All rights
        reserved.
      </div>
    </footer>


    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>
  <script src="../js/sweetalert.js">

  </script>
  </script>
</body>

</html>