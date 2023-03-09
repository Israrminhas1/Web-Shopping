<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Create Product</title>
</head>
<body>
<?php include_once '../includes/navbar.php';?>
<div class="container">
<?php  if (isset($_GET['message'])) {
    // Display the message
    echo '<div class="alert alert-success">' . htmlspecialchars($_GET['message']) . '</div>';
}
?>
  <h1 class="text-center my-4">Product Catalog</h1>
  <div class="row row-cols-1 row-cols-md-3 g-4">
  <?php foreach ($products as $product) { ?>
    <div class="col">
      <div class="card h-100">
        <img src="<?php echo $product->image(); ?>" class="card-img-top" height="350" alt="Product Image">
        <div class="card-body">
          <h5 class="card-title"><?php echo $product->name(); ?></h5>
          <p class="card-text"><?php echo $product->description(); ?></p>
          <p class="card-text"><strong>Price: <?php echo '$' . $product->price(); ?></strong></p>
          <a href="?id=<?php echo $product->id(); ?>&action=add-to-cart" class="btn btn-primary">Add to Cart</a>
        </div>
      </div>
    </div>
    <?php } ?>
    
  </div>
</div>

</body>
</html>