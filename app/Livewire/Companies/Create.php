<?php

namespace App\Livewire\Companies;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $logo;
    public $websiteUrl;


    public function render()
    {
        return view('livewire.companies.create');
    }
    public function store()
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
//                    $logoPath = $this->logo->store('public/logos');
//                    $logoFilename = basename($logoPath);
                    $fileName = time().$this->logo->getClientOriginalName();
                    $path = $this->logo->storeAs('logos', $fileName, 'public');

                }

                $company = new Company();
                $company->name = $this->name;
                $company->email = $this->email;
                $company->logo = $path;
                $company->website_url = $this->websiteUrl;
                $company->user_id = auth()->user()->id;
                $company->save();
            });
            $this->dispatch('saved');

        }catch (\Exception $e) {
            $this->dispatch('error');
        }
    }
}
