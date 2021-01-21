@extends('layouts.app')

@section('content')
		<form method="POST" action="{{ route('products_store') }}" enctype="multipart/form-data">
			@csrf
			<input type="file" name="image" class="form-control">
			<input type="text" name="name">
			<input type="number" name="price">
			<textarea name="description"></textarea>
			
			<button>save</button>
		</form>
@endsection