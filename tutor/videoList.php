<html>
<head>
  <title>Video List</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-blue-cyan" data-col="2-columns">

  <?php
  session_start();
  include './layout/config.php';
  include './layout/sidebar.php';

  ?>

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">All My Videos</h3>
        </div>

        <div class="content-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-content">
                    <div class="card-body">

                      <?php
                      $thistutor = $_SESSION['username'];
                      $sqlQuery = "SELECT v.mod_id ,  v.name , v. description , v. filename , v.subtitles , v.datetimestamp
                      from video v , module m WHERE v.mod_id = m.id AND m.tutor = '$thistutor';";
                      $result = mysqli_query($db, $sqlQuery);

                      echo
                      "<div class='table-responsive'>".
                      "<table class='table table-borderless' style='font-size:14px;'>" .
                      "<tr>
                      <thead>
                      <th>Module<br/>Class</th>
                      <th>Video Name<br/>
                      Description & time</th>
                      <th>Filename
                      Subtitles</th>
                      <th></th>
                      </tr>
                      </thead>";

                      while ($row = mysqli_fetch_assoc($result)) {

                        $subs = $row['subtitles'];
                        $vid  = $row['filename'];
                        $mod_id  = $row['mod_id'];

                        $sql1 = "SELECT * FROM module WHERE id = '$mod_id';";
                        $result1 = mysqli_query($db, $sql1);
                        $rowrow = mysqli_fetch_row($result1);
                        $moduleName = $rowrow[1];
                        if ($rowrow[3] == 0){
                          $day_label = "Sun";
                        }
                        elseif ($rowrow[3] == 1) {
                          $day_label = "Mon";
                        }
                        elseif ($rowrow[3] == 2) {
                          $day_label = "Tue";
                        }
                        elseif ($rowrow[3] == 3) {
                          $day_label = "Wed";
                        }
                        elseif ($rowrow[3] == 4) {
                          $day_label = "Thu";
                        }
                        elseif ($rowrow[3] == 5) {
                          $day_label = "Fri";
                        }
                        else{
                          $day_label = "Sat";
                        }
                        echo
                        "<tr>
                        <th>". $moduleName.
						"<br/>". $day_label . " " . $rowrow[4] . " - " . $rowrow[5] ."</th>
                        <th>". $row['name'].
							"<br/>". $row['description'].
							"<br/>". $row['datetimestamp'].
						"</th>
                        <th>". $row['filename']."<br/>".$row['subtitles']."</th>

                        <th><a class='btn btn-info' href='viewVideo.php?id=$vid&subs=$subs'>
                        <b>Watch</b></a></th>
                        </tr>";

                      }
                      echo "</table>";
                      ?>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- end of the whole module card -->

          </div> <!-- div row -->
        </div> <!-- content body -->

      </div>
    </div> <!-- content-wrapper -->
  </div> <!-- app content -->


  <!-- BEGIN VENDOR JS-->
  <script src="./layout/theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN CHAMELEON  JS-->
  <script src="./layout/theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
  <script src="./layout/theme-assets/js/core/app-lite.js" type="text/javascript"></script>
  <!-- END CHAMELEON  JS-->

</body>
</html>
