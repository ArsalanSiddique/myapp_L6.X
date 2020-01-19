@extends('layouts.dashboard')
@section('content')

	   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Role Section</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('roles.create')}}" role="button" class="btn btn-sm btn-primary">Add New Role</a>
          </div>
        </div>
      </div>

	  @if($role->exists())
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Users</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
        		<tr>
        			<td>{{$role->id}}</td>
        			<td>{{$role->name}}</td>
        			<td>{{$role->created_at}}</td>
        			<td>{{$role->updated_at}}</td>
        			<td></td>
        			<td>
        				<div class="btn-group btn-sm" role="group" aria-label="Basic example" style="line-height: 32px; font-size:18px; color: blue;">
						      <a href="{{route('roles.edit', $role->id)}}" role="button" class="btn btn-link">Edit</a> |
                  <a href="{{route('roles.destroy', $role->id)}}" role="button" class="btn btn-link">Delete</a>
						    </div>
        			</td>
        		</tr>
          </tbody>
        </table>
      </div>
      @else
	    	<div class="alert alert-info" role="alert">
  				There is no role record!
			  </div>

      @endif
@endsection