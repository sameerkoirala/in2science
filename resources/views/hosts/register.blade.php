@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                <div class="col text-center">
                    <div class="align-items-center">
                        <h1>Register</h1>
                    </div>
                </div>
                <div class="col text-center">
                    <div class="row align-items-center">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/hosts/saveHost') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            {{--                            @include ('volunteers.form', ['formMode' => 'create'])--}}
                            @include ('hosts._profileForm')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
