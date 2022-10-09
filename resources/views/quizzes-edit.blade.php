<x-app-layout>
  <x-slot name="header">
    <nav class="rounded-md w-full">
      <ol class="list-reset flex">
        <li><a href="{{url()->route('quizzes.index')}}" class="text-blue-600 hover:text-blue-700">Тестове</a></li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Управление на тест</li>
      </ol>
    </nav>
  </x-slot>

  <!-- Modal -->
  <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
       id="questionModal" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
      <div
              class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
        <div
                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
          <h5 class="text-xl font-medium leading-normal text-gray-800" id="questionModalLabel">Нов въпрос</h5>
          <button type="button"
                  class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                  data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{route('questions.store')}}">
          @csrf
          <input name="quiz_id" type="hidden" value="{{$quiz->id}}">
        <div class="modal-body relative p-4">
{{--          Modal body text goes here.--}}

            <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                <label for="newQuestion" class="form-label inline-block mb-2 text-gray-700 font-bold"
                >Въпрос</label
                >
                <textarea name="question" required
                        class="form-control input-textarea"
                        id="newQuestion"
                        rows="3"
                        placeholder="въпрос"
                ></textarea>
              </div>
            </div>
            <hr class="my-3">
            <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                <label for="questionOption1" class="form-label inline-block mb-2 text-gray-700"
                >Опция</label
                >
                <textarea name="question_option[0]" required
                    class="form-control input-textarea"
                    id="questionOption1"
                    rows="3"
                    placeholder="опция 1"
                ></textarea>
                <div class="form-check">
                  <input class="input-radio" type="radio" name="correct" id="radio1" value="0">
                  <label class="form-check-label inline-block text-gray-800" for="radio1">
                    Верен отговор
                  </label>
                </div>
              </div>
            </div>
            <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                <label for="questionOption2" class="form-label inline-block mb-2 text-gray-700"
                >Опция</label
                >
                <textarea name="question_option[1]" required
                        class="form-control input-textarea"
                        id="questionOption2"
                        rows="3"
                        placeholder="опция 2"
                ></textarea>
                <div class="form-check">
                  <input class="input-radio" type="radio" name="correct" id="radio2" value="1">
                  <label class="form-check-label inline-block text-gray-800" for="radio2">
                    Верен отговор
                  </label>
                </div>
              </div>
            </div>
            <div class="flex justify-center">
              <div class="mb-3 xl:w-96">
                <label for="questionOption2" class="form-label inline-block mb-2 text-gray-700"
                >Опция</label
                >
                <textarea name="question_option[2]"
                        class="form-control input-textarea"
                        id="questionOption2"
                        rows="3"
                        placeholder="опция 3"
                ></textarea>
                <div class="form-check">
                  <input class="input-radio" type="radio" name="correct" id="radio3" value="2">
                  <label class="form-check-label inline-block text-gray-800" for="radio3">
                    Верен отговор
                  </label>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
          <button type="button" class="px-6 py-2.5 button-secondary"
                  data-bs-dismiss="modal"
          >Излез
          </button>
          <button type="submit"
                class="px-6 py-2.5 ml-1 button-primary"
          >Запази
          </button>
        </div>
        </form>
      </div>
    </div>
  </div>

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
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-3">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="flex justify-between">
            <div>
              <p class="text-sm">Име на теста:</p>
              <span class="text-base font-bold">{{$quiz->title}}</span>
            </div>
            <div>
              <a href="#" class="button-primary"
                 data-bs-toggle="modal" data-bs-target="#questionModal"
              >
                добави въпрос
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
{{--List options--}}
  <div class="flex justify-center lg:px-8">
    <div class="w-1/2 mx-auto sm:px-6 lg:px-8 pt-3">
      <h2 class="text-xl text-gray-900 font-bold">Въпроси:</h2>
      @foreach($quiz->questions as $k=>$question)
        <div class="flex justify-start mb-2">
          <div class="block p-6 rounded-lg shadow-lg bg-white w-full">
            <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">
             {{$k+1}}) {{$question->question}}
            </h5>
            <ol class="list-decimal px-12">
              @foreach($question->options as $option)
                <li class="text-gray-700 text-base mb-4">
                  {{$option->title}} {{$option->correct === 1 ? '(вярно)' : ''}}
                </li>
              @endforeach
            </ol>
{{--            <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Button</button>--}}
          </div>
        </div>
      @endforeach
    </div>
    <div class="w-1/2 mx-auto sm:px-6 lg:px-8 pt-3">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

        </div>
      </div>
    </div>
  </div>

</x-app-layout>
