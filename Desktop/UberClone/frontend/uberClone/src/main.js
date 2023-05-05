import { createApp } from 'vue'
import { createPinia } from 'pinia'
import VueGoogleMaps from '@fawmi/vue-google-maps'


import App from './App.vue'
import router from './router'
import '/src/assets/main.css'

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyDrIHJgOAU9gcnUxdznhf07oT4aLd1m1FU',
        libraries: 'places',
        

    },
})


app.mount('#app')
