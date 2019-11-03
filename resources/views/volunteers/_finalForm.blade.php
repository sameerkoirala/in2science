<div id="finalForm">
    <div class="row">
        <div class="col mt-0">
            <div class="row form-group {{ $errors->has('mentoringMethod') ? 'has-error' : ''}}">
                <div class="col-md-11" style="padding-right: 0;">
                    <select name="mentoringMethod" class="form-control" id="mentoringMethod" required>
                        @foreach (json_decode('{"": "--Select Method --", "In-Class mentoring": "In-Class mentoring", "Online eMentoring": "Online eMentoring", "Either" : "Either"}', true) as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}" {{ (isset($volunteer->mentoringMethod) && $volunteer->mentoringMethod == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1" style="padding: 0;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalCookie1"><i class="fa fa-question" aria-hidden="true"></i></button>
                </div>
                {!! $errors->first('mentoringMethod', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('mentoringSubject') ? 'has-error' : ''}}">
                {{--        <label for="mentoringSubject" class="control-label">{{ 'Which year 7-10 subject would you prefer to be placed in?' }}</label>--}}
                <select name="mentoringSubject" class="form-control" id="mentoringSubject" required>
                    @foreach (json_decode('{"": "--Select Subject--", "Science": "Science", "Math": "Math", "Both":"Both"}', true) as $optionKey => $optionValue)
                        <option value="{{ $optionKey }}" {{ (isset($volunteer->mentoringSubject) && $volunteer->mentoringSubject == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                    @endforeach
                </select>
                {!! $errors->first('mentoringSubject', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-check {{ $errors->has('extraCert') ? 'has-error' : ''}} mt-0">
            <div class="mt-0 text-left">{{ 'Do you have ...' }}</div>
            <div class="row ">
                <div class="col-md-2 mt-0 text-right">
                    <input name="extraCert[]" class="form-check-input" type="checkbox" value="ruralBackground" {{ isset($volunteer->extraCert) ? ($volunteer->extraCert == 'ruralBackground' ? 'checked' : '') : '' }} >
                </div>
                <div class="col-md-10 mt-0 text-left">
                    A regional or rural background
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 mt-0 text-right">
                    <input name="extraCert[]" class="form-check-input" type="checkbox" value="ruralWorkExp" {{ isset($volunteer->extraCert) ? ($volunteer->extraCert == 'ruralWorkExp' ? 'checked' : '') : '' }} >
                </div>
                <div class="col-md-10 mt-0 text-left">
                    Experience working with regional or rural communities
                </div>
            </div>
            {!! $errors->first('extraCert', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group {{ $errors->has('interest') ? 'has-error' : ''}}" style="width: 100%">
            <div class="col mt-0 text-left">
                <label for="interest" class="control-label">{{ 'Please tell us why you are interested in the in2science peer mentoring program.' }}</label>
            </div>
            <div class="col mt-0">
                <textarea class="form-control" rows="1" name="interest" type="text" required id="interest" >{{ isset($volunteer->interest) ? $volunteer->interest : ''}}</textarea>
                {!! $errors->first('interest', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group {{ $errors->has('skills') ? 'has-error' : ''}}" style="width: 100%">
            <div class="col mt-0 text-left">
                <label for="skills" class="control-label">{{ 'Please share some of the skills and qualities that you would bring to the role.' }}</label>
            </div>
            <div class="col mt-0">
                <textarea class="form-control" rows="1" name="skills" type="text" required id="skills" >{{ isset($volunteer->skills) ? $volunteer->skills : ''}}</textarea>
                {!! $errors->first('skills', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0 text-left">
            <label for="heardAbout" class="control-label">{{ 'How did you hear about us?' }}</label>
        </div>
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('heardAbout') ? 'has-error' : ''}}">
                <select name="heardAbout" class="form-control" id="heardAbout" required>
                    @foreach (json_decode('{"":"", "wordOfMouth":"Student/friend (eg word of mouth)",
                    "staff":"In2science staff (eg spoke at a lecture or via email)",
                    "academic": "University academic staff (eg lecturer)",
                        "uniWebsite": "University Website", "noticeBoard":"University Notice Board",
                        "website":"In2science website", "jobBoard":"Online Job Board",
                        "prevExp":"Previously Volunteered", "cadetship":"Cadetship", "Other":"Other"}', true) as $optionKey => $optionValue)
                        <option value="{{ $optionKey }}" {{ (isset($volunteer->heardAbout) && $volunteer->heardAbout == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                    @endforeach
                </select>
                {!! $errors->first('heardAbout', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mt-0">
            <p>By clicking Submit, you agree to the Terms of the In2science
                <a href="http://in2science.org.au/wp-content/uploads/2018/09/In2science-Privacy-Policy-v4.pdf">Privacy Policy.</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="text-left form-group">
                    {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                    <button type="button" class="btn badge-success" onclick="showEducationForm();" id="educationBack">Back</button>
            </div>
        </div>
        <div class="col mt-0">
            <div class="form-group">
                <input class="btn badge-success" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Submit' }}">
            </div>
        </div>
    </div>
</div>
<!--Modal: modalCookie-->
<div class="modal fade top" id="modalCookie1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title" id="myModalLabel">Let's get mentoring!</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
            <!--Body-->
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <p>In2science offers two mentoring methods in which mentors share their own experiences and motivations
                        for studying at university, and help relate school work to real-world examples:</p>
                    <p><b>1) In-class mentoring with metropolitan schools:</b> mentors visit a Year 7-10 science or maths class once
                        per week over a 10-week period. Mentors work under the guidance of the teacher, helping students with
                        their learning, assisting with class activities and practicals, and talking to students about STEM.</p>
                    <p><b>2) Online eMentoring with regional schools:</b> an innovative online mentoring program that connects
                        secondary students in regional and rural Victoria with eMentors studying STEM courses at university.
                        Mentors and students meet online once a week via a customised platform that allows them to share
                        resources and interact via audio, video and chat.</p>

                    <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Ok, thanks</a>
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

