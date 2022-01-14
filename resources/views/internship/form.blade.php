<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครฝึกงาน TRAKOOL SOFTWARE COMPANY ONLINE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <style>
        .error {
            color: red;
            font-style: italic;
            margin: 5px;
        }
    </style>
</head>

<body>


    <nav class="navbar shadow" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">


            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="{{ url('manage/internship') }}" class="button is-primary is-outlined">
                            <strong>ผู้ดูเเลระบบ</strong>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="text-primary mt-5">
            สมัครฝึกงาน TRAKOOL SOFTWARE COMPANY ONLINE
        </h1>
        @if(session("success"))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    <!-- <div class="container mt-5 mb-5">
        @foreach($member_intern as $row)
        <h1>
            <th>{{$row->phone}}</th>

            <td><img src="{{asset($row->profile)}}" width="100px" height="100px" alt=""></td>
            <!-- <td>{{$row->name_title.' '.$row->full_name}}</td>
             <iframe src="{{asset($row->resume)}}" frameborder="0"></iframe>
            <iframe src="{{asset($row->transcript)}}" frameborder="0"></iframe> --> 

    <!-- </h1> -->
    <!-- @endforeach -->

    </div>
    <form action="{{route('register.save')}}" method="post" id="registration" name="registration" enctype="multipart/form-data">
        @csrf

        <div class="container shadow mb-5 p-3 ">

            <div class="d-flex justify-content-end">

                <div class="mb-3">
                    <label class="form-label "></label>
                    <div class="mb-3 shadow">
                        <img id="preview" width="150" height="150">
                    </div>
                </div>

            </div>


            <div id="file-js-example" class="file has-name is-primary justify-content-end">

                <label class="file-label">
                    <input class="file-input" type="file" id="image" name="profile" accept="image/png,image/jpeg" required>
                    <span class="file-cta">
                        <span class="file-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-image" viewBox="0 0 16 16">
                                <path d="M8.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v8l-2.083-2.083a.5.5 0 0 0-.76.063L8 11 5.835 9.7a.5.5 0 0 0-.611.076L3 12V2z" />
                            </svg>
                        </span>
                        <span class="file-label">
                            รูปภาพประจำตัว
                        </span>
                    </span>
                    <span class="file-name">
                        กรุณาเลือกไฟล์
                    </span>
                </label>

            </div>
            <div class="file justify-content-end">
                <small>ไฟล์ประเภท (JPEG,PNG) ขนาดไฟล์ไม่เกิน 1 Mb</small>
            </div>


            <h3>ข้อมูลส่วนตัว</h3>
            <hr>

            <div class="row">
                <div class="col-sm-6  col-md-2 col-lg-2">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">คำนำหน้า</label>
                        <select class="form-select" aria-label="Default select example" name="name_title" required>
                            <option disabled selected>กรุณาเลือก</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="คุณ">คุณ</option>
                        </select>

                    </div>
                </div>
                <div class="col-sm-6 col-md-10 col-lg-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" name="full_name" class="form-control" placeholder="Name - Surname" required>

                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">หมายเลขบัตรประชาชน ID card</label>
                        <input type="number" class="form-control" placeholder="x-xxxx-xxx-xx-xxx" maxlength="13" name="id_card_number" required>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">วัน/เดือน/ปีเกิด</label>


                        <input class="form-control " id="birthday" name="birthday_classic" width="160" placeholder="Birthday" type="text" required />

                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">เบอร์</label>
                        <input type="number" class="form-control" placeholder="080-xxx-xxxx" maxlength="10" name="phone" required>

                    </div>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Line</label>
                        <input type="text" class="form-control" placeholder="LINE ID" name="line_id" required>

                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">อีเมล์</label>
                        <input type="text" class="form-control" placeholder="Email" name="email_address" required>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">ที่อยู่</label>
                        <textarea class="form-control" name="address" rows="4" placeholder="Address" required></textarea>

                    </div>

                </div>


                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="mb-3 license">
                        <label for="exampleFormControlInput1" class="form-label">ใบอนุญาตขับขี่ License</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="รถจักรยานยนต์" name="license" id="flexRadioDefault1" required>
                            <label class="form-check-label" for="flexRadioDefault1">
                                รถจักรยานยนต์
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="รถยนต์" name="license" id="flexRadioDefault2" required>
                            <label class="form-check-label" for="flexRadioDefault2">
                                รถยนต์
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="มีทั้งรถจักรยานยนต์เเละรถยนต์" name="license" id="flexRadioDefault3" required>
                            <label class="form-check-label" for="flexRadioDefault3">
                                มีทั้งรถจักรยานยนต์เเละรถยนต์
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="ไม่มีใบขับขี่" name="license" id="flexRadioDefault4" required>
                            <label class="form-check-label" for="flexRadioDefault4">
                                ไม่มีใบขับขี่
                            </label>
                        </div>


                    </div>




                </div>


            </div>



            <h3>ข้อมูลสถานศึกษา</h3>
            <hr>

            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">สาขา</label>
                        <input type="text" class="form-control" placeholder="major" name="major" required>

                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">คณะ</label>
                        <input type="text" class="form-control" placeholder="faculty" name="faculty">

                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">มหาลัยวิทยาลัย</label>
                        <input type="text" class="form-control" name="university" placeholder="university">

                    </div>
                </div>
            </div>








            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">วันที่เริ่มฝึก</label>
                        <input id="datepicker1" width="200" name="start_intern" placeholder="Period of start" required />

                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">วันที่สิ้นสุดการฝึก</label>
                        <input id="datepicker2" width="200" name="end_intern" placeholder=" Period of end" required />

                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Resume <small> (PDF) ขนาดไฟล์ไม่เกิน 1 Mb</small></label>

                        <input class="form-control" type="file" name="resume" accept="application/pdf" required>


                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Transcript <small> (PDF) ขนาดไฟล์ไม่เกิน 1 Mb</small></label>
                        <input class="form-control" type="file" name="transcript" accept="application/pdf" required>




                    </div>
                </div>
            </div>





            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Website Blog Social Network อื่นๆ</label>
                        <textarea class="form-control" rows="3" name="social" placeholder="Social" required></textarea>

                    </div>

                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">สิ่งที่สนใจ </label>
                        <textarea class="form-control" rows="3" name="favorite" placeholder="My favorite" required></textarea>

                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">ความถนัด หรือ ภาษาในการเขียนโปรแกรม</label>
                        <textarea class="form-control" rows="3" name="skill" placeholder="skill or programming language" required></textarea>

                    </div>

                </div>
            </div>




            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">แนะนำตัวให้เรารู้จักคุณ </label>
                        <textarea class="form-control" rows="3" name="introduce_yourself" placeholder="Introduce yourself" required></textarea>

                    </div>

                </div>
            </div>


            <button class="button is-medium is-fullwidth is-primary mt-3 mb-2" type="submit">สมัครฝึกงาน</button>
        </div>
    </form>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>


<script>
    $(function() {
        var $registerForm = $("#registration");
        $.validator.addMethod(
            "noSpace",
            function(value, element) {
                return value == "" || value.trim().length != 0;
            },
            "* มีช่องว่างเกิดขึ้น"
        );
        if ($registerForm.length) {
            $registerForm.validate({
                rules: {

                    profile: {
                        required: true,
                    },
                    name_title: {
                        required: true,

                    },
                    full_name: {
                        required: true,

                    },

                    id_card_number: {
                        required: true,
                    },

                    phone: {
                        required: true,
                        noSpace: true,
                    },
                    line_id: {
                        required: true,
                        noSpace: true,
                    },

                    email_address: {
                        required: true,
                        noSpace: true,
                    },

                    address: {
                        required: true,
                        noSpace: true,
                    },
                    license: {
                        required: true,
                        noSpace: true,
                    },
                    major: {
                        required: true,
                        noSpace: true,
                    },

                    faculty: {
                        required: true,
                        noSpace: true,
                    },
                    university: {
                        required: true,
                        noSpace: true,
                    },
                    start_intern: {
                        required: true,

                    },
                    end_intern: {
                        required: true,

                    },

                    resume: {
                        required: true,
                    },
                    transcript: {
                        required: true,
                    },

                    social: {
                        required: true,
                    },
                    favorite: {
                        required: true,
                    },
                    skill: {
                        required: true,
                    },
                    introduce_yourself: {
                        required: true,
                    },

                },
                messages: {

                    profile: {
                        required: "* กรุณาอัพโหลดรูปประจำตัว ",
                    },
                    name_title: {
                        required: "* กรุณาเลือกคำนำหน้า",
                    },

                    full_name: {
                        required: "* กรุณากรอกชื่อ-นามสกุล",
                    },
                    id_card_number: {
                        required: "* กรุณากรอกหมายเลขบัตรประชาชน",
                    },
                    birthday_classic: {
                        required: "* กรุณาเลือกวัน/เดือน/ปี",
                    },

                    phone: {
                        required: "* กรุณากรอกเบอร์ติดต่อ",
                    },
                    line_id: {
                        required: "* กรุณากรอก LINE ID",
                    },
                    email_address: {
                        required: "* กรุณากรอกอีเมล์",
                    },
                    address: {
                        required: "* กรุณากรอกที่อยู่",
                    },
                    license: {
                        required: "* กรุณาเลือกใบอนุญาตขับขี่",
                    },
                    major: {
                        required: "* กรุณาเลือกสาขา",
                    },


                    faculty: {
                        required: "* กรุณาเลือกคณะ",
                    },

                    university: {
                        required: "* กรุณาเลือกมหาวิทยาลัย",
                    },
                    start_intern: {
                        required: "* กรุณาเลือกวันที่เริ่ม",
                    },
                    end_intern: {
                        required: "* กรุณาเลือกวันที่สิ้นสุด",
                    },

                    resume: {
                        required: "* กรุณาอัพโหลด Resume ",
                    },

                    transcript: {
                        required: "* กรุณาอัพโหลด Transcript ",
                    },
                    social: {
                        required: "* กรุณากรอก social ",
                    },
                    favorite: {
                        required: "* กรุณากรอกสิ่งที่สนใจ ",
                    },
                    skill: {
                        required: "* กรุณากรอกความถนัด หรือ ภาษาในการเขียนโปรแกรม ",
                    },
                    introduce_yourself: {
                        required: "* กรุณากรอกแนะนำตัวให้เรารู้จักคุณ ",
                    },



                },
                errorPlacement: function(error, element) {
                    if (element.is(":radio")) {
                        error.appendTo(element.parents(".license"));
                    } else {
                        error.insertAfter(element);
                    }
                },
            });
        }
    });





    function triggerFile() {
        $("#image").trigger("click");
        return false;
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#preview").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function() {
        readURL(this);
    });



    $(document).ready(function() {
        var date_input = $('input[name="birthday_classic"]'); //our date input has the name "date"
        var container =
            $(".bootstrap-iso form").length > 0 ?
            $(".bootstrap-iso form").parent() :
            "body";
        var options = {
            format: "dd/mm/yyyy",
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    });


    $(document).ready(function() {
        var date_input = $('input[name="start_intern"]'); //our date input has the name "date"
        var container =
            $(".bootstrap-iso form").length > 0 ?
            $(".bootstrap-iso form").parent() :
            "body";
        var options = {
            format: "dd/mm/yyyy",
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    });


    $(document).ready(function() {
        var date_input = $('input[name="end_intern"]'); //our date input has the name "date"
        var container =
            $(".bootstrap-iso form").length > 0 ?
            $(".bootstrap-iso form").parent() :
            "body";
        var options = {
            format: "dd/mm/yyyy",
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    });
</script>


</html>