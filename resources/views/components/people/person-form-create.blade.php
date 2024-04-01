<div class="container mt-5 glass pt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" action="{{ url('people') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <h1>Add Person</h1>
                    <hr>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input
                        type="file"
                        id="image"
                        name="image"
                        autocomplete="image"
                        class="form-control
                    @error('image') is-invalid @enderror"
                        value="{{ old('image') }}"
                    >
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
                           autocomplete="first_name"
                           placeholder="Type your first name"
                           class="form-control
                        @error('first_name') is-invalid @enderror"
                           value="{{ old('first_name') }}"
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
                           value="{{ old('last_name') }}"
                           required
                           aria-describedby="nameHelp">
                    <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone
                        else.</small>
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
                           value="{{ old('birth_date') }}"
                           required
                           aria-describedby="nameHelp">
                    <small id="nameHelp" class="form-text text-muted">We'll never share your data with anyone
                        else.</small>
                    @error('birth_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="country_id">Country</label>
                    <select name="country_id" id="country_id" class="form-control">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="bicycle_id">Bicycles</label>
                    <select multiple name="bicycle_id[]" id="bicycle_id" class="form-control">
                        @foreach ($bicycles as $bicycle)
                            <option value="{{ $bicycle->id }}">{{ $bicycle->brand }}, {{ $bicycle->model }}
                                , {{ $bicycle->color }}, {{ $bicycle->price }}</option>
                        @endforeach
                    </select>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary mt-2 "
                                onclick="document.getElementById('bicycle_id').selectedIndex = -1;">Clear Selection
                        </button>
                    </div>

                    <button type="submit" class="mt-4 mb-5 btn btn-primary">Add</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
