<template>
    <form method="POST" :action="route('report.breakfasts')" enctype="multipart/form-data" autocomplete="on">
        <input type="hidden" name="_token" :value="csrf" />
        <!-- @csrf -->
        
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label text-md-center">First Date:</label>
                <VueDatePicker 
                    id="from_date" 
                    name="from_date" 
                    v-model="form.from_date" 
                    :enable-time-picker="false"
                    :format="'dd.MM.yyyy.'" 
                    locale="hr" 
                    auto-apply
                    utc
                    required
                />
            </div>
            <div class="col-md-3">
                <label class="form-label text-md-center">Last Date:</label>
                <VueDatePicker 
                    id="to_date" 
                    name="to_date" 
                    v-model="form.to_date" 
                    :enable-time-picker="false"
                    :format="'dd.MM.yyyy.'" 
                    locale="hr" 
                    :min-date="new Date(form.from_date)"
                    auto-apply
                    utc
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
        </div>
        <div class="row g-3 mt-1 justify-content-center">
            <div class="col-auto">
                <a href="{{ route('home') }}" class="btn  btn-outline-danger">
                    <i class="bi-arrow-left-square"></i> Discard</a>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn  btn-outline-primary">
                    <i class="bi bi-journals"></i> Create Report
                </button>
            </div>
        </div>  
    </form>
</template>

<script>
export default {
    props: {
        breakfastServices: Array,
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
                from_date: null,
                to_date: null,
                breakfast_service_id: 1,
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
}
</script>
