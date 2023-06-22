<x-card class="mb-4">
    <div class="flex justify-between">
        <h2 class="text-lg font-medium underline decoration-green-500"><a href="{{route('jobs.show', $job)}}">{{$job->title}}</a></h2>
        <div class="text-slate-500">${{number_format($job->salary)}}</div>
    </div>

    <div class="mb-4 flex items-center justify-between text-sm text-slate-500 text-sla">
        <div class="flex flex-col">
            <div>Company Name: {{ $job->employer->company_name }}</div>
            <div>Location: {{ $job->location }}</div>
        </div>
        <div class="flex items-center text-xs space-x-1">
            <x-tag>
                <a href="{{ route('jobs.index', ['experience'=>$job->experience]) }}">
                    {{ Str::ucfirst($job->experience) }}
                </a>
            </x-tag>
            <x-tag>
                <a href="{{ route('jobs.index', ['category'=>$job->category]) }}">
                    {{ $job->category }}
                </a>
            </x-tag>
        </div>
    </div>

    {{ $slot }}
</x-card>
