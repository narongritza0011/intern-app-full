<?php

namespace App\Http\Controllers;

use App\Product;
use DataTables;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('edit', function ($data) {
                    return '<a class="btn btn-warning mr-1" onclick="editProduct(' . $data->id . ')"><i class="fas fa-edit"></i> </a> <a class="btn btn-danger" onclick="delProduct(' . $data->id . ')" ><i class="fas fa-trash-alt"></i></a>';
                })
                ->addColumn('price', function ($data) {
                    return  '<div class="text-success">' . $data->price . '</div>';
                })

                ->rawColumns(['edit', 'name','price'])
                ->make(true);
        }
        return view('product.index');
    }



    public function delProduct($id)
    {
        $data = Product::find($id);
        $data->delete();

        $json['success'] = true;
        $json['message'] = '';
        return response()->json($json);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->id) {

            $data = Product::find($request->id);
        } else {
            $data = new Product();
        }
        $data->emp_id = $request->emp_id;
        $data->id_product = $request->id_product;
        $data->name = $request->name;
        $data->type = $request->type;
        $data->price = $request->price;
        $data->price = $request->price;
        $data->save();

        $json['success'] = true;
        $json['message'] = '';
        // return response()->json($json);
        return $json;
    }


    public function editProduct($id)
    {
        $data = Product::find($id);

        $json['message'] = '';
        $json['success'] = true;
        $json['cus'] = $data;
        return response()->json($json);
    }
}
