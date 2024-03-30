<div class="container mt-5 glass pt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" action="{{ url('bicycles') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <h1>Add Bicycle</h1>
                    <hr>
                </div>

                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text"
                           id="brand"
                           name="brand"
                           autocomplete="brand"
                           placeholder="Type the Brand"
                           class="form-control
                        @error('name') is-invalid @enderror"
                           value="{{ old('brand') }}"
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
                           placeholder="Type the Model"
                           class="form-control
                        @error('name') is-invalid @enderror"
                           value="{{ old('model') }}"
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
                           placeholder="Type the Color"
                           class="form-control
                        @error('name') is-invalid @enderror"
                           value="{{ old('color') }}"
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
                           placeholder="Type the Price"
                           class="form-control
                        @error('name') is-invalid @enderror"
                           value="{{ old('price') }}"
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
                            <option value="{{ $person->id }}">{{ $person->first_name }}, {{ $person->last_name }}, {{ $person->birth_date }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="mt-4 mb-5 btn btn-primary">Add</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
