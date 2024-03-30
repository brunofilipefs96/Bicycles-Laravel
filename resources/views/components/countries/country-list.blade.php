<div class="container mt-5">
    <h1>Countries List</h1>

    <table class="table table-striped table-bordered ">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>People</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($countries as $country)
            <tr>
                <td class="text-center">{{ $country->id }}</td>
                <td>{{ $country->name }}</td>
                <td>
                    @foreach ($country->people as $person)
                        @if($person)
                            {{  $person->first_name }} {{  $person->last_name }},
                        @endif
                    @endforeach

                </td>
                <td class="d-flex">
                    <div class="pr-1">
                        <a href="{{url('countries/' . $country->id)}}" type="button"
                           class="btn btn-success">Show</a>
                    </div>
                    <div class="pr-1">
                        <a href="{{url('countries/' . $country->id . '/edit')}}" type="button"
                           class="btn btn-primary">Edit</a>
                    </div>
                    <div>
                        <form action="{{url('countries/' . $country->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4 mb-3 pages">
        {{ $countries->links() }}
    </div>
</div>
