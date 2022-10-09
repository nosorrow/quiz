<x-app-layout>
  <x-slot name="header">
    <nav class="rounded-md w-full">
      <ol class="list-reset flex">
        <li><a href="{{url()->route('quizzes.index')}}" class="text-blue-600 hover:text-blue-700">Тестове</a></li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Решава на тест</li>
      </ol>
    </nav>
  </x-slot>

@if(session('message'))
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" class="w-4 h-4 mr-2 fill-current" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
          </svg>
          {{session('message')}}
          <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    </div>
  @endif

{{--Quiz Soolve --}}
  <form method="post" action="{{route('quiz.solve', ['quiz'=>$quiz->id])}}">
    @csrf
  <div class="flex justify-center lg:px-8 !mb-10">
      <div class="w-1/2 mx-auto sm:px-6 lg:px-8 pt-3">
        <h2 class="text-xl text-gray-900 font-bold">Въпроси:</h2>
        @foreach($quiz->questions as $k=>$question)
          <div class="flex justify-start mb-2">
            <div class="block p-6 rounded-lg shadow-lg bg-white w-full">
              <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">
                {{$k+1}}) {{$question->question}}
              </h5>
              @foreach($question->options as $option)
                <div class="form-check mb-6 px-6">
                  <input class="input-radio" type="radio"
                         name="ans[{{$question->id}}]" id="{{$option->id}}" value="{{$option->id}}"
                  >
                  <label class="form-check-label inline-block text-gray-800" for="{{$option->id}}">
                    {{$option->title}}
                  </label>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
        <div>
          <button type="submit" class="button-primary">
            Запази
          </button>
        </div>
      </div>
  </div>
  </form>


</x-app-layout>
