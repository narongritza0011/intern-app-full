<head>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

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
                    <h3 class="mb-5">เเก้ไขข้อมูลลูกค้า</h3>


                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <h4> ข้อมูล</h4>
                            <hr>

                            <form action="{{url('manager/ip-tracker/update/'.$data->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="container p-2">

                                    <h5 class="mb-2">ชื่อร้าน : </h5>
                                    <input type="text" name="store_name" class="form-control" value="{{$data->store_name}}">
                                </div>
                                <div class="container p-2">

                                    <h5 class="mb-2">ชื่อ-นามสกุล : </h5>
                                    <input type="text" name="full_name" class="form-control" value="{{$data->full_name}}">
                                </div>
                                <div class="container p-2 ">

                                    <h5 class="mb-2">เบอร์ติดต่อ : </h5>
                                    <input type="text" name="tel" class="form-control" value="{{$data->tel}}">
                                </div>
                                <div class="container p-2">

                                    <h5 class="mb-2">ที่อยู่ :
                                    </h5>
                                    <textarea class="form-control" name="address" id="" cols="2" rows="3">{{$data->address}}</textarea>


                                </div>
                                <hr>





                                <hr>

                                <h4 class="mb-2"> รูปภาพ</h4>
                                <input type="hidden" name="old_image" class="form-control" value="{{$data->image}}">
                                <input class="form-control" type="file" name="image" id="image" value="{{asset($data->image)}}" accept="image/png,image/jpeg">
                                @error('image')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                                <div class="mb-3">
                                    <img id="preview" src="{{asset($data->image)}}" class="img-fluid" width="500" height="500">

                                </div>



                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <h4> เเผนที่</h4>
                            <hr>
                            <div class="container p-2">

                                <label for="formFile" class="form-label">Latitude</label>

                                <input type="text" class="form-control" placeholder="" value="{{$data->latitude}}" name="lat" id="lat" readonly>
                                @error('lat')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                            </div>

                            <div class="container p-2">
                                <label for="formFile" class="form-label">Longitude</label>

                                <input type="text" class="form-control" placeholder="" value="{{$data->longitude}}" name="lng" id="lng" readonly>
                                @error('lng')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                            <div id="map" style="height:500px; width: 500px;" class="my-3 m-3 "></div>
                            <hr>
                            <button type="submit" class="btn btn-success ">บันทึก</button>

                            </form>

                            <script>
                                let map;
                                var _lat = <?= $data->latitude ?>;
                                var _lng = <?= $data->longitude ?>;

                                function initMap() {
                                    map = new google.maps.Map(document.getElementById("map"), {
                                        center: {
                                            lat: _lat,
                                            lng: _lng
                                        },
                                        zoom: 18,
                                        scrollwheel: true,
                                    });

                                    const uluru = {
                                        lat: _lat,
                                        lng: _lng
                                    };
                                    let marker = new google.maps.Marker({
                                        position: uluru,
                                        map: map,
                                        draggable: true
                                    });

                                    google.maps.event.addListener(marker, 'position_changed',
                                        function() {
                                            let lat = marker.position.lat()
                                            let lng = marker.position.lng()
                                            $('#lat').val(lat)
                                            $('#lng').val(lng)
                                        })

                                    google.maps.event.addListener(map, 'click',
                                        function(event) {
                                            pos = event.latLng
                                            marker.setPosition(pos)
                                        })




                                }
                            </script>


                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>

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
    function triggerFile() {

        $("#image").trigger("click");
        return false
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function() {
        readURL(this);
    });
</script>
@endsection