@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        New product
                    </div>
                    <div class="card-body">
                        {{-- @if (session('info')) --}}
                        {{-- @endif --}}

                        <form action="{{ route('products.store') }} " method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input name="description" type="text" class="form-control" required>
                                </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="price" min="1" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('products.index') }} " class="btn btn-md btn-danger">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
