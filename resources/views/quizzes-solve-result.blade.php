<x-app-layout>
  <x-slot name="header">
    <nav class="rounded-md w-full">
      <ol class="list-reset flex">
        <li><a href="{{url()->route('quizzes.index')}}" class="text-blue-600 hover:text-blue-700">Тестове</a></li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Резултат от теста</li>
      </ol>
    </nav>
  </x-slot>

  @if(session('message'))
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
          {!!session('message')!!}
          <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    </div>
  @endif

</x-app-layout>
