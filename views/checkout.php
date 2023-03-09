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
<div class="container">
    <h1 class="my-4">Checkout</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $total=0;
    foreach ($carts as $cart) { ?>
        <tr>
        <td><?php echo $cart['name'];?></td>
        <td>$<?php echo $cart['price'];?></td>
        <td><?php echo $cart['quantity'];?></td>
        <td>$<?php echo $cart['price']* $cart['quantity'];?></td>

        </tr>
     <?php
    $total+=$cart['price']* $cart['quantity'];
    } ?>
        </tbody>
    </table>
    <div class="row">
    
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    
                    <h4 class="card-text">Total: $<?php echo $total; ?></h4>
                    <a href="?action=complete&total=<?php echo $total; ?>" class="btn btn-primary">Complete Order</a>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>