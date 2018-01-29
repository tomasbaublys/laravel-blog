@extends ('partials.master')

@section ('content')
<div class="col-sm-8 blog-main">
	<h1>Publish a post</h1>
	
	<hr>

	<form method="POST" action="/posts">
		{{ csrf_field() }}

	  <div class="form-group">
	    <label for="title">Title</label>
	    <input type="text" class="form-control" id="title" name="title">
	  </div>

	  <div class="form-group">
	    <label for="body">Body</label>
	   <textarea class="form-control" id="body" name="body"></textarea>
	  </div>

	  <button type="submit" class="btn btn-default">Publish</button>
	</form>
	
	@include ('partials.errors')
	
</div>
@endsection

