
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>We Travel Solo</title>
    <!-- Bootstrap core CSS -->
    <style type="text/css">
      .wrapper{width:100%;margin:0 auto;margin-top:40px; max-width:960px;}
      .success{background:#FF9;padding:10px 0px 10px 0px;border: 2px solid #903;}
      .success h4{margin-left:15px;margin-right:15px;color:#903;}
      .tab{margin-top:30px;}
      table {
        margin: 0 auto;
        width:100%;
        border: 1px solid #ddd;
        border-collapse: collapse; 
        border-spacing: 0;

      }
      td { border: 1px solid #CCC;padding:8px; } 
    </style>
    <!-- Custom styles for this template -->


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="wrapper">
      <div class="success">
        <h4>Your payment has been cancelled/failed!!!</h4>
      </div>
      <div class="tab">
        <table>
          <?php
          if ($success == true) {
            ?>
            <tr>
              <td colspan="2">Order for Trip <b><?php echo $tripDetails['name']; ?></b> has been Cancelled...</td>
            </tr>
            <tr>
              <td>Ammount</td>
              <td><?php echo $tripDetails['price']; ?></td>
            </tr>
            <?php
          }
          ?>
          <tr>
            <td>Order ID</td>
            <td><?php echo $order_id; ?></td>
          </tr>
          <tr>
            <td>Status</td>
            <td><?php echo $message; ?></td>

          </tr>
        </table>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>