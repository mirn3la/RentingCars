<?= $this->extend('layout') ?>

<?= $this->Section('content') ?>


  
  
  <div class="banner">

  </div>
  

  
  <div class="bodyimgbox">
  <div class="box">
    <div class="booking-form">
    <?= form_open('car/rent', ['method' => 'get']) ?>
    <div class="mirnela2">
        <label for="pickup-location">Pickup Location:</label>
        <select id="pickup-location" name="pickup-location" required>
            <option value="Jaen">Jaen</option>
            <option value="Sevilla">Sevilla</option>
            <option value="Granada">Granada</option>
        </select>
    </div>
    <div class="mirnela2">
        <label for="dropoff-location">Dropoff Location:</label>
        <select id="dropoff-location" name="dropoff-location" required>
            <option value="Jaen">Jaen</option>
            <option value="Sevilla">Sevilla</option>
            <option value="Granada">Granada</option>
        </select>
    </div>
    <div class="mirnela2">
        <label for="pickup-date">Pickup Date:</label>
        <input type="date" id="pickup-date" name="pickup-date" required>
    </div>
    <div class="mirnela2">
        <label for="dropoff-date">Dropoff Date:</label>
        <input type="date" id="dropoff-date" name="dropoff-date" required>
    </div>
    <div class="mirnela2">
        <label for="car-type">Car Type:</label>
        <select id="car-type" name="car-type">
            <option value="Mercedes">Mercedes</option>
            <option value="BMW">BMW</option>
            <option value="Hundai">Hundai</option>
            <option value="Tesla">Tesla</option>
            <option value="Cupra">Cupra</option>
            <option value="Tramontana">Tramontana</option>
        </select>
    </div>
    <div class="mirnela2">
        <button type="submit">Book Now</button>
    </div>
    <?= form_close() ?>


    </div>
  </div>
</div>

    </div>   
    </div>
    <hr/>
    <div  class="Cars">

        <div class="content">
          
          <div id="Cars"><h2>Cars</h2></div>
    
          <div class="row">
            

          
            <?php foreach ($cars as $car) : ?>
      <div class="column">
        <div class="card">
          <h3><img src="<?= json_decode($car['photos'])[0] ?>" alt="<?= htmlspecialchars($car['title']) ?>" height="100" width="120"></h3>
          <p><b><?= htmlspecialchars($car['title']) ?></b></p>
          <p>Up to <?= htmlspecialchars($car['seats']) ?> passengers</p>
          <p><?= htmlspecialchars($car['price']) ?>€/h</p>
          <a href="/car/detail/<?= $car['id'] ?>">
            <button style="color:black;margin: 30px; background-color: #fefb64; padding: 10px;">See Offer</button>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
    
            
      </div>
      


    <footer class="footer">
      <h2 id="Contact">Contact </h2>
      <address class="contacttext">
       <b> Email:</b>  <u><i>rentan@gmail.com</i></u><br>
       <b>Number:</b> +38761123987 <br>
       <b>Location:</b> Jaen<br>
        <h3>Find us on: </h3> 
        <i class="fab fa-instagram"></i>
        <i class="fab fa-facebook"></i>
      

      </address>
    </footer>

    <script src="script.js"></script>
    
<?= $this->endSection('content') ?>

<?= $this->Section('style') ?>

<style>
    


.booking-form {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #000000;
  padding: 20px;
  border-radius: 10px;
  color:#ffffff;
  
}

.form-group {
  margin-bottom: 20px;
  padding: 10px 150px 10px 150px;
}



.form-group label {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;
}

.form-group input,
.form-group select {
  display: block;
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  margin-top: 5px;
}

.form-group button {
  background-color: #007bff;
  color: #fff;
  font-size: 16px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
  width: 100%;
}

.form-group button:hover {
  background-color: #0062cc;
}




<?php
// mirnela2
?> 

.mirnela2 {
  margin-bottom: 20px;
  padding: 10px 150px 10px 150px;
  margin:10px 10px 10px 600px;
}



.mirnela2 label {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;
}

.mirnela2 input,
.mirnela2 select {
  display: block;
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  margin-top: 5px;
}

.mirnela2 button {
  background-color: #fefb64;
  color: #000000;
  font-size: 16px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
  width: 100%;
}

.mirnela2 button:hover {
  background-color: #000000;
  color:#fefb64
}
p {
  margin-top: 0;
  margin-bottom: 0;
}
    </style>
    <?= $this->endSection() ?>
