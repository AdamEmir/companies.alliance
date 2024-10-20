<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public ?Company $company;
    public $name;
    public $email;
    public $logo;
    public $websiteUrl;

    public function render()
    {
        $company = $this->company;
        $user = User::where('id', $company->user_id)->first();

        return view('livewire.companies.show', compact('company', 'user'));
    }
}
