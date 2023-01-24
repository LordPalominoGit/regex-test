<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';


const props = defineProps({
        pictures: {
            type: Object,
            default: () => ({}),
        },
    });
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">IMAGE MODERATION</h2>
        </template>

        <template #body>
                <div class="grid grid-cols-6 gap-4 p-2">
                    <div class="max-w-sm overflow-hidden shadow-lg" v-for="picture in pictures">
                        <img class="w-full" :src="picture.filePath" >
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{picture.title}}</div>
                            <p class="text-gray-700 text-base">
                                {{picture.description}}
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <input type="button" class="text-gray-600 hover:bg-gray-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-[12px] px-4 py-2 dark:hover:bg-blue-700 dark:focus:ring-blue-800 border-2 flex hover:cursor-pointer text-center w-full" value="ALLOW"/>
                        </div>
                    </div>
                </div>
        </template>
    </AuthenticatedLayout>
</template>
