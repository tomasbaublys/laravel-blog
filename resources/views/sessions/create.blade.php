@extends ('partials.master')

@section ('content')
	<div class="col-sm-8">
		<h1>Register</h1>

		<form action="/register" method="POST">
		{{ csrf_field() }}
			<legend>Form title</legend>
		
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" required>
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>

			<div class="form-group">
				<label for="password-confirmation">Password Confirmation:</label>
				<input type="password" class="form-control" id="password-confirmation" name="password-confirmation" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Register</button>
			</div>

			@include ('partials.errors')

		</form>
	</div>

@endsection