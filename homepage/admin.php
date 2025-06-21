<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dash.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="admin.css">
  <title>Document</title>
</head>
<body>
  <!-- Navbar -->
<nav id="navbar">
  <ul class="navbar-items flexbox-col">

    <li class="navbar-item flexbox-left">
      <a  href="admin.php" class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <span class="material-symbols-outlined">menu</span>
        </div>
        <span class="link-text">Menu</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <span class="material-symbols-outlined">home</span>
        </div>
        <span class="link-text">Home</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <span class="material-symbols-outlined">group</span>
        </div>
        <span class="link-text">Passengers</span>
      </a>
    </li>
   
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <span class="material-symbols-outlined">Transportation</span>
        </div>
        <span class="link-text">Trips</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <span class="material-symbols-outlined">search</span>
        </div>
        <span class="link-text">Search</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <span class="material-symbols-outlined">logout</span>
        </div>
        <span class="link-text">Log out</span>
        
      </a>
    </li>
  </ul>
</nav>

<!-- Main -->
<main id="main" class="flexbox-col">
  <h2>welcome Admin!</h2>
  <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum corporis, rerum doloremque iste sed voluptates omnis molestias molestiae animi recusandae labore sit amet delectus ad necessitatibus laudantium qui! Magni quisquam illum quaerat necessitatibus sint quibusdam perferendis! Aut ipsam cumque deleniti error perspiciatis iusto accusamus consequuntur assumenda. Obcaecati minima sed natus?</p> -->
  <div class="admin-panel">
    <div class="admin-options">
        <!-- <h1>Take action</h1> -->
        <button id="viewButton" class="btn">View Passengers</button>
        <button id="addButton" class="btn">Add Passenger</button>
        <button id="deleteButton" class="btn">Delete Passenger</button>
    </div>
    <div id="content" class="content-box">
        <!-- Content will be displayed here -->
    </div>
</div>
<div class="back1">
</div>
</main>
</body>
</html>