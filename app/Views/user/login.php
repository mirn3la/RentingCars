<?= $this->extend('layout') ?>

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
    
</head>
<body>

<?= $this->Section('content') ?>

<div class="boxe" style="padding-top:10rem;">
<?= form_open('login') ?>
<?= csrf_field() ?>
<div class="form">
  <div class="login">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="Email">
  </div>
  </div>

  <div class="login">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" value="123456789">
  </div>
  <div class="mt-5 validation-errors text-center">
    <?php
        $errors = \Config\Services::validation()->getErrors();

        if (!empty($errors)) {
            echo "<div class='alert alert-danger' >";
            echo "<ul>";

            foreach ($errors as $error) {
                echo "<li>" . $error . "</li>";
            }

            echo "</ul>";
            echo "</div>";
        }
    ?>
      <span class="error">
    <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
    <?php endif;?>
</span>
</div>



<div class="login">
    <p style="color:blue"><b><u class="forget">Forgot your password?<u></b></p> 
  </div>
 
  <div class="login">
  <a href="/carlist">
  <button onclick="window.location.href='/carlist'" style="color:black;margin: 30px; background-color: #fefb64; padding: 10px; ">Submit</button>
  </a>
 </div>

  <div class="login">
    <p style="color:rgb(0, 0, 0)"><b>Don't have an accouunt?</b></p> 
    <p class="signin" style="color:blue;" >
    <a href="<?php echo('/register')?>">
    <b>
      <u class="sign">Sign in</u>
    </b>
    </a>
  </p>
  </div>

  <?= form_close() ?>
</div>
</div>
<?= $this->endSection('content') ?>

<?= $this->Section('style') ?>

<style>
.login {
  display: block;
  margin-bottom: 2rem;
  padding: 1rem;
  position: relative;
  text-align:center;
  
  
  
}


.login label {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;

  
}

.login input,
.login select {
  display: block;
  width: 50%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  margin-top: 5px;
  margin-left: auto;
  margin-right: auto;
}


.login button {
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

.login button:hover {
  background-color: #000000;
  color:#fefb64
 
}

.login p {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;
  margin-left: auto;
  margin-right: auto;
  

}

.login u.sign{
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;
  margin-left: auto;
  margin-right: auto;

}
.login u.forget {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;
  left: 50%;
  right: 10%;

}
@media (max-width: 768px) {
  .login {
    padding: 0.5rem;
  }

  .login label {
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

