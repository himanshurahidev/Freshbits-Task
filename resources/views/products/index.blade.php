@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>
                            <strong>{{ __('Dashboard') }}</strong>
                        </span>
                        <span>
                            <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>
                        </span>
                    </div>
                    <livewire:products-list />
                </div>
            </div>
        </div>
    </div>
@endsection
