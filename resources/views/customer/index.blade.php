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
                        <div class="col-12" align="right">
                            <button class="btn btn-success" onclick="createCus()">Add data</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">

                            <div class="table-responsive">
                                <table class="table table-bordered table-inverse table-border-style table-striped text-center" id="dtTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Phone Number</th>
                                            <th class="text-center">เเก้ไข</th>
                                            <th class="text-center">ลบ</th>
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
                    <h5 class="modal-title">Customer Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" id="name" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Phone number</label>
                            <input class="form-control" type="number" id="phoneNumber" name="phoneNumber">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
    var route_index = "{{ route('customer.index') }}"
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phonenumber',
                    name: 'phonenumber'
                },
                {
                    data: 'edit',
                    name: 'edit',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'delete',
                    name: 'delete',
                    orderable: false,
                    searchable: false
                }
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

    function editData(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('manage/editCus') }}" + "/" + id,
            dataType: "json",
            success: function(response) {
                console.log(response)
                $('#id').val(response.cus.id)
                $('#name').val(response.cus.name)
                $('#phoneNumber').val(response.cus.phonenumber)
                $('#addCustomer').modal('show')
            }
        });
    }

    function delData(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('manage/delCus') }}" + "/" + id,
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