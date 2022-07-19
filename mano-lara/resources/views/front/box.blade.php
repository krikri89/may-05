<div class="card mb-4">
    <div class="card-header">
        <h1>Sort Filter Search</h1>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <form class="delete" action="{{route('front-index')}}" method="get">
                        <div class="form-group">
                            <label>What sort?</label>
                            <select class="form-control" name="sort">
                                <option value="dafault">Default sort</option>
                                <option value="color-asc">Color A-Z</option>
                                <option value="color-desc">Color Z-A</option>
                                <option value="animals-asc">Animal A-Z</option>
                                <option value="animal-desc">Animal Z-A</option>
                            </select>
                        </div>
                        <button class="btn btn-outline-warning m-2" type="submit">Sort</button>
                    </form>
                    <a class="btn btn-outline-primary m-2" href="{{route('front-index')}}">Clear</a>


                </div>
            </div>
        </div>
    </div>
</div>
