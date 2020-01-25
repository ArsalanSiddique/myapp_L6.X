@extends('dashboard.layout')
@section('content')

	   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Category Detail View</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('categories.create')}}" role="button" class="btn btn-sm btn-primary">Add New Category</a>
          </div>
        </div>
      </div>

	  @if($categories->exists())
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Children</th>
              <th>Title</th>
              <th>Content</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
        		<tr>
        			<td>{{$categories->id}}</td>
              <td>
                
                @foreach($categories->children as $parent)
                {{$parent->title}}
                <br/>
                @endforeach

              </td>
        			<td>{{$categories->title}}</td>
              <td>{{$categories->content}}</td>
        			<td>{{$categories->created_at}}</td>
        			<td>{{$categories->updated_at}}</td>
        			<td>
        				<div class="btn-group btn-sm" role="group" aria-label="Basic example" style="line-height: 32px; font-size:18px; color: blue;">
						      <a href="{{route('categories.edit', $categories->id)}}" role="button" class="btn btn-link">Edit</a> |
                  <a href="{{route('categories.destroy', $categories->id)}}" role="button" class="btn btn-link">Delete</a>
						    </div>
        			</td>
        		</tr>
          </tbody>
        </table>
      </div>
      @else
	    	<div class="alert alert-info" role="alert">
  				There is no categories record!
			  </div>
      @endif
@endsection