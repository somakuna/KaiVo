@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 fs-5">
			<div class="card bg-white">
				<div class="card-header h5 bg-primary bg-gradient text-white">
					<strong>SHOW</strong> TOUR Voucher [#{{$tour->number}}]
				</div>
				<div class="card-body">
					<div class="row row-cols-1 row-cols-md-3 g-3">
						<div class="col">
							<div class="card h-100 mb-2 rounded-3 shadow-sm">
								<div class="card-header py-2">
									<h4 class="my-0 fw-normal">Guest</h4>
								</div>
								<div class="card-body">
									<label class="text-muted fs-6">Name:</label>
									<br>
									<strong>{{ $tour->guest_name}}</strong>
									<br>
									<label class="text-muted fs-6">Address:</label>
									<br>
									<strong>{{ $tour->guest_address}}</strong>
									<br>
									<label class="text-muted fs-6">Phone:</label>
									<br>
									{{ $tour->guest_phone}}
									<br>
									<label class="text-muted fs-6">Date:</label>
									<br>
									{{ $tour->date->format('d.m.Y. H:i') }}
									<br>
									<label class="text-muted fs-6">Created by:</label>
									<br>
									<i>{{ $tour->user->name}}</i>
									<br>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card h-100 mb-2 rounded-3 shadow-sm">
								<div class="card-header py-2">
									<h4 class="my-0 fw-normal">Tour Voucher</h4>
								</div>
								<div class="card-body">
									<label class="text-muted fs-6">Tour:</label>
									<br>
									<strong>{{ $tour->tourService->name }}</strong>
									<br>
									<label class="text-muted fs-6">Pick-up Point:</label>
									<br>
									{{ $tour->tourPickupPoint->name }}
									<br>
									<label class="text-muted fs-6">Number of Adults:</label>
									<br>
									{{ $tour->adults_amount}}
									<br>
									<label class="text-muted fs-6">Number of Children:</label>
									<br>
									{{ $tour->children_amount}}
									<br>
									<label class="text-muted fs-6">Number of Infants:</label>
									<br>
									{{ $tour->infants_amount}}
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
									<label class="text-muted fs-6">Prices:</label>
									<br> A: {{ $tour->tourService->adults_price }} - C: {{ $tour->tourService->children_price}} - I: {{ $tour->tourService->infants_price}}
									<br>
									<label class="text-muted fs-6">Discount:</label>
									<br>
									{{ $tour->discount}} % <br>
									<label class="text-muted fs-6">Total Price:</label>
									<br>
									{{ number_format($tour->total_price, 2, ',', '.') }} € <br>
									<label class="text-muted fs-6">Paid Amount:</label>
									<br>
									{{ number_format($tour->paid_amount, 2, ',', '.') }} € <br>
									<label class="text-muted fs-6">Rest to Pay:</label>
									<br>
									<strong class="text-primary">{{ number_format($tour->rest_to_pay_amount, 2, ',', '.') }} €</strong>
									<br>
								</div>
							</div>
						</div>
					</div>
          @if ($tour->note)
          <div class="row mt-3">
						<div class="col">
							<div class="card mb-2 rounded-3 shadow-sm">
								<div class="card-header py-2">
									<h4 class="my-0 fw-normal">Note</h4>
								</div>
								<div class="card-body">
									{{ $tour->note}}
								</div>
							</div>
						</div>
					</div>
          @endif
          <div class="row mt-3">
						<div class="col">
							<div class="card mb-2 rounded-3 shadow-sm fs-6">
								<div class="card-body text-muted">
									<strong>Voucher UUID:</strong> {{ $tour->uuid }} | <strong>Created at:</strong> {{ $tour->created_at->format('d.m.Y. H:i') }} | <strong class="@if ($tour->updated_at != $tour->created_at) text-forest @endif">Updated at:</strong> {{ $tour->updated_at->format('d.m.Y. H:i') }}
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
          <a href="{{ route('tour.destroy', $tour) }}" class="btn  btn-outline-danger" onclick="return confirm('Are you sure you want to delete TOUR Voucher number {{ $tour->number }}?\nThe action cannot be undone!')">
            <i class="bi bi-trash3"></i> Delete </a>
      </div>
      <div class="col-auto">
          <a href="{{ route('tour.edit', $tour) }}" class="btn  btn-outline-primary">
            <i class="bi bi-pen"></i> Edit </a>
      </div>
      <div class="col-auto">
        <a href="{{ route('pdf.tour', [$tour]) }}" class="btn  btn-outline-primary">
          <i class="bi bi-printer"></i> PDF A5</a>
      </div>
    </div>  
</div>
@endsection