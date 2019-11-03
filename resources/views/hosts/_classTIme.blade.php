<div id="schoolForm">
    <div class="row">
        <div class="col mt-4">
            <div class="form-group">
                <h1>School details</h1>
            </div>
            <div class="col mt-4">
                <div class="form-group {{ $errors->has('schoolName') ? 'has-error' : ''}}">
                    {{--            <label for="mentorId" class="control-label">{{ 'Your In2Science Mentor ID' }}</label>--}}
                    <input class="form-control" placeholder="Enter your school name" rows="5" name="schoolName" type="text" required id="schoolName" value="" >
                    {!! $errors->first('schoolName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div id="classDetails">
                <div>
                    {{-- TODO: Time scroll --}}
                    <div class="row justify-content-center">
                        <span>Day</span>
                    </div>
                    <div>
                        <div class="d-flex justify-content-center">
                            <span class="font-weight-bold purple-text mr-2 mt-1">Sunday</span>
                            <input class="border-0" type="range" min="1" max="7" style="width: 100%;" value="1" id="dayRange" onclick="setDay()" />
                            <span class="font-weight-bold purple-text ml-2 mt-1">Saturday</span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col mt-4", style="margin-left: 270px">
                            <input type="text" name="day" id="day" rows="5" class="text-center" required readonly>
                        </div>
                        <div class="col mt-4", style="margin-left: 150px">
                            <input type="button" name="nextDay" id="nextDay" rows="5" value="Next Day" class="text-center btn-success" onclick="newDay();">
                        </div>
                    </div>

                            <div class="form-group mt-4 {{ $errors->has('reasons') ? 'has-error' : ''}}">
                                <div class="row">
                                    <input style="margin-left: 240px" name ="sameForAll" type="checkbox" value="sameForAll" >Same for all days <br>
                                    <input  style="margin-left: 120px" name="sameAsPrevious" type="checkbox" value="sameAsPrevious" >Same as previous <br>
                                </div>
                            </div>
                    <div class="row">
                        <div class="col mt-4">
                            <h5>Period 1</h5>
                        </div>
                        <div class="col mt-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="startTime1" id="startTime1" value="Start Time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col mt-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="endTime1" id="endTime1" value="End Time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-4">
                            <h5>Period 2</h5>
                        </div>
                        <div class="col mt-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="startTime2" id="startTime2" value="Start Time:">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col mt-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="endTime2" id="endTime2" value="End Time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-4">
                            <h5>Period 3</h5>
                        </div>
                        <div class="col mt-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="startTime3" id="startTime3" value="Start Time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col mt-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="endTime3" id="endTime3" value="End Time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-4">
                            <h5>Period 4</h5>
                        </div>
                        <div class="col mt-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="startTime4" id="startTime4" value="Start Time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col mt-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="endTime4" id="endTime4" value="End Time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-4">
                            <h5>Period 5</h5>
                        </div>
                        <div class="col mt-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="startTime5" id="startTime5" value="Start Time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col mt-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="endTime5" id="endTime5" value="End Time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-4">
                            <h5>Period 6</h5>
                        </div>
                        <div class="col mt-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="startTime6" id="startTime6" value="Start Time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col mt-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="endTime6" id="endTime6" value="End Time">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


{{-- TODO            <div>--}}
{{--                <button class="btn-success" id="addClassButton" onclick="addClass(1);">Add Class</button>--}}
{{--            </div>--}}

            <div class="row">
                <div class="col mt-4", style="margin-left: 270px">
                    <div class="form-group">
                        {{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
                        <button type="button" class="btn badge-success" onclick="showHostProfileForm();" id="hostProfileButton">Back</button>
                    </div>
                </div>
                <div class="col mt-4", style="margin-left: 150px">

                    <div class="form-group">
                        <input class="btn badge-success" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Submit' }}">
                    </div>
                </div>
            </div>
        </div>
{{--            <div class="form-group">--}}
{{--                --}}{{--    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">--}}
{{--                <button type="button" class="btn badge-success" onclick="showHostProfileForm();" id="hostProfileButton">Back</button>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <input class="btn badge-success" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Submit' }}">--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
