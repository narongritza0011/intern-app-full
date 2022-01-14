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
                    <h3>จัดการสินค้า</h3>

                    <div class="row">
                        <div class="col-12" align="right">
                            <button class="btn btn-success" onclick="createCus()">เพิ่มสินค้า</button>
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
                                            <th class="text-center">รหัสสินค้า</th>
                                            <th class="text-center">ชื่อสินค้า</th>
                                            <th class="text-center">ประเภท</th>
                                            <th class="text-center">ราคา</th>
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
                    <h5 class="modal-title">รายละเอียดสินค้า</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <input class="form-control" type="hidden" name="emp_id" value="{{ Auth::user()->id }}">


                    <input class="form-control" type="hidden" id="id" name="id">



                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">รหัสสินค้า</label>
                            <input class="form-control" type="text" id="id_product" name="id_product">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">ชื่อสินค้า</label>
                            <input class="form-control" type="text" id="name" name="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">ประเภท</label>
                            <input class="form-control" type="text" id="type" name="type">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">ราคา</label>
                            <input class="form-control" type="text" id="price" name="price">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-success">บันทึก</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
    var route_index = "{{ route('product.index') }}"
    var route_store = "{{ route('product.store') }}"
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
                    data: 'id_product',
                    name: 'id_product'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'price',
                    name: 'price'
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

    function editProduct(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('manager/editProduct') }}" + "/" + id,
            dataType: "json",
            success: function(response) {
                console.log(response)
                $('#id').val(response.cus.id)
                $('#id_product').val(response.cus.id_product)
                $('#name').val(response.cus.name)
                $('#type').val(response.cus.type)
                $('#price').val(response.cus.price)

                $('#addCustomer').modal('show')
            }
        });
    }

    function delProduct(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('manager/delProduct') }}" + "/" + id,
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