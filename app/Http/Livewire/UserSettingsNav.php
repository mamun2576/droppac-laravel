<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserSettingsNav extends Component
{
   
    public $tab = 'address';

    public $listeners = ['update-content' => '$refresh'];


    public function render()
    {
        return view('livewire.user-settings-nav');
    }


    public function showSettingsController($setting)
    {
      switch ($setting) {
            case 'address':
                $this->updateTab($setting);
                break;

            case 'account':
                $this->updateTab($setting);
                break;
            case 'security':
                $this->updateTab($setting);
                break;
            case 'wallet':
                $this->updateTab($setting);
                break;
            case 'notification':
                $this->updateTab($setting);
                break;
            default:
                $this->updateTab('address');
                break;
        }  
    } 

    public function updateTab($tabName)
    {
        $this->tab = $tabName;
        $this->emit('update-content');
    }
}
