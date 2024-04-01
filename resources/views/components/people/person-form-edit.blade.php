<div class="container mt-5 glass pt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" action="{{ url('people/' . $person->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <h1>Edit Person {{$person->id}}</h1>
                </div>

                <div class="form-group">
                    @if ($person->image)
                        <img class="w-100 img-responsive" src="{{ asset('storage/'.$person->image) }}" alt=""
                             title=""></a>
                    @else
                        <p>
                            No Image
                        </p>
                    @endif
                    <label for="image">Image</label>
                    <input
                        type="file"
                        id="image"
                        name="image"
                        autocomplete="image"
                        class="form-control
                        @error('image') is-invalid @enderror"
                        value="{{ old('image') }}">
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text"
                           id="first_name"
                           name="first_name"
                           autocomplete="name"
                           placeholder="Type your first name"
                           class="form-control
                        @error('first_name') is-invalid @enderror"
                           value="{{ $person->first_name }}"
                           required
                           aria-describedby="nameHelp">
                    <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone
                        else.</small>
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text"
                           id="last_name"
                           name="last_name"
                           autocomplete="last_name"
                           placeholder="Type your last name"
                           class="form-control
                        @error('last_name') is-invalid @enderror"
                           value="{{ $person->last_name }}"
                           required
                           aria-describedby="nameHelp">
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="birth_date">Birth Date</label>
                    <input type="date"
                           id="birth_date"
                           name="birth_date"
                           autocomplete="birth_date"
                           placeholder="Type your Birth Date"
                           class="form-control
                        @error('birth_date') is-invalid @enderror"
                           value="{{ $person->birth_date }}"
                           required
                           aria-describedby="nameHelp">
                    @error('birth_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country_id" id="country_id" class="form-control">
                        @foreach ($countries as $country)
                            @if($country->id == $person->country_id)
                                <option selected value="{{ $country->id }}">{{ $country->name }}</option>
                            @else
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="bicycle_id">Bicycles</label>
                    <select multiple name="bicycle_id[]" id="bicycle_id" class="form-control">
                        @foreach ($bicycles as $bicycle)
                            @php
                                $isSelected = $person->bicycles->contains($bicycle);
                            @endphp
                            <option {{ $isSelected ? 'selected' : '' }} value="{{ $bicycle->id }}">{{ $bicycle->brand }}
                                , {{ $bicycle->model }}, {{ $bicycle->color }}, {{ $bicycle->price }}</option>
                        @endforeach
                    </select>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary mt-2 "
                                onclick="document.getElementById('bicycle_id').selectedIndex = -1;">Clear Selection
                        </button>
                    </div>

                    <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
