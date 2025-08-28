<script setup>
import { Link, router } from '@inertiajs/vue3';

const props = defineProps({
    messages: Object, // paginator
});

const markRead = (id) => {
    router.patch(route('messages.read', id));
};
</script>

<template>
    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-6">Inzendingen</h1>

        <div v-if="$page.props.flash?.message" class="mb-4 p-3 rounded bg-green-100">
            {{ $page.props.flash.message }}
        </div>

        <div class="grid gap-4">
            <div v-for="m in props.messages" :key="m.id" class="rounded border p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="font-medium">{{ m.name }} <span class="text-gray-500">&lt;{{ m.email }}&gt;</span></div>
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
    </div>
</template>
