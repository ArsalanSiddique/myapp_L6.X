@extends('layouts.dashboard')
@section('content')
<div class="col-md-6">
	<div class="card panel-primary" style="box-shadow: 3px 3px 5px 6px #ccc;">
		<div class="card-header">
			<div class="card-title"> <h3><b>Add Category</b></h3> </div>
		</div>
		<div class="card-body">
			<form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
			    <form>
			  <div class="form-group">
			    <label for="inputCategoryTitle"><b>New Category: </b></label>
			    <input type="text" name="title" class="form-control" id="inputCategoryTitle">
			  </div>
			  <div class="form-group">
			    <label for="inputCategoryThumbnail"><b>Thumbnail Image: </b></label>
			    <input type="file" name="thumbnail" class="form-control" id="inputCategoryThumbnail">
			  </div>
			  <div class="form-group">
			    <label for="inputCategoryContent"><b>Category Content: </b></label>
			    <textarea name="content" class="form-control" id="inputCategoryContent"></textarea>
			  </div>
			  <div class="form-group">
			    <label for="selectParent"><b>Select Parent: </b></label>
			    <select name="parent_id">
			    	<option value="0">Select Parent Category</option>
			    	@if(!$categories->isEmpty())
				    	@foreach($categories as $category)
				    		<option value="{{$category->id}}">{{$category->title}}</option>
				    	@endforeach
				    @endif
			    </select>
			  </div>
			  <button type="submit" class="btn btn-primary">Add Category</button>
			</form>
		</div>
	</div>
</div>
@endsection