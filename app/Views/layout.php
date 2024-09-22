<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentaN</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon-32x32.png') ?>">
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <?= $this->renderSection('style') ?>

</head>
<body>
	<header>
    <div class="navbar" style="color: #000000; background-color: #fefb64; padding: 0px 0px;" >
    <div class="content">
      <div class="logo">
        <a href="<?= base_url('/') ?>"><img src="<?= base_url('rentan.png') ?>" alt="" height="100px" width="100px" ></a></div>
        <ul class="menu-list">
          <div class="icon cancel-btn">
            <i class="fas fa-ti7mes"></i>
          </div>
          <li><a href="/">Home</a></li>
          <?php if (session()->get('logged_in')) : ?>
            <li><a href="/user/profile">Profile</a></li>
            <?php if (isset(session('user')->role) && session('user')->role=='a') : ?>
              <li><a href="/car">Car List</a></li>
              <li><a href="/user">User List</a></li>
              <li><a href="/car/create">Create a car</a></li>
            <?php endif; ?>
            <li><a href="/user/logout">Logout</a></li>
          <?php else: ?>
            <li><a href="/login">Login</a></li>
          <?php endif; ?>
          
  
        </ul>

        <div class="icon menu-btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>

  </div>	
</header>
	<main>
		<?= $this->renderSection('content') ?>
	</main>
	<footer>
		
    <footer class="footer">

	</footer>
    <?= $this->renderSection('js_url') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>