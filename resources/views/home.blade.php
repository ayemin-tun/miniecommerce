@extends('layouts.master')
@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-mdb-interval="5000">
                <img src="images/slider1.jpg" class="d-block w-100" alt="Wild Landscape" style="height: 400px;" />
            </div>
            <div class="carousel-item" data-mdb-interval="5000">
                <img src="images/slider2.png" class="d-block w-100" alt="Camera" style="height: 400px;" />
            </div>
            <div class="carousel-item" data-mdb-interval="5000">
                <img src="images/slider3.png" class="d-block w-100" alt="Exotic Fruits" style="height: 400px;" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls"
            data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls"
            data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </section>
    </div>

    <section class="container">
        <div class="row mt-3">
            <h3 class="text-center ">Top Brand</h3>
            @foreach ($products as $product)
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <img src="{{ asset('storage/images/' . $product->img) }}" alt="" class="card-img-top"
                            style="height: 150px;">
                        <div class="card-body text-center">
                            <h5 class="card-title text-dark">{{ $product->product_name }}</h5>
                            <h6 class="text-dark">{{ $product->price }}-MMK</h6>
                            <a href="{{ url('detail/' . $product->id) }}" class="btn btn-primary">@lang('nav.view_detail')</a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="row mt-3">
            <h3 class="text-center ">New Brand</h3>
            @foreach ($products->reverse() as $product)
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <img src="{{ asset('storage/images/' . $product->img) }}" alt="" class="card-img-top"
                            style="height: 150px;">
                        <div class="card-body text-center">
                            <h5 class="card-title text-dark">{{ $product->product_name }}</h5>
                            <h6 class="text-dark">{{ $product->price }}-MMK</h6>
                            <a href="{{ url('detail/' . $product->id) }}" class="btn btn-primary">@lang('nav.view_detail')</a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>





        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Register</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example1" class="form-control" />
                                        <label class="form-label" for="form3Example1">First name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example2" class="form-control" />
                                        <label class="form-label" for="form3Example2">Last name</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3" class="form-control" />
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="form3Example4" class="form-control" />
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>


                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>or sign up with:</p>
                                <button type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>

                                <button type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </button>

                                <button type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
