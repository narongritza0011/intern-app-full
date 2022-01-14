<?php

namespace App\Http\Controllers;

use App\CustomerBank;
use App\Inclass;
use App\InclassReturn;
use App\InclassTuition;
use App\SchoolBank;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function deleteFile($file_name)
    {
        if(file_exists(public_path($file_name)) && !empty($file_name))
        {
            unlink(public_path($file_name));
        }
    }

    function uploadFile($path, $file, $rename = '')
    {
        $extension = $file->extension();

        $image = $rename.date('YmdHis').'.'.$extension;

        $file->move(public_path($path), $image);

        $file_name = $path.$image;

        return $file_name;
    }
    
    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = array();
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if(!$header) { $header = $row; continue; } 
               
                $empty_filesop = array_filter( array_map('trim', $row));

                if( !empty($empty_filesop)){
                    //check for empty rows
                    if( count( $header ) == count($row) ) {  

                        $data[] = array_combine($header, $row);
                    }
                }
                
            }
            fclose($handle);
        }

        return $data;
    }

    function getMonth($value)
    {
        if(!empty($value))
        {
            return Carbon::createFromFormat('Y-m-d', $value)->format('m');
        }
    }

    function getYear($value)
    {
        if(!empty($value))
        {
            return Carbon::createFromFormat('Y-m-d', $value)->format('Y');
        }
    }

    function dbDayOne($date)
    {
        if($date)
        {
            return Carbon::parse($date)->startOfMonth()->format('Y-m-d');
        }else {
            return null;
        }
    }

    function dbFirstDay($month ,$year){
        return Carbon::createFromDate($year, $month, 1)->startOfMonth()->format('Y-m-d');
    }

    function dbLastDay($month ,$year){
        return Carbon::createFromDate($year, $month, 1)->lastOfMonth()->format('Y-m-d');
    }

    function getMonthName($month ,$year){
        return Carbon::createFromDate($year, $month, 1)->lastOfMonth()->format('F Y');
    }

    function dateToDB($date){
        return Carbon::parse($date)->format('Y-m-d');
    }

    function dateShow($date){
        return Carbon::parse($date)->format('d-m-Y');
    }

    function showFirstDay($date)
    {
        return Carbon::parse($date)->startOfMonth()->format('d-m-Y');
    }

    function showLastDay($date)
    {
        return Carbon::parse($date)->lastOfMonth()->format('d-m-Y');
    }

    function schoolBank(){
        
        $data = InclassTuition::where('as_month', '04')->where('as_year', '2020')->whereNotNull('customer_bank_id')->whereNull('school_bank_id')->get();

        if (count($data) > 0) {
            foreach ($data as $key => $val) {

                $cust = CustomerBank::find($val->customer_bank_id);
                $school = SchoolBank::where('name', 'DD '.$cust->bank_code)->first();
                $update = InclassTuition::find($val->id);
                $update->school_bank_id = $school->id;
                $update->save();

                echo "{$update->id} <br>";
            }
        }
    }

    function returnTuition(){

        $data = InclassReturn::get();

        foreach ($data as $key => $val) {
            $find = InclassTuition::find($val->inclass_tuition_id);
            if($find)
            {
                $find->total = $val->total;
                $find->payment = $val->total;
                $find->save();

                echo "{$find->id} <br>";
            }
        }
        // $in = InclassTuition::where('pay_type', 'return')->get();

        // if (count($in) > 0) {
        //     foreach ($in as $key => $val) {
        //         $find = InclassTuition::where('as_month', $val->as_month)->where('as_year', $val->as_year)->where('student_id', $val->student_id)->where('subject_id', $val->subject_id)->first();

        //         if($find)
        //         {
        //             $data = new InclassReturn();
        //             $data->as_month = $val->as_month;
        //             $data->as_year = $val->as_year;
        //             $data->return_date = $val->rec_date;
        //             $data->amount =  ($val->total);
        //             $data->total = $find->total;
        //             $data->inclass_tuition_id = $find->id;
        //             $data->school_bank_id = $find->school_bank_id;
        //             $data->customer_bank_id = $find->customer_bank_id;
        //             $data->inclass_id =  $find->inclass_id;
        //             $data->subject_id =  $find->subject_id;
        //             $data->student_id =  $find->student_id;
        //             $data->user_id = Auth::id();
        //             $data->save();

        //             $sum_total = $find->total-($val->total);
        //             $find->total = $sum_total;
        //             $find->payment = $sum_total;
        //             $find->diff_total = 0;
        //             $find->save();

        //             echo $val->student_id.' InclassReturn <br> ';

        //         }
        //     }
        // }
    }

    function checkStatus($diff_total = 0){
        $rs = 'not_pay';
        if ($diff_total > 0) {
            $rs = 'over';
            
        } else if($diff_total == 0) {
            $rs = 'pay';
        }
        return $rs;
    }
}