<template>
    <div class="relative pb-4">
        <label :for="name" class="pt-2 absolute uppercase font-bold text-blue-500 text-xs">{{ label }}</label>
        <input type="text" :id="name" :placeholder="placeholder" class="text-gray-900 pt-8 w-full border-b pb-2 focus:outline-none focus:border-blue-400" v-model="value" @input="updateField()">
        <p class="text-red-600 text-sm" v-text="errorMessage(name)">Error Here</p>
    </div>
</template>

<script>
export default {
    name: "InputField",

    props: [
        'name', 'label', 'placeholder', 'errors'
    ],

    data: function () {
        return {
            value: ''
        }
    },

    computed: {
        hasError: function () {
            return this.errors && this.errors[this.name] && this.errors[this.name].length > 0;
        }
    },

    methods: {
        updateField: function () {
            this.clearErrros(this.name);

            this.$emit('update:field', this.value)
        },

        errorMessage: function () {
            if (this.hasError) {
                return this.errors[this.name][0];
            }
        },

        clearErrors: function () {
            if (this.hasError) {
                return this.errors[this.name] = null;
            }
        },

        errorClassobject: function () {
            return {
                'error-field': this.hasError
            }
        }
    }
}
</script>

<style scoped>

</style>