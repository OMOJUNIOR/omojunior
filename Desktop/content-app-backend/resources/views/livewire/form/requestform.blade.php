<?php

use Livewire\Volt\Component;
use App\Models\Service;
use App\Modules\RequestForm\Services\FormRequestService;
use App\Models\Language;
use Filament\Notifications\Notification;
use Livewire\Attributes\{Rules, Messages};
use Illuminate\Support\Facades\Log;

new class extends Component {
    public $fullName;
    public $email;
    public $phone;
    public $message;
    public $selectedService;
    public $selectedLanguage;
    public $services = [];
    public $languages = [];
    public $languageLearningServiceId;

    public function rules()
    {
        return [
            'fullName' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:3000',
            'selectedService' => 'required|exists:services,id',
            'selectedLanguage' => function ($attribute, $value, $fail) {
                if ($this->selectedService == $this->languageLearningServiceId && empty($value)) {
                    $fail('The selected language field is required when the service is Language Learning.');
                } elseif ($this->selectedService == $this->languageLearningServiceId && !Language::where('id', $value)->exists()) {
                    $fail('The selected language is invalid.');
                }
            },
        ];
    }

    public function messages()
    {
        return [
            'selectedLanguage.required' => 'The selected language field is required when the service is Language Learning.',
            'selectedLanguage.exists' => 'The selected language is invalid.',
            'selectedService.exists' => 'The selected service is invalid.',
            'fullName.required' => 'The full name field is required.',
            'email.required' => 'The email field is required.',
        ];
    }

    public function mount()
    {
        $this->services = Service::select('id', 'name')->get()->toArray();
        $this->languages = Language::select('id', 'name')->get()->toArray();
        $this->languageLearningServiceId = Service::where('name', 'Language Learning')->value('id');
    }

    public function submitForm()
    {
        Log::info('Request form data received.');

        $data = $this->validate();

        $formRequestService = new FormRequestService();

        try {
            $formRequestService->create([
                'service_id' => $data['selectedService'],
                'full_name' => $data['fullName'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'message' => $data['message'],
                'language' => $data['selectedLanguage'] ?? null,
            ]);

            Notification::make()->title('Thanks for your interest in our services 🎉')->body('We will get back to you as soon as possible.')->success()->send();

            Log::info('Request form data saved successfully.');

            $this->resetForm();

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to save request form: ' . $e->getMessage());
            Notification::make()
                ->title('Oops! Something went wrong 😢')
                ->body('Please try again later. ' . $e->getMessage())
                ->danger()
                ->send();

            return false;
        }
    }

    protected function resetForm()
    {
        $this->reset(['fullName', 'email', 'phone', 'message', 'selectedService', 'selectedLanguage']);
    }
};

?>

<div>
    @include('volt.requestForm.request-ui')
</div>
