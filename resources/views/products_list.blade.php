@extends('layouts.admin')
@section('content')
    <section class="container">
        @if (Session()->has('info'))
            <div class="alert alert-danger w-100 mt-3">
                {{ session()->get('info') }}
            </div>
        @endif
        <a href="{{ route('insert_product') }}" class="btn btn-dark mt-2 btn-sm">New Products</a>
        <table class="table align-middle mb-0 bg-white mt-3">
            <thead class="bg-light" style="border-bottom: 2px solid black">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Product Size</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Quanty</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/images/' . $product->img) }}" alt=""
                                    style="width: 45px; height: 45px" class="" />
                            </div>
                        </td>
                        <td>
                            {{ $product->product_name }}
                        </td>
                        <td>
                            {{ $product->size }}
                        </td>
                        <td>
                            {{ $product->price }}
                        </td>
                        <td>
                            {{ $product->discount }}
                        </td>
                        <td>
                            {{ $product->qty }}
                        </td>
                        <td>
                            <a href="{{ url('/products/edit/' . $product->id) }}">
                                <button type="button" class="btn btn-link btn-sm btn-rounded">
                                    Edit
                                </button>
                            </a>
                            @if (Auth::check())
                                @if (Auth::user()->role == 'superadmin')
                                    <a href="{{ url('/products/delete/' . $product->id) }}">
                                        <button type="button" class="btn btn-link btn-sm btn-rounded text-danger"
                                            onclick="return confirm('Are You Sure you want to delete this Prodct')">
                                            Delete
                                        </button>
                                    </a>
                                @endif
                            @endif

                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </section>
@endsection
