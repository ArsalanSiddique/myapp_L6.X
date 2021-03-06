@extends('dashboard.layout')
@section('content')
  
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Posts Section</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('posts.create')}}" role="button" class="btn btn-sm btn-primary">Add New Post</a>
          </div>
        </div>
      </div>

	  @if(!$posts->isEmpty())
      <div class="table-responsive">
        <h5>{{$posts->total()}} of {{$posts->count()}} Posts shown</h5>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Author</th>
              <th>Thumbnail</th>
              <th>Slug</th>
              <th>Categories</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          	<?php $i=1; ?>
        	@foreach($posts as $post)
        		<tr>
        			<td>{{$i}}</td>
        			<td>{{$post->title}}</td>
              <td>{{$post->user["name"]}}</td>
                    <td><img src="{{asset('storage/'.$post->thumbnail)}}" width="50" height="50" /></td>
                    <td>{{$post->slug}}</td>
        			<td>
<!--                     @foreach($post->categories as $cat)
                        {{-- $cat->title --}}
                        <br/>
                    @endforeach -->
                    @if(!$post->categories->isEmpty())
                      {{$post->categories->implode('title', ', ')}}
                    @endif
                    </td>
                    <td>{{$post->created_at}}</td>
            			<td>{{$post->updated_at}}</td>
            			<td>
            				<div class="btn-group btn-sm" role="group" aria-label="Basic example" style="line-height: 32px; font-size:18px; color: blue;">
            				  <a href="{{route('posts.show', $post->id)}}" role="button" class="btn btn-link">Show</a> 
                      @can('view', $post) |
        						  <a href="{{route('posts.edit', $post->id)}}" role="button" class="btn btn-link">Edit</a> |
        						  <form method="post" action="{{route('posts.destroy', $post->id)}}">
        						  	@csrf
        						  	@method('DELETE')
        						  	<input type="submit" role="button" class="btn btn-link" value="Delete" />
        						  </form>
                      @endcan
    						    </div>
            			</td>
        		    </tr>
        		<?php $i++; ?>
        	@endforeach
          <td colspan="9">{{$posts->links()}}</td>
          </tbody>
        </table>
      </div>
      @else
	    	<div class="alert alert-info" role="alert">
  				There is no Post record!
			</div>

      @endif
@endsection