<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $companies = Company::orderBy('id')->paginate(5);

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
