<?php

namespace App\Http\Controllers\Host;

use App\DataExport;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Host;
use App\Mail\SendMailNotification;
use Illuminate\Http\Request;
use Airtable;
use Excel;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Session;
class HostsController extends Controller
{
    public $val = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $hosts = Host::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $hosts = Host::latest()->paginate($perPage);
        }

        return view('hosts.index', compact('hosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('hosts.create');
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

//        $requestData = $request->all();
//        $name = $requestData['name'];
//
//        $message ="";
//        $isSameForAll = false;
//        $isSameAsPrevious = false;
//        $schoolExist = true;
//        $isSameForAll =  $request->has('sameForAll') ? true : false ;
//        $isSameAsPrevious = $request->has('sameAsPrevious') ? true : false;
//        $success = false;
//        $special = false;
//
//        $school = $this->checkSchoolExist($name);
//
//        if (sizeof($school['records']) == 0){
//            $schoolExist = false;
//        }
//        if (!$schoolExist) {
//            $school = $this->storeSchoolInfo($requestData);
//            $school = $school['fields'];
//            if(sizeof($school) !== 0){
//                $success = true;
//            }
////            echo 'here';
//        } else {
////            echo 'note here';
//            $school = $school['records'][0]['fields'];
//            //TODO: Flash message
//            $message = 'School Already Exist';
//            if ($school['Special'] === 'True'){
//                $special = true;
//            } elseif($school['Special'] === 'False') {
//                $special = false;
//            }
//        }
////        //if school doesn't exist and is same for all
//        if (!$schoolExist && $isSameForAll){
////            echo 'here';
//            if ($success){
////                echo '1';
////                echo $school['ID'];
//                $school = $this->storeSchoolPeriods($school, $requestData);
////                var_dump($school);
////                echo 'now';
////                $success = true;
//                $message = 'Error in storing periods.';
//            }
////            echo '2';
//        }
////        //If school info already exist
//        elseif($schoolExist) {
//            $message = 'School exist do you want to continue?';
//            if ($isSameAsPrevious) {
////                if ($special){
////                    $resSchool = $this->getPeriodsSpecial($school, $day);
////                    $this->updateSpecialSchoolPeriods($school, $requestData);
////                    echo 'here';
////                } else {
////                    echo 'note here';
////                    $resSchool = $this->getPeriods($school);
////                    $this->updateSchoolPeriods($school, $requestData);
////                }
//
//            } else {
//                if ($special){
//                    var_dump($requestData);
//                    $id = $school['ID'];
//                    $school = $this->updateSpecialSchoolPeriods($requestData,$id);
//                } else{
//                    $school = $this->storeSchoolPeriods($school, $requestData);
//                }
//            }
//        }
//        elseif (!$schoolExist){
//            // Todo: flash message
//            $school = $this->storeSchoolPeriods($school, $requestData);
//        }
//
//
//
////        Host::create($requestData);
//
////        return redirect('hosts')->with('flash_message', 'Host added!');
////        $school = $this->val;
////        return view('hosts.index', compact('school'));
//        return redirect('hosts/time')->with('flash_message', 'Data uploaded!');
    }

//    public function updateSchoolPeriods($school, $requestData){
//        $resSchool = $this->getPeriods($school);
//        $res = Airtable::table('schoolTimeTable')
//            ->updateOrCreate(['ID' => $school['ID']],['School_Name' => $requestData['name'],
//                'P1-StartTime' => $requestData['startTime1'], $requestData['endTime1'],
//                'P2-StartTime' => $requestData['startTime2'], 'P2-EndTime' => $requestData['endTime2'],
//                'P3-StartTime' => $requestData['startTime3'], $requestData['endTime3'],
//                'P4-StartTime' => $requestData['startTime4'], 'P4-EndTime' => $requestData['endTime4'],
//                'P5-StartTime' => $requestData['startTime5'], 'P5-EndTime' => $requestData['endTime5'],
//                'P6-StartTime' => $requestData['startTime6'], 'P6-EndTime' => $requestData['endTime6']]);
//        return $res;
//    }

//    public function storeSchoolPeriods($school, $requestData){
//        $res = Airtable::table('schoolTimeTable')
//                ->updateOrCreate(['School_Name' => $requestData['name']],['School_Name' => $requestData['name'],
//                    'ID' => $school['ID'],
//                    'P1-StartTime' => $requestData['startTime1'], 'P1-EndTime' => $requestData['endTime1'],
//                    'P2-StartTime' => $requestData['startTime2'], 'P2-EndTime' => $requestData['endTime2'],
//                    'P3-StartTime' => $requestData['startTime3'], 'P3-EndTime' => $requestData['endTime3'],
//                    'P4-StartTime' => $requestData['startTime4'], 'P4-EndTime' => $requestData['endTime4'],
//                    'P5-StartTime' => $requestData['startTime5'], 'P5-EndTime' => $requestData['endTime5'],
//                    'P6-StartTime' => $requestData['startTime6'], 'P6-EndTime' => $requestData['endTime6']]);
//        return $res;
//        //TODO: special case upload when new day period entered
//
//    }

//    public function  storeSpecialSchoolPeriods($requestData, $id, $key, $updatedDays){
//        $resSchool = Airtable::table('specialSchoolTimeTable')
//            ->updateOrCreate(['Special_ID' => $key],['Special_ID' => $key, 'ID' => $id,'School_Name' => $requestData['name'], 'Days' => $updatedDays,
//                'P1-StartTime' => $requestData['startTime1'], 'P1-EndTime' => $requestData['endTime1'],
//                'P2-StartTime' => $requestData['startTime2'], 'P2-EndTime' => $requestData['endTime2'],
//                'P3-StartTime' => $requestData['startTime3'], 'P3-EndTime' => $requestData['endTime3'],
//                'P4-StartTime' => $requestData['startTime4'], 'P4-EndTime' => $requestData['endTime4'],
//                'P5-StartTime' => $requestData['startTime5'], 'P5-EndTime' => $requestData['endTime5'],
//                'P6-StartTime' => $requestData['startTime6'], 'P6-EndTime' => $requestData['endTime6']]);
//        return $resSchool;
//    }

//    public function storeSchoolInfo($requestData){
//        $id = mt_rand(11111,99999);
//        $res = Airtable::table('schoolInfo')
//                    ->firstOrCreate(['School_Name' => $requestData['name']],
//                        ['ID' => $id,'Special' => 'False']);
//        return $res;
//    }

//    public function updateSpecialSchoolPeriods($requestData,$id){
//        $day = $requestData['day'];
//        $updatedDays = [];
//        $resSchool = $this->getPeriodsSpecial($requestData['name'], $day);
////        $this->val = $resSchool;
//        if (sizeof($resSchool['fields']) === 0){
//            $key = $requestData['name'] . '_' . $id . '_' . 1;
//            array_push($updatedDays,$day);
//        } else{
//            $fields = $resSchool['fields'];
////            $this->val = $fields;
//            $key = $fields['Special_ID'];
//            $updatedDays= $fields['Days'];
//        }
//        $resSchool = $this->storeSpecialSchoolPeriods($requestData, $id, $key, $updatedDays);
//        return $resSchool;
////
////        $this->storeSpecialSchoolPeriods($resSchool, $requestData);
//    }
    public function getPeriods($school){

        $resSchool = Airtable::table('schoolTimeTable')->where('School_Name', $school['School_Name'])->get();
        $result = $resSchool['records'][0];

        return $result;
    }

    public function getPeriodsSpecial($schoolName, $day){
        $result = array('fields'=>[]);
        $resSchool = $this->getSpecialSchool($schoolName);
        foreach ($resSchool['records'] as $school){
            $days = $school['fields']['Days'];
            if (in_array($day, $days)) {
//                $result = $school['fields'];
//                $this->val = $school;
//                $result['id'] = $i;
                $fields = $school['fields'];
                $result = array('fields'=>$fields);
                break;
            }
        }
//        $this->val = $result;
//        if (sizeof($result)===1){
//            array_push($result,['fields' => '']);
//        }
        return $result;
    }

    public function getSpecialSchool($schoolName) {
       $res = Airtable::table('specialSchoolTimeTable')->where('School_Name', $schoolName)->get();
       return $res;
    }

    public function checkSchoolExist($school){
        $resSchool = Airtable::table('schoolInfo')->where('School_Name', $school)->get();
        return $resSchool;
    }

    public function getLatestId() {
        $schools = Airtable::table('schoolInfo')->get();
        return $schools;
    }

    public function test(){
        $res = Airtable::table('schoolTimeTable')->where('ID',11113)->get();
        $message = $res['records'];
        return view('hosts.index', compact('message'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $host = Host::findOrFail($id);

        return view('hosts.show', compact('host'));
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
        $host = Host::findOrFail($id);

        return view('hosts.edit', compact('host'));
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

        $host = Host::findOrFail($id);
        $host->update($requestData);

        return redirect('hosts')->with('flash_message', 'Host updated!');
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
        Host::destroy($id);

        return redirect('hosts')->with('flash_message', 'Host deleted!');
    }

    public function getAllSchool(){
        $schools = Airtable::table('schoolInfo')->get();
        $val = ["Overseas - "=>"Overseas - "];
        foreach ($schools as $school) {
            $value = $school['fields']['School_Name'];
            $val = $val + [$value => $value];
        }
        return json_decode(json_encode($val));
    }

    public function getAllSubjects(){
        $subjects = Airtable::table('schoolRequirement')->get();
        $val = ["Elective - " => "Elective - ","Science"=>"Science","Math"=>"Math"];
            foreach ($subjects as $subject) {
                $value = $subject['fields']['Subject'];
                $val = $val + [$value => $value];
            }

        return json_decode(json_encode($val));
    }
    /**
     * Show the form for time available input of a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function time()
    {
        $schools = $this->getAllSchool();
        $subjects = $this->getAllSubjects();
//        $this->getSelectedClass();
        return view('hosts.time',compact(['schools','subjects']));
    }

    public function saveHost(Request $request){
//        echo 'here';
        $requestData = $request->all();
//        var_dump($requestData);
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
        $school = $this->getSchoolID($requestData['school']);
        Airtable::table('schoolDetail')->updateOrCreate(['Email'=>$requestData['email']],['Email'=>$requestData['email'],
            'University_partner'=>$university, 'School_ID'=>$school,
            'First_Name'=>$requestData['firstName'], 'Surname'=>$requestData['surname'],
            'Phone_Number'=>$requestData['phone']]);
        Mail::to("admin@in2science.com")->send(new SendMailNotification($requestData['email'],'host','0'));
        Session::flash('message', "Host Successfully Registered.");
        return Redirect::to("/hosts/time/");
    }

    public function filterTeacher($teacherDetail) {
//        var_dump($teacherDetail);
        $value = $teacherDetail['records'][0];

        $fields = $value['fields'];

        return $fields;
    }

    public function getTeacher(Request $request){
        $email = $request->get('email');
//        echo $mentorId;
        $teacherDetail = Airtable::table('schoolDetail')->where('Email', $email)->get();
        if (sizeof($teacherDetail['records']) === 0){
            $val = ["exist"=>"false"];
        } else {
            $val = ["exist"=>"true"];
            $teacher = $this->filterTeacher($teacherDetail);
            $val = $val + ["teacher"=>$teacher];
            $selectedClass = $this->getSelectedClass($teacher['Email']);
            $val = $val + ["selected"=>sizeof($selectedClass)];
//                redirect('volunteers/create')
//                ->with('flash_message', 'Aelready Registered, please proceed to provide time');
        }
//        var_dump($volunteer);
        return json_decode(json_encode($val),true);
    }

    public function register(){
        $schools = $this->getAllSchool();
//        $this->getSchoolPeriods();
        return view('hosts.register', compact('schools'));
    }

    public function getTeacherSchool($email){
        $teacherDetail = Airtable::table('schoolDetail')->where('Email', $email)->get();
        $teacher = $this->filterTeacher($teacherDetail);
        return $teacher['School_ID'];

    }

    public function getTeacherName($email){
        $teacherDetail = Airtable::table('schoolDetail')->where('Email', $email)->get();
        $teacher = $this->filterTeacher($teacherDetail);
        return $teacher['First_Name'] . ' ' . $teacher['Surname'];
    }

    public function getSchoolPeriods(Request $request) {
        $email = $request->get('email');
        $schoolName = $this->getTeacherSchool($email);
//        echo $schoolName;
        $schoolDetail = Airtable::table('schoolInfo')->where('ID',$schoolName)->get();
        $school = $schoolDetail['records'][0]['fields'];
//        var_dump($school);
        if ($school['Special'] == 'False'){
            $schoolPeriodRecords = $this->getPeriods($school);
            $schoolPeriod = $schoolPeriodRecords['fields'];
            $periods=[];
//            var_dump($schoolPeriod);
            if (array_key_exists('P1-StartTime',$schoolPeriod)){
                $pStart=$schoolPeriod['P1-StartTime'];
                $pEnd=$schoolPeriod['P1-EndTime'];
                $periods = $periods + ["period1"=>"Period-1","p1Start"=>$pStart,"p1End"=>$pEnd];
            }
            if (array_key_exists('P2-StartTime',$schoolPeriod)){
                $pStart=$schoolPeriod['P2-StartTime'];
                $pEnd=$schoolPeriod['P2-EndTime'];
                $periods = $periods + ["period2"=>"Period-2","p2Start"=>$pStart,"p2End"=>$pEnd];
            }
            if (array_key_exists('P3-StartTime',$schoolPeriod)){
                $pStart=$schoolPeriod['P3-StartTime'];
                $pEnd=$schoolPeriod['P3-EndTime'];
                $periods = $periods + ["period3"=>"Period-3","p3Start"=>$pStart,"p3End"=>$pEnd];
            }
            if (array_key_exists('P4-StartTime',$schoolPeriod)){
                $pStart=$schoolPeriod['P4-StartTime'];
                $pEnd=$schoolPeriod['P4-EndTime'];
                $periods = $periods + ["period4"=>"Period-4","p4Start"=>$pStart,"p4End"=>$pEnd];
            }
            if (array_key_exists('P5-StartTime',$schoolPeriod)){
                $pStart=$schoolPeriod['P5-StartTime'];
                $pEnd=$schoolPeriod['P5-EndTime'];
                $periods = $periods + ["period5"=>"Period-5","p5Start"=>$pStart,"p5End"=>$pEnd];
            }
            if (array_key_exists('P6-StartTime',$schoolPeriod)){
                $pStart=$schoolPeriod['P6-StartTime'];
                $pEnd=$schoolPeriod['P6-EndTime'];
                $periods = $periods + ["period6"=>"Period-6","p6Start"=>$pStart,"p6End"=>$pEnd];
            }
//            var_dump($periods);
        }
        Session::flash('message', "");
        return json_decode(json_encode($periods),true);
    }

//    public function filterRequestedClasses($class){
//
//        $fields = $class['fields'];
//        $classDetails = ['level'=>$fields['Level'], 'subject'=>$fields['Subject'],
//            'endTime'=>$fields['End_Time'], 'topic'=>$fields['Topic'],
//            'startTime'=>$fields['Start_Time'],'email'=>$fields['Email'], 'section'=>$fields[]];
//
//        return $fields;
//    }

    public function getSelectedClass($email){
        $mentorRequestedRecords = Airtable::table('schoolRequirement')->where('Email',$email)->get();
        return $mentorRequestedRecords['records'];
    }

    public function saveRequestDetail(Request $request) {
        $requestData = $request->all();
//        var_dump($requestData);
        $email = $requestData['email'];
        $school_id = $this->getTeacherSchool($requestData['email']);
        $schoolRecord = Airtable::table('schoolInfo')->where('ID', $school_id)->get();
        $schoolName = $schoolRecord['records'][0]['fields']['School_Name'];
        $teacherName = $this->getTeacherName($requestData['email']);
        $yearLevel = $requestData['level'] . $requestData['section'];
        $subject = $requestData['subject'];
        $day = $requestData['day'];
        $notes = $requestData['note'];

        foreach ($requestData['periods'] as $period){
            list($period,$startTime,$endTime) = explode("_",$period);


            if ($period == 'Period-1'){
                $id = $requestData['year'] . '_' . $requestData['semester'] . '_' . $requestData['week'] . '_' . $requestData['day'] . '_' . $requestData['level'] . '_' . $requestData['section'] . '_p1';
                $period = 'p1';

            }
            elseif ($period == 'Period-2'){
                $id = $requestData['year'] . '_' . $requestData['semester'] . '_' . $requestData['week'] . '_' . $requestData['day'] . '_' . $requestData['level'] . '_' . $requestData['section'] . '_p2';
                $period = 'p2';
            }

            elseif ($period == 'Period-3'){
                $id = $requestData['year'] . '_' . $requestData['semester'] . '_' . $requestData['week'] . '_' . $requestData['day'] . '_' . $requestData['level'] . '_' . $requestData['section'] . '_p3';
                $period = 'p3';
            }

            elseif ($period == 'Period-4'){
                $id = $requestData['year'] . '_' . $requestData['semester'] . '_' . $requestData['week'] . '_' . $requestData['day'] . '_' . $requestData['level'] . '_' . $requestData['section'] . '_p4';
                $period = 'p4';
            }

            elseif ($period == 'Period-5'){
                $id = $requestData['year'] . '_' . $requestData['semester'] . '_' . $requestData['week'] . '_' . $requestData['day'] . '_' . $requestData['level'] . '_' . $requestData['section'] . '_p5';
                $period = 'p5';
            }

            else {
                $id = $requestData['year'] . '_' . $requestData['semester'] . '_' . $requestData['week'] . '_' . $requestData['day'] . '_' . $requestData['level'] . '_' . $requestData['section'] . '_p6';
                $period = 'p6';
            }

            Airtable::table('schoolRequirement')->updateOrCreate(['ID'=>$id],['Year'=>$requestData['year'], 'Semester'=>$requestData['semester'], 'Email'=>$requestData['email'],
                'Level'=>$requestData['level'], 'Section'=>$requestData['section'], 'Subject'=>$requestData['subject'],
                'Topic'=>$requestData['mainTopic'], 'Week'=>$requestData['week'], 'Day'=>$requestData['day'], 'Period'=>$period,
                'Start_Time'=>$startTime,'End_Time'=>$endTime, 'Notes'=>$requestData['note']]);

            Airtable::table('output')->create(['School'=> $schoolName, 'Teacher'=> $teacherName, 'Year_Level'=> $yearLevel,
                'Subject'=> $subject, 'Day'=> $day, 'Start_Time'=> $startTime, 'End_Time'=> $endTime, 'Notes'=> $notes, ]);

        }
//        $this->getTeacherSchool($email,$requestData);
        Mail::to("admin@in2science.com")->send(new SendMailNotification($email,'mentorRequest','0'));
        Session::flash('message', "Volunteer Requests successfully recorded.");
        return Redirect::to("/hosts/time/" . $email);
    }

    public function saveOutput($email,$records){
        $school = $this->getTeacherSchool($email);
        $records = $records + ['school'=>$school];
//        return json_decode(json_encode($records),true);
        Airtable::table('output')->updateOrCreate([''=>''],[''=>''])->get();
    }

//    public function export(Request $request){
//        $exportData = Airtable::table('schoolRequirement')->get();
//        $recordData = [];
//        foreach ($exportData as $record){
//            $data = [];
//            $email = $record['fields']['Email'];
//            $teacherDetail = Airtable::table('schoolDetail')->where('Email', $email)->get();
//            $school = $teacherDetail['records'][0]['fields']['school'];
//            array_push($data,['school'=>$school]);
//            array_push($data,['teacher'=>$record['fields']['Email']]);
//            $yearLevel = $record['fields']['Level'] . $record['fields']['Section'];
//            array_push($data,['year_level'=> $yearLevel]);
//            array_push($data,['subject'=>$record['fields']['Subject']]);
//            array_push($data,['day'=>$record['fields']['Day']]);
//            array_push($data,['startTime'=>$record['fields']['Start_Time']]);
//            array_push($data,['endTime'=>$record['fields']['End_Time']]);
//            array_push($data,['notes'=>$record['fields']['Notes']]);
//            array_push($recordData, $data);
//        }
//        return $this->outputCsv('output.csv',$recordData);
//    }

//    public function outputCsv($fileName, $assocDataArray)
//    {
//        ob_clean();
//        header('Pragma: public');
//        header('Expires: 0');
//        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//        header('Cache-Control: private', false);
//        header('Content-Type: text/csv');
//        header('Content-Disposition: attachment;filename=' . $fileName);
//        if(isset($assocDataArray['0'])){
//            $fp = fopen('php://output', 'w');
//            fputcsv($fp, array_keys($assocDataArray['0']));
//            foreach($assocDataArray AS $values){
//                fputcsv($fp, $values);
//            }
//            fclose($fp);
//        }
//        ob_flush();
//    }

//    public function getOutput(){
//        $exportData = Airtable::table('output')->get();
//        return $exportData;
//    }

    public function reasonForm($email){

        return view('hosts.final',compact(['email']));
    }

    public function storeRequestDetail(Request $request){
        $requestData = $request->all();
        Airtable::table('schoolRequirementReason')->updateOrCreate(['email'=>$requestData['email']],['email'=>$requestData['email'],'No_Of_Mentor'=>$requestData['maxMentor'],
            'Reason_For_Mentor'=>$requestData['reasons']]);
        Session::flash('message', "Volunteer Requests Reason Successfully Recorded.");
        return Redirect::to("/hosts/getView/".$requestData['email']);
    }

    public function getView($email){
        $data = Airtable::table('schoolRequirement')->where('Email',$email)->get();
        $records=$data['records'];
        return view('hosts.host_edit_table',compact('records'));

    }

    public function getSchoolID($name){
        $schools = Airtable::table('schoolInfo')->where('School_Name',$name)->get();

        $id = $schools['records'][0]['fields']['ID'];
        return $id;
    }

    public function getViewCount($email){
        $data = Airtable::table('schoolRequirement')->where('Email',$email)->get();
        $records=$data['records'];
        $res = ["size"=>sizeof($records)];

        return json_decode(json_encode($res),true);
    }

}
