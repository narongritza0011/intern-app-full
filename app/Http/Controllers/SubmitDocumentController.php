<?php

namespace App\Http\Controllers;

use App\SubmitDocument;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubmitDocumentController extends Controller
{
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'file_internship' => 'required',
            'file_internship.*' => 'mimes:jpg,bmp,png,pdf,docx|max:4000'
            //   'file_internship' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'file_internship.*' => 'mimetypes:application/pdf|max:10000'


        ]);


        if ($request->hasFile('file_internship')) {
            foreach ($request->file('file_internship') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('upload', $filename);

                $SubmitDocument = new SubmitDocument;
                $SubmitDocument->file_internship = $filename;
                $SubmitDocument->intern_id = $request->intern_id;
                $SubmitDocument->full_name = $request->full_name;
                $SubmitDocument->phone = $request->phone;
                $SubmitDocument->status = 1;
                $SubmitDocument->created_at = Carbon::now();
                $SubmitDocument->save();
            }
        }
        return back()->with('success', "ระบบได้อัพโหลดข้อมูลเรียบร้อยเเล้ว");
    }
}
