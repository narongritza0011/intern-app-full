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
                    <div class="row">
                        <h3>จัดการพนักงาน</h3>

                    </div>
                    <div class="col-12" align="right">
                        <button class="btn btn-success" onclick="createCus()">เพิ่ม</button>
                    </div>
                    <!-- {{ Auth::user()->username }} -->
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-inverse table-border-style table-striped text-center" id="dtTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ลำดับ</th>
                                            <th class="text-center">ชื่อผู้ใช้</th>
                                            <th class="text-center">อีเมล์</th>
                                            <th class="text-center">เบอร์โทร</th>
                                            <th class="text-center">เวลาที่สร้างบัญชี</th>
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
<div class="modal" id="addCustomer" tabindex="-1">
    <form action="" method="post" id="shared-form" enctype='multipart/form-data'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ข้อมูลพนักงาน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">ชื่อผู้ใช้งาน</label>
                            <input class="form-control" type="text" id="username" name="username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">เบอร์โทร</label>
                            <input class="form-control" type="number" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">อีเมล์</label>
                            <input class="form-control" type="email" id="email" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">รหัสผ่าน</label>
                            <input class="form-control" type="text" id="password" name="password">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-success">บันทึก</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
    var route_index = "{{ route('userAll') }}"
    var route_store = "{{ route('createUser') }}"
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
                    data: 'username',
                    name: 'username'
                },

                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
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

    function createCus() {
        $('#addCustomer').modal('show')
    }

    function editUser(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('manager/editUser') }}" + "/" + id,
            dataType: "json",
            success: function(response) {
                console.log(response)
                $('#id').val(response.cus.id)
                $('#username').val(response.cus.username)
                $('#phone').val(response.cus.phone)
                $('#email').val(response.cus.email)
                $('#password').val(response.cus.password)
                $('#addCustomer').modal('show')
            }
        });
    }

    function delUser(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('manager/delUser') }}" + "/" + id,
            dataType: "json",
            success: function(response) {
                console.log(response)
                table.ajax.reload();
                show_success();
            }
        });
    }
</script>
@endsection