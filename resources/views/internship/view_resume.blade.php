@extends('layouts.backend')
@section('content')
{{-- สร้างคอนเทนเนอร์ให้แสดงข้อมูล --}}
<div class="contrainer-fluid">
    {{-- สร้างคลาส card ทำหน้าที่ เป็นพื้นหลังในการแสดงข้อมูล --}}
    <a class="btn btn-success m-3" href="{{url()->previous()}}">ย้อนกลับ</a>

    <div class="card">
        {{-- การ์ดบอดี้ จะเป็นส่วนที่จะแสดงข้อมูลของคลาส การ์ด --}}
        <div class="card-body">
            {{-- แบ่งบรรทัด สร้างแถวขึ้นมาใหม่ --}}
            <div class="row">
                {{-- เริ่มการใช้งาน grid --}}
                <div class="col-12">
                    <h3 class="mb-5">หน้าดูรายละเอียดไฟล์ที่เเนบ</h3>


                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <h4> Resume</h4>
                            <hr>
                            <iframe src="{{asset($data->resume)}}" frameborder="0" height="600" width="600"></iframe>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <h4> Transcript</h4>
                            <hr>
                            <iframe src="{{asset($data->transcript)}}" frameborder="0" height="600" width="600"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script>







</script>
@endsection