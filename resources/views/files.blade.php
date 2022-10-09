<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Управление на файлове
    </h2>
  </x-slot>
  @if ($errors->any())
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>
                - {{ $error }}
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  @endif
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
  @can('isAdmin')
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{url('files')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="flex justify-between">
              <input type="file" name="file" class="form-control input-file">
              <button type="submit" class="button-primary">
                <i class="fa-solid fa-cloud-arrow-up mx-2 text-base"></i>
                качи файл
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endcan
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-3">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="border-b">
                    <tr>
                      <th scope="col" class="text-base font-medium text-blue-500 px-6 py-4 text-left">
                        #
                      </th>
                      <th scope="col" class="text-base font-medium text-blue-500 px-6 py-4 text-left">
                        Файл
                      </th>
                      <th scope="col" class="text-base font-medium text-blue-500 px-6 py-4 text-left">
                        Качен от
                      </th>
                      <th scope="col" class="text-base font-medium text-blue-500 px-6 py-4 text-left">
                        Дата
                      </th>
                      <th scope="col" class="text-base font-medium text-blue-500 px-6 py-4 text-left">
                        Редакция
                      </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $file)
                        <tr class="border-b">
                          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                          <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <a href="{{Storage::url($file->path)}}">
                              {{$file->name}} <br>
                              <span class="text-xs">{{$file->path}}</span>
                            </a>
                          </td>
                          <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{$file->user->name}}
                          </td>
                          <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{$file->created_at->format('d.n.Y')}}
                          </td>
                          <td class="flex justify-around text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            @can('isAdmin')
                              @php
                                $file_hash = last(explode("/",$file->path))
                              @endphp
                              <form method="POST" action="/files/{{$file_hash}}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="button-danger delete-file" style="font-size: 1rem">
                                  <i class="fa-regular fa-trash-can"></i>
                                </button>
                              </form>
                            @endcan
                            <a class="button-success" style="font-size: 1rem"
                               href="{{Storage::url($file->path)}}">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                          </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="module">
      $('.delete-file').click(function(e){
          e.preventDefault()
          if (confirm('Ще изтрием ли този файл?')) {
              // Post the form
              $(e.target).closest('form').submit();
          }
      });
  </script>
</x-app-layout>
