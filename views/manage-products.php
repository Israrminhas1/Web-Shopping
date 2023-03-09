<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Manage Product</title>
</head>
<body>
<?php include_once '../includes/navbar.php';?>
  <div class="container">
  <table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $product) { ?>
      <tr>
        <td><?php echo $product->id(); ?></td>
        <td><?php echo $product->name(); ?></td>
        <td><?php echo $product->description(); ?></td>
        <td><?php echo '$' . $product->price(); ?></td>
        <td>
          <a href="?id=<?php echo $product->id(); ?>&action=edit-product">Edit</a>
          |
          <a href="?id=<?php echo $product->id(); ?>&action=delete-product">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
  </div>

</body>
</html>