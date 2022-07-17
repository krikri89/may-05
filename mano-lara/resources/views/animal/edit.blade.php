@extends('layouts.app')

@section('content')
<ul>
    <form action="{{route('animals-update', $animal)}}" method="post">
        <div class="form-group">
            <input type="text" name="animal_name" value="{{$animal->name}}" />
        </div>
        <div class="form-group">
            <select name="color_id">
                @foreach($colors as $color)
                <option value="{{$color->id}}" @if($color->id == $animal->color_id)selected @endif>{{$color->title}}</option>

                @endforeach
            </select>
        </div>
        @csrf
        @method('put')
        <button class="btn btn-outline-success m-2" type="submit">Update</button>

    </form>
</ul>
@endsection
