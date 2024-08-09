<template>
    <div class="mb-4">
        <label :for="name" class="text-lg">{{ label }} </label><br />
        <input
            :type="type"
            :class="
                error
                    ? 'border rounded ring-1  focus:ring-1 focus:ring-green-300 ring-red-500 sm:w-full md:w-64 lg:w-80 h-8'
                    : 'border rounded ring-1 ring-green-200 focus:ring-1 focus:ring-green-300 sm:w-full md:w-64 lg:w-80 h-8'
            "
            :name="name"
            :id="name"
            v-model="model"
            autocomplete="off"
        />
        <div class="error" v-if="error">{{ error }}</div>
    </div>
</template>

<script setup>
const model = defineModel({
    type: null,
    required: true,
});

defineProps({
    label: {
        type: String,
    },
    name: {
        type: String,
    },
    type: {
        type: String,
        default: "text",
    },
    error: String,
});
</script>

<style scoped>
.error {
    color: red;
}
</style>
