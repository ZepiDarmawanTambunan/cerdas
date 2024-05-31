<div>
    <div class="mb-3">
        <label class="form-label">{{ $label }}</label>
        <div class="d-block">
            @foreach ($options as $option)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $option['id'] }}" value="{{ $option['value'] }}" {{ $oldValue == $option['value'] ? 'checked' : '' }} required>
                    <label class="form-check-label" for="{{ $option['id'] }}">{{ $option['label'] }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
