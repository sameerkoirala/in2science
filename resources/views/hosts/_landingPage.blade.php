<div id="hostProfileForm">
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="text-center loading">
        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="row">
        <div class="col mt-4">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {{--                <label for="email" class="control-label">{{ 'Your Email' }}</label>--}}
                <input class="form-control"placeholder="Your Email" rows="5" name="email" type="text" required id="email" value="{{ isset($host->email) ? $host->email : ''}}" >
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <h6 style="color: grey">If this is your first time for requesting Mentors then proceed to register.</h6>
    <div class="row">
        <div class="col mt-4">
            <div class="form-group text-left">
                {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                <a href="/hosts/register"><button type="button" class="btn btn-md badge-primary" id="registerTeacher">Register</button></a>
            </div>
        </div>
        <div class="col mt-4">
            <div class="form-group text-right">
                {{--                <input class="btn badge-success" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Submit' }}">--}}
                {{--                <button class="btn badge-success" type="submit">{{ $formMode === 'edit' ? 'Update' : 'Next: your time' }}</button>--}}
                {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                <button type="button" class="btn badge-success btn-md" id="hostTimeButton" onclick="validateTeacher()">Next: Request Mentor<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    {{--    <div class="form-group">--}}
    {{--        --}}{{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
    {{--        <button type="button" class="btn badge-success" onclick="showClassTimeForm();" id="classTimeButton">Register your class(es)</button>--}}
        {{--    </div>--}}
</div>
