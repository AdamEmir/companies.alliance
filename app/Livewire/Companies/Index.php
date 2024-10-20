<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $companies = Company::all()
            ->sortBy('id');

        return view('livewire.companies.index',compact('companies'));
    }

    public function destroy($id)
    {
        try {
            Company::find($id)->delete();
            $this->dispatch('deleted');
        } catch (\Exception $e) {
            $this->dispatch('error');
            return;
        }

    }
}
