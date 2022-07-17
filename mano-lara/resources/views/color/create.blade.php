@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new color</div>

                <div class="card-body">
                    <ul>
                        <h1>Create</h1>
                        <form action="{{route('colors-store')}}" method="post">
                            <div class="form-group">
                                <input type="text" name="create_color_title" />
                            </div>
                            <div class="form-group">
                                <input type="color" name="create_color_input" />
                            </div>
                            @csrf
                            <button class="btn btn-outline-success m-2" type="submit">Ja, nice color</button>


                        </form>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
