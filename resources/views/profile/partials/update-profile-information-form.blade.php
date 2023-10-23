<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informação do Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Atualize as informações de perfil e endereço de e-mail da sua conta") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6"  enctype="multipart/form-data">
        @csrf
        @method('patch')
    @if ($user->image_url)
        <div>
            <img src="{{asset($user->image_url)}}" alt="Foto de Perfil" class="mt-1" style="max-width: 200px;" />
        </div>
    @endif
            
        <div>
     <input id="image_url" name="image_url" type="file" class="mt-1 block w-full" accept="image/*" />
            <x-input-error class="mt-2" :messages="$errors->get('image_url')" />
      </div>

 

        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="about_me" :value="__('Sobre Mim')" />
            <textarea id="about_me" name="about_me" class="mt-1 block w-full" :value="old('about_me', $user->about_me)" autocomplete="about_me">{{ old('about_me', $user->about_me) }}</textarea>

            <x-input-error class="mt-2" :messages="$errors->get('about_me')" />
        </div>
        <div>
    <x-input-label for="facebook_link" :value="__('Facebook')" />
    <x-text-input id="facebook_link" name="facebook_link" type="text" class="mt-1 block w-full" :value="old('facebook_link', $user->facebook_link)" />
    <x-input-error class="mt-2" :messages="$errors->get('facebook_link')" />
</div>

<div>
    <x-input-label for="twitter_link" :value="__('Twitter')" />
    <x-text-input id="twitter_link" name="twitter_link" type="text" class="mt-1 block w-full" :value="old('twitter_link', $user->twitter_link)" />
    <x-input-error class="mt-2" :messages="$errors->get('twitter_link')" />
</div>

<div>
    <x-input-label for="linkedin_link" :value="__('LinkedIn')" />
    <x-text-input id="linkedin_link" name="linkedin_link" type="text" class="mt-1 block w-full" :value="old('linkedin_link', $user->linkedin_link)" />
    <x-input-error class="mt-2" :messages="$errors->get('linkedin_link')" />
</div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
