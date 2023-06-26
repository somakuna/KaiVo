@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-primary bg-gradient text-white"><strong>EDIT</strong> TOUR Service</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tourService.update', $tourService) }}" enctype="multipart/form-data" autocomplete="on">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="number">Name:</label>
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{ old('name', $tourService->name) }}"
                                    class="form-control bg-white fw-bold @error('name') is-invalid @enderror"
                                    required
                                />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="number">Description:</label>
                                <input
                                    id="description"
                                    name="description"
                                    type="text"
                                    value="{{ old('name', $tourService->description) }}"
                                    class="form-control bg-white"
                                />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Adults Price:</label>
                                <input
                                    id="adults_price"
                                    name="adults_price"
                                    type="number"
                                    value="{{ old('name', $tourService->adults_price) }}"
                                    step="0.01"
                                    class="form-control bg-white @error('adults_price') is-invalid @enderror"
                                    required
                                />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Children Price:</label>
                                <input
                                    id="children_price"
                                    name="children_price"
                                    type="number"
                                    value="{{ old('name', $tourService->children_price) }}"
                                    step="0.01"
                                    class="form-control bg-white @error('children_price') is-invalid @enderror"
                                    required
                                />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Infants Price:</label>
                                <input
                                    id="infants_price"
                                    name="infants_price"
                                    type="number"
                                    value="{{ old('name', $tourService->infants_price) }}"
                                    step="0.01"
                                    class="form-control bg-white @error('infants_price') is-invalid @enderror"
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