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
    <li><?php echo $errors; ?></li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <h2>Create New Post</h2>
    <?php
        if(Session::has('message')) {
            echo Session::get('message');
        }
    ?>
    <form action="<?php echo route('post.store');?>" method="post" enctype="multipart/form-data">
        @csrf
        
        <label>name: <input type="text" name="name" id="" value="<?php echo old('name'); ?>" /></label><br />
        <?php
        // foreach ($errors->get('email') as $message) {
        //     echo $message;
        // }
        ?>
        <label>Email: <input type="text" name="email" id="" value="<?php echo old('email'); ?>" /></label><br />
        <label>About yourself: <br /><textarea name="content" id="" cols="30" rows="10"></textarea></label><br />
        <label>Select Skills: </label>
        <label>Php<input type="checkbox" name="skills[]" id="" value="Php"></label>
        <label>Wordpress<input type="checkbox" name="skills[]" id="" value="Wordpress"></label>
        <label>Python<input type="checkbox" name="skills[]" id="" value="Python"></label> <br />
        <label>Select Gender: </label>
        <label>Male<input type="radio" name="gender" id="" value="male"></label>
        <label>Female<input type="radio" name="gender" id="" value="female"></label><br />
        <label>Select Profile: <input type="file" name="profile" id="" /></label><br />
        <label>Select Start Date: <input type="date" name="start_date" id="" /></label><br />
        <label>Select End Date: <input type="date" name="end_date" id="" /></label><br />
        <label>Enter Password: <input type="password" name="password" id="" /></label><br />
        <label>Confirm Password: <input type="password" name="password_confirmation" id="" /></label><br />
        <label>Our Terms And Services: <input type="checkbox" name="tos" id="" /></label><br />
        <label>Enter Website Address: <input type="url" name="website" id="" /></label><br />

        <input type="submit" value="Create New Post">
    </form>
</body>
</html>