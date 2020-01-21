@extends('layouts.dashboard')
@section('content')
<div class="col-md-8">
	<div class="card panel-primary" style="box-shadow: 3px 3px 5px 6px #ccc;">
		<div class="card-header">
			<div class="card-title"> <h3><b>Add New User</b></h3> </div>
		</div>
		<div class="card-body">
			<form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
			    <form>
			  <div class="form-group">
			    <label for="inputFullName"><b>Full Name: </b></label>
			    <input type="text" name="fullname" class="form-control" id="inputFullName" value="{{$user->name}}">
			  </div>	
			  <div class="form-group">
			    <label for="inputEmail"><b>Email: </b></label>
			    <input type="email" name="email" class="form-control" id="inputEmail" value="{{$user->email}}">
			  </div>	
			  <div class="form-group">
			    <label for="inputPhone"><b>Phone: </b></label>
			    <input type="text" name="phone" class="form-control" id="inputPhone" value="{{$user->profile->phone}}">
			  </div>	
			  <div class="form-group">
			    <label for="InputCountry"><b>Select Country: </b></label>
			    <select name="country" class="form-control">
			    	<option value="0">Select Country</option>
			    	@if(!$countries->isEmpty())
				    	@foreach($countries as $country)
				    		<option
				    			@if($country->id == $user->profile->country_id)
				    				{{"Selected"}}
				    			@endif
				    		 value="{{$country->id}}">{{$country->name}}</option>
				    	@endforeach
				    @endif
			    </select>
			  <div class="form-group">
			    <label for="InputCity"><b>Select City: </b></label>
			    <input type="text" name="city" class="form-control" id="InputCity" value="{{$user->profile->city}}">
			  <div class="form-group">
			    <label for="inputUserPhoto"><b>Profile Image: </b></label><br />
			    <img src="{{asset('storage/'.$user->profile->photo)}}" class="img-fluid" width="150px" height="150px" />
			    <input type="file" name="photo" class="form-control" id="inputUserPhoto">
			  </div>
			  <div class="form-group">
			    <label for="selectParent"><b>Select Roles: </b></label>
			    <select name="roles[]" class="form-control" multiple>
			    	<option value="0">Select Role</option>
			    	@if(!$roles->isEmpty())
				    	@foreach($roles as $role)
				    		<option 
				    			@if(in_array($role->id, $user->roles->pluck('id')->toArray()))
				    				{{"Selected"}}
				    			@endif

				    		value="{{$role->id}}">{{$role->name}}</option>
				    	@endforeach
				    @endif
			    </select>
			  </div>
			  <button type="submit" class="btn btn-primary">Update User</button>
			</form>
		</div>
	</div>
</div>
@endsection