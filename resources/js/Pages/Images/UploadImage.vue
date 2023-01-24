<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head } from "@inertiajs/inertia-vue3";
    import BreezeButton from "@/Components/PrimaryButton.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import { useForm } from "@inertiajs/inertia-vue3";
    
    const form = useForm({
        title: '',
        description: '',
        image: null,
    });


    const uploadImage = () => {
        form.post(route("images.store"));
    };

    const imageChange = (e) =>{
        form.image = e.target.files || e.dataTransfer.files;
        console.log(form.image);
        };
    
</script>

<template>
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">UPLOAD YOUR IMAGE</h2>
        </template>
        <template #body>
            <div class="main py-5 bg-white">
                <div class="container mx-auto py-3 w-60 flex flex-col flex-wrap items-center">               
                    <form @submit.prevent="uploadImage">
                        <span class="block text-sm font-medium text-slate-700 text-center font-bold">UPLOAD IMAGE</span>

                        <label class="block text-white text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-md text-[12px] px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-2 mb-4" for="avatar">CHOOSE FILE</label>
                        <input type="file"
                                    @input="form.image = $event.target.files[0]"
                                    id="avatar" name="avatar"
                                    accept="image/png, image/jpeg" class="hidden" />

                        <span class="block text-sm font-medium text-slate-700 text-center font-bold">TITLE</span>
                        <input v-model="form.title" class="border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 p-3 my-2 my-2 mb-4 rounded-md border-2" placeholder="IMAGE TITLE"/>

                        <span class="block text-sm font-medium text-slate-700 text-center font-bold">DESCRIPTION</span>
                        <input v-model="form.description" class="border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 p-3 my-2 my-2 mb-4 rounded-md border-2" placeholder="IMAGE DESCRIPTION"/>

                        <button type="submit" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-xl text-[12px] px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-1 my-2 mb-4 w-full">UPLOAD</button>
                </form>


                </div>
            </div>
        </template>


    </BreezeAuthenticatedLayout>
</template>