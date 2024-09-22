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


  <?php if (!empty($users) && is_array($users)) { ?>
    <table class="table">
        <thead>
            <tr>
                <th>firstname</th>
                <th>lastname</th>
                <th>email</th>
                <th>country</th>
                <th>address</th>
                <th>zipcode</th>
                <th>phonenumber</th>
                <th>role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row->firstname); ?></td>
                    <td><?php echo htmlspecialchars($row->lastname); ?></td>
                    <td><?php echo htmlspecialchars($row->email); ?></td>
                    <td><?php echo htmlspecialchars($row->country); ?></td>
                    <td><?php echo htmlspecialchars($row->address); ?></td>
                    <td><?php echo htmlspecialchars($row->zipcode); ?></td>
                    <td><?php echo htmlspecialchars($row->phonenumber); ?></td>
                    <td><?php echo htmlspecialchars($row->role); ?></td>
                    <td>
                        <a href="/user/edit/<?php echo $row->email; ?>" class="btn btn-primary">Edit</a>
                        <a href="/user/delete/<?php echo $row->email; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this car?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <p>No User found.</p>
<?php } ?>
<?= $this->endSection('content') ?>
