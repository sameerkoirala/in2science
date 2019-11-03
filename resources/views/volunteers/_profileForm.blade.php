<div id="profileForm">
{{--    <div class="form-group  row {{ $errors->has('prev_participation') ? 'has-error' : ''}}">--}}
{{--        <div class="col mt-4">--}}
{{--            <label for="prev_participation" class="control-label">{{ 'Have you applied for or participated in In2science in the past?' }}</label>--}}
{{--            <div>--}}
{{--                <input name="prev_participation" type="radio" value="No" required {{ isset($volunteer->prev_participation) ? ($volunteer->prev_participation == 'No' ? 'checked' : '') : '' }} > No--}}
{{--                <input name="prev_participation" type="radio" value="Yes" required {{ isset($volunteer->prev_participation) ? ($volunteer->prev_participation == 'Yes' ? 'checked' : '') : '' }} > Yes--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        {!! $errors->first('prev_participation', '<p class="help-block">:message</p>') !!}--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col mt-0">--}}
{{--            <div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">--}}
{{--                --}}{{--                <div class="col mt-4">--}}
{{--                --}}{{--                    <label for="firstName" class="control-label">{{ 'First Name' }}</label>--}}
{{--                --}}{{--                </div>--}}
{{--                --}}{{--                <input class="form-control" placeholder="First Name" rows="5" name="firstName" type="text" required id="firstName" value="{{ isset($volunteer->firstName) ? $volunteer->firstName : ''}}" >--}}
{{--                <input class="form-control yearpicker" placeholder="Select Year" rows="5" name="year" id="year" required type="text" value="{{ isset($volunteer->year) ? $volunteer->year: '' }}">--}}
{{--                {!! $errors->first('year', '<p class="help-block">:message</p>') !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col mt-0">--}}
{{--            <div class="form-group {{ $errors->has('semester') ? 'has-error' : ''}}">--}}
{{--                --}}{{--                <label for="surname" class="control-label">{{ 'Surname' }}</label>--}}
{{--                <select name="semester" class="form-control" id="semester" required>--}}
{{--                    @foreach (json_decode('{"":"--Select Semester--","1": "1", "2": "2", "3": "3", "4":"4"}', true) as $optionKey => $optionValue)--}}
{{--                        <option value="{{ $optionKey }}" {{ (isset($volunteer->semester) && $volunteer->semester == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                --}}{{--                <input class="form-control" placeholder="Semester" rows="5" name="semester" type="text" required id="semester" value="{{ isset($volunteer->semester) ? $volunteer->semester : ''}}" >--}}
{{--                {!! $errors->first('semester', '<p class="help-block">:message</p>') !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('firstName') ? 'has-error' : ''}}">
{{--                <div class="col mt-4">--}}
{{--                    <label for="firstName" class="control-label">{{ 'First Name' }}</label>--}}
{{--                </div>--}}
                    <input class="form-control" placeholder="First Name" rows="5" name="firstName" type="text" required id="firstName" value="{{ isset($volunteer->firstName) ? $volunteer->firstName : ''}}" >
                {!! $errors->first('firstName', '<p class="help-block">:message</p>') !!}
            </div>

        </div>
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
{{--                <label for="surname" class="control-label">{{ 'Surname' }}</label>--}}
                <input class="form-control" placeholder="Surname" rows="5" name="surname" type="text" required id="surname" value="{{ isset($volunteer->surname) ? $volunteer->surname : ''}}" >
                {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                {{--                <label for="phone" class="control-label">{{ 'Mobile phone number' }}</label>--}}
                <input class="form-control" placeholder="Phone" rows="5" name="phone" type="text" required id="phone" value="{{ isset($volunteer->phone) ? $volunteer->phone : ''}}" >
                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                {{--                <label for="gender" class="control-label">{{ 'Gender' }}</label>--}}
                <select name="gender" class="form-control" id="gender" required>
                    @foreach (json_decode('{"":"--Select Gender--","Female": "Female", "Male": "Male", "Other": "Other"}', true) as $optionKey => $optionValue)
                        <option value="{{ $optionKey }}" {{ (isset($volunteer->gender) && $volunteer->gender == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                    @endforeach
                </select>
                {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
            </div>
            {{--            <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">--}}
            {{--                <label for="gender" class="control-label">{{ 'Gender' }}</label>--}}
            {{--                <div>--}}
            {{--                    <input name="gender" type="radio" value="Female" required {{ isset($volunteer->gender) ? ($volunteer->gender == 'Female' ? 'checked' : '') : '' }} > Female--}}
            {{--                    <input name="gender" type="radio" value="Male" required {{ isset($volunteer->gender) ? ($volunteer->gender == 'Male' ? 'checked' : '') : '' }} > Male--}}
            {{--                    <input name="gender" type="radio" value="Other" required {{ isset($volunteer->gender) ? ($volunteer->gender == 'Other' ? 'checked' : '') : '' }} > Other--}}
            {{--                </div>--}}
            {{--                {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}--}}
            {{--            </div>--}}
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('uniEmail') ? 'has-error' : ''}}">
{{--                <label for="uniEmail" class="control-label">{{ 'Email (university)' }}</label>--}}
                <input class="form-control" placeholder="Email (University)" rows="5" name="uniEmail" type="text" required id="uniEmail" value="{{ isset($volunteer->uniEmail) ? $volunteer->uniEmail : ''}}" >
                {!! $errors->first('uniEmail', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('pEmail') ? 'has-error' : ''}}">
{{--                <label for="pEmail" class="control-label">{{ 'Email (personal - if preferred)' }}</label>--}}
                <input class="form-control" onclick="checkMentor();" placeholder="Email (personal - if preferred)" rows="5" name="pEmail" type="text" id="pEmail" value="{{ isset($volunteer->pEmail) ? $volunteer->pEmail : ''}}" >
                {!! $errors->first('pEmail', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
{{--                <label for="address" class="control-label">{{ 'Your address (for the semester you\'d ike to participate in)' }}</label>--}}
                <input class="form-control" placeholder="Your address (for the semester you'd like to participate in)" rows="5" name="address" type="text" required id="address" >{{ isset($volunteer->address) ? $volunteer->address : ''}}</input>
                {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('ownCar') ? 'has-error' : ''}}">
                <label for="ownCar" class="control-label">{{ 'Do you have your own car?' }}</label>
                <div>
                    <input name="ownCar" type="radio" value="Yes" required {{ isset($volunteer->ownCar) ? ($volunteer->ownCar == 'Yes' ? 'checked' : '') : '' }} > Yes
                    <input name="ownCar" type="radio" value="No" required {{ isset($volunteer->ownCar) ? ($volunteer->ownCar == 'No' ? 'checked' : '') : '' }} > No
                </div>
                {!! $errors->first('ownCar', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('rideBike') ? 'has-error' : ''}}">
                <label for="rideBike" class="control-label">{{ 'Do you ride a bike(e.g. to uni)?' }}</label>
                <div>
                    <input name="rideBike" type="radio" value="Yes" required {{ isset($volunteer->rideBike) ? ($volunteer->rideBike == 'Yes' ? 'checked' : '') : '' }} > Yes
                    <input name="rideBike" type="radio" value="No" required {{ isset($volunteer->rideBike) ? ($volunteer->rideBike == 'No' ? 'checked' : '') : '' }} > No
                </div>
                {!! $errors->first('rideBike', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mt-0">
            <div class="col text-left">
                <a href="{{ url('/volunteers/time') }}" title="Availability"><button class="btn btn-success btn-md"><i class="fa fa-arrow-left" aria-hidden="true"></i> Availability</button></a>
            </div>
        </div>
        <div class="col mt-0">
            <div class="form-group">
                {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                <button type="button" class="btn badge-success" onclick="showEducationForm();" id="educationButton">Next: your education</button>
            </div>
        </div>
    </div>


</div>
