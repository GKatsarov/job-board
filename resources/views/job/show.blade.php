<x-main-layout>

    <x-job-card :$job>
        <p class="text-sm text-slate-500 mb-4">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More "{{ $job->employer->company_name }}" Jobs
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $job)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{ route('jobs.show', $job) }}">
                                {{ $job->title }}
                            </a>
                        </div>
                        <div class="text-xs">
                            {{ $job->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-sm">
                        ${{ number_format($job->salary) }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-main-layout>
