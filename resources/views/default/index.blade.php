@extends('default.layouts.layout')

@section('navbar')
	@parent
@endsection

@section('header')
	@parent
@endsection

@section('sidebar')
	@parent
	<div class="sidebar-module">
		<h4>About</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
@endsection

@section('content')
        @include('default.content')
@endsection