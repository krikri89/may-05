@extends('main')
@section('content')
<ul>
    <form action="{{route('animals-update', $animal)}}" method="post">
        <input type="text" name="animal_name" value="{{$animal->name}}" />
        <select name="color_id">
            @foreach($colors as $color)
            <option value="{{$color->id}}">{{$color->title}}</option>
            @endforeach
        </select>

        @csrf
        @method('put')
        <button type="submit">Update</button>
    </form>
</ul>
@endsection
