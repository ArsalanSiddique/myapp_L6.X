@extends('layouts.dashboard')
@section('content')
<div class="col-md-6">
	<div class="card panel-primary" style="box-shadow: 3px 3px 5px 6px #ccc;">
		<div class="card-header">
			<div class="card-title"> <h3><b>Edit Post</b></h3> </div>
		</div>
		<div class="card-body">
			<form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
			    <form>
			  <div class="form-group">
			    <label for="inputCategoryTitle"><b>New Post: </b></label>
			    <input type="text" name="title" class="form-control" id="inputCategoryTitle"  value="{{$post->title}}">
			  </div>
			  <div class="form-group">
			    <label for="inputCategoryThumbnail"><b>Thumbnail Image: </b></label>
			    <img src="{{asset('storage/'.$post->thumbnail) }}" width="50px" height="50px" />
			    <input type="file" name="thumbnail" class="form-control" id="inputCategoryThumbnail">
			  </div>
			  <div class="form-group">
			    <label for="inputCategoryContent"><b>Post Content: </b></label>
			    <textarea name="content" class="form-control" id="inputCategoryContent">{!! $post->content !!}</textarea>
			  </div>
			  <div class="form-group">
			    <label for="selectParent"><b>Select Category: </b></label>
			    <select name="categories[]" class="form-control" multiple="">
			    	@if(!$categories->isEmpty())
				    	@foreach($categories as $cats)
					    		<option
					    			@if(in_array($cats->id, $post->categories->pluck('id')->toArray()))
					    				{{"selected"}} 
					    			@endif
									value="{{$cats->id}}" >
					    			{{$cats->title}}
					    		</option>
				    	@endforeach
				    @endif
			    </select>
			  </div>
			  <button type="submit" class="btn btn-primary">Update post</button>
			</form>
		</div>
	</div>
</div>
@endsection