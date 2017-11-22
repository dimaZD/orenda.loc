<div class="content">

    {!! Form::open(['url' => (isset($flat->id)) ? route('flats.update',['flat'=>$flat->id]) : route('flats.store'),
    'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        @if(isset($flat->id))
            {!! Form::hidden('id', $flat->id) !!}
        @endif
        {!! Form::label('name','Назва',['class' => 'col-xs-2 control-label'])   !!}
        <div class="col-xs-8">
            {!! Form::text('name', isset($flat->name) ? $flat->name  : old('name'),['class' => 'form-control',
            'placeholder'=>'Введіть назву'])!!}
        </div>
    </div>

    @if(isset($flat->image))
        <div class="form-group">
            {!! Form::label('image','Зображення:',['class' => 'col-xs-2 control-label'])   !!}
            <div class="col-xs-8">
                {{ Html::image('assets/img/'.$flat->image,'',['style'=>'max-width:100%']) }}
                {!! Form::hidden('old_image',$flat->image) !!}
            </div>
        </div>
    @endif

    <div class="form-group">
        {!! Form::label('image', 'Зображення:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Виберіть зображення',
            'data-buttonName'=>"btn-primary",'data-placeholder'=>"Файлу немає"]) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('advantages', 'Переваги:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('advantages', isset($flat->advantages) ? $flat->advantages : old('advantages'), ['class' =>
            'form-control','placeholder'=>'Введіть текст']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('seats', 'Кількість місць:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::number('seats', isset($flat->seats) ? $flat->seats : old('seats'), ['min'=>1,'max'=>1000,'class' =>
            'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Опис:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('description', isset($flat->description) ? $flat->description : old('description'), ['class' =>
            'form-control','placeholder'=>'Введіть текст']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('map', 'Карта:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('map', isset($flat->map) ? $flat->map : old('map'),['id' => 'searchmap', 'class' => 'form-control',
            'placeholder'=>'Введіть адресу та виберіть зі списку'])!!}
            <div id="map-canvas"></div>
            <input type="hidden" class="form-control input-sm" value="{{isset($flat->lat) ? $flat->lat : old('lat')}}"
                   name="lat" id="lat">
            <input type="hidden" class="form-control input-sm" value="{{isset($flat->lng) ? $flat->lng : old('lng')}}"
                   name="lng" id="lng">
        </div>
    </div>

    @if(isset($flat->id))
        <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Додати', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places"
        type="text/javascript"></script>

@if(isset($flat->lat) && isset($flat->lng))
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
            map: map,
            draggable: true
        });
    </script>
@else
    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: 50.747233,
                lng: 25.325382999999988
            },
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: {
                lat: 50.747233,
                lng: 25.325382999999988
            },
            map: map,
            draggable: true
        });
    </script>
@endif
<script>
    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
    google.maps.event.addListener(searchBox, 'places_changed', function () {
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for (i = 0; place = places[i]; i++) {
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
        }
        map.fitBounds(bounds);
        map.setZoom(15);
    });
    google.maps.event.addListener(marker, 'position_changed', function () {
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        $('#lat').val(lat);
        $('#lng').val(lng);
    });
</script>