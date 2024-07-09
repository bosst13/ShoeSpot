@extends('layouts.admin')

@section('content')
<div id="products" class="container">
    <button type="button" id="productAdd" class="btn btn-info btn-lg" data-toggle="modal" data-target="#productModal">Add<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    <div class="card-body" style="height: 210px;">
        <input type="text" id="itemSearch" placeholder="--search--">
    </div>
    <div class="table-responsive">
        <table id="ptable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Brand ID</th>
                    <th>Brand Name</th>
                    <th>Description</th>
                    <th>Sell Price</th>
                    <th>Cost Price</th>
                </tr>
            </thead>
            <tbody id="pbody"></tbody>
        </table>
    </div>
</div>

<!-- <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Create New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="pform" method="POST" action="#">
                     <div class="form-group">
                        <label for="product" class="control-label">Product</label>
                        <input type="text" class="form-control" id="product" name="product">
                    </div>
                    <div class="form-group">
                        <label for="brand_name" class="control-label">Brand Name</label>
                        <select class="form-control" id="brand_name" name="brand_id">
                    
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="prod_description" class="control-label">Description</label>
                        <input type="text" class="form-control" id="proddesc" name="proddesc">
                    </div>
                    <div class="form-group">
                        <label for="sell_price" class="control-label">Sell Price</label>
                        <input type="number" class="form-control" id="sellprice" name="sellprice">
                    </div>
                    <div class="form-group">
                        <label for="cost_price" class="control-label">Cost Price</label>
                        <input type="number" class="form-control" id="costprice" name="costprice">
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="control-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="productSubmit" type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Create New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="pform" method="POST" action="#">
                    <div class="form-group">
                        <label for="product" class="control-label">Product</label>
                        <input type="text" class="form-control" id="product" name="product">
                    </div>
                    <div class="form-group">
                        <label for="brand_name" class="control-label">Brand Name</label>
                        <select class="form-control" id="brand_name" name="brand_name">
                            <option value="">Select a brand</option>
                            <!-- Options will be populated dynamically -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="proddesc" class="control-label">Description</label>
                        <input type="text" class="form-control" id="proddesc" name="proddesc">
                    </div>
                    <div class="form-group">
                        <label for="sellprice" class="control-label">Sell Price</label>
                        <input type="number" class="form-control" id="sellprice" name="sellprice">
                    </div>
                    <div class="form-group">
                        <label for="costprice" class="control-label">Cost Price</label>
                        <input type="number" class="form-control" id="costprice" name="costprice">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="productSubmit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
