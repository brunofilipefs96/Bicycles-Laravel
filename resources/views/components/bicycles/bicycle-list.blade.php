<div class="container mt-5">
    <h1>Bicycles List</h1>

    <table class="table table-striped table-bordered ">
        <thead>
        <tr>
            <th>#</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Color</th>
            <th>Price</th>
            <th>Owner</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($bicycles as $bicycle)
            <tr>
                <td class="text-center">{{ $bicycle->id }}</td>
                <td>{{ $bicycle->brand }}</td>
                <td>{{ $bicycle->model }}</td>
                <td>{{ $bicycle->color }}</td>
                <td>{{ $bicycle->price }}</td>
                <td>
                    @if($bicycle->person)
                        {{ $bicycle->person->first_name }} {{ $bicycle->person->last_name }}
                    @endif
                </td>
                <td class="d-flex">
                    <div class="pr-1">
                        <a href="{{url('bicycles/' . $bicycle->id)}}" type="button"
                           class="btn btn-success">Show</a>
                    </div>
                    <div class="pr-1">
                        <a href="{{url('bicycles/' . $bicycle->id . '/edit')}}" type="button"
                           class="btn btn-primary">Edit</a>
                    </div>
                    <div>
                        <form action="{{url('bicycles/' . $bicycle->id)}}" method="POST">
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
        {{ $bicycles->links() }}
    </div>
</div>
