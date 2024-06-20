    @extends('layouts.admin')

    @section('content')
        <div class="container">
            <h2>Add Product</h2>
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" class="form-control" id="product_name" name="product_name">
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" id="category" name="category">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="sell_price">Sell Price:</label>
                    <input type="text" class="form-control" id="sell_price" name="sell_price">
                </div>
                <div class="form-group">
                    <label for="cost_price">Cost Price:</label>
                    <input type="text" class="form-control" id="cost_price" name="cost_price">
                </div>
                <div class="form-group">
                    <label for="images">Images:</label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple>

                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>

            <hr>

            <h2>Products</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Sell Price</th>
                        <th>Cost Price</th>
                        <th>Images</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <!-- Display the category -->
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->sell_price }}</td>
                            <td>{{ $product->cost_price }}</td>
                            <td>
                                @foreach ($product->images as $image)
                                    <img src="{{ asset('uploads/image' . $image->Image) }}" alt="Product Image"
                                        style="max-width: 100px;">
                                @endforeach
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endsection
