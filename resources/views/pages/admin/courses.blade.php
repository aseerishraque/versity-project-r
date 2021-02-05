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
                        <h2 class="pageheader-title">Course Offering List</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('subjects.index') }}" class="breadcrumb-link">Courses Offered</a></li>

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
                        {{--                            <a href="{{ route('subjects.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add Courses Offered</a>--}}
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#exampleModal">
                                Offer a New Courses
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Offer a New Courses </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <form class="needs-validation" action="{{ route('courses.offer') }}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="inputText3" class="col-form-label">Session</label>
                                                            <select name="session_id" class="form-control">
                                                                    <option>-- Chose a Session --</option>
                                                                @foreach($sessions as $session)
                                                                    <option value="{{ $session->id }}">{{ $session->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('session_id')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputText3" class="col-form-label">Teacher</label>
                                                            <select name="teacher_id" class="form-control">
                                                                    <option>-- Chose a Teacher --</option>
                                                                @foreach($teachers as $teacher)
                                                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('teacher_id')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputText3" class="col-form-label">Subject</label>
                                                            <select name="subject_id" class="form-control">
                                                                <option>-- Chose a Subject --</option>
                                                                @foreach($subjects as $subject)
                                                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('subject_id')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <button type="submit" class="btn btn-info">Assign</button>
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
                                        <th>Subject</th>
                                        <th>Teacher</th>
                                        <th>Session</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($courses as $course)
                                        <tr>
                                            <th>{{ $i++ }}</th>
                                            <td>{{ $course->subject }}
                                                @if(session()->has('new') && $course->id == session()->get('new'))
                                                    <span class="badge badge-secondary ml-3">New</span>
                                                @endif

                                                @if(session()->exists('update') && $course->id == session()->get('update'))
                                                    <span class="badge badge-warning ml-3 text-white">Updated</span>
                                                @endif

                                            </td>
                                            <td>{{ $course->teacher }}</td>
                                            <td>{{ $course->session }}</td>
                                            <td>
                                            {{--                                                <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a>--}}
                                            <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-lg active" data-toggle="modal" data-target="#Edit_{{ $course->id }}">
                                                    Edit
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="Edit_{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Offering : {{ $course->subject }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                        <form action="{{ route('courses.update.offer', $course->id) }}" method="post">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="form-group">
                                                                                <label for="inputText3" class="col-form-label">Session</label>
                                                                                <select name="session_id" class="form-control">
                                                                                    <option>-- Chose a Session --</option>
                                                                                    @foreach($sessions as $session)
                                                                                        @if($course->session_id == $session->id)
                                                                                            <option selected value="{{ $session->id }}">{{ $session->name }}</option>
                                                                                        @else
                                                                                            <option value="{{ $session->id }}">{{ $session->name }}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select>

                                                                                @error('session_id')
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}
                                                                                </div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="inputText3" class="col-form-label">Teacher</label>
                                                                                <select name="teacher_id" class="form-control">
                                                                                    <option>-- Chose a Teacher --</option>
                                                                                    @foreach($teachers as $teacher)
                                                                                        @if($course->teacher_id == $teacher->id)
                                                                                            <option selected value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                                                        @else
                                                                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select>

                                                                                @error('teacher_id')
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}
                                                                                </div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="inputText3" class="col-form-label">Subject</label>
                                                                                <select name="subject_id" class="form-control">
                                                                                    <option>-- Chose a Subject --</option>
                                                                                    @foreach($subjects as $subject)
                                                                                        @if($course->subject_id == $subject->id)
                                                                                            <option selected value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                                                        @else
                                                                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select>

                                                                                @error('subject_id')
                                                                                <div class="invalid-feedback d-block">
                                                                                    {{ $message }}
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
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#course_{{ $course->id }}">
                                                    Delete
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="course_{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Subject Name: {{ $course->subject }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <form action="{{ route('course.destroy.offer', $course->id) }}" method="post">
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
                                        <th>Subject</th>
                                        <th>Teacher</th>
                                        <th>Session</th>
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