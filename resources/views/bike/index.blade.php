@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header h5 bg-success bg-gradient text-white"><strong>LIST ALL</strong> BIKE Vouchers</div>
                <div class="card-body">
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
                                <th data-sortable="true" data-field="number">Number</th>
                                <th data-field="guest_name">Guest Name</th>
                                <th data-sortable="true" data-field="pickup_datetime">Pick-up Date</th>
                                <th data-sortable="true" data-field="return_datetime">Return Date</th>
                                <th data-field="bikeService">Service</th>
                                <th data-field="bikes_amount">No. of Bikes</th>
                                <th data-sortable="true" data-field="total_price">Total Price</th>
                                <th data-field="paid_amount">Paid Amount</th>
                                <th data-sortable="true" data-field="rest_to_pay_amount">Rest to Pay</th>
                                <th data-field="action" style="width:8%;">Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($bikes as $bike)
                                <tr>
                                    <td><a href="{{ route('bike.show', $bike) }}" title="Show">{{ $bike->number }}</a></td>
                                    <td>{{ $bike->guest_name }}</td>
                                    <td>{{ $bike->pickup_datetime->format('d.m.Y. H:i') }}</td>
                                    <td>{{ $bike->return_datetime->format('d.m.Y. H:i') }}</td>
                                    <td>{{ $bike->bikeService->name }}</td>
                                    <td>{{ $bike->bikes_amount }}</td>
                                    <td>{{ number_format($bike->total_price, 2, ',', '.') }}</td>
                                    <td>{{ number_format($bike->paid_amount, 2, ',', '.') }}</td>
                                    <td>{{ number_format($bike->rest_to_pay_amount, 2, ',', '.') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('bike.show', $bike) }}" title="Show" class="btn btn-outline-success"><i class="bi bi-box-arrow-in-right"></i></a>
                                            <a href="{{ route('pdf.bike', $bike) }}" title="PDF A5" class="btn btn-outline-primary"><i class="bi bi-printer"></i></a>
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
    </div>
</div>
@endsection