<div id="volTimeForm2">
    <div class="form-group">
        <h6 style="color: grey;">Please advise us of your availability for mentoring during the university semester. Please ensure you note below any additional time commitments (e.g. work).</h6>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
                {{--                <div class="col mt-4">--}}
                {{--                    <label for="firstName" class="control-label">{{ 'First Name' }}</label>--}}
                {{--                </div>--}}
                {{--                <input class="form-control" placeholder="First Name" rows="5" name="firstName" type="text" required id="firstName" value="{{ isset($volunteer->firstName) ? $volunteer->firstName : ''}}" >--}}
                <input class="form-control yearpicker" placeholder="Select Year" rows="5" name="year" id="year" required type="text" value="{{ isset($volunteer->year) ? $volunteer->year: '' }}">
                {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('semester') ? 'has-error' : ''}}">
                {{--                <label for="surname" class="control-label">{{ 'Surname' }}</label>--}}
                <select name="semester" class="form-control" id="semester" required>
                    @foreach (json_decode('{"":"--Select Semester--","1": "1", "2": "2", "3": "3", "4":"4"}', true) as $optionKey => $optionValue)
                        <option value="{{ $optionKey }}" {{ (isset($volunteer->semester) && $volunteer->semester == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                    @endforeach
                </select>
                {{--                <input class="form-control" placeholder="Semester" rows="5" name="semester" type="text" required id="semester" value="{{ isset($volunteer->semester) ? $volunteer->semester : ''}}" >--}}
                {!! $errors->first('semester', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 mt-0 text-right">
            <input name="sameForAll" id="sameForAll" class="form-check-input" type="checkbox" value="sameForAll" >
        </div>
        <div class="col-md-10 mt-0 text-left">
            Same for all Days
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
    <div class="row same-time" id="prev-time">
        <div class="col-md-2 mt-0 text-right">
            <input name="sameAsPrevious" class="form-check-input" id="sameAsPrevious" type="checkbox" value="sameAsPrevious">
        </div>
        <div class="col-md-10 mt-0 text-left">
            Same as Previous
        </div>
    </div>
    <div class="time">
        <div class="row">
            <div class="col mt-4">
                <span>Start Time</span>
            </div>
            <div class="col mt-4">
                <div class="input-group">
                    <input type="text" class="form-control clockpicker startTime" name="monStartTime" id="monStartTime" value="00:00">
                    <input type="text" class="form-control clockpicker startTime" name="tueStartTime" id="tueStartTime" value="00:00">
                    <input type="text" class="form-control clockpicker startTime" name="wedStartTime" id="wedStartTime" value="00:00">
                    <input type="text" class="form-control clockpicker startTime" name="thuStartTime" id="thuStartTime" value="00:00">
                    <input type="text" class="form-control clockpicker startTime" name="friStartTime" id="friStartTime" value="00:00">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mt-4">
                <span>End Time</span>
            </div>
            <div class="col mt-4">
                <div class="input-group">
                    <input type="text" class="form-control clockpicker endTime" name="monEndTime" id="monEndTime" value="00:00">
                    <input type="text" class="form-control clockpicker endTime" name="tueEndTime" id="tueEndTime" value="00:00">
                    <input type="text" class="form-control clockpicker endTime" name="wedEndTime" id="wedEndTime" value="00:00">
                    <input type="text" class="form-control clockpicker endTime" name="thuEndTime" id="thuEndTime" value="00:00">
                    <input type="text" class="form-control clockpicker endTime" name="friEndTime" id="friEndTime" value="00:00">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="text-left">
        <div class="form-group {{ $errors->has('notes') ? 'has-error' : ''}}">
            <label for="notes" class="control-label">{{ 'Notes about your availability' }}</label>
            <textarea class="form-control" rows="1" name="notes" type="text" id="notes" >{{ isset($volunteer->notes) ? $volunteer->notes : ''}}</textarea>
            {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="row">
        <div class="col mt-4 text-left" id="prevTiming">
                <a href="{{ url('/volunteers/getView/') }}" title="View Timings" id="volunteerTimes"><button class="btn btn-success btn-md">View Timings</button></a>
        </div>
        <div class="col mt-4">
            <div class="form-group text-right">
                <input class="btn badge-success" name="save" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Submit' }}">
            </div>
        </div>
    </div>
</div>
