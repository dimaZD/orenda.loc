<div class="col-md-12">
    <h3>Ім'я: {{$user->name}}</h3>
    <h3>Емейл:{{$user->email}}</h3>
</div>
<div class="col-md-12">
    @if($flats->count() > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Заголовок</th>
                <th>Зображення</th>
                <th>Дія</th>
            </tr>
            </thead>
            <tbody>
            @forelse($flats as $flat)
                <tr>
                    <td>{!! Html::link(route('flats.edit',['id' => $flat->id]),$flat->name) !!}</td>
                    <td>
                        @if(isset($flat->image))
                            {!! Html::image('assets/img/'.$flat->image,'', array('class' => 'img-thumbnail')) !!}
                        @endif
                    </td>
                    <td>{!! Html::link(route('flats.edit',['id' => $flat->id]),'Редагувати') !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2>Вибачте, квартири відсутні</h2>
    @endif
</div>
