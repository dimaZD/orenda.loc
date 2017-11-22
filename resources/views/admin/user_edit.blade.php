<div class="wrapper container-fluid">
    {!! Form::open(['url' =>  route('user.edit'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
        @if(isset($user->id))
            {!! Form::hidden('id', $user->id) !!}
        @endif
        {!! Form::label('name','Назва',['class' => 'col-xs-2 control-label'])   !!}
        <div class="col-xs-8">
            {!! Form::text('name', isset($user->name) ? $user->name  : old('name'),['class' => 'form-control',
            'placeholder'=>"Введіть ім'я"])!!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email','Емейл',['class' => 'col-xs-2 control-label'])   !!}
        <div class="col-xs-8">
            {!! Form::text('email', isset($user->email) ? $user->email  : old('email'),['class' => 'form-control',
            'placeholder'=>"Введіть ім'я"])!!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Зберегти', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</div>
