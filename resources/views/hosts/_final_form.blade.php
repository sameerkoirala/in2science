<div id="requestFinalForm">
    <input type="hidden" name="email" value="{{$email}}">
    <div class="form-group {{ $errors->has('maxMentor') ? 'has-error' : ''}}">
        <label for="maxMentor" class="control-label">{{ 'Max number of mentors you would be happy to host overall?' }}</label>
        <select name="maxMentor" class="form-control" id="maxMentor" required>
            @foreach (json_decode('{"many": "As many as possible (i.e. one for each class above)", "one": "One total",
                                    "two": "Two total", "three": "Three total", "four": "Four total"}' , true) as $optionKey => $optionValue)
                <option value="{{ $optionKey }}" {{ (isset($host->maxMentor) && $host->maxMentor == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
            @endforeach
        </select>
        <h6 class="mt-2">For example: 2 mentors total (across the 5 class options you registered above)</h6>
        {!! $errors->first('maxMentor', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group mt-4 {{ $errors->has('reasons') ? 'has-error' : ''}}">
        <label style="font-size: medium;" for="reasons" class="control-label"><b>{{ ' Your main reason(s) for requesting In2science mentors '}}</b></label><br>
        <div style="text-align: left">
            <input  name="reasons" type="checkbox" value="extraHands"
                {{ isset($host->reasons) ? ($host->reasons == 'extraHands' ? 'checked' : '') : '' }} >
            An extra pair of hands to help in the classroom<br>
            <input name="reasons" type="checkbox" value="improveLearning"
                {{ isset($host->reasons) ? ($host->reasons == 'improveLearning' ? 'checked' : '') : '' }} >
            To improve the learning of a specific group of students (e.g. low/high ability)<br>
            <input name="reasons" type="checkbox" value="improveEngagement"
                {{ isset($host->reasons) ? ($host->reasons == 'improveEngagement' ? 'checked' : '') : '' }} >
            To improve my students' engagement with science/maths content<br>
            <input name="reasons" type="checkbox" value="roleModel"
                {{ isset($host->reasons) ? ($host->reasons == 'roleModel' ? 'checked' : '') : '' }} >
            To act as a role model for my students to consider University as an option<br>
            <input name="reasons" type="checkbox" value="latestResearch"
                {{ isset($host->reasons) ? ($host->reasons == 'latestResearch' ? 'checked' : '') : '' }} >
            To hear about some of the latest research happening at their University<br>
        </div>
        {!! $errors->first('reasons', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="row">
        <div class="col mt-4">
            <a href="{{ url('/hosts/time') .'/'.$email }}" title="back"> <button type="button" class="btn btn-md badge-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</button></a>
        </div>
        <div class="col mt-4">
            <div class="form-group text-right">
                {{--                <input class="btn badge-success" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Submit' }}">--}}
                {{--                <button class="btn badge-success" type="submit">{{ $formMode === 'edit' ? 'Update' : 'Next: your time' }}</button>--}}
                {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                <button type="submit" class="btn badge-success btn-md">Submit</button>
            </div>
        </div>
    </div>
</div>
