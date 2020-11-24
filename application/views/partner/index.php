<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($info->user_level=='Platinum'){
    $share = '70'; 
}elseif($info->user_level=='Gold'){
     $share = '60';
}else{
    $share = '50'; 
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard |  Jephine Creative Agency</title>
    <?php $this->load->view('partner/lib/header.php');?>
  </head>
  <body class="body-bg">
    <?php $this->load->view('partner/lib/top_navigation.php');?>
    <div class="dashboard-wrapper">
      <?php $this->load->view('partner/lib/side_navigation.php');?>
      <div class="dashboard-content">
        <div class="container-fluid">
            
          <div class="row">
            <div class="col-xl-12 col-lg-10 col-md-9 col-sm-12 col-12">
               <div class="dashboard-page-header page-head">
                  <h3 class="dashboard-page-title"><i class="fa fa-smile-o"></i> Hi, <?php if($info->username){ echo $info->username;}?>.</h3>
               </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
              <a href="<?php echo base_url("my-product");?>">
               <div class="card card-summary rounded bg-c-blue">
                  <div class="card-body">
                     <div class="float-left">
                        <div class="summary-count"><?php echo $total_list;?></div>
                        <p>Total Listed Assets</p>
                     </div>
                     <div class="summary-icon"><i class="fa fa-file-text-o"></i></div>
                  </div>
                
               </div>
               </a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
               <div class="card card-summary rounded bg-c-green">
                  <div class="card-body">
                     <div class="float-left">
                        <div class="summary-count"><?php echo $download;?></div>
                        <p>Total Downloads</p>
                     </div>
                     <div class="summary-icon"><i class="fa fa-download"></i></div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
               <div class="card card-summary rounded bg-c-red">
                  <div class="card-body">
                     <div class="float-left">
                         <?php 
                         if($download){
                            $avg =  $earning / $download;
                            
                            $earning =  $new_width = ($share / 100) * $download*$avg;

                         }else{
                            $earning = 0; 
                         } 
                        ?>
                        <div class="summary-count"><?php echo '$'.$earning;?></div>
                        <p>Total Earnings</p>
                     </div>
                     <div class="summary-icon"><i class="fa fa-usd"></i></div>
                  </div>
               </div>
            </div>
          </div>
          <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom:30px">
              <div class="chart-b text-right" style=""> 
              <button type="button" id="showAssets" class="cb1"> <i class="fa fa-file-text-o"></i> Assets</button> 
              <button type="button" id="showDownload" class="cb2"> <i class="fa fa-download"></i> download</button> 
              <button type="button" id="showEarning" class="cb3"> <i class="fa fa-money"></i> Earnings</button> 
              </div>      
             <div id="chart_div" style="width: 100%; height: 500px;overflow: hidden;box-shadow: 0 0 0 1px rgba(61, 70, 79, .05), 0 1px 3px 0 rgba(61, 70, 79, .15);"></div>
             </div>
          </div>
            
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card-footer table-view">
                <a href="#"> Recent Downloads</a>
               </div>
               <div class="table-responsive">
               <table class="table table-bordered table-hover bg-white">
                                    <thead>
                                       <tr>
                                          <th><i class="fa fa-handshake-o"></i> Asset</th>
                                          <th><i class="fa fa-list"></i> Category</th>
                                          <th><i class="fa fa-money"></i> Price</th>
                                          <th><i class="fa fa-download"></i> Downloads</th>
                                          <th><i class="fa fa-money"></i> Earnings</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                    <?php if($downloads){foreach($downloads as $order){?>
                      <tr>
                        <td><?php echo $order->product_name;?></td>
                        <td><?php echo geProductByCatName($order->product_id);?></td>
                        <!--<td><?php echo $order->created_at;?></td>-->
                        <td>$<?php echo number_format($order->product_price,2);?></td>
                        <td><?php echo $order->downloads;?></td>
                        <?php
                            $avg =  $order->price / $order->downloads;
                            $earnig =  $new_width = ($share / 100) * $order->downloads*$avg;
                        ?>
                        <td>$<?php echo number_format($earnig,2);?></td>
                      </tr>
                    <?php }}else{?>
                      <tr> <td colspan="6" style="color: red; text-align: center">Sorry not data found</td></tr>
                    <?php }?>
                  </tbody>
                                 </table>
               </div>
            </div>
          </div>
        </div>
      </div>
      <?php $this->load->view('partner/lib/footer-side.php');?>
    </div>
    <?php $this->load->view('partner/lib/footer.php');?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      
      var graphAsset = document.getElementById('showAssets');
      var graphDownload = document.getElementById('showDownload');
      var graphEarning = document.getElementById('showEarning');
      
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
          var data = google.visualization.arrayToDataTable([
              ['Month', ''],
              ['Jan',  <?php echo $asset_chat['Jan'];?>],
              ['Feb',  <?php echo $asset_chat['Feb'];?>],
              ['Mar',  <?php echo $asset_chat['Mar'];?>],
              ['Apr',  <?php echo $asset_chat['Apr'];?>],
              ['May',  <?php echo $asset_chat['May'];?>],
              ['Jun',  <?php echo $asset_chat['Jun'];?>],
              ['Jul', <?php echo $asset_chat['Jul'];?>],
              ['Aug',  <?php echo $asset_chat['Aug'];?>],
              ['Sep',  <?php echo $asset_chat['Sep'];?>],
              ['Oct',  <?php echo $asset_chat['Oct'];?>],
              ['Nav',  <?php echo $asset_chat['Nov'];?>],
              ['Dec',  <?php echo $asset_chat['Dec'];?>]
            ]);
            var options = {
              title : 'Asset Upload Per Month',
              vAxis: {title: ''},
              hAxis: {title: ''},
              seriesType: 'bars',
              series: {5: {type: 'line'}}
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        
        graphAsset.onclick = function () {
            var data = google.visualization.arrayToDataTable([
              ['Month', ''],
              ['Jan',  <?php echo $asset_chat['Jan'];?>],
              ['Feb',  <?php echo $asset_chat['Feb'];?>],
              ['Mar',  <?php echo $asset_chat['Mar'];?>],
              ['Apr',  <?php echo $asset_chat['Apr'];?>],
              ['May',  <?php echo $asset_chat['May'];?>],
              ['Jun',  <?php echo $asset_chat['Jun'];?>],
              ['Jul', <?php echo $asset_chat['Jul'];?>],
              ['Aug',  <?php echo $asset_chat['Aug'];?>],
              ['Sep',  <?php echo $asset_chat['Sep'];?>],
              ['Oct',  <?php echo $asset_chat['Oct'];?>],
              ['Nav',  <?php echo $asset_chat['Nov'];?>],
              ['Dec',  <?php echo $asset_chat['Dec'];?>]
            ]);
            var options = {
              title : 'Asset Upload Per Month',
              vAxis: {title: ''},
              hAxis: {title: ''},
              seriesType: 'bars',
              series: {5: {type: 'line'}}
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }   
        graphDownload.onclick = function () {
            var data = google.visualization.arrayToDataTable([
              ['Month', ''],
              ['Jan',  <?php echo $download_chat['Jan'];?>],
              ['Feb',  <?php echo $download_chat['Feb'];?>],
              ['Mar',  <?php echo $download_chat['Mar'];?>],
              ['Apr',  <?php echo $download_chat['Apr'];?>],
              ['May',  <?php echo $download_chat['May'];?>],
              ['Jun',  <?php echo $download_chat['Jun'];?>],
              ['Jul', <?php echo $download_chat['Jul'];?>],
              ['Aug',  <?php echo $download_chat['Aug'];?>],
              ['Sep',  <?php echo $download_chat['Sep'];?>],
              ['Oct',  <?php echo $download_chat['Oct'];?>],
              ['Nav',  <?php echo $download_chat['Nov'];?>],
              ['Dec',  <?php echo $download_chat['Dec'];?>]
            ]);
            var options = {
              title : 'Downloads Per Month',
              vAxis: {title: ''},
              hAxis: {title: ''},
              seriesType: 'bars',
              series: {5: {type: 'line'}}
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        graphEarning.onclick = function () {
            var data = google.visualization.arrayToDataTable([
              ['Month', ''],
              ['Jan',  <?php echo $earning_chat['Jan'];?>],
              ['Feb',  <?php echo $earning_chat['Feb'];?>],
              ['Mar',  <?php echo $earning_chat['Mar'];?>],
              ['Apr',  <?php echo $earning_chat['Apr'];?>],
              ['May',  <?php echo $earning_chat['May'];?>],
              ['Jun',  <?php echo $earning_chat['Jun'];?>],
              ['Jul', <?php echo $earning_chat['Jul'];?>],
              ['Aug',  <?php echo $earning_chat['Aug'];?>],
              ['Sep',  <?php echo $earning_chat['Sep'];?>],
              ['Oct',  <?php echo $earning_chat['Oct'];?>],
              ['Nav',  <?php echo $earning_chat['Nov'];?>],
              ['Dec',  <?php echo $earning_chat['Dec'];?>]
            ]);
            var options = {
              title : 'Earning Per Month',
              vAxis: {title: ''},
              hAxis: {title: ''},
              seriesType: 'bars',
              series: {5: {type: 'line'}}
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        
      }
    </script>
  </body>
</html>