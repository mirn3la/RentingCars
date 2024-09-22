<?= $this->extend('layout') ?>

<?= $this->Section('content') ?>


      <div class="boxe" >
      <?= form_open('register') ?>

  <div class="register">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" id="firstname">
        </div>

       <div class="register">
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" id="lastname" >
        </div>

       <div class="register">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
       <div class="register">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
       <div class="register">
            <label for="password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password">
        </div>

       <div class="register">
            <label for="country">Country:</label>
            <input type="text" name="country" id="country" value="<?= old('country') ?>">
        </div>

       <div class="register">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" value="<?= old('city') ?>">
        </div>

       <div class="register">
            <label for="state">State:</label>
            <input type="text" name="state" id="state" value="<?= old('state') ?>">
        </div>

       <div class="register">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="<?= old('address') ?>">
        </div>

       <div class="register">
            <label for="zipcode">Zip Code:</label>
            <input type="text" pattern="\d*" name="zipcode" id="zipcode" value="<?= old('zipcode') ?>" maxlength="8">
        </div>

       <div class="register">
            <label for="phonenumber">Phone Number:</label>
            <input type="text" pattern="\d*" name="phonenumber" id="phonenumber" value="<?= old('phonenumber') ?>" maxlength="9">
        </div>

       <div class="register">
            <button type="submit">Register</button>
        </div>
        
        <span class="error"><?= \Config\Services::validation()->listErrors(); ?></span>
        <span class="error">
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif;?>
        </span>

  <div class="register">
    <p style="color:rgb(0, 0, 0)"><b>Already have an accouunt?</b></p> 
    <p id="signin" style="color:blue;" >
    <a href="<?php echo('/login')?>">
    <b>
      <u>Log in</u>
    </b>
    </a>
  </p>
  </div>
</div>

<?= form_close() ?>
</div>

  
<?= $this->endSection('content') ?>
<?= $this->Section('style') ?>


<style>
   
  .register {
  margin-bottom: 20px;

}

.register label {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;
}

.register input,
.register select {
  display: block;
  width: 50%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  margin-top: 5px;
}

.register button {
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

.register button:hover {
  background-color: #000000;
  color:#fefb64
}
.boxe {
  width: 50%;
  margin: auto;
  padding-top: 150px;
}
</style>
<?= $this->endSection('style') ?>

