<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Company Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Update company's information.") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('company.update', $company->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="mt-4">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name', $company->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    :value="old('email', $company->email)" autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div class="mt-4">
                                @if ($company->logo)
                                    <img src="{{ asset('storage/logos/' . $company->logo) }}"
                                        class="img-placeholder w-30 h-30" alt="{{ $company->name }}">
                                @else
                                    <img src="{{ asset('images/default.png') }}" class="img-placeholder w-30 h-30"
                                        alt="{{ $company->name }}">
                                @endif
                                <x-input-label for="logo" :value="__('Logo')" class="mt-4" />
                                <x-file-input id="logo" name="logo" />
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG,
                                    JPEG
                                    (MAX.
                                    100x100px).</p>
                                <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="website" :value="__('Website')" />
                                <x-text-input id="website" name="website" type="text"
                                    class="mt-1 block
                                    w-full" :value="old('website', $company->website)" />
                                <x-input-error class="mt-2" :messages="$errors->get('website')" />
                            </div>

                            <div class="flex items-center gap-4 mt-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>

                                <a href="{{ route('company.index') }}"
                                    class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
