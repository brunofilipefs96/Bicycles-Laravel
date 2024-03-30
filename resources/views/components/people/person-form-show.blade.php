<div class="container mt-5 glass pt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="GET" action="{{ url('players') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <h1> Show Person {{$person->id}}</h1>
                </div>

                <div class="form-group">
                    @if ($person->image)
                        <img class="w-100 img-responsive" src="{{ asset('storage/'.$person->image) }}" alt="" title="">
                    @endif
                </div>

                <div class="form-group mt-3">
                    <label for="first_name">First Name</label>
                    <input class="form-control" type="text" placeholder="{{$person->first_name}}"  disabled>
                    <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone
                        else.</small>
                </div>

                <div class="form-group mt-2">
                    <label for="last_name">Last Name</label>
                    <input class="form-control" type="text" placeholder="{{$person->last_name}}" disabled>
                </div>

                <div class="form-group mt-2">
                    <label for="birth_date">Birth Date</label>
                    <input class="form-control" type="text" placeholder="{{$person->birth_date}}" disabled>
                </div>

                <div class="form-group">
                    <label for="bicycle_id">Bicycles</label>
                    <select multiple disabled name="bicycle_id[]" id="bicycle_id" class="form-control">
                        @foreach ($person->bicycles as $bike)
                            <option value="{{ $bike->id }}">{{ $bike->brand }}, {{ $bike->model }}, {{ $bike->color }}, {{ $bike->price }}</option>
                        @endforeach
                    </select>
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
