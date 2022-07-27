@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Orders</div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($orders as $order)
                        <li class="list-group-item">
                            <div class="color-box2" style="background:{{$order->animal->getThisAnimalsColor->color}}">

                                <i>{{$order->animal->getThisAnimalsColor->title}}</i>
                                <h2>{{$order->animal->name}} <small>{{$order->count}} units</small></h2>
                                {{-- Cia animal yra function pavadinimas is model sujungimo, taip pat ir getThisAnimalsColor--}}



                            </div>
                            <div class="controls mt-2">
                                <form class="delete form" action="" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>What color?</label>
                                                    <select class="form-control" name="color_id">
                                                        @foreach($statuses as $key => $status)
                                                        <option value="{{$key}}">{{$status}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-outline-info m-4">Set status</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </li>

                        @empty
                        <li class="list-group-item">No orders yet</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
