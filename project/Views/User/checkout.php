<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link rel="stylesheet" href="../../Styles/checkout.css" />

</head>


<body>
<?php
    echo "<PRE>";
    var_dump($data);
    echo "</PRE>";
?>
    <div class="BillingInfo">
        <h2>1. Billing Info</h2>

        <form method="" action="">

            <label for="firstName"> First Name</label>
            <input type="text" namespace="firstName" value="User1"><br>

            <label for="address">Address</label>
            <input type="text" name="address" value="Fictional Address"><br>

            <label for="postalCode">Postal Code</label>
            <input type="text" name="postalCode" value="Fictional Postal Code"><br>

            <label for="telephoneNumber">Telephone Number</label>
            <input type="text" name="telephoneNumber" value="Fictional Telephone Number"><br>
            
            <input type="submit" value="Change Info">
        </form>
    </div>  
    
    <div class="PaymentMethod">
        <h2>2. Payment Method</h2>
        <form method="" action=""></form>

        <label for="cardNumber">Card Number</label>
        <input type="text" name="cardNumber" value="Fictional Card Number"><br>

        <label for="expirationDate">Expiration Date</label>
        <input type="text" name="expirationDate" value="Fictional Expiration Date"><br>

        <label for="cvc">Cvc</label>
        <input type="text" name="cvc" value="Fictional CVC"><br>

        <div class="savePaymentInfo">
        <label for="saveCardInfo">Save card info</label>
        <input type="checkbox" name="saveCardInfo"><br>
        </div>
        
    </div>

    <div class="OrderSummary">
        <h2>Order Summary</h2>
        
        <form method="" action="">

        <img src="<?= $template['file'] ?>" alt="Order Image">

        <label for="modelTitle">Title</label>
        <input type="text" name="modelTitle" value="<?= $template['title'] ?>"><br>

        <label for="price">Price</label>
        <input type="text" name="price" value="10.00"><br>

        <label for="subTotal">Subtotal</label>
        <input type="text" name="subtotal" value="4.50"><br>

        <label for="total">Total</label>
        <input type="text" name="total" value="14.50"><br>

        </form>

        <form action="index.php?c=Template&a=addToOrders" method="post">

        <input type="submit" value="Place Order">


        </form>

    </div>



</body>


</html>