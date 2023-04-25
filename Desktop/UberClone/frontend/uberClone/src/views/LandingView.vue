<template>

    <div class="pt-16">
        <h1 class="mb-4 text-3xl font-semibold">What are you here for ?</h1>
        <div class="max-w-sm mx-auto overflow-hidden text-left shadow sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="flex justify-between">
                    <button class="px-4 py-2 text-sm font-medium bg-black border border-transparent rounded-md text-cyan-50">
                        Drive A Ride
                    </button>
                    <button @click="handleLocation"  class="px-4 py-2 text-sm font-medium bg-black border border-transparent rounded-md text-cyan-50">
                       Book A Ride
                    </button>
                </div>

            </div>
        </div>
    </div>

</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

const handleLocation = () => {
    router.push('/location')
}

</script>