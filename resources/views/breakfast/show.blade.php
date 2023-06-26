@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 fs-5">
			<div class="card bg-white">
				<div class="card-header h5 bg-warning bg-gradient">
					<strong>SHOW</strong> BREAKFAST Voucher [#{{$breakfast->number}}]
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
									<strong>{{ $breakfast->guest_name}}</strong>
									<br>
									<label class="text-muted fs-6">Address:</label>
									<br>
									<strong>{{ $breakfast->guest_address}}</strong>
									<br>
									<label class="text-muted fs-6">Phone:</label>
									<br>
									{{ $breakfast->guest_phone}}
									<br>
									<label class="text-muted fs-6">Created by:</label>
									<br>
									<i>{{ $breakfast->user->name}}</i>
									<br>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card h-100 mb-2 rounded-3 shadow-sm">
								<div class="card-header py-2">
									<h4 class="my-0 fw-normal">Breakfast Voucher</h4>
								</div>
								<div class="card-body">
									<label class="text-muted fs-6">Breakfast Service:</label>
									<br>
									<strong>{{ $breakfast->breakfastService->name }}</strong>
									<br>
									<label class="text-muted fs-6">Location:</label>
									<br>
									{{ $breakfast->breakfastLocation->name }}
									<br>
									<label class="text-muted fs-6">Number of People:</label>
									<br>
									{{ $breakfast->people_amount}}
									<br>
									<label class="text-muted fs-6">First Date:</label>
									<br>
									{{ $breakfast->first_date->format('d.m.Y.') }}
									<br>
									<label class="text-muted fs-6">Last Date:</label>
									<br>
									{{ $breakfast->last_date->format('d.m.Y.') }}
									<br>
									<label class="text-muted fs-6">Days:</label>
									<br>
									{{ $breakfast->days }}
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card h-100 mb-2 rounded-3 shadow-sm">
								<div class="card-header py-2 ">
									<h4 class="my-0 fw-normal">Price</h4>
								</div>
								<div class="card-body">
									<label class="text-muted fs-6">Price for breakfast per day:</label>
									<br> 
									{{ $breakfast->breakfastService->price }}
									<br>
									<label class="text-muted fs-6">Discount:</label>
									<br>
									{{ $breakfast->discount}} % <br>
									<label class="text-muted fs-6">Total Price:</label>
									<br>
									{{ number_format($breakfast->total_price, 2, ',', '.') }} € <br>
									<label class="text-muted fs-6">Paid Amount:</label>
									<br>
									{{ number_format($breakfast->paid_amount, 2, ',', '.') }} € <br>
									<label class="text-muted fs-6">Rest to Pay:</label>
									<br>
									<strong class="text-primary">{{ number_format($breakfast->rest_to_pay_amount, 2, ',', '.') }} €</strong>
									<br>
								</div>
							</div>
						</div>
					</div>
          @if ($breakfast->note)
          <div class="row mt-3">
						<div class="col">
							<div class="card mb-2 rounded-3 shadow-sm">
								<div class="card-header py-2">
									<h4 class="my-0 fw-normal">Note</h4>
								</div>
								<div class="card-body">
									{{ $breakfast->note}}
								</div>
							</div>
						</div>
					</div>
          @endif
          <div class="row mt-3">
						<div class="col">
							<div class="card mb-2 rounded-3 shadow-sm fs-6">
								<div class="card-body text-muted">
									<strong>Voucher UUID:</strong> {{ $breakfast->uuid }} | <strong>Created at:</strong> {{ $breakfast->created_at->format('d.m.Y. H:i') }} | <strong class="@if ($breakfast->updated_at != $breakfast->created_at) text-forest @endif">Updated at:</strong> {{ $breakfast->updated_at->format('d.m.Y. H:i') }}
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
          <a href="{{ route('breakfast.destroy', $breakfast) }}" class="btn  btn-outline-danger" onclick="return confirm('Are you sure you want to delete TOUR Voucher number {{ $breakfast->number }}?\nThe action cannot be undone!')">
            <i class="bi bi-trash3"></i> Delete </a>
      </div>
      <div class="col-auto">
          <a href="{{ route('breakfast.edit', $breakfast) }}" class="btn  btn-outline-primary">
            <i class="bi bi-pen"></i> Edit </a>
      </div>
      <div class="col-auto">
        <a href="{{ route('pdf.breakfast', $breakfast) }}" class="btn  btn-outline-primary">
          <i class="bi bi-printer"></i> PDF A5</a>
      </div>
    </div>  
</div>
@endsection