<?php

namespace App\Http\Controllers;

use App\Location as AppLocation;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class IpController extends Controller
{


    //หน้าเเสดงข้อมูลลูกค้า ตาราง
    public function showData(Request $request)
    {

        if ($request->ajax()) {
            $data = AppLocation::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->name;
                })

                ->addColumn('edit', function ($data) {
                    return '<a class="btn btn-warning mr-1" href="ip-tracker/show/' . $data->id . '"><i class="fas fa-eye"></i> </a> <a class="btn btn-primary mr-1" href="ip-tracker/edit/' . $data->id . '" ><i class="fas fa-edit"></i></a><a class="btn btn-danger mr-1"   href="ip-tracker/delete/' . $data->id . '" ><i class="fas fa-trash-alt" ></i></a>';
                })
                ->addColumn('time', function ($data) {
                    return  '<div class="text-success">' . $data->created_at .  '</div>';
                })

                ->rawColumns(['edit', 'name', 'time'])
                ->make(true);
        }

        return view('customer.location');
    }


    //หน้าเพิ่มข้อมูลลูกค้า ดึง ip
    public function index(Request $request)
    {


        // $ip = request()->ip();
        // $ip = '1C-BF-CE-E2-B1-72';
        $ip = substr(shell_exec('getmac'), 159, 20);

        $data = \Stevebauman\Location\Facades\Location::get($ip);
        // dd($ip);


        // dd('hello ip');

        return view('customer.ip_tracker', compact('data'));
    }



    public function store(Request $request)
    {



        // ตรวจสอบข้อมูล
        $request->validate(
            [
                'lat' => 'required',
                'lng' => 'required',
                'store_name' => 'required|max:255',
                'full_name' => 'required|max:255',
                'tel' => 'required|max:10',
                'address' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png'
            ],
            [
                'lat.required' => "กรุณาเลือกพิกัด",
                'lng.required' => "กรุณาเลือกพิกัด",

                'store_name.required' => "กรุณาป้อนชื่อร้าน",
                'store_name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",

                'full_name.required' => "กรุณาป้อนชื่อ-นามสกุล",
                'full_name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",

                'tel.required' => "กรุณาป้อนเบอร์ติดต่อ",
                'tel.max' => "ห้ามป้อนเกิน 10 ตัว",

                'address.required' => "กรุณาป้อนที่อยู่",


                'image.required' => "กรุณใส่รูปภาพร้าน",
                'image.mimes' => "ประเภทของไฟล์รูปภาพไม่ถูกต้อง",
            ],

        );


        //ทำอัพโหลดข้อมูล ลูกค้า   ฟังชันก์นี้


        //อัพโหลดรูป address img 
        //การเข้ารหัสรูปภาพ
        $address_img = $request->file('image');
        //   dd($profile_img);

        // //  generate ชื่อภาพ
        $name_gen = hexdec(uniqid());
        // dd($name_gen);
        // // ดึงนามสกุลไฟล์ภาพ
        $img_ext = strtolower($address_img->getClientOriginalExtension());
        // //  รวมชื่อกับนามสกุลไฟล์ 
        $img_name = $name_gen . '.' . $img_ext;

        // // //บันทึกข้อมูลเเละอัพโหลด
        $upload_location = 'image/store_image/';
        $full_path = $upload_location . $img_name;
        //  dd($full_path);

        AppLocation::insert([
            'image' => $full_path,
            'latitude' => $request->lat,
            'longitude' => $request->lng,
            'store_name' => $request->store_name,
            'full_name' => $request->full_name,
            'tel' => $request->tel,
            'address' => $request->address,
            'created_at' => Carbon::now()

        ]);

        //อัพโหลดภาพ
        $address_img->move($upload_location, $img_name);


        return redirect()->route('locationAll')->with('success', "ระบบได้ทำการบันทึกข้อมูลเรียบร้อยเเล้ว");
    }

    public function view($id)
    {
        $data = AppLocation::find($id);
        // dd($data);
        return view('customer.view', compact('data'));
    }
    public function edit($id)
    {
        $data = AppLocation::find($id);
        //dd($department->department_name);


        return view('customer.edit', compact('data'));
    }

    public function delete($id)
    {

        //1.ลบภาพ
        $image = AppLocation::find($id)->image;
        unlink($image);
        //2.ลบข้อมูลจากฐานข้อมูล
        $delete = AppLocation::find($id)->delete();
        return redirect()->back()->with('success', "ลบข้อมูลเรียบร้อย");
    }


    public function update(Request $request, $id)
    {

         //dd($request->all());

        // ตรวจสอบข้อมูล
        $request->validate(
            [
                'lat' => 'required',
                'lng' => 'required',
                'store_name' => 'required|max:255',
                'full_name' => 'required|max:255',
                'tel' => 'required|max:10',
                'address' => 'required',
                'image' => 'mimes:jpg,jpeg,png'
            ],
            [
                'lat.required' => "กรุณาเลือกพิกัด",
                'lng.required' => "กรุณาเลือกพิกัด",

                'store_name.required' => "กรุณาป้อนชื่อร้าน",
                'store_name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",

                'full_name.required' => "กรุณาป้อนชื่อ-นามสกุล",
                'full_name.max' => "ห้ามป้อนเกิน 255 ตัวอักษร",

                'tel.required' => "กรุณาป้อนเบอร์ติดต่อ",
                'tel.max' => "ห้ามป้อนเกิน 10 ตัว",

                'address.required' => "กรุณาป้อนที่อยู่",



                'image.mimes' => "ประเภทของไฟล์รูปภาพไม่ถูกต้อง",
            ],

        );

        //การเข้ารหัสรูปภาพ
        $service_image = $request->file('image');

        //อัพเดทภาพเเละชื่อ
        if ($service_image) {


            //generate ชื่อภาพ
            $name_gen = hexdec(uniqid());

            //ดึงนามสกุลไฟล์ภาพ
            $img_ext = strtolower($service_image->getClientOriginalExtension());
            //รวมชื่อกับนามสกุลไฟล์ 
            $img_name = $name_gen . '.' . $img_ext;

            //อัพโหลดเเละอัพเดทข้อมูล
            $upload_location = 'image/store_image/';
            $full_path = $upload_location . $img_name;


            //อัพเดทข้อมูล
            AppLocation::find($id)->update([

               
                'latitude' => $request->lat,
                'longitude' => $request->lng,
                'store_name' => $request->store_name,
                'full_name' => $request->full_name,
                'tel' => $request->tel,
                'address' => $request->address,
                'image' => $full_path,
            ]);

            //ลบภาพเก่าเเละอัพภาพใหม่เเทนที่
            $old_image = $request->old_image;
            unlink($old_image);

            //อัพโหลดภาพ
            $service_image->move($upload_location, $img_name);

            return redirect()->route('locationAll')->with('success', "อัพเดทข้อมูลเรียบร้อย");
        } else {
            //อัพเดทชื่ออย่างเดียว
            //อัพเดทข้อมูล
            AppLocation::find($id)->update([

                'latitude' => $request->lat,
                'longitude' => $request->lng,
                'store_name' => $request->store_name,
                'full_name' => $request->full_name,
                'tel' => $request->tel,
                'address' => $request->address,


            ]);
            return redirect()->route('locationAll')->with('success', "อัพเดทข้อมูลเรียบร้อย");
        }
    }
}
