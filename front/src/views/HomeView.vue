<template>

  <main>
    <Header :getUser="user" @checking="setUser"/>
    <!-- This is an example component -->
    <div class="w-11/12 mx-auto flex">
      <!-- Sidebar -->
      <aside class="w-52 h-min rounded-lg bg-gray-50 border-gray-500 border border-opacity-15 mt-4 sticky top-20"
             aria-label="Sidebar">
        <div class="px-3 py-4 overflow-y-auto rounded">
          <ul class="space-y-2">
            <li>
              <a href="#"
                 class="flex items-center p-2 text-base font-normal rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>
                <span class="ml-3 text-black">Profile</span>
              </a>
            </li>
            <li>
              <a href="#" target="_blank"
                 class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                </svg>
                <span class="flex-1 ml-3 text-black whitespace-nowrap">Friends</span>
                <span
                    class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
              </a>
            </li>
            <li>
              <a href="#" target="_blank"
                 class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                </svg>
                <span class="flex-1 ml-3 text-black whitespace-nowrap">Messages</span>
                <span
                    class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span>
              </a>
            </li>
            <li>
              <a href="#"
                 class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z"/>
                </svg>
                <span class="flex-1 ml-3 text-black whitespace-nowrap">Videos</span>
              </a>
            </li>
            <li>
              <a href="#"
                 class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Photos</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>
      <!-- End sidebar -->
      <div class="max-w-lg py-4 mx-auto ">
        <div class="bg-white shadow-md border border-gray-200 rounded-lg w-auto mb-5">
          <a href="#">
            <img class="mx-auto rounded-t-lg"
                 src="https://www.shutterstock.com/image-photo/young-business-woman-working-on-260nw-1715324593.jpg"
                 alt="">
          </a>
          <div class="p-5">
            <div class="flex mb-1 justify-end">
              <!--              <img class="h-8 w-8 rounded-full" :src="user.imageUrl" alt="author"/>-->
              <a href="#" class="ml-2 content-center"><h3>Author</h3></a>
            </div>
            <a href="#">
              <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2">Noteworthy technology acquisitions
                2021</h5>
            </a>
            <p class="font-normal text-gray-700 mb-3">Here are the biggest enterprise technology acquisitions of 2021 so
              far, in reverse chronological order.</p>
            <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center"
               href="#">
              Read more
            </a>
          </div>
        </div>
        <div class="bg-white shadow-md border border-gray-200 rounded-lg w-auto mb-5">
          <a href="#">
            <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="">
          </a>
          <div class="p-5">
            <div class="flex mb-1 justify-end">
              <!--              <img class="h-8 w-8 rounded-full" :src="user.imageUrl" alt="author"/>-->
              <a href="#" class="ml-2 content-center"><h3>Author</h3></a>
            </div>
            <a href="#">
              <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2">Noteworthy technology acquisitions
                2021</h5>
            </a>
            <p class="font-normal text-gray-700 mb-3">Here are the biggest enterprise technology acquisitions of 2021 so
              far, in reverse chronological order.</p>
            <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center"
               href="#">
              Read more
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- component -->
    <footer class="bg-purple-100 dark:bg-gray-900">
      <div class="container px-6 py-8 mx-auto">
        <div class="flex flex-col items-center sm:flex-row sm:justify-between">
          <p class="text-sm text-gray-500">© Copyright 2024. All Rights Reserved.</p>
          <div class="flex mt-3 -mx-2 sm:mt-0">
            <a href="#"
               class="mx-2 text-sm text-gray-500 transition-colors duration-300 hover:text-gray-500 dark:hover:text-gray-300"
               aria-label="Reddit"> Teams </a>
            <a href="#"
               class="mx-2 text-sm text-gray-500 transition-colors duration-300 hover:text-gray-500 dark:hover:text-gray-300"
               aria-label="Reddit"> Privacy </a>
            <a href="#"
               class="mx-2 text-sm text-gray-500 transition-colors duration-300 hover:text-gray-500 dark:hover:text-gray-300"
               aria-label="Reddit"> Cookies </a>
          </div>
        </div>
      </div>
    </footer>
  </main>
</template>

<script setup>

import Header from "@/components/Header.vue";
import {onMounted, ref, watch} from "vue";

// watch()
const user = ref({
  first_name: window.$cookies.get('user_first_name'),
  last_name: window.$cookies.get('user_last_name'),
  image_url: window.$cookies.get('user_image_url')
})
// onMounted(() => {
//   console.log(user);
// })
function setUser() {
    user.value.first_name = window.$cookies.get('user_first_name')
    user.value.last_name = window.$cookies.get('user_last_name')
    user.value.image_url = window.$cookies.get('user_image_url')
}

</script>