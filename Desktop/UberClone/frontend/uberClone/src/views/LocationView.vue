<template>
    <!-- component -->
 <div class="relative bg-white lg:py-20">
   <div class="flex flex-col items-center justify-between pt-0 pb-0 pl-10 pr-10 mt-0 mb-0 ml-auto mr-auto max-w-7xl xl:px-5 lg:flex-row">
     <div class="flex flex-col items-center w-full pt-5 pb-20 pl-10 pr-10 lg:pt-20 lg:flex-row">
       <div class="relative w-full max-w-md bg-cover lg:max-w-2xl lg:w-7/12">
         <div class="relative flex flex-col items-center justify-center w-full h-full lg:pr-10">
             <h3 class="text-4xl font-bold">Where is Your Destination ?</h3>
           <img src="https://pngimg.com/uploads/taxi/taxi_PNG56.png" class="btn-"/>
         </div>
       </div>
       <div class="relative z-10 w-full max-w-2xl mt-20 mb-0 ml-0 mr-0 lg:mt-0 lg:w-5/12">
         <div class="relative z-10 flex flex-col items-start justify-start pt-10 pb-10 pl-10 pr-10 bg-white shadow-2xl rounded-xl">
           <p class="w-full font-serif text-4xl font-medium leading-snug text-center">Destination</p>
           <form action="#" @submit.prevent="safeSelectedLocation"  class="relative w-full mt-6 mb-0 ml-0 mr-0 space-y-8">
             <div class="relative">
               <GMapAutocomplete
                :center="{ lat: 40.186389, lng: 29.061111 }"
                :zoom="11"
                :bounds="{ south: 40.054038, west: 28.605574, north: 40.307515, east: 29.277184 }"
                placeholder="Nilüfer" 
                @place_changed="handlePlaceChanged"
                :options="{ componentRestrictions: { country: 'tr' } }"
                 class="block w-full pt-4 pb-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black">
                </GMapAutocomplete>
             </div>
             
             <div class="relative">
               <button type="submit" @submit.prevent="safeSelectedLocation" class="inline-block w-full pt-4 pb-4 pl-5 pr-5 text-xl font-medium text-center text-white transition duration-200 bg-black rounded-lg hover:bg-indigo-600 ease">Book</button>
             </div>
         </form>
         </div>
       </div>
     </div>
   </div>
  
 </div>
 </template>

<script setup>
import { useLocationStore } from '../stores/useLocationStore'
import { useRouter } from 'vue-router'

const location = useLocationStore();

const router=useRouter();

const handlePlaceChanged = (e) => {
    console.log(handlePlaceChanged, e)
    location.$patch({
        destination:{
            name: e.name,
            address:e.formatted_address,
            geometry:{
                lat:e.geometry.location.lat(),
                lng:e.geometry.location.lng()
            }
        }
    })
}

const safeSelectedLocation = ()=>{
    if(location.destination.name != ''){
    router.push('/map')
    }else{
        alert('Please select a location')
    }
}
</script>