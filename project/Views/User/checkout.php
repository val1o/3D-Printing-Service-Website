<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link rel="stylesheet" href="../../Styles/checkout.css" />

</head>


<body>
    <div class="BillingInfo">
        <h2>1. Billing Info</h2>
        <form method="" action="">
            <label for="firstName"> First Name</label>
            <input type="text" namespace="firstName"><br>

            <label for="address">Address</label>
            <input type="text" name="address"><br>

            <label for="postalCode">Postal Code</label>
            <input type="text" name="postalCode"><br>

            <label for="telephoneNumber">Telephone Number</label>
            <input type="text" name="telephoneNumber"><br>
            
            <input type="submit" value="Change Info">
        </form>
    </div>  
    
    <div class="PaymentMethod">
        <h2>2. Payment Method</h2>
        <form method="" action=""></form>

        <label for="cardNumber">Card Number</label>
        <input type="text" name="cardNumber"><br>

        <label for="expirationDate">Expiration Date</label>
        <input type="text" name="expirationDate"><br>

        <label for="cvc">Cvc</label>
        <input type="text" name="cvc"><br>

        <div class="savePaymentInfo">
        <label for="saveCardInfo">Save card info</label>
        <input type="checkbox" name="saveCardInfo"><br>
        </div>
        
    </div>

    <div class="OrderSummary">
        <h2>Order Summary</h2>
        
        <form method="" action="">

        <label for="modelTitle">Title</label>
        <input type="text" name="modelTitle"><br>

        <label for="price">Price</label>
        <input type="text" name="price"><br>

        <label for="subTotal">Subtotal</label>
        <input type="text" name="subtotal"><br>

        <label for="total">Total</label>
        <input type="text" name="total"><br>

        <input type="submit" value="Place Order">





        </form>



    </div>



</body>


</html>