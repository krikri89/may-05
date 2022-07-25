@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>List of animals</h1>
                    <div>
                        <a href="{{route('animals-index', ['sort' => 'asc'])}}">A-Z</a>
                        <a href="{{route('animals-index', ['sort' => 'desc'])}}">Z-A</a>
                        <a href="{{route('animals-index')}}">Reset</a>
                        <ul class="list-group">
                    </div>
                </div>

                <div class="card-body">


                    @forelse($animals as $animal)
                    <li class="list-group-item">
                        <div class="color-bin">
                            <div class="color-box" style="background:{{$animal->getThisAnimalsColor->color}};">
                                {{-- {{$animal->getThisAnimalsColor->title}} --}}
                                <h2>{{$animal->name}}</h2>
                            </div>

                            @if($animal->photo)
                            <div class="image-box">
                                <img src="{{$animal->photo}}">
                            </div>
                            @endif

                            <div class="controls">
                                <a class="btn btn-outline-secondary m-2" href="{{route('animals-show', $animal->id)}}">Show</a>


                                <a class="btn btn-outline-primary m-2" href="{{route('animals-edit', $animal)}}">Edit</a>


                                <form class="delete" action="{{route('animals-delete', $animal)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger m-2" type="submit">Remove</button>


                                </form>
                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="list-group-item">No animals, no life.</li>

                    @endforelse
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
