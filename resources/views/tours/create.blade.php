@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-primary bg-gradient text-white"><strong>CREATE</strong> TOUR Voucher</div>
                <div class="card-body">
                    <tourcreate-component
                        :next-tour="{{ $nextTour }}"
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