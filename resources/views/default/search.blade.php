@extends('default.layouts.layout')

@section('sidebar')

@endsection

@section('content')
	<h2>Upload file</h2>
	<form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="video" id="video">
		<input type="submit">
	</form><br><br>

	<h2>Search</h2>
	<form id="searchForm">
		{{ csrf_field() }}
		<div>
			Search Term: <input type="text" id="search" name="search" placeholder="Enter Search Term">
		</div><br>
		<div>
			Max Results: <input type="number" id="maxResults" name="maxResults" min="1" max="50" step="1" value="10">
		</div>
		<input type="submit" value="Search">
	</form><br>
	<div class="searchResults"></div>


@endsection



