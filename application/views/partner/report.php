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
      <?php $this->load->view('partner/lib/header.php');?>
      <link rel='stylesheet' href='https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css'>
   </head>
   <body class="body-bg">
      <?php $this->load->view('partner/lib/top_navigation.php');?>
      <div class="dashboard-wrapper">
      <?php $this->load->view('partner/lib/side_navigation.php');?>
      <div class="dashboard-content">
         <div class="container-fluid">
            <div class="row page-head">
               <h2 class="find">Find your work & financial reports here</h2>
            </div>
            <br>
            <div class="row">
               <!-- tab -->
               <div class="tab">
                  <button class="tablinks" onclick="openCity(event, 'data')" id="defaultOpen"><i class="fa fa-table"></i> Data Reports</button>
                  <button class="tablinks" onclick="openCity(event, 'payment')"><i class="fa fa-money"></i> Payment Report</button>
               </div>
               <div id="data" class="tabcontent bg-white">                                                                                                                                                                                       
                     <div class="row">
                        <div class="col-sm-12 col-md-12">
                           <h4><b>Select Period</b></h4>
                            <form action="<?php echo site_url('reports');?>" method="get" accept-charset="utf-8">
                           <div class="row">
                              <div class="col-md-4">
                                 <input class="form-control" name="fDate" required value="<?php if(isset($_GET['fDate'])){ echo $_GET['fDate'];}?>" type="text" placeholder="from date" id="from">
                              </div>
                              <div class="col-md-1">
                                 <p style="text-align: center;margin-bottom: 10px;">To</p>
                              </div>
                              <div class="col-md-4">
                                 <input class="form-control" name="tDate" required value="<?php if(isset($_GET['tDate'])){ echo $_GET['tDate'];}?>" type="text" placeholder="to date" id="to">
                              </div>
                              <div class="col-md-3">
                                 <input type="submit" value="GO" class="btn btn-primary" style="width: 100%;">
                              </div>
                           </div>
                           </form>
                        </div>
                     </div>
                     <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <h4><b>Asset Summary</b></h4>
                              </div>
                              <div class="col-md-6"><input class="form-control" id="myInput" type="text" placeholder="Search by keyword.."></div>
                              <div class="col-md-12" style="overflow-x:auto;">
                                 <table class="table table-bordered table-hover" style="display: inline-table;">
                                    <thead>
                                       <tr>
                                          <th class="font"><i class="fa fa-handshake-o"></i> Asset</th>
                                          <th class="font"><i class="fa fa-list"></i> Category</th>
                                          <!--<th class="font"><i class="fa fa-table"></i> Upload Date</th>-->
                                          <!--<th class="font"><i class="fa fa-table"></i> Download Date</th>-->
                                          <th class="font"><i class="fa fa-money"></i> Price</th>
                                          <th class="font"><i class="fa fa-download"></i> Downloads</th>
                                          <th class="font"><i class="fa fa-money"></i> Earnings</th>
                                       </tr>
                                    </thead>
                                    <tbody id="myList">
                                         <?php if($assetSummarys){foreach($assetSummarys as $assetSummary){?>
                                        <tr>
                                            <td><?php echo $assetSummary->product_name;?></td>
                                            <td><?php echo geProductByCatName($assetSummary->product_id);?></td>
                                            <!--<td>07-may-2020 </td>-->
                                            <!--<td>07-may-2020</td>-->
                                            <td>$<?php echo number_format($assetSummary->product_price,2);?></td>
                                            <td><?php echo $assetSummary->downloads;?></td>
                                            <?php
                                            $avg =  $assetSummary->price / $assetSummary->downloads;
                                            $earnig = ($share / 100) * $assetSummary->downloads*$avg;
                                            ?>
                                            <td>$<?php echo number_format($earnig,2);?></td>
                                        
                                        </tr>
                                        <?php }}else{?>
                                      <tr>
                                          <td colspan="5">Sorry Data Not Found.</td>
                                       </tr>
                                       <?php }?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               
               <div id="payment" class="tabcontent bg-white">
                  <div class="col-sm-12 col-md-12 px-0 mb-2">
                     <div class="row">
                        <div class="col-sm-12 col-md-12">
                           <h4><b>Select Statement Period</b></h4>
                           <form action="<?php echo site_url('reports');?>" method="get" accept-charset="utf-8">
                           <div class="row">
                              <div class="col-md-4">
                                 <input class="form-control" name="payfDate" required value="<?php if(isset($_GET['payfDate'])){ echo $_GET['payfDate'];}?>" type="text" placeholder="from date" id="from1">
                              </div>
                              <div class="col-md-1">
                                 <p style="text-align: center;margin-bottom: 10px;">To</p>
                              </div>
                              <div class="col-md-4">
                                 <input class="form-control" name="paytDate" required value="<?php if(isset($_GET['paytDate'])){ echo $_GET['paytDate'];}?>" type="text" placeholder="to date" id="to1">
                              </div>
                              <div class="col-md-3">
                                 <input type="submit" value="GO" class="btn btn-primary" style="width: 100%;">
                              </div>
                           </div>
                           </form>
                        </div>
                     </div>
                     <div class="row" style="margin-top: 20px;">
                        <div class="col-sm-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <h4><b>Invoices Details</b></h4>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    
                                   
                                    <select class="form-control" id="pay_status" onchange="myFunction()">
                                       <option value="" >Choose one</option>
                                       <option value="Pending" <?php if(isset($_GET['pay_status']) && $_GET['pay_status'] =='0'){ echo "selected";}?>>Pending</option>
                                       <option value="Paid" <?php if(isset($_GET['pay_status']) && $_GET['pay_status'] =='1'){ echo "selected";}?>>Paid</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-12" style="overflow-x:auto;">
                                 <table class="table table-bordered table-hover">
                                    <thead>
                                       <tr>
                                          <th><i class="fa fa-file-text-o"></i> Invoices</th>
                                          <th><i class="fa fa-list"></i> Creative Partner</th>
                                          <th><i class="fa fa-calendar-o"></i> Invoice Date</th>
                                          <th><i class="fa fa-money"></i> AMOUNT</th>
                                          <th><i class="fa fa-star-half-o"></i> Status</th>
                                       </tr>
                                    </thead>
                                    <tbody id="myList2">
                                        <?php if($paymentReports){ foreach($paymentReports as $paymentReport){?>
                                       <tr>
                                          <td><?php echo $paymentReport->invoice;?></td>
                                          <td><?php echo geUserDetails($paymentReport->user_id)->username;?></td>
                                          <td><?php echo $paymentReport->invoice_date;?></td>
                                          <?php
                                            $avg =  $paymentReport->amount / $paymentReport->downloads;
                                            $earnig =  ($share / 100) * $paymentReport->downloads*$avg;
                                            ?>
                                            <td>$<?php echo number_format($earnig,2);?></td>
                                            
                                          
                                          <td class="text-danger"><?php if($paymentReport->status=='0'){echo "Pending";}else{ echo "Paid";}?></td>
                                       </tr>
                                       <?php }}else{?>
                                      <tr>
                                          <td colspan="5" style="color:red;">Sorry Data Not Found.</td>
                                       </tr>
                                       <?php }?>
                                    </tbody>
                                 </table>
                                <?php echo anchor('generate-pdf', 'Generate PDF Report');?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- tab end -->
               </div>
            </div>
         </div>
         <?php $this->load->view('partner/lib/footer-side.php');?>
      </div>
      <?php $this->load->view('partner/lib/footer.php');?>
      <!-- tab js -->
      <script>
         function openCity(evt, cityName) {
           var i, tabcontent, tablinks;
           tabcontent = document.getElementsByClassName("tabcontent");
           for (i = 0; i < tabcontent.length; i++) {
             tabcontent[i].style.display = "none";
           }
           tablinks = document.getElementsByClassName("tablinks");
           for (i = 0; i < tablinks.length; i++) {
             tablinks[i].className = tablinks[i].className.replace(" active", "");
           }
           document.getElementById(cityName).style.display = "block";
           evt.currentTarget.className += " active";
         }
         
         // Get the element with id="defaultOpen" and click on it
         document.getElementById("defaultOpen").click();
      </script>
      <script>
         $(document).ready(function(){
           $("#myInput").on("keyup", function() {
             var value = $(this).val().toLowerCase();
             $("#myList tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });
         });
         
//         $('#pay_status').change(function()
// 		{ 
//             var cur_url = "<?php echo get_current_url();?>";
//             var href = new URL(cur_url);
//             href.searchParams.delete('pay_status');
//             var pay_val = $('#pay_status').val();
            
//             href.searchParams.set('pay_status', pay_val); 
//             window.location.href=href.toString();
            
//         });

    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("pay_status");
        filter = input.value.toUpperCase();
        table = document.getElementById("myList2");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
        }
    }
      </script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js'></script>
      <script  src="https://indibrainweb.com//assets/partner/js/date.js"></script>
      <!-- tab js end-->
   </body>
</html>