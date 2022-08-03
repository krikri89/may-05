<h1> Order From:
    {{$order->client->name}}
</h1>

<ul>
    @foreach($order->animals as $animal)
    <li class="list-group-item">
        <div style="background:{{$animal->getThisAnimalsColor->color}}">
            <i>{{$animal->getThisAnimalsColor->title}}</i>
            <h2>{{$animal->name}}
                <small>{{$animal->count}} units</small></h2>
        </div>

    </li>
    @endforeach
</ul>
