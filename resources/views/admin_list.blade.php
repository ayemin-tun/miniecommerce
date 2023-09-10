@extends('layouts.admin')
@section('content')
    <section class="container">
        @if (Session()->has('info'))
            <div class="alert alert-danger w-100 mt-3">
                {{ session()->get('info') }}
            </div>
        @endif

        @if (session()->has('adminInfo'))
            <div class="alert alert-success mt-2 mb-2">
                {{ session()->get('adminInfo') }}
            </div>
        @endif


        <a href="{{ url('new_admin') }}" class="btn btn-dark btn-sm mt-2">Add Admin</a>
        <table class="table align-middle mb-0 bg-white">
            <thead class="text-dark" style="font-size:18px;border-bottom: 2px solid black;">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <th>{{ $admin->name }}</th>
                        <th>{{ $admin->email }}</th>
                        <th>{{ $admin->role }}</th>
                        <th>


                            <a href="{{ url('admin/edit/' . $admin->id) }}" class="text-primary me-2">Edit</a>

                            <a href="{{ url('admin/delete/' . $admin->id) }}" class="text-danger"
                                onclick="return confirm('Are You Sure you want to delete this admin?')">Delete</a>
                        </th>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </section>
@endsection
