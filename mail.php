<?php
require_once('conn.inc.php');
$order_id = mysqli_real_escape_string($conn, $_GET['id']);
$_SESSION['USER_ID']  = $uid;

$sql = "select DISTINCT(order_details.id), order_details.* , orders.* , end_users.*, product.product_name, product.product_img from order_details, product, orders, end_users where orders.id = '$order_id' and orders.user_id = '$uid' and order_details.product_id = product.product_id and orders.id = order_details.order_id and orders.user_id = end_users.user_id";
$res = mysqli_query($conn, $sql)
or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
while($row= mysqli_fetch_array($res)){
    $address =$row['address'];
    $payment_type =  $row['payment_type'];
    $payment_status =  $row['payment_status'];
    $payment_status =  $row['payment_status'];
    $order_status =  $row['order_status'];
     $product_name =  $row['product_name'];
     $product_img = $row['product_img'];
     $qty = $row['qty'];
     $user_email = $row['email'];
     $total_price = $row['total_price'];
     $timeTocall = $row['timeTocall'];
     $createdAt = date("yy-m-d");
}
$to       = $user_email;
 $subject  = 'Your Order Invoice';
$message  = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sending booking invoice</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        .invoice-box table h1{
            font-size: 17px;
            width: 60%;
            margin-top: 0;
            height: 37px;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .house_Details {
            border: 1px solid rgba(0, 0, 0, .15);
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<table cellpadding="0" cellspacing="0">
<tr class="top">
    <td colspan="2">
        <table>
            <tr>
                <td class="title">
                  <h1>Grocery</h1>
                  <h1></h1>
                </td>

                <td>
                    Invoice #:  '.$id .'<br>
                    Created:   '.$createdAt .' <br>
                  
                </td>
            </tr>
        </table>
    </td>
</tr>

<tr class="information">
    <td colspan="2">
<div class="small-container cart-page">
<table>
<tr>
<th>
   Product name
</th>
<th>  Product image</th>
<th>  Product qty</th>
<th>  Product price</th>
<!-- <th>  Product total price</th> -->
</tr>
<tr>
<td>
'.$product_img.'
</td>
<td>
'.$qty.'
</td>
<td>
'.$price.'
</td>
</tr>
</table>
</td>
 </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Owner: John and Barbara <br>
                                Barlings Beach, New South Wales<br>
                                +612 435 123 456<br>
                                johnandbarbara@bbhe.com.au
                            </td>

                            <td>
                                User:
                                ' .$user_fullname.'<br>
                                ' . $user_mobile.'<br>'
                                .$user_email.
                               
                            '</td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Details
                </td>

                <td>
                    &nbsp;
                </td>
            </tr>
            <tr class="item">
                <td>
                    House Name:
                </td>

                <td>'
                  .$house_name. 
                '</td>
            </tr>
          

            <tr class="item">
                <td>
                    Check-In Date:
                </td>

                <td>
                   '.$checkin.'
                </td>
            </tr>

            <tr class="item">
                <td>
                    Check-Out Date:
                </td>

                <td>
                '.$checkout.'
                </td>
            </tr>
            <tr class="item">
                <td>
                    Rent per night:
                </td>

                <td>
                    $'.$rack_rate .'
                </td>
            </tr>
            <tr class="item">
                <td>
                    Total nights to stay
                </td>

                <td>
                '.$nights .'
                </td>
            </tr>
            <tr class="item">
                <td>
                    Total rent
                </td>

                <td>
                    $'.$total.'
                </td>
            </tr>
            <tr class="item">
                <td>
                    Booking status
                </td>

                <td>
                '.$booking_status .'
                </td>
            </tr>
            <tr class="item">
                <td>
                    Payment status
                </td>

                <td>
                '.$payment_status .'
                </td>
            </tr>
            <tr class="item">
            <td>
               Convenient time to call:
            </td>

            <td>
            '.$timeTocall.'
            </td>
        </tr>
            <tr class="item">
                <td>
                    Amount to pay on call (15% of total)
                </td>

                <td>
                  $'.$toPayOnCall .'
                </td>
            </tr>
            <tr class="item">
                <td>
                    Remaining about to pay on due date
                </td>

                <td>
                    $'.$remainAmount .'
                </td>
            </tr>
            <tr class="item">
            <td>
                Comment:
            </td>

            <td>
                We will call you at '.$timeTocall.' to process the payment
            </td>
        </tr>
        </table>
    </div>
</body>

</html>';
echo $message;
// $headers  = 'From: alizafaisal.mq1199@gmail.com' . "\r\n" .
//             'MIME-Version: 1.0' . "\r\n" .
//             'Content-type: text/html; charset=utf-8';
// if(mail($to, $subject, $message, $headers)){
//     echo 'email sent';
//  ?>
//     <script>
//         window.location.href = 'thankyou.html';
//     </script>
//  <?php
// }else{
//     echo "Email sending failed";
// }
?>

