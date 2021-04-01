@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('admin.abouts.update', $about->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row text-center">
                <div class="form-group col-md-3 mt-3">
                    <h3>Image</h3>
                    <img style="height: 30vh" src="{{url($about->image) }}" class="img-thumbnail">
                    <input class="mt-3" type="file" name="image">
                </div>
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for="title">
                            <h4>Title 1 </h4>
                        </label>
                        <input type="text" class="form-control" id="title1" name="title1" value="{{ $about->title1 }}">
                    </div>
                    <div class="mb-5">
                        <label for="sub_title">
                            <h4>Title 2</h4>
                        </label>
                        <input type="text" class="form-control" id="title12" name="title12" value="{{ $about->title12 }}">
                    </div>
                </div>
                <div class="form-group col-md-4 mt-3">
                    <div class=" mb-3">
                        <h3>Description</h3>
                        <textarea class="form-control" name="description" rows="5">{{$about->description}}</textarea>
                        <input type="submit" name="submit" class="btn btn-primary my-5">
                    </div>
                </div>
            </div>

    </div>
    </form>
</main>

@endsection