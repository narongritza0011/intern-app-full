<?php

namespace App\Http\Controllers;

use App\Location as AppLocation;

use App\UnlockSystem;
use DataTables;
use Illuminate\Http\Request;

class UnlockSystemController extends Controller
{
    public function index(Request $request)
    {

        $item_cus = AppLocation::all();



        if ($request->ajax()) {
            $data = UnlockSystem::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->name;
                })

                ->addColumn('edit', function ($data) {
                    return '<a class="btn btn-warning" onclick="editUnlock(' . $data->id . ')"><i class="fas fa-edit"></i></a><a class="btn btn-danger" onclick="delUnlock(' . $data->id . ')" ><i class="fas fa-trash-alt"></i></a>';
                })
                ->addColumn('time', function ($data) {
                    return  '<div class="text-success">' . $data->created_at .  '</div>';
                })

                ->rawColumns(['edit', 'name', 'time'])
                ->make(true);
        }

        return view('unlock.index', compact('item_cus'));
    }


    public function store(Request $request)
    {
        // dd($request->all());


        //     //test  สร้าง รหัส


        //    dd($trakool_name);

        $trakool_name = $request->store_name;
        $product_id = md5("trakool" . md5($trakool_name));
        $password = md5(md5(md5("trakool" . $product_id)));

        //  dd('Serial = ' . $product_id, 'Password = ' . $password);




        if ($request->id) {

            $data = UnlockSystem::find($request->id);
        } else {
            $data = new UnlockSystem();
        }

        $data->emp_id = $request->emp_id;
        $data->name = $request->name;
        $data->serial = $product_id;
        $data->password = $password;
        $data->save();

        $json['success'] = true;
        $json['message'] = '';
        // return response()->json($json);
        return $json;
    }



    public function editUnlock($id)
    {
        $data = UnlockSystem::find($id);

        $json['message'] = '';
        $json['success'] = true;
        $json['cus'] = $data;
        return response()->json($json);
    }


    public function delUnlock($id)
    {
        $data = UnlockSystem::find($id);
        $data->delete();

        $json['success'] = true;
        $json['message'] = '';
        return response()->json($json);
    }
}
