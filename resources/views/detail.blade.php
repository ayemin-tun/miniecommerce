@extends('layouts.master')
@section('content')
    <section class="container">
        @if (Session()->has('cartinfo'))
            <div class="alert alert-success w-100 mt-3">
                {{ session()->get('cartinfo') }} and <a href="{{ url('cart') }}">Go To Cart</a>
            </div>
        @endif
        <div class="row mt-5">
            <div class="col-md-4 p-0">
                <img src="{{ asset('storage/images/' . $product->img) }}" alt="" style="height: 250px;"
                    class="img-fluid w-100">
            </div>
            <div class="col-md-4 p-4">


                <h5>{{ $product->product_name }}</h5>
                <p>{{ $product->size }} cm</p>
                <h3 class="text-danger">Price -{{ $product->price - ($product->discount / 100) * $product->price }}</h3>
                <p><span class="text-decoration-line-through">{{ $product->price }}</span>{{ $product->discount }} %</p>

                <form action="{{ url('/product/addcart') }}" method="post">
                    @csrf
                    @if ($product->qty == 0)
                        <span class="btn btn-danger btn-sm">Out of stock</span>
                    @else
                        Choose Quantity
                        <input type="number" name="qty" id="" min="1" max="{{ $product->qty }}"
                            value="1" class="form-control">
                    @endif
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    @if (Auth::check())
                        @if (Auth::user()->role == 'user')
                            @if ($product->qty > 0)
                                <input type="submit" class="btn btn-primary mt-2" value="Add To Cart">
                            @endif
                        @else
                            <span class="text-danger fs-6">{{ Auth::user()->role }} can not perform checkout</span>
                            <a href="{{ url('/new') }}" class="btn btn-primary mt-2">Go to Admin panel</a>
                        @endif
                    @else
                        <a href="{{ url('/login') }}" class="btn btn-primary mt-2">Login First</a>
                    @endif
                </form>
            </div>

            <div class="col-md-4 p-5">
                <p>Delievery</p>
                <p><i class="fa-solid fa-location-dot"></i></i> Yangon.Bahan Township</p>
                <p><i class="fa-solid fa-car"></i></i> Home Delievery</p>
                <p>2~5 Days</p>
                <i class="fa-solid fa-money-check"></i> Cash on Delivery Available
            </div>
        </div>

        <div class="row mt-3">
            <h3 class="">Top Sell</h3>
            @foreach ($products as $p)
                <div class="col-md-3 mt-3">
                    <a href="{{ url('/detail/' . $p->id) }}" class="text-dark">
                        <div class="card">
                            <img src="{{ asset('storage/images/' . $p->img) }}" alt="" class="card-img-top"
                                style="height: 150px;">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $p->product_name }}</h5>
                                <h6>{{ $p->price }}-Ks</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
