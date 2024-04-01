<div class="container mt-5 glass pt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" action="{{ url('countries/' . $country->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <h1>Edit Country {{$country->id}}</h1>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                           id="name"
                           name="name"
                           autocomplete="name"
                           placeholder="Type your name"
                           class="form-control
                        @error('name') is-invalid @enderror"
                           value="{{ $country->name }}"
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
                            @php
                                $isSelected = in_array($person->id, $country->people->pluck('id')->toArray());
                            @endphp
                            <option
                                value="{{ $person->id }}" {{ $isSelected ? 'selected' : '' }}>{{ $person->first_name }}
                                , {{ $person->last_name }}, {{ $person->birth_date }}</option>
                        @endforeach
                    </select>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary mt-2 "
                                onclick="document.getElementById('person_id').selectedIndex = -1;">Clear Selection
                        </button>
                    </div>

                    <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
