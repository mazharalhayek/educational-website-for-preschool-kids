<x-guest-layout>
    <button onclick="switchForm('tutor')" style="background-color:#17b098;float: right;padding:10px;border-radius:5px;font-family:cursive"><b>Tutor</b></button>
    <button onclick="switchForm('parent')" style="background-color:#17b098;float: left;padding:10px;border-radius:5px;font-family:cursive"><b>Parent</b></button>
    <br>
    <br>


        <div id="tutorForm" style="display: none;">
        <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- birth date -->
        <div class="mt-4">
            <x-input-label for="birth_date" :value="__('birth_date')" />
            <x-text-input id="email" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        <!--monthly required salary-->
        <div class="mt-4">
            <x-input-label for="salary" :value="__('Monthly required salary')" />
            <x-text-input id="salary" class="block mt-1 w-full" type="number" name="salary" min="0" placeholder="$" :value="old('salary')" required autocomplete="USD" />
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

         <!--qualifications-->
         <div class="mt-4">
            <x-input-label for="qualifications" :value="__('Your qualifications')" />
            <x-text-input id="qualifications" class="block mt-1 w-full" type="text" name="qualifications" :value="old('qualifications')" required autocomplete="certificates ,courses,... " />
            <x-input-error :messages="$errors->get('qualifications')" class="mt-2" />
        </div>

         <!--tutor subject-->
         <div class="mt-4">
            <x-input-label for="subject" :value="__('What subject do you want to teach?')" />
            <select id="subject" class="block mt-1 w-full" name="subject" required>
                <option value="">Select a subject</option>
                <option value="Shapes">Shapes</option>
                <option value="Numbers">Numbers</option>
                <option value="Letters">Letters</option>
                <option value="Colors">Colors</option>
            </select>
            <x-input-error :messages="$errors->get('subject')" class="mt-2" />
         </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Account Type -->
        <div class="mt-4">
                <input type="text" name="type" value="tutor" hidden>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4" type="submit">
                {{ __('Register') }}
            </x-primary-button>
        </div>
            </form>
        </div>
{{--___________________registration form for parent account___________________--}}
        <div id="parentForm" style="display: none;">
        <form method="POST" action="{{ route('register') }}">
        @csrf
           <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- birth date -->
        <div class="mt-4">
            <x-input-label for="birth_date" :value="__('birth_date')" />
            <x-text-input id="email" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <input type="text" name="type" value="parent" hidden>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4" type="submit">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
         </div>

    <script>
            function switchForm(userType)
            {
                document.getElementById('tutorForm').style.display = userType === 'tutor' ? 'block' : 'none';
                document.getElementById('parentForm').style.display = userType === 'parent' ? 'block' : 'none';
            }
    </script>
</x-guest-layout>
