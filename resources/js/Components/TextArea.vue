<script setup lang="ts">
import {watch} from "vue";

const model = defineModel({
    type: null,
    required: true,
});

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    message: String,
});

const emit = defineEmits(['clear']);

watch(model, () => props.message ? emit('clear') : null);
</script>

<template>
    <div>
        <label class="block text-sm font-medium mb-1">{{ name }}</label>
        <textarea name="name" class="w-full rounded border p-2" v-model="model" :class="{ '!border-red-500': message }" rows="6"/>
        <small class="text-red-600 text-sm mt-1" v-if="message">{{ message }}</small>
    </div>
</template>

<style scoped>

</style>
