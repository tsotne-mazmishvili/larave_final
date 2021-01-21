@extends('layouts.app')

@section('content')

	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<form method="POST" action="{{ route('products_update') }}">
			@csrf
			<input type="hidden" name="id" value="{{ $product->id }}">
			<input type="text" name="name" value="{{ $product->name }}">
			<textarea name="description" value="{{ $product->description }}"></textarea>
			<button>save</button>
		</form>
	</body>
	</html>

@endsection