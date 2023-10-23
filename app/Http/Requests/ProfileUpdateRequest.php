<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id), 'regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/'],
            'about_me' => 'nullable|string',
            'image_url' =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'facebook_link' => ['nullable', 'string', 'url', 'regex:/^https:\/\/www\.facebook\.com\/[a-zA-Z0-9.-]+\/?$/'],
            'twitter_link' => ['nullable', 'string', 'regex:/^https:\/\/twitter\.com\/[a-zA-Z0-9_]+\/?$/'],
            'linkedin_link' => ['nullable', 'string', 'regex:/^(https:\/\/www\.linkedin\.com\/in\/[a-zA-Z0-9-]+)\/?$/'],




        ];
    }

    
}
