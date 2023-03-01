<?php
session_start();
include 'config.php';
include 'function.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
  </head>
  <body>
    <form action="" method="post" enctype="multipart/form-data" class="login">
      <input id="position" type="hidden" name="position" value="<?php echo $_SESSION['position'] ?>">
      <input id="numBOT" type="hidden" name="numBOT" value="<?php echo $_SESSION['numBot'] ?>">
    <?php 
    if($_SESSION['numBot']==1){
      echo '<input type="submit" name="add" value="+Bot" class="btn" disabled> &nbsp;&nbsp;';
      echo '<input type="submit" name="decrease" value="-Bot" class="btn"> &nbsp;&nbsp;';
    }else{
      echo '<input type="submit" name="add" value="+Bot" class="btn"> &nbsp;&nbsp;';
      echo '<input type="submit" name="decrease" value="-Bot" class="btn" disabled> &nbsp;&nbsp;';
    }

    echo '<input type="submit" name="order" value="New Normal Order" class="btn"> &nbsp;&nbsp;';
    echo '<input type="submit" name="orderVIP" value="New VIP Order" class="btn">';

    if($_SESSION['numBot']==1){
      echo '<p>Get Bot: YES';
    }else{
      echo '<p>Get Bot: NO';
    }

    include 'managePage.php';

    ?>
    </form>

  <script src="https://write.corbpie.com/wp-content/litespeed/localres/aHR0cHM6Ly9jZG5qcy5jbG91ZGZsYXJlLmNvbS8=ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script type="text/javascript">
  var checkBOT=$('#numBOT').val();

  if(checkBOT=="1"){
    setInterval(function () {
        $.ajax({
          url: 'botWork.php',
          success: function (data) {
              location.reload(true);
          }
        });
    }, 10000);   
  }
  </script>
  </body>
</html>