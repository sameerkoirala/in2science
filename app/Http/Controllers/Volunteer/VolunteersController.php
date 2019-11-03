<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mail\SendMailNotification;
use App\Volunteer;
use Illuminate\Http\Request;
use Airtable;
use Illuminate\Support\Facades\Mail;
use Session;

class VolunteersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $volunteers = Volunteer::latest();

        return view('volunteers.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $universities =$this->getUniversities();
//        $mainCampuses = $this->getMainCampus();
        $schools = $this->getAllSchool();
//        var_dump($schools);
        return view('volunteers.create',compact(['universities','schools']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $id = substr(sha1(rand()), 0, 4);

        $requestData = $request->all();
        //for extra certification
        $extraCerts = $requestData['extraCert'];
        $extraCert = '';
        foreach($extraCerts as $val){
            if ($val == 'ruralBackground'){
                if (strlen($extraCert)>0){
                    $extraCert .= ', ';
                }
                $extraCert .= 'A regional or rural background';
            } elseif ($val == 'ruralWorkExp') {
                if (strlen($extraCert)>0){
                    $extraCert .= ', ';
                }
                $extraCert .= 'Experience working with regional or rural communities';
            }
        }
        //for uni
        $university = '';
        switch ($requestData['university']){
            case 'Latrobe':
                $university = 'La Trobe University';
                break;
            case 'Monash':
                $university = 'Monash University';
                break;
            case 'RMIT':
                $university = 'RMIT University';
                break;
            case 'Swinburne':
                $university = 'Swinburne University';
                break;
            case 'uniMelb':
                $university = 'Univerity of Melbourne';
                break;
        }
        $pEmail = $requestData['pEmail'] == null ? '' : $requestData['pEmail'];
//        var_dump($requestData);
//        echo $university;
//        Volunteer::create($requestData);
        Airtable::table('mentorDetail')->updateOrCreate(['Email_(university)'=>$requestData['uniEmail']],
            ['Email_(university)'=>$requestData['uniEmail'], 'Mentor_ID'=>$id, 'Mobile_PhoneNumber'=>$requestData['phone'],
                'First_Name'=>$requestData['firstName'], 'Surname'=>$requestData['surname'],
                'Email(personal)'=> $pEmail,
                'Gender'=>$requestData['gender'], 'Address'=>$requestData['address'], 'Car'=>$requestData['ownCar'],
                'Bike'=>$requestData['rideBike'], 'University'=>$university, 'Extra'=>$extraCert,
                'Campus'=>$requestData['mainCampus'], 'Student_ID'=>$requestData['studId'], 'Degree_commence_Year'=>$requestData['degreeYear'], 'Degree'=>$requestData['degree'],
                'Major'=>$requestData['major'], 'High_School'=>$requestData['year12'],
                'Considering_mentoring_atyour_own_school'=>$requestData['mentorOldSchool'],
                'Year11_12_Subjects'=>$requestData['year12_Subjects'], 'Mentoring_Method'=>$requestData['mentoringMethod'], 'Preferred_subject'=>$requestData['mentoringSubject'],
                'Why_Interested'=>$requestData['interest'], 'Skills_quality'=>$requestData['skills'], 'Heard_About_Us'=>$requestData['heardAbout']]);

//        $v = Airtable::table('mentorDetail')->get();
//        var_dump($v[0]);
        Session::flash('message', "Volunteer Successfully Registered.");
        Mail::to("admin@in2science.com")->send(new SendMailNotification($requestData['uniEmail'],'mentor',$id));
        return redirect('volunteers/time')->with('flash_message', 'Successfully Registered');
    }


    public function checkVolunteerExist(Request $request){
        $email = $request->get('email');
        $mentorDetail = Airtable::table('mentorDetail')->where('Email_(university)', $email)->get();
        if (sizeof($mentorDetail['records']) === 0){
            return ["exist"=>"false"];
        } else {
            return ["exist"=>"true"];
//                redirect('volunteers/create')
//                ->with('flash_message', 'Aelready Registered, please proceed to provide time');
        }
//        var_dump($mentorDetail);
    }

    public function getVolunteer(Request $request){
        $mentorId = $request->get('mentorId');
//        echo $mentorId;
        $mentorDetail = Airtable::table('mentorDetail')->where('Mentor_ID', $mentorId)->get();

        if (sizeof($mentorDetail['records']) === 0){
            $val = ["exist"=>"false","prevExist"=>"false"];
        } else {
            $val = ["exist"=>"true"];
            $volunteer = $this->filterVolunteer($mentorDetail);
            $data = Airtable::table('mentorAvailability')->where('Mentor_ID',$mentorId)->get();
            if (sizeof($data['records']) > 0 ){
                $val = $val + ["prevExist"=>"true"];
            }
            $val = $val + ["volunteer"=>$volunteer];
//                redirect('volunteers/create')
//                ->with('flash_message', 'Aelready Registered, please proceed to provide time');
        }
//        var_dump($volunteer);
        return json_decode(json_encode($val),true);
    }

    public function filterVolunteer($volunteerRecord) {
       $value = $volunteerRecord['records'][0];

        $fields = $value['fields'];
        if (array_key_exists('Email(personal)',$fields)){
            $volunteer = ['mentor_id'=>$fields['Mentor_ID'], 'phone'=>$fields['Mobile_PhoneNumber'],
                'firstName'=>$fields['First_Name'], 'surname'=>$fields['Surname'],
                'pEmail'=> $fields['Email(personal)'],
                'gender'=>$fields['Gender'], 'address'=>$fields['Address'], 'ownCar'=>$fields['Car'],
                'rideBike'=>$fields['Bike'], 'university'=>$fields['Email_(university)'], 'extra'=>$fields['Extra'],
            'mainCampus'=>$fields['Campus'], 'studId'=>$fields['Student_ID'], 'degreeYear'=>$fields['Degree_commence_Year'],
            'degree'=>$fields['Degree'],
            'major'=>$fields['Major'], 'year12'=>$fields['High_School'],
            'mentorOldSchool'=>$fields['Considering_mentoring_atyour_own_school'],
            'year12_Subjects'=>$fields['Year11_12_Subjects'], 'mentoringMethod'=>$fields['Mentoring_Method'],
            'mentoringSubject'=>$fields['Preferred_subject'],
            'interest'=>$fields['Why_Interested'], 'skills'=>$fields['Skills_quality'], 'hearAbout'=>$fields['Heard_About_Us']];
        } else {
            $volunteer = ['mentor_id'=>$fields['Mentor_ID'], 'phone'=>$fields['Mobile_PhoneNumber'],
                'firstName'=>$fields['First_Name'], 'surname'=>$fields['Surname'],
                'gender'=>$fields['Gender'], 'address'=>$fields['Address'], 'ownCar'=>$fields['Car'],
                'rideBike'=>$fields['Bike'], 'university'=>$fields['Email_(university)'], 'extra'=>$fields['Extra'],
                'mainCampus'=>$fields['Campus'], 'studId'=>$fields['Student_ID'], 'degreeYear'=>$fields['Degree_commence_Year'],
                'degree'=>$fields['Degree'],
                'major'=>$fields['Major'], 'year12'=>$fields['High_School'],
                'mentorOldSchool'=>$fields['Considering_mentoring_atyour_own_school'],
                'year12_Subjects'=>$fields['Year11_12_Subjects'], 'mentoringMethod'=>$fields['Mentoring_Method'],
                'mentoringSubject'=>$fields['Preferred_subject'],
                'interest'=>$fields['Why_Interested'], 'skills'=>$fields['Skills_quality'], 'hearAbout'=>$fields['Heard_About_Us']];
        }

        return $volunteer;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *$value
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $volunteer = Volunteer::findOrFail($id);

        return view('volunteers.show', compact('volunteer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $volunteer = Volunteer::findOrFail($id);

        return view('volunteers.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();
//        echo strtotime("01:30");

//        var_dump($requestData);
//        $val = Airtable::table('mentorAvailability')->get();
//        var_dump($val[0]);
//        var_dump($id);
        if ($request->has('sameForAll')){
            $id = $requestData['mentorId'] . '_1';
            Airtable::table('mentorAvailability')->updateOrCreate(['ID'=>$id],['ID'=>$id, 'Year'=>$requestData['year'],
                'Semester'=>$requestData['semester'], 'Mentor_ID'=>$requestData['mentorId'], 'Day'=>'Monday',
                'Start_Time'=>$requestData['monStartTime'],'End_Time'=>$requestData['monEndTime'],'Notes'=>$requestData['notes']]);
            $id = $requestData['mentorId'] . '_2';
            Airtable::table('mentorAvailability')->updateOrCreate(['ID'=>$id],['ID'=>$id, 'Year'=>$requestData['year'],
                'Semester'=>$requestData['semester'], 'Mentor_ID'=>$requestData['mentorId'], 'Day'=>'Tuesday',
                'Start_Time'=>$requestData['monStartTime'],'End_Time'=>$requestData['monEndTime'],'Notes'=>$requestData['notes']]);
            $id = $requestData['mentorId'] . '_3';
            Airtable::table('mentorAvailability')->updateOrCreate(['ID'=>$id],['ID'=>$id, 'Year'=>$requestData['year'],
                'Semester'=>$requestData['semester'],'Mentor_ID'=>$requestData['mentorId'], 'Day'=>'Wednesday',
                'Start_Time'=>$requestData['monStartTime'],'End_Time'=>$requestData['monEndTime'],'Notes'=>$requestData['notes']]);
            $id = $requestData['mentorId'] . '_4';
            Airtable::table('mentorAvailability')->updateOrCreate(['ID'=>$id],['ID'=>$id, 'Year'=>$requestData['year'],
                'Semester'=>$requestData['semester'], 'Mentor_ID'=>$requestData['mentorId'], 'Day'=>'Thursday',
                'Start_Time'=>$requestData['monStartTime'],'End_Time'=>$requestData['monEndTime'],'Notes'=>$requestData['notes']]);
            $id = $requestData['mentorId'] . '_5';
            Airtable::table('mentorAvailability')->updateOrCreate(['ID'=>$id],['ID'=>$id, 'Year'=>$requestData['year'],
                'Semester'=>$requestData['semester'], 'Mentor_ID'=>$requestData['mentorId'], 'Day'=>'Friday',
                'Start_Time'=>$requestData['monStartTime'],'End_Time'=>$requestData['monEndTime'],'Notes'=>$requestData['notes']]);
        }
        else{
            if ($requestData['monStartTime'] != '00:00'){
                $day = 'Monday';
                $id = $requestData['mentorId'] . '_1';
                Airtable::table('mentorAvailability')->updateOrCreate(['ID'=>$id],['ID'=>$id, 'Year'=>$requestData['year'],
                    'Semester'=>$requestData['semester'], 'Mentor_ID'=>$requestData['mentorId'],'Day'=>$day,
                    'Start_Time'=>$requestData['monStartTime'],'End_Time'=>$requestData['monEndTime'],'Notes'=>$requestData['notes']]);
            }
            if ($requestData['tueStartTime'] != '00:00'){
                $day = 'Tuesday';
                $id = $requestData['mentorId'] . '_2';
                Airtable::table('mentorAvailability')->updateOrCreate(['ID'=>$id],['ID'=>$id, 'Year'=>$requestData['year'],
                    'Semester'=>$requestData['semester'], 'Mentor_ID'=>$requestData['mentorId'],'Day'=>$day,
                'Start_Time'=>$requestData['tueStartTime'],'End_Time'=>$requestData['tueEndTime'],'Notes'=>$requestData['notes']]);
            }
            if ($requestData['wedStartTime'] != '00:00'){
                $day = 'Wednesday';
                $id = $requestData['mentorId'] . '_3';
                Airtable::table('mentorAvailability')->updateOrCreate(['ID'=>$id],['ID'=>$id, 'Year'=>$requestData['year'],
                    'Semester'=>$requestData['semester'], 'Mentor_ID'=>$requestData['mentorId'],'Day'=>$day,
                'Start_Time'=>$requestData['wedStartTime'],'End_Time'=>$requestData['wedEndTime'],'Notes'=>$requestData['notes']]);

            }
            if ($requestData['thuStartTime'] != '00:00'){
                $day = 'Thursday';
                $id = $requestData['mentorId'] . '_4';
                Airtable::table('mentorAvailability')->updateOrCreate(['ID'=>$id],['ID'=>$id, 'Year'=>$requestData['year'],
                    'Semester'=>$requestData['semester'], 'Mentor_ID'=>$requestData['mentorId'],'Day'=>$day,
                'Start_Time'=>$requestData['thuStartTime'],'End_Time'=>$requestData['thuEndTime'],'Notes'=>$requestData['notes']]);

            }
            if ($requestData['friStartTime'] != '00:00'){
                $day = 'Friday';
                $id = $requestData['mentorId'] . '_5';
                Airtable::table('mentorAvailability')->updateOrCreate(['ID'=>$id],['ID'=>$id, 'Year'=>$requestData['year'],
                    'Semester'=>$requestData['semester'], 'Mentor_ID'=>$requestData['mentorId'],'Day'=>$day,
                'Start_Time'=>$requestData['friStartTime'],'End_Time'=>$requestData['friEndTime'],'Notes'=>$requestData['notes']]);

            }
        }
        Mail::to("admin@in2science.com")->send(new SendMailNotification("",'mentorTime',$requestData['mentorId']));
        Session::flash('message', "Volunteer Availability successfully recorded.");
        return redirect("/volunteers/getView/".$requestData['mentorId']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Volunteer::destroy($id);

        return redirect('volunteers')->with('flash_message', 'Volunteer deleted!');
    }

    /**
     * Show the form for time available input of a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function time()
    {
        return view('volunteers.time');
    }

    public function getMainCampus(){
        return json_decode('{"":"--Select Maincampus--","LTU - Bundoora":"LTU - Bundoora", 
            "LTU - Bendigo" :"LTU - Bendigo"}',true);
    }

    public function getUniversities(){
        return json_decode('{"":"--Select Your University--","Latrobe": "La Trobe University", 
            "Monash": "Monash University", "rmit": "RMIT University","Swinburne":"Swinburne University",
            "unimelb":"Univerity of Melbourne"}', true);
    }

    public function getAllSchool(){
        $schools = Airtable::table('schoolInfo')->get();
//        $school = Airtable::table('specialSchoolTimeTable')
//            ->updateOrCreate(['ID' => 98548, 'Days' => ['Wednesday']],['Days' => ['Monday','Wednesday']]);
//        $school = Airtable::table('specialSchoolTimeTable')->where('School_Name', 'Killester College')->get();
//        $school = Airtable::table('schoolTimeTable')->where('School_Name', 'Auburn High School')->get();
//        $school = Airtable::table('schoolInfo')->where('School_Name', 'Auburn High School')->get();
//        $school = Airtable::table('schoolInfo')->where('School_Name', 'Test')->get();
//        return view('hosts.index', compact('school'));
        $val = [""=>"--Select Your High School--", "Overseas - "=>"Overseas - "];
        foreach ($schools as $school) {
            $value = $school['fields']['School_Name'];
            $val = $val + [$value => $value];
        }
        return json_decode(json_encode($val));
    }

    public function getView($id){
        $data = Airtable::table('mentorAvailability')->where('Mentor_ID',$id)->get();
        $records=$data['records'];
//        var_dump($records);
        return view('volunteers.show_table',compact('records'));
    }
}
