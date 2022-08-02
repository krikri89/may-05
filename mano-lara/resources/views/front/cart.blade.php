<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Animals in a cart {{$count}}

    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        @forelse($cart as $animal)
        <a class="dropdown-item">
            {{$animal->name}} {{$animal->count}} </a>



        @empty
        Your cart is empty.
        @endforelse

    </div>

</li>
