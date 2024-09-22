<?= $this->extend('layout') ?>
<?= $this->Section('content') ?>

<!-- Display validation errors if there are any -->

<?= \Config\Services::validation()->listErrors() ?>


<?= form_open_multipart('car/create',['enctype' => 'multipart/form-data']) ?>
<div style="display:flex; justify-content:center;">

<div class="boxe" style="margin-top: 150px; padding-bottom: 50px;">
<div class="form-group">
    <label for="Title">Title</label>
    <input type="text" class="form-control" id="title" name="title" required>
</div>
<div class="form-group">
    <label for="location">Location</label>
    <select class="form-control" id="location" name="location" required>
        <option value="">Choose a location</option>
        <option value="Jaen">Jaen</option>
        <option value="Sevilla">Sevilla</option>
        <option value="Granada">Granada</option>
    </select>
</div>



<div class="form-group">
    <label for="brand">Brand</label>
    <select class="form-control" id="brand" name="brand" required>
        <option value="">Choose a brand</option>
        <option value="Mercedes">Mercedes</option>
        <option value="BMW">BMW</option>
        <option value="Hundai">Hundai</option>
        <option value="Tesla">Tesla</option>
        <option value="Cupra">Cupra</option>
        <option value="Tramontana">Tramontana</option>
    </select>
</div>

<div class="form-group">
    <label for="kilo">Kilometers Driven</label>
    <input type="number" class="form-control" id="kilo" name="kilo" required>
</div>

<div class="form-group">
    <label for="transmission">Transmission</label>
    <select class="form-control" id="transmission" name="transmission" required>
        <option value="manual">Manual</option>
        <option value="automatic">Automatic</option>
    </select>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description" required></textarea>
</div>

<div class="form-group">
    <label for="price">Price per Hour</label>
    <input type="number" class="form-control" id="price" name="price" required>
</div>

<div class="form-group">
    <label for="seats">Number of Seats</label>
    <input type="number" class="form-control" id="seats" name="seats" required>
</div>
<div class="form-group">
  <label for="photos">Images</label>
  <input type="file" class="form-control" id="photos" name="photos[]" multiple required>
</div>



<div class="form-group">
<button type="submit" class="btn btn-danger">Create</button>
<?php echo form_close(); ?>
</div>
</div>
</div>
<?= $this->endSection('content') ?>


<?= $this->Section('style') ?>
<style>
    
    .boxe{
    
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

.form-group button:hover {
  background-color: #000000;
  color:#fefb64
}

</style>
<?= $this->endSection('style') ?>
