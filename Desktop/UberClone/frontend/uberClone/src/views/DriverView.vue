<template>
<div class="pt-16">
    <h1 class="mb-4 text-3xl font-semibold">Driver and Vehicle details</h1>
    <form action="#">
        <div class="max-w-sm mx-auto overflow-hidden text-left shadwo sm:rounded-md">
            <div class="bg-gray-300 pc-4 py-5 sm:p-6>">
                <div>
                    <input type="text" name="name" id="name" class="block w-full rounded-md shadow-sm form-input" placeholder="Name">
                </div>
                <div class="mt-4">
                    <input type="number" name="year" id="year" class="block w-full rounded-md shadow-sm form-input" placeholder="Car Year">
                 </div>
                    <div class="mt-4">
                    <input type="text" name="make" id="make" class="block w-full rounded-md shadow-sm form-input" placeholder="Car Make">
                  </div>
                 <div class="mt-4">
                      <input type="text" name="model" id="model" class="block w-full rounded-md shadow-sm form-input" placeholder="Car Model">
                  </div>
                    <div class="mt-4">
                        <input type="text" name="color" id="color" class="block w-full rounded-md shadow-sm form-input" placeholder="Color">
                    </div>
                    <div class="mt-4">
                        <input type="text" name="license" id="license" class="block w-full rounded-md shadow-sm form-input" placeholder="License Plate">
                    </div>
            </div>
            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-black border border-transparent rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Proceed
                </button>
                </div>
            
        </div>
    </form>
</div>
</template>

<script setup> 
</script>