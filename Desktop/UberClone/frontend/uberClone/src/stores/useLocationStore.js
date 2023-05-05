import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { reactive } from 'vue'

const getUserLocation = async () => {
  //will talk about this later in the post
  return new Promise((res, rej) => {
    navigator.geolocation.getCurrentPosition(res, rej)
  })
}

// will talk about this later in the post
export const useLocationStore = defineStore('location', () => {
 const destination = reactive({
  name:'',
  address:'',
  geometry: {
    lat:null,
    lng:null
  }
 })
  const userCurrentLocation = reactive({
    geometry: {
      lat:null,
      lng:null
    }
  })

  const updatecurrentLocation = async () => {
    const userLocation = await getUserLocation()
    userCurrentLocation.geometry.lat = userLocation.coords.latitude
    userCurrentLocation.geometry.lng = userLocation.coords.longitude

  }

  return { destination , userCurrentLocation, updatecurrentLocation}
})
