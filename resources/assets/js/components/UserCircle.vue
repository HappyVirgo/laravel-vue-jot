<template>
    <div class="bg-blue-400 rounded-full w-10 h-10 flex justify-center items-center text-white border border-gray-400">{{userCircle}}</div>
</template>

<script>
export default {
    name: "UserCircle",

    props: [
        'name'
    ],

    computed: {
        userCircle: function() {
            return this.name.match(/[A-Z]/g).slice(0,2).join('');
        }
    }
}
</script>

<style scoped>

</style>