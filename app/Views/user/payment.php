<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon-32x32.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
<body>
</head>
<body>
  <div class="navbar" style="color: #000000; background-color: #fefb64; padding: 0px 0px;" >
    <div class="content">
      <div class="logo">
        <a href="#"><img src="rentan.png" alt="" height="100px" width="100px" ></a></div>
        <ul class="menu-list">
          <div class="icon cancel-btn">
            <i class="fas fa-ti7mes"></i>
          </div>
          <li><a href="/home">Home</a></li>
          <li><a href="/login">Login</a></li>
          <li><a href="/car">Car<a><li>
          
  
        </ul>
        <div class="icon menu-btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>
</div>

  
<div class="payment" style="padding-top:10%; padding-left:10rem">
<form>
      <label for="location">Location: Jaen</label>
      
      <label for="rental-start">Rental Start:</label>
      <input type="date" id="rental-start" name="rental-start"><br><br>
      
      <label for="rental-end">Rental End:</label>
      <input type="date" id="rental-end" name="rental-end"><br><br>
</form>
</div>



   <div class="car-details" style="border-width: 5px; border-color: #fff7c2; border-style: solid; padding: 10px; max-width: 350px; margin: 0; margin-left: 10%; ">
      <img src="mini1.jpg" alt="Car Image" style="max-width: 100%; display: block; margin-bottom: 20px; margin-top: 20px;">
      <h3 style="text-align: center; font-size: 18px;">Car Model: Mini Cooper</h3>
      <ul style="list-style: none; padding: 0; text-align: left;">
         <li style="font-size: 14px;">Number of seats: 5</li>
         <li style="font-size: 14px;">Fuel type: Gasoline</li>
         <li style="font-size: 14px;">Transmission: Automatic</li>
         <li style="font-size: 14px;">Features: Air conditioning, Bluetooth, GPS</li>
         <li style="font-size: 14px;">Insurance: Included</li>
      </ul>
   </div>
</div>

<div class="glavni" style="margin: top 50%;">
   <div class="car-details" style="border-width: 5px; border-color: #fff7c2; border-style: solid; padding: 10px; max-width: 350px; margin: 0; margin-left: 32%; margin-top:-15%; padding: 50px;">
      <h3 style="text-align: center; font-size: 18px;">Detailed view of the price:</h3>
      <ul style="list-style: none; padding: 0; text-align: left;">
         <li style="font-size: 14px;">Car rental fee: 144,33EUR</li>
         <li style="font-size: 14px;">Insurance: 42,33EUR</li>
         <hr>
         <li style="font-size: 18px;">Price for 3 days: 186,33EUR</li>
       
      </ul>
   </div>
</div>
</div>





<div class="novi">
  <div class="payment" style="padding: 10rem 20rem 5rem 10rem;">
  <h1>Payment</h1>
    <form action="submit-form.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required><br><br>

      <label for="address">Address:</label>
      <input type="text" id="address" name="address" required><br><br>
      
      <label for="email">Email:</label>
      <input type="email" id="email1" name="email1" required><br><br>
      
      <label for="phone">Phone:</label>
      <input type="tel" id="phone" name="phone" required><br><br>
      
      
      <label for="name">Name on Card:</label>
      <input type="text" id="name" name="name" required><br><br>
      
      <label for="card-number">Card Number:</label>
      <input type="text" id="card-number" name="card-number" required><br><br>
      
      <label for="expiry-date">Expiry Date:</label>
      <input type="month" id="expiry-date" name="expiry-date" required><br><br>
      
      <label for="cvv">CVV:</label>
      <input type="password" id="cvv" name="cvv" required><br><br>
      
      <button type="submit">Pay Now</button>
    </form>
</div>
</div>



    <style>
.payment {
  display: flex;
  flex-direction: column;
  margin-bottom: 2rem;
  padding: 1rem;
  position: relative;
  
  
  
  
  
}


.payment label {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;

  
}

.payment input,
.payment select {
  display: block;
  width: 50%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  margin-top: 5px;

  
}

.payment button {
  background-color: #fefb64;
  color: #000000;
  font-size: 16px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
  width: 50%;
  
}

.payment button:hover {
  background-color: #000000;
  color:#fefb64
 
}

.payment p {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;
 
  

}
.payment u {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;
  

}



@media (max-width: 768px) {
  .payment {
    padding: 0.5rem;
  }

  .payment label {
    font-size: 1rem;
  }
}



</style>