<div id="educationForm">
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('university') ? 'has-error' : ''}}">
{{--                <label for="university" class="control-label">{{ 'Your Current University' }}</label>--}}
                <div>
                    {{--            <label for="mainCampus" class="control-label">{{ 'Your main campus' }}</label>--}}
                    <select name="university" class="form-control" id="university" onchange="loadCampus();" required>
                        @foreach ($universities as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}" {{ (isset($volunteer->university) && $volunteer->university == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('university', '<p class="help-block">:message</p>') !!}
                    {{--            <input name="university" type="radio" value="LTU" onclick="updateCampus();" required {{ isset($volunteer->university) ? ($volunteer->university == 'LTU' ? 'checked' : '') : '' }} > La Trobe University--}}
                    {{--            <input name="university" type="radio" value="Monash" onclick="updateCampus();" required {{ isset($volunteer->university) ? ($volunteer->university == 'Monash' ? 'checked' : '') : '' }} > Monash University--}}
                    {{--            <input name="university" type="radio" value="RMIT" onclick="updateCampus();" required {{ isset($volunteer->university) ? ($volunteer->university == 'RMIT' ? 'checked' : '') : '' }} > RMIT University--}}
                    {{--            <input name="university" type="radio" value="Swinburne" onclick="updateCampus();" required {{ isset($volunteer->university) ? ($volunteer->university == 'Swinburne' ? 'checked' : '') : '' }} > Swinburne University of Technology--}}
                    {{--            <input name="university" type="radio" value="UniMelbourne" onclick="updateCampus();" required {{ isset($volunteer->university) ? ($volunteer->university == 'UniMelbourne' ? 'checked' : '') : '' }} > The University of Melbourne--}}
                </div>
                {!! $errors->first('university', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('mainCampus') ? 'has-error' : ''}}">
                {{--            <label for="mainCampus" class="control-label">{{ 'Your Main Campus' }}</label>--}}
                <select name="mainCampus" class="form-control" id="mainCampus" required>
                    <option value="">--Select Main Campus--</option>
{{--                    @foreach ($mainCampuses as $optionKey => $optionValue)--}}
{{--                        <option value="{{ $optionKey }}" {{ (isset($volunteer->mainCampus) && $volunteer->mainCampus == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>--}}
{{--                    @endforeach--}}
                </select>
                {!! $errors->first('mainCampus', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('studId') ? 'has-error' : ''}}">
                <div>

{{--                    <label for="studId" class="control-label">{{ 'University student ID' }}</label>--}}
                    <input class="form-control" placeholder="University Student ID" row="5" name="studId" type="text" required id="studId" value="{{ isset($volunteer->studId) ? $volunteer->studId : ''}}" >
                    {!! $errors->first('studId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </div>
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('degreeYear') ? 'has-error' : ''}}">
{{--                <label for="degreeYear" class="control-label">{{ 'Which year did you commence this degree?' }}</label>--}}
                <input class="yearpicker form-control" placeholder="Degree Commence Year" rows="5" name="degreeYear" type="text" required id="degreeYear" value="{{ isset($volunteer->degreeYear) ? $volunteer->degreeYear : ''}}" >
                {!! $errors->first('degreeYear', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">

            <div class="form-group {{ $errors->has('degree') ? 'has-error' : ''}}">
{{--                <label for="degree" class="control-label">{{ 'Degree' }}</label>--}}
                <input class="form-control" placeholder="Which Degree are you pursuing currently?" rows="5" name="degree" type="text" required id="degree" value="{{ isset($volunteer->degree) ? $volunteer->degree : ''}}" >
                {!! $errors->first('degree', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('major') ? 'has-error' : ''}}">
{{--                <label for="major" class="control-label">{{ 'Major(s)' }}</label>--}}
                <input class="form-control" placeholder="Major(s)" rows="5" name="major" type="text" required id="major" value="{{ isset($volunteer->major) ? $volunteer->major : ''}}" >
                {!! $errors->first('major', '<p class="help-block">:message</p>') !!}
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col mt-0">

            <div class="form-group {{ $errors->has('year12') ? 'has-error' : ''}}">
{{--                <label for="major" class="control-label">{{ 'Which high school did you attend for year 12?' }}</label>--}}
{{--                <input class="form-control" placeholder="Which high school did you attend for year 12?"rows="5" name="year12" type="text" required id="year12" value="{{ isset($volunteer->year12) ? $volunteer->year12 : ''}}" >--}}
{{--                <select name="year12" class="form-control" id="year12" required>--}}
                <input type="text" name="year12" list = "year12" class="form-control"  required placeholder="--Select School--"/>
                <datalist id="year12" >
                    @foreach ($schools as $optionKey => $optionValue)
                        <option value="{{ $optionKey }}" {{ (isset($volunteer->year12) && $volunteer->year12 == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                    @endforeach
{{--                </select>--}}
                </datalist>
                {!! $errors->first('year12', '<p class="help-block">:message</p>') !!}
                <h6 style="color: grey">If you attended an overseas high school, please enter 'Overseas - COUNTRY'</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0 text-left">
            <div class="form-group {{ $errors->has('mentorOldSchool') ? 'has-error' : ''}}">
                <label for="mentorOldSchool" class="control-label">{{ 'Would you consider mentoring at your old school?' }}</label>
                <div class="row">
                    <div class="col mt-0">
                        <input name="mentorOldSchool" type="radio" value="Yes" required {{ isset($volunteer->mentorOldSchool) ? ($volunteer->mentorOldSchool == 'Yes' ? 'checked' : '') : '' }} > Yes
                    </div>
                    <div class="col mt-0">
                        <input name="mentorOldSchool" type="radio" value="No" required {{ isset($volunteer->mentorOldSchool) ? ($volunteer->mentorOldSchool == 'No' ? 'checked' : '') : '' }} > No
                    </div>
                    <div class="col mt-0">
                        <input name="mentorOldSchool" type="radio" value="NA in VIC" required {{ isset($volunteer->mentorOldSchool) ? ($volunteer->mentorOldSchool == 'Other' ? 'checked' : '') : '' }} > N/A in Victoria
                    </div>
                </div>
                {!! $errors->first('mentorOldSchool', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-0">
            <div class="form-group {{ $errors->has('year12_Subjects') ? 'has-error' : ''}}">
{{--                <label for="major" class="control-label">{{ 'Which subjects did you complete in Year 11/12?' }}</label>--}}
                <input class="form-control" placeholder="Subjects completed in Year 11/12" row="5" name="year12_Subjects" type="text" required id="year12_Subjects" value="{{ isset($volunteer->subjects) ? $volunteer->subjects : ''}}" >
{{--                <textarea class="form-control" placeholder="" rows="5" name="year12" type="text" required id="year12" >{{ isset($volunteer->year12) ? $volunteer->year12 : ''}}</textarea>--}}
                {!! $errors->first('year12_Subjects', '<p class="help-block">:message</p>') !!}
                <h6 style="color: grey">Please include non-science/maths subjects - we love these too!</h6>
            </div>
        </div>
    </div>
    <div class="row">
         <div class="col mt-0">
             <div class="text-left">
                 <div class="form-group">
                     {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                     <button type="button" class="btn badge-success" onclick="showProfileForm();" id="profileBack">Back</button>
                 </div>
             </div>

         </div>
        <div class="col mt-0">


            <div class="form-group">
                {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                <button type="button" class="btn badge-success" onclick="showFinalForm();" id="finalButton">On to the final Step!</button>
            </div>
        </div>
    </div>
</div>
