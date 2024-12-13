<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Form</title>
</head>
<body>
    <form action="#" method="POST">
        <div class='form-body'>
            <h3>Form Data</h3>

            <label for="name">Name:</label>
            <input name="name" type="text" placeholder="Enter Your Name">
            <span style="color:red"><?= $nameErr ?? ''; ?></span></br>

            <label for="email">Email:</label>
            <input name="email" type="email" placeholder="Enter Your Email">
            <span style="color:red"><?= $emailErr ?? ''; ?></span></br>

            <label for="phone">Phone:</label>
            <input name="phone" type="text" placeholder="Enter Your Phone Number">
            <span style="color:red"><?= $phoneErr ?? ''; ?></span></br>

            <label for="password">Password:</label>
            <input name="password" type="password" placeholder="Enter Password">
            <span style="color:red"><?= $passwordErr ?? ''; ?></span></br>

            <button type="submit">Submit</button>
        </div>
    </form>
    <button onclick="window.location.href='http://localhost/p/list/users.php';">All Users</button>


</body>
</html>