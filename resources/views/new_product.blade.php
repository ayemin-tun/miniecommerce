@extends('layouts.admin')
@section('content')
    <section class="container">

        <form action="{{ route('insert_product') }}" class="mt-4" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
            <div class="form-outline mt-3">
                <input type="text" name="name" id="forName" class="form-control">
                <label for="forName" class="form-label">Name</label>
            </div>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="text" name="size" id="forSize" class="form-control">
                <label for="forSize" class="form-label">Size</label>
            </div>
            @error('size')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="price" name="price" id="forPrice" class="form-control">
                <label for="forPrice" class="form-label">Price</label>
            </div>
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="text" name="discount" id="forDis" class="form-control">
                <label for="forDis" class="form-label">Discount</label>
            </div>
            @error('discount')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="number" name="qty" id="forQty" class="form-control" value="1">
                <label for="forQty" class="form-label">Quantity</label>
            </div>
            @error('qty')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-3">
                <label class="form-label" for="customFile">Choose Product Image</label>
                <input type="file" class="form-control" id="customFile" name="img"
                    accept="image/jpeg,image/jpg, image/png" />
            </div>
            @error('img')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="submit" value="Add" class="btn btn-primary btn-lg btn-block mt-3">
        </form>
    </section>
@endsection
