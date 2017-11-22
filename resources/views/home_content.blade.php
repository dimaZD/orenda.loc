<div class="row">
    <h1>{{$title}}</h1>
</div>
<div class="row">
    <div class="search-filter">
        {!! Form::open(['url' =>  route('search'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('seats', 'Кількість місць:',['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-1">
                {!! Form::number('seats', old('seats'), ['min'=>1,'class' => 'form-control']) !!}
            </div>
            {!! Form::label('start_date','Дата прибуття:',['class' => 'col-md-2 control-label'])   !!}
            <div class="col-md-2">
                {!! Form::text('start_date', old('start_date'),['id' => 'date-range1', 'class' => 'form-control',
                'placeholder'=>"Виберіть дату прибуття",'required'])!!}
            </div>
            {!! Form::label('end_date',"Дата від'їзду:",['class' => 'col-md-2 control-label'])   !!}
            <div class="col-md-2">
                {!! Form::text('end_date', old('end_date'),['id' => 'date-range2', 'class' => 'form-control',
                'placeholder'=>"Виберіть дату від'їзду",'required'])!!}
            </div>
            <div class="col-md-1">
                {!! Form::button('Пошук', ['class' => 'btn btn-primary','type'=>'submit']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="row">
    @forelse($flats as $flat)
        <div class="flat-block">
            <a href="{{route('flat', ['id' => $flat->id])}}"><h3>{{$flat->name}}</h3></a>
            {!! Html::image('assets/img/'.$flat->image) !!}
        </div>
    @empty
        <p>Вибачте, квартири відсутні</p>
    @endforelse
</div>

