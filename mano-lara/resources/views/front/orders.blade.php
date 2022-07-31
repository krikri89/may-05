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
                            <div class="right m-2">
                                <small> {{$order->time}}</small>
                                {{$statuses[$order->status]}}
                            </div>

                            <div class="color-box2" style="background:{{$order->animal->getThisAnimalsColor->color}}">

                                <i>{{$order->animal->getThisAnimalsColor->title}}</i>
                                <h2>{{$order->animal->name}}
                                    <small>{{$order->count}} units</small></h2>
                                {{-- Cia animal yra function pavadinimas is model sujungimo, taip pat ir getThisAnimalsColor--}}
                            </div>

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
