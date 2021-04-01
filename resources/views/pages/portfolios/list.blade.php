@extends('layouts.admin_layout')
@section('content')
<br><br><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Sub Title</th>
            <th scope="col">Description</th>
            <th scope="col">Big image</th>
            <th scope="col">Small image</th>
            <th scope="col">client</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($portfolios as $portfolio)
            <th scope="row">{{ $portfolio->id }}</th>
            <td>{{ $portfolio->title }}</td>
            <td>{{ $portfolio->sub_title }}</td>
            <td>{{Str::limit(strip_tags($portfolio->description),40)}}</td>

            <td>
                <img style="height: 10vh" src="{{url($portfolio->big_img)}}" alt="big_img">
            </td>
            <td>
                <img style="height: 10vh" src="{{url($portfolio->small_img)}}" alt="small_img">
            </td>
            <td>{{ $portfolio->client }}</td>
            <td>{{ $portfolio->category }}</td>
            <!-- Str::limit(strip_tags) عشان تحدد فقط 50 حرف -->
            <td>
                <a class="btn btn-primary" href="{{ route('admin.portfolios.edit', $portfolio->id) }}" role="button">Edite</a>&nbsp;

                <form action="{{ route('admin.portfolios.destroy',$portfolio->id )}}" method="POST">
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