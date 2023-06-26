@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-warning bg-gradient"><strong>EDIT</strong> BREAKFAST voucher [#{{$breakfast->id}}]</div>
                <div class="card-body">
                    <breakfastedit-component
                        :breakfast="{{ $breakfast }}"
                        :breakfast-services="{{ $breakfastServices }}"
                        :breakfast-locations="{{ $breakfastLocations }}"
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