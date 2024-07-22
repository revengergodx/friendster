<script setup>
const props = defineProps({
  show: Boolean
})
</script>

<template>
  <Transition name="login">
    <div v-if="show" class="modal-mask">
      <div
          class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
          id="modal-id">
        <div class="absolute bg-black opacity-30 inset-0 z-0"></div>
        <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
          <!--content-->
          <div class="">
            <!--body-->
            <header class="flex justify-end">
              <button
                  @click="$emit('close')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
              </button>
            </header>
            <div class="text-center space-y-4 p-5 flex-auto justify-center">
              <h2 class="mb-3 text-2xl font-bold">Register account</h2>
              <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                <input type="text" placeholder="Age"
                       class="my-3 w-full border-none bg-transparent outline-none focus:outline-none"/>
              </div>
              <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                <input type="text" placeholder="Name (optional)"
                       class="my-3 w-full border-none bg-transparent outline-none focus:outline-none"/>
              </div>
              <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                <input type="text" placeholder="Email"
                       class="my-3 w-full border-none bg-transparent outline-none focus:outline-none"/>
              </div>
              <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                <input type="password" placeholder="Password"
                       class="my-3 w-full border-none bg-transparent outline-none focus:outline-none"/>
              </div>
              <button
                  class="w-full rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">
                CREATE ACCOUNT
              </button>
            </div>
          </div>


        </div>
      </div>
    </div>
  </Transition>
</template>

<style scoped>

</style>