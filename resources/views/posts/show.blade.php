<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Data</title>
</head>
<body>
    <h2>Show Record via show method</h2>
    <ul>
        <li><b>Title: </b><?php echo $data['name']; ?></li>
        <li><b>Content: </b><?php echo $data['content']; ?></li>
        <li><b>Gender: </b><?php echo $data['gender']; ?></li>
        <li><b>SKills: </b>
            <?php 
                $i = 0;
                $count = count($data['skills']);
                while($i < $count ){ echo $data['skills'][$i].' ';  $i++; } 
            ?>
        </li>
        <li><?php echo $data['profile']; ?></li>
    </ul> 
</body>
</html>