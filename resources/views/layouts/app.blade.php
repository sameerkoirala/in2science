<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>In2Science</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('jquery-ui-1.12.1/jquery-ui.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
{{--    <link href="{{ asset('css/bootstrap.min.css') }}">--}}
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('css/yearpicker.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        /*.ui-datepicker-calendar {*/
        /*    display: none;*/
        /*}*/
        .layers-link {
            background-image: {{ asset('img/footer.png') }};
            background-repeat: no-repeat;
        }
        body {background-color: #eaeaea;}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: lightblue">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" height="80px"></a>
            <div class="container">

{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    In2Science--}}
{{--                </a>--}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
{{--                        @if(!Auth::check())--}}
{{--                            <li><a class="nav-link" href="{{ url('/login') }}">Login</a></li>--}}
{{--                            <li><a class="nav-link" href="{{ url('/register') }}">Register</a></li>--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ url('/logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        Logout--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endif--}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}" async>
    </script>
    <script src="{{ asset('js/bootstrap-clockpicker.min.js') }}">
    </script>
{{--    <script src="{{ asset('jquery-ui-1.12.1/jquery-ui.js') }}">--}}

{{--    --}}{{--    <script src="{{ asset('js/yearpicker.js') }}" async>--}}
{{--    --}}{{--    </script>--}}
{{--    </script>--}}
    <script type="application/javascript">
        $(document).ready(function () {

            showProfileForm();
            showHostProfileForm();
            showTimeForm();
            $('#addClassButton').removeAttr("disabled","disabled");


            // $('.yearpicker').yearpicker({
            //     year:null,
            //     template: '<div class="yearpicker-container">' +
            //         '<div class="yearpicker-header">' +
            //         '<div class="yearpicker-prev" data-view="yearpicker-prev">&lsaquo;</div>' +
            //         '<div class="yearpicker-current" data-view="yearpicker-current">SelectedYear</div>' +
            //         '<div class="yearpicker-next" data-view="yearpicker-next">&rsaquo;</div>' +
            //         '</div>' +
            //         '<div class="yearpicker-body">' +
            //         '<ul class="yearpicker-year" data-view="years">' +
            //         '</ul>' +
            //         '</div>' +
            //         '</div>',
            //
            // });
            $dateToday = new Date();
            $('.yearpicker').datepicker({
                format: "yyyy",
                minViewMode: 2,
                minDate: $dateToday.getFullYear(),
                autoclose: true
            });
            // $('#year').attr("placeholder","Select Year");

            $('.clockpicker').clockpicker({
                donetext: 'Done'
            });


            {{--$( '#' ).autocomplete({--}}

            {{--    source: function(request, response) {--}}
            {{--        $.ajax({--}}
            {{--            url: "{{url('hosts/schools')}}",--}}
            {{--            data: {--}}
            {{--                // term : request.term--}}
            {{--            },--}}
            {{--            dataType: "json",--}}
            {{--            success: function(data){--}}
            {{--                let resp = $.map(data,function(obj){--}}
            {{--                    console.log(obj.city_name);--}}
            {{--                    // return obj.name;--}}
            {{--                });--}}

            {{--                response(resp);--}}
            {{--            }--}}
            {{--        });--}}
            {{--    },--}}
            {{--    minLength: 1--}}
            {{--});--}}
            // loadSchools();
            $('#educationButton').removeAttr('disabled');
            // $('.dayPicker').show();

            // $('#prevDay').removeAttr("disabled","disabled");
            // $('#nextDay').removeAttr("disabled","disabled");
            $('.loading').hide();
            $('#dayPicker').show();
            $('#sameForAll').change(function(){
                if ($(this).is(':checked')) {
                    $('.dayPicker').hide();
                    $("#sameAsPrevious").prop("checked", false);
                    hideTimeInput();
                    showMonTime();
                    clearPrevTime();
                    clearDayPicked();
                    $('#prev-time').hide();
                    $('.time').show();
                } else {
                    $("#sameAsPrevious").prop("checked", false);
                    $('.dayPicker').show();
                    $('.time').hide();
                }
            });
            $('#sameAsPrevious').change(function(){
                if ($(this).is(':checked')) {
                    populatePrevTime();
                } else {
                    clearPrevTime();
                }
            });
            $('#prev-time').hide();
            // $('#dayRange').removeAttr("disabled","disabled");
            $('.time').hide();
        });
        let selectedPeriods = [];

        function populatePrevTime() {
            const day = $('#day').val();
            switch (day) {
                case 'Tuesday':
                    $('#tueStartTime').val($('#monStartTime').val());
                    $('#tueEndTime').val($('#monEndTime').val());
                    break;
                case 'Wednesday':
                    $('#wedStartTime').val($('#tueStartTime').val());
                    $('#wedEndTime').val($('#tueEndTime').val());
                    break;
                case 'Thursday':
                    $('#thuStartTime').val($('#wedStartTime').val());
                    $('#thuEndTime').val($('#wedEndTime').val());
                    break;
                case 'Friday':
                    $('#friStartTime').val($('#thuStartTime').val());
                    $('#friEndTime').val($('#thuEndTime').val());
                    break;
                default:
                    alert('Unable to process the previous day. Refresh the page and try again.');
            }
        }

        function clearPrevTime() {
            const day = $('#day').val();

            switch (day) {
                case 'Tuesday':
                    $('#tueStartTime').val('00:00');
                    $('#tueEndTime').val('00:00');
                    break;
                case 'Wednesday':
                    $('#wedStartTime').val('00:00');
                    $('#wedEndTime').val('00:00');
                    break;
                case 'Thursday':
                    $('#thuStartTime').val('00:00');
                    $('#thuEndTime').val('00:00');
                    break;
                case 'Friday':
                    $('#friStartTime').val('00:00');
                    $('#friEndTime').val('00:00');
                    break;
                case 'Monday':
                    break;
                case ' ':
                    break;
                default:
                    alert('Unable to process the previous day. Refresh the page and try again.');
            }
        }

        function hideTimeInput() {
            $('#monStartTime').hide();
            $('#tueStartTime').hide();
            $('#wedStartTime').hide();
            $('#thuStartTime').hide();
            $('#friStartTime').hide();
            $('#monEndTime').hide();
            $('#tueEndTime').hide();
            $('#wedEndTime').hide();
            $('#thuEndTime').hide();
            $('#friEndTime').hide();
        }

        function showTimeInput() {
            $('.time').show();
            const day = $('#day').val();
            // alert(day);
            switch(day) {
                case 'Monday':
                    hideTimeInput();
                    showMonTime();
                    $('.same-time').hide();
                    break;
                case 'Tuesday':
                    hideTimeInput();
                    showTueTime();
                    $('.same-time').show();
                    break;
                case 'Wednesday':
                    hideTimeInput();
                    showWedTime();
                    $('.same-time').show();
                    break;
                case 'Thursday':
                    hideTimeInput();
                    showThuTime();
                    $('.same-time').show();
                    break;
                case 'Friday':
                    hideTimeInput();
                    showFriTime();
                    $('.same-time').show();
                    break;
            }
        }
        function showMonTime() {
            $('#monStartTime').show();
            $('#monEndTime').show();
        }

        function showTueTime() {
            $('#tueStartTime').show();
            $('#tueEndTime').show();
        }

        function showWedTime() {
            $('#wedStartTime').show();
            $('#wedEndTime').show();
        }

        function showThuTime() {
            $('#thuStartTime').show();
            $('#thuEndTime').show();
        }

        function showFriTime() {
            $('#friStartTime').show();
            $('#friEndTime').show();
        }

        function hideMonTime() {
            $('#monStartTime').hide();
            $('#monEndTime').hide();
        }
        function hideTueTime() {
            $('#tueStartTime').hide();
            $('#tueEndTime').hide();
        }
        function hideWedTime() {
            $('#wedStartTime').hide();
            $('#wedEndTime').hide();
        }
        function hideThuTime() {
            $('#thuStartTime').hide();
            $('#thuEndTime').hide();
        }
        function hideFriTime() {
            $('#friStartTime').hide();
            $('#friEndTime').hide();
        }

        function clearDayPicked() {
            $('.startTime').val('00:00');
            $('.endTime').val('00:00');
            $('#day').val('');
            $('#dayRange').val("1");
        }

        function validateVolunteer() {
            // alert('here');
            const mentorId = $('#mentorId').val();
            if (mentorId !== ''){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    /* the route pointing to the post function */
                    url: '/volunteers/getVolunteer',
                    type: 'GET',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        mentorId: mentorId
                    },
                    beforeSend: function(){
                        $('.loading').show();
                        $("#prevTiming").hide();
                    },
                    complete: function(){
                        $('.loading').hide();
                    },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {

                        console.log(data);
                        if (data.exist === "true"){
                            showTimeForm2(mentorId);
                            if(data.prevExist === "true"){
                                $url = $('#volunteerTimes').attr("href");
                                $newUrl = $url + '/' + mentorId;
                                $('#volunteerTimes').attr("href",$newUrl);
                                $("#prevTiming").show();
                            }
                        } else {
                            alert('No such mentor exist in the system. Please register first.');
                        }
                    },
                    error: function (e) {
                        alert('Error on validating Mentor Id. Please refresh and try again.');
                        console.log(e);
                    }
                });
            }
            else{
                alert('Mentor Id cannot be null');
            }
        }

        function sendForgotEmail() {
            // alert('here');
            const email = $('#requestEmail').val();
            if (email !== ''){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    /* the route pointing to the post function */
                    url: '/send-mail/forgot/' + email + '/0',
                    type: 'GET',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        email: email,
                        type: 'forgot',
                        id: '0'
                    },
                     dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        // $.each(data, function (i,s) {
                        //     console.log(s.fields);
                        // })
                        // alert('here');

                        console.log(data);
                        alert('Mail Sent');
                        {{--const val = "{{url('/volunteers/')}}" + '/' + mentorId;--}}
                        // $('#timeForm').attr("action",val);
                        // console.log(val);
                        $('#requestEmail').val('');
                    },
                    error: function (e) {
                        console.log(e);
                        alert('Unable to send Mail. Please try again later.');
                    }
                });
            }
            else{
                alert('Email cannot be null.');
            }
        }

        {{--function getRequestsCount() {--}}
        {{--    const email = $('#email').val();--}}
        {{--    if (email !== ''){--}}
        {{--        $.ajaxSetup({--}}
        {{--            headers: {--}}
        {{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--            }--}}
        {{--        });--}}

        {{--        $.ajax({--}}
        {{--            /* the route pointing to the post function */--}}
        {{--            url: '/hosts/getViewCount',--}}
        {{--            type: 'GET',--}}
        {{--            /* send the csrf-token and the input to the controller */--}}
        {{--            data: {--}}
        {{--                email: email--}}
        {{--            },--}}
        {{--            beforeSend: function(){--}}
        {{--                $('.loading').show();--}}
        {{--            },--}}
        {{--            complete: function(){--}}
        {{--                $('.loading').hide();--}}
        {{--            },--}}
        {{--            dataType: 'JSON',--}}
        {{--            /* remind that 'data' is the response of the AjaxController */--}}
        {{--            success: function (data) {--}}
        {{--                console.log(data);--}}
        {{--                if(data.size !== 0){--}}
        {{--                    const url = "http://localhost:8080/hosts/getView/"+email;--}}
        {{--                        var X = setTimeout(function(){--}}
        {{--                            window.location.replace(url);--}}
        {{--                            return true;--}}
        {{--                        },300);--}}

        {{--                        if( window.location = url ){--}}
        {{--                            clearTimeout(X);--}}
        {{--                            return true;--}}
        {{--                        } else {--}}
        {{--                            if( window.location.href = url ){--}}
        {{--                                clearTimeout(X);--}}
        {{--                                return true;--}}
        {{--                            }else{--}}
        {{--                                clearTimeout(X);--}}
        {{--                                window.location.replace(url);--}}
        {{--                                return true;--}}
        {{--                            }--}}
        {{--                        }--}}
        {{--                        return false;--}}

        {{--                } else{--}}
        {{--                    --}}
        {{--                }--}}
        {{--                --}}{{--                        const val = "{{url('/volunteers/')}}" + '/' + mentorId;--}}
        {{--                // $('#timeForm').attr("action",val);--}}
        {{--                // console.log(val);--}}
        {{--            },--}}
        {{--            error: function (e) {--}}
        {{--                console.log(e);--}}
        {{--            }--}}
        {{--        });--}}
        {{--    }--}}
        {{--    else{--}}
        {{--        alert('Mentor Id cannot be null');--}}
        {{--    }--}}
        {{--}--}}

        function clear(){
            $('#level').val($('#level option[selected]').val());
            $('#section').val('');
            $('#subject').val($('#subject option[selected]').val());
        }

        function validateTeacher() {
            // alert('here');
            const email = $('#email').val();
            if (email !== ''){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    /* the route pointing to the post function */
                    url: '/hosts/getTeacher',
                    type: 'GET',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        email: email
                    },
                    beforeSend: function(){
                        $('.loading').show();
                        $("#prevHostTiming").hide();
                    },
                    complete: function(){
                        $('.loading').hide();
                    },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        // $.each(data, function (i,s) {
                        //     console.log(s.fields);
                        // })
                        // alert('here');
                        console.log(data);
                        // const classess = data.selected;
                        if (data.exist !== 'false'){
                            // $('#viewID').attr("href","/hosts/getView/"+email);
                            showClassTimeForm2(email);
                            if(data.selected > 0){
                                $url = $('#hostTimes').attr("href");
                                $newUrl = $url + '/' + email;
                                $('#hostTimes').attr("href",$newUrl);

                                $url = $('#finalForms').attr("href");
                                $newUrl = $url + '/' + email;
                                $('#finalForms').attr("href",$newUrl);
                                $("#prevHostTiming").show();
                            }
                            // $('#email').val(email);
                            // alert($(viewId).attr("href"));
                            // getPeriods();
                        } else {
                            alert('No such record exist in the system. Please, register first.')
                        }
                        // $('#selectedClass').val(data.selected.toString());
                        // if (data.exist !== 'false'){
                        //     showClassTimeForm();
                        //     $('#email').val(email);
                        //     getPeriods();
                        // } else {
                        //     alert('No such record exist in the system. Please, register first.')
                        // }
{{--                        const val = "{{url('/volunteers/')}}" + '/' + mentorId;--}}
                        // $('#timeForm').attr("action",val);
                        // console.log(val);
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            }
            else{
                alert('Mentor Id cannot be null');
            }
        }

        function addMore() {
            const email = $('#email').val();
            const week = $('#week').val();
            const day = $('#day').val();
            const level = $('#level').val();
            const periods = selectedPeriods;
            alert(periods);
            const subject = $('#subject').val();
            // const period1 = $('#Period-1').val();
            // const period2 = $('#Period-2').val();
            // const period3 = $('#Period-3').val();
            // const period4 = $('#Period-4').val();
            // const period5 = $('#Period-5').val();
            // const period6 = $('#Period-6').val();
            const mainTopic = $('#mainTopic').val();
            const note = $('#note').val();
            if (email !== ''){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    /* the route pointing to the post function */
                    url: '/hosts/saveClass',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {
                        email: email,
                        week: week,
                        day: day,
                        level: level,
                        section: section,
                        subject: subject,

                        periods: periods,
                        // period1: period1,
                        // period2: period2,
                        // period3: period3,
                        // period4: period4,
                        // period5: period5,
                        // period6: period6,
                        mainTopic: mainTopic,
                        note: note
                    },
                    beforeSend: function(){
                        $('#addMore').hide();
                    },
                    complete: function(){
                        $('#addMore').show();
                    },
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        // $.each(data, function (i,s) {
                        //     console.log(s.fields);
                        // })
                        // alert('here');
                        console.log(data);
                        // showClassTimeForm(data.teacher);
                        // $('#email').val(email);
                        // // const classess = data.selected;
                        //
                        // $('#selectedClass').val(data.selected.toString());
                        // getPeriods();
                        {{--                        const val = "{{url('/volunteers/')}}" + '/' + mentorId;--}}
                        // $('#timeForm').attr("action",val);
                        // console.log(val);
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            }
            else{
                alert('Mentor Id cannot be null');
            }
        }

        function loadCampus() {
           const university =  $('#university').val();
           let val = '';
           switch (university) {
               case 'Latrobe':
                   const latrobe = ["LTU-Bundoora","LTU-Bendigo","LTU-City"];
                   for (let i = 0; i < latrobe.length; i++) {
                       val = val + '<option value="' + latrobe[i] + '">' + latrobe[i] + '</option>';
                   }
                   break;
               case 'Monash':
                   const monash = ["Monash-Caulfield","Monash-City","Monash-Clayton","Monash-Parkville","Monash-Peninsula"];

                   for (let i = 0; i < monash.length; i++) {
                       val = val + '<option value="' + monash[i] + '">' + monash[i] + '</option>';
                   }
                   break;
               case 'rmit':
                   const rmit = ["RMIT-City","RMIT-Bundoora","RMIT-Bundoora/City","RMIT-Online/City"];
                   for (let i = 0; i < rmit.length; i++) {
                       val = val + '<option value="' + rmit[i] + '">' + rmit[i] + '</option>';
                   }
                   break;
               case 'Swinburne':
                   const swinburne = ["Swinburne-Hawthorne"];
                   for (let i = 0; i < swinburne.length; i++) {
                       val = val + '<option value="' + swinburne[i] + '">' + swinburne[i] + '</option>';
                   }
                   break;
               case 'unimelb':
                   const uniMelb = ["UOM-Parkville","UOM-Burnley","UOM-Burnley/Parkville","UOM-Creswick","UOM-Creswick/Parkville","UOM-Dookie","UOM-Werribee"];
                   for (let i = 0; i < uniMelb.length; i++) {
                       val = val + '<option value="' + uniMelb[i] + '">' + uniMelb[i] + '</option>';
                   }
                   break;
               default:
                   alert('Select one of the University');
           }
            $('#mainCampus').empty();
            $('#mainCampus').append(val);
        }
        function checkMentor() {
            // alert('here');
            $email = $('#uniEmail').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                /* the route pointing to the post function */
                url: '/volunteers/checkVolunteer',
                type: 'GET',
                data: {email:$email},
                /* send the csrf-token and the input to the controller */
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    if(data['exist'] === 'true'){
                        alert('Record with ' + $email + ' already exist. Please proceed to availability form');
                        $('#educationButton').attr('disabled','disabled');
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }
        function getPeriods() {
            selectedPeriods = [];
            $email = $('#email').val();
            if (typeof $email === 'undefined') {
                $email = $('#newEmail').val();
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                /* the route pointing to the post function */
                url: '/hosts/getPeriods',
                type: 'GET',
                data: {email:$email},
                /* send the csrf-token and the input to the controller */
                dataType: 'JSON',
                beforeSend: function(){
                    $('.dayVal').attr("disabled","disabled");
                },
                complete: function(){
                    $('.dayVal').removeAttr("disabled","");
                },
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    // if(data['exist'] === 'true'){
                    //     alert('Record with ' + $email + ' already exist. Please proceed to availability form');
                    // }
                    console.log(data);
                    //     $('#educationButton').attr('disabled','disabled');
                    const container = document.getElementById('periods');


                    console.log(data.period1);

                    container.innerHTML = "";


                    if (typeof(data.period1) !== "undefined"){
                        var input = document.createElement("INPUT");
                        input.type= 'checkbox';
                        input.name= 'periods[]';
                        input.value= data.period1 + '_' + data.p1Start + '_' + data.p1End;
                        input.id = data.period1;
                        input.classList.add("form-control");
                        input.onclick = function(){
                            if(input.checked){
                                selectedPeriods.push('P1');
                            }
                        };
                        // container.appendChild(input);

                        var mainDiv = document.createElement("div");
                        mainDiv.classList.add("row");
                        var inputDiv = document.createElement("div");
                        inputDiv.classList.add("col");
                        inputDiv.classList.add("text-right");
                        var labelDiv = document.createElement("div");
                        labelDiv.classList.add("col");
                        labelDiv.classList.add("text-left");

                        var label = document.createTextNode(data.period1 + '(Start: ' + data.p1Start + ', End: ' + data.p1End + ')');

                        inputDiv.appendChild(input);
                        labelDiv.appendChild(label);
                        mainDiv.appendChild(labelDiv);
                        mainDiv.insertBefore(inputDiv,labelDiv);
                        container.appendChild(mainDiv);

                        // const h = '<div class="row">' +
                        //                 '<div class="col text-right">';
                        // const inut =       '<input type="checkbox" onclick="setAttr(#' + data.period1 + ')" class="form-check-input" name=periods[] id="'+data.period1+'" value="'+data.period1+'-'+data.p1Start+'-'+data.p1End + '"/>';
                        // const middle =  '</div>' +
                        //                 '<div class="col text-left">';
                        // const l =       data.period1;
                        // const tail =     '</div>' +
                        //              '</div>';
                        // const val = head + input + middle + label + tail;
                        // alert(val);
                        // container.append(val);
                        // container.append(val);

                    }
                    if (typeof(data.period2) !== "undefined"){
                        var input = document.createElement("INPUT");
                        input.type= 'checkbox';
                        input.name= 'periods[]';
                        input.value= data.period2 + '_' + data.p2Start + '_' + data.p2End;
                        input.id = data.period2;
                        input.classList.add("form-control");
                        // container.appendChild(input);
                        input.onclick = function(){
                            if(input.checked){
                                selectedPeriods.push('P2');
                            }
                        };

                        var mainDiv = document.createElement("div");
                        mainDiv.classList.add("row");
                        var inputDiv = document.createElement("div");
                        inputDiv.classList.add("col");
                        inputDiv.classList.add("text-right");
                        var labelDiv = document.createElement("div");
                        labelDiv.classList.add("col");
                        labelDiv.classList.add("text-left");

                        var label = document.createTextNode(data.period2 + '(Start: ' + data.p2Start + ', End: ' + data.p2End + ')');
                        inputDiv.appendChild(input);
                        labelDiv.appendChild(label);
                        mainDiv.appendChild(labelDiv);
                        mainDiv.insertBefore(inputDiv,labelDiv);
                        container.appendChild(mainDiv);
                    }
                    if (typeof(data.period3) !== "undefined") {
                        var input = document.createElement("INPUT");
                        input.type = 'checkbox';
                        input.name = 'periods[]';
                        input.value = data.period3 + '_' + data.p3Start + '_' + data.p3End;
                        input.id = data.period3;
                        input.classList.add("form-control");
                        // container.appendChild(input);
                        input.onclick = function(){
                            if(input.checked){
                                selectedPeriods.push('P3');
                            }
                        };

                        var mainDiv = document.createElement("div");
                        mainDiv.classList.add("row");
                        var inputDiv = document.createElement("div");
                        inputDiv.classList.add("col");
                        inputDiv.classList.add("text-right");
                        var labelDiv = document.createElement("div");
                        labelDiv.classList.add("col");
                        labelDiv.classList.add("text-left");

                        var label = document.createTextNode(data.period3 + '(Start: ' + data.p3Start + ', End: ' + data.p3End + ')');
                        inputDiv.appendChild(input);
                        labelDiv.appendChild(label);
                        mainDiv.appendChild(labelDiv);
                        mainDiv.insertBefore(inputDiv,labelDiv);
                        container.appendChild(mainDiv);
                    }
                    if (typeof(data.period4) !== "undefined"){
                        var input = document.createElement("INPUT");
                        input.type= 'checkbox';
                        input.name= 'periods[]';
                        input.value= data.period4 + '_' + data.p4Start + '_' + data.p4End;
                        input.id = data.period4;
                        input.classList.add("form-control");
                        // container.appendChild(input);
                        input.onclick = function(){
                            if(input.checked){
                                selectedPeriods.push('P4');
                            }
                        };

                        var mainDiv = document.createElement("div");
                        mainDiv.classList.add("row");
                        var inputDiv = document.createElement("div");
                        inputDiv.classList.add("col");
                        inputDiv.classList.add("text-right");
                        var labelDiv = document.createElement("div");
                        labelDiv.classList.add("col");
                        labelDiv.classList.add("text-left");

                        var label = document.createTextNode(data.period4 + '(Start: ' + data.p4Start + ', End: ' + data.p4End + ')');
                        inputDiv.appendChild(input);
                        labelDiv.appendChild(label);
                        mainDiv.appendChild(labelDiv);
                        mainDiv.insertBefore(inputDiv,labelDiv);
                        container.appendChild(mainDiv);
                    }
                    if (typeof(data.period5) !== "undefined"){
                        var input = document.createElement("INPUT");
                        input.type= 'checkbox';
                        input.name= 'periods[]';
                        input.value= data.period5 + '_' + data.p5Start + '_' + data.p5End;
                        input.id = data.period5;
                        input.classList.add("form-control");
                        // container.appendChild(input);
                        input.onclick = function(){
                            if(input.checked){
                                selectedPeriods.push('P5');
                            }
                        };

                        var mainDiv = document.createElement("div");
                        mainDiv.classList.add("row");
                        var inputDiv = document.createElement("div");
                        inputDiv.classList.add("col");
                        inputDiv.classList.add("text-right");
                        var labelDiv = document.createElement("div");
                        labelDiv.classList.add("col");
                        labelDiv.classList.add("text-left");

                        var label = document.createTextNode(data.period5 + '(Start: ' + data.p5Start + ', End: ' + data.p5End + ')');
                        inputDiv.appendChild(input);
                        labelDiv.appendChild(label);
                        mainDiv.appendChild(labelDiv);
                        mainDiv.insertBefore(inputDiv,labelDiv);
                        container.appendChild(mainDiv);
                    }
                    if (typeof(data.period6) !== "undefined"){
                        var input = document.createElement("INPUT");
                        input.type= 'checkbox';
                        input.name= 'periods[]';
                        input.value= data.period6 + '_' + data.p6Start + '_' + data.p6End;
                        input.id = data.period6;
                        input.classList.add("form-control");
                        // container.appendChild(input);
                        input.onclick = function(){
                            if(input.checked){
                                selectedPeriods.push('P6');
                            }
                        };

                        var mainDiv = document.createElement("div");
                        mainDiv.classList.add("row");
                        var inputDiv = document.createElement("div");
                        inputDiv.classList.add("col");
                        inputDiv.classList.add("text-right");
                        var labelDiv = document.createElement("div");
                        labelDiv.classList.add("col");
                        labelDiv.classList.add("text-left");

                        var label = document.createTextNode(data.period6 + '(Start: ' + data.p6Start + ', End: ' + data.p6End + ')');
                        inputDiv.appendChild(input);
                        labelDiv.appendChild(label);
                        mainDiv.appendChild(labelDiv);
                        mainDiv.insertBefore(inputDiv,labelDiv);
                        container.appendChild(mainDiv);
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }

        function changeUri(){

        }
        function setAttr($id) {
            console.log($id);
            alert($($id).is(':checked'));
        }
        // function loadSchools() {
        //     $.ajaxSetup({
        //
        //         headers: {
        //
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //
        //         }
        //
        //     });
        //
        //     $.ajax({
        //         /* the route pointing to the post function */
        //         url: '/hosts/schools',
        //         type: 'GET',
        //         /* send the csrf-token and the input to the controller */
        //         dataType: 'JSON',
        //         /* remind that 'data' is the response of the AjaxController */
        //         success: function (data) {
        //             // $.each(data, function (i,s) {
        //             //     console.log(s.fields);
        //             // })
        //             console.log(JSON.stringify(data));
        //         }
        //     });
        // }

        function changeUrl($email){
            url = url("/hosts/reasonFarm/") + $email;
            window.location = url;
        }
        function newWeek() {
            let val = parseInt($('#weekRange').val());
            if(val > 0 && val < 10){
                val = val + 1;
            }
            $('#weekRange').val(val.toString());
            setWeek();
            $('#dayRange').val('1');
            setDay();
            // showTimeInput();
            // $('#sameAsPrevious').prop("checked",false);
        }

        function oldWeek() {
            let val = parseInt($('#dayRange').val());
            if(val > 1 && val < 11){
                val = val - 1;
            }
            $('#weekRange').val(val.toString());
            setWeek();
            $('#dayRange').val('1');
            setDay();
            // showTimeInput();
            // $('#sameAsPrevious').prop("checked",false);
        }
        function newDay() {
            let val = parseInt($('#dayRange').val());
            if(val > 0 && val < 5){
                val = val + 1;
            }
            $('#dayRange').val(val.toString());
            setDay();
            showTimeInput();
            const email = $('email').val()!='';
            if (email != ''){
                getPeriods();
            }
            $('#sameAsPrevious').prop("checked",false);
        }

        function oldDay() {
            let val = parseInt($('#dayRange').val());
            if(val > 1 && val < 6){
                val = val - 1;
            }
            $('#dayRange').val(val.toString());
            setDay();
            showTimeInput();
            const email = $('email').val()!='';
            if (email != ''){
                getPeriods();
            }
            $('#sameAsPrevious').prop("checked",false);
        }

        function showProfileForm() {
            $('#profileForm').show();
            $('#educationForm').hide();
            $('#finalForm').hide();
        }

       function showEducationForm() {
            $('#profileForm').hide();
            $('#educationForm').show();
            $('#finalForm').hide();
        }

        function showFinalForm() {
            $('#profileForm').hide();
            $('#educationForm').hide();
            $('#finalForm').show();
        }

        function showTimeForm() {
            const params = window.location.pathname;
            // alert('params: ' + params);
            const val = params.split("/");
            // alert(val[3] !== undefined);
            if (val[3] !== undefined){
                const mentorId = val[3];
                showTimeForm2(mentorId);
                $url = $('#volunteerTimes').attr("href");
                $newUrl = $url + '/' + mentorId;
                $('#volunteerTimes').attr("href",$newUrl);
                $("#prevTiming").show();
            } else{
                $('#volTimeForm').show();
                $('#volTimeForm2').hide();
            }
        }

        function showTimeForm2($mentorId) {
            $('#volTimeForm').hide();
            $('#volTimeForm2').show();
            $('#mentorId').val($mentorId);
        }

        function showHostProfileForm() {
            const params = window.location.pathname;
            // alert('params: ' + params);
            const val = params.split("/");
            // alert(val[3] !== undefined);
            if (val[3] !== undefined){
                const email = val[3];
                showClassTimeForm2(email);
                $url = $('#hostTimes').attr("href");
                $newUrl = $url + '/' + email;
                $('#hostTimes').attr("href",$newUrl);

                $url = $('#finalForms').attr("href");
                $newUrl = $url + '/' + email;
                $('#finalForms').attr("href",$newUrl);

                $url = $('#goBack').attr("href");
                $newUrl = $url + '/' + email;
                $('#goBack').attr("href",$newUrl);

                $("#prevHostTiming").show();
            } else{
                $('#classTimeForm').hide();
                $('#hostProfileForm').show();
            }
        }

        function showClassTimeForm() {
            $('#hostProfileForm').hide();
            $('#classTimeForm').show();
        }

        function showClassTimeForm2($email) {


            $('#hostProfileForm').hide();
            $('#classTimeForm').show();
            $('#email').val($email);
            getPeriods();
        }

        function showNewTimeForm() {
            showClassTimeForm();
            getPeriods();
        }

        function setWeek() {
            $('#week').val('Week-' + $('#weekRange').val());
        }

        function setDay() {
            const dayVal = $('#dayRange').val();
            switch (dayVal) {
                case '1':
                    $('#day').val('Monday');
                    break;
                case '2':
                    $('#day').val('Tuesday');
                    break;
                case '3':
                    $('#day').val('Wednesday');
                    break;
                case '4':
                    $('#day').val('Thursday');
                    break;
                case '5':
                    $('#day').val('Friday');
                    break;
                default:
                    $('#day').val('');
            }
            const email = $('email').val();

            if (email != ''){
                getPeriods();
            }
        }

        function addClass($i) {
            if ($i < 5) {
                $('#classDetails').append("<div>\n" +
                    '            <div class="form-group">' + "\n" +
                    '                <h2>Class ' + ($i + 1) + ' key details:</h2>' + "\n" +
                    "            </div>\n" +
                    '            <div class="form-group">' + "\n" +
                    '                <label for=\"yearLevel' + ($i + 1) + '" class="control-label">{{ 'Year level group ' }}</label>' + "\n" +
                    '                <input class="form-control" rows="5" name="yearLevel[]" type="text" required id="yearLevel' + ($i + 1) + '" value="" >' + "\n" +
                    "            </div>\n" +
                    "\n" +
                    '            <div class="form-group">' + "\n" +
                    '                <label for="subject' + ($i + 1) + '" class="control-label">{{ 'Subject ' }}</label>' + "\n" +
                    '                <input class="form-control" rows="5" name="subject[]" type="text" required id="subject' + ($i +1) + '" value="" >' + "\n" +
                    "            </div>\n" +
                    "\n" +
                    '            <div class="form-group">' + "\n" +
                    '                <label for="mainTopic' + ($i + 1) + '" class="control-label">{{ 'Main Topic ' }}</label>' + "\n" +
                    '                <input class="form-control" rows="5" name="mainTopic[]" type="text" required id="mainTopic' + ($i +1) + '" value="" >' + "\n" +
                    "            </div>\n" +
                    "\n" +
                    '            <div class="form-group">' + "\n" +
                    '                <label for="notes' + ($i + 1) + '" class="control-label">{{ 'Any Important Notes ' }}</label>' + "\n" +
                    '                <input class="form-control" rows="5" name="notes[]" type="text" required id="notes' + ($i +1) + '" value="" >' + "\n" +
                    "            </div>\n" +
                    "\n" +
                    '            <div class="form-group">' + "\n" +
                    '                <label for="week' + ($i + 1) + '" class="control-label">{{ 'Select Week ' }}</label>' + "\n" +
                    "                {{-- TODO: Add scroll --}}\n" +
                    '                <input class="form-control" rows="5" name="week[]" type="text" required id="week' + ($i +1) + '" value="" >' + "\n" +
                    "            </div>\n" +
                    "\n" +
                    '            <div class="form-group">' + "\n" +
                    '                <label for="day' + ($i + 1) + '" class="control-label">{{ 'Select Day ' }}</label>' + "\n" +
                    "                {{-- TODO: Add scroll --}}\n" +
                    '                <input class="form-control" rows="5" name="day[]" type="text" required id="day' + ($i +1) + '" value="" >' + "\n" +
                    "            </div>\n" +
                    "\n" +
                    '            <div class="form-group">' + "\n" +
                    '                <label for="period' + ($i + 1) + '" class="control-label">{{ 'Select Period ' }}</label>' + "\n" +
                    "                {{-- TODO: Add scroll --}}\n" +
                    '                <input class="form-control" rows="5" name="period[]" type="text" required id="period' + ($i +1) + '" value="" >' + "\n" +
                    "            </div>\n" +
                    "\n" +
                    "        </div>");
                if ($i === 4){
                    $('#addClassButton').attr("disabled","disabled");
                } else {
                    $('#addClassButton').attr("onClick", "addClass(" + ($i + 1) + ")");
                }
            } else {
                $('#addClassButton').attr("disabled","disabled");
            }
        }
    </script>
<div id="footer" class="layers-link">

</div>
</body>
</html>
