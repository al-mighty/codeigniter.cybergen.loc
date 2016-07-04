<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Hello it is article_view</h1>
<?php
//foreach($articles as $item)
//echo $title['title']." <br>".$title['text']." <br>".$title['date'];
//?>
<form method="POST" action="">
    <input type="text" name="user_id" placeholder="user_id">
    <input type="text" name="user_name" placeholder="user_name">
    <input type="submit" name="submit" value="registration" placeholder="user_name">
</form>

<form action="" method="POST">
    <table>
        <thead>
        <tr>
            <th></th>
            <th align="left">home</th>
            <th align="left">created date</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($results as $user){ ?>
        <tr>
            <td>
                <input type="checkbox" value="<?=$user['id'];?>" name="user_id[]">
            </td>
            <td>
                <?=$user['name'];?>
            </td>
            <td>
                <?=$user['created_date'];?>
            </td>
        </tr>
        <?php }?>
        </tbody>
    </table>
    <button type="submit" name="delete" value="delete" class="delete">Delete</button>
</form>
</body>
</html>