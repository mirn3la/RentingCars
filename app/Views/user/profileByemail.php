<?= $this->extend('layout') ?>

<?= $this->Section('content') ?>

	
    <span class="error"><?= \Config\Services::validation()->listErrors(); ?></span>
        <span class="error">
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif;?>
        </span>

        <?= form_open('/user/edit/' . esc($user['email'])) ?>
        <div class="boxe" style="padding: 10rem 20rem 5rem 2.5rem;">
        <div class="form-group">
        <h1  style="padding:20px 0;">Update Your Profile</h1>
        <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= esc($user['firstname']) ?>">
        </div>

        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= esc($user['lastname']) ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= esc($user['email']) ?>">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" value="<?= esc($user['country']) ?>">
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" value="<?= esc($user['city']) ?>">
        </div>

        <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" value="<?= esc($user['state']) ?>">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= esc($user['address']) ?>">
        </div>

        <div class="form-group">
            <label for="zipcode">Zip Code</label>
            <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?= esc($user['zipcode']) ?>">
        </div>

        <div class="form-group">
            <label for="phonenumber">Phone Number</label>
            <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?= esc($user['phonenumber']) ?>">
        </div>
        <div class="form-group">
      <label for="role">Role</label>
      <select class="form-control" id="role" name="role">
          <option value="a" <?= $user['role'] == 'a' ? 'selected' : '' ?>>a</option>
          <option value="v" <?= $user['role'] == 'v' ? 'selected' : '' ?>>v</option>
      </select>
  </div>
		<button type="submit" class="btn btn-danger" style="color:black;margin: 5% 0% 5% 50%; background-color: #fefb64; padding: 10px 100px; position:display-fixed" onclick="return confirm('Are you sure you want to update this user?')">Update</button>
      <?= form_close() ?>
        <?= form_open('user/delete/'.esc($user['email'])) ?>
            <button type="submit" class="btn btn-danger" style="color:black;margin: -0% 60% 20% 50% ; background-color: #fefb64; padding: 10px 105px; position:display-fixed" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
        <?= form_close() ?>

            </div>
    <?= $this->endSection('content') ?>

    <?= $this->Section('style') ?>
   <style>
  .form-group {
  margin-bottom: 20px;
  padding: 10px 150px 10px 150px;
  margin:10px 10px 10px 600px;
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
  width: 50%;
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
  width: 50%;
}

.form-group button:hover {
  background-color: #000000;
  color:#fefb64
}



@media (max-width: 768px) {
  .form-group {
    padding: 0.5rem;
  }

  .form-group label {
    font-size: 1rem;
  }
}

ul{
    list-style-type: none;
  }

  ul li:before {
    content: none;
  }

.alert{
  width: 50%;
  margin: 0 auto;
}
div.form {
  display: block;
  align-items: center;
}







</style>
<?= $this->endSection('style') ?>

