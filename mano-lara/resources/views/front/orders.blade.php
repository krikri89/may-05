@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @forelse($orders as $order)
            <div class="card mt-3">
                <div class="card-header">Order</div>
                <div class="card-body">
                    <div class="right m-2">
                        <small> {{$order->time}}</small>
                        {{$statuses[$order->status]}}
                    </div>

                    <ul class="list-group">
                        @foreach($order->animals as $animal)
                        <li class="list-group-item">
                            <div class="color-box2" style="background:{{$animal->getThisAnimalsColor->color}}">
                                <i>{{$animal->getThisAnimalsColor->title}}</i>
                                <h2>{{$animal->name}}
                                    <small>{{$animal->count}} units</small></h2>
                                {{-- Cia animal yra function pavadinimas is model sujungimo, taip pat ir getThisAnimalsColor--}}
                            </div>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @empty
            <div>No orders yet</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
