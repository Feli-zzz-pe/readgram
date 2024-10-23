<x-layout>
    <x-slot:heading>   {{--['id']--}}
        Job from id {{ $job->id }}
    </x-slot:heading>
    

     {{-- $job['tittle'] --}}
   <h2>{{ $job->tittle }}</h2>

   <p>              {{-- $job['salary'] --}}
        This job pays {{ $job->salary }} per year.
   </p>

   @can('edit-job',$job) {{-- Step 4.2 Can | Episode 23 --}}
   <p class="mt-6">         {{-- $job['id'] --}}
        <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
   </p>
   @endcan

</x-layout>