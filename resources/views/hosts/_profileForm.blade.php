<div id="hostProfileForm">
    <div class="row">
        <div class="col mt-0">

            <div class="form-group {{ $errors->has('university') ? 'has-error' : ''}}">
                {{--        <label for="university" class="control-label">{{ 'Please select your University partner' }}</label>--}}
                <select name="university" class="form-control" id="university" required>
                    @foreach (json_decode('{"":"--Select Your University--","Latrobe": "La Trobe University", "Monash": "Monash University",
                                            "RMIT": "RMIT University", "Swinburne": "Swinburne University of Technology",
                                            "uniMelb" : "The University of Melbourne"}', true) as $optionKey => $optionValue)
                        <option value="{{ $optionKey }}" {{ (isset($host->university) && $host->university == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                    @endforeach
                </select>
                {!! $errors->first('university', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('school') ? 'has-error' : ''}}">
{{--                <label for="school" class="control-label">{{ 'Please select your school' }}</label>--}}
{{--                <select name="school" class="form-control" id="school" required>--}}
                <input type="text" name="school" list = "school" class="form-control"  required placeholder="--Select School--"/>
                <datalist id="school" >
                    @foreach ($schools as $optionKey => $optionValue)
                        <option value="{{ $optionValue }}" {{ (isset($volunteer->year12) && $volunteer->year12 == $optionKey) ? 'selected' : ''}}></option>
                    @endforeach
{{--                </select>--}}
                </datalist>
                {!! $errors->first('school', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('firstName') ? 'has-error' : ''}}">
{{--                <label for="firstName" class="control-label">{{ 'Your First Name' }}</label>--}}
                <input class="form-control" placeholder="First Name" rows="5" name="firstName" type="text" required id="firstName" value="{{ isset($host->firstName) ? $host->firstName : ''}}" >
                {!! $errors->first('firstName', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
{{--                <label for="surname" class="control-label">{{ 'Your Surname' }}</label>--}}
                <input class="form-control" placeholder="Last Name" rows="5" name="surname" type="text" required id="surname" value="{{ isset($host->surname) ? $host->surname : ''}}" >
                {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
{{--                <label for="email" class="control-label">{{ 'Your Email' }}</label>--}}
                <input class="form-control"placeholder="Your Email" rows="5" name="email" type="text" required id="email" value="{{ isset($host->email) ? $host->email : ''}}" >
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('cEmail') ? 'has-error' : ''}}">
                {{--                <label for="email" class="control-label">{{ 'Your Email' }}</label>--}}
                <input class="form-control" placeholder="Confirm Your Email" rows="5" name="cEmail" type="text" id="cEmail" value="{{ isset($host->cEmail) ? $host->cEmail : ''}}" >
                {!! $errors->first('cEmail', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
{{--                <label for="phone" class="control-label">{{ 'Your Phone Number' }}</label>--}}
                <input class="form-control" placeholder="Phone Number" rows="5" name="phone" type="text" required id="phone" value="{{ isset($host->phone) ? $host->phone : ''}}" >
                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mt-0">
            <div class="form-group text-left">
                {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                <a href="{{ url('/hosts/time') }}" title="Back"><button class="btn badge-success btn-md"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            </div>
        </div>
        <div class="col mt-0">
            <div class="form-group text-right">
                <input class="btn badge-success" type="submit" value="{{ 'Register'}}">
            </div>
        </div>
    </div>

{{--    <div class="form-group">--}}
{{--        --}}{{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
{{--        <button type="button" class="btn badge-success" onclick="showClassTimeForm();" id="classTimeButton">Register your class(es)</button>--}}
{{--    </div>--}}
</div>
