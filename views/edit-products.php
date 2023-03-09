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
    echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['message']) . '</div>';
}
?>
  <div class="container mt-3">
  <h1>Edit Product</h1>
  <form action="/index.php?action=update-product" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $product->id() ?>">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $product->name() ?>">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" id="description" name="description" rows="3"><?php echo $product->description() ?></textarea>
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" class="form-control" id="price" name="price" value="<?php echo $product->price() ?>">
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
</div>
  </div>

</body>
</html>
