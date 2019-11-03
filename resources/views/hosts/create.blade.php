@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <h2>About In2Science</h2>
                    <p>In2science places volunteer university students as peer mentors in year 7-10 science, maths
                        and STEM elective classes. The mentors act as learning coaches and role models, increasing
                        student engagement and confidence in STEM. Find out more at
                        <a href="http://in2science.org.au/get-involved/host-a-mentor/">here</a></p>
                    <p>Mentors normally visit the class once per week for up to 10 weeks.</p>
                    <div class="card-header">School and Teacher Details</div>
                    <div class="card-body">
{{--                        <a href="{{ url('/hosts') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>--}}
{{--                        <br />--}}
{{--                        <br />--}}

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/hosts') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('hosts.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
