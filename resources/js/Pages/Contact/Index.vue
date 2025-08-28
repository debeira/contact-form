<script setup>
import {Link, useForm} from '@inertiajs/vue3';
import TextInput from "../../Components/TextInput.vue";
import TextArea from "../../Components/TextArea.vue";

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
            <TextInput
                name="Naam"
                v-model="form.name"
                :message="form.errors.name"
                @clear="form.clearErrors('name')"
            />
            <TextInput
                name="E-mail"
                v-model="form.email"
                type="email"
                :message="form.errors.email"
                @clear="form.clearErrors('email')"
            />
            <TextArea
                name="Bericht"
                v-model="form.message"
                :message="form.errors.message"
                @clear="form.clearErrors('message')"
            />

            <div class="flex items-center justify-between">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="inline-flex items-center rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 disabled:opacity-50"
                >
                    Verstuur
                </button>

                <Link v-if="$page.props.auth.user"
                      :href="route('messages.index')"
                      class="rounded border border-blue-600 px-4 py-2 text-blue-600 hover:border-blue-700 hover:text-blue-700"
                >
                    Ga naar inzendingen
                </Link>
            </div>
        </form>
    </div>
</template>
