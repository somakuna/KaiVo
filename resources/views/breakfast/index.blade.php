@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header h5 bg-warning bg-gradient"><strong>LIST ALL</strong> BREAKFAST Vouchers</div>
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
                                <th data-field="breakfast_service_id">Breakfast Service</th>
                                <th data-field="breakfast_location_id">Breakfast Location</th>
                                <th data-sortable="true" data-field="first_date">First Date</th>
                                <th data-sortable="true" data-field="last_date">Last Date</th>
                                <th data-field="people_amount">No. of People</th>
                                <th data-sortable="true" data-field="total_price">Total Price</th>
                                <th data-field="paid_amount">Paid Amount</th>
                                <th data-sortable="true" data-field="rest_to_pay_amount">Rest to Pay</th>
                                <th data-field="action" style="width:8%;">Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($breakfasts as $breakfast)
                                <tr>
                                    <td><a href="{{ route('breakfast.show', $breakfast) }}" title="Show">{{ $breakfast->number }}</a></td>
                                    <td>{{ $breakfast->guest_name }}</td>
                                    <td>{{ $breakfast->breakfastService->name }}</td>
                                    <td>{{ $breakfast->breakfastLocation->name }}</td>
                                    <td>{{ $breakfast->first_date->format('d.m.Y.') }}</td>
                                    <td>{{ $breakfast->last_date->format('d.m.Y.') }}</td>
                                    <td>{{ $breakfast->people_amount }}</td>
                                    <td>{{ number_format($breakfast->total_price, 2, ',', '.') }}</td>
                                    <td>{{ number_format($breakfast->paid_amount, 2, ',', '.') }}</td>
                                    <td>{{ number_format($breakfast->rest_to_pay_amount, 2, ',', '.') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('breakfast.show', $breakfast) }}" title="Show" class="btn btn-outline-success"><i class="bi bi-box-arrow-in-right"></i></a>
                                            <a href="{{ route('pdf.breakfast', $breakfast) }}" title="PDF A5" class="btn btn-outline-primary"><i class="bi bi-printer"></i></a>
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