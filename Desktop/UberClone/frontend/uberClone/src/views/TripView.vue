<template>
<div class="pt-16">
    <h1 class="mb-4 text-3xl font-semibold">Awaiting Driver Approval ...</h1>
    <div class="max-w-sm mx-auto overflow-hidden text-left shadow sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <GMapMap :zoom="14" 
                             ref="gMap" 
                             style="width: 100%; height: 250px">
                      <!--  <GMapMarker :position="location.destination.geometry" /> -->
                    </GMapMap>
                </div>
            </div>
        </div>
        <div class="px-4 py-3 text-center bg-gray-50 sm:px-6">
            <span class="bg-gray-50">Once your trip request has been accepted, your driver info will be shown here.</span>
        </div>
        </div>
</div>
</template>

<script setup>


</script>