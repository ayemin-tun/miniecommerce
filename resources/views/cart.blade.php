@extends('layouts.master')
@section('content')
    <div class="container">

        <div class="row mt-4">
            <div class="col">
                <h3>Your cart</h3>
            </div>
        </div>

        <form action="{{ url('checkout') }}" method="post">
            @csrf
            @if (Session()->has('info'))
                <div class="alert alert-success w-100 mt-3">
                    {{ session()->get('info') }} and <a href="{{ route('home') }}">Go Back</a>
                </div>
            @endif

            @php
                $total = 0;
            @endphp
            @foreach ($carts as $cart)
                @php
                    $sellingPrice = $cart->price - ($cart->discount / 100) * $cart->price;
                @endphp
                <div class="row mt-2 shadow border p-2 rounded">
                    <div class="col-md-3">
                        <img src="{{ asset('storage/images/' . $cart->img) }}" alt="" class="img-fluid w-100"
                            style="height: 150px;">
                    </div>
                    <div class="col-md-3 p-3">
                        <h4>{{ $cart->product_name }}</h4>
                        Selling price: {{ $sellingPrice }}Ks<br />
                        Quantity : {{ $cart->qty }} <br />
                        Size: {{ $cart->size }}cm
                        </p>
                    </div>

                    <div class="col-md-6 d-flex align-items-center justify-content-end">
                        <h4 class="mt-4">
                            <h5 class="me-4">Total: {{ $sellingPrice * $cart->qty }}</h5>
                            <a href="{{ url('delete_cart/' . $cart->id) }}" class="text-danger "
                                onclick="return confirm('Are You Sure you want to delete this?')">
                                <i class="fa fa-trash pr-5" aria-hidden="true"></i>
                            </a>

                        </h4>

                    </div>
                </div>
                @php
                    $total = $total + $sellingPrice * $cart->qty;
                @endphp
                <input type="hidden" name="product_id[]" value="{{ $cart->product_id }}">
                <input type="hidden" name="qty[]" id="" value="{{ $cart->qty }}">
                <input type="hidden" name="price[]" id="" value="{{ $sellingPrice * $cart->qty }}">
            @endforeach
            <hr>

            <div class="row">
                <div class="col">
                    <h5>Subtotal</h5>
                </div>
                <div class="col d-flex justify-content-end">
                    <h5>{{ $total }} Ks</h5>
                </div>
            </div>

            <button class="btn btn-primary w-100 btn-lg">Checkout</button>
        </form>
    </div>
@endsection
