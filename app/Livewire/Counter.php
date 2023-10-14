<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;
 
    public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;
    }
    
    public function gotoDashboard()
    {
        return view('admin.dashboard');
    }
 
    public function render()
    {
        return view('livewire.counter');
    }
}