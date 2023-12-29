<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100" style="color: black">
            {{ __('Profile Pic') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile picture.") }}
        </p>
    </header>



    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="image" :value="__('Image')" style="color: rgb(13, 16, 68)"/>
            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" :value="old('image', Auth()->user()->image)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
    </form>
</section>
