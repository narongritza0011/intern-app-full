<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {


        if ($request->ajax()) {
            $data = User::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->name;
                })

                ->addColumn('edit', function ($data) {
                    return '<a class="btn btn-warning mr-1" onclick="editUser(' . $data->id . ')"><i class="fas fa-edit"></i> </a> <a class="btn btn-danger" onclick="delUser(' . $data->id . ')" ><i class="fas fa-trash-alt"></i></a>';
                })
                ->addColumn('time', function ($data) {
                    return  '<div class="text-success">' . $data->created_at . '</div>';
                })

                ->rawColumns(['edit', 'name', 'time'])
                ->make(true);
        }


        return view('user.index');
    }


    public function register(Request $request)
    {
        //   dd($request->all());
        if ($request->id) {

            $data = User::find($request->id);
        } else {
            $data = new User();
        }

        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->user_type = "admin";
        $data->password = Hash::make($request->password);

        $data->save();

        $json['success'] = true;
        $json['message'] = '';
        // return response()->json($json);
        return $json;
    }


    public function editUser($id)
    {
        $data = User::find($id);

        $json['message'] = '';
        $json['success'] = true;
        $json['cus'] = $data;
        return response()->json($json);
    }


    public function delUser($id)
    {
        $data = User::find($id);
        $data->delete();

        $json['success'] = true;
        $json['message'] = '';
        return response()->json($json);
    }


    public function updateUser(Request $request)
    {

        $data = User::find($request->id);
        $data->username = $request->username;

        if ($request->password) {
            if ($request->password != $request->password_confirmation) {

                $json['message'] = 'รหัสผ่านไม่ถูกต้อง';
                $json['success'] = false;
                return response()->json($json);
            } else {

                $data->password = Hash::make($request->password);
            }
        }


        $data->save();
        $json['message'] = '';
        $json['success'] = true;
        return response()->json($json);
    }
}
