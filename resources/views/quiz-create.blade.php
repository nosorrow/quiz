<x-app-layout>
  <x-slot name="header">
    <nav class="rounded-md w-full">
      <ol class="list-reset flex">
        <li><a href="{{url()->route('quizzes.index')}}" class="text-blue-600 hover:text-blue-700">Тестове</a></li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Нов Тест</li>
      </ol>
    </nav>
  </x-slot>
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="container py-10">
      <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md mx-auto mt-10">
        <h1 class="text-teal-500 text-xl mb-2">Нов Тест</h1>
        <form action="{{url()->route('quizzes.store')}}" method="post">
          @csrf

          <div class="form-group mb-6">
            <div class="relative form-floating">
              <input name="title" type="text" value="{{old('title')}}"
                 class="form-control input-control"
                     id="name"
                     placeholder="Име на теста" required>
              <label for="title" class="text-gray-700">име на теста</label>
            </div>
            @error('title')
            <span class="block text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>

          <button type="submit" id="submit"
                  class="flex items-center justify-center button-primary w-full"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
              <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
            </svg>
            Запази
          </button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
