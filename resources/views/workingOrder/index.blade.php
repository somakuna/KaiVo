@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-3">
            <div class="card">
                <div class="card-header h5 bg-primary bg-gradient text-white">Pregled radnih naloga</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table 
                            class="table table-sm table-striped table-bordered text-center align-middle" 
                            style="white-space:nowrap"
                            data-toggle="table"
                            data-search="true"
                            data-pagination="true"
                            data-search-align="right"
                            data-page-size="15"
                            data-show-extended-pagination="true"
                        >
                            <thead>
                                <th data-sortable="true" data-field="number">Broj</th>
                                <th data-sortable="true" data-field="date">Datum</th>
                                <th data-field="host">Tvrtka</th>
                                <th data-field="client">Naručitelj</th>
                                <th data-field="vehicle_model">Vozilo</th>
                                <th data-field="vehicle_km">KM</th>
                                <th data-field="vehicle_reg_plate">Registracija</th>
                                <th data-field="user">Kreator</th>
                                <th data-sortable="true" data-field="total">Iznos</th>
                                <th data-field="action" style="width:8%;">Akcije</th>
                            </thead>
                            <tbody>
                                @foreach ($workingOrders as $workingOrder)
                                <tr>
                                    <td>{{ $workingOrder->number }}</td>
                                    <td>{{ $workingOrder->date->format('d.m.Y.') }}</td>
                                    <td>{{ $workingOrder->host }}</td>
                                    <td>{{ $workingOrder->client }}</td>
                                    <td>{{ $workingOrder->vehicle_model }}</td>
                                    <td>{{ $workingOrder->vehicle_km }}</td>
                                    <td>{{ $workingOrder->vehicle_reg_plate }}</td>
                                    <td>{{ $workingOrder->user->name }}</td>
                                    <td>{{ number_format($workingOrder->items()->sum('total'), 2, ',', '.') }} €</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('workingOrder.show', $workingOrder) }}" title="Pregled" class="btn btn-outline-success"><i class="bi bi-box-arrow-in-right"></i></a>
                                            <a href="{{ route('pdf.show', [$workingOrder, 1]) }}" title="PDF A5" class="btn btn-outline-primary"><i class="bi bi-printer"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Statistika
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <i class="bi bi-wallet"></i> <strong>Ukupan iznos R.N.:</strong>
                        <br>
                        {{number_format($itemsSum, 2, ',', '.') }} €
                        <br>
                        <i class="bi bi-bar-chart"></i> <strong>Ukupan broj R.N.:</strong>
                        <br>
                        {{ $workingOrders->count() }}
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection