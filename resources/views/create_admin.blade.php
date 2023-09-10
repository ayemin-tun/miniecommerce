@extends('layouts.admin')
@section('content')
    <section class="container">
        @if (session()->has('admin'))
            <div class="alert alert-success mt-2 mb-2">
                {{ session()->get('admin') }}
            </div>
        @endif

        <form action="{{ url('admin/create') }}" class="mt-4" method="post">
            {{ csrf_field() }}
            <div class="form-outline mt-3">
                <input type="text" name="admin_name" id="forName" class="form-control">
                <label for="forName" class="form-label">Admin Name</label>
            </div>
            @error('admin_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="text" name="admin_email" id="foremail" class="form-control">
                <label for="foremail" class="form-label">Admin Email</label>
            </div>
            @error('admin_email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="password" name="password" id="forpass" class="form-control">
                <label for="forpass" class="form-label">Password</label>
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="submit" value="Save" class="btn btn-primary btn-lg btn-block mt-3">
        </form>
    </section>
@endsection
