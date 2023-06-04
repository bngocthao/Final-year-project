@foreach($a as $item)
    {{$item->id}} - {{$item->name}} - {{$item->majors->name}} -- {{$item->majors->units->name}}</br>
    {{$item->majors->pivot->subject->name}}
@endforeach
