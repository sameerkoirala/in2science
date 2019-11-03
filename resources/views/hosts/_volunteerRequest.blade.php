<div class="modal fade top" id="RequestDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel">Which classes should I register?</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <p>You can register up to five Year 7 - 10 science, maths or STEM elective classes using this form.</p>
                    <ul>
                        <li>The more classes you register, the higher the likelihood of a match with a volunteer mentor's
                            weekly availability.</li>
                        <li>You can nominate the total number of mentors you would like to host, across all the classes you have
                            registered (e.g. max 2 mentors total across 5 potential classes).</li>
                    </ul>
                    <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Ok, thanks</a>
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<div id="classTimeForm">
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
{{--    <div class="row">--}}
{{--        <div class="col mt-4">--}}
{{--            <div class="form-group text-left">--}}
{{--                <a href="#" id="viewId" > <button type="button" class="btn btn-md badge-success" id="nextForm">View Previous Records</button></a>--}}
{{--                --}}{{--                <input class="btn badge-success" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Submit' }}">--}}
{{--                --}}{{--                <button class="btn badge-success" type="submit">{{ $formMode === 'edit' ? 'Update' : 'Next: your time' }}</button>--}}
{{--                --}}{{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
{{--                --}}{{--                <button type="submit" class="btn badge-success btn-md" id="submitRequestTime">Submit<i class="fa fa-arrow-right" aria-hidden="true"></i></button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
                {{--                <div class="col mt-4">--}}
                {{--                    <label for="firstName" class="control-label">{{ 'First Name' }}</label>--}}
                {{--                </div>--}}
                {{--                <input class="form-control" placeholder="First Name" rows="5" name="firstName" type="text" required id="firstName" value="{{ isset($host->firstName) ? $host->firstName : ''}}" >--}}
                <input class="form-control yearpicker" placeholder="Select Year" rows="5" name="year" id="year" required type="text" value="{{ isset($host->year) ? $host->year: '' }}">
                {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('semester') ? 'has-error' : ''}}">
                {{--                <label for="surname" class="control-label">{{ 'Surname' }}</label>--}}
                <select name="semester" class="form-control" id="semester" required>
                    @foreach (json_decode('{"":"--Select Semester--","1": "1", "2": "2", "3": "3", "4":"4"}', true) as $optionKey => $optionValue)
                        <option value="{{ $optionKey }}" {{ (isset($host->semester) && $host->semester == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                    @endforeach
                </select>
                {{--                <input class="form-control" placeholder="Semester" rows="5" name="semester" type="text" required id="semester" value="{{ isset($host->semester) ? $host->semester : ''}}" >--}}
                {!! $errors->first('semester', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="weekPicker">
        <div class="row justify-content-center">
            <span>Week</span>
        </div>
        <div>
            <div class="d-flex justify-content-center">
                <span class="font-weight-bold purple-text mr-2 mt-1">Week-1</span>
                <input class="border-0" type="range" min="1" max="10" style="width: 100%;" value="1" id="weekRange" onclick="setWeek()" />
                <span class="font-weight-bold purple-text ml-2 mt-1">Week-10</span>
            </div>
        </div>
        <div class="row">
            <div class="col text-right">
                {{--                <input type="button" name="prevDay" id="prevDay" rows="5" value="Previous Day" class="text-center btn-warning" onclick="oldDay();">--}}
                <button type="button" class="btn badge-light" onclick="oldWeek()"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
            </div>
            <div class="col text-center">
                <input type="text" name="week" id="week" value="Week-1" rows="5" class="text-center" readonly>
            </div>
            <div class="col text-left">
                {{--                <input type="button" name="nextDay" id="nextDay" rows="5" value="Next Day" class="text-center btn-warning" onclick="newDay();">--}}
                <button type="button" class="btn badge-light" onclick="newWeek()"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div class="dayPicker">
        <div class="row justify-content-center">
            <span>Day</span>
        </div>
        <div>
            <div class="d-flex justify-content-center">
                <span class="font-weight-bold purple-text mr-2 mt-1">Monday</span>
                <input class="border-0 dayVal" type="range" min="1" max="5" style="width: 100%;" value="1" id="dayRange" onclick="setDay()" />
                <span class="font-weight-bold purple-text ml-2 mt-1">Friday</span>
            </div>
        </div>
        <div class="row">
            <div class="col text-right">
                {{--                <input type="button" name="prevDay" id="prevDay" rows="5" value="Previous Day" class="text-center btn-warning" onclick="oldDay();">--}}
                <button type="button" class="btn badge-light dayVal" onclick="oldDay()"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
            </div>
            <div class="col text-center">
                <input type="text" name="day" id="day" rows="5" value="Monday" class="text-center" readonly>
            </div>
            <div class="col text-left">
                {{--                <input type="button" name="nextDay" id="nextDay" rows="5" value="Next Day" class="text-center btn-warning" onclick="newDay();">--}}
                <button type="button" class="btn badge-light dayVal" onclick="newDay()"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('level') ? 'has-error' : ''}}">
                <select name="level" class="form-control" id="level" required>
                    @foreach (json_decode('{"":"--Select Level--","7": "7", "8": "8", "9": "9","10":"10"}', true) as $optionKey => $optionValue)
                        <option value="{{ $optionKey }}" {{ (isset($host->level) && $host->level == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                    @endforeach
                </select>
                {!! $errors->first('level', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('section') ? 'has-error' : ''}}">
                <input class="form-control" placeholder="Section" rows="5" name="section" type="text" required id="section" value="{{ isset($host->section) ? $host->section : ''}}" >
                {!! $errors->first('section', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                <input type="text" name="subject" list = "subject" class="form-control"  required placeholder="Subject"/>
                <datalist id="subject" >
                    @foreach ($subjects as $optionKey => $optionValue)
                        <option value="{{ $optionKey }}" {{ (isset($host->subject) && $host->subject == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                    @endforeach
                </datalist>
                {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('periods') ? 'has-error' : ''}}" id="periods">
{{--                <div class="row">--}}
{{--                    <div class="col text-right">--}}
{{--                        <input type="checkbox" class="form-check-input" name="Period-1" value="Period-1-12:05-01:05"/>--}}
{{--                    </div>--}}
{{--                    <div class="col text-left">--}}
{{--                        Period-1--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <select name="subject" class="form-control" id="subject" required>--}}
{{--                    @foreach (json_decode('{"":"--Select Periods--","maths": "Maths", "science": "Science", "Elective": "Elective"}', true) as $optionKey => $optionValue)--}}
{{--                        <option value="{{ $optionKey }}" {{ (isset($host->subject1) && $host->subject1 == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}--}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('mainTopic') ? 'has-error' : ''}}">
                <textarea class="form-control" placeholder="Main Topic" rows="1" name="mainTopic" type="text" required id="mainTopic" >{{ isset($host->mainTopic) ? $host->mainTopic : ''}}</textarea>
                {!! $errors->first('mainTopic', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
                <textarea class="form-control" placeholder="Any Important Notes" rows="1" name="note" type="text" required id="note" value="{{isset($host->note) ?$host->note :''}}"></textarea>
                {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="text-center loading">
        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="row" id="addMore">
        <div class="col mt-4 text-left" id="prevHostTiming">
            <a href="{{ url('/hosts/getView/') }}" title="View Timings" id="hostTimes"><button class="btn btn-success btn-md">View Timings</button></a>
        </div>
        <div class="col mt-4">
            <div class="form-group text-center">
                {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                <button type="submit" class="btn btn-md badge-success" id="registerTeacher">Add Class</button>
            </div>
        </div>
        <div class="col mt-4 text-right" id="nextFinalForm">
            <a href="{{ url('/hosts/reasonForm/') }}" title="Final Form" id="finalForms"><button class="btn btn-success btn-md">Final Form <i class="fa fa-arrow-right" aria-hidden="true"></i></button></a>
        </div>
    </div>
</div>

