@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-warning bg-gradient"><strong>REPORT</strong> BREAKFAST Services</div>
                <div class="card-body">
                    <breakfastreport-component
                        :breakfast-services="{{ $breakfastServices }}"
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