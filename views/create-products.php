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
  <form action="/index.php?action=create-product" method="post" enctype="multipart/form-data">
<div class="mb-3">
    <label for="name" class="form-label">Product Name:</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  
  <div class="mb-3">
    <label for="description" class="form-label">Product Description:</label>
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>
  
  <div class="mb-3">
    <label for="price" class="form-label">Price:</label>
    <div class="input-group">
      <span class="input-group-text">$</span>
      <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" required>
    </div>
  </div>
  
  <div class="mb-3">
    <label for="image" class="form-label">Product Image:</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>
  
  <input type="submit" class="btn btn-primary" value="Add Product">
</form>
  </div>

</body>
</html>