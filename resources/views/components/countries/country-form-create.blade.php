<div class="container mt-5 glass pt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" action="{{ url('countries') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <h1>Add Country</h1>
                    <hr>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                           id="name"
                           name="name"
                           autocomplete="name"
                           placeholder="Type the country name"
                           class="form-control
                        @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           required
                           aria-describedby="nameHelp">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="person_id">People</label>
                    <select multiple name="person_id[]" id="person_id" class="form-control">
                        @foreach ($people as $person)
                            <option value="{{ $person->id }}">{{ $person->first_name }}, {{ $person->last_name }}, {{ $person->birth_date }}</option>
                        @endforeach
                    </select>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary mt-2 " onclick="document.getElementById('person_id').selectedIndex = -1;">Clear Selection</button>
                    </div>
                </div>

                <button type="submit" class="mt-4 mb-5 btn btn-primary">Add</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
