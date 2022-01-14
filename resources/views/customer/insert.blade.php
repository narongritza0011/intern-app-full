<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trakool</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container shadow mb-5 p-3 ">
        <h1 class="m-3">
            เเผนที่
        </h1>

        <form action="{{route('locationStore')}}" method="post">
            @csrf
            <div class="mapform">
                <div class="row m-3">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                        <input type="text" class="form-control" placeholder="lat" name="lat" id="lat" readonly>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                        <input type="text" class="form-control" placeholder="lng" name="lng" id="lng" readonly>
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                        <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล" name="full_name">
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <input type="text" class="form-control" placeholder="เบอร์ติดต่อ" name="tel">
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <input type="text" class="form-control" placeholder="ที่อยู่" name="address">
                    </div>
                </div>

                <div id="map" style="height:500px; width: 500px;" class="my-3 m-3 "></div>

                <script>
                    let map;

                    function initMap() {
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: {
                                lat: 18.76999384877374,
                                lng: 98.99877235293388
                            },
                            zoom: 18,
                            scrollwheel: true,
                        });

                        const uluru = {
                            lat: 18.76999384877374,
                            lng: 98.99877235293388
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
            <button type="submit" class="btn btn-success">บันทึก</button>

        </form>



    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>


</html>