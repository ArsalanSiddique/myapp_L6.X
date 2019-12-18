<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
</head>
<body>

    <?php if($errors->any): ?>
    <ul>
    <?php foreach($errors->all() as $errors): ?>
    <li><?php echo $erors; ?></li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <h2>Create New Post</h2>
    <form action="<?php echo route('post.store');?>" method="post" enctype="multipart/form-data">
        @csrf
        
        <h3>name</h3>
        <input type="text" name="name" id="" /><br />
        
        <h3>About yourself</h3>
        <textarea name="content" id="" cols="30" rows="10"></textarea><br />
        
        <h3>Select Skills</h3>
        <label>Php<input type="checkbox" name="skills[]" id="" value="Php"></label>
        <label>Wordpress<input type="checkbox" name="skills[]" id="" value="Wordpress"></label>
        <label>Python<input type="checkbox" name="skills[]" id="" value="Python"></label>
        
        <h3>Select Gender</h3>
        <label>Male<input type="radio" name="gender" id="" value="male"></label>
        <label>Female<input type="radio" name="gender" id="" value="female"></label>

        <h3>Select Profile</h3>
        <input type="file" name="profile" id="" />
        <br />
        <input type="submit" value="Create New Post">
    </form>
</body>
</html>