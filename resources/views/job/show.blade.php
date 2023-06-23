<x-main-layout>

    <x-job-card :$job>
        <p class="text-sm text-slate-500 mb-4">
            {!! nl2br(e($job->description)) !!}
        </p>
        @auth
            @can('apply',$job)
                <x-link-button class="w-full justify-center" :href="route('jobs.application.create', $job)">
                    Apply
                </x-link-button>
            @else
                <div class="text-center text-sm font-medium text-slate-500">
                    You have already applied for this job.
                </div>
            @endcan
        @endauth
        @guest
            <div class="text-center text-sm font-medium text-slate-500">
                <a class="underline decoration-green-500" href="{{ route('login') }}">Login to apply for this job.</a>
            </div>
        @endguest
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More jobs from "{{ $job->employer->company_name }}"
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $job)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div class="text-slate-600 underline decoration-slate-400">
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
