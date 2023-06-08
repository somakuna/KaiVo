<template>
    <form method="POST" :action="route('workingOrder.store')" enctype="multipart/form-data" autocomplete="on">
        <input type="hidden" name="_token" :value="csrf" />
        <!-- @csrf -->
        <div class="row mb-3">
            <label class="col-md-1 col-form-label text-md-end">Broj naloga:</label>
            <div class="col">
                <input
                    id="number"
                    name="number"
                    v-model.number="form.number"
                    type="text"
                    class="form-control fw-bold"
                    required
                />
            </div>
            <label class="col-md-1 col-form-label text-md-center">Tvrtka:</label>
            <div class="col">
                <input
                    id="host"
                    name="host"
                    v-model="form.host"
                    type="text"
                    class="form-control"
                    required
                />
            </div>
            <label class="col-md-1 col-form-label text-md-center">Naručitelj:</label>
            <div class="col">
                <input
                    id="client"
                    name="client"
                    v-model="form.client"
                    type="text"
                    class="form-control"
                    required
                />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-1 col-form-label text-md-end">Vozilo:</label>
            <div class="col">
                <input
                    id="vehicle_model"
                    name="vehicle_model"
                    v-model="form.vehicle_model"
                    type="text"
                    class="form-control"
                />
            </div>
            <label class="col-md-1 col-form-label text-md-center">Kilometri:</label>
            <div class="col">
                <input
                    id="vehicle_km"
                    name="vehicle_km"
                    v-model="form.vehicle_km"
                    type="text"
                    class="form-control"
                />
            </div>
            <label class="col-md-1 col-form-label text-md-center">Registracija:</label>
            <div class="col">
                <input
                    id="vehicle_reg_plate"
                    name="vehicle_reg_plate"
                    v-model="form.vehicle_reg_plate"
                    type="text"
                    class="form-control"
                />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-1 col-form-label text-md-end">Napomena:</label>
            <div class="col-md-7">
                <input
                    id="footnote"
                    name="footnote"
                    v-model="form.footnote"
                    type="text"
                    class="form-control"
                />
            </div>
            <label class="col-md-1 col-form-label text-md-center">Datum:</label>
            <div class="col">
                <input
                    id="date"
                    name="date"
                    v-model="form.date"
                    type="date"
                    class="form-control"
                    required
                />
            </div>
        </div>
        <hr>
        <div
            v-if="form.items.length > 0"
            v-for="(item, index) in form.items"
            :key="`items-${index}`"
            :id="`items[${index}]`"
            class="items"
        >
            <div class="row mb-3">
                <div class="col-md-6 mb-2">
                    <div class="form-floating">
                        <input
                            :id="`items[${index}][description]`"
                            :name="`items[${index}][description]`"
                            v-model="item.description"
                            type="text"
                            class="form-control"
                            required
                        />
                        <label for="items[${index}][description]">Opis stavke</label>
                    </div>
                </div>
                <div class="col-md-2 mb-2">
                    <div class="form-floating">
                        <input
                            :id="`items[${index}][amount]`"
                            :name="`items[${index}][amount]`"
                            v-model.number="item.amount"
                            type="number"
                            step="0.01"
                            class="form-control"
                            required
                        />
                        <label for="items[${index}][amount]">Količina</label>
                    </div>
                </div>
                <div class="col-md-2 mb-2">
                    <div class="form-floating">
                        <input
                            :id="`items[${index}][price]`"
                            :name="`items[${index}][price]`"
                            v-model.number="item.price"
                            type="number"
                            step="0.01"
                            class="form-control"
                            required
                        />
                        <label for="items[${index}][price]">Poj. cijena</label>
                    </div>
                </div>
                <div class="col-md-2 mb-2">
                    <div class="form-floating">
                        <input
                            :id="`items[${index}][total]`"
                            :name="`items[${index}][total]`"
                            :value="item.amount * item.price"
                            v-model.number="item.total"
                            type="number"
                            class="form-control"
                            tabindex="-1"
                            required
                            readonly
                        />
                        <label for="items[${index}][total]">Ukupno</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto m-3">
                <div class="btn-group btn-group" role="group">
                    <a @click="additem" id="add-item" class="btn btn-outline-success" title="Dodaj stavku"><i class="bi bi-plus-circle"></i> STAVKA</a>
                    <a @click="removeitem" id="remove-remove" class="btn btn-outline-danger" title="Ukloni zadnju stavku"><i class="bi bi-dash-circle"></i> STAVKA</a>
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="bi bi-save"></i> SPREMI
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    props: {
        nextWorkingOrder: Number,
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
                items: [
                    {
                        description: null,
                        amount: null,
                        price: null,
                        total: null,
                    }
                ],
                number: this.nextWorkingOrder,
                host: null,
                client: null,
                vehicle_model: null,
                vehicle_km: null,
                vehicle_reg_plate: null,
                date: new Date().toISOString().slice(0,10),
                footnote: null,
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
    methods: {
        additem() {
            this.form.items.push({
                description: null,
                amount: null,
                price: null,
                total: null,
            });
        },
        removeitem() {
            this.form.items.pop()
        },
    },
}
</script>
