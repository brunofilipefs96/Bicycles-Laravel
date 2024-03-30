<div class="container mt-5 glass pt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" action="{{ url('bicycles/' . $bicycle->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <h1>Edit Bicycle {{$bicycle->id}}</h1>
                </div>

                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text"
                           id="brand"
                           name="brand"
                           autocomplete="brand"
                           placeholder="Type the brand"
                           class="form-control
                        @error('name') is-invalid @enderror"
                           value="{{ $bicycle->brand }}"
                           required
                           aria-describedby="nameHelp">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text"
                           id="model"
                           name="model"
                           autocomplete="model"
                           placeholder="Type the model"
                           class="form-control
                        @error('name') is-invalid @enderror"
                           value="{{ $bicycle->model }}"
                           required
                           aria-describedby="nameHelp">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text"
                           id="color"
                           name="color"
                           autocomplete="color"
                           placeholder="Type the color"
                           class="form-control
                        @error('name') is-invalid @enderror"
                           value="{{ $bicycle->color }}"
                           required
                           aria-describedby="nameHelp">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number"
                           id="price"
                           name="price"
                           autocomplete="price"
                           placeholder="Type the price"
                           class="form-control
                        @error('name') is-invalid @enderror"
                           value="{{ $bicycle->price }}"
                           required
                           aria-describedby="nameHelp">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="person_id">Person</label>
                    <select name="person_id" id="person_id" class="form-control">
                        @foreach ($people as $person)
                            @if($person->id == $bicycle->person_id)
                                <option selected value="{{ $person->id }}">{{ $person->first_name }}, {{ $person->last_name }}, {{ $person->birth_date }}</option>
                            @else
                                <option value="{{ $person->id }}">{{ $person->first_name }}, {{ $person->last_name }}, {{ $person->birth_date }}</option>
                            @endif
                        @endforeach
                    </select>

                </div>

                <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
