<div
    class="max-w-3xl p-6 mx-auto bg-blue-900 border border-gray-400 rounded-lg shadow-lg dark:bg-blue-900 dark:border-gray-600">
    <div class="p-4">
        <h5 class="text-2xl font-bold text-white uppercase">Need a service or want to learn a language to unleash your
            full potential?</h5>
        <p class="mt-2 text-white">Provide your details, and a member of our robust team will reach out to you shortly to
            discuss your requirements and how we can assist in achieving your goals.</p>
    </div>

    <form wire:ignore.self wire:submit.prevent="submitForm" class="py-3 space-y-4">
        <!-- Full Name Field -->
        <div class="mb-4">
            <label for="fullName" class="block mb-2 text-sm font-bold text-white">Full Name</label>
            <input type="text" id="fullName" wire:model="fullName"
                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                placeholder="Full Name">
            @error('fullName')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Service Selection Field -->
        <div class="mb-4" x-data="{ selectedService: @entangle('selectedService') }" x-init="initializeIntlTelInput()">
            <label for="selectedService" class="block mb-2 text-sm font-bold text-white">Select Service</label>
            <select id="selectedService" wire:model.lazy="selectedService"
                class="w-full px-4 py-3 text-gray-900 border border-gray-300 rounded-lg dark:text-gray-100 dark:bg-gray-700 dark:border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                <option value="">Select Service</option>
                @foreach ($services as $service)
                    <option value="{{ $service['id'] }}">{{ $service['name'] }}</option>
                @endforeach
            </select>
            @error('selectedService')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Conditional Language Selection Field -->
        @if ($selectedService == $languageLearningServiceId)
            <div class="mb-4">
                <label for="selectedLanguage" class="block mb-2 text-sm font-bold text-white">Select Language</label>
                <select id="selectedLanguage" wire:model="selectedLanguage"
                    class="w-full px-4 py-3 text-gray-900 border border-gray-300 rounded-lg dark:text-gray-100 dark:bg-gray-700 dark:border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    <option value="">Select Language</option>
                    @foreach ($languages as $language)
                        <option value="{{ $language['id'] }}">{{ $language['name'] }}</option>
                    @endforeach
                </select>
                @error('selectedLanguage')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        @endif

        <!-- Message Field -->
        <div class="mb-4">
            <label for="message" class="block mb-2 text-sm font-bold text-white">Type message</label>
            <textarea id="message" wire:model="message"
                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                placeholder="Type your message"></textarea>
            @error('message')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Phone Number Field -->
        <div wire:ignore class="mb-4">
            <label for="phone" class="block mb-2 text-sm font-bold text-white">Phone Number</label>
            <input type="tel" id="phone" name="phone" wire:model="phone"
                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            @error('phone')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <input type="hidden" name="full_phone" id="full_phone">
        </div>

        <!-- Email Address Field -->
        <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-bold text-white">Email Address</label>
            <input type="email" id="email" wire:model="email"
                class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                placeholder="Enter your email">
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit"
                class="px-5 py-3 text-lg font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Submit</button>
        </div>
    </form>
</div>

<script>
    function initializeIntlTelInput() {
        const input = document.querySelector("#phone");
        const form = document.querySelector("form");
        if (input && form) {
            if (input._iti) {
                input._iti.destroy();
            }

            // Initialize the international telephone input
            input._iti = window.intlTelInput(input, {
                initialCountry: "auto",
                geoIpLookup: function(callback) {
                    fetch('https://ipinfo.io/json', {
                            headers: {
                                'Accept': 'application/json'
                            }
                        })
                        .then(resp => resp.json())
                        .then(resp => {
                            console.log('Country lookup success:', resp.country);
                            callback(resp.country);
                        })
                        .catch(error => {
                            console.log('Country lookup failed:', error);
                            callback('us'); // Default to 'us' on failure
                        });
                },
                utilsScript: "/node_modules/intl-tel-input/build/js/utils.js"
            });

            input.addEventListener("countrychange", function() {
                input.placeholder = input._iti.getNumber(intlTelInputUtils.numberFormat.INTERNATIONAL);
            });

            // Update hidden full phone input on blur
            input.addEventListener('blur', function() {
                const fullPhoneInput = document.querySelector("#full_phone");
                if (fullPhoneInput) {
                    fullPhoneInput.value = input._iti.getNumber();
                    console.log('Phone number updated:', input._iti.getNumber());
                }
            });

            // Update phone input value before form submission
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                input.value = input._iti.getNumber();
                @this.set('phone', input.value);
                console.log('Form submitted with phone number:', input.value);

            });
        } else {
            console.log('Required elements not found, unable to initialize intlTelInput');
        }
    }
</script>
