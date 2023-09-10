@extends('layouts.admin')
@section('content')
    <section class="container">
        @if (session()->has('errorInfo'))
            <div class="alert alert-danger mt-2 mb-2">
                {{ session()->get('errorInfo') }}
            </div>
        @endif

        <h4 class="mt-3">Update Information</h4>
        <form action="{{ route('admin_update') }}" class="mt-4" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="admin_id" value="{{ $admin->id }}">
            <div class="form-outline mt-3">
                <input type="text" name="admin_name" id="forName" class="form-control" value="{{ $admin->name }}">
                <label for="forName" class="form-label">Admin Name</label>
            </div>
            @error('admin_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="text" name="admin_email" id="foremail" class="form-control" value="{{ $admin->email }}">
                <label for="foremail" class="form-label">Admin Email</label>
            </div>
            @error('admin_email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="text" name="OldPass" id="forpass" class="form-control">
                <label for="forpass" class="form-label">Old Password</label>
            </div>
            @error('OldPass')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-outline mt-3">
                <input type="text" name="newPass" id="forpass" class="form-control">
                <label for="forpass" class="form-label">New Password</label>
            </div>
            @error('newPass')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="submit" value="Save" class="btn btn-primary btn-lg btn-block mt-3">
        </form>
    </section>
@endsection
