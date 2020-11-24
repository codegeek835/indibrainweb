<?php $this->load->view('back/lib/header.php'); ?>

<body>
   <!--  wrapper -->
   <div id="wrapper">
      <!-- navbar top -->
      <?php $this->load->view('back/lib/top_nav.php'); ?>
      <!-- end navbar top -->
      <?php $this->load->view('back/lib/side_nav.php'); ?>
      <!-- navbar side -->
      <!-- end navbar side -->
      <!--  page-wrapper -->
      <div id="page-wrapper">
         <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12">
               <h1 class="page-header">Dashboard</h1>
            </div>
            <!--End Page Header -->
         </div>
         <div class="row">
            <!-- Welcome -->
            <div class="col-lg-12">
               <div class="alert alert-info">
                  <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b><?php echo $this->session->username; ?></b>
               </div>
            </div>
            <!--end  Welcome -->
         </div>
         <div class="row">
            <!--quick info section -->
            <div class="col-lg-4">
               <div class="panel panel-success text-center no-boder">
                  <div class="panel-body green">
                     <i class="fa fa-dollar fa-3x"></i>
                     <h3><?php echo $saleThisMonth->price ?></h3>
                  </div>
                  <div class="panel-footer">
                     <span class="panel-eyecandy-title">Total Sale This Month</span>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="panel panel-primary text-center no-boder">
                  <div class="panel-body blue">
                     <i class="fa fa-photo fa-3x"></i>
                     <h3><?php echo $totalAssets ?></h3>
                  </div>
                  <div class="panel-footer">
                     <span class="panel-eyecandy-title">Total Assets</span>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="panel panel-warnings text-center no-boder">
                  <div class="panel-body red">
                     <i class="fa fa-users fa-3x"></i>
                     <h3><?php echo $totalSubscripation ?></h3>
                  </div>
                  <div class="panel-footer">
                     <span class="panel-eyecandy-title">Total Subscreations</span>
                  </div>
               </div>
            </div>
            <!--end quick info section -->
         </div>
         <div class="row">
            <div class="col-lg-8">
               <!--Simple table example -->
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom:30px">
                  <div class="chart-b col-lg-3 text-right" style="">
                     <select onChange="drawVisualization1()" name="expType" id="expType" class="form-control">
                        <option value="Monthly">Month</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Yearly">Yearly</option>
                     </select>
                  </div>
                  <div id="chart_bar" style="width: 100%; height: 500px;overflow: hidden;box-shadow: 0 0 0 1px rgba(61, 70, 79, .05), 0 1px 3px 0 rgba(61, 70, 79, .15);"></div>
               </div>
               <!--End simple table example -->
            </div>
            <div class="col-lg-4">
               <div class="panel panel-primary text-center no-boder">
                  <div class="panel-body blue">
                     <i class="fa fa-users fa-3x"></i>
                     <h3><?php echo $totalPartners ?></h3>
                  </div>
                  <div class="panel-footer">
                     <span class="panel-eyecandy-title">Creative Partner </span>
                  </div>
               </div>
               <div class="panel panel-primary text-center no-boder">
                  <div class="panel-body red">
                     <i class="fa fa-user fa-3x"></i>
                     <h3><?php echo $totalUsers ?></h3>
                  </div>
                  <div class="panel-footer">
                     <span class="panel-eyecandy-title">User Registered
                     </span>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-8">
               <!--Simple table example -->
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom:30px">
                  <div class="chart-b text-right">
                     <button type="button" id="showAssets" class="cb1"> <i class="fa fa-file-text-o"></i> Assets</button>
                     <button type="button" id="showDownload" class="cb2"> <i class="fa fa-download"></i> download</button>
                     <button type="button" id="showEarning" class="cb3"> <i class="fa fa-money"></i> Earnings</button>
                  </div>
                  <div id="chart_div" style="width: 100%; height: 500px;overflow: hidden;box-shadow: 0 0 0 1px rgba(61, 70, 79, .05), 0 1px 3px 0 rgba(61, 70, 79, .15);"></div>
               </div>
               <!--End simple table example -->
            </div>
            <div class="col-lg-4">
               <div class="panel panel-primary text-center no-boder">
                  <div class="panel-body blue">
                     <i class="fa fa-users fa-3x"></i>
                     <h3><?php echo $totalPartners ?></h3>
                  </div>
                  <div class="panel-footer">
                     <span class="panel-eyecandy-title">Creative Partner </span>
                  </div>
               </div>
               <div class="panel panel-primary text-center no-boder">
                  <div class="panel-body red">
                     <i class="fa fa-user fa-3x"></i>
                     <h3><?php echo $totalUsers ?></h3>
                  </div>
                  <div class="panel-footer">
                     <span class="panel-eyecandy-title">User Registered
                     </span>
                  </div>
               </div>
            </div>
         </div>

      </div>
      <!-- end page-wrapper -->
      <script src="<?php echo base_url() ?>assets/back/plugins/dataTables/jquery.dataTables.js"></script>
      <script>
         $(document).ready(function() {

            $('#dataTables-example').dataTable();

         });
      </script>
      <!-- end page-wrapper -->
   </div>
   <!-- Core Scripts - Include with every page -->
   <?php $this->load->view('back/lib/footer.php'); ?>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {
         'packages': ['corechart']
      });

      var graphAsset = document.getElementById('showAssets');
      var graphDownload = document.getElementById('showDownload');
      var graphEarning = document.getElementById('showEarning');

      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
         var data = google.visualization.arrayToDataTable([
            ['Month', ''],
            ['Jan', <?php echo $asset_chat['Jan']; ?>],
            ['Feb', <?php echo $asset_chat['Feb']; ?>],
            ['Mar', <?php echo $asset_chat['Mar']; ?>],
            ['Apr', <?php echo $asset_chat['Apr']; ?>],
            ['May', <?php echo $asset_chat['May']; ?>],
            ['Jun', <?php echo $asset_chat['Jun']; ?>],
            ['Jul', <?php echo $asset_chat['Jul']; ?>],
            ['Aug', <?php echo $asset_chat['Aug']; ?>],
            ['Sep', <?php echo $asset_chat['Sep']; ?>],
            ['Oct', <?php echo $asset_chat['Oct']; ?>],
            ['Nav', <?php echo $asset_chat['Nov']; ?>],
            ['Dec', <?php echo $asset_chat['Dec']; ?>]
         ]);
         var options = {
            title: 'Asset Upload Per Month',
            vAxis: {
               title: ''
            },
            hAxis: {
               title: ''
            },
            seriesType: 'bars',
            series: {
               5: {
                  type: 'line'
               }
            }
         };
         var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
         chart.draw(data, options);

         graphAsset.onclick = function() {
            var data = google.visualization.arrayToDataTable([
               ['Month', ''],
               ['Jan', <?php echo $asset_chat['Jan']; ?>],
               ['Feb', <?php echo $asset_chat['Feb']; ?>],
               ['Mar', <?php echo $asset_chat['Mar']; ?>],
               ['Apr', <?php echo $asset_chat['Apr']; ?>],
               ['May', <?php echo $asset_chat['May']; ?>],
               ['Jun', <?php echo $asset_chat['Jun']; ?>],
               ['Jul', <?php echo $asset_chat['Jul']; ?>],
               ['Aug', <?php echo $asset_chat['Aug']; ?>],
               ['Sep', <?php echo $asset_chat['Sep']; ?>],
               ['Oct', <?php echo $asset_chat['Oct']; ?>],
               ['Nav', <?php echo $asset_chat['Nov']; ?>],
               ['Dec', <?php echo $asset_chat['Dec']; ?>]
            ]);
            var options = {
               title: 'Asset Upload Per Month',
               vAxis: {
                  title: ''
               },
               hAxis: {
                  title: ''
               },
               seriesType: 'bars',
               series: {
                  5: {
                     type: 'line'
                  }
               }
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
         }
         graphDownload.onclick = function() {
            var data = google.visualization.arrayToDataTable([
               ['Month', ''],
               ['Jan', <?php echo $download_chat['Jan']; ?>],
               ['Feb', <?php echo $download_chat['Feb']; ?>],
               ['Mar', <?php echo $download_chat['Mar']; ?>],
               ['Apr', <?php echo $download_chat['Apr']; ?>],
               ['May', <?php echo $download_chat['May']; ?>],
               ['Jun', <?php echo $download_chat['Jun']; ?>],
               ['Jul', <?php echo $download_chat['Jul']; ?>],
               ['Aug', <?php echo $download_chat['Aug']; ?>],
               ['Sep', <?php echo $download_chat['Sep']; ?>],
               ['Oct', <?php echo $download_chat['Oct']; ?>],
               ['Nav', <?php echo $download_chat['Nov']; ?>],
               ['Dec', <?php echo $download_chat['Dec']; ?>]
            ]);
            var options = {
               title: 'Downloads Per Month',
               vAxis: {
                  title: ''
               },
               hAxis: {
                  title: ''
               },
               seriesType: 'bars',
               series: {
                  5: {
                     type: 'line'
                  }
               }
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
         }
         graphEarning.onclick = function() {
            var data = google.visualization.arrayToDataTable([
               ['Month', ''],
               ['Jan', <?php echo $earning_chat['Jan']; ?>],
               ['Feb', <?php echo $earning_chat['Feb']; ?>],
               ['Mar', <?php echo $earning_chat['Mar']; ?>],
               ['Apr', <?php echo $earning_chat['Apr']; ?>],
               ['May', <?php echo $earning_chat['May']; ?>],
               ['Jun', <?php echo $earning_chat['Jun']; ?>],
               ['Jul', <?php echo $earning_chat['Jul']; ?>],
               ['Aug', <?php echo $earning_chat['Aug']; ?>],
               ['Sep', <?php echo $earning_chat['Sep']; ?>],
               ['Oct', <?php echo $earning_chat['Oct']; ?>],
               ['Nav', <?php echo $earning_chat['Nov']; ?>],
               ['Dec', <?php echo $earning_chat['Dec']; ?>]
            ]);
            var options = {
               title: 'Earning Per Month',
               vAxis: {
                  title: ''
               },
               hAxis: {
                  title: ''
               },
               seriesType: 'bars',
               series: {
                  5: {
                     type: 'line'
                  }
               }
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
         }

      }

      google.charts.load('current', {
         'packages': ['corechart']
      });


      google.charts.setOnLoadCallback(drawVisualization1);

      function drawVisualization1() {
         var data = google.visualization.arrayToDataTable([
            ['Month', ''],
            ['Jan', <?php echo $asset_chat['Jan']; ?>],
            ['Feb', <?php echo $asset_chat['Feb']; ?>],
            ['Mar', <?php echo $asset_chat['Mar']; ?>],
            ['Apr', <?php echo $asset_chat['Apr']; ?>],
            ['May', <?php echo $asset_chat['May']; ?>],
            ['Jun', <?php echo $asset_chat['Jun']; ?>],
            ['Jul', <?php echo $asset_chat['Jul']; ?>],
            ['Aug', <?php echo $asset_chat['Aug']; ?>],
            ['Sep', <?php echo $asset_chat['Sep']; ?>],
            ['Oct', <?php echo $asset_chat['Oct']; ?>],
            ['Nav', <?php echo $asset_chat['Nov']; ?>],
            ['Dec', <?php echo $asset_chat['Dec']; ?>]
         ]);
         var options = {
            title: 'Per Month',
            vAxis: {
               title: ''
            },
            hAxis: {
               title: ''
            },
            seriesType: 'bars',
            series: {
               5: {
                  type: 'line'
               }
            }
         };
         var chart = new google.visualization.ComboChart(document.getElementById('chart_bar'));
         chart.draw(data, options);
         if ($("#expType").val() == 'Quarterly') {
            //graphAsset.onclick = function () {
            var data = google.visualization.arrayToDataTable([
               ['Month', ''],
               ['Jan', <?php echo $asset_chat['Jan']; ?>],
               ['Feb', <?php echo $asset_chat['Feb']; ?>],
               ['Mar', <?php echo $asset_chat['Mar']; ?>],
               ['Apr', <?php echo $asset_chat['Apr']; ?>],
               ['May', <?php echo $asset_chat['May']; ?>],
               ['Jun', <?php echo $asset_chat['Jun']; ?>],
               ['Jul', <?php echo $asset_chat['Jul']; ?>],
               ['Aug', <?php echo $asset_chat['Aug']; ?>],
               ['Sep', <?php echo $asset_chat['Sep']; ?>],
               ['Oct', <?php echo $asset_chat['Oct']; ?>],
               ['Nav', <?php echo $asset_chat['Nov']; ?>],
               ['Dec', <?php echo $asset_chat['Dec']; ?>]
            ]);
            var options = {
               title: 'Quarterly',
               vAxis: {
                  title: ''
               },
               hAxis: {
                  title: ''
               },
               seriesType: 'bars',
               series: {
                  5: {
                     type: 'line'
                  }
               }
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_bar'));
            chart.draw(data, options);
            //}  
         }
         if ($("#expType").val() == 'Yearly') {
            //graphDownload.onclick = function () {
            var data = google.visualization.arrayToDataTable([
               ['Month', ''],
               ['Jan', <?php echo $download_chat['Jan']; ?>],
               ['Feb', <?php echo $download_chat['Feb']; ?>],
               ['Mar', <?php echo $download_chat['Mar']; ?>],
               ['Apr', <?php echo $download_chat['Apr']; ?>],
               ['May', <?php echo $download_chat['May']; ?>],
               ['Jun', <?php echo $download_chat['Jun']; ?>],
               ['Jul', <?php echo $download_chat['Jul']; ?>],
               ['Aug', <?php echo $download_chat['Aug']; ?>],
               ['Sep', <?php echo $download_chat['Sep']; ?>],
               ['Oct', <?php echo $download_chat['Oct']; ?>],
               ['Nav', <?php echo $download_chat['Nov']; ?>],
               ['Dec', <?php echo $download_chat['Dec']; ?>]
            ]);
            var options = {
               title: 'Per Year',
               vAxis: {
                  title: ''
               },
               hAxis: {
                  title: ''
               },
               seriesType: 'bars',
               series: {
                  5: {
                     type: 'line'
                  }
               }
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_bar'));
            chart.draw(data, options);
            //}
         }
         if ($("#expType").val() == 'Monthly') {
            //graphEarning.onclick = function () {
            var data = google.visualization.arrayToDataTable([
               ['Month', ''],
               ['Jan', <?php echo $earning_chat['Jan']; ?>],
               ['Feb', <?php echo $earning_chat['Feb']; ?>],
               ['Mar', <?php echo $earning_chat['Mar']; ?>],
               ['Apr', <?php echo $earning_chat['Apr']; ?>],
               ['May', <?php echo $earning_chat['May']; ?>],
               ['Jun', <?php echo $earning_chat['Jun']; ?>],
               ['Jul', <?php echo $earning_chat['Jul']; ?>],
               ['Aug', <?php echo $earning_chat['Aug']; ?>],
               ['Sep', <?php echo $earning_chat['Sep']; ?>],
               ['Oct', <?php echo $earning_chat['Oct']; ?>],
               ['Nav', <?php echo $earning_chat['Nov']; ?>],
               ['Dec', <?php echo $earning_chat['Dec']; ?>]
            ]);
            var options = {
               title: 'Per Month',
               vAxis: {
                  title: ''
               },
               hAxis: {
                  title: ''
               },
               seriesType: 'bars',
               series: {
                  5: {
                     type: 'line'
                  }
               }
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_bar'));
            chart.draw(data, options);
            // }
         }
      }
   </script>
</body>

</html>