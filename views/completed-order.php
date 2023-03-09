<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <title>Create Product</title>
</head>
<body>
<?php include_once '../includes/navbar.php';?>
<div class="container mt-4">
  <h2>Completed Orders</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Date</th>
        <th scope="col">Total Amount</th>
        <th scope="col">Products</th>
      </tr>
    </thead>
    <tbody>
        <?php
        if(isset($data)){
        foreach($data as $d) {   ?>
      <tr>
        <td><?php echo $d['id'];  ?></td>
        <td><?php echo $d['date'];  ?></td>
        <td><?php echo $d['total'];  ?></td>
        <td>
          <ul>
          <?php foreach($d['products'] as $p) {   ?>
            <li>Name: <?php echo $p['name'];  ?> Quantity:(<?php echo $p['quantity'];  ?>)</li>
            <?php }  ?>
          </ul>
        </td>
      </tr>
      <?php }  }?>
    </tbody>
  </table>
</div>
</body>
</html>