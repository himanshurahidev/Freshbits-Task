@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <form action="{{route('products.store')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                          <label for="exampleInputEmail1">Product Title</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Product Price</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="price" aria-describedby="emailHelp" placeholder="Enter email">
                          </div>
                          <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Product UPC</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="upc" aria-describedby="emailHelp" placeholder="Enter email">
                          </div>
                          <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Product Status</label>
                            <select class="custom-select form-control" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                              </select>
                          </div>
                          <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="image" aria-describedby="emailHelp" placeholder="Enter email">
                          </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
