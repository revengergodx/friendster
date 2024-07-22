import './assets/main.css'

import {createApp} from 'vue'
import {createStore} from 'vuex'
import App from './App.vue'
import router from './router'
import './index.css'
import VueCookies from 'vue-cookies'

const store = createStore({
    state() {
        return {
            user_first_name: '',
            user_last_name: '',
            user_image_url: '',
        }
    },
})

const app = createApp(App)

app.use(router, VueCookies, store)

app.mount('#app')
