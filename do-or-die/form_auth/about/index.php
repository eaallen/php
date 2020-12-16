<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="style.css">
</head>

<body class="text-light">
  <div>
    <ul class="nav-list">
      <li><a href="../">Logout</a></li>
      <li><a href="https://www.linkedin.com/in/elijah-andrew-allen/">LinkedIn</a></li>
      <li><a href="https://github.com/eaallen/">GitHub</a></li>
      <li><a href="./index.html" class="active">About</a></li>
    </ul>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="bg-primary col-md-12 top p-0">
        <div class="shade">
          <div class="gradient">
            <div class="row text-center no-gutters">
              <div class="col-md-4">
                <div> THIS</div>
              </div>
              <div class="col-md-4">IS</div>
              <div class="col-md-4">SPARTA</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="body text-dark col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="head">
            <h1>
              <?php echo($_SESSION['username']); ?>
            </h1>
            <h3>
              <?php echo($_SESSION['notes']); ?>
            </h3>
          </div>
        </div>
      </div>
      <div class="">
        <table class="table-user">
          <?php
          foreach ($_SESSION as $key => $value) {
          ?>
            <tr>
              <td class="table-key"><?php echo "$key:" ?></td>
              <td class="table-value"><?php echo "$value" ?></td>
            </tr>
          <?php
          }
          ?>
        </table>
      </div>
    </div>
  </div>

</body>

</html>