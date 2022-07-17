@extends('layouts.app')

@section('content')
<ul>
    <form action="{{route('colors-update', $color)}}" method="post">
        <input type="text" name="create_color_title" value="{{$color->title}}" />

        <input type="color" name="create_color_input" value="{{$color->color}}" />
        @csrf
        @method('put')
        <button class="btn btn-outline-success m-2" type="submit">Ja, this is a new color</button>


    </form>
</ul>
@endsection
