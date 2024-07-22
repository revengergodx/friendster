<template>
  <div class="sticky top-0">
    <Disclosure as="nav" class="bg-purple-600" v-slot="{ open }">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex mb-1">
            <img class="h-10 w-10 rounded" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                 alt="Your Company"/>
            <h1 class="text-3xl font-bold tracking-tight text-neutral-100 mr-3">Friendster</h1>
          </div>
          <div class="pr-10 hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <a v-for="item in navigation" :key="item.name" :href="item.href"
                 :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'rounded-md px-3 py-2 text-sm font-medium']"
                 :aria-current="item.current ? 'page' : undefined">{{ item.name }}</a>
            </div>
          </div>

          <div class="hidden md:block">

            <div class="ml-4 flex items-center md:ml-6">
              <div class='flex mr-3 w-3 justify-end'>
                <div class="flex rounded bg-white h-8">
                  <input class=" border-none bg-transparent pl-2 text-gray-400 outline-none focus:outline-none "
                         type="search" name="search" placeholder="Search..."/>
                  <button type="submit" class="mt-1 mr-1 rounded bg-blue-600 px-3 py-1 text-white h-6">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                         viewBox="0 0 56.966 56.966">
                      <path
                          d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                    </svg>
                  </button>
                </div>
              </div>

              <div class="flex" >
                <div class="flex" v-if="headerProp.getUser.first_name !== null">
                  <button type="button"
                          class="mr-1.5 relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"/>
                    <span class="sr-only">Settings</span>
                    <Cog6ToothIcon class="h-6 w-6" aria-hidden="true"/>
                  </button>
                  <button type="button"
                          class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"/>
                    <span class="sr-only">View notifications</span>
                    <BellIcon class="h-6 w-6" aria-hidden="true"/>
                  </button>

                  <!-- Profile dropdown -->
                  <Menu as="div" class="relative ml-3">
                    <div>
                      <MenuButton
                          class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"/>
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full" :src="headerProp.getUser.image_url" alt=""/>
                      </MenuButton>
                    </div>
                    <transition enter-active-class="transition ease-out duration-100"
                                enter-from-class="transform opacity-0 scale-95"
                                enter-to-class="transform opacity-100 scale-100"
                                leave-active-class="transition ease-in duration-75"
                                leave-from-class="transform opacity-100 scale-100"
                                leave-to-class="transform opacity-0 scale-95">
                      <MenuItems
                          class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }" >
                          <a :href="item.href" @click="profileMenu(item.method)"
                             :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
                        </MenuItem>
                      </MenuItems>
                    </transition>
                  </Menu>
                </div>
                <div v-else>
                  <div class="flex items-baseline">
                    <button id="show-login"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                            @click="showModalLogin = true">Login
                    </button>
                    <button id="show-register"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                            @click="showModalRegister = true">Register
                    </button>
                    <!-- use the modal component, pass in the prop -->
                    <Teleport to="body">
                      <!-- use the modal component, pass in the prop -->
                      <login :show="showModalLogin" v-model="showModalLogin" @closeModal="closeModalLogin" @checking="$emit('checking')"/>
                      <register :show="showModalRegister" @close="showModalRegister = false"/>
                    </Teleport>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <DisclosureButton
                class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="absolute -inset-0.5"/>
              <span class="sr-only">Open main menu</span>
              <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true"/>
              <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true"/>
            </DisclosureButton>
          </div>
        </div>
      </div>
      <DisclosurePanel class="md:hidden">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
          <DisclosureButton v-for="item in navigation" :key="item.name" as="a" :href="item.href"
                            :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block rounded-md px-3 py-2 text-base font-medium']"
                            :aria-current="item.current ? 'page' : undefined">{{ item.name }}
          </DisclosureButton>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" :src="getUser.imageUrl" alt=""/>
            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-white">{{ getUser.first_name }} {{
                  getUser.last_name
                }}
              </div>
              <div class="text-sm font-medium leading-none text-gray-400">{{ getUser.email }}</div>
            </div>
            <button type="button"
                    class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="absolute -inset-1.5"/>
              <span class="sr-only">Settings</span>
              <Cog6ToothIcon class="h-6 w-6" aria-hidden="true"/>
            </button>
            <button type="button"
                    class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="absolute -inset-1.5"/>
              <span class="sr-only">View notifications</span>
              <BellIcon class="h-6 w-6" aria-hidden="true"/>
            </button>
          </div>
          <div class="mt-3 space-y-1 px-2">
            <DisclosureButton v-for="item in userNavigation" :key="item.name" as="a" :href="item.href"
                              class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
              {{ item.name }}
            </DisclosureButton>
          </div>
        </div>
      </DisclosurePanel>
    </Disclosure>
  </div>
  <!--  Popup-->
</template>

<script setup>


import {Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import {Bars3Icon, BellIcon, Cog6ToothIcon, XMarkIcon} from "@heroicons/vue/24/outline/index.js";
import {ref} from "vue";
import Login from "./Login.vue";
import Register from "./Register.vue";


// onMounted(() => {
//   console.log(headerProp.getUser)
// })
const navigation = [
  {name: 'Home', href: 'http://localhost:5560/', current: true},
  {name: 'Messages', href: '#', current: false},
  {name: 'Groups', href: '#', current: false},
]
const userNavigation = [
  {name: 'Your Profile', href: '#', method: 'view_profile'},
  {name: 'Sign out', href: '#', method: 'logout'},
]

let headerProp = defineProps(['getUser'])
let emit = defineEmits(['checking'])

const showModalLogin = ref(false)
const showModalRegister = ref(false)

function closeModalLogin() {
  showModalLogin.value = false
}

function profileMenu(method) {
  if (method == 'view_profile') {
    console.log(method)
  } else {
    window.$cookies.remove('user_id')
    window.$cookies.remove('user_first_name')
    window.$cookies.remove('user_last_name')
    window.$cookies.remove('user_image_url')
    emit('checking')
  }
}

</script>

<style scoped>

</style>