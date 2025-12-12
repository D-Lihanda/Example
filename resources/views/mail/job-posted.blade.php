{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}

<h2>
  {{$job->title}} Job Posted Successfully!
</h2>

<p>
  congratulation for posting a new job!
</p>

<p>
  <a href="{{url('/jobs/' . $job->id)}}" >View Your Job Listing</a>
</p>
