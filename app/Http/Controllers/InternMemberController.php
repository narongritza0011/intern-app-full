<?php

namespace App\Http\Controllers;

use App\Internship;
use App\SubmitDocument;
use DataTables;
use Illuminate\Http\Request;

class InternMemberController extends Controller
{

    function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Internship::where('status', 'กำลังรออนุมัติ')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->name;
                })

                ->addColumn('edit', function ($data) {
                    return '<a class="btn btn-warning mr-1" onclick="editData(' . $data->id . ')"><i class="fas fa-eye"></i> </a> <a class="btn btn-primary mr-1" href="internship/resume/' . $data->id . '" ><i class="fas fa-file"></i></a>';
                })
                ->addColumn('time', function ($data) {
                    return  '<div class="text-success">' . $data->start_intern . ' - ' . $data->end_intern . '</div>';
                })

                ->rawColumns(['edit', 'name', 'time'])
                ->make(true);
        }
        return view('internship.index');
    }



    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->id) {

            $data = Internship::find($request->id);
        } else {
            $data = new Internship();
        }

        $data->status = $request->status;
        $data->emp_id = $request->emp_id;
        $data->save();

        $json['success'] = true;
        $json['message'] = '';
        // return response()->json($json);
        return $json;
    }

    public function uploadFileIntern(Request $request)
    {
        // dd($request->all());
        if ($request->id) {

            $data = Internship::find($request->id);
        } else {
            $data = new Internship();
        }

        $data->status = $request->status;
        $data->save();

        $json['success'] = true;
        $json['message'] = '';
        // return response()->json($json);
        return $json;
    }






    public function view($id)
    {
        $data = Internship::find($id);

        $json['message'] = '';
        $json['success'] = true;
        $json['cus'] = $data;
        return response()->json($json);
    }



    public function viewUploadFile($id)
    {
        $data = Internship::find($id);

        $json['message'] = '';
        $json['success'] = true;
        $json['cus'] = $data;
        return response()->json($json);
    }




    public function resume($id)
    {
        $data = Internship::find($id);
        // dd($data);
        return view('internship.view_resume', compact('data'));
    }


    public function Document($id)
    {

        // $data = SubmitDocument::where('intern_id' == $id)->get();
        $data['documents'] = SubmitDocument::where('intern_id', '=', $id)->get();

        // $path = public_path('upload/' . $data[0]['file_internship']);
        // dd($path);
        // dd($data);
        // $detail = $data['file_internship'];
        // $path = storage_path('app/upload/');
        // dd($path . $detail);
        // return response()->download($path . $detail);
        // $data['']
        $doc = view('internship.docList', $data);

        // return view('internship.view_document', compact('data',));
        $json['message'] = '';
        $json['success'] = true;
        $json['cus'] = $doc->render();
        return response()->json($json);
    }


    public function downloadDocument($id)
    {
        $data = SubmitDocument::find($id);
        //    dd($data['file_internship']);

        //  dd('downloadDocument' . $id);
        $detail = $data['file_internship'];
        $path = storage_path('app/upload/');
        // dd($path . $detail);
        return response()->download($path . $detail);
    }



    //หน้าอนุมัติเเล้ว

    function approved(Request $request)
    {

        if ($request->ajax()) {
            $data = Internship::where('status', 'อนุมัติเเล้ว')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->name;
                })

                ->addColumn('edit', function ($data) {
                    return '<a class="btn btn-warning mr-1" onclick="editData(' . $data->id . ')"><i class="fas fa-eye"></i> </a> <a class="btn btn-primary mr-1" href="internship/resume/' . $data->id . '" ><i class="fas fa-file"></i></a>  <a  onclick="uploadData(' . $data->id . ')" class="btn btn-success" data-toggle="modal" data-target="#uploadModal">
                    <i class="fa fa-upload"></i>
                  </a>   <a class="btn btn-primary text-white mr-1" onclick="viewFile(' . $data->id . ')"><i class="fas fa-download"></i> เอกสารส่งตัว</a>';
                })
                ->addColumn('time', function ($data) {
                    return  '<div class="text-success">' . $data->start_intern . ' - ' . $data->end_intern . '</div>';
                })

                ->rawColumns(['edit', 'name', 'time'])
                ->make(true);
        }
        return view('internship.approved');
    }



    //หน้าฝึกงานเสร็จเเล้ว

    function internSuccess(Request $request)
    {

        if ($request->ajax()) {
            $data = Internship::where('status', 'ฝึกงานเสร็จเเล้ว')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->name;
                })

                ->addColumn('edit', function ($data) {
                    return '<a class="btn btn-warning " onclick="editData(' . $data->id . ')"><i class="fas fa-eye"></i> </a> <a class="btn btn-primary mr-1" href="internship/resume/' . $data->id . '" ><i class="fas fa-file"></i></a><a class="btn btn-primary text-white mr-1" onclick="viewFile(' . $data->id . ')"><i class="fas fa-download"></i> เอกสารส่งตัว</a>';
                })
                ->addColumn('time', function ($data) {
                    return  '<div class="text-success">' . $data->start_intern . ' - ' . $data->end_intern . '</div>';
                })


                ->rawColumns(['edit', 'name', 'time'])
                ->make(true);
        }
        return view('internship.intern_success');
    }
}
