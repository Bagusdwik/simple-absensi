<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>

<body>
  <form action="" method="post">
    <div class="form">
      <div>
        <label for="">Name</label>
        <input type="text" name="name" placeholder="name" required>
      </div>
      <div>
        <label for="">Username</label>
        <input type="text" name="username" placeholder="@username" required>
      </div>
      <div>
        <label for="">Email</label>
        <input type="email" name="email" placeholder="example@gmail.com" required>
      </div>
      <div>
        <label for="">Telephone</label>
        <input type="text" name="telepon" placeholder="+01" required>
      </div>
      <div>
        <label for="">Password</label>
        <input type="password" name="password" placeholder="password" required>
      </div>
      <div>
        <input type="submit" value="Register">
      </div>
    </div>
  </form>
</body>

</html>