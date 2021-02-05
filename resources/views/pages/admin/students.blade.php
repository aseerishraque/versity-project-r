@extends('layouts.admin_layout')
@section('content')

    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Students List</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('students.index') }}" class="breadcrumb-link">Students</a></li>

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->

            <div class="row">
                <!-- ============================================================== -->
                <!-- data table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
{{--                            <a href="{{ route('students.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add Student</a>--}}
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#exampleModal">
                                Add Student
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add A New Student</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <form class="needs-validation" action="{{ route('students.store') }}" method="post">
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
                                                            <label for="inputPassword">Enter Password(Default Password: 123456)</label>
                                                            <input required value="123456" name="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                                                            @error('password')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputPassword">Re-Enter Password</label>
                                                            <input required value="123456" name="repass" type="password" placeholder="Password" class="form-control @error('repass') is-invalid @enderror">
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
{{--                                            <button type="button" class="btn btn-primary">Save changes</button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($students as $student)
                                        <tr>
                                            <th>{{ $i++ }}</th>
                                            <td>{{ $student->name }}
                                                @if(session()->has('new') && $student->id == session()->get('new'))
                                                    <span class="badge badge-secondary ml-3">New</span>
                                                @endif

                                                @if(session()->exists('update') && $student->id == session()->get('update'))
                                                    <span class="badge badge-warning ml-3 text-white">Updated</span>
                                                @endif

                                            </td>
                                            <td>{{ $student->username }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>
{{--                                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a>--}}
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#Edit_{{ $student->id }}">
                                                    Edit
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="Edit_{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Student: {{ $student->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                        <form action="{{ route('students.update', $student->id) }}" method="post">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="form-group">
                                                                                <label for="inputText3" class="col-form-label">Name</label>
                                                                                <input required value="{{ $student->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                                                                @error('name')
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}
                                                                                </div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="inputEmail">Email address</label>
                                                                                <input required value="{{ $student->email }}" name="email"  type="email" placeholder="name@example.com" class="form-control @error('email') is-invalid @enderror">
                                                                                @error('email')
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}
                                                                                </div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="inputText4" class="col-form-label">Username</label>
                                                                                <input required value="{{ $student->username }}" name="username" id="inputText4" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                                                                                @error('username')
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}
                                                                                </div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="inputPassword">Enter Password</label>
                                                                                <input  name="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                                                                                @error('password')
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}
                                                                                </div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="inputPassword">Re-Enter Password</label>
                                                                                <input  name="repass" type="password" placeholder="Password" class="form-control @error('repass') is-invalid @enderror">
                                                                                @error('repass')
                                                                                <div class="invalid-feedback d-block">
                                                                                    Password Mismatch
                                                                                </div>
                                                                                @enderror
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
{{--                                                                <button type="button" class="btn btn-primary">Save changes</button>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>


                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#student_{{ $student->id }}">
                                                    Delete
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="student_{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Student Name: {{ $student->name }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end data table  -->
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