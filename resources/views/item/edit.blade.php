@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Uredi stavku</strong></div>
                <div class="card-body">
                    <item-edit-component
                        :item-edit="{{ $item }}"
                        @if (old())
                            :old="{{ json_encode(old()) }}"
                        @endif
                    />
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection