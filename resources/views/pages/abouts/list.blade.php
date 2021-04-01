@extends('layouts.admin_layout')
@section('content')
<br><br><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title 1</th>
            <th scope="col">Title 2</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($abouts as $about)
            <th scope="row">{{ $about->id }}</th>
            <td>{{ $about->title1 }}</td>
            <td>{{ $about->title12 }}</td>
            <td>{{Str::limit(strip_tags($about->description),40)}}</td>

            <td>
                <img style="height: 10vh" src="{{url($about->image)}}" alt="image">
            </td>
            <!-- Str::limit(strip_tags) عشان تحدد فقط 50 حرف -->
            <td>
                <a class="btn btn-primary" href="{{ route('admin.abouts.edit', $about->id) }}" role="button">Edite</a>&nbsp;

                <form action="{{ route('admin.abouts.destroy',$about->id )}}" method="POST">
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