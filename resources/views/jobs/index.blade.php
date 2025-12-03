<x-layout>
  <x-slot name="heading">
     Job Listings in a Column
  </x-slot>

  <div class="space-y-4">
    {{-- FILTER SECTION --}}
  <div class="mb-4 flex gap-4">
      <input type="text" id="filter-title" placeholder="Title" class="border p-2 rounded">
      <input type="text" id="filter-salary" placeholder="Salary" class="border p-2 rounded">
      <select id="filter-status" class="border p-2 rounded">
          <option value="">All Status</option>
          <option value="open">Open</option>
          <option value="closed">Closed</option>
      </select>
      <button id="filter-btn" class="px-4 py-2 bg-green-600 text-white rounded">Filter</button>
  </div>
  <div id="job-list">
  @foreach ($jobs as $job)
      <!-- href allow the array of jobs to be clickable  -->
      <a href="/jobs/{{ $job['id'] }}" class=" block px-4 py-6 border border-gray-200 rounded-lg">
        <div class="font-bold text-blue-500 text-sm" >
          {{ $job->employer->name }}
        </div>
        <div>
          <strong>{{$job['title']}}</strong>: pays {{$job['salary']}} per year. The job status is {{$job['status']}}
        </div>
      </a>
   
  @endforeach
    </div>
  <div>
    {{ $jobs->links() }}
  </div>
</div>



<div>
   @if ($jobs->hasMorePages())
    <button id="load-more"
            data-next-page="2"
            class="px-4 py-2 bg-blue-600 text-white mt-4 rounded">
        Load More
    </button>
@endif

  </div>

<script>
document.getElementById('load-more').addEventListener('click', function () {
    let button = this;
    let nextPage = button.dataset.nextPage;

    fetch(`/jobs/load-more?page=${nextPage}`)
        .then(res => res.text())
        .then(html => {
            document.getElementById('job-list').insertAdjacentHTML('beforeend', html);
            button.dataset.nextPage = parseInt(nextPage) + 1;

            if (html.trim() === '') {
                button.remove();
            }
        });
});

  // FILTER JOBS
  document.getElementById('filter-btn').addEventListener('click', function () {
      let title = document.getElementById('filter-title').value;
      let salary = document.getElementById('filter-salary').value;
      let status = document.getElementById('filter-status').value;

      fetch(`/jobs/filter?title=${title}&salary=${salary}&status=${status}`)
          .then(res => res.text())
          .then(html => {
              document.getElementById('job-list').innerHTML = html;
              
              // reset Load More button
              const loadMoreBtn = document.getElementById('load-more');
              if(loadMoreBtn) loadMoreBtn.dataset.nextPage = 2;
          });
  });
  </script>



</x-layout>

