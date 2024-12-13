<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All User Data</title>
</head>
<body>
    <div class="list">
        <h3>All User Data</h3>
        <!-- Start the table to display the data -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>CreatedAt</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Password</th>   
                </tr>
            </thead>

            <tbody>
            <?php if (!empty($users)) : ?>
                <?php $id = 1; // Initialize ID counter ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['phone']) ?></td>
                        <td><?= htmlspecialchars(date('Y-m-d', strtotime($user['reg_date']))) ?></td>
                        <td>
                            <?php $status='Active'; $class = 'color:green';if($user['Status'] == '0'){ $class='color:red'; $status='Inactive';}?>
                            <button style="<?= $class ?>" onClick="myFunction()"><?= $status;?></button>
                        </td>

                        <td>
                            <!-- Form for Edit action -->
                            <form action="http://localhost/p/list/edit.php" method="get" style="display:inline;">
                                <button type="submit">Edit</button>
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            </form>
                        </td>
                        <td>
                            <!-- Change/Reset Password -->
                            <form action="http://localhost/p/list/changepassword.php" method="get" style="display:inline;">
                                <button type="submit">Chnage/Reset</button>
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            </form>
                        </td>
                    </tr>
                    <?php $id++; // Increment the ID counter ?>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7">No users found</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <form action="http://localhost/p/list/index.php">
        <button type="submit">Register Now!</button>
    </form>
    <script>
        function myFunction(){
            fetch('./functions/function.php?action=toggleActiveInActive')
                .then(response => response.text())
                .then(data => {
                    // Do something with the response from PHP
                    alert("You are Toggled Now!"); // Display the response from PHP
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>


<!-- <td><?= htmlspecialchars($user['Status']) ? '':'<button style="color:red">InActive</button>' ?></td>

<form action="#" method="post">
    <input type="hidden" name="delete" value="yes">
    <?php echo htmlspecialchars($user['Status']) ? "<button style='color:green' type='submit'>Active</button>" : "<button style='color:red' type='submit'>InActive</button>" ;?>
</form> -->