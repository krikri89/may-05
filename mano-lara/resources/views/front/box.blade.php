<div class="card mb-4">
    <div class="card-header">
        <h1>Sort Filter Search</h1>
    </div>
    <div class="card-body">
        <form class="delete" action="{{route('front-index')}}" method="get">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>What sort?</label>
                            <select class="form-control" name="sort">
                                <option value="dafault" @if($sort=='default' )selected @endif>Default sort</option>
                                <option value="color-asc" @if($sort=='color-asc' )selected @endif>Color A-Z</option>
                                <option value="color-desc" @if($sort=='color-desc' )selected @endif>Color Z-A</option>
                                <option value="animals-asc" @if($sort=='animals-asc' )selected @endif>Animal A-Z</option>
                                <option value="animal-desc" @if($sort=='animal-desc' )selected @endif>Animal Z-A</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>What color?</label>
                            <select class="form-control" name="color_id">
                                <option value="0" @if($filter==0) selected @endif>No filter</option>
                                @foreach($colors as $color)
                                <option value="{{$color->id}}" @if($filter==$color->id) selected @endif>{{$color->title}}</option>

                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="col-6">
                        <button class="btn btn-outline-warning m-2 mt-4" type="submit">Sort</button>
                        <a class="btn btn-outline-primary m-2 mt-4" href="{{route('front-index')}}">Clear</a>
                    </div>
                </div>
            </div>
        </form>
        <form class="delete" action="{{route('front-index')}}" method="get">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mt-4">
                            <label>Search</label>
                            <input class="form-control" type="text" name="s" value="{{$s}}"/>
                        </div>
                        <button class="btn btn-outline-success mt-2" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </form>


    </div>
</div>
