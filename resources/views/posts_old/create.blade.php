@extends('layouts.posts')
@section('title', 'Create New Post')
@section('content')
<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        
        @include('partials.basicForm', ["message" => "*"])
        <label>Select Skills: </label>
        <label>Php<input type="checkbox" name="skills[]" id="" value="Php"></label>
        <label>Wordpress<input type="checkbox" name="skills[]" id="" value="Wordpress"></label>
        <label>Python<input type="checkbox" name="skills[]" id="" value="Python"></label> 
        @error('skills')
                <span style="color:red;">{{$message}}</span>
        @enderror
        <br />
        <label>Select Gender: </label>
        <label>Male<input type="radio" name="gender" id="" value="male"></label>
        <label>Female<input type="radio" name="gender" id="" value="female"></label>
        @error('gender')
                <span style="color:red;">{{$message}}</span>
        @enderror
        <br />
        <label>Select Profile: <input type="file" name="profile" id="" /></label>
        @error('profile')
                <span style="color:red;">{{$message}}</span>
        @enderror
        <br />
        <label>Select Start Date: <input type="date" name="start_date" id="" /></label>
        @error('start_date')
                <span style="color:red;">{{$message}}</span>
        @enderror
        <br />
        <label>Select End Date: <input type="date" name="end_date" id="" /></label>
        @error('end_date')
                <span style="color:red;">{{$message}}</span>
        @enderror
        <br />
        <label>Enter Password: <input type="password" name="password" id="" /></label>
        @error('password')
                <span style="color:red;">{{$message}}</span>
        @enderror
        <br />
        <label>Confirm Password: <input type="password" name="password_confirmation" id="" /></label>
        @error('password_confirmation')
                <span style="color:red;">{{$message}}</span>
        @enderror
        <br />
        <label>Our Terms And Services: <input type="checkbox" name="tos" id="" /></label>
        @error('tos')
                <span style="color:red;">{{$message}}</span>
        @enderror
        <br />
        <label>Enter Website Address: <input type="url" name="website" id="" /></label>
        @error('website')
                <span style="color:red;">{{$message}}</span>
        @enderror
        <br />

        <input type="submit" value="Create New Post" />
</form>
@endsection