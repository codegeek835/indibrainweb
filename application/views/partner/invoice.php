<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   if($_GET['pay']){
     $pay_id = base64_decode(urldecode($_GET['pay']));
     $ci=& get_instance();
     $ci->load->database(); 
     $query = $ci->db->query("SELECT * FROM `request_quote` WHERE `id` = $pay_id");
     $row = $query->result()[0];
   
     $user_id = $row->user_id;
     $user_query = $ci->db->query("SELECT * FROM `users` WHERE `id` = $user_id");
     $user_row = $user_query->result()[0];
   
     $payment_id = $row->payment_id;
     $pay_query = $ci->db->query("SELECT * FROM `payments` WHERE `id` = $payment_id");
     $pay_row = $pay_query->result()[0];
   
     $product_id = $row->product_id;
     $product_query = $ci->db->query("SELECT * FROM `product_list` WHERE `id` = $product_id");
     $product_row = $product_query->result()[0];
   
     $product_user_query = $ci->db->query("SELECT * FROM `users` WHERE `id` = $product_row->user_id");
     $product_user = $product_user_query->result()[0];
   }
   $both ='';
   $singal ='';
   if($pay_row->igst =='0'){
      $both ='';
      $singal ='display: none';
   }else{
      $both ='display: none';
      $singal ='';
   }
   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Celyboom- Invoice</title>
  </head>
  <style type="text/css">
     #words,#words_singal{text-transform: capitalize;}
   </style>
  <script>
    var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
    var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

    function inWords (num) {
      if ((num = num.toString()).length > 9) return 'overflow';
      n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
      if (!n) return; var str = '';
      str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
      str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
      str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
      str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
      str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
      return str;
    }
  </script>
  <body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
      <table style="max-width:800px;margin:30px auto 0px;background-color:#fff;padding:30px 30px 0px 30px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px; border-top: solid 10px #df392d;border-collapse:collapse;">
         <thead style="background:#b9b3b3;">
            <tr>
               <th style="text-align:left;"><img style="max-width: 150px;" src="http://www.theCelyboom.com//assets/image/logo-white.png" alt="Celyboom"></th>
               <th style="text-align:right;font-weight:bold;padding-right:15px;">Tax Invoice/Bill of Supply/Cash Memo</th>
            </tr>
            <tr>
               <th style="text-align:left;"></th>
               <th style="text-align:right;font-weight:400;padding-right:15px;">(Original for Recipient)</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td style="height:35px;"></td>
            </tr>
            <tr>
               <td colspan="2" style="border-bottom: solid 1px #ddd;"></td>
            </tr>
            <tr>
               <td style="width:50%;padding:20px 115px 20px 32px; vertical-align:top">
                  <p style="margin:0 0 10px 0;padding:0;font-size:15px;"><span style="display:block;font-weight:bold;font-size:17px">Serviced By</span><?php echo $product_row->title;?><br><?php echo $product_row->address;?></p>
                  <p style="margin:0 0 10px 0;padding:0;font-size:15px;"><span style="display:block;font-weight:bold;font-size:17px;">Phone</span> <?php echo $product_user->mobile;?></p>
                  <p style="margin:0 0 10px 0;padding:0;font-size:15px;"><span style="display:block;font-weight:bold;font-size:17px;">Booking Id</span> <?php echo $pay_row->order_id;?></p>
                  <p style="margin:0 0 10px 0;padding:0;font-size:15px;"><span style="display:block;font-weight:bold;font-size:17px;">Booking Date</span> <?php echo $row->date_book;?></p>
               </td>
               <td style="width:50%;padding:20px; padding-right:0px;vertical-align:top">
                  <p style="margin:0 0 10px 0;padding:0;font-size:15px;text-align:left"><span style="display:block;font-weight:bold;font-size:17px;">Billing Address</span><?php echo $user_row->full_name;?><br><?php echo $user_row->location;?></p>
                  <p style="margin:0 0 10px 0;padding:0;font-size:15px;text-align:left"><span style="display:block;font-weight:bold;font-size:17px;">Invoice Number</span><?php echo $pay_row->id.$pay_row->user_id;?></p>
                  <p style="margin:0 0 10px 0;padding:0;font-size:15px;text-align:left"><span style="display:block;font-weight:bold;font-size:17px;">Invoice Date</span><?php echo $pay_row->created_at;?> </p>
               </td>
            </tr>
         </tbody>
      </table>
      <table style="max-width:800px;margin:0px auto 0px;background-color:#fff;padding:0px 30px 30px 30px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:0px; <?php echo $both;?>;">
         <tr>
            <td colspan="2" style="font-size:20px;padding:30px 15px 0 px;">Items</td>
         </tr>
         <tr>
            <th style="text-align: left; border: 1px solid black;padding:0px 0px 0px 0px; background-color:#e2e2e2;">S.No</th>
            <th style="text-align: left; border: 1px solid black; padding:0px 10px 0px 10px; background-color:#e2e2e2;">Service Provider</th>
            <th style="text-align: left; border: 1px solid black;padding:0px 0px 0px 10px; background-color:#e2e2e2;">Unit Price</th>
            <th style="text-align: left; border: 1px solid black;padding:0px 0px 0px 10px; background-color:#e2e2e2;">Initial Amt</th>
            <th style="text-align: left; border: 1px solid black;padding:0px 10px 0px 10px; background-color:#e2e2e2;">CGST Amt(9%)</th>
            <th style="text-align: left; border: 1px solid black;padding:0px 10px 0px 10px; background-color:#e2e2e2;">SGST Amt(9%)</th>
            <th style="text-align: left; border: 1px solid black;padding:0px 10px 0px 10px; background-color:#e2e2e2;">Total Pay</th>
         </tr>
         <tr>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;">1</td>
            <td style="border: 1px solid black; padding:0px 150px 0px 10px;"><?php echo $product_row->title;?></td>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;"><?php echo number_format($product_row->price,2);?></td>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;"><?php echo number_format(str_replace(",", "", $pay_row->amount)-$pay_row->cgst-$pay_row->sgst-$pay_row->igst,2);?></td>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;"><?php echo $pay_row->sgst;?></td>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;"><?php echo $pay_row->sgst;?></td>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;"><?php echo number_format(str_replace(",", "", $pay_row->amount),2);?></td>
         </tr>
         <th colspan="6" style="text-align: left; border: 1px solid black;border-collapse: collapse;">Total Amount</th>
         <td style="border: 1px solid black;border-collapse: collapse;padding:0px 10px 0px 10px;"><?php echo number_format($product_row->price,2);?></td>
         </tr>
         </tr>          
         <th colspan="6" style="text-align: left; border: 1px solid black;border-collapse: collapse;"><?php if($row->pay_status=='0'){echo "Advance Payment 20%";}else{echo "Full Payment";}?></th>
         <td style="border: 1px solid black;border-collapse: collapse;padding:0px 10px 0px 10px;text-align: right"> <?php echo '-'.number_format(str_replace(",", "", $pay_row->amount)-$pay_row->cgst-$pay_row->sgst-$pay_row->igst,2);?></td>
         </tr>    </tr>          
         <th colspan="6" style="text-align: left; border: 1px solid black;border-collapse: collapse;">Remaining Amt</th>
         <td style="border: 1px solid black;border-collapse: collapse;padding:0px 10px 0px 10px;text-align: right">
            <?php if($row->pay_status=='0'){echo number_format($product_row->price-str_replace(",", "", $pay_row->amount)-$pay_row->cgst-$pay_row->sgst-$pay_row->igst,2); }else{echo "0.00";}?>
         </td>
         </tr>
         <tr>
            <td colspan="8">
               <p style="font-size:17px;margin:0;padding:10px;border:solid 1px #000;font-weight:bold;">
                  <span style="display:block;font-size:17px;font-weight:bold;">Amount in Words</span><span id="words"></span>
                  <script> 
                    var both_value = "<?php echo floatval($pay_row->amount);?>";
                    document.getElementById('words').innerHTML = inWords(both_value);
                  </script>
               </p>
            </td>
         </tr>
      </table>
      <table style="max-width:800px;margin:0px auto 0px;background-color:#fff;padding:0px 30px 30px 30px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:0px; <?php echo $singal;?>;">
         <tr>
            <td colspan="2" style="font-size:20px;padding:30px 15px 0 px;">Items</td>
         </tr>
         <tr>
            <th colspan="2" style="text-align: left; border: 1px solid black;padding:0px 10px 0px 0px; background-color:#e2e2e2;">S.No</th>
            <th style="text-align: left; border: 1px solid black; padding:0px 200px 0px 10px; background-color:#e2e2e2;">Service Provider</th>
            <th style="text-align: left; border: 1px solid black;padding:0px 20px 0px 10px; background-color:#e2e2e2;">Unit Price</th>
            <th style="text-align: left; border: 1px solid black;padding:0px 20px 0px 10px; background-color:#e2e2e2;">Initial Amt</th>
            <th style="text-align: left; border: 1px solid black;padding:0px 20px 0px 10px; background-color:#e2e2e2;">IGST Amt(18%)</th>
            <th style="text-align: left; border: 1px solid black;padding:0px 10px 0px 10px; background-color:#e2e2e2;">Total Pay</th>
         </tr>
         <tr>
            <td colspan="2" style="border: 1px solid black;padding:0px 10px 0px 10px;">1</td>
            <td style="border: 1px solid black; padding:0px 100px 0px 10px;"><?php echo $product_row->title;?></td>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;"><?php echo number_format($product_row->price,2);?></td>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;"><?php echo number_format(str_replace(",", "", $pay_row->amount)-$pay_row->cgst-$pay_row->sgst-$pay_row->igst,2);?></td>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;"><?php echo $pay_row->igst;?></td>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;"><?php echo number_format(str_replace(",", "", $pay_row->amount),2);?></td>
         </tr>
         <th colspan="6" style="text-align: left; border: 1px solid black;border-collapse: collapse;">Total Amount</th>
         <td style="border: 1px solid black;border-collapse: collapse;padding:0px 10px 0px 10px;"><?php echo number_format($product_row->price,2);?></td>
         </tr></tr>          
         <th colspan="6" style="text-align: left; border: 1px solid black;border-collapse: collapse;"><?php if($row->pay_status=='0'){echo "Advance Payment 20%";}else{echo "Full Payment";}?></th>
         <td style="border: 1px solid black;border-collapse: collapse;padding:0px 10px 0px 10px;text-align: right"> <?php echo '-'.number_format(str_replace(",", "", $pay_row->amount)-$pay_row->cgst-$pay_row->sgst-$pay_row->igst,2);?></td>
         </tr>    </tr>          
         <th colspan="6" style="text-align: left; border: 1px solid black;border-collapse: collapse;">Remaining Amt</th>
         <td style="border: 1px solid black;border-collapse: collapse;padding:0px 10px 0px 10px;text-align: right"><?php if($row->pay_status=='0'){echo number_format($product_row->price-str_replace(",", "", $pay_row->amount)-$pay_row->cgst-$pay_row->sgst-$pay_row->igst,2); }else{echo "0.00";}?></td>
         </tr>
         <tr>
            <td colspan="7">
               <p style="font-size:17px;margin:0;padding:10px;border:solid 1px #000;font-weight:bold;">
                  <span style="display:block;font-size:17px;font-weight:bold;">Amount in Words</span><span id="words_singal"></span>
                  <script> 
                    var value = "<?php echo floatval($pay_row->amount);?>";
                    document.getElementById('words_singal').innerHTML = inWords(value);
                  </script>
               </p>
            </td>
			     
         </tr>
      </table>
      <table style="max-width:800px;margin:0px auto 10px;background-color:#fff;padding:0px 30px 30px 30px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px; ">
         <tr>
            <td colspan="2" style="font-size:20px;padding:30px 15px 0 px;">Payment Particulers</td>
         </tr>
         <tr>
            <th style="text-align: left; border: 1px solid black;padding:0px 10px 0px 10px; background-color:#e2e2e2;">S.No</th>
            <th style="text-align: left; border: 1px solid black;padding:0px 10px 0px 10px; background-color:#e2e2e2;">Mode</th>
            <th style="text-align: left; border: 1px solid black; padding:0px 100px 0px 10px; background-color:#e2e2e2;">Transaction Id</th>
            <th style="text-align: left; border: 1px solid black;padding:0px 15px 0px 15px; background-color:#e2e2e2;">Bank Name</th>
            <th style="text-align: left; border: 1px solid black;padding:0px 10px 0px 10px; background-color:#e2e2e2;">Amt Received</th>
         </tr>
         <tr>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;text-align:center;">1</td>
            <td style="border: 1px solid black; padding:0px 100px 0px 10px;">Net Banking</td>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;"><?php echo $pay_row->payment_id;?></td>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px; text-align:center;">ICICI</td>
            <td style="border: 1px solid black;padding:0px 10px 0px 10px;text-align:center;"><?php echo number_format(str_replace(",", "", $pay_row->amount),2);?></td>
         </tr>
         <tr>
            <td colspan="8">
               <p style="font-size:17px;margin:0;padding:10px;border:solid 1px #000;font-weight:bold; text-align:right"><span style="display:block;font-size:17px;font-weight:bold;">For E-Mobiles</span>Authorized Signature </p>
            </td>
         </tr>
         <tr>
            <td colspan="8">
               <p style="font-size:12px;margin:0;padding:10px;font-weight:400; text-align:left">Terms & Conditions Applied*</p>
            </td>
         </tr>
      </table>
   </body>
</html>