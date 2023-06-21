<div>
    <div class="mb-1 font-semibold">{{ $label }}</div>
    @foreach($optionsWithLabels as $label => $option)
        <label for="{{ $name }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $name }}" value="{{ $option }}" @checked(request($name) === $option)/>
            <span class="ml-2">{{ ucfirst($label) }}</span>
        </label>
    @endforeach
</div>
