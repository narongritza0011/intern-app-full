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
                    <h3 class="mb-5">ดูรายละเอียดข้อมูลลูกค้า</h3>


                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <h4> ข้อมูล</h4>
                            <hr>
                            <div class="container p-2">
                                <h5>ชื่อร้าน :<small> &nbsp; {{$data->store_name}}</small> </h5>

                            </div>
                            <div class="container p-2">
                                <h5>ชื่อ-นามสกุล :<small> &nbsp; {{$data->full_name}}</small> </h5>

                            </div>
                            <div class="container p-2">
                                <h5>เบอร์ติดต่อ :<small> &nbsp; {{$data->tel}}</small> </h5>

                            </div>
                            <div class="container p-2">
                                <h5>ที่อยู่ :<small> &nbsp; {{$data->address}}</small> </h5>

                            </div>
                            <hr>
                            <h4> รูปภาพ</h4>
                            <img src="{{asset($data->image)}}" height="600" width="600" class="img-fluid" alt="">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <h4> เเผนที่</h4>
                            <hr>
                            <div id="map" style="height:500px; width: 500px;" class="my-3 m-3 "></div>
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
                            <hr>
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