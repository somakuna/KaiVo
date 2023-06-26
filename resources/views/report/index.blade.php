@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-primary bg-gradient text-white"><strong>REPORT</strong> Vouchers</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto mb-2"> 
                            <a href="{{ route('report.create', 'tours')}}" class="btn  btn-outline-primary"><i class="bi-car-front"></i> Tour Vouchers</a>
                        </div>
                        <div class="col-auto mb-2"> 
                            <a href="{{ route('report.create', 'bikes')}}" class="btn  btn-outline-primary"><i class="bi-bicycle"></i> Bike Vouchers</a>
                        </div>
                        <div class="col-auto mb-2"> 
                            <a href="{{ route('report.create', 'breakfasts')}}" class="btn  btn-outline-primary"><i class="bi-egg-fried"></i> Breakfast Vouchers</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection