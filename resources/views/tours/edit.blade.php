@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-primary bg-gradient text-white"><strong>EDIT</strong> TOUR voucher [#{{$tour->id}}]</div>
                <div class="card-body">
                    <touredit-component
                        :tour="{{ $tour }}"
                        :tour-services="{{ $tourServices }}"
                        :pickup-points="{{ $tourPickupPoints }}"
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