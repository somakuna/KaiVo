<template>
    <form 
        method="POST"
        :action="route('item.update', tour)"
        enctype="multipart/form-data"
        autocomplete="on"
    >
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" :value="csrf" />

        <div class="row mb-3">
            <div class="col-md-6 mb-2">
                <div class="form-floating">
                    <input
                        id="description"
                        name="description"
                        v-model="description"
                        type="text"
                        class="form-control"
                        required
                    />
                    <label for="description">Opis stavke</label>
                </div>
            </div>
            <div class="col-md-2 mb-2">
                <div class="form-floating">
                    <input
                        id="amount"
                        name="amount"
                        v-model.number="amount"
                        type="number"
                        step="0.01"
                        class="form-control"
                        required
                    />
                    <label for="amount">Količina</label>
                </div>
            </div>
            <div class="col-md-2 mb-2">
                <div class="form-floating">
                    <input
                        id="price"
                        name="price"
                        v-model.number="price"
                        type="number"
                        step="0.01"
                        class="form-control"
                        required
                    />
                    <label for="price">Poj. cijena</label>
                </div>
            </div>
            <div class="col-md-2 mb-2">
                <div class="form-floating">
                    <input
                        id="total"
                        name="total"
                        :value="total"
                        v-model.number="total"
                        type="number"
                        class="form-control"
                        tabindex="-1"
                        required
                        readonly
                    />
                    <label for="total">Ukupno</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto m-3">
                <div class="btn-group btn-group" role="group">
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
        itemEdit: Object,
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
            description: this.itemEdit.description,
            amount: this.itemEdit.amount,
            price: this.itemEdit.price,
        }
    },
    created() {
        this.csrf = document.querySelector('meta[name="csrf-token"]').content;
    },
    computed: {
        total: function() {
            var calc = this.amount * this.price;
            calc = calc.toFixed(2);
            return calc;
        }
    }
}
</script>
