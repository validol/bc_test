<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <link rel="stylesheet" href="/public/css/styles.css" />
  <script src="/public/js/script.js" defer></script>
</head>
<body>
  <div id="main">
    <header id="header">
      <nav id="nav">

        <div class="menu">
          <a href="/" class="home">Home</a>
        </div>
        
        <div class="auth">
          <?php if( isset($_SESSION['user']) ): ?>
            <?php if( isAdmin() ): ?>
              <a href="/dashboard" class="dashboard <?= isActive('/dashboard') ? 'active' : ''; ?>">Dashboard</a> |
            <?php endif; ?>
            
            <details>
              <summary><?= $_SESSION['user']['name'] ?></summary>
              <div class="dropdown">
                <form action="/logout" method="post">
                  <input type="hidden" name="logout" value="delete" />
                  <button class="btn-logout">Logout</button>
                </form>
              </div>
            </details>
          
          <?php else: ?>

            <a href="/login" class="login <?= isActive('/login') ? 'active' : ''; ?>">Login</a>
            <a href="/register" class="register <?= isActive('/register') ? 'active' : ''; ?>">Register</a>
          
          <?php endif; ?>
        </div>

      </nav><!-- nav -->
    </header><!-- header -->
