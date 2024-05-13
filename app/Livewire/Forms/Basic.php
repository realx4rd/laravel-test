<?php

namespace App\Livewire\Forms;

use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class Basic extends Form
{
    #[Validate(['required', 'string', 'max:255'])]
    public string $firstName;

    #[Validate(['required', 'string', 'max:255'])]
    public string $lastName;

    #[Validate(['nullable', 'string', 'max:255'])]
    public ?string $address = null;

    #[Validate(['nullable', 'string', 'max:255'])]
    public ?string $city = null;

    #[Validate(['nullable', 'string', 'max:255'])]
    public ?string $country = null;

    #[Validate(['required'])]
    public int $birthDay;

    #[Validate(['required'])]
    public int $birthMonth;

    #[Validate(['required'])]
    public int $birthYear;


    public function getBirthDate(): Carbon
    {
        return Carbon::create(
            $this->birthYear,
            $this->birthMonth,
            $this->birthDay,
        );
    }

    /**
     * @return array<string, mixed>
     */
    public function customToArray(): array
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'birthDate' => $this->getBirthDate()->format('Y-m-d'),
        ];
    }
}
