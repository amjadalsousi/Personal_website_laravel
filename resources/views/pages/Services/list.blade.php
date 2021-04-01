@extends('layouts.admin_layout')
@section('content')
<br><br><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Icon</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($services as $service)
            <th scope="row">{{ $service->id }}</th>
            <td>{{ $service->icon }}</td>
            <td>{{ $service->title }}</td>
            <td>{{Str::limit(strip_tags($service->description),50) }}</td>
            <!-- Str::limit(strip_tags) عشان تحدد فقط 50 حرف -->
            <td>
                <a class="btn btn-primary" href="{{ route('admin.services.edit', $service->id) }}" role="button">Edite</a>&nbsp;

                <form action="{{ route('admin.services.destroy',$service->id )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" name="submit" value="Delete" type="submit">

                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection