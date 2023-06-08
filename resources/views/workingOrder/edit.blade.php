@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h5 bg-dark bg-gradient text-white">Uređivanje radnog naloga br. {{$workingOrder->number}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('workingOrder.update', $workingOrder) }}" enctype="multipart/form-data" autocomplete="on">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-md-1 col-form-label text-md-end">Broj naloga:</label>
                            <div class="col">
                                <input
                                    id="number"
                                    name="number"
                                    value="{{ old('number', $workingOrder->number) }}"
                                    type="text"
                                    class="form-control fw-bold"
                                    required
                                />
                            </div>
                            <label class="col-md-1 col-form-label text-md-center">Tvrtka:</label>
                            <div class="col">
                                <input
                                    id="host"
                                    name="host"
                                    value="{{ old('host', $workingOrder->host) }}"
                                    type="text"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <label class="col-md-1 col-form-label text-md-center">Naručitelj:</label>
                            <div class="col">
                                <input
                                    id="client"
                                    name="client"
                                    value="{{ old('client', $workingOrder->client) }}"
                                    type="text"
                                    class="form-control"
                                    required
                                />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-1 col-form-label text-md-end">Vozilo:</label>
                            <div class="col">
                                <input
                                    id="vehicle_model"
                                    name="vehicle_model"
                                    value="{{ old('vehicle_model', $workingOrder->vehicle_model) }}"
                                    type="text"
                                    class="form-control fw-bold"
                                    required
                                />
                            </div>
                            <label class="col-md-1 col-form-label text-md-center">Kilometri:</label>
                            <div class="col">
                                <input
                                    id="vehicle_km"
                                    name="vehicle_km"
                                    value="{{ old('vehicle_km', $workingOrder->vehicle_km) }}"
                                    type="text"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <label class="col-md-1 col-form-label text-md-center">Registracija:</label>
                            <div class="col">
                                <input
                                    id="vehicle_reg_plate"
                                    name="vehicle_reg_plate"
                                    value="{{ old('vehicle_reg_plate', $workingOrder->vehicle_reg_plate) }}"
                                    type="text"
                                    class="form-control"
                                    required
                                />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-1 col-form-label text-md-end">Napomena:</label>
                            <div class="col-md-8">
                                <input
                                    id="footnote"
                                    name="footnote"
                                    value="{{ old('number', $workingOrder->number) }}"
                                    type="text"
                                    class="form-control"
                                />
                            </div>
                            <label class="col-md-1 col-form-label text-md-center">Datum:</label>
                            <div class="col">
                                <input
                                    id="date"
                                    name="date"
                                    value="{{ old('date', $workingOrder->date->format('Y-m-d')) }}"
                                    type="date"
                                    class="form-control"
                                    required
                                />
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto m-3">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="bi bi-save"></i> Spremi
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