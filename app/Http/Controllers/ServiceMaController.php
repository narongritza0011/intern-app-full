<?php

namespace App\Http\Controllers;

use App\ServiceMa;
use App\User;
use DataTables;
use Illuminate\Http\Request;

class ServiceMaController extends Controller
{

    public function index(Request $request)
    {
        
    //     $room = ServiceMa::leftJoin('users', 'users.id', '=', 'service_mas.emp_id')
    //     ->get([ 'service_mas.name', 'service_mas.emp_id','service_mas.username']);
    //  dd($room);



        if ($request->ajax()) {
            $data = ServiceMa::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->name;
                })

                ->addColumn('edit', function ($data) {
                    return '<a class="btn btn-warning" onclick="edit(' . $data->id . ')"><i class="fas fa-edit"></i></a><a class="btn btn-danger" onclick="del(' . $data->id . ')" ><i class="fas fa-trash-alt"></i></a>';
                })


                ->rawColumns(['edit', 'name'])
                ->make(true);
        }

        return view('service_ma.index');
    }



    public function store(Request $request)
    {


        if ($request->id) {

            $data = ServiceMa::find($request->id);
        } else {
            $data = new ServiceMa();
        }

        $data->emp_id = $request->emp_id;
        $data->name = $request->name;
        $data->serial = md5($request->name);
        $data->save();

        $json['success'] = true;
        $json['message'] = '';
        // return response()->json($json);
        return $json;
    }



    public function edit($id)
    {
        $data = ServiceMa::find($id);

        $json['message'] = '';
        $json['success'] = true;
        $json['cus'] = $data;
        return response()->json($json);
    }



    public function del($id)
    {
        $data = ServiceMa::find($id);
        $data->delete();

        $json['success'] = true;
        $json['message'] = '';
        return response()->json($json);
    }
}
