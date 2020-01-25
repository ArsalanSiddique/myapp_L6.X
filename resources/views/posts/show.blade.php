@extends('layouts.dashboard')
@section('content')

	   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Post Detail View</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('posts.create')}}" role="button" class="btn btn-sm btn-primary">Add New Post</a>
          </div>
        </div>
      </div>

	  @if($post->exists())
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Categories</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
        		<tr>
        			<td>{{$post->id}}</td>
        			<td>{{$post->title}}</td>
              <td>{{--$post->category--}}
                    @if(!$post->categories->isEmpty())
                      {{$post->categories->implode('title', ', ')}}
                    @endif
              </td>
        			<td>{{$post->created_at}}</td>
        			<td>{{$post->updated_at}}</td>
        			<td>
        				<div class="btn-group btn-sm" role="group" aria-label="Basic example" style="line-height: 32px; font-size:18px; color: blue;">
						      <a href="{{route('posts.edit', $post->id)}}" role="button" class="btn btn-link">Edit</a> |
                  <a href="{{route('posts.destroy', $post->id)}}" role="button" class="btn btn-link">Delete</a>
						    </div>
        			</td>
        		</tr>
          </tbody>
        </table>
      </div>
      @else
	    	<div class="alert alert-info" role="alert">
  				There is no Post  record!
			  </div>
      @endif
@endsection