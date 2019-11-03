@extends('layouts.app')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        {{Session::forget('message')}}
    @endif
    <div class="tab-content"   >
        <div id="record"  class="tab-pane active" align="middle" >
                {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
            <h1>Update Availability Time</h1>
            <a href="{{ url('/volunteers/time') }}" title="Back"><button type="button" class="btn badge-success" id="backTimeButton">Back</button></a>
            <table class="table table-striped" style="height: 30%; width: 50% ;  "  >
                <thead>
                <tr>
                    <td>Year</td>
                    <td>Semester</td>
                    <td>Day</td>
                    <td>Start Time</td>
                    <td>End Time</td>
                    <td>Notes</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>{{$record['fields']['Year']}}</td>
                        <td>{{$record['fields']['Semester']}}</td>
                        <td>{{$record['fields']['Day']}}</td>
                        <td>{{$record['fields']['Start_Time']}}</td>
                        <td>{{$record['fields']['End_Time']}}</td>
                        <td>{{$record['fields']['Notes']}}</td>
                        <td><a href="{{ url('/volunteers/time'). '/' . $record['fields']['Mentor_ID'] }}" title="Edit"><button type="button" class="btn btn-info">edit</button></a></td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
