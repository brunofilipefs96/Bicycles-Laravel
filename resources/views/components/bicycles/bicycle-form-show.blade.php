<div class="container mt-5 glass pt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="GET" action="{{ url('players') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <h1> Show Bicycle {{$bicycle->id}}</h1>
                </div>
                <div class="form-group mt-3">
                    <label for="brand">Brand</label>
                    <input class="form-control" type="text" value="{{$bicycle->brand}}" disabled>
                    <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone
                        else.</small>
                </div>

                <div class="form-group mt-2">
                    <label for="model">Model</label>
                    <input class="form-control" type="text" value="{{$bicycle->model}}" disabled>
                </div>

                <div class="form-group mt-2">
                    <label for="color">Color</label>
                    <input class="form-control" type="text" value="{{$bicycle->color}}" disabled>
                </div>

                <div class="form-group mt-2">
                    <label for="price">Price</label>
                    <input class="form-control" type="number" value="{{$bicycle->price}}" disabled>
                </div>

                <div class="form-group mt-2">
                    <label for="person">Person</label>
                    <input class="form-control" type="text" value="@if($bicycle->person){{$bicycle->person->first_name}} {{$bicycle->person->last_name}}@endif" disabled>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="/bicycles" type="button"
                       class="btn btn-primary mt-4 mb-5">Back</a>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
