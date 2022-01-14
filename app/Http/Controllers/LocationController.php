<?php

namespace App\Http\Controllers;

use App\Location as AppLocation;
use DataTables;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    //ตารางหน้าจัดการลูกค้า
    // public function index(Request $request)
    // {


    //     if ($request->ajax()) {
    //         $data = AppLocation::all();

    //         return DataTables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('name', function ($data) {
    //                 return $data->name;
    //             })

    //             ->addColumn('edit', function ($data) {
    //                 return '<a class="btn btn-warning mr-1" onclick="editData(' . $data->id . ')"><i class="fas fa-eye"></i> </a> <a class="btn btn-primary mr-1" href="internship/resume/' . $data->id . '" ><i class="fas fa-edit"></i></a><a  onclick="uploadData(' . $data->id . ')" class="btn btn-success mr-1" data-toggle="modal" data-target="#uploadModal">
    //                 <i class="fa fa-upload"></i>
    //               </a><a class="btn btn-danger mr-1" href="internship/resume/' . $data->id . '" ><i class="fas fa-trash-alt"></i></a>';
    //             })
    //             ->addColumn('time', function ($data) {
    //                 return  '<div class="text-success">' . $data->created_at .  '</div>';
    //             })

    //             ->rawColumns(['edit', 'name', 'time'])
    //             ->make(true);
    //     }

    //     return view('customer.location');
    // }

    // public function indexStore()
    // {
    //     return view('customer.insert');
    // }




    // public function store(Request $request)
    // {

    //     //test  สร้าง รหัส
    //     $trakool_name = "ร้านขายของชำ";
    //     $product_id = md5("trakool" . md5($trakool_name));
    //     $password = md5(md5(md5("trakool" . $product_id)));
    //     dd('Serial = ' . $product_id, 'Password = ' . $password);



    //     //  dd($request->all());
    //     // AppLocation::insert([
    //     //     'full_name' => $request->full_name,
    //     //     'tel' => $request->tel,
    //     //     'address' => $request->address,
    //     //     'latitude' => $request->lat,
    //     //     'longitude' => $request->lng,
    //     //     'created_at' => now()
    //     // ]);
    //     return view('customer.location');
    // }
}
