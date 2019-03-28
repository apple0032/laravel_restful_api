@extends('main')

@section('title', '| Homepage')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <h3>Index</h3>
                <div class="jumbotron" style="display: none">
                  <h1>Welcome to My Blog!</h1>
                  <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
                  <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
                </div>
            </div>
        </div> <!-- end of header .row -->

        <div class="row">
            <div class="col-md-8">
                

            </div>

            <div class="col-md-3 col-md-offset-1">
                <h4>Sidebar</h4>
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
        url: 'station',
        async: false,
        type: 'GET',  //GET, DELETE
        data: {
            name: name,
        },
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (data) {
            if(data['result']['status'] == 'success'){
                console.log(data);
            }
        }
    });

</script>

@endsection