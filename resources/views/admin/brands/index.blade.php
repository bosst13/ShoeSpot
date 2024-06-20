@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Add Brand</h2>
        <form action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <label for="brand_name">Brand Name:</label>
                <input type="text" class="form-control" id="brand_name" name="brand_name">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="in stock">In Stock</option>
                    <option value="not available">Not Available</option>
                </select>
            </div>
            <div class="form-group">
                <label for="images">Images:</label>
                <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Add Brand</button>
        </form>

        <hr>

        <h2>Brands</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Brand Name</th>
                    <th>Status</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->name }}</td>
                        <!-- Display the category -->
                        <td>{{ $brand->status }}</td>
                        <td>
                                <img src="{{ asset('uploads/image' . $brand->images) }}" alt="Product Image"
                                    style="max-width: 100px;">
                        </td>
                        <td>
                            <a href="{{ route('brands.edit', $brand->brand_id) }}" class="btn btn-primary">Edit</a>
                            <form method="post" action="{{ route('brands.destroy', $brand->brand_id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
