@extends('layouts.app')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="tab-content"   >

        <div id="record"  class="tab-pane active" align="middle" >
            <h1>Update Mentor Request Time</h1>
            <a href="{{ url('/hosts/time') }}" title="Back"><button type="button" class="btn badge-success" id="backHostTimeButton">Back</button></a>
            <table class="table table-striped" style="height: 30%; width: 60% ;  "  >

                <thead>
                <tr>
                    <td>Year</td>
                    <td>Semester</td>
                    <td>Week</td>
                    <td>Day</td>
                    <td>Level</td>
                    <td>Section</td>
                    <td>Subject</td>
                    <td>Topic</td>
                    <td>Period</td>
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
                        <td>{{$record['fields']['Week']}}</td>
                        <td>{{$record['fields']['Day']}}</td>
                        <td>{{$record['fields']['Level']}}</td>
                        <td>{{$record['fields']['Section']}}</td>
                        <td>{{$record['fields']['Subject']}}</td>
                        <td>{{$record['fields']['Topic']}}</td>
                        <td>{{$record['fields']['Period']}}</td>
                        <td>{{$record['fields']['Start_Time']}}</td>
                        <td>{{$record['fields']['End_Time']}}</td>
                        <td>{{$record['fields']['Notes']}}</td>


                        <td><a href="{{ url('/hosts/time'). '/' . $record['fields']['Email'] }}" title="Edit"><button type="button" class="btn btn-info">edit</button></a></td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
