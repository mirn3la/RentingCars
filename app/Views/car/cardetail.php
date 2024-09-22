<?= $this->extend('layout') ?>

<?= $this->Section('style') ?>

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
<?= $this->endSection() ?>


<?= $this->Section('content') ?>


<div class="boxe" style="padding: 100px 30px 30px 100px; margin:0px;">
  <from>

  </div>
        <?php if(session()->getFlashdata('msg')):?>
              <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
          <?php endif;?>
          <?php if(session()->getFlashdata('success')):?>
              <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
          <?php endif;?>
  
  <div class="container" style="border: #000000; padding: 50px 0px 0px 0px;">
    <div class="car-details" style="border-width: 10px; border-color: #000000;">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php $photos = json_decode($car['photos']);
           foreach ($photos as $index => $photo) { ?>
            <div class="carousel-item <?= ($index == 0) ? 'active' : '' ?>"">
              <img src="<?= $photo ?>" alt="Car Image" class="d-block w-100" style="position: relative; padding-left: 200px;">
            </div>
            <?php } ?>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    
        <h3>Car Title: <?= htmlspecialchars($car['title']) ?></h3>
        <ul>
            <p>Number of seats: <?= htmlspecialchars($car['seats']) ?></p>
            <p>Fuel type: Gasoline</p>
            <p>Transmission: <?= ucfirst($car['transmission']) ?></p>
            <p>Features: Air conditioning, Bluetooth, GPS</p>
            <p>Insurance: Included</p>
            <p>Description: <?= htmlspecialchars($car['description']) ?></p>
        </ul>
        <div class="price-info">
            <p>Price per day: $<?= htmlspecialchars($car['price']) ?></p>
            <p>Price per week: $<?= $car['price'] * 7 ?></p>
        </div>
        <div class="rental-info">
            <form action="/rent/car/<?= $car['id'] ?>" method="post">
                <label for="pickup-date">Pickup Date:</label>
                <input type="date" id="pickup-date" name="pickup_date" required>
                <label for="return-date">Return Date:</label>
                <input type="date" id="return-date" name="dropoff_date" required>
                <?= form_open('car/submit') ?>

                <button type="submit" class="btn btn-primary mt-2" formaction="/car/rent/<?= $car['id'] ?>">Rent This Car</button>
                <?php if (isset(session('user')->role) && session('user')->role=='a') : ?>
                    <button type="submit" class="btn btn-danger mt-2" formaction="/car/delete/<?= $car['id'] ?>" onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
                <?php endif; ?>
                <?= form_close() ?>
            </form>
        </div>
    </div>
</div>


  </form>
</div>
<?= $this->endSection() ?>

<?= $this->Section('js_url') ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?= $this->endSection('js_url') ?>
