@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Edit Brand</h2>
        <form action="{{ route('brands.update', ['brand' => $brand->brand_id]) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Brand Name:</label>
                <input type="text" class="form-control" id="brand_name" name="name" value="{{$brand->name}}">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" value="{{$brand->name}}">
                    <option value="in stock">In Stock</option>
                    <option value="not available">Not Available</option>
                </select>
            </div>
            <div class="form-group">
                <label for="images">Images:</label>
                    <div>
                        <img src="{{ asset('uploads/image' . $brand->images) }}" alt="Product Image" style="max-width: 100px;">
                    </div>
                    <div class="mt-2">
                        <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
                    </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Brand</button>
        </form>
@endsection
