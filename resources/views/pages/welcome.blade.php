@extends('main')

@section('title', '| Homepage')
<style>
    .station_box img{
        width:300px;
        height: 130px;
    }

    .station_item{
        font-family: 'Noto Sans TC', sans-serif !important;
        background-color: white;
        box-shadow: 0 1px 4px rgba(41, 51, 57, .5);
        color: #37454d;
        margin-bottom: 10px;
        padding: 10px;

    }
</style>
@section('content')
        <div class="row">
            <div class="col-md-12">
                <h3>Station</h3>
            </div>
        </div> <!-- end of header .row -->

        <div class="row station_box">
            <div class="col-md-12">

                <div class="row" id="station_area">
                    {{--@foreach($station as $s)--}}
                        {{--<div class="col-md-3 station_item">--}}
                            {{--{{$s['location_tc']}} <br>--}}
                            {{--<img src="{{URL::to('/')}}/public/images/{{$s['type']}}.jpg" class="img-responsive">--}}
                        {{--</div>--}}
                    {{--@endforeach--}}

                </div>
            </div>

        </div>
@stop

@section('scripts')
<script>
    
if (typeof jQuery != 'undefined') {
    // jQuery is loaded => print the version
    //alert(jQuery.fn.jquery);
}
    var id = '10';
    var name = 'ipip';

    $.ajax({
        url: 'station/search',
        async: false,
        type: 'POST',  //GET, DELETE
        data: {
            //type: 1,
            //district_id: 15
        },
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (data) {
            if(data['result']['status'] == 'success'){
                //console.log(data);
            }

            $.each(data.result.station, function(key,val) {
                //console.log(val.location_en);
                $('#station_area').append('<div class="col-md-3 station_item">'+val.location_tc+'</div>');
            });
        }
    });

</script>

@endsection