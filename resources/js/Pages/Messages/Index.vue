<script setup>
import {Link, router} from '@inertiajs/vue3';

const props = defineProps({
    messages: Object, // paginator
});

const markRead = (id) => {
    router.patch(route('messages.read', id));
};
</script>

<template>
    <div class="max-w-5xl mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold">Inzendingen</h1>
            <div class="flex gap-4">
                <Link
                    :href="route('contact.index')"
                    class="rounded border border-blue-600 px-4 py-2 text-blue-600 hover:border-blue-700 hover:text-blue-700"
                >
                    Ga naar Contact Formulier
                </Link>
                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="rounded bg-red-600 text-white px-4 py-2 hover:bg-red-700"
                >
                    Uitloggen
                </Link>
            </div>
        </div>

        <div v-if="$page.props.flash?.message" class="mb-4 p-3 rounded bg-green-100">
            {{ $page.props.flash.message }}
        </div>

        <div class="grid gap-4">
            <div v-for="m in props.messages.data" :key="m.id" class="rounded border p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="font-medium">{{ m.name }} <span class="text-gray-500">&lt;{{ m.email }}&gt;</span>
                        </div>
                        <div class="text-xs text-gray-500">Verzonden: {{ m.created_at }}</div>
                    </div>
                    <div class="flex items-center gap-2">
            <span
                class="text-xs px-2 py-1 rounded"
                :class="m.read_at ? 'bg-green-100' : 'bg-yellow-100'"
            >
              {{ m.read_at ? 'Gelezen' : 'Ongelezen' }}
            </span>
                        <button
                            v-if="!m.read_at"
                            @click="markRead(m.id)"
                            class="rounded bg-gray-800 text-white text-sm px-3 py-1 hover:bg-black"
                        >
                            Markeer als gelezen
                        </button>
                    </div>
                </div>
                <p class="mt-3 whitespace-pre-line">{{ m.message }}</p>
            </div>
        </div>

        <div class="flex items-center justify-between gap-2 mt-6">
            <div class="flex-1 text-left">
                <Link
                    v-if="props.messages.prev_page_url"
                    :href="props.messages.prev_page_url"
                    class="px-4 py-2 border rounded"
                    preserve-state
                    preserve-scroll
                >
                    Vorige
                </Link>
            </div>
            <div class="flex-2 text-center">
                Resultaten {{ props.messages.from }} tot {{ props.messages.to }} van {{ props.messages.total }} worden
                weergegeven
            </div>
            <div class="flex-1 text-right">
                <Link
                    v-if="props.messages.next_page_url"
                    :href="props.messages.next_page_url"
                    class="px-4 py-2 border rounded"
                    preserve-state
                    preserve-scroll
                >
                    Volgende
                </Link>
            </div>
        </div>
    </div>
</template>
