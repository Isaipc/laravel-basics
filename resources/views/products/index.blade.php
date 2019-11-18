@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Product's list
                        <a href="{{ route('products.create')}} " class="btn btn-success btn-sm float-right">new product</a>
                    </div>
                    <div class="card-body">

                        @if (session('info'))
                        <div class="alert alert-success" role="alert"><p> {{ session('info') }} </p></div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                <tr>
                                    <td scope="row">{{ $item->description }} </td>
                                    <td> $ {{ $item->price }} </td>
                                    <td>
                                        <a href="{{ route('products.edit', $item->id)}} " class="btn btn-sm btn-warning">{{__('Edit')}} </a>
                                        <a href="javascript: document.getElementById('delete-{{ $item->id }}').submit()"
                                            class="btn btn-sm btn-danger">
                                            {{ __('Delete')}}
                                        </a>
                                        <form id="delete-{{ $item->id }}" action="{{ route('products.destroy', $item->id) }} " method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
