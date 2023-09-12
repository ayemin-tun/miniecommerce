@extends('layouts.master')
@section('content')
    <section class="container mt-3">
        @if (Session()->has('info'))
            <div class="alert alert-success w-100 mt-3">
                {{ session()->get('info') }}</a>
            </div>
        @endif
        <div class="text-center">
            <h2>@lang('contact.contact_us')</h2>
            <p>Welcom To Our Website</p>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <div class="cart text-center shadow p-3 m-2">
                    <h3><i class="fa fa-phone" aria-hidden="true"></i></h3>
                    <div class="card-body">
                        <h4>@lang('contact.call_us')</h4>
                        <p>09-12345678,09-123567892</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cart text-center shadow p-3 m-2">
                    <h3><i class="fa-solid fa-location-dot" aria-hidden="true"></i></h3>
                    <div class="card-body">
                        <h4>@lang('contact.address')</h4>
                        <p>Yangon, North Dagon, No 89</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cart text-center shadow p-3 m-2">
                    <h3><i class="fa fa-envelope" aria-hidden="true"></i></h3>
                    <div class="card-body">
                        <h4>@lang('contact.mail_us')</h4>
                        <p>amtonlineshop@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cart text-center shadow p-3 m-2">
                    <h3><i class="fa-solid fa-clock" aria-hidden="true"></i></h3>
                    <div class="card-body">
                        <h3>@lang('contact.office_time')</h3>
                        <p>9:00 am ~ 5:00 pm</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.3050683189153!2d96.19292947400434!3d16.86079691776386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19357c4bce72f%3A0x7b56e187d5f41074!2sonline%20shop!5e0!3m2!1sen!2smm!4v1693490579252!5m2!1sen!2smm"
                    style="border:0;" allowfullscreen="" loading="lazy" class="w-100 border rounded" height="400px"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6 p-3">
                @if (Auth::check())
                    @if (Auth::user()->role = 'user')
                        <form action="{{ url('/user/contact') }}" method="post">
                            @csrf
                            <div class="form-outline mt-4">
                                <input type="text" name="name" id="forName" class="form-control"
                                    value="{{ Auth::user()->name }}" />
                                <label for="forName" class="form-label">Name</label>
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-outline mt-4">
                                <input type="email" name="email" id="forEmail" class="form-control"
                                    value="{{ Auth::user()->email }}">
                                <label for="forEmail" class="form-label">Email Address</label>
                            </div>
                            @error('emial')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-outline mt-4">
                                <textarea name="message" id="forMessage" cols="30" rows="6" class="form-control"></textarea>
                                <label for="forMessage" class="form-label">Message</label>
                            </div>
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <button class="btn btn-primary w-100 btn-lg mt-4">Send</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </section>
@endsection
