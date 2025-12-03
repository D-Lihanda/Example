<x-layout>
  <x-slot name="heading">
     Job 
  </x-slot>

  <h2 class="font-bold text-lg" > {{ $job->title }} </h2>
  <p>
    This job pays {{ $job->salary }} per year.
  </p>
  
    The job is status {{$job['status']}}

  <p class="mt-6" >
    <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
  </p>

</x-layout>

