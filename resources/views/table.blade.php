<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
</head>
<body>
    <h2>Users Table</h2>
    <p>Welcome to Users Table!</p>
    <table>
        <tr>
            <th id="uname">Username</th>
            <th id="passwd">Password</th>
            <th id="email">Email</th>
            <th id="age">Age</th>
            <th id="gender">Gender</th>
        </tr>
        <?php
        foreach ($users as $user) { ?>
        <tr>
            <td><?php {{ echo $user->username; }} ?></td>
            <td><?php {{ echo $user->passwd; }} ?></td>
            <td><?php {{ echo $user->email; }} ?></td>
            <td><?php {{ echo $user->age; }} ?></td>
            <td><?php {{ echo $user->gender; }} ?></td>
        </tr>
        <?php } ?>
    </table>
    <form method="post">
        <input type="submit" value="Admin Panel">
    </form>
</body>
</html>