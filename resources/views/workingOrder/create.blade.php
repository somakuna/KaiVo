@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h5 bg-primary bg-gradient text-white">Novi radni nalog</div>
                <div class="card-body">
                    <workingorder-component
                        {{-- create-url="{{route('workingOrder.store')}}" --}}
                        
                        :next-working-order="{{ $nextWorkingOrder }}"
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