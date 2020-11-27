@extends('layouts.master')

@section('title')
    Task Manager
@endsection()
<!-- Pagination -->

@push('scripts')
    <script>
      document.getElementById('body').onkeyup = function(e) {
        if (e.keyCode === 13) {
          document.getElementById('search').submit(); // your form has an id="form"
        }
        return true;
      }
    </script>
@endpush

@section('search')
<form id="search" action="{{ route('tasks.search') }}" method="GET">
  @csrf
  <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
  type="text"
  name="term"
  placeholder="Search Task"
  aria-label="Search" />
</form>
@endsection()

@section('content')
<div class="container grid px-6 mx-auto">

  @if ($message = Session::get('success'))

            <div class="px-6 my-6"> <div>
              <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ $message }}
                </p>
            </div>
  @endif
              <!-- With actions -->
              <div class="px-6 my-6" align="right">
                <button onclick="location.href='{{ route('tasks.create') }}'" class="flex items-center justify-between w-half px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  Create
                  <span class="ml-2" aria-hidden="true">+</span>
                </button>
              </div>

              <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                  <table class="w-full whitespace-no-wrap">
                    <thead>
                      <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                      >
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($task as $tasks)
                      <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                          <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->

                            <div>
                              <p class="font-semibold">{{$tasks->name}}</p>
                              <p class="text-xs text-gray-600 dark:text-gray-400">
                              {{$tasks->category}}
                              </p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                        {{$tasks->description}}
                        </td>
                        <td class="px-4 py-3 text-xs">
                          @if($tasks->status == 'completed')
                          <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                          >
                            Completed
                          </span>
                          @elseif($tasks->status == 'inprogress')
                          <span
                            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                          >
                            Inprogress
                          </span>
                          @else($tasks->status == 'pending')
                          <span
                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700"
                          >
                            Pending
                          </span>
                          @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                        {{\Carbon\Carbon::parse($tasks->created_at)->format('d/m/Y')}}
                        </td>
                        <td class="px-4 py-3">
                          <div class="flex items-center space-x-4 text-sm">
                            <button onclick="location.href='{{ route('tasks.edit',$tasks->id)}}'"
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                              aria-label="Edit"
                            >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                ></path>
                              </svg>
                            </button>
                            <form action="{{ route('tasks.destroy',$tasks->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                              aria-label="Delete" type="submit"
                              >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                  clip-rule="evenodd"
                                ></path>
                              </svg>
                            </button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <div
                  class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                  <span class="flex items-center col-span-3">
                    Showing
                    @if(count($task)!=0)
                    {{$task->firstItem()}}-{{$task->lastItem()}} of {{$task->total()}}
                    @endif
                  </span>
                  <span class="col-span-2"></span>
                  <!-- Pagination -->
                  <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    {{$task->links('vendor.pagination.custom')}}
                  </span>
                </div>
              </div>
            </div>
  @endsection()
