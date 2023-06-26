@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-success bg-gradient text-white"><strong>EDIT</strong> BIKE voucher [#{{$bike->id}}]</div>
                <div class="card-body">
                    <bikeedit-component
                        :bike="{{ $bike }}"
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