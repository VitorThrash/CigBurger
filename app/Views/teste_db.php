<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Users in the database</h3>    

    <table border = "1" >
        <thead>
            <tr>
                <th>ID</th>
                <th>UserName</th>
                <th>Password</th>
                <th>Create at</th>
                <th>Update at</th>
                <th>Delete at at</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user ): ?>
                <tr>
                    <th><?= $user ->id ?></th>
                    <th><?= $user ->username ?></th>
                    <th><?= $user ->passwrd ?></th>
                    <th><?= $user ->create_at ?></th>
                    <th><?= $user ->update_at ?></th>
                    <th><?= $user ->delete_at ?></th>
                </tr>
             <?php endforeach ?>
            
        </tbody>
    </table>
    <p>Total Users: <?= count($users) ?></strong></p>


</body>
</html>