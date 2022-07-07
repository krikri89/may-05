@extends('main')
@section('content')
<ul>
@forelse($colors as $color)
    <li>
   <div class="color-box" style="background:{{$color}}">{{$color}}   </div>
    </li>
@empty
<li> No colors, no life. </li>
    
@endforelse

@endsection