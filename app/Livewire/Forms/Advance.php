<?php

namespace App\Livewire\Forms;

use Carbon\Carbon;
use Livewire\Form;

class Advance extends Form
{
    public const NOT_ELIGIBLE_MESSAGE = 'You are not eligible to apply because your marriage occurred before your 18th birthday';
    public const NOT_ELIGIBLE_KEY = 'marriageDay';

    public ?bool $isMarried = null;

    public ?int $marriageDay = null;
    public ?int $marriageMonth = null;
    public ?int $marriageYear = null;

    public ?string $marriageCountry = null;

    public ?bool $isWidow = null;
    public ?bool $isMarriadInPast = null;

    public function getMarriageDate(): Carbon
    {
        return Carbon::create(
            $this->marriageYear,
            $this->marriageMonth,
            $this->marriageDay,
        );
    }

    /**
     * @return array<string, mixed>
     */
    public function customToArray(): array
    {
        return [
            'isMarried' => $this->isMarried ? 'yes' : 'no',
            'marriageCountry' => $this->marriageCountry,
            'isWidow' => $this->isWidow ? 'yes' : 'no',
            'isMarriadInPast' => $this->isMarriadInPast ?   'yes' : 'no',
            'marriageDate' => $this->getMarriageDate()->format('Y-m-d'),
        ];
    }

    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'isMarried' => 'required',
            'marriageDay' => 'required_if:isMarried,true',
            'marriageMonth' => 'required_if:isMarried,true',
            'marriageYear' => 'required_if:isMarried,true',
            'marriageCountry' => 'required_if:isMarried,true',
            'isWidow' => 'required_if:isMarried,false',
            'isMarriadInPast' => 'required_if:isMarried,false',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'isMarried.required' => 'Please select an option.',
            'marriageDay.required_if' => 'The marriage day field is required.',
            'marriageMonth.required_if' => 'The marriage month field is required.',
            'marriageYear.required_if' => 'The marriage year field is required.',
            'marriageCountry.required_if' => 'The Marriage Country field is required.',
            'isWidow.required_if' => 'Please select an option.',
            'isMarriadInPast.required_if' => 'Please select an option.',
        ];
    }
}
