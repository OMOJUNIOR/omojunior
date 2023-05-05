<template>
<div class="pt-16">
    <h1 class="mb-4 text-3xl font-semibold">Here's your trip</h1>
    <div class="max-w-sm mx-auto overflow-hidden text-left shadow sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div>
                    <GMapMap :zoom="10" 
                    :center="location.destination.geometry"
                    ref="gMap"
                     style="width: 100%; height: 300px">
                    <!-- <GMapMarker :position="location.destination.geometry" /> -->
                    </GMapMap>
                </div>
                <br>
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold">To</h1>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold">: <strong>{{location.destination.name}}</strong></h1>
                </div>
            </div>
        </div>
        <!--
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold">address</h1>
                </div>
                <div class="">
                    <p class="font-semibold text-l">: {{location.destination.address}}</p>
                </div>
            </div>
        </div>
        -->
        <div class="px-4 py-3 text-right bg-white sm:px-6">
    <button @click="confirmTrip" type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-black border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Let's Go
    </button>

</div>
  </div>
</div>


</template>

<script setup>
import { onMounted } from 'vue';
import { useLocationStore } from '../stores/useLocationStore'
import { useRouter } from 'vue-router'
import { ref } from 'vue'
import { httpCall } from '../api/httpCall'

const location = useLocationStore()
const router = useRouter()
const gMap = ref(null)

const confirmTrip = () => {
    httpCall().post('/api/trip',
    {
        origin: location.userCurrentLocation.geometry,
        destination: location.destination.geometry,
        destination_name: location.destination.name
    })
    .then((res) => {
       alert(res.data.message)
        router.push('/trip')
    })
    .catch((err) => {
        alert(err)
    })
    
}

// get users current location

onMounted(async() => {
   // does the user have a location stored?
    if(location.destination.name === '') {
         router.push('/location')
    }

    await location.updatecurrentLocation()

    // draw path on the map.

    gMap.value.$mapPromise.then((mapObject) => {
        let currentPoint = new google.maps.LatLng(location.userCurrentLocation.geometry),
            destinationPoint = new google.maps.LatLng(location.destination.geometry),
            directionsService = new google.maps.DirectionsService(),
            directionsRenderer = new google.maps.DirectionsRenderer({
            map: mapObject
        })
        directionsService.route({
            origin: currentPoint,
            destination: destinationPoint,
            avoidTolls: false,
            avoidHighways: false,
            travelMode: google.maps.TravelMode.DRIVING
        }, (res, status) => {
            if(status === google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(res)
            } else {
                console.log(status)
            }
        
        })
        })
        


        


    });

    // lets get the users current location
    /*navigator.geolocation.getCurrentPosition((position) => {
        location.currentLocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        }
    }, (error) => {
        console.log(error)
    })
    */



</script>