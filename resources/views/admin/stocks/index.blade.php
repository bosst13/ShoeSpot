@extends('layouts.admin')

@section('content')
<div id="stocks" class="container">
    <button type="button" id="stockAdd" class="btn btn-info btn-lg" data-toggle="modal" data-target="#stockModal">Add<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    <div class="card-body" style="height: 210px;">
        <input type="text" id="itemSearch" placeholder="--search--">
    </div>
    <div class="table-responsive">
        <table id="stable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="sbody"></tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="stockModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stockModalLabel">Create New Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="sform" method="POST" action="#">
                    <div class="form-group">
                        <label for="product_name" class="control-label">Product Name</label>
                        <select class="form-control" id="product_name" name="product_name">
                            <!-- Options will be populated dynamically -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="control-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="stockSubmit" type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
