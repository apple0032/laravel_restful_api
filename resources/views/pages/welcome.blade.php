@extends('main')

@section('title')

@section('stylesheets')
    {!! Html::style('public/css/parsley.css') !!}
    {!! Html::style('public/css/select2.min.css') !!}
@endsection
<style>
    .container{
        font-family: 'Raleway' !important;
    }

    .station_box img{
        width:100%;
        height: 200px;
    }

    .station_item{
        background-color: white;
        box-shadow: 0 1px 4px rgba(41, 51, 57, .5);
        color: #37454d;
        margin-bottom: 30px;
        padding: 10px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .station_item:hover{
        background-color: #e5e5e5;
    }

    .page_item{
        display: inline-block;
        border: 1px solid #bebebe;
        padding: 1px 7px;
        border-radius: 3px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .page_item:hover{
        background-color: #4285F4;
        color: white;
    }

    .pagination{
        margin:0 !important;
        color: #244a83;
        font-family: 'Noto Sans TC', sans-serif ;
    }

    .station_header{
        margin-bottom: 10px;
        font-size: 35px;
        text-transform: capitalize;
    }

    .station_header button{
        float: right;
    }

    .station_item span{
        margin-bottom: 10px;
        display: block;
        font-weight: bold;
        width: 220px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 18px;
    }

    .page_info{
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    #page, #total_station{
        font-weight: bold;
        color: red;
        font-size: 22px;
    }

    #total_page{
        color: red;
    }

    #modal_btn{
        display: none;
    }

    .modal-title{
        font-size: 25px;
        font-family: 'Noto Sans TC', sans-serif ;
    }

    .modal-title i{
        margin-right: 15px;
    }

    .station_info {
        font-family: 'Abel';
        font-weight: bold;
        font-size: 18px;
    }

    .station_info i{
        margin-right: 15px;
    }

    .station_info div{
        margin-bottom: 1px;
    }

    @media (min-width: 768px) {
        #Modal .modal-dialog {
            width: 900px !important;
            margin: 30px auto;
        }
    }

    .alert-success, .alert-danger{
        display: none;
    }

    .station_provide{
        text-transform: capitalize;
    }

    .update_content{
        padding: 15px;
        display: none;
    }

    .show_content{
        /*display: none;*/
    }

    .update_form{
        margin-top: 20px;
    }

    .update_form div{
        margin-bottom: 5px;
    }

    .create_form{
        display: none;
        padding: 15px;
    }

    #map , #map2{
        height: 320px;
    }

    #map3{
        height: 1200px;
    }

    .lds-hourglass {
        display: inline-block;
        position: relative;
        width: 64px;
        height: 64px;
    }
    .lds-hourglass:after {
        content: " ";
        display: block;
        border-radius: 50%;
        width: 0;
        height: 0;
        margin: 6px;
        box-sizing: border-box;
        border: 30px solid #37454d;
        border-color: rgba(55, 69, 77, 0.6) transparent #819da5 transparent;
        animation: lds-hourglass 1.2s infinite;
    }
    @keyframes lds-hourglass {
        0% {
            transform: rotate(0);
            animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
        }
        50% {
            transform: rotate(900deg);
            animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
        }
        100% {
            transform: rotate(1800deg);
        }
    }

    .px_loading{
        text-align: center;
        position: absolute;
        left: 45%;
        top: 30%;
        z-index: 50;
        display: none;
    }
    
    .search_item{
        margin-bottom: 10px;
    }

    .search_sidebar{
        box-shadow: 0 0 0.8823em 0 rgba(0, 0, 0, 0.5);
        padding: 15px;
        background-color: #37454d;
        color: #ffffff;
        border-radius: 5px;
        letter-spacing: 1px;
    }

    .page_active{
        background-color: #4285F4;
        color: white;
    }

    .select2-selection__choice{
        color: black;
    }

    .page_i{
        padding: 4px;
    }

    .toper_page{
        float: right;
        margin-bottom: 10px !important;
        font-size: 14px;
    }

    .page_container{
        text-align: center;
        font-size: 18px;
    }

    .clear_search{
        text-align: center;
        font-size: 15px;
        margin-top: 20px;
        cursor: pointer;
        letter-spacing: 0px;
        border: 2px solid;
        border-radius: 5px;
        padding: 5px;
    }

    .login_box{
        padding-top: 10px;
        height: 310px;
    }

    .login_content{
        display:none;
    }
    
    #container404{
        text-align: center;
        display: none;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    #container404 .clear_search{
        font-size: 24px;
        color:#337ab7;
    }

    #container404 .clear_search:hover{
        text-decoration: underline;
        color: #1d63b7;
    }

    .trigger_map_img{
        width: 100%;
    }

    .google_map_all{
        border: 3px solid #2d6098;
        margin-top: 20px;
        border-radius: 5px;
        box-shadow: 0 1px 4px rgba(41, 51, 57, .9);
        background: #2d6098;
        text-align: center;
        letter-spacing: 0px;
        cursor: pointer;
    }

    #google-map-modal .modal-dialog {
        width: 90%;
        margin: 30px auto;
    }

    .gmap_st_name{
        margin-bottom: 10px;
        font-size: 20px;
        padding: 5px;
        font-weight: bold;
    }
</style>
@section('content')
        <div class="alert alert-success">
            <strong>Success!</strong> <span class="alert_message"></span>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="search_sidebar">
                    <div class="search_item">
                        <label name="subject">Location</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                            <input id="search_location" class="form-control" type="text" maxlength="80">
                        </div>
                    </div>
                    <div class="search_item">
                        <label name="subject">Address</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                            <input id="search_address" class="form-control" type="text" maxlength="80">
                        </div>
                    </div>
                    <div class="search_item">
                        <label name="subject">Area</label>
                        <select class="form-control" id="search_area">
                            <option value="" selected> -</option>
                            @foreach($area_list as $area)
                                <option value='{{ $area['id'] }}'>{{ $area['name_en'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_item">
                        <label name="subject">District</label>
                        <select class="form-control" id="search_district">
                            <option value="" selected> -</option>
                            @foreach($district_list as $district)
                                <option value='{{ $district['id'] }}'>{{ $district['name_en'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search_item">
                        <label name="subject">Type</label>
                        <select class="form-control select2-multi" name="search_types[]" id="search_types" multiple="multiple" style="width: 100%">
                            @foreach($type_list as $type)
                                <option value='{{ $type['id'] }}'>{{ $type['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="clear_search">
                        <i class="fas fa-trash"></i> Clear Search
                    </div>
                    <div class="google_map_all" onclick="GoogleMapAllStations()" data-toggle="modal" data-target="#google-map-modal">
                        <img src="public/images/googlemap_banner.png" class="trigger_map_img">
                        Google map view
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12 station_header">
                        <i class="fas fa-charging-station"></i> <span>Electric vehicle charging stations in Hong Kong</span>
                        <button type="button" class="btn btn-primary btn_lang" onclick="changeLanguage()" data-lang="en" data-toggle="tooltip" title="Change language">中文</button>
                        {{--<input class="btn btn-info btn_lang" type="button" value="tc" onclick="changeLanguage()">--}}
                    </div>
                </div> <!-- end of header .row -->

                <div class="row page_info">
                    <div class="col-md-6">
                        <span>Total <span id="total_station"></span> Stations found.</span>
                    </div>
                    <div class="col-md-6" style="text-align: right">
                        <span>Page. <span id="page">1</span> / Total <span id="total_page"></span> pages.</span>
                    </div>
                </div>
                <div class="pagination toper_page"></div>

                <div class="row station_box">
                    <div class="col-md-12">

                        <div class="row" id="station_area">

                        </div>

                        <div class="page_container">
                            <div class="pagination"></div>
                        </div>

                        <input type="hidden" id="current_page" value="1">
                    </div>
                </div>
                
                <div id="container404">
                    <img src="https://2.bp.blogspot.com/-WaHaYF7vMRo/VX_Cro6zTDI/AAAAAAAACdY/JMpdKqMaH6w/s1600/notfound.jpeg" id="logo404">
                    <h2>Stations not found.</h2>
                    <h3>Please try to search again, <span class="clear_search">or clear search.</span> </h3>
                </div>

                <button type="button" id="modal_btn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modal"></button>

                <!-- Modal -->
                <div class="modal fade" id="Modal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="px_loading">
                                <div class="lds-hourglass"></div>
                            </div>
                            <div class="show_content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                    <h4 class="modal-title">View</h4>
                                </div>
                                <div class="modal-body">
                                    <iframe width="100%" height="25%" id="gmap_canvas"
                                            src=""
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                    </iframe>

                                    <iframe width="100%" height="30%" id="gmap_street"
                                            src=""
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                    </iframe>

                                    <hr>
                                    <div class="station_info">
                                        <div class="station_address">
                                            <i class="fas fa-map-marked-alt"></i>
                                            <span></span>
                                        </div>
                                        <div class="station_parking">
                                            <i class="fas fa-car"></i>
                                            <span></span>
                                        </div>
                                        <div class="station_type">
                                            <i class="fas fa-charging-station"></i>
                                            <span></span>
                                        </div>
                                        <div class="station_area">
                                            <i class="fas fa-map-signs"></i>
                                            <span></span>
                                        </div>
                                        <div class="station_provide">
                                            <i class="fas fa-id-card-alt"></i>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="station_update">Update</button>
                                    <button type="button" class="btn btn-danger" id="station_del">Delete</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>

                                <input type="hidden" id="modal_id" value="0">
                            </div>
                            <div class="update_content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                    <h4 class="modal-title">Update</h4>
                                </div>
                                <div class="row update_form">
                                    <div class="col-md-6">
                                        <label name="subject">Location EN</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                                            <input id="location_en" class="form-control" type="text" maxlength="80">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label name="subject">Location TC</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                                            <input id="location_tc" class="form-control" type="text" maxlength="80">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label name="subject">Address EN</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                            <input id="address_en" class="form-control" type="text" maxlength="80">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label name="subject">Address TC</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                            <input id="address_tc" class="form-control" type="text" maxlength="80">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label name="subject">Parking Number</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-car"></i></span>
                                            <input id="parking_no" class="form-control" type="text" maxlength="80">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label name="subject">District</label>
                                        <select class="form-control" id="district_id">
                                            <option value="" selected> -</option>
                                            @foreach($district_list as $district)
                                                <option value='{{ $district['id'] }}'>{{ $district['name_en'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label name="subject">Type</label>
                                        <select class="form-control select2-multi" name="s_types[]" id="s_types" multiple="multiple" style="width: 100%">
                                            @foreach($type_list as $type)
                                                <option value='{{ $type['id'] }}'>{{ $type['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label name="subject">Longitude & Latitude</label>
                                        <div id="map"></div>
                                        <input type="hidden" id="map_lat" value="">
                                        <input type="hidden" id="map_lng" value="">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" id="station_confirm">Confirm</button>
                                    <button type="button" class="btn btn-danger" id="station_back">Back</button>
                                </div>
                            </div>


                            <div class="create_form">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                    <h4 class="title">Create New Station</h4>
                                </div>
                                <div class="row update_form">

                                    <div class="alert alert-danger">
                                        <strong>Error!</strong>
                                        <span class="error_message">

                                        </span>
                                    </div>

                                    <div class="col-md-6">
                                        <label name="subject">Location EN</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                                            <input id="location_en" class="form-control" type="text" maxlength="80">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label name="subject">Location TC</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                                            <input id="location_tc" class="form-control" type="text" maxlength="80">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label name="subject">Address EN</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                            <input id="address_en" class="form-control" type="text" maxlength="80">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label name="subject">Address TC</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-map-marked"></i></span>
                                            <input id="address_tc" class="form-control" type="text" maxlength="80">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label name="subject">Parking Number</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-car"></i></span>
                                            <input id="parking_no" class="form-control" type="text" maxlength="80">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label name="subject">District</label>
                                        <select class="form-control" id="district_id">
                                            <option value="" selected> -</option>
                                            @foreach($district_list as $district)
                                                <option value='{{ $district['id'] }}'>{{ $district['name_en'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label name="subject">Type</label>
                                        <select class="form-control select2-multi" name="s_types[]" id="s_types" multiple="multiple" style="width: 100%">
                                            @foreach($type_list as $type)
                                                <option value='{{ $type['id'] }}'>{{ $type['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label name="subject">Longitude & Latitude</label>
                                        <div id="map2"></div>
                                        <input type="hidden" id="map_lat" value="22.343208608975587">
                                        <input type="hidden" id="map_lng" value="114.1068853139875">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" id="station_create">Create</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                            <div class="login_content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                    <h4 class="title">Login to Station Management System</h4>
                                </div>
                                <div class="login_box">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="gmap_all">
            <div id="google-map-modal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <input type="hidden" id="gmap-flag" value="off">
                            <div id="map3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop

@section('scripts')

    {!! Html::script('public/js/parsley.min.js') !!}
    {!! Html::script('public/js/select2.min.js') !!}

<script>

    $('.select2-multi').select2();

if (typeof jQuery != 'undefined') {
    // jQuery is loaded => print the version
    //alert(jQuery.fn.jquery);
}

function changeLanguage() {

    var lang = $('.btn_lang').data('lang');
    if(lang == 'en'){
        $('.btn_lang').data('lang', 'tc');
        $('.btn_lang').html('ENGLISH');
    } else {
        $('.btn_lang').data('lang', 'en');
        $('.btn_lang').html('中文');
    }

    getPageStation();
}

function getCurrentPage() {

    var page = $('#current_page').val();
    $('#page').html(page);

    return page;
}

function changePage(page) {

    $('#current_page').val(page);

    getPageStation();

    //$("html, body").animate({scrollTop: 0}, "fast");
}


//Init page

setTimeout(function(){
    getPageStation();
}, 1000);

function getPageStation() {

    var lang = $('.btn_lang').data('lang'); //console.log(lang);
    var page = getCurrentPage();
    var limit = '{{$per_page}}';   //Station per page
    var offset = (page * limit) - limit;
    var name = $("#search_location").val();
    var address = $('#search_address').val();
    var area = $('#search_area').val();
    var district = $('#search_district').val();
    var type = $('#search_types').val();
    var temp = '';
    $.each(type, function (key, val) {
        temp = temp + val +',';
    });
    type = temp.slice(0,-1);

    $.ajax({
        url: 'station/search',
        async: false,
        type: 'POST',
        data: {
            limit: limit,
            offset: offset,
            name: name,
            address: address,
            area_id: area,
            district_id: district,
            type : type
        },
        dataType: 'JSON',
        beforeSend: function () {
            $('#station_area').html('');
            $('.pagination').html('');
        },
        success: function (data) {
            if(data['result']['status'] == 'success') {
                //console.log(data);

                var total = data.result.total;
                var per_page = '{{$per_page}}';
                var pages = Math.floor(total/per_page) + 1;
                $('#total_page').html(pages);

                if(data.result.total != 0){
                    $('#container404').hide();
                    
                    $('.pagination').append('<div class="page_item page_i" id="page_1" onclick="changePage(1)">' + '<i class="fas fa-step-backward"></i>' + '</div>');

                    if(page != 1) {
                        $('.pagination').append('<div class="page_item page_i" id="page_' + (parseInt(page) - 1) + '" onclick="changePage(' + (parseInt(page) - 1) + ')">' + '<i class="fas fa-backward"></i>' + '</div>');
                    }


                    for (i = 1; i <= pages; i++) {
                        if((i - page <= 3) && (page - i <= 3)) {
                            if (page == i) {
                                $('.pagination').append('<div class="page_item page_active" id="page_' + i + '" onclick="changePage(' + i + ')">' + i + '</div>');
                            } else {
                                $('.pagination').append('<div class="page_item" id="page_' + i + '" onclick="changePage(' + i + ')">' + i + '</div>');
                            }
                        } else {
                            if(i < 10) {
                                $('.pagination').append('.');
                            }
                        }
                    }

                    if(page < pages) {
                        $('.pagination').append('<div class="page_item page_i" id="page_' + (parseInt(page) + 1) + '" onclick="changePage(' + (parseInt(page) + 1) + ')">' + '<i class="fas fa-forward"></i>' + '</div>');
                    }

                    $('.pagination').append('<div class="page_item page_i" id="page_' + parseInt(pages) + '" onclick="changePage(' + parseInt(pages)  + ')">' + '<i class="fas fa-step-forward"></i>' + '</div>');
                } else {
                    $('#container404').show();
                }

                $.each(data.result.station, function (key, val) {
                    //console.log(val.location_en);

                    if(lang == 'en'){
                        var station_name = val.location_en;
                    } else {
                        var station_name = val.location_tc;
                    }

                    $('#station_area').append('' +
                        '<div class="col-md-3">' +
                            '<div class="station_item" data-sid="'+val.id+'" data-toggle="tooltip" title="'+station_name+'"> '+
                                '<span>' + station_name + '</span>' +
                                '<div class="station_image"> '+
                                    '<img src="https://maps.googleapis.com/maps/api/streetview?size=500x400&location='+val.lat+','+val.lng+'&fov=1000&heading=200&pitch=1&key=AIzaSyB7BhQ5f9OupkTJRgLg_vCehCi8AlLOSuQ">' +
                                '</div>' +
                            '</div>' +
                        '</div>');
                });

                $('#total_station').html(data['result']['total']);
                $('[data-toggle="tooltip"]').tooltip();
            }
        }
    });

    clickStationInfo();
}


function clickStationInfo() {
    $('.station_item').each(function () {
        $(this).on("click", function () {
            var sid = $(this).data('sid');
            GetStationInfo(sid);
        });
    });
}

function GetStationInfo(sid){
    $.ajax({
        url: 'station/'+ sid,
        async: false,
        type: 'GET',
        data: {
            //no form data submit in GET request
        },
        dataType: 'JSON',
        beforeSend: function () {
            $('.px_loading').show();
            $(".show_content").css("opacity", "0.2");
            $(".show_content").css("pointer-events", "none");
        },
        success: function (data) {
            console.log(data);

            if(data.result.status == 'success') {

                var station = data.result.station;
                $('#modal_id').val(station.id);

                var lang = $('.btn_lang').data('lang');
                if (lang == 'en') {
                    var station_name = station.location_en;
                    var station_address = station.address_en;
                    var station_area = station.area_name_en;
                    var station_district = station.district_name_en;
                } else {
                    var station_name = station.location_tc;
                    var station_address = station.address_tc;
                    var station_area = station.area_name_tc;
                    var station_district = station.district_name_tc;
                }

                $('.modal-title').html('<i class="fas fa-map-marker-alt"></i> '+station_name);

                $('#gmap_canvas').attr('src','https://maps.google.com/maps?q='+station.lat+'%2C'+station.lng+'&t=&z=16&ie=UTF8&iwloc=&output=embed');
                $('#gmap_street').attr('src','https://www.google.com/maps/embed/v1/streetview?key=AIzaSyB7BhQ5f9OupkTJRgLg_vCehCi8AlLOSuQ&location='+station.lat+','+station.lng+'&heading=150&pitch=1&fov=10');

                $('.station_address span').html(station_address);
                if(station.parkingNo != '' && station.parkingNo != null) {
                    $('.station_parking span').html(station.parkingNo);
                } else {
                    if (lang == 'en') {
                        $('.station_parking span').html('Not provided');
                    } else {
                        $('.station_parking span').html('沒有提供');
                    }
                }
                $('.station_type span').html(station.type_name);
                $('.station_area span').html(station_area + ' , ' + station_district);

                if(station.provider != '' && station.provider != null) {
                    $('.station_provide span').html(station.provider);
                } else {
                    $('.station_provide span').html(station.username);
                }

                $("#district_id").val(station.district_id);


                //console.log(station.type);console.log(s_types);
                var s_types = station.type.split(',');
                $('#s_types').val(s_types).trigger('change');

                //Init update form
                $('#location_en').val(station.location_en);
                $('#location_tc').val(station.location_tc);
                $('#address_en').val(station.address_en);
                $('#address_tc').val(station.address_tc);
                $('#parking_no').val(station.parkingNo);
                $('#map_lat').val(station.lat);
                $('#map_lng').val(station.lng);
                InitGoogleMapMarker(station.lat,station.lng);

                $('#modal_btn').click();

                setTimeout(function(){
                    $('.px_loading').hide();
                    $(".show_content").css("opacity", "1");
                    $(".show_content").css("pointer-events", "auto");
                }, 1000);

            }
        }
    });
}


var map;
var marker;

function InitGoogleMapMarker(lat,lng) {

    var myLatLng = {lat: parseFloat(lat), lng: parseFloat(lng)};

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: myLatLng
    });

    marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        draggable: true,
        icon: 'public/images/pikachu.png'
        //title: 'Hello World!'
    });

    google.maps.event.addListener(marker, 'dragend', function (event) {
        var lat = this.getPosition().lat();
        var lng = this.getPosition().lng();
        console.log(lat+','+lng);

        $('#map_lat').val(lat);
        $('#map_lng').val(lng);
    });
}



$("#station_del").click(function(){
   var del_id = $('#modal_id').val();
   DeleteStation(del_id);
});

function DeleteStation(id) {

    var con = confirm("Are you sure you want to delete?");
    if (con) {
        $.ajax({
            url: 'station/' + id,
            async: false,
            type: 'DELETE',
            data: {
                //no form data submit in DELETE request
            },
            dataType: 'JSON',
            beforeSend: function () {

            },
            success: function (data) {
                if (data.result.status == 'success') {
                    $('.modal').modal('hide');

                    $('.alert_message').html('Station Deleted.');
                    $('.alert-success').fadeIn();
                    $("html, body").animate({scrollTop: 0}, "slow");
                    setTimeout(function(){
                        $('.alert-success').fadeOut();
                    }, 1500);

                    getPageStation();
                }
            }
        });
    }
}

$("#station_update").click(function(){
    $('.show_content').fadeOut();
    $('.update_content').fadeIn();
});

$("#station_back").click(function(){
    $('.show_content').fadeIn();
    $('.update_content').fadeOut();
});


$('#station_confirm').click(function(){

    var con = confirm("Are you sure you want to update?");
    if (con) {

        var id = $('#modal_id').val();
        var loc_en = $('#location_en').val();
        var loc_tc = $('#location_tc').val();
        var address_en = $('#address_en').val();
        var address_tc = $('#address_tc').val();
        var parking = $('#parking_no').val();
        var map_lat = $('#map_lat').val();
        var map_lng = $('#map_lng').val();
        var district_id = $("#district_id").val();
        var type = $('#s_types').val();
        var temp = '';
        $.each(type, function (key, val) {
            temp = temp + val +',';
        });
        type = temp.slice(0,-1);

        $.ajax({
            url: 'station/'+id,
            async: false,
            type: 'PUT',
            data: {
                location_en: loc_en,
                location_tc: loc_tc,
                address_en: address_en,
                address_tc: address_tc,
                parkingNo: parking,
                lat: map_lat,
                lng: map_lng,
                district_id : district_id,
                type : type
            },
            dataType: 'JSON',
            beforeSend: function () {

            },
            success: function (data) {
                if(data['result']['status'] == 'success') {
                    console.log(data);

                    $('.modal').modal('hide');
                    $('.alert_message').html('Station Updated.');
                    $('.alert-success').fadeIn();
                    $("html, body").animate({scrollTop: 0}, "slow");
                    setTimeout(function(){
                        $('.alert-success').fadeOut();
                    }, 1500);

                    getPageStation();
                }
            }
        });
    }
});


$(".modal").on("hidden.bs.modal", function () {
    $('.show_content').fadeIn();
    $('.update_content').fadeOut();
    $('.create_form').fadeOut();
});


$('.create_new_station a').click(function(e) {
    e.preventDefault();

    $('#modal_btn').click();

    $('.show_content').fadeOut();
    $('.update_content').fadeOut();
    $('.login_content').fadeOut();
    $('.create_form').fadeIn();

    var myLatLng = {lat: 22.343208608975587, lng: 114.1068853139875};

    map = new google.maps.Map(document.getElementById('map2'), {
        zoom: 15,
        center: myLatLng
    });

    marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        draggable: true,
        icon: 'public/images/pikachu.png'
        //title: 'Hello World!'
    });

    google.maps.event.addListener(marker, 'dragend', function (event) {
        var lat = this.getPosition().lat();
        var lng = this.getPosition().lng();
        console.log(lat+','+lng);

        $('.create_form #map_lat').val(lat);
        $('.create_form #map_lng').val(lng);
    });

});

    $('#station_create').click(function(){
        var con = confirm("Are you sure you want to create?");
        if (con) {
            var loc_en = $('.create_form #location_en').val();
            var loc_tc = $('.create_form #location_tc').val();
            var address_en = $('.create_form #address_en').val();
            var address_tc = $('.create_form #address_tc').val();
            var parking = $('.create_form #parking_no').val();
            var map_lat = $('.create_form #map_lat').val();
            var map_lng = $('.create_form #map_lng').val();
            var district_id = $(".create_form #district_id").val();
            var type = $('.create_form #s_types').val();
            var temp = '';
            $.each(type, function (key, val) {
                temp = temp + val +',';
            });
            type = temp.slice(0,-1);
            var userid = '{{$user_id}}';

            $.ajax({
                url: 'station',
                async: false,
                type: 'POST',
                data: {
                    location_en: loc_en,
                    location_tc: loc_tc,
                    address_en: address_en,
                    address_tc: address_tc,
                    parkingNo: parking,
                    lat: map_lat,
                    lng: map_lng,
                    district_id : district_id,
                    type : type,
                    provider_user_id: userid
                },
                dataType: 'JSON',
                beforeSend: function () {

                },
                success: function (data) {
                    if(data['result']['status'] == 'success') {
                        console.log(data);

                        $('.modal').modal('hide');
                        $('.alert_message').html('Station Created.');
                        $('.alert-success').fadeIn();
                        $("html, body").animate({scrollTop: 0}, "slow");
                        setTimeout(function(){
                            $('.alert-success').fadeOut();
                        }, 1500);

                        getPageStation();
                    } else {
                        $('.alert-danger').show();

                        $.each(data.error_message, function (key, val) {
                            $('.error_message').append('<div>'+val+'</div>')
                        });

                        setTimeout(function(){
                            $('.alert-danger').fadeOut();
                            $('.error_message').html('');
                        }, 2000);
                    }
                }
            });

        }
    });

    $("#search_location, #search_address").keyup(function(){
        TriggerSearchApi();
    });

    $('#search_area, #search_district, #search_types').change(function(){
        TriggerSearchApi();
    });

    function TriggerSearchApi() {
        $('#current_page').val('1'); //reset page to 1 to fix error display
        getPageStation();
    }

    $(document).ready(function () {
        $(".search_sidebar").sticky({topSpacing: 0});
    });

    $('.clear_search').click(function(){
        $("#search_location").val('');
        $('#search_address').val('');
        $('#search_area').val('');
        $('#search_district').val('');
        $('#search_types').val('').trigger('change');
        getPageStation();
    });

    $('.login_btn a').click(function(e) {
        e.preventDefault();

        $('#modal_btn').click();
        $('.show_content').fadeOut();
        $('.update_content').fadeOut();
        $('.create_form').fadeOut();
        $('.login_content').fadeIn();

        $('.login_box').load('{{URL::to('/')}}/auth/login .login_box', function () {
            $('.btn-login').click(function(e) {
                e.preventDefault();

                var email = $('#email').val();
                var password = $('#password').val();

                $.ajax({
                    url: '{{URL::to('/')}}/auth/login',
                    async: false,
                    type: 'POST',
                    data: {
                        email: email,
                        password: password
                    },
                    dataType: 'JSON',
                    beforeSend: function () {

                    },
                    success: function (data) {
                        alert('success');
                    },
                    complete : function(data){

                        console.log("ajax login");

                        $('.navbar-right').load('{{URL::to('/')}} .navbar-right', function () {

                        });

                        $('.modal').modal('hide');
                    }
                });

            });
        });
    });

    function GoogleMapAllStations() {

        var flag = $('#gmap-flag').val();

        if(flag == 'off') {
            setTimeout(function () {

                var locations = [];
                locations = JSON.parse('<?= $station; ?>');

                var map = new google.maps.Map(document.getElementById('map3'), {
                    zoom: 12,
                    center: new google.maps.LatLng(22.343208608975587, 114.1068853139875),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    gestureHandling: 'greedy'
                });

                var infowindow = new google.maps.InfoWindow();

                var marker, i;

                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
                        map: map,
                        //draggable: true,
                        icon: 'public/images/s_marker.png'
                    });

                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            //alert(locations[i][0]);
                            infowindow.setContent(`<div class="gmap_st_name">${locations[i]['location_en']}</div>
                            <div><button type="button" class="btn btn-primary" onclick="TriggerInfo(${locations[i]['id']})">Details</button></div>
                            `);

                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }

            }, 1000);

            $('#gmap-flag').val('on');
        }
    }

    function TriggerInfo(sid) {
        GetStationInfo(sid);
        $('.gmap_all .modal').modal('hide');
    }

</script>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7BhQ5f9OupkTJRgLg_vCehCi8AlLOSuQ">
</script>


@endsection