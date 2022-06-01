<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
  <form method="post">
    <h2>Admin Login</h2>
    <p>Enter correct name & password:</p>
    <label for="uname"><b>Username: </b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br>
    <label for="passwd"><b>Password: </b></label>
    <input type="password" placeholder="Enter Password" name="passwd" required>
    <br>
    <button type="submit">Login</button>
    <?php if($errors->has('loginFail')) { ?>
    <span><?php {{ echo $errors->first('loginFail'); }} ?></span>
    <?php } ?>
    <br>
    <a href="/forgot_passwd">Forgot password?</a>
  </form>
</body>

</html>