@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Category</h1>
    <form action="{{route("category.update",$category->id)}}" method="POST">

        @csrf
        @method("put")
        <div class=" mb-3">
            <label for="" class=" form-label" >Category Title</label>
            <input value="{{old("title",$category->title)}}"  type="text" name="title" class=" form-control @error("title")
             is-invalid
            @enderror">
            @error('title')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
        </div>


        <button class=" btn btn-primary">Update Category</button>
    </form>
</div>
@endsection
