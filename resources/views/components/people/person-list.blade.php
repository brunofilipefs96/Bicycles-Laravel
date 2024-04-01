<div class="container mt-5">
    <h1>People List</h1>

    <table class="table table-striped table-bordered ">
        <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birth Date</th>
            <th>Country</th>
            <th>Bicycles</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($people as $person)
            <tr>
                <td class="text-center">{{ $person->id }}</td>
                <td>
                    @if ($person->image)
                        <img class="w-100 img-responsive" src="{{ asset('storage/'.$person->image) }}" alt="" title=""></a>
                    @else
                        <p>
                            No Image
                        </p>
                    @endif
                </td>
                <td>{{ $person->first_name }}</td>
                <td>{{ $person->last_name }}</td>
                <td>{{ $person->birth_date }}</td>
                <td>
                    @if($person->country)
                        {{ $person->country->name }}
                    @endif
                </td>
                <td>
                    @foreach ($person->bicycles as $bicycle)
                        @if($bicycle)
                            {{  $bicycle->brand }} {{  $bicycle->model }},
                        @endif
                    @endforeach
                </td>
                <td class="d-flex">
                    <div class="pr-1">
                        <a href="{{url('people/' . $person->id)}}" type="button"
                           class="btn btn-success">Show</a>
                    </div>
                        <div class="pr-1">
                            <a href="{{url('people/' . $person->id . '/edit')}}" type="button"
                               class="btn btn-primary">Edit</a>
                        </div>
                        <div>
                            <form action="{{url('people/' . $person->id)}}" method="POST">
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
        {{ $people->links() }}
    </div>
</div>
