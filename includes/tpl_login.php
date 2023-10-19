<?php include "tpl_head.php";?>

<h2><?= $pageTitle ?></h2>

<main id="content">
  <div id="login" class="form">
    <form method="post">
      <p class="user-error"><?= isset($errors['user']) ? $errors['user'] : ''; ?></p>

      <label>Email</label>
      <div>
        <input type="text" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"/>
        <p class="error"><?= isset($errors['email']) ? $errors['email'] : ''; ?></p>
      </div>
      
      <label>Passsword</label>
      <div>
        <input type="password" name="password"/>
        <p class="error"><?= isset($errors['password']) ? $errors['password'] : ''; ?></p>
      </div>
      
      <button type="submit">Login</button>
    </form>
  </div>
</main><!-- content -->

<?php include "tpl_footer.php"; ?>
