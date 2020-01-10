<div class="custom-inputs-stacked">

    @foreach ($fieldType->getOptions() as $key => $value)
        @if (is_array($value))
            <p>
                <strong>{{ $key }}</strong>

                @foreach ($value as $key => $value)
                <label class="{#custom-control#} custom-checkbox" style="display: block;">
                    <input
                            type="checkbox"
                            value="{{ $value }}"
                            name="{{ $fieldType->getInputName() }}[]"
                            {{-- {!! html_attributes($fieldType->getAttributes()) !!} --}}
                            {{-- {{ $fieldType->getReadonly() ? 'onclick="return false;"' }} --}}
                            {{-- {{ value in field_type.config.disabled ? 'disabled' }} --}}
                            {{-- {{ value in field_type.config.checked ? 'checked' }} --}}
                            {{-- {{ value in field_type.value ? 'checked' }} --}}
                            >

                    <span class="{!! $value !!}"></span>

                    {!! $key !!}
                </label>
                @endforeach
            </p>
        @else
            <label class="{#custom-control#} custom-checkbox" style="display: block;">
                <input
                        type="checkbox"
                        value="{{ $value }}"
                        name="{{ $fieldType->getInputName() }}[]"
                        {{-- {!! html_attributes($fieldType->getAttributes()) !!} --}}
                        {{-- {{ value in field_type.config.disabled ? 'disabled' }}
                        {{ value in field_type.value ? 'checked' }} --}}
                        >

                <span class="{!! $key !!}">{!! $value !!}</span>
            </label>
        @endif
    @endforeach

</div>
