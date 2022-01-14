<?php

namespace App\Http\Controllers;

use App\Internship;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function React\Promise\all;

class FormController extends Controller
{

    function index()
    {
        // dd($request->all());
        $member_intern = Internship::all();
        return view('internship.form', compact('member_intern'));
    }


    public function store(Request $request)
    {

        //  dd($request->all());

        //อัพโหลดไฟล์ resume
        //การเข้ารหัสรูปภาพ
        $resume_file = $request->file('resume');
        //  generate ชื่อภาพ
        $name_gen_resume = hexdec(uniqid());

        // ดึงนามสกุลไฟล์ภาพ
        $img_ext_resume = strtolower($resume_file->getClientOriginalExtension());
        //  รวมชื่อกับนามสกุลไฟล์ 
        $resume_name = $name_gen_resume . '.' . $img_ext_resume;

        //บันทึกข้อมูลเเละอัพโหลด
        $upload_location = 'image/resume/';
        $full_path_resume = $upload_location . $resume_name;
        // dd($img_name);
        $resume_file->move($upload_location, $resume_name);



        //อัพโหลดไฟล์ transcript
        //การเข้ารหัสรูปภาพ
        $transcript_file = $request->file('transcript');
        //  generate ชื่อภาพ
        $name_gen_transcript = hexdec(uniqid());

        // ดึงนามสกุลไฟล์ภาพ
        $transcript_ext = strtolower($transcript_file->getClientOriginalExtension());
        //  รวมชื่อกับนามสกุลไฟล์ 
        $transcript_name = $name_gen_transcript . '.' . $transcript_ext;

        //บันทึกข้อมูลเเละอัพโหลด
        $upload_location = 'image/transcript/';
        $full_path_transcript = $upload_location . $transcript_name;
        // dd($img_name);
        $transcript_file->move($upload_location, $transcript_name);




        //อัพโหลดรูป profile 
        //การเข้ารหัสรูปภาพ
        $profile_img = $request->file('profile');
        //  generate ชื่อภาพ
        $name_gen = hexdec(uniqid());

        // ดึงนามสกุลไฟล์ภาพ
        $img_ext = strtolower($profile_img->getClientOriginalExtension());
        //  รวมชื่อกับนามสกุลไฟล์ 
        $img_name = $name_gen . '.' . $img_ext;

        //บันทึกข้อมูลเเละอัพโหลด
        $upload_location = 'image/profile/';
        $full_path = $upload_location . $img_name;
        // dd($img_name);

        Internship::insert([
            'profile' => $full_path,
            'name_title' => $request->name_title,
            'full_name' => $request->full_name,
            'id_card_number' => $request->id_card_number,
            'phone' => $request->phone,
            'line_id' => $request->line_id,
            'email_address' => $request->email_address,
            'address' => $request->address,
            'license' => $request->license,
            'major' => $request->major,
            'faculty' => $request->faculty,
            'university' => $request->university,
            'start_intern' => $request->start_intern,
            'end_intern' => $request->end_intern,
            'resume' => $full_path_resume,
            'transcript' => $full_path_transcript,
            'social' => $request->social,
            'favorite' => $request->favorite,
            'skill' => $request->skill,
            'introduce_yourself' => $request->introduce_yourself,
            'status' => 'กำลังรออนุมัติ',
            'created_at' => Carbon::now()

        ]);

        //อัพโหลดภาพ
        $profile_img->move($upload_location, $img_name);


        return redirect()->back()->with('success', "ระบบได้ทำการบันทึกข้อมูลของคุณเรียบร้อย");








        //dd($request->name_title, $request->name, $request->address, $request->id_card_number, $request->birthday, $request->profile, $request->phone, $request->line_id, $request->email_address,$request->license);
    }
}
