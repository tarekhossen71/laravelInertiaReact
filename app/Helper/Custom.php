<?php

define('USER_AVATAR_PATH','user/');
define('DOCTOR_AVATAR_PATH','doctor/');
define('LOGO_PATH','logo/');
define('GENDER',[1=>'Male',2=>'Female']);
define('STATUS',[1=>'Active',2=>'Inactive']);
define('STATUS_LABEL',[
    1=>'<span className="badge badge-sm badge-success">Active</span>',
    2=>'<span className="badge badge-sm badge-danger">Inctive</span>'
]);
define('DAY',[
    'Saturday'  => 'Saturday',
    'Sunday'    => 'Sunday',
    'Monday'    => 'Monday',
    'Tuesday'   => 'Tuesday',
    'Wednesday' => 'Wednesday',
    'Thursday'  => 'Thursday',
    'Friday'    => 'Friday'
]);
define('BLOOD_GROUP',[
    1=>'A+',
    2=>'A-',
    3=>'B+',
    4=>'B-',
    5=>'AB+',
    6=>'AB-',
    7=>'O+',
    8=>'O-'
]);
define('DOCTOR_ID_FORMAT',[
    1=>'0-9',
    2=>'A-Z-0-9',
    3=>'a-z-0-9',
]);
define('APPOINTMENT_PIORITY',[
    1=>'Normal',
    2=>'Urgent',
    3=>'Very Urgent',
    4=>'Low'
]);
define('APPOINTMENT_STATUS',[
    1=>'Active',
    2=>'Cancel',
    3=>'Closed',
    4=>'Rescheduled'
]);
define('APPOINTMENT_STATUS_LABEL',[
    1=>'<small className="rounded p-1 px-2 bg-light text-dark shadow-sm">Normal</small>',
    2=>'<small className="rounded p-1 px-2 bg-danger text-light">Cancel</small>',
    3=>'<small className="rounded p-1 px-2 bg-warning text-dark">Closed</small>',
    4=>'<small className="rounded p-1 px-2 bg-info text-dark">Rescheduled</small>',
]);
define('PATIENT_TYPE',[
    1=>'Phone Appointment',
    2=>'Old/Registered',
    3=>'Walk In',
    4=>'Referred',
    5=>'Choosen'
]);
define('CONSULTATION_TYPE',[
    1=>'Primary',
    2=>'Follow-up',
    3=>'Split',
    4=>'Referred',
    5=>'Complementary'
]);
define('DATA_ORDERING',[
    'asc'=>'Ascending',
    'desc'=>'Descending',
]);
define('CORPORATE_CLIENT',[
    1=>'Yes',
    2=>'N/A',
]);
define('EXPORT_TYPE',[
    'csv'=>'CSV',
    'xlsx'=>'XLSX'
]);
define('UNAUTORIZED_BLOCK','Unauthorized Block!');
define('MONTH',[
    1=>'January',
    2=>'February',
    3=>'March',
    4=>'April',
    5=>'May',
    6=>'June',
    7=>'July',
    8=>'August',
    9=>'September',
    10=>'October',
    11=>'November',
    12=>'December'
]);

if (!function_exists('patient_id')) {
    function patient_id(){
        $time = substr(time(),4,6);
        $rand = substr(rand(),0,6);
        return $time.$rand;
    }
}

if (!function_exists('appointment_id')) {
    function appointment_id(){
        $time = substr(time(),4,6);
        $rand = substr(rand(),0,6);
        return 'A'.$rand.$time;
    }
}

if (!function_exists('set_page_data')) {
    function set_page_data($site_title,$title){
        return view()->share(['site_title'=>$site_title,'title'=>$title]);
    }
}

if (!function_exists('table_checkbox')) {
    function table_checkbox($row_id){
        return '<div className="form-checkbox">
            <input type="checkbox" className="form-check-input select_data" id="checkbox-'.$row_id.'" value="'.$row_id.'" onClick="select_single_item('.$row_id.')">
            <label className="form-check-label" for="checkbox-'.$row_id.'"></label>
        </div>';
    }
}

if (!function_exists('table_image')) {
    function table_image($path,$image,$name){
        return $image ? "<img src='".asset('/')."uploads/".$path.$image."' alt='".$name."' style='width:40px;'/>"
        : "<img src='".asset('/')."img/default.svg' alt='Default Image' style='width:40px;'/>";
    }
}

if (!function_exists('user_image')) {
    function user_image($gender,$path,$image,$name,$class = null){
        if ($image){
            return '<img src="'.asset('/').'uploads/'.$path.'/'.$image.'" alt="'.$name.'" style="width:50px" className="'.$class.'">';
        }else{
            $img = $gender == '1' ? 'male' : 'female';
            return '<img src="'.asset('/').'img/'.$img.'.svg" alt="'.$name.'" style="width:50px;">';
        }
    }
}

if (!function_exists('change_status')) {
    function change_status(int $id,int $status,string $name = null){
        return $status == 1 ? '<span className="badge badge-success change_status" data-id="' . $id . '" data-name="' . $name . '" data-status="2" style="cursor:pointer;">Active</span>' :
        '<span className="badge badge-danger change_status" data-id="' . $id . '" data-name="' . $name . '" data-status="1" style="cursor:pointer;">Inactive</span>';
    }
}

if (!function_exists('tooltip')) {
    function tooltip($title,$direction = 'top'){
        return 'data-toggle="tooltip" data-placement="'.$direction.'" title="'.$title.'"';
    }
}


if (!function_exists('relation_data')) {
    function relation_data($query,$data){
        return $query ? $data : 'N/A';
    }
}

if (!function_exists('validPhoneNumber')) {
    function validPhoneNumber($phoneNumber){
        $data = preg_replace('/[^0-9]/', '', $phoneNumber);
        return ltrim($data, '88');
    }
}

