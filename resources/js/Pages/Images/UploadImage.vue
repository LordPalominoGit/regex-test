<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head } from "@inertiajs/inertia-vue3";
    import BreezeButton from "@/Components/PrimaryButton.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import { useForm } from "@inertiajs/inertia-vue3";
    import { ref, onMounted } from "vue";

    const root = ref(null);

    const form = useForm({
        title: '',
        description: '',
        image: null,
        url:null
    });


    const uploadImage = () => {
        form.post(route("images.store"));
    };

    const imageChange = (e) =>{
        form.url = URL.createObjectURL(e.target.files[0]);
    };
    
    const launchModal = () => {
            root.value.style.display = "block";
        };

    window.onclick = function(event) {
        if (event.target == root.value) {
            root.value.style.display = "none";
        }
    }
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

                        <img v-if="form.url" :src="form.url" @click="launchModal"/>

                        <label class="block text-white text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-md text-[12px] px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-2 mb-4" for="avatar">{{form.url ? 'EDIT' : 'CHOOSE FILE'}}</label>
                        <input type="file"
                                    @change="imageChange"
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

                <!-- The Modal -->
                <div ref="root" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <img style="height: 100%;" v-if="form.url" :src="form.url"/>
                    </div>
                </div> 
        </template>


    </BreezeAuthenticatedLayout>
</template>

<style scoped>
 /* The Modal (background) */
 .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 2% auto; /* 15% from the top and centered */
  padding: 0px;
  border: 1px solid #888;
  width: 70%!important; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
} 


</style>