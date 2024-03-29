<html>
<head>
  <title>Notifications</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="layout/timetablestyle.css">
  <link rel="apple-touch-icon" href="./layout/theme-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="../lightbulb.ico">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="./layout/theme-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="./layout/theme-assets/vendors/css/charts/chartist.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN CHAMELEON  CSS-->
  <link rel="stylesheet" type="text/css" href="./layout/theme-assets/css/app-lite.css">
  <!-- END CHAMELEON  CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="./layout/theme-assets/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="./layout/theme-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="./layout/theme-assets/css/pages/dashboard-ecommerce.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

  <?php
  include 'session.php';
  include './layout/config.php';
  include './layout/sidebar.php';

  ?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Notifications</h3>
        </div>

      </div>

      <div class="content-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-content">
                  <div class="card-body">
                    <?php
                    $username = $_SESSION['login_user'];
                    $sql1 = "SELECT account_type FROM account WHERE username = '$username';";
                    $result1 = mysqli_query($db, $sql1);
                    $colorsnum = 0;
                    while ($row1 = mysqli_fetch_row($result1)) {
                      $acctype = $row1[0];
                      if ($acctype == "student"){
                        $sql = "SELECT * FROM notification WHERE receiver = '$username' ORDER BY datetimestamp DESC;";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0){
                          $numResults = 0;
                          $date = date("Y-m-d");
                          $comparedate = $date;
                          while ($row = mysqli_fetch_row($result)){
                            $numResults = $numResults + 1;
                            if (substr($row[5], 0, 10) <= $date){
                              $comparedate = $date;
                              $date = substr($row[5], 0, 10);

                              if ($date < $comparedate){
                                echo "</table><hr/></div><br/><h5>$date</h5><br/>";
                              }
                              else if ($date == $comparedate && $numResults == 1){
                                echo "<h5>$date</h5><br/>";
                              }
                              echo "<hr/><div class='table-responsive'><table style='width:100%; class='table'>";
                            }
                            echo "<tr class='clickable-row' data-href='viewmodule.php?module_id=$row[4]'><th>". $row[1] . "</th></tr>";

                            $tempstore[] = $row[0];
                          }
                          echo "</table><hr/></div><br/>";
                          foreach ($tempstore as $value) {
                            $sql2 = "UPDATE notification SET isRead = '1' WHERE id = '$value' AND receiver = '$username';";
                            $result2 = mysqli_query($db, $sql2);
                          }
                        }
                        else{
                          echo "<h6>You have no notifications.</h6>";
                        }

                      }
                    }
                    ?>


                  </div>
                </div>
              </div>
            </div>
            <h6><a class='btn btn-primary' href = 'studentdashboard.php'>Back</a></h6>
          </div>

        </div>  <!-- end of content-body -->
      </div>  <!-- end of content-wrapper -->
    </div>  <!-- end of app-content content -->
  </div>
  ?>


  <!-- BEGIN VENDOR JS-->
  <script src="./layout/theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN CHAMELEON  JS-->
  <script src="./layout/theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
  <script src="./layout/theme-assets/js/core/app-lite.js" type="text/javascript"></script>
  <!-- END CHAMELEON  JS-->
  <script>jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
      window.location = $(this).data("href");
    });
  });</script>

</body>
</html>
