<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { ref,reactive, onMounted } from "vue";





const props = defineProps({
        pictures: {
            type: Object,
            default: () => ({}),
        },
    });


    const main = ref(null);

    const selectedPicture = reactive({ path: null });


const launchModal = (picture) => {
    selectedPicture.path = picture.filePath;
    main.value.style.display = "block";
};

window.onclick = function(event) {
    if (event.target == main.value) {
        main.value.style.display = "none";
    }
}
</script>

<template>
   <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">IMAGE MODERATION</h2>
        </template>

        <template #body>
                <div class="grid grid-cols-6 gap-4 p-2">
                    <div class="max-w-sm overflow-hidden shadow-lg" v-for="picture in pictures">
                        <img class="w-full" :src="picture.filePath" @click="launchModal(picture)">
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

                <!-- The Modal -->
                <div ref="main" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <img style="height: 100%;" :src="selectedPicture.path"/>
                    </div>
                </div>

        </template>
    </AuthenticatedLayout>
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