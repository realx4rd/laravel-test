<?php

namespace App\Livewire;

use App\Livewire\Forms\Advance;
use App\Livewire\Forms\Basic;
use Livewire\Component;

class SignUpForm extends Component
{
    public Basic $basic;
    public Advance $advance;

    public bool $isBasicForm = true;

    public function submit(): void
    {
        $this->advance->validate();

        if (!$this->is18YearsOld()) {
            return;
        };

        session([
            'formData' => [
                'basic' => $this->basic->customToArray(),
                'advance' => $this->advance->customToArray(),
            ],
        ]);

        $this->reset(['basic', 'advance']);

        redirect('/thanks');
    }

    private function is18YearsOld(): bool
    {
        if (!$this->advance->isMarried) {
            return true;
        }

        $birthDate = $this->basic->getBirthDate();
        $marriageDate  = $this->advance->getMarriageDate();

        if ($birthDate->diffInYears($marriageDate) < 18) {
            $this->advance->addError(
                $this->advance::NOT_ELIGIBLE_KEY,
                $this->advance::NOT_ELIGIBLE_MESSAGE,
            );

            return false;
        }

        return true;
    }

    public function next(): void
    {
        $this->basic->validate();
        $this->isBasicForm = false;
    }

    public function previous(): void
    {
        $this->isBasicForm = true;
    }

    public function render()
    {
        return view('livewire.sign-up-form');
    }
}
