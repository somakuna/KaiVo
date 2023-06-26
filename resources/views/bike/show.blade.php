@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 fs-5">
			<div class="card bg-white">
				<div class="card-header h5 bg-success bg-gradient text-white">
					<strong>SHOW</strong> BIKE Voucher [#{{$bike->number}}]
				</div>
				<div class="card-body">
					<div class="row row-cols-1 row-cols-md-3">
						<div class="col">
							<div class="card h-100 mb-2 rounded-3 shadow-sm">
								<div class="card-header py-2">
									<h4 class="my-0 fw-normal">Guest</h4>
								</div>
								<div class="card-body">
									<label class="text-muted fs-6">Name:</label>
									<br>
									<strong>{{ $bike->guest_name}}</strong>
									<br>
									<label class="text-muted fs-6">Address:</label>
									<br>
									<strong>{{ $bike->guest_address}}</strong>
									<br>
									<label class="text-muted fs-6">Phone:</label>
									<br>
									{{ $bike->guest_phone}}
									<br>
									<label class="text-muted fs-6">Created by:</label>
									<br>
									<i>{{ $bike->user->name}}</i>
									<br>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card h-100 mb-2 rounded-3 shadow-sm">
								<div class="card-header py-2">
									<h4 class="my-0 fw-normal">Bike Voucher</h4>
								</div>
								<div class="card-body">
									<label class="text-muted fs-6">Bike service:</label>
									<br>
									<strong>{{ $bike->bikeService->name }}</strong> <small>({{ $bike->bikeService->bike_price }}€)</small>
									<br>
									<label class="text-muted fs-6">Number of Bikes:</label>
									<br>
									{{ $bike->bikes_amount}}
									<br>
									<label class="text-muted fs-6">Pick-up date/time:</label>
									<br>
									{{ $bike->pickup_datetime->format('d.m.Y. H:i')}}
									<br>
									<label class="text-muted fs-6">Return date/time:</label>
									<br>
									{{ $bike->return_datetime->format('d.m.Y. H:i')}}
									<br>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card h-100 mb-2 rounded-3 shadow-sm">
								<div class="card-header py-2 ">
									<h4 class="my-0 fw-normal">Price</h4>
								</div>
								<div class="card-body">
									@if( $bike->delivery)
									<label class="text-muted fs-6">Delivery:</label>
									<br>
									{{ $bike->delivery }} €
									<br>
									@endif
									@if( $bike->baby_seat)
									<label class="text-muted fs-6">Baby Seat:</label>
									<br>
									 {{ $bike->baby_seat }} €
									<br>
									@endif
									<label class="text-muted fs-6">Discount:</label>
									<br>
									{{ $bike->discount}} % <br>
									<label class="text-muted fs-6">Total Price:</label>
									<br>
									{{ number_format($bike->total_price, 2, ',', '.') }} € <br>
									<label class="text-muted fs-6">Paid Amount:</label>
									<br>
									{{ number_format($bike->paid_amount, 2, ',', '.') }} € <br>
									<label class="text-muted fs-6">Rest to Pay:</label>
									<br>
									<strong class="text-primary">{{ number_format($bike->rest_to_pay_amount, 2, ',', '.') }} €</strong>
									<br>
								</div>
							</div>
						</div>
					</div>
          @if ($bike->note)
          <div class="row mt-3">
						<div class="col">
							<div class="card mb-2 rounded-3 shadow-sm">
								<div class="card-header py-2">
									<h4 class="my-0 fw-normal">Note</h4>
								</div>
								<div class="card-body">
									{{ $bike->note}}
								</div>
							</div>
						</div>
					</div>
          @endif
          <div class="row mt-3">
						<div class="col">
							<div class="card mb-2 rounded-3 shadow-sm fs-6">
								<div class="card-body text-muted">
									<strong>Voucher UUID:</strong> {{ $bike->uuid }} | <strong>Created at:</strong> {{ $bike->created_at->format('d.m.Y. H:i') }} | <strong class="@if ($bike->updated_at != $bike->created_at) text-forest @endif">Updated at:</strong> {{ $bike->updated_at->format('d.m.Y. H:i') }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  </div>  
    <div class="row g-3 mt-1 justify-content-center">
      <div class="col-auto">
          <a href="{{ route('bike.destroy', $bike) }}" class="btn  btn-outline-danger" onclick="return confirm('Are you sure you want to delete bike Voucher number {{ $bike->number }}?\nThe action cannot be undone!')">
            <i class="bi bi-trash3"></i> Delete </a>
      </div>
      <div class="col-auto">
          <a href="{{ route('bike.edit', $bike) }}" class="btn  btn-outline-primary">
            <i class="bi bi-pen"></i> Edit </a>
      </div>
      <div class="col-auto">
        <a href="{{ route('pdf.bike', $bike) }}" class="btn  btn-outline-primary">
          <i class="bi bi-printer"></i> PDF A5</a>
      </div>
    </div>  
</div>
@endsection