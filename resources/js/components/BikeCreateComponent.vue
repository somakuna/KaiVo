<template>
    <form method="POST" :action="route('bikes.store')" enctype="multipart/form-data" autocomplete="on">
        <input type="hidden" name="_token" :value="csrf" />
        <!-- @csrf -->
        
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="number">Number:</label>
                <input
                    id="number"
                    name="number"
                    v-model.number="form.number"
                    type="number"
                    class="form-control bg-white fw-bold"
                    required
                />
            </div>
            <div class="col-md-6">
                <label class="form-label text-md-center">Pick-up Date:</label>
                <VueDatePicker 
                    id="pickup_datetime" 
                    name="pickup_datetime" 
                    v-model="form.pickup_datetime" 
                    :format="'dd.MM.yyyy. HH:mm'" 
                    locale="hr" 
                    auto-apply
                    required
                />
            </div>
            <div class="col-md-4">
                <label class="form-label text-md-center">Guest Name:</label>
                <input
                    id="guest_name"
                    name="guest_name"
                    v-model="form.guest_name"
                    type="text"
                    class="form-control bg-white"
                    required
                />
            </div>
            <div class="col-md-4">
                <label class="form-label text-md-center">Guest Address:</label>
                <input
                    id="guest_address"
                    name="guest_address"
                    v-model="form.guest_address"
                    type="text"
                    class="form-control bg-white"
                    required
                />
            </div>
            <div class="col-md-4">
                <label class="form-label text-md-center">Guest Phone:</label>
                <input
                    id="guest_phone"
                    name="guest_phone"
                    v-model="form.guest_phone"
                    type="text"
                    class="form-control bg-white"
                    required
                />
            </div>
            <div class="col-md-4">
                <label class="form-label text-md-end">Bike service:</label>
                <select
                    class="form-select bg-white w-100"
                    id="bike_service_id"
                    name="bike_service_id"
                    v-model="form.bike_service_id"
                    required
                >
                    <option value="" selected disabled>-- Choose an option --</option>
                        <option
                            v-for="bikeService in bikeServices"
                            :key="bikeService.id"
                            :value="bikeService.id"
                            v-text="bikeService.name"
                        ></option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label text-md-end">No. of Bikes:</label>
                <input
                    id="bikes_amount"
                    name="bikes_amount"
                    min="0"
                    v-model.number="form.bikes_amount"
                    type="number"
                    class="form-control bg-white"
                    required
                />
            </div>
            <div class="col-md-4">
                <label class="form-label text-md-end">Finish time:</label>
                <input
                    :value="finishTime"
                    type="text"
                    class="form-control"
                    disabled
                />
            </div>
            <div class="col-md-2">
                <label class="form-label text-md-end">Delivery:</label>
                <input
                    id="delivery"
                    name="delivery"
                    v-model.number="form.delivery"
                    type="number"
                    class="form-control bg-white"
                    step="0.01"
                    required
                />
            </div>
            <div class="col-md-2">
                <label class="form-label text-md-end">Baby Seat:</label>
                <input
                    id="baby_seat"
                    name="baby_seat"
                    v-model.number="form.baby_seat"
                    type="number"
                    class="form-control bg-white"
                    step="0.01"
                    required
                />
            </div>
            <div class="col-md-2">
                <label class="form-label text-md-end">Discount %:</label>
                <input
                    id="discount"
                    name="discount"
                    placeholder="0-99"
                    type="number"
                    min="0"
                    max="99"
                    v-model.number="form.discount"
                    class="form-control bg-white"
                />
            </div>
            <div class="col-md-2">
                <label class="form-label text-md-end">Total price:</label>
                <input
                    id="total_price"
                    name="total_price"
                    :value="totalPrice"
                    type="number"
                    class="form-control fw-bold"
                    tabindex="-1"
                    required
                    readonly
                />
            </div>
            <div class="col-md-2">
                <label class="form-label text-md-end">Paid amount:</label>
                <input
                    id="paid_amount"
                    name="paid_amount"
                    v-model.number="form.paid_amount"
                    type="number"
                    class="form-control bg-white"
                    step="0.01"
                    required
                />
            </div>
            <div class="col-md-2">
                <label class="form-label text-md-end">Rest to pay:</label>
                <input
                    id="rest_to_pay_amount"
                    name="rest_to_pay_amount"
                    :value="restPay"
                    type="number"
                    class="form-control text-primary fw-bold"
                    required
                    readonly
                />
            </div>
            <div class="col-md-12">
                <textarea
                    class="form-control bg-white"
                    name="note"
                    v-model="form.note"
                    placeholder="Note"
                ></textarea>
            </div>
        </div>
        <div class="row g-3 mt-1 justify-content-center">
            <div class="col-auto">
                <a href="{{ route('/') }}" class="btn btn-lg btn-outline-danger">
                    <i class="bi-arrow-left-square"></i> Discard</a>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-lg btn-outline-primary">
                    <i class="bi bi-save"></i> Save
                </button>
            </div>
        </div>  
    </form>
</template>

<script>
export default {
    props: {
        nextBike: Number,
        bikeServices: Array,
        old: {
            default: {},
            required: false,
        },
        edit: {
            default: false,
        },
    },
    data() {
        return {
            csrf: null,
            form: {
                number: this.nextBike,
                guest_name: null,
                guest_address: null,
                guest_phone: null,
                bike_service_id: 1,
                bikes_amount: 0,
                pickup_datetime: new Date(),
                delivery: 0,
                baby_seat: 0,
                discount: 0,
                total_price: 0,
                paid_amount: 0,
                rest_to_pay_amount: null,
                note: null,
            },
        }
    },
    created() {
        this.csrf = document.querySelector('meta[name="csrf-token"]').content;

        if (!_.isEmpty(this.old)) {
            this.form = {
                ...this.form,
                ...this.old,
            };
        }
    },
    computed: {
        totalPrice() {
            let bike_service = this.bikeServices.find((bike) => bike.id === this.form.bike_service_id),
                bikes = Number(this.form.bikes_amount * bike_service.bike_price + this.form.delivery + this.form.baby_seat),
                total = bikes - (bikes * this.form.discount / 100)
            return Number(total).toFixed(2)
        },
        finishTime() {
            let bike_service = this.bikeServices.find((bike) => bike.id === this.form.bike_service_id)
            return bike_service.finish_time
        },
        restPay() {
            let rest = this.totalPrice - this.form.paid_amount
            return Number(rest).toFixed(2)
        },
    }
}
</script>
