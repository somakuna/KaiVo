@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h5 bg-primary bg-gradient text-white">Radni nalog br. {{$workingOrder->number}}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if($workingOrder->footnote)
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong><i class="bi bi-exclamation-triangle"></i> Napomena:</strong> {{ $workingOrder->footnote }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-bordered text-center align-middle" style="white-space:nowrap">
                            <thead class="table-dark">
                                <th>Broj naloga</th>
                                <th>Tvrtka</th>
                                <th>Naručitelj</th>
                                <th>Vozilo</th>
                                <th>KM</th>
                                <th>Registracija</th>
                                <th>Datum</th>
                                <th>Kreator</th>
                                <th style="width:8%;">Akcija</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>{{ $workingOrder->number }}</strong></td>
                                    <td><strong>{{ $workingOrder->host }}</strong></td>
                                    <td><strong>{{ $workingOrder->client }}</strong></td>
                                    <td><strong>{{ $workingOrder->vehicle_model }}</strong></td>
                                    <td><strong>{{ $workingOrder->vehicle_km }}</strong></td>
                                    <td><strong>{{ $workingOrder->vehicle_reg_plate }}</strong></td>
                                    <td>{{ $workingOrder->date->format('d.m.Y.') }}</td>
                                    <td>{{ $workingOrder->user->name }}</td>
                                    <td>
                                        <a href="{{ route('workingOrder.edit', $workingOrder) }}" title="Uredi" class="btn btn-sm btn-outline-primary"><i class="bi bi-pen"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered text-center align-middle" style="white-space:nowrap">
                            <thead class="table-primary">
                                <th>Opis</th>
                                <th class="text-right">Količina</th>
                                <th class="text-right">Cijena</th>
                                <th class="text-right">Ukupno</th>
                                <th style="width:8%;">Akcije</th>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ number_format($item->price, 2, ',', '.') }} € </td>
                                    <td>{{ number_format($item->total, 2, ',', '.') }} € </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('item.edit', $item) }}" title="Uredi" class="btn btn-outline-primary"><i class="bi bi-pen"></i></a>
                                            <a href="{{ route('item.destroy', $item) }}" title="Obriši" class="btn btn-outline-danger"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <tr class="table-secondary">
                                    <td><strong>Ukupno:</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>{{ number_format($items->sum('total'), 2, ',', '.') }} €</strong></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto my-3">
            <a 
                href="{{ route('item.create', $workingOrder->id) }}"
                class="btn btn-lg btn-outline-success"
            >
                <i class="bi bi-plus-circle"></i> STAVKA
            </a>
        </div>
        <div class="col-auto my-3">
                <a 
                    href="{{ route('workingOrder.destroy', $workingOrder) }}"
                    class="btn btn-lg btn-outline-danger"
                    onclick="return confirm('Jeste li sigurni da želite obrisati radni nalog broj {{ $workingOrder->number }}?\nRadnja je nepovratna!')"
                >
                    <i class="bi bi-trash3"></i> OBRIŠI R.N.
                </a>
        </div>
        <div class="col-auto my-3">
            <div class="btn-group btn-group-lg" role="group">
                <a 
                    href="{{ route('pdf.show', [$workingOrder, 1]) }}"
                    class="btn btn-outline-primary"
                >
                    <i class="bi bi-printer"></i> PDF A5
                </a>
                <a 
                    href="{{ route('pdf.show', [$workingOrder, 0]) }}"
                    class="btn btn-outline-primary"
                >
                    <i class="bi bi-printer"></i> PDF A4
                </a>
            </div>
        </div>
    </div>
</div>
@endsection