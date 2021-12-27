<?php

namespace App\Http\Livewire\PickUp;

use Livewire\Component;
use App\Models\Parish;
use App\Models\Community;
use App\Models\Pickup;
use App\Models\Service;
use App\Models\Handling;

class SchedulePickUpForm extends Component
{
    public $parishes = [];
    public $communities = [];
    public $streets = [];
    public $currentStep = 1;
    public $maxStep = 1;
    public $pickup_place = 'residence';
    public $pickup_business_name = null;
    public $pickup_knutsford_branch = null;
    public $pickup_knutsford_receipt_number = null;
    public $knutsford_fee_already_paid_for_pickup = false;
    public $pickup_address_parish = null;
    public $pickup_address_community = null;
    public $pickup_address_street = null;
    public $sender_first_name = null;
    public $sender_last_name = null;
    public $sender_contact_number = null;
    public $sender_email_address = null;

    public $dropoff_place = 'residence';
    public $dropoff_business_name = null;
    public $dropoff_knutsford_branch = null;
    public $dropoff_knutsford_receipt_number = null;
    public $recipient_is_paying_knutsford_fee = false;
    public $delivery_address_parish = null;
    public $delivery_address_community = null;
    public $delivery_address_street = null;
    public $recipient_first_name = null;
    public $recipient_last_name = null;
    public $recipient_contact_number = null;
    public $recipient_email_address = null;

    public $packages       = [];
    public $packages_saved = [];
    public $package_weight = null;
    public $package_quantity = 1;
    public $package_content = null;

    public $arrived_services = [];
    public $selected_service = null;
    public $payment_option = null;
    public $declared_value = 0;
    public $insurance = false;
    public $special_handlings = [];
    public $selected_handlings = [];
    public $additional_instruction = null;


    protected $stepRules = [
        1 => [
            'pickup_address_parish' => 'required|string',
            'pickup_address_community' => 'required|string',
            'pickup_address_street' => 'required|string',
            'sender_first_name' => 'required|string',
            'sender_last_name'  => 'required|string',
            'sender_contact_number' => 'required|numeric',
            'sender_email_address'  => 'required|string|email',
        ],

        2 => [
            'delivery_address_parish' => 'required|string',
            'delivery_address_community' => 'required|string',
            'delivery_address_street' => 'required|string',
            'recipient_first_name' => 'required|string',
            'recipient_last_name'  => 'required|string',
            'recipient_contact_number' => 'required|numeric',
            'recipient_email_address'  => 'required|string|email',
        ],

        3 => [
            'packages' => 'required|min:1',
            'packages.*.weight' => 'required|numeric|min:1',
            'packages.*.quantity' => 'required|integer|min:1',
            'packages.*.content' => 'required|string',
        ],
    ];

    protected $packageRules = ['packages' => 'required|min:1',
                               'packages.*.content' => 'required|string',];

    protected $placeRules = [
        'sender_business' => [
            'pickup_address_parish' => 'required|string',
            'pickup_address_community' => 'required|string',
            'pickup_address_street' => 'required|string',
            'sender_first_name' => 'required|string',
            'sender_last_name'  => 'required|string',
            'sender_contact_number' => 'required|numeric',
            'sender_email_address'  => 'required|string|email',
            'pickup_business_name' => 'required|string',
        ],

        'sender_knutsford' => [
            'pickup_knutsford_branch' => 'required',
            'pickup_knutsford_receipt_number' => 'required',
            'sender_first_name' => 'required|string',
            'sender_last_name'  => 'required|string',
            'sender_contact_number' => 'required|numeric',
            'sender_email_address'  => 'required|string|email',
        ],

        'recipient_business' => [
            'delivery_address_parish' => 'required',
            'delivery_address_community' => 'required',
            'delivery_address_street' => 'required',
            'recipient_first_name' => 'required|string',
            'recipient_last_name'  => 'required|string',
            'recipient_contact_number' => 'required|numeric',
            'recipient_email_address'  => 'required|string|email',
            'dropoff_business_name' => 'required|string',
        ],

        'recipient_knutsford' => [
            'dropoff_knutsford_branch' => 'required',
            'dropoff_knutsford_receipt_number' => 'required',
            'recipient_first_name' => 'required|string',
            'recipient_last_name'  => 'required|string',
            'recipient_contact_number' => 'required|numeric',
            'recipient_email_address'  => 'required|string|email',
        ],
    ];

    public function mount()
    {
        $this->parishes = Parish::all();
        $this->communities = Community::all()->groupBy('parish_id')->toArray();
        $this->arrived_services = Service::all();
        $this->special_handlings = Handling::all();
    }

    public function setFromPlace($value)
    {
        switch ($value) {
            case 'business':
                $this->pickup_place = 'business';
                break;
            case 'knutsford':
                $this->pickup_place = 'knutsford';
                break;
            
            default:
                $this->pickup_place = 'residence';
                break;
        }
    }

    public function setToPlace($value)
    {
        switch ($value) {
            case 'business':
                $this->dropoff_place = 'business';
                break;
            case 'knutsford':
                $this->dropoff_place = 'knutsford';
                break;
            
            default:
                $this->dropoff_place = 'residence';
                break;
        }
    }

    public function changeStep($step)
    {
        if ($this->maxStep < $step) {
            return;
        }

        $this->currentStep = $step;
    }

    public function nextStep()
    {
        
        if (in_array($this->currentStep, array_keys($this->stepRules))){

            
            if (($this->pickup_place == 'knutsford') && ($this->currentStep == 1)) {
                $this->validate($this->placeRules['sender_knutsford']);
            }
            if (($this->pickup_place == 'business') && ($this->currentStep == 1)) {
                $this->validate($this->placeRules['sender_business']);
            }
            if (($this->dropoff_place == 'business') && ($this->currentStep == 2)) {
                $this->validate($this->placeRules['recipient_business']);
            }
            if (($this->dropoff_place == 'knutsford') && ($this->currentStep == 2)) {
                $this->validate($this->placeRules['recipient_knutsford']);
            }
            if(($this->pickup_place == 'residence' && $this->currentStep == 1 ) || ($this->dropoff_place == 'residence' && $this->currentStep == 2)){
              $this->validate($this->stepRules[$this->currentStep]);  
            } 
            if($this->currentStep == 3){
               $this->validate($this->stepRules[$this->currentStep]);
               foreach ($this->packages as $key => $package) {
                if (!$package['is_saved']) {
                    $this->addError('packages.' . $key, 'This package must be saved before adding a new one.');
                        return;
                    }
                }
            } 
        }

        if ($this->currentStep >= 4) {
            $this->price = $this->adults * 100 + $this->children * 75;
            return;
        }

        $this->currentStep = $this->currentStep + 1;
        $this->maxStep = max($this->maxStep, $this->currentStep);
    }

    public function addPackage()
    {
        
        foreach ($this->packages as $key => $package) {
            if (!$package['is_saved']) {
                $this->addError('packages.' . $key, 'This package must be saved before adding a new one.');
                return;
            }
        }

        $this->packages[] = [
            'type'        => '',
            'quantity'    => 1,
            'is_saved'    => false,
            'weight'      => 1,
            'height'      => 0,
            'width'       => 0,
            'length'      => 0,
            'content' => ''
        ];

        $this->packages_saved = false;
    }


    public function editPackage($index)
    {
        foreach ($this->packages as $key => $package) {
            if (!$package['is_saved']) {
                $this->addError('packages.' . $key, 'This package must be saved before editing another.');
                return;
            }
        }

        $this->packages[$index]['is_saved'] = false;
    }


    public function savePackage($index)
    {
        $this->resetErrorBag();
        //$product = $this->allProducts->find($this->invoiceProducts[$index]['product_id']);
        $this->validate($this->stepRules[$this->currentStep]); 
        $this->packages[$index]['is_saved'] = true;

    }



    public function removePackage($index)
    {
        unset($this->packages[$index]);
        $this->packages = array_values($this->packages);
        $this->resetErrorBag();
    }


    public function savePickup()
    {
        /**
        $pickup = Pickup::create([
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email
        ]);

        foreach ($this->invoiceProducts as $product) {
            $invoice->products()->attach(
                $product['product_id'],
                [
                    'quantity' => $product['quantity']
                ]);
        }

        $this->reset('invoiceProducts', 'customer_name', 'customer_email');
        $this->invoiceSaved = true;
        **/
    }

    public function setDeliveryServiceChoice($value)
    {
        switch ($value) {
            case 'next_day':
                $this->payment_option = 1;
                break;
            case 'next_day_priority':
                $this->payment_option = 2;
                break;
            
            default:
                $this->payment_option = 3;
                break;
        }
    }


    public function render()
    {
        
        $total_weight = 0;
        $number_of_pieces = 0;
        $count = 1;
        $service = $this->arrived_services->find($this->selected_service);
        $total_handling_cost = 0;
        $extra_weight_cost = 0;
        $knutsford_charges = 0;
        $delivery_parish = $this->parishes->find($this->delivery_address_parish);
        $pickup_parish = $this->parishes->find($this->pickup_address_parish);


        if ($this->knutsford_fee_already_paid_for_pickup || $this->recipient_is_paying_knutsford_fee){

            $knutsford_charges = 650;

            if (($this->knutsford_fee_already_paid_for_pickup) && ($this->recipient_is_paying_knutsford_fee)){
                $knutsford_charges = 2*650;
            } 
        }


        foreach ($this->packages as $package) {
            if ($package['is_saved'] && $package['weight'] && $package['quantity']){
                $total_weight += $package['weight'] * $package['quantity'];
                $number_of_pieces += $package['quantity'];
            }
        }

        foreach ($this->special_handlings as $handling) {
            if (in_array($handling->id,$this->selected_handlings) && ($handling->cost > 0)){
                $total_handling_cost += $handling->cost;
            }
        }

        if (($total_weight - 10) > 0) {
            $extra_weight_cost = ($total_weight - 10)*45;
        }


        if ($service) {
           $subtotal = $service->cost + $extra_weight_cost + $total_handling_cost + $knutsford_charges;
        }else
        $subtotal = $extra_weight_cost + $total_handling_cost + $knutsford_charges;
        
        return view('livewire.pick-up.schedule-pick-up-form', [
            'from_communities' => $this->communities[$this->pickup_address_parish] ?? [],
            'recipient_communities' => $this->communities[$this->delivery_address_parish] ?? [],
            'total_weight' => $total_weight, 
            'number_of_pieces' => $number_of_pieces,
            'count' => $count,
            'service' => $service,
            'extra_weight_cost'=> $extra_weight_cost,
            'subtotal' => $subtotal,
            'total_cost' => $subtotal*1.15,
            'knutsford_charges' => $knutsford_charges,
            'delivery_parish' => $delivery_parish,
            'pickup_parish'  => $pickup_parish,
        ]);
    }
}
