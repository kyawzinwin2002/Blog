@extends('layouts.app')
@section('content')
   <div class="container">
    <div class="row">
        <div class="col-12">
            <h3>Create New Category</h3>
    <hr>
    <form action="{{route("category.store")}}" method="POST">
        @csrf
        <div class=" mb-3">
            <label for="" class=" form-label" >Category Title</label>
            <input value="{{old("title")}}"  type="text" name="title" class=" form-control @error("title")
             is-invalid
            @enderror">
            @error('title')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
        </div>


        <button class=" btn btn-primary">Save Category</button>
    </form>
        </div>
    </div>
   </div>
@endsection
