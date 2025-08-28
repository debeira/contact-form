<script setup>
import {useForm} from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    message: '',
});
const submit = () => {
    form.post(route('contact.store'), {
        onSuccess: () => form.reset('message'),
    });
}
</script>

<template>
    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Contact</h1>

        <div v-if="$page.props.flash?.message" class="mb-4 p-3 rounded bg-green-100">
            {{ $page.props.flash.message }}
        </div>

        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Naam</label>
                <input
                    v-model="form.name"
                    type="text"
                    class="w-full rounded border p-2"
                />
                <div v-if="form.errors.name" class="text-red-600 text-sm mt-1">{{ form.errors.name }}</div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">E-mail</label>
                <input
                    v-model="form.email"
                    type="email"
                    class="w-full rounded border p-2"
                />
                <div v-if="form.errors.email" class="text-red-600 text-sm mt-1">{{ form.errors.email }}</div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Bericht</label>
                <textarea
                    v-model="form.message"
                    rows="6"
                    class="w-full rounded border p-2"
                />
                <div v-if="form.errors.message" class="text-red-600 text-sm mt-1">{{ form.errors.message }}</div>
            </div>

            <button
                type="submit"
                :disabled="form.processing"
                class="inline-flex items-center rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 disabled:opacity-50"
            >
                Verstuur
            </button>
        </form>
    </div>
</template>
