@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>List of colors</h1>
                    <div>
                        <a href="{{route('colors-index', ['sort'=>'asc'])}}">A-Z</a>
                        <a href="{{route('colors-index', ['sort'=>'desc'])}}">Z-A</a>
                        <a href="{{route('colors-index')}}">Reset</a>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @forelse($colors as $color)
                        <li class="list-group-item">
                            <div class="color-bin">
                                <div class="color-box" style="background:{{$color->color}};">
                                    <h2>{{$color->title}}</h2>
                                </div>
                                <div class="controls">
                                    <a class="btn btn-outline-secondary m-2" href="{{route('colors-show', $color->id)}}">SHOW</a>

                                    @if(Auth::user()->role > 9)
                                    <a class="btn btn-outline-primary m-2" href="{{route('colors-edit', $color)}}">EDIT</a>
                                    <form class="delete" action="{{route('colors-delete', $color)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger m-2" type="submit">Destroy</button>
                                    </form>
                                    @endif

                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No colors, no life.</li>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
