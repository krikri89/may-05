@extends('main')
@section('content')
<ul>
    <h1>Create Animal</h1>
    <form action="{{route('animals-store')}}" method="post">
        <select name="color_id">
            @foreach($colors as $color)
            <option value="{{$color->color}}">{{$color->title}}</option>
            @endforeach
        </select>
        <input type="text" name="animal_name" />
        @csrf
        <button type="submit">I found it!</button>
    </form>
</ul>
@endsection
