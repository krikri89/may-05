<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Animals in a cart {{$count}}

    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        @forelse($cart as $animal)
        <span class="dropdown-item">
            <div class="cart-item">
                <span>
                    {{$animal->name}} {{$animal->getThisAnimalsColor->title}} {{$animal->count}}
                </span>
                <b class="delete--cart--item" data-item-id="{{$animal->id}}"> x </b>
            </div>
        </span>

        @empty
        Your cart is empty.
        @endforelse

    </div>

</li>
