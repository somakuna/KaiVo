@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-success bg-gradient text-white"><strong>CREATE NEW</strong> BIKE Service</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('bikeService.store') }}" enctype="multipart/form-data" autocomplete="on">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label" for="number">Name:</label>
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    class="form-control bg-white fw-bold @error('name') is-invalid @enderror"
                                    required
                                />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Price:</label>
                                <input
                                    id="bike_price"
                                    name="bike_price"
                                    type="number"
                                    step="0.01"
                                    class="form-control bg-white @error('bike_price') is-invalid @enderror"
                                    required
                                />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="number">Finish time:</label>
                                <input
                                    id="finish_time"
                                    name="finish_time"
                                    type="text"
                                    class="form-control bg-white border-warning"
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
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="alert alert-primary" role="alert">
                <h4 class="alert-heading fw-bold">Heads up!</h4>
                <p class="mb-0">Field "Finish Time" is required for automatic calculation of the retrun time when the start date is selected! <br>
                It must follow the convention of Number than Time period. <i>Example: 6 hours, 2 days, 1 week, 12 seconds</i></p>
              </div>
        </div>
    </div>
</div>
@endsection