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
<div class="container flex flex-col items-center px-6 mx-auto">
            <svg
              class="w-12 h-12 mt-8 text-purple-200"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                fill-rule="evenodd"
                d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                clip-rule="evenodd"
              ></path>
            </svg>
            <h1 class="text-6xl font-semibold text-gray-700 dark:text-gray-200">
              404
            </h1>
            <p class="text-gray-700 dark:text-gray-300">
              Page not found. Go back to
              <a
                class="text-purple-600 hover:underline dark:text-purple-300"
                href="/"
              >
                Dashboard
              </a>
              .
            </p>
          </div>
@endsection()
