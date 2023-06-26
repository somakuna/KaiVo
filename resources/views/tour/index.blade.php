@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header h5 bg-primary bg-gradient text-white"><strong>LIST ALL</strong> TOUR Vouchers</div>
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
                                <th data-sortable="true" data-field="date">Date</th>
                                <th data-field="guest_name">Guest Name</th>
                                <th data-field="tour">Tour</th>
                                <th data-sortable="true" data-field="total_price">Total Price</th>
                                <th data-field="paid_amount">Paid Amount</th>
                                <th data-sortable="true" data-field="rest_to_pay_amount">Rest to Pay</th>
                                <th data-field="action" style="width:8%;">Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($tours as $tour)
                                <tr>
                                    <td><a href="{{ route('tour.show', $tour) }}" title="Show">{{ $tour->number }}</a></td>
                                    <td>{{ $tour->date->format('d.m.Y. H:i') }}</td>
                                    <td>{{ $tour->guest_name }}</td>
                                    <td>{{ $tour->tourService->name }}</td>
                                    <td>{{ number_format($tour->total_price, 2, ',', '.') }}</td>
                                    <td>{{ number_format($tour->paid_amount, 2, ',', '.') }}</td>
                                    <td>{{ number_format($tour->rest_to_pay_amount, 2, ',', '.') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('tour.show', $tour) }}" title="Show" class="btn btn-outline-success"><i class="bi bi-box-arrow-in-right"></i></a>
                                            <a href="{{ route('pdf.tour', $tour) }}" title="PDF A5" class="btn btn-outline-primary"><i class="bi bi-printer"></i></a>
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