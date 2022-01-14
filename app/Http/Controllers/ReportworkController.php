<?php

namespace App\Http\Controllers;

use App\ReportWork;
use DataTables;
use Illuminate\Http\Request;

class ReportworkController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ReportWork::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('edit', function ($data) {
                    return '<a class="btn btn-warning mr-1" onclick="editProduct(' . $data->id . ')"><i class="fas fa-edit"></i> </a> <a class="btn btn-danger" onclick="delProduct(' . $data->id . ')" ><i class="fas fa-trash-alt"></i></a>';
                })
                ->addColumn('time', function ($data) {
                    return  '<div class="text-success">' . $data->created_at . '</div>';
                })

                ->rawColumns(['edit', 'name', 'time'])
                ->make(true);
        }
        return view('report.work');
    }



    public function delReport($id)
    {
        $data = ReportWork::find($id);
        $data->delete();

        $json['success'] = true;
        $json['message'] = '';
        return response()->json($json);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->id) {

            $data = ReportWork::find($request->id);
        } else {
            $data = new ReportWork();
        }
        $data->emp_id = $request->emp_id;
        $data->detail = $request->detail;
        $data->save();

        $json['success'] = true;
        $json['message'] = '';
        // return response()->json($json);
        return $json;
    }


    public function editReport($id)
    {
        $data = ReportWork::find($id);

        $json['message'] = '';
        $json['success'] = true;
        $json['cus'] = $data;
        return response()->json($json);
    }
}
