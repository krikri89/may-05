@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Update color</h1>
                </div>

                <div class="card-body">
                    <ul>
                        <form action="{{route('colors-update', $color)}}" method="post">
                            <div class="form-group">
                                <input class="form-control" type="text" name="create_color_title" value="{{$color->title}}" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="color" name="create_color_input" value="{{$color->color}}" />
                            </div>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success m-2" type="submit">Ja, this is a new color</button>


                        </form>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
