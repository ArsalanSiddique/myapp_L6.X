@extends('layouts.posts')
@section('title', 'Create New Post')
@section('content')
<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        
        <label>name: <input type="text" name="name" id="" value="{{old('name')}}" /></label><br />
        <label>Email: <input type="text" name="email" id="" value="{{old('email')}}" /></label><br />
        <?php
        // @if($errors->has('email'))
        //     <div class="error">{{ $errors->first('email') }}</div>
        // @endif
        
        // foreach ($errors->get('email') as $message) {
        //     echo $message;
        // }
        ?>
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
@endsection