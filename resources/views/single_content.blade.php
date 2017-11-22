<div class="row pad_bot">
    <h1>{{$flat->name}}</h1>
    <div class="col-md-4">
        {!! Html::image('assets/img/'.$flat->image) !!}
    </div>
    <div class="col-md-8">
        <h3>Дані про квартиру</h3>
        <p>Переваги:{{$flat->advantages}}</p>
        <p>К-сть місць:{{$flat->seats}}</p>
        <p>Опис:{{$flat->description}}</p>
        <p>Адреса:{{$flat->map}}</p>
        <h3>Дані про власника</h3>
        <p>Ім'я:{{$flat->user->name}}</p>
        <p>Емейл:{{$flat->user->email}}</p>
    </div>
    @if( isset($orders) && $orders->count() > 0)
        <h3>Увас є заявки на бронювання</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Дата прибуття</th>
                <th>Дата від'їзду</th>
                <th>Дія</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->start_date}}</td>
                    <td>{{$order->end_date}}</td>
                    <td>
                        {!! Form::open(['url'=>route('order.accept',['flat_id'=> $flat->id,'order_id' => $order->id]),
                        'class'=>'form-horizontal','method' => 'POST']) !!}
                        {{ method_field('PUT') }}
                        {!! Form::button('Підтвердити',['class'=>'btn btn-danger','type'=>'submit']) !!}
                        {!! Form::close() !!}
                        {!! Form::open(['url'=>route('order.cancel',['order_id' => $order->id]), 'class'=>'form-horizontal',
                        'method' => 'POST']) !!}
                        {{ method_field('DELETE') }}
                        {!! Form::button('Відхилити',['class'=>'btn btn-danger','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
<div class="row">
    @if (Auth::guest())
        <h2>Щоб забронювати квартиру, будь ласка <a href="{{ route('login') }}">увійдіть</a> або <a
                    href="{{ route('register') }}">зареєструйтесь</a></h2>
    @elseif (Auth::check())
        {!! Form::open(['url' =>  route('order',['flat_id'=> $flat->id]),'class'=>'form-horizontal','method'=>'POST',
        'enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('start_date','Дата прибуття',['class' => 'col-md-2 control-label'])   !!}
            <div class="col-md-3">
                {!! Form::text('start_date', old('start_date'),['id' => 'date-range1', 'class' => 'form-control',
                'placeholder'=>"Виберіть дату прибуття"])!!}
            </div>
            {!! Form::label('end_date',"Дата від'їзду",['class' => 'col-md-2 control-label'])   !!}
            <div class="col-md-3">
                {!! Form::text('end_date', old('end_date'),['id' => 'date-range2', 'class' => 'form-control',
                'placeholder'=>"Виберіть дату від'їзду"])!!}
            </div>
            <div class="col-md-2">
                {!! Form::button('Зaбронювати', ['class' => 'btn btn-primary','type'=>'submit']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    @endif
</div>
<div class="row pad_bot">
    <div class="col-md-12">
        <div id="map-canvas"></div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q"
        type="text/javascript"></script>
<link href="{{ asset('css/daterangepicker.min.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js" type="text/javascript"></script>
<script src="{{ asset('js/jquery.daterangepicker.min.js') }}" type="text/javascript"></script>
@if (Auth::check())
    <script>
        var booked_dates = {!! json_encode($booked_dates) !!};
        $('#date-range1').dateRangePicker(
            {
                language: 'ru',
                separator: ' to ',
                startOfWeek: 'monday',
                startDate: Date.now(),
                beforeShowDay: function (t) {
                    var time = t.setHours(0, 0, 0, 0);
                    time = t.getTime();
                    var valid = true;
                    for (var i = 0; i < booked_dates.length; i++) {
                        var startDate = new Date(booked_dates[i][0]);
                        startDate = startDate.setHours(0, 0, 0, 0);
                        var endDate = new Date(booked_dates[i][1]);
                        endDate = endDate.setHours(0, 0, 0, 0);
                        if (time >= startDate && time <= endDate) {
                            valid = false;
                            break;
                        }
                    }
                    return [valid, '', ''];
                },
                setValue: function (s, s1, s2) {
                    $('#date-range1').val(s1);
                    $('#date-range2').val(s2);
                }
            }
        );
    </script>
@endif
<script>
    var lat = {{$flat->lat}};
    var lng = {{$flat->lng}};
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {
            lat: lat,
            lng: lng
        },
        zoom: 15
    });
    var marker = new google.maps.Marker({
        position: {
            lat: lat,
            lng: lng
        },
        map: map
    });
</script>




