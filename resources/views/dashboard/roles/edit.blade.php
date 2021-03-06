@extends('dashboard.layout')
@section('content')
<form action="{{route('roles.update', $role->id)}}" method="POST" class="form-inline">
	@csrf
	@method('PATCH')
    <div class="form-row form-inline align-items-center">
	    <div class="input-group mb-2 mr-sm-2">  
		    <label class="my-1 mr-2" for="inputRole">Role Name: </label>
		    <input type="text" name="name" class="form-control" id="inputRole" placeholder="New Role" value="{{$role->name}}">
		</div>
		<div class="input-group mb-2 mr-sm-2 mt-2">
	    	<button type="submit" class="btn btn-primary mb-2">Update Role</button>
		</div>
  	</div>
  
</form>
@endsection