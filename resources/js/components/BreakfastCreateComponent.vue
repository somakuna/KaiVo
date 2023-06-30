<template>
    <form method="POST" :action="route('breakfast.store')" enctype="multipart/form-data" autocomplete="on">
        <input type="hidden" name="_token" :value="csrf" />
        <!-- @csrf -->
        
        <div class="row g-3">
            <div class="col-md-2">
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
            <div class="col-md-4">
                <label class="form-label text-md-center">First Date:</label>
                <VueDatePicker 
                    id="first_date" 
                    name="first_date" 
                    v-model="form.first_date" 
                    :enable-time-picker="false"
                    :format="'dd.MM.yyyy.'" 
                    locale="hr" 
                    auto-apply
                    utc
                    required
                />
            </div>
            <div class="col-md-4">
                <label class="form-label text-md-center">Last Date:</label>
                <VueDatePicker 
                    id="last_date" 
                    name="last_date" 
                    v-model="form.last_date" 
                    :enable-time-picker="false"
                    :format="'dd.MM.yyyy.'" 
                    locale="hr" 
                    :min-date="new Date(form.first_date)"
                    auto-apply
                    utc
                    required
                />
            </div>
            <div class="col-md-2">
                <label class="form-label text-md-center">Calculated Days:</label>
                <input
                    id="days" 
                    name="days" 
                    :value="dateDiff"
                    type="text"
                    class="form-control"
                    readonly
                />
            </div>
            <!-- <div class="col-md-6">
                <label class="form-label text-md-center">Date:</label>
                <input
                    id="date"
                    name="date"
                    v-model="form.date"
                    type="date"
                    class="form-control bg-white"
                    required
                />
            </div> -->

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
            <div class="col-md-6">
                <label class="form-label text-md-end">Breakfast service:</label>
                <select
                    class="form-select bg-white w-100"
                    id="breakfast_service_id"
                    name="breakfast_service_id"
                    v-model="form.breakfast_service_id"
                    required
                >
                    <option value="" selected disabled>-- Choose an option --</option>
                        <option
                            v-for="breakfastService in breakfastServices"
                            :key="breakfastService.id"
                            :value="breakfastService.id"
                            v-text="breakfastService.name"
                        ></option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label text-md-end mb-2">Location:</label>
                <select
                    class="form-select bg-white w-100"
                    id="breakfast_location_id"
                    name="breakfast_location_id"
                    v-model="form.breakfast_location_id"
                    required
                >
                    <option value="" selected disabled>-- Choose an option --</option>
                        <option
                            v-for="breakfastLocation in breakfastLocations"
                            :key="breakfastLocation.id"
                            :value="breakfastLocation.id"
                            v-text="breakfastLocation.name"
                        ></option>
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label text-md-end">No. of Adults:</label>
                <input
                    id="people_amount"
                    name="people_amount"
                    min="0"
                    v-model.number="form.people_amount"
                    type="number"
                    class="form-control bg-white"
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
            <div class="col-md-3">
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
                    min="0"
                    required
                />
            </div>
            <div class="col-md-3">
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
                <a href="{{ route('home') }}" class="btn  btn-outline-danger">
                    <i class="bi-arrow-left-square"></i> Discard</a>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn  btn-outline-primary">
                    <i class="bi bi-save"></i> Save
                </button>
            </div>
        </div>  
    </form>
</template>

<script>
import moment from 'moment';
export default {
    props: {
        nextBreakfast: Number,
        breakfastServices: Array,
        breakfastLocations: Array,
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
            moment: moment, // This is the one line of code that you need
            csrf: null,
            form: {
                number: this.nextBreakfast,
                first_date: new Date(),
                last_date: null,
                guest_name: null,
                guest_address: null,
                guest_phone: null,
                breakfast_service_id: 1,
                breakfast_location_id: 1,
                people_amount: 1,
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
            let breakfast_service = this.breakfastServices.find((breakfast) => breakfast.id == this.form.breakfast_service_id),
                breakfasts = Number(this.form.people_amount * breakfast_service.price * this.dateDiff),
                total = breakfasts - (breakfasts * this.form.discount / 100)
                
            return Number(total).toFixed(2)
        },
        restPay() {
            let rest = this.totalPrice - this.form.paid_amount
            return Number(rest).toFixed(2)
        },
        dateDiff() {
            let a = moment(new Date(this.form.last_date));
            let b = moment(new Date(this.form.first_date));
            let diff =  Number(moment.duration(a.diff(b)).asDays()).toFixed(0);
            if(Number(diff) < 0) return 1
            return Number(diff) + 1

        }
    }
}
</script>
