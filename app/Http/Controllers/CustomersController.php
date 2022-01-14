<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Customers::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('edit', function ($data) {
                    return '<a class="btn btn-warning" onclick="editData(' . $data->id . ')"><i class="fas fa-edit"></i> Edit</a>';
                })
                ->addColumn('delete', function ($data) {
                    return '<a class="btn btn-danger" onclick="delData(' . $data->id . ')" ><i class="fas fa-trash-alt"></i> Delete</a>';
                })
                ->rawColumns(['edit', 'delete', 'name'])
                ->make(true);
        }
        return view('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delCus($id)
    {
        $data = Customers::find($id);
        $data->delete();

        $json['success'] = true;
        $json['message'] = '';
        return response()->json($json);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        if ($request->id) {

            $data = Customers::find($request->id);
        } else {
            $data = new Customers();
        }

        $data->name = $request->name;
        $data->phonenumber = $request->phoneNumber;
        $data->save();

        $json['success'] = true;
        $json['message'] = '';
        // return response()->json($json);
        return $json;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function editCus($id)
    {
        $data = Customers::find($id);

        $json['message'] = '';
        $json['success'] = true;
        $json['cus'] = $data;
        return response()->json($json);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers)
    {
        //
    }
}
