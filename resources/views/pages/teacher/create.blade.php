@extends('layouts.admin_layout')
@section('content')

    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-10">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header" id="top">
                                <h2 class="pageheader-title">Add Teacher</h2>
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="{{ route('teachers.all') }}" class="breadcrumb-link">Teachers</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add Teacher</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->

                    <!-- ============================================================== -->
                    <!-- basic form  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="section-block" id="basicform">
{{--                                <h3 class="section-title">Basic Form Elements</h3>--}}
{{--                                <p>Use custom button styles for actions in forms, dialogs, and more with support for multiple sizes, states, and more.</p>--}}
                            </div>
                            <div class="card">
                                <h5 class="card-header">PLease Fill out all the information below:</h5>
{{--                                @foreach ($errors->all() as $message)--}}
{{--                                    <div class="alert alert-danger" role="alert">--}}
{{--                                       {{ $message }}--}}
{{--                                    </div>--}}

{{--                                @endforeach--}}
                                <div class="card-body">
                                    <form class="needs-validation" action="{{ route('teachers.store') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Name</label>
                                            <input required value="{{ old('name') }}"  name="name" id="validationCustom01" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name">

                                            @error('name')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                            @enderror


                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email address</label>
                                            <input required value="{{ old('email') }}" name="email" id="inputEmail" type="email" placeholder="name@example.com" class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputText4" class="col-form-label">Username</label>
                                            <input required value="{{ old('username') }}" name="username" id="inputText4" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                                            @error('username')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Enter Password</label>
                                            <input required value="{{ old('password') }}" name="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Re-Enter Password</label>
                                            <input required value="{{ old('repass') }}" name="repass" type="password" placeholder="Password" class="form-control @error('repass') is-invalid @enderror">
                                            @error('repass')
                                            <div class="invalid-feedback d-block">
                                                Password Mismatch
                                            </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic form  -->
                    <!-- ============================================================== -->

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>

@stop