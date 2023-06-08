@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Dodaj stavku</strong></div>
                <div class="card-body">
                    <item-component
                        :id-of-order="{{ $id_working_order }}"
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