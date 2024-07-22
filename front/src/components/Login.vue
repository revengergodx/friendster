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
                  @click="$emit('closeModal')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
              </button>
            </header>
              <div class="text-center space-y-4 p-5 flex-auto justify-center">
                <h2 class="mb-3 text-2xl font-bold">Log In</h2>
                <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                  <input v-model="userLogin.name" type="text" placeholder="Email or username"
                         class="my-3 w-full border-none bg-transparent outline-none focus:outline-none"/>
                </div>
                <div
                    class="flex w-full items-center space-x-2 rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                  <input v-model="userLogin.password" type="password" placeholder="Password"
                         class="my-3 w-full border-none bg-transparent outline-none"/>
                  <a href="#" class="font-medium text-gray-400 hover:text-gray-500">FORGOT?</a>
                </div>
                <button
                    @click="sendUserData()"
                    class="w-full rounded-2xl border-b-4 border-b-blue-600 bg-blue-500 py-3 font-bold text-white hover:bg-blue-400 active:translate-y-[0.125rem] active:border-b-blue-400">
                  LOG IN
                </button>
<!--                todo errors-->
              </div>
          </div>
        </div>
      </div>
    </div>
  </Transition>
</template>

<script setup>
import axios from "axios";


const props = defineProps({
  show: Boolean,
})

const emit = defineEmits(['closeModal', 'checking'])

let userLogin = []

async function sendUserData() {
  await axios.post('http://127.0.0.1:8000/api/login', {
    'name': userLogin.name,
    'password': userLogin.password
  }).then(res => {
    if (res.status === 200) {
      window.$cookies.set('user_id', res.data.data.id, 60 * 60 * 24 * 7)
      window.$cookies.set('user_first_name', res.data.data.first_name, 60 * 60 * 24 * 7)
      window.$cookies.set('user_last_name', res.data.data.last_name, 60 * 60 * 24 * 7)
      window.$cookies.set('user_image_url', res.data.data.image_url, 60 * 60 * 24 * 7)
      emit('closeModal', false)
      emit('checking')
    }
  }).catch(err => {
    console.log(err);
  })
}
</script>

<style scoped>

</style>