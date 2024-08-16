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
                                    :value="old('email', $company->email)" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="logo" :value="__('Logo')" />
                                <x-file-input id="logo" name="logo" />
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG
                                    (MAX.
                                    100x100px).</p>
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

                                <x-secondary-button onclick="window.history.back()">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
