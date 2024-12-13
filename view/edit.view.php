<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Info</title>
</head>
<body>
    <form action="#" method="POST">
        <div class='form-body'>
            <h3>Edit Info</h3>

            <label>Name:</label>
            <input name="name" type="text" value="<?= htmlspecialchars($name); ?>">
            <br>

            <label>Email:</label>
            <input name="email" type="email" value="<?= htmlspecialchars($email); ?>">
            <br>

            <label>Phone:</label>
            <input name="phone" type="text" value="<?= htmlspecialchars($phone); ?>">
            <br>

            <button type="submit">Submit</button>
        </div>
    </form>

    <button onclick="window.location.href='http://localhost/p/list/allusers.php';">All Users</button>
</body>
</html>