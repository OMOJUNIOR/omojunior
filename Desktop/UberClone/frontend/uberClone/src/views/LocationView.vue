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
           <form action="#" class="relative w-full mt-6 mb-0 ml-0 mr-0 space-y-8">
             <div class="relative">
               <GMapAutocomplete
                placeholder="Nilüfer" 
                @place_changed="handlePlaceChanged"
                id="phone_number" name="phone_number" class="block w-full pt-4 pb-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black">
                </GMapAutocomplete>
             </div>
             
             <div class="relative">
               <button type="submit" @submit.prevent="handleBooking" class="inline-block w-full pt-4 pb-4 pl-5 pr-5 text-xl font-medium text-center text-white transition duration-200 bg-indigo-500 rounded-lg hover:bg-indigo-600 ease">Book</button>
             </div>
         </form>
         </div>
       </div>
     </div>
   </div>
  
 </div>
 </template>

<script setup>
const handlePlaceChanged = (place) => {
    console.log(place)
}

</script>