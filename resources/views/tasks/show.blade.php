@extends('layouts.master')

@section('title')
    Task Manager
@endsection()

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
      document.getElementById('body').onkeyup = function(e) {
        if (e.keyCode === 13) {
          document.getElementById('search').submit(); // your form has an id="form"
        }
        return true;
      }
    </script>
    <script>
      $(':radio,:checkbox').click(function(){
      return false;
      });
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
      <div class="container px-6 mx-auto grid">
        <div class="px-6 my-6"></div>
          <!-- General elements -->
          <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Name</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                value= "{{ $task->name }}" name ="name" readonly="true"
              />
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Category</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                value= "{{ $task->category }}" name ="category" readonly="true"
              />
            </label>

            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Task Status
                </span>
                <div class="mt-2">
                  <label
                    class="inline-flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="status"
                      value="pending"
                      readonly="true"
                      {{ ($task->status=="pending")? "checked" : "" }}
                    />
                    <span class="ml-2">Pending</span>
                  </label>
                  <label
                    class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="status"
                      value="inprogress"
                      readonly="true"
                      {{ ($task->status=="inprogress")? "checked" : "" }}
                    />
                    <span class="ml-2">Inprogress</span>
                  </label>

                  <label
                    class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="status"
                      value="completed"
                      readonly="true"
                      {{ ($task->status=="completed")? "checked" : "" }}
                    />
                    <span class="ml-2">Completed</span>
                  </label>
                </div>
              </div>


            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Description</span>
              <textarea
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3"
                name ="description"
                readonly="true"
              >{{ $task->description }}</textarea>
            </label>

            <div class="flex mt-6 text-sm" float="left">
              <button onclick="location.href='{{ url()->previous() }}'" type="button" class="flex items-center justify-between w-half px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Back
              </button>
            </div>
          </div>
      </div>

@endsection()
