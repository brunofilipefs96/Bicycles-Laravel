<div class="container mt-5 glass pt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="GET" action="{{ url('players') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <h1> Show Country {{$country->id}}</h1>
                </div>
                <div class="form-group mt-3">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" placeholder="{{$country->name}}"  disabled>
                    <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone
                        else.</small>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="/people" type="button"
                       class="btn btn-primary mt-4 mb-5">Back</a>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
