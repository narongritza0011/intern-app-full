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
                        <h3>อนุมัติเเล้ว</h3>

                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-inverse table-border-style table-striped text-center" id="dtTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ลำดับ</th>
                                            <th class="text-center">ชื่อ-นามสกุล</th>
                                            <th class="text-center">มหาวิทยาลัย</th>
                                            <th class="text-center">เบอร์ติดต่อ</th>
                                            <th class="text-center">ช่วงเวลาฝึกงาน</th>
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

<!-- Modal  อัพโหลดเอกสารส่งตัว-->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">อัพโหลดเอกสารส่งตัว</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('UploadFileIntern.save') }}" id="upload_intern" method="post" enctype='multipart/form-data'>
                    @csrf
                    <input class="file-input" type="file" id="intern_file" name="file_internship[]" accept="image/png,image/jpeg,application/pdf" multiple required>
                    @error('file_internship')
                    <div class="my-2">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                    <input class="form-control  col-9" type="hidden" name="intern_id" id="intern_id">
                    <input class="form-control  col-9" type="hidden" name="full_name" id="full_name_File">
                    <input class="form-control  col-9" type="hidden" name="phone" id="phone_File">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-success">บันทึก</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal view file เอกสารส่งตัว -->
<div class="modal fade" id="viewFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เอกสารส่งตัว</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="mb-5">หน้าดูไฟล์เอกสารส่งตัว</h3>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <hr>




                        <table id="docList">
                            <thead>
                                <tr>

                                    <th>ชื่อไฟล์</th>

                                </tr>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>

        </div>
    </div>
</div>


<div class="modal" id="addCustomer" tabindex="-1">
    <form action="" method="post" id="shared-form" enctype='multipart/form-data'>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ดูข้อมูลผู้สมัครฝึกงาน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="d-flex justify-content-end">

                        <div class="mb-3">
                            <label class="form-label "></label>
                            <div class="mb-3 shadow">
                                <img id="profile" src="" width="150" height="150">


                            </div>
                        </div>

                    </div>

                    <input type="hidden" id="id" name="id">
                    <h5>ข้อมูลส่วนตัว</h5>
                    <hr>


                    <div class="row mb-2">
                        <div class="col-sm-12  col-md-6 col-lg-6">
                            <label class="form-label">วัน-เวลาที่สมัคร</label>
                            <input class="form-control text-success" type="text" id="created_at" readonly>
                        </div>
                        <div class="col-sm-12  col-md-6 col-lg-6">
                            <label for="exampleFormControlInput1" class="form-label">สถานะ</label>
                            <select class="form-select form-control " aria-label="Default select example" name="status" required>
                                <option value="กำลังรออนุมัติ">กำลังรออนุมัติ</option>
                                <option value="อนุมัติเเล้ว" selected>อนุมัติเเล้ว</option>
                                <option value="ฝึกงานเสร็จเเล้ว">ฝึกงานเสร็จเเล้ว</option>
                            </select>


                        </div>

                        <input class="form-control" type="hidden" name="emp_id" value="{{ Auth::user()->id }}">

                    </div>




                    <div class="row mb-2">
                        <div class="col-sm-12  col-md-12 col-lg-12">

                            <label class="form-label">ชื่อ-นามสกุล</label>

                            <div class="row">
                                <input class="form-control ml-3 col-2" type="text" id="name_title" readonly>
                                <input class="form-control  col-9" type="text" id="full_name" readonly>
                            </div>
                        </div>


                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-12  col-md-6 col-lg-3 col-xl-3">
                            <label class="form-label">หมายเลขบัตรประชาชน</label>
                            <input class="form-control" type="number" id="id_card_number" readonly>
                        </div>
                        <div class="col-sm-12  col-md-6 col-lg-3  col-xl-3">
                            <label class="form-label">เบอร์ติดต่อ</label>
                            <input class="form-control" type="number" id="phone" readonly>
                        </div>

                        <div class="col-sm-12  col-md-6 col-lg-3 col-xl-3">
                            <label class="form-label">ไลน์ Line</label>
                            <input class="form-control" type="text" id="line_id" readonly>
                        </div>
                        <div class="col-sm-12  col-md-6 col-lg-3 col-xl-3">
                            <label class="form-label">อีเมล์</label>
                            <input class="form-control" type="text" id="email_address" readonly>
                        </div>
                    </div>




                    <div class="row mb-2">
                        <div class="col-sm-12  col-md-6 col-lg-6 col-xl-6">
                            <label class="form-label">ใบอนุญาตขับขี่</label>
                            <input class="form-control" type="text" id="license" readonly>
                        </div>
                        <div class="col-sm-12  col-md-6 col-lg-6 col-xl-6">
                            <label class="form-label">ที่อยู่</label>
                            <textarea class="form-control" id="address" rows="1" readonly></textarea>
                        </div>

                    </div>


                    <h5 class="mt-3">ข้อมูลการศึกษา</h5>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-sm-12  col-md-6 col-lg-4 col-xl-4">
                            <label class="form-label">สาขา</label>
                            <input class="form-control" type="text" id="major" readonly>
                        </div>
                        <div class="col-sm-12  col-md-6 col-lg-4 col-xl-4">
                            <label class="form-label">คณะ</label>
                            <input class="form-control" type="text" id="faculty" readonly>
                        </div>
                        <div class="col-sm-12  col-md-6 col-lg-4 col-xl-4">
                            <label class="form-label">มหาวิทยาลัย</label>
                            <input class="form-control" type="text" id="university" readonly>
                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-sm-12  col-md-6 col-lg-6 col-xl-6">
                            <label class="form-label">วันที่เริ่มฝึกงาน</label>
                            <input class="form-control" type="text" id="start_intern" readonly>
                        </div>
                        <div class="col-sm-12  col-md-6 col-lg-6 col-xl-6">
                            <label class="form-label">วันที่สิ้นสุดการฝึกงาน</label>
                            <input class="form-control" type="text" id="end_intern" readonly>
                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-sm-12  col-md-6 col-lg-6 col-xl-6">
                            <label class="form-label">Website Blog Social Network อื่นๆ</label>
                            <textarea class="form-control" id="social" rows="2" readonly></textarea>
                        </div>
                        <div class="col-sm-12  col-md-6 col-lg-6 col-xl-6">
                            <label class="form-label">สิ่งที่สนใจ</label>
                            <textarea class="form-control" id="favorite" rows="2" readonly></textarea>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-12  col-md-6 col-lg-6 col-xl-6">
                            <label class="form-label">ความถนัด หรือ ภาษาในการเขียนโปรแกรม</label>
                            <textarea class="form-control" id="skill" rows="2" readonly></textarea>
                        </div>
                        <div class="col-sm-12  col-md-6 col-lg-6 col-xl-6">
                            <label class="form-label">แนะนำตัวให้เรารู้จักคุณ</label>
                            <textarea class="form-control" id="introduce_yourself" rows="2" readonly></textarea>
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
    var route_index = "{{ route('allApproved') }}"
    var route_store = "{{ route('internship.store') }}"
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
                    data: 'full_name',
                    name: 'name'
                },
                {
                    data: 'university',
                    name: 'name'
                },
                {
                    data: 'phone',
                    name: 'name'
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

    function editData(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('manage/viewIntern') }}" + "/" + id,
            dataType: "json",
            success: function(response) {
                console.log(response)
                $('#id').val(response.cus.id)
                $('#image').val(response.cus.profile)
                // document.getElementById("profile").src = data;
                document.getElementById("profile").src =
                    '{{asset("")}}' + response.cus.profile;
                $('#name_title').val(response.cus.name_title)
                $('#full_name').val(response.cus.full_name)
                $('#id_card_number').val(response.cus.id_card_number)
                $('#phone').val(response.cus.phone)
                $('#line_id').val(response.cus.line_id)
                $('#email_address').val(response.cus.email_address)
                $('#address').val(response.cus.address)
                $('#license').val(response.cus.license)
                $('#major').val(response.cus.major)
                $('#faculty').val(response.cus.faculty)
                $('#university').val(response.cus.university)
                $('#start_intern').val(response.cus.start_intern)
                $('#end_intern').val(response.cus.end_intern)
                $('#social').val(response.cus.social)
                $('#favorite').val(response.cus.favorite)
                $('#skill').val(response.cus.skill)
                $('#introduce_yourself').val(response.cus.introduce_yourself)
                $('#created_at').val(response.cus.created_at)
                $('#status').val(response.cus.status)
                $('#emp_id').val(response.cus.emp_id)

                $('#addCustomer').modal('show')
            }
        });
    }



    function createCus() {
        $('#uploadModal').modal('show')
    }


    function uploadData(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('manage/viewUploadFileIntern') }}" + "/" + id,
            dataType: "json",
            success: function(response) {
                console.log(response)
                $('#intern_id').val(response.cus.id)
                $('#full_name_File').val(response.cus.full_name)
                // document.getElementsByName("full_name_File").val = response.cus.full_name;
                $('#phone_File').val(response.cus.phone)
                $('#uploadModal').modal('show')
            }
        });
    }






    function viewFile(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('manage/internship/Document') }}" + "/" + id,
            dataType: "json",
            success: function(response) {
                //console.log(response)

                $('#docList tbody').html(response.cus)

                $('#viewFileModal').modal('show')
            }
        });
    }
</script>
@endsection