@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mb-5">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Today <i class="bi bi-arrow-down"></i></th>
                    <th scope="col">Tour Vouchers</th>
                    <th scope="col">Bike Vouchers</th>
                    <th scope="col">Breakfast Vouchers</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Generated</th>
                    <td>{{$toursToday->count()}}</td>
                    <td>{{$bikesToday->count()}}</td>
                    <td>{{$breakfastsToday->count()}}</td>
                </tr>
                <tr>
                    <th scope="row">Total Price SUM</th>
                    <td>{{$toursToday->sum('total_price')}} €</td>
                    <td>{{$bikesToday->sum('total_price')}} €</td>
                    <td>{{$breakfastsToday->sum('total_price')}} €</td>
                </tr>
                <tr>
                    <th scope="row">Paid Amount SUM</th>
                    <td>{{$toursToday->sum('paid_amount')}} €</td>
                    <td>{{$bikesToday->sum('paid_amount')}} €</td>
                    <td>{{$breakfastsToday->sum('paid_amount')}} €</td>
                </tr>
                <tr>
                    <th scope="row">Rest to Pay SUM</th>
                    <td>{{$toursToday->sum('rest_to_pay_amount')}} €</td>
                    <td>{{$bikesToday->sum('rest_to_pay_amount')}} €</td>
                    <td>{{$breakfastsToday->sum('rest_to_pay_amount')}} €</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <chartprices-component
                :months="{{ $months }}"
                :tour-prices="{{ $tourPrices }}"
                :bike-prices="{{ $bikePrices }}"
                :breakfast-prices="{{ $breakfastPrices }}"
            />
        </div>
        <div class="col-md-6">
            <chartcount-component
                :months="{{ $months }}"
                :tour-counts="{{ $tourCounts }}"
                :bike-counts="{{ $bikeCounts }}"
                :breakfast-counts="{{ $breakfastCounts }}"
            />
        </div>
    </div>
</div>
@endsection
