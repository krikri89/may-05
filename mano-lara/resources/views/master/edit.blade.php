@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Add skills {{$master->master_name}}</h1>

                </div>

                <div class="card-body">
                    <ul>
                        <form action="{{route('masters-update', $master)}}" method="post">

                            @foreach($skills as $key => $skill)

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" {{$skill->has? 'checked':''}} class="form-check-input" value="{{$skill->id}}" name="skill[]" id="_{{$key}}">

                                    <label class="form-check-label" for="_{{$key}}">{{$skill->skill}}</label>
                                </div>
                                @endforeach

                            </div>

                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success m-2" type="submit">Add new skill</button>


                        </form>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
