<script setup>
import { useForm } from '@inertiajs/vue3'
import TextInput from "../../Components/TextInput.vue";

const form = useForm({
    email: '',
    password: '',
})

const submit = () => form.post('/login')
</script>

<template>
    <div class="max-w-md mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Login</h1>

        <form @submit.prevent="submit" class="space-y-4">
            <TextInput
                name="E-mail"
                type="email"
                v-model="form.email"
                :message="form.errors.email"
                @clear="form.clearErrors('email')"
            />
            <TextInput
                name="Wachtwoord"
                type="password"
                v-model="form.password"
                :message="form.errors.password"
                @clear="form.clearErrors('password')"
            />

            <button
                type="submit"
                class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
                :disabled="form.processing"
            >
                Inloggen
            </button>
        </form>
    </div>
</template>
