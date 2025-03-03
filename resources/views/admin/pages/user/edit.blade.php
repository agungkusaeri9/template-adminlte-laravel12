@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('users.update', $user->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class='form-group mb-3'>
                                        <label for='name' class='mb-2'>Name <span
                                                class='text-danger small'>*</span></label>
                                        <input type='text' name='name' id='name'
                                            class='form-control @error('name') is-invalid @enderror'
                                            value='{{ $user->name ?? old('name') }}'>
                                        @error('name')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class='form-group mb-3'>
                                        <label for='email' class='mb-2'>Email <span
                                                class='text-danger small'>*</span></label>
                                        <input type='text' name='email' id='email'
                                            class='form-control @error('email') is-invalid @enderror'
                                            value='{{ $user->email ?? old('email') }}'>
                                        @error('email')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class='form-group mb-3'>
                                        <label for='password' class='mb-2'>Password <span
                                                class='text-danger small'>*</span></label>
                                        <input type='text' name='password' id='password'
                                            class='form-control @error('password') is-invalid @enderror'
                                            value='{{ old('password') }}'>
                                        @error('password')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class='form-group'>
                                        <label for='role'>Role <span class='text-danger small'>*</span></label>
                                        <select name='role' id='role'
                                            class='form-control @error('role') is-invalid @enderror'>
                                            <option value='' selected disabled>Pilih Role</option>
                                            <option value='admin' {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value='user' {{ $user->role == 'user' ? 'selected' : '' }}>User
                                            </option>
                                        </select>
                                        @error('role')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
