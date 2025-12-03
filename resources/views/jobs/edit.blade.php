<x-layout>
  <x-slot name="heading">
     Edit Job: {{ $job->title }}
  </x-slot>

<form method="POST" action="/jobs/{{$job->id}}">
  @csrf
  @method('PATCH')

  <div class="space-y-12">
    <div class="border-b border-white/10 pb-12">

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="title" class="block text-sm/6 font-medium text-white">Title</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
              <input 
              id="title" 
              type="text" 
              name="title" 
              class="block min-w-0 grow bg-transparent py-1.5 px-3 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" 
              placeholder="Shift Leader" 
              Value="{{ $job->title }}"
              required>
            </div>

            @error('title')
              <p class="mt-2 text-xs text-red-600 font-semibold">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="sm:col-span-4">
          <label for="salary" class="block text-sm/6 font-medium text-white">Salary</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
              <input 
              id="salary" 
              type="text" 
              name="salary" 
              class="block min-w-0 grow bg-transparent py-1.5 px-3 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" 
              placeholder="$50,000 per Year" 
              value="{{ $job->salary }}"
              required >
            </div>

              @error('salary')
              <p class="mt-2 text-xs text-red-600 font-semibold">{{ $message }}</p>
            @enderror

          </div>

        <div class="sm:col-span-4 mt-10 ">
          <label for="salary" class="block text-sm/6 font-medium text-white">Status</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
              <input 
              id="status" 
              type="text" 
              name="status" 
              class="block min-w-0 grow bg-transparent py-1.5 px-3 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" 
              placeholder="open/closed" 
              value="{{ $job->status }}"
              required >
            </div>

            @error('status')
              <p class="mt-2 text-xs text-red-600 font-semibold">{{ $message }}</p>
            @enderror

          </div>
        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-between gap-x-6">
    <div class="flex items-center" >
      <button form="delete-form" class="text-red-500 text-sm font-boldi">Delete</button>
    </div>
    <div class="flex items-center gap-x-6" >
        <a href="/jobs/{{$job->id}}" type="button" class="text-sm/6 font-semibold text-white">Cancel</a>
        <div>
          <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
          Update
        </button>
        </div>
    </div>
  </div>
</form>

<form method="POST" action="/jobs/{{$job->id}}" id="delete-form" class="hidden">
  @csrf 
  @method('DELETE')

</form>

</x-layout>

