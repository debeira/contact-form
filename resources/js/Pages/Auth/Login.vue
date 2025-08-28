<script setup>
import {useForm} from '@inertiajs/vue3'
import TextInput from "../../Components/TextInput.vue";
import {Link} from "@inertiajs/vue3";

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

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
                    :disabled="form.processing"
                >
                    Inloggen
                </button>

                <Link
                    :href="route('contact.index')"
                    class="rounded border border-blue-600 px-4 py-2 text-blue-600 hover:border-blue-700 hover:text-blue-700"
                >
                    Ga naar Contact Formulier
                </Link>
            </div>
        </form>
    </div>
</template>
