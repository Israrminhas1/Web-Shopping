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
<div class="container mt-5">
  <h2>Products Added to Cart</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    
    <?php 
    if($carts){
    foreach ($carts as $cart) { ?>
      <tr>
        <td><?php echo $cart['name'];?></td>
        <td>$<?php echo $cart['price'];?></td>
        <td>
          <div class="input-group">
          <a <?php if($cart['quantity']!='1'){?>href="?id=<?php  echo $cart['id']; ?>&action=decrease-quantity" <?php } ?> class="btn btn-outline-secondary <?php if($cart['quantity']=='1'){ echo 'disabled';} ?>">-</a>

            <input type="text" class="form-control " placeholder="" aria-label="" aria-describedby="basic-addon1" value="<?php echo $cart['quantity'];?>" id="qty">
            <a href="?id=<?php  echo $cart['id']; ?>&action=increase-quantity" class="btn btn-outline-secondary">+</a>
           
          </div>
        </td>
        <td>$<?php echo $cart['price']* $cart['quantity'];?></td>
        <td><a href="?id=<?php  echo $cart['id']; ?>&action=remove-from-cart" class="btn btn-danger">Remove</a>
</td>
      </tr>
      <?php } 
    }else { ?>
    <tr>
        <td colspan="5" class="text-center">Cart is Empty</td>
    </tr>
    <?php } ?>
    </tbody>
  </table>
  <div class="d-grid gap-2">
    <?php if($carts){   ?>
    <a href="/checkout" class="btn btn-primary">Checkout</a>
    <?php  } ?>
  </div>
</div>


</body>
</html>