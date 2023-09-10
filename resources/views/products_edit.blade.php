@extends('layouts.admin')
@section('content')
    <section class="container">
        @if (Session()->has('info'))
            <div class="alert alert-danger w-100 mt-3">
                {{ session()->get('info') }}
            </div>
        @endif
        <table class="table align-middle mb-0 bg-white mt-3">
            <thead class="bg-light">
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
                                <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
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
                            <a href="{{ url('/edit/' . $product->id) }}">
                                <button type="button" class="btn btn-link btn-sm btn-rounded">
                                    Edit
                                </button>
                            </a>
                            <a href="{{ url('/delete/' . $product->id) }}">
                                <button type="button" class="btn btn-link btn-sm btn-rounded text-danger"
                                    onclick="return confirm('Are You Sure you want to delete this Prodct')">
                                    Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </section>
@endsection
