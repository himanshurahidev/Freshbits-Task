@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title">Product Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    aria-describedby="emailHelp" placeholder="Title" value="{{ old('title') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Product Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    aria-describedby="emailHelp" placeholder="Price" value="{{ old('price') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="upc">Product UPC</label>
                                <input type="text" class="form-control" id="upc" name="upc"
                                    aria-describedby="emailHelp" placeholder="UPC" value="{{ old('upc') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="status">Product Status</label>
                                <select class="custom-select form-control" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="image">Product Image</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    aria-label="Upload">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
