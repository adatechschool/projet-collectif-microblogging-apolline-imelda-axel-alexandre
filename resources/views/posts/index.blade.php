<x-app-layout>
  <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <form method="POST" action="{{ route('posts.store') }}">
      @csrf
      <textarea
          name="message"
          placeholder="{{ __('What\'s on your mind?') }}"
          class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
      >{{ old('message') }}</textarea>
      <x-input-error :messages="$errors->get('message')" class="mt-2" />
      <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
    </form>
    <p class="text-center text-gray-500 text-xs">
      &copy;2024 All rights reserved.
    </p>
  </div>
</x-app-layout>