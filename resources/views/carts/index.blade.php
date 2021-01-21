@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>

    @foreach ($products as $product)
       <div class="product-item">
                <img width="200" height="200" src="{{ asset('images/$product->image')}}">
                <div class="product-information">
                    <h1 class="product-title">{{ $product->name }}</h1>
                    <h3 class="product-price">{{ $product->description }}</h3>
                    <h3 class="product-price">quantity -> {{ $product->quantity }}</h3>
                    <div class="product-price">
                        <div class="MainPrice">
                            <font>{{ $product->price }}</font><span><i class="lari lari-bold"></i> </span>
                        </div>
                    </div>
                    <form method="POST" action="{{ route("carts_delete") }}">
                        @csrf
                        <input  type="hidden" name="id" value="{{ $product->id }}">
                        @if (Auth::user())
                            @if (Auth::user()->is_admin)
                                <button>წაშლა</button>
                            @endif
                        @endif

                    </form>
                </div>
            </div>
    @endforeach

    </body>
    </html>
@endsection