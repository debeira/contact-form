<script setup>
import {watch} from 'vue';

const model = defineModel({
    type: null,
    required: true,
});

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: "text",
    },
    message: String,
});

const emit = defineEmits(['clear']);

watch(model, () => props.message ? emit('clear') : null);
</script>

<template>
    <div class="mb-6">
        <label class="block text-sm font-medium mb-1">{{ name }}</label>
        <input class="w-full rounded border p-2" :type="type" v-model="model" :class="{ '!border-red-500': message }"/>
        <small class="text-red-600 text-sm mt-1" v-if="message">{{ message }}</small>
    </div>
</template>
