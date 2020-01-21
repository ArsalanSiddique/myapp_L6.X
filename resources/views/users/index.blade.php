@extends('layouts.dashboard')
@section('content')
  
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Users Section</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('users.create')}}" role="button" class="btn btn-sm btn-primary">Add New User</a>
          </div>
        </div>
      </div>

	  @if(!$users->isEmpty())
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Thumbnail</th>
              <th>Email</th>
              <th>Phone</th>
              <th>City</th>
              <th>Country</th>
              <th>Roles</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          	<?php $i=1; ?>
        	@foreach($users as $user)
        		<tr>
        			<td>{{$i}}</td>
        			<td>{{$user->name}}</td>
              <!-- <td><img src="{{asset($user->profile->photo)}}" width="50" height="50" /></td> -->
              <!-- <td><img src="{{asset('storage/app/public/profiles/photo_837.jpg')}}" width="50" height="50" /></td> -->
              <td><img src="{{asset('storage/'.$user->profile->photo)}}" width="50" height="50" /></td>
              <td>{{$user->email}}</td>
              <td>{{$user->profile->phone}}</td>
              <td>{{$user->profile->city}}</td>              
              <td>{{$user->country->name}}</td>
              <td>
                @if(!$user->roles->isEmpty())
                  {{$user->roles->implode('name', ', ')}}
                @endif
              </td>
              <td>{{$user->created_at}}</td>
        			<td>{{$user->updated_at}}</td>
        			<td>
        				<div class="btn-group btn-sm" role="group" aria-label="Basic example" style="line-height: 32px; font-size:18px; color: blue;">
        				  <a href="{{route('users.show', $user->id)}}" role="button" class="btn btn-link">Show</a> |
						  <a href="{{route('users.edit', $user->id)}}" role="button" class="btn btn-link">Edit</a> |
						  <form method="post" action="{{route('users.destroy', $user->id)}}">
						  	@csrf
						  	@method('DELETE')
						  	<input type="submit" role="button" class="btn btn-link" value="Delete" />
						  </form>
						</div>
        			</td>
        		</tr>
        		<?php $i++; ?>
        	@endforeach
          </tbody>
        </table>
      </div>
      @else
	    	<div class="alert alert-info" role="alert">
  				There is no User record!
			</div>

      @endif
@endsection