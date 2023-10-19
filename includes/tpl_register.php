<?php include "tpl_head.php";?>

<h2><?= $pageTitle ?></h2>

<main id="content">
  <div id="register" class="form">
    <form action="#" method="post">
      <p class="error"><?= isset($errors['exist']) ? $errors['exist'] : ''; ?></p>
      
      <label>User</label>
      <div>
        <input type="text" name="user" value="<?= isset($_POST['user']) ? $_POST['user'] : ''?>"
        />
        <p class="error"><?= isset($errors['user']) ? $errors['user'] : ''; ?></p>
      </div>
      
      <label>Email</label>
      <div>
        <input type="text" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''?>"/>
        <p class="error"><?= isset($errors['email']) ? $errors['email'] : ''; ?></p>
      </div>

      <label>Password</label>
      <div>
        <input type="text" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : ''?>"/>
        <p class="error"><?= isset($errors['password']) ? $errors['password'] : ''; ?></p>
      </div>
      
      <button type="submit">Register</button>
    </form>
  </div>
</main><!-- content -->

<?php include "tpl_footer.php"; ?>
