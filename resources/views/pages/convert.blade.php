@extends('main')

@section('title')

@section('stylesheets')
    {!! Html::style('public/css/parsley.css') !!}
@endsection
<style>
    .convert_navbtn{
        display: none !important;
    }

    .create_new_station{
        display: none !important;
    }

    .container{
        font-family: 'Raleway' !important;
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
        left: 47%;
        top: 30%;
        z-index: 50;
        display: none;
    }

    .home_btn{
        background-color: #b8b8b8;
    }

    .cool-link a{
        color: #777 !important;
    }

    .convert_header{
        font-size: 30px;
        margin-bottom: 20px;
    }

    .convert_header i{
        font-size: 25px;
        margin-right: 10px;
    }

    .alert_message{
        font-size: 18px;
    }

    .convert_content{
        font-weight: 100;
        font-size: 16px;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 30px;
        box-shadow: 0 1px 4px rgba(41, 51, 57, .5);
    }

    .convert_content i{
        margin-right: 10px;
    }

    .convert_tables{
        color: #a8a8a8;
    }

    .convert_btn, .drop_btn{
        text-align: center;
    }

    .btn_convert, .btn_drop{
        font-size: 22px !important;
    }

</style>
@section('content')
        @if($drop == false)
            <div class="convert_container">
                <div class="convert_header">
                    <i class="fas fa-sync-alt"></i>Convert
                </div>

                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span class="alert_message">
                        There are no charging stations tables found in our system database. <br><br>
                        <b>In order to maintain the system, you must retrieve data from <u>https://opendata.clp.com.hk</u></b>
                    </span>
                </div>

                <div class="convert_content">
                    <i class="fas fa-database"></i>
                    <span class="convert_message">
                        Basic tables will be generated in our database by clicking the <b>'Confirm Convert'</b> button. <br><br>

                        FOUR tables will be created : <br>
                        <span class="convert_tables">
                            `station` - To store stations information <br>
                            `type` - To store all types of stations <br>
                            `district` - To store 18 district name located in Hong Kong <br>
                            `area` - To store four main area located in Hong Kong
                        </span>

                        <br><br>
                        The database has been done <b>fully normalization.</b> <br>
                        The type, district and area attributes has been represented as a <b>id</b> which is a foreign key to make relationship with other tables. <br>
                        The type_id in station table is a comma string which is storing multiple type of station. <br><br>

                        <b>Click here to retrieve data from <u>https://opendata.clp.com.hk</u></b>
                    </span>
                </div>

                <div class="row convert_btn">
                    <button type="button" class="btn btn-primary btn_convert" onclick="converter()" data-toggle="tooltip" title="Click to convert">Confirm Convert</button>
                </div>
            </div>
        @else
            <div class="convert_container">
                <div class="convert_header">
                    <i class="fas fa-trash-alt"></i></i> Drop Tables
                </div>

                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle" style="font-size: 22px"></i>
                    <span class="alert_message">
                        <b>Electric Vehicle Charging Stations tables found in our system database. <br><br>
                        If you want to drop those tables, please click below button. Noted that all of the tables and station information will be removed immediately.</b>
                    </span>
                </div>

                <div class="row drop_btn">
                    <button type="button" class="btn btn-danger btn_drop" onclick="drop()" data-toggle="tooltip" title="Click to drop">Confirm Drop</button>
                </div>
            </div>
        @endif

        <div class="px_loading">
            <div class="lds-hourglass"></div>
        </div>
@stop

@section('scripts')

    {!! Html::script('public/js/parsley.min.js') !!}
    {!! Html::script('public/js/select2.min.js') !!}

<script>
    $('.home_btn a').text('Convert');

    function converter() {
        var con = confirm("Are you sure you want to start convert ?");
        if (con) {

            $('.px_loading').show();
            $(".convert_container").css("opacity", "0.2");
            $(".convert_container").css("pointer-events", "none");

            setTimeout(function(){
                $.ajax({
                    url: 'convert',
                    async: false,
                    type: 'GET',
                    data: {
                        //no form data submit in GET request
                    },
                    dataType: 'JSON',
                    beforeSend: function () {

                    },
                    success: function (data) {
                        console.log(data);
                        if(data.result == 'success'){
                            window.location.href = "{{URL::to('/')}}";
                        }
                    }
                });
            }, 2000);

        }
    }

    function drop() {
        var con = confirm("Are you sure you want to drop tables ?");
        if (con) {

            $('.px_loading').show();
            $(".convert_container").css("opacity", "0.2");
            $(".convert_container").css("pointer-events", "none");

            setTimeout(function(){
                $.ajax({
                    url: 'drop',
                    async: false,
                    type: 'GET',
                    data: {
                        //no form data submit in GET request
                    },
                    dataType: 'JSON',
                    beforeSend: function () {

                    },
                    success: function (data) {
                        console.log(data);
                        if(data.result == 'success'){
                            window.location.href = "{{URL::to('/')}}";
                        }
                    }
                });
            }, 2000);

        }
    }
</script>


@endsection