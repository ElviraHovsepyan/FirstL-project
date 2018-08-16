@extends('default.layouts.layout')

@section('content')

<pre>
{{--{{ print_r(Session::all()) }}--}}
</pre>

<div class="col-md-9">
	<div>
		<h2>Contact us!</h2>
	</div>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat.</p>

	@if(count($errors) > 0)
	<div class="alert alert-danger">
		<ul>

			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>

	</div>

	@endif
	<form method="post" action="{{ route('contact') }}">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
		</div>
		<div class="form-group">
			<label for="site">Site</label>
			<input type="text" name="site" id="site" class="form-control" value="{{ old('site') }}">
		</div>
		<div class="form-group">
			<label for="text">Text</label>
			<textarea name="text" id="text" class="form-control" rows="3">{{ old('text') }}</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		
		
	</form>
</div>
@endsection