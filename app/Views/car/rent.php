<?= $this->extend('layout') ?>

<?= $this->Section('content') ?>
<?php if (!empty($availableCars)) { ?>
    <div  class="Cars">

        <div class="content">
          
          <div id="Cars"><h2>Cars</h2></div>
    
          <div class="row">
            
          
            <?php foreach ($availableCars  as $car) : ?>
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
    <?php } else { ?>
    <p>No cars found.</p>
<?php } ?>
<?= $this->endSection('content') ?>

