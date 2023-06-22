<x-main-layout>
    <x-job-card :$job />

    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your Job Application
        </h2>

        <form action="{{ route('jobs.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label for="expected_salary" :required="true">Expected Salary</x-label>
                <x-text-input-sm type="number" name="expected_salary"/>
            </div>

            <div class="mb-4">
                <x-label for="cv" :required="true">Upload CV</x-label>
                <x-text-input-sm type="file" name="cv"></x-text-input-sm>
            </div>

            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-main-layout>
