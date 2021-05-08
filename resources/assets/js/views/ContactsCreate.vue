<template>
    <div>
        <form @submit.prevent="submitForm">
            <InputField :errors="errors" name="name" label="Contact Name" placeholder="Contact Name" @update:field="form.name = $event" />
            <InputField :errors="errors" name="email" label="Contact Email" placeholder="Contact Email" @update:field="form.email = $event" />
            <InputField :errors="errors" name="company" label="Company" placeholder="Company" @update:field="form.company = $event" />
            <InputField :errors="errors" name="birthday" label="Birthday" placeholder="MM/DD/YYYY" @update:field="form.birthday = $event" />

            <div class="flex justify-end">
                <button class="py-2 px-4 border text-red-700 mr-5 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 rounded text-white hover:bg-blue-400">Add New Contact</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField'

    export default {
        name: "ContactsCreate",

        components: {
            InputField
        },

        data: function () {
            return {
                form: {
                    'name': '',
                    'email': '',
                    'company': '',
                    'birthday': '',
                },
                errors: null,
            }
        },

        methods: {
            submitForm: function () {
                axios.post('/api/contacts', this.form)
                .then(response => {
                    this.$router.push(response.data.links.self);
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors
                });
            }
        }
    }
</script>

<style scoped>

</style>
