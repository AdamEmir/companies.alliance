<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public ?Company $company;
    public $name;
    public $email;
    public $websiteUrl;
    public $logo;

    public function render()
    {
        $this->name = $this->company->name;
        $this->email = $this->company->email;
        $this->websiteUrl = $this->company->website_url;
        return view('livewire.companies.edit');
    }

    public function update()
    {
        $this->validate([
            'name' => [
                'required','string','max:255'
            ],
            'logo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'dimensions:min_width=100,min_height=100'],
        ],
            messages: [
                'name.required' => 'The name field is required.',
                'name.string' => 'The name field must be a string.',
                'name.max' => 'The name field must not exceed 255 characters.',
                'logo.image' => 'The logo field must be an image.',
                'logo.mimes' => 'The logo field must be a file of type: jpeg, png, jpg, gif, svg.',
                'logo.dimensions' => 'The logo field must be at least 100px in width and 100px in height.',
            ]
        );

        try {
            DB::transaction(function () {
                $path = '';

                if($this->logo) {
                    $fileName = time().$this->logo->getClientOriginalName();
                    $path = $this->logo->storeAs('logos', $fileName, 'public');
                    $this->company->logo = $path;
                }

                $company = $this->company;
                $company->name = $this->name;
                $company->email = $this->email;
                $company->website_url = $this->websiteUrl;
                $company->save();
            });
            $this->dispatch('saved');
        }
        catch (\Exception $e) {
            $this->dispatch('error');
        }
    }
}
