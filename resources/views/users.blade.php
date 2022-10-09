<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Преглед на потребители
    </h2>
  </x-slot>

  @if(session('alert'))
    <div class="container py-6 md:p-6 w-full lg:w-9/12">
      <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i> {{session('alert')}}
      </div>
    </div>
  @endif
  @if(session('success'))
    <div class="container py-6 md:p-6 w-full lg:w-9/12">
      <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3">
        <i class="fa-solid fa-triangle-exclamation"></i> {{session('success')}}
      </div>
    </div>
  @endif
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
      <div class="container py-6 md:p-6">
        <div class="mx-auto flex justify-between mb-3 w-full">
          <h1 class="mb-6 text-xl">Потребители</h1>
          @can('isAdmin')
            <a href="{{url()->route('user.create')}}"
               class="button-success flex justify-around items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
              </svg>
              добави
            </a>
          @endcan
        </div>
        <div class="flex justify-center w-full mb-3">
          <div class="w-full p-6 rounded-lg shadow-lg bg-white">
            {{-- Table--}}
            <div class="flex flex-col">
              <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                    <table class="min-w-full">
                      <thead class="border-b border-b-gray-300">
                      <tr>
                        <th scope="col" class="text-base font-medium text-blue-500 px-6 py-4 text-left">
                          #
                        </th>
                        <th scope="col" class="capitalize text-base font-medium text-blue-500 px-6 py-4 text-left">
                          потребител
                        </th>

                        <th scope="col" class="capitalize text-base font-medium text-blue-500 px-6 py-4 text-left">
                          email
                        </th>
                        <th scope="col" class="capitalize text-base font-medium text-blue-500 px-6 py-4 text-left">
                          роля
                        </th>
                        <th scope="col" class="capitalize text-base font-medium text-blue-500 px-6 py-4 text-left">
                        </th>
                        <th scope="col" class="capitalize text-base font-medium text-blue-500 px-6 py-4 text-left">
                        </th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($users as $user)
                        <tr class="bg-white border-b border-b-gray-300">
                          <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800">
                            {{$user->id}}
                          </td>
                          <td class="text-base text-gray-800 font-normal px-6 py-4 whitespace-nowrap">
                            {{$user->name}}
                          </td>
                          <td class="text-base text-gray-800 font-normal px-6 py-4 whitespace-nowrap">
                            {{$user->email}}
                          </td>
                          <td class="text-base text-gray-800 font-normal px-6 py-4 whitespace-nowrap">
                            {{$user->role->name}}
                          </td>
                          <td class="text-sm text-gray-800 font-normal px-6 py-4 whitespace-nowrap">
                            @can('isAdmin')
                              <a href="{{url()->route('user.edit', [$user->id])}}"
                                 class="flex justify-center items-center button-success"
                              >
                                <i class="fa-solid fa-user-pen text-base"></i>
                              </a>
                            @endcan
                          </td>
                          <td class="text-sm text-gray-800 font-normal px-6 py-4 whitespace-nowrap">
                            @can('isAdmin')
                              @if($user->id !== 1)
                                <form method="post" id="frm{{$user->id}}"
                                      action="{{url()->route('user.destroy', [$user->id])}}"
                                >
                                  @csrf
                                  @method('delete')
                                  <button type="button" onclick= "sweetAlert('{{$user->id}}')"
                                          class="inline-block button-danger"
                                  >
                                    <i class="fa-solid fa-trash-can text-base"></i>
                                  </button>
                                </form>
                              @endif
                            @endcan
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            {{-- /Table --}}
          </div>
        </div>
      </div>

    </div>
  </div>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
      function sweetAlert(id){
          event.preventDefault();
         const form = document.getElementById("frm"+id);
          swal({
              title: "",
              text: "Ще изтрием ли този потребител?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          }).then(val => {
              if (val) form.submit();
          });
      }
  </script>

</x-app-layout>
