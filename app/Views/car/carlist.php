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
  .btn-primary {
        background: #000000;
    }

    .btn-danger {
        background: #fefb64;
        color: #000000;
        border-color: black;
        

    }
    
</style>
<?= $this->endSection('style') ?>

<?= $this->Section('content') ?>


  <?php if (!empty($cars) && is_array($cars)) { ?>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Location</th>
                <th>Brand</th>
                <th>Kilo</th>
                <th>Transmission</th>
                <th>Description</th>
                <th>Price</th>
                <th>Seats</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($car['title']); ?></td>
                    <td><?php echo htmlspecialchars($car['location']); ?></td>
                    <td><?php echo htmlspecialchars($car['brand']); ?></td>
                    <td><?php echo htmlspecialchars($car['kilo']); ?></td>
                    <td><?php echo htmlspecialchars($car['transmission']); ?></td>
                    <td><?php echo htmlspecialchars($car['description']); ?></td>
                    <td><?php echo htmlspecialchars($car['price']); ?></td>
                    <td><?php echo htmlspecialchars($car['seats']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $car['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="/car/delete/<?php echo $car['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this car?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <p>No cars found.</p>
<?php } ?>
<?= $this->endSection('content') ?>
