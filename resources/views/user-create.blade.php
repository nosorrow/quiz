<x-app-layout>
  <x-slot name="header">
    <nav class="rounded-md w-full">
      <ol class="list-reset flex">
        <li><a href="{{url()->route('user.index')}}" class="text-blue-600 hover:text-blue-700">Потребители</a></li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Нов потребител</li>
      </ol>
    </nav>
  </x-slot>
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="container py-10">
      <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md mx-auto mt-10">
        <h1 class="text-teal-500 text-xl mb-2">Нов потребител</h1>
        <form action="{{url()->route('user.store')}}" method="post">
          @csrf

          <div class="form-group mb-6">
            <div class="relative form-floating">
              <input name="name" type="text" value="{{old('name')}}"
                     class="form-control block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                     id="name"
                     placeholder="потребителско име" required>
              <label for="name" class="text-gray-700">име</label>
            </div>
            @error('name')
            <span class="block text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group mb-6">
            <div class="relative form-floating">
              <input name="email" type="email" value="{{old('email')}}"
                     class="form-control block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                     id="email"
                     placeholder="email" required>
              <label for="email" class="text-gray-700">email</label>
            </div>
            @error('email')
            <span class="block text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group mb-6">
            <div class="relative form-floating">
              <input name="password" type="text" value="{{old('password')}}"
                     class="form-control block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                     id="password"
                     placeholder="password">
              <label for="password" class="text-gray-700">парола</label>
            </div>
            @error('password')
            <span class="block text-sm text-red-500">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group mb-6">
            <div class="flex justify-center">
              <div class="mb-3 w-full">
                <select name="role"
                        class="form-select form-select-lg appearance-none
                      block
                      w-full
                      px-3
                      py-4
                      text-base
                      font-normal
                      text-gray-700
                      bg-white bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="избери роля">
                  @foreach($roles as $role)
                    <option value="{{$role->id}}" {{old('role') === (string)$role->id ? 'selected':''}}>{{$role->name}}</option>
                  @endforeach
                </select>
                @error('role')
                <span class="block text-sm text-red-500">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>

          <button type="submit" id="submit"
                  class="flex items-center justify-center
                  w-full
                  px-6
                  py-2.5
                  bg-blue-600
                  text-white
                  font-medium
                  text-xs
                  leading-tight
                  uppercase
                  rounded
                  shadow-md
                  hover:bg-blue-700 hover:shadow-lg
                  focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                  active:bg-blue-800 active:shadow-lg
                  transition
                  duration-150
                  ease-in-out"
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
