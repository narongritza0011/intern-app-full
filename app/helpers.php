<?php

use App\Internship;
use App\Location as AppLocation;

function alert_count_pending()
{

    $alert_count_num = Internship::get()->where('status', 'กำลังรออนุมัติ')->count();
    return $alert_count_num;
}


function alert_count_approved()
{

    $alert_count_num = Internship::get()->where('status', 'อนุมัติเเล้ว')->count();
    return $alert_count_num;
}




function alert_count_internSuccess()
{

    $alert_count_num = Internship::get()->where('status', 'ฝึกงานเสร็จเเล้ว')->count();
    return $alert_count_num;
}


function alert_count_customer()
{

    $alert_count_num = AppLocation::get()->count();
    return $alert_count_num;
}
