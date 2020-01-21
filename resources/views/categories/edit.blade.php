@extends('layouts.dashboard')
@section('content')
<div class="col-md-6">
	<div class="card panel-primary" style="box-shadow: 3px 3px 5px 6px #ccc;">
		<div class="card-header">
			<div class="card-title"> <h3><b>Edit Category</b></h3> </div>
		</div>
		<div class="card-body">
			<form action="{{route('categories.update', $category->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
			    <form>
			  <div class="form-group">
			    <label for="inputCategoryTitle"><b>New Category: </b></label>
			    <input type="text" name="title" class="form-control" id="inputCategoryTitle" value="{{$category->title}}">
			  </div>
			  <div class="form-group">
			    <label for="inputCategoryThumbnail"><b>Thumbnail Image: </b></label>
			    <img src="{{asset($category->thumbnail)}}" width="50px" height="50px" />
			    <input type="file" name="thumbnail" class="form-control" id="inputCategoryThumbnail">
			  </div>
			  <div class="form-group">
			    <label for="inputCategoryContent"><b>Category Content: </b></label>
			    <textarea name="content" class="form-control" id="inputCategoryContent">{{$category->content}}</textarea>
			  </div>
			  <div class="form-group">
			    <label for="selectParent"><b>Select Parent: </b></label>
			    <select name="parent_id">
			    	<option value="0">Select Parent Category</option>
			    	@if(!$categories->isEmpty())
				    	@foreach($categories as $cat)
				    		@if($category->parent_id == $cat->id) 
					    		<option value="{{$cat->id}}" selected>
					    			{{$cat->title}}
					    		</option>
				    		@elseif($category->parent_id != $cat->id) 
					    		<option value="{{$cat->id}}">
					    			{{$cat->title}}
					    		</option>
				    		@endif
				    	@endforeach
				    @endif
			    </select>
			  </div>
			  <button type="submit" class="btn btn-primary">Update Category</button>
			</form>
		</div>
	</div>
</div>
@endsection