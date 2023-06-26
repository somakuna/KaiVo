@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header h5 bg-warning bg-gradient"><strong>LIST ALL</strong> BREAKFAST Services</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table 
                                    class="table table-sm table-striped table-bordered text-center align-middle" 
                                    style="white-space:nowrap"
                                    data-toggle="table"
                                    data-search="true"
                                    data-pagination="true"
                                    data-search-align="left"
                                    data-search-highlight="true"
                                    data-page-size="20"
                                    data-show-extended-pagination="true"
                                >
                                    <thead>
                                        <th data-sortable="true" data-field="name">Name</th>
                                        <th data-field="bike_price">Price</th>
                                        <th data-field="action" style="width:8%;">Actions</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($breakfastServices as $breakfastService)
                                        <tr>
                                            <td>{{ $breakfastService->name }}</td>
                                            <td>{{ $breakfastService->price }}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="{{ route('breakfastService.edit', $breakfastService) }}" title="Edit" class="btn btn-outline-secondary"><i class="bi bi-pen"></i></a>
                                                    <a href="{{ route('breakfastService.destroy', $breakfastService) }}" title="Delete" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this service?')"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mt-1 justify-content-center">
                        <div class="col-auto">
                            <a href="{{ route('home') }}" class="btn  btn-outline-secondary">
                                <i class="bi-arrow-left-square"></i> Home</a>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('breakfastService.create') }}" class="btn  btn-outline-success">
                                <i class="bi bi-plus-square"></i> Create New</a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection