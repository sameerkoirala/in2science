
<!--Modal: modalCookie-->
<div class="modal fade top" id="requestMentorId" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="myModalLabel">Forgot Mentor ID</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col mt-0">
                        <div class="row form-group {{ $errors->has('requestEmail') ? 'has-error' : ''}}">
                            <div class="col-md-11" style="padding-right: 0;">
                                <input class="form-control" placeholder="University Email" rows="5" name="requestEmail" type="text" id="requestEmail" value="" >
                            </div>
                            {!! $errors->first('mentoringMethod', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal" onclick="sendForgotEmail()">Email</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<div id="volTimeForm">
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        {{Session::forget('message')}}
    @endif
    <div class="text-center loading">
        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="row">
        <div class="col mt-4" style="padding-top: 10px">
            <h6 >Please enter your In2Science ID </h6>

        </div>
        <div class="col mt-4">
            <div class="form-group {{ $errors->has('mentorId') ? 'has-error' : ''}}">
                {{--            <label for="mentorId" class="control-label">{{ 'Your In2Science Mentor ID' }}</label>--}}
                <input class="form-control" placeholder="Your In2Science Mentor ID" rows="5" name="mentorId" type="text" required id="mentorId" value="{{ isset($volunteer->mentorId) ? $volunteer->mentorId : ''}}" >
                {!! $errors->first('mentorId', '<p class="help-block">:message</p>') !!}

            </div>
        </div>
    </div>
    <h6 style="color: grey">See In2science emails or contact your In2science Coordinator (Upto 4 letters)</h6>
    <div class="row">
        <div class="col mt-4">
            <div class="form-group">
                {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#requestMentorId">Forgot Mentor ID</button>
            </div>
        </div>
        <div class="col mt-4">
            <div class="form-group">
                {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                <a href="/volunteers/create"><button type="button" class="btn btn-md badge-primary" id="registerVolunteer">Register</button></a>
            </div>
        </div>
        <div class="col mt-4">
            <div class="form-group">
{{--                <input class="btn badge-success" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Submit' }}">--}}
{{--                <button class="btn badge-success" type="submit">{{ $formMode === 'edit' ? 'Update' : 'Next: your time' }}</button>--}}
                {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                <button type="button" class="btn badge-success btn-md" id="timeButton" onclick="validateVolunteer()">Next: your time</button>
            </div>
        </div>
    </div>
</div>
