<template>
    <div>
        <div class="flex justify-between">
            <div class="text-blue-400 cursor-pointer" @click="$router.back()">
                < Back
            </div>
        </div>
        <form @submit.prevent="submitForm" class="pt-6">
            <InputField :errors="errors" name="name" label="Contact Name" placeholder="Contact Name" @update:field="form.name = $event" :data="form.name" />
            <InputField :errors="errors" name="email" label="Contact Email" placeholder="Contact Email" @update:field="form.email = $event" :data="form.email" />
            <InputField :errors="errors" name="company" label="Company" placeholder="Company" @update:field="form.company = $event" :data="form.company" />
            <InputField :errors="errors" name="birthday" label="Birthday" placeholder="MM/DD/YYYY" @update:field="form.birthday = $event" :data="form.birthday" />

            <div class="flex justify-end">
                <button class="py-2 px-4 border text-red-700 mr-5 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 rounded text-white hover:bg-blue-400">Save</button>
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

        mounted() {
            axios.get('/api/contacts/' + this.$route.params.id)
            .then(response => {
                this.form = response.data.data;

                this.loading = false;
            })
            .catch(error => {
                this.loading = false;
                if (error.response.status === 404) {
                    this.$router.push('/contacts');
                }
            });
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
                axios.patch('/api/contacts/'+this.$route.params.id, this.form)
                .then(response => {
                    this.$router.push(response.data.links.self);
                })
                .catch(errors => {
                    console.log("errors", errors)
                    this.errors = errors.response.data.errors
                });
            }
        }
    }
</script>

<style scoped>

</style>
