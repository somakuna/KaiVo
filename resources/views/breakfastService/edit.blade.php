@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-warning bg-gradient"><strong>EDIT</strong> BREAKFAST Service</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('breakfastService.update', $breakfastService) }}" enctype="multipart/form-data" autocomplete="on">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-10">
                                <label class="form-label" for="number">Name:</label>
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{ old('name', $breakfastService->name) }}"
                                    class="form-control bg-white fw-bold @error('name') is-invalid @enderror"
                                    required
                                />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Price:</label>
                                <input
                                    id="price"
                                    name="price"
                                    type="number"
                                    value="{{ old('price', $breakfastService->price) }}"
                                    step="0.01"
                                    class="form-control bg-white @error('price') is-invalid @enderror"
                                    required
                                />
                            </div>
                        </div>
                        <div class="row g-3 mt-1 justify-content-center">
                            <div class="col-auto">
                                <a href="{{ route('home') }}" class="btn  btn-outline-danger">
                                    <i class="bi-arrow-left-square"></i> Discard</a>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn  btn-outline-primary">
                                    <i class="bi bi-save"></i> Save
                                </button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection