@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-success bg-gradient text-white"><strong>CREATE</strong> BIKE Voucher</div>
                <div class="card-body">
                    <bikecreate-component
                        next-bike="{{ $nextBike }}"
                        :bike-services="{{ $bikeServices }}"
                        @if (old())
                            :old="{{ json_encode(old()) }}"
                        @endif
                    />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection