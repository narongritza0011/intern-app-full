@extends('layouts.backend')
@section('content')
{{-- สร้างคอนเทนเนอร์ให้แสดงข้อมูล --}}
<div class="contrainer-fluid">
    {{-- สร้างคลาส card ทำหน้าที่ เป็นพื้นหลังในการแสดงข้อมูล --}}
    <div class="card">
        {{-- การ์ดบอดี้ จะเป็นส่วนที่จะแสดงข้อมูลของคลาส การ์ด --}}
        <div class="card-body">
            {{-- แบ่งบรรทัด สร้างแถวขึ้นมาใหม่ --}}
            <div class="row">
                {{-- เริ่มการใช้งาน grid --}}
                <div class="col-12">
                    @if(session("success"))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="row">
                        <h3>
                            เเสดงข้อมูลลูกค้า
                        </h3>
                        <div class="col-12" align="right">
                            <a class="btn btn-success" href="{{route('ip-tracker')}}">เพิ่ม</a>
                            <!-- <a class="btn btn-success" href="{{url('manager/location/show')}}">เพิ่ม</a> -->
                        </div>

                    </div>


                    <hr>
                    <div class="row">
                        <div class="col-12">

                            <div class="table-responsive">
                                <table class="table table-bordered table-inverse table-border-style table-striped text-center" id="dtTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ลำดับ</th>
                                            <th class="text-center">ชื่อร้าน</th>
                                            <th class="text-center">ชื่อ-นามสกุล</th>
                                            <th class="text-center">เบอร์ติดต่อ</th>
                                            <th class="text-center">วัน-เวลา</th>
                                            <th class="text-center">จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
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
    var route_index = "{{ route('locationAll') }}"
    var route_store = "{{ route('customer.store') }}"
    $(function() {
        table = $('#dtTable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: route_index,
                global: false,
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                },
                {
                    data: 'store_name',
                    name: 'store_name'
                },
                {
                    data: 'full_name',
                    name: 'full_name'
                },
                {
                    data: 'tel',
                    name: 'tel'
                },
                {
                    data: 'time',
                    name: 'time'
                },
                {
                    data: 'edit',
                    name: 'edit',
                    orderable: false,
                    searchable: false
                },

            ],
        })

        $("#shared-form").on('submit', function(e) {
            e.preventDefault()
            formData = new FormData(this);
            $.ajax({
                type: 'post',
                url: route_store,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        table.ajax.reload();
                        $('#addCustomer').modal('hide')
                        show_success();
                    } else {
                        show_warning(response.message);
                    }
                },
                error: function(err) {

                    show_error('error');
                    console.log(err.responseText);
                }
            });
        })

    })



    
</script>
@endsection