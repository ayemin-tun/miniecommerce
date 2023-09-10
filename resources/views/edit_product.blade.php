@extends('layouts.admin')
@section('content')
    <section class="container">
        <h3 class="mt-3">Update Product {{ $product->id }}</h3>
        <form action="{{ route('update_product') }}" class="mt-4" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
            <input type="hidden" name="oldImgName" value="{{ $product->img }}">

            <div class="form-outline mt-3">
                <input type="text" name="name" id="forName" class="form-control"
                    value="{{ $product->product_name }}">
                <label for="forName" class="form-label">Name</label>
            </div>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="text" name="size" id="forSize" class="form-control" value="{{ $product->size }}">
                <label for="forSize" class="form-label">Size</label>
            </div>
            @error('size')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="price" name="price" id="forPrice" class="form-control" value="{{ $product->price }}">
                <label for="forPrice" class="form-label">Price</label>
            </div>
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="text" name="discount" id="forDis" class="form-control" value="{{ $product->discount }}">
                <label for="forDis" class="form-label">Discount</label>
            </div>
            @error('discount')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="number" name="qty" id="forQty" class="form-control" value="{{ $product->qty }}">
                <label for="forQty" class="form-label">Quantity</label>
            </div>
            @error('qty')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-3">
                <img src="{{ asset('storage/images/' . $product->img) }}" alt="" style="width:145px;height:150px"
                    id="blah"><br />
                <label class="form-label" for="customFile">Choose Product Image</label>
                <input type="file" class="form-control" id="customFile" name="img"
                    accept="image/jpeg,image/jpg, image/png" onchange="readURL(event);" />
            </div>


            <script>
                function readURL(input) {
                    var img_show = document.getElementById('blah');
                    img_show.src = URL.createObjectURL(event.target.files[0]);
                }
            </script>
            <input type="submit" value="Add" class="btn btn-primary btn-lg btn-block mt-3">
        </form>
    </section>
@endsection
