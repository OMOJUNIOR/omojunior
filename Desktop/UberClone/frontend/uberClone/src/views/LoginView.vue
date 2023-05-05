<template>
   <!-- component -->
<div class="relative bg-white lg:py-20">
  <div v-if="!awaitingVerification" class="flex flex-col items-center justify-between pt-0 pb-0 pl-10 pr-10 mt-0 mb-0 ml-auto mr-auto max-w-7xl xl:px-5 lg:flex-row">
    <div class="flex flex-col items-center w-full pt-5 pb-20 pl-10 pr-10 lg:pt-20 lg:flex-row">
      <div class="relative w-full max-w-md bg-cover lg:max-w-2xl lg:w-7/12">
        <div class="relative flex flex-col items-center justify-center w-full h-full lg:pr-10">
            <h3 class="text-4xl font-bold">Welcome to Book A Ride</h3>
          <img src="https://pngimg.com/uploads/taxi/taxi_PNG56.png" class="btn-"/>
        </div>
      </div>
      <div class="relative z-10 w-full max-w-2xl mt-20 mb-0 ml-0 mr-0 lg:mt-0 lg:w-5/12">
        <div class="relative z-10 flex flex-col items-start justify-start pt-10 pb-10 pl-10 pr-10 bg-white shadow-2xl rounded-xl">
          <p class="w-full font-serif text-4xl font-medium leading-snug text-center">Book A Ride</p>
          <form action="#" @submit.prevent="handleBooking" class="relative w-full mt-6 mb-0 ml-0 mr-0 space-y-8">
            <div class="relative">
              <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium text-gray-600 bg-white">Phone Number</p>
              <input placeholder="5357111222" v-maska data-maska="(###)##-##-### " type="text" v-model="credentials.phone_number" id="phone_number" name="phone_number" class="block w-full pt-4 pb-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"/>
            </div>
            
            <div class="relative">
              <button type="submit" @submit.prevent="handleBooking" class="inline-block w-full pt-4 pb-4 pl-5 pr-5 text-xl font-medium text-center text-white transition duration-200 bg-black rounded-lg hover:bg-indigo-600 ease">Book</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <div v-else class="flex flex-col items-center justify-between pt-0 pb-0 pl-10 pr-10 mt-0 mb-0 ml-auto mr-auto max-w-7xl xl:px-5 lg:flex-row">
    <div class="flex flex-col items-center w-full pt-5 pb-20 pl-10 pr-10 lg:pt-20 lg:flex-row">
      <div class="relative w-full max-w-md bg-cover lg:max-w-2xl lg:w-7/12">
        <div class="relative flex flex-col items-center justify-center w-full h-full lg:pr-10">
            <h3 class="text-4xl font-bold">Complete Verification to Book A Ride</h3>
          <img src="verify.webp" class="btn-"/>
        </div>
      </div>
      <div class="relative z-10 w-full max-w-2xl mt-20 mb-0 ml-0 mr-0 lg:mt-0 lg:w-5/12">
        <div class="relative z-10 flex flex-col items-start justify-start pt-10 pb-10 pl-10 pr-10 bg-white shadow-2xl rounded-xl">
          <p class="w-full font-serif text-4xl font-medium leading-snug text-center">Book A Ride</p>
          <form action="#" @submit.prevent="handleVerification" class="relative w-full mt-6 mb-0 ml-0 mr-0 space-y-8">
            <div class="relative">
              <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium text-gray-600 bg-white">OTP Code</p>
              <input placeholder="535712" v-maska data-maska="##-##-## " type="text" v-model="credentials.login_code" id="login_code" name="login_code" class="block w-full pt-4 pb-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black"/>
            </div>
            
            <div class="relative">
              <button type="submit" @submit.prevent="handleVerification" class="inline-block w-full pt-4 pb-4 pl-5 pr-5 text-xl font-medium text-center text-white transition duration-200 bg-indigo-500 rounded-lg hover:bg-indigo-600 ease">Verify</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
</template>


<script setup>
// vMaska is a library that allows you to mask the input fields
import {vMaska} from 'maska'
// reactive is used to access multiple values in the template
import {onMounted, reactive} from 'vue'
// While ref is used to access a single value in the template
import { ref } from 'vue';

import axios from 'axios'

import {useRouter} from 'vue-router'

import {computed} from 'vue'

const router = useRouter()

const credentials = reactive({
    phone_number: null,
    login_code: null
})

//get formated credentials
const getCredentials = ()=>{
    return {
        phone_number: credentials.phone_number.replace(/\D/g, ''),
        login_code: credentials.login_code.replace(/\D/g, '')
    }
}

const awaitingVerification = ref(false)

// This is used to redirect the user to the index page if they are already logged in
onMounted(()=>{
    if(localStorage.getItem('token')){
        router.push({name: 'landing'})
    }
})

const handleBooking = ()=>{
   
   axios.post('http://127.0.0.1:8000/api/login', 
   {
       phone_number: credentials.phone_number.replace(/\D/g, '')
   })
   .then((response)=>{
       alert(response.data.message)
       awaitingVerification.value = true
   })
    .catch((error)=>{
         console.log(error)
         alert(error.response.data)
    })

}

const handleVerification = ()=>{
   
   axios.post('http://127.0.0.1:8000/api/login/verify', 
   {
       phone_number: credentials.phone_number.replace(/\D/g, ''),
       login_code: credentials.login_code.replace(/\D/g, '')
    })
    .then((response)=>{
         alert(response.data.message)
          localStorage.setItem('token', response.data.token)
          router.push({name: 'landing'}) // redirect to user to the index page
    })
     .catch((error)=>{
            console.log(error)
            alert(error.response.data.message)
     })

}
</script>

