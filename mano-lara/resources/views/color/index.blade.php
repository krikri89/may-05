@extends('main')

@section('content')
<ul>
    @forelse($colors as $color)
    <li>
        <div class="color-box" style="background:{{$color->color}};">
            {{$color->color}}
            <h2>{{$color->title}}</h2>
        </div>
        <div class="controls">
            <a href="{{route('colors-edit', $color)}}">EDIT</a>
            <form class="delete" action="{{route('colors-delete', $color)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Destroy</button>
            </form>
        </div>
    </li>
    @empty
    <li>No colors, no life.</li>
    @endforelse
</ul>
@endsection
