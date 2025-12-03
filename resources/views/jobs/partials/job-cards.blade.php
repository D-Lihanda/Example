@foreach ($jobs as $job)
    <a href="/jobs/{{ $job->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg mt-4">
        <div class="font-bold text-blue-500 text-sm">
            {{ $job->employer->name }}
        </div>

        <div>
            <strong>{{ $job->title }}</strong>:  
            pays {{ $job->salary }} per year.  
            Status: {{ $job->status }}
        </div>
    </a>
@endforeach
