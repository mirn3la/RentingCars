<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon-32x32.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
<style>
  .car-details {
    margin: auto;
    width: 50%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .price-info {
    margin-top: 20px;
  }

  .rental-info {
    margin-top: 20px;
  }
</style>

<body>
</head>
<body>
  <div class="navbar" style="color: #000000; background-color: #fefb64; padding: 0px 0px">
    <div class="content">
      <div class="logo">
        <a href="#"><img src="rentan.png" alt="" height="100px" width="100px" ></a></div>
        <ul class="menu-list">
          <div class="icon cancel-btn">
            <i class="fas fa-times"></i>
          </div>
          <li><a href="/home">Home</a></li>
          <li><a href="/login">Login</a></li>
          
  
        </ul>
        <div class="icon menu-btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>

  </div>


<div class="boxe" style="padding: 100px 30px 30px 100px; margin:0px;">
  <from>

  </div>

  
  <div class="container" style="border: #000000; padding: 50px 0px 0px 0px;">
		<div class="car-details" style="border-width: 10px; border-color: #000000;" >
			<img src="mini1.jpg" alt="Car Image" style="position: relative; padding-left: 200px;">
			<h3>Car Model: Mini Cooper</h3>
			<ul>
				<p>Number of seats: 5</p>
				<p>Fuel type: Gasopne</p>
				<p>Transmission: Automatic</p>
				<p>Features: Air conditioning, Bluetooth, GPS</p>
				<p>Insurance: Included</p>
			</ul>
			<div class="price-info">
				<p>Price per day: $50</p>
				<p>Price per week: $300</p>
			</div>
			<div class="rental-info">
				<label for="pickup-date">Pickup Date:</label>
				<input type="date" id="pickup-date">
				<label for="return-date">Return Date:</label>
					<input type="date" id="return-date">
          <a href="/payment">
              <button onclick="window.location.href='/payment'" style="color:black;margin: 30px; background-color: #fefb64; padding: 10px; ">Rent a car</button>
            </a>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</form>
</div>



  
</body>
</html>