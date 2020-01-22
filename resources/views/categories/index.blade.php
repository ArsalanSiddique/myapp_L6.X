@extends('layouts.dashboard')
@section('content')
  
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Category Section</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('categories.create')}}" role="button" class="btn btn-sm btn-primary">Add New Category</a>
          </div>
        </div>
      </div>

	  @if(!$categories->isEmpty())
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Parent | Title</th>
              <th>Thumbnail</th>
              <th>Child Category</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          	<?php $i=1; ?>
        	@foreach($categories as $category)
        		<tr>
        			<td>{{$i}}</td>
        			<td>{{$category->title}}</td>
              <td><img src="{{asset('storage/'.$category->thumbnail)}}" width="50" height="50" /></td>
        			<td>
                @foreach($category->children as $children)
                {{$children->title}}
                <br/>
                @endforeach
              </td>
              <td>{{$category->created_at}}</td>
        			<td>{{$category->updated_at}}</td>
        			<td>
        				<div class="btn-group btn-sm" role="group" aria-label="Basic example" style="line-height: 32px; font-size:18px; color: blue;">
        				  <a href="{{route('categories.show', $category->id)}}" role="button" class="btn btn-link">Show</a> |
						  <a href="{{route('categories.edit', $category->id)}}" role="button" class="btn btn-link">Edit</a> |
						  <form method="post" action="{{route('categories.destroy', $category->id)}}">
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
  				There is no Category record!
			</div>

      @endif
@endsection