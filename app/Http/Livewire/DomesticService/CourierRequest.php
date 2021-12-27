<?php

namespace App\Http\Livewire\DomesticService;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\Pickup;

class CourierRequest extends Component
{
    
    public $user;
    protected $pickup;
    public $pickup_address = [];

    public $address;
    public $community;
    public $parish;
    public $business_name;
    public $knutsford_office;
    public $knutsford_receipt_number;
    public $knutsford_paid;

    public $sub_heading;
    public $note;
    protected $service;
    public $tab = 'pickup';
    public $dropoff_tab = true;
    public $receiver_tab = false;
    public $recipient = [];
    public $pickup_place = '';
    public $dropoff_place = '';

    protected $listeners = ['change-content' => '$refresh'];
    protected $rules = ['pickup.recipient.address' => 'string|required|max:255'];


    public function mount()
    {
        
        $this->pickup = new Pickup;

        $this->sub_heading = 'Pickup Location';
        $this->note = 'or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.';
        $this->sender = Auth::user()->withoutRelations()->toArray();
        $this->sender = Arr::add($this->sender,'business_name',null);
        $this->sender = Arr::add($this->sender,'knutsford_office',null);
        $this->sender = Arr::add($this->sender,'receipt_number',null);
        $this->sender = Arr::add($this->sender,'knutsford_paid',false);

        $this->recipient = ['first_name'=>'', 'last_name'=>'','email'=>'','phone'=>'','address'=>'','community'=>'','parish'=>''];
        //$this->pickup = ['address'=>'','community'=>'','parish'=>''];
       // dd($this->sender);
    }


    public function pickupPlace($value)
    {
        if ($value == 'business') {

            $this->pickup_place = 'business';
        }
        elseif ($value== 'knutsford') {
            $this->pickup_place = 'knutsford';
        }
       
        $this->emit('change-content');
    }

    public function dropOffPlace($value)
    {
        if ($value == 'business') {

            $this->dropoff_place = 'business';
        }
        elseif ($value == 'knutsford') {
            $this->dropoff_place = 'knutsford';
        }
       
        $this->emit('change-content');
    }


    public function setTab($value)
    {
        if ($value == 'pickup') {

            $this->sub_heading = 'Pickup';
            $this->tab = 'pickup';
        }
        if ($value == 'dropoff') {

            $this->sub_heading = 'Drop-off';
            $this->tab = 'dropoff';
        }
        elseif ($value == 'recipient') {
            $this->sub_heading = 'Recipient';
            $this->tab = 'recipient';
        }
       
        $this->emit('change-content');
    }

    public function setPickupAddress()
    {
        $this->pickup_address = ['business_name'=>$this->business_name,'address' => $this->address,'community'=> $this->community, 'parish' => $this->parish ]; 

        $this->pickup->fill(array(['pickup'=>$this->pickup_address]));
        $this->pickup['business_name'] = $this->business_name;
        $this->pickup['knutsford_office'] = $this->knutsford_office;
        $this->pickup['knutsford_receipt_number'] = $this->knutsford_receipt_number;
        $this->pickup['knutsford_paid'] = $this->knutsford_paid;
        $this->tab = 'dropoff';
        dd($this->pickup);
        //$this->emit('change-content');
    }    

    public function render()
    {
        return view('livewire.domestic-service.courier-request');
    }
}
