<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <h1>Admin Panel</h1>
    <p>Welcome Admin!</p>
    <form method="post">
        <input type="hidden" name="user" value="add_user">
        <input type="submit" value="Add User">
    </form>
    <form method="post">
        <input type="hidden" name="user" value="users_table">
        <input type="submit" value="Users Table">
    </form>
    <br><br><br>
    <form method="post">
        <input type="hidden" name="user" value="logout">
        <input type="submit" value="Logout">
    </form>
</body>

</html>