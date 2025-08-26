<?php

namespace App\Livewire;

use Livewire\Component;

class NewsLetterForm extends Component
{
    public $name = ''; 
    public $email = ''; 

    protected $rules = [
        'name'  => 'required|min:3', 
        'email' => 'required|email',
    ];

    // Validate name field in real-time
    public function updatedName()
    {
        $this->validateOnly('name');
    }

    // Validate email field in real-time (with extra rules)
    public function updatedEmail()
    {
        $this->validateOnly('email');

        // Check for spaces
        if (str_contains($this->email, ' ')) {
            $this->addError('email', 'Email cannot contain spaces.');
        }

        // Regex restriction (only .com allowed)
        if (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.com$/', $this->email)) {
            $this->addError('email', 'Only .com emails with valid characters are allowed.');
        }
    }

    public function subscribe()
    {
        $this->validate();

        // Run extra checks again (in case user bypasses frontend)
        if (str_contains($this->email, ' ')) {
            $this->addError('email', 'Email cannot contain spaces.');
            return;
        }

        if (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.com$/', $this->email)) {
            $this->addError('email', 'Only .com emails with valid characters are allowed.');
            return;
        }

        // Simulate success
        session()->flash('message', 'You have successfully subscribed!');
        $this->reset(['name', 'email']);
    }

    public function render()
    {
        return view('livewire.news-letter-form');
    }
}
