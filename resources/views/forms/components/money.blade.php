@php
    use Filament\Forms\Components\TextInput\Actions\HidePasswordAction;
    use Filament\Forms\Components\TextInput\Actions\ShowPasswordAction;

    $fieldWrapperView = $getFieldWrapperView();
    $extraAttributeBag = $getExtraAttributeBag();
    $id = $getId();
    $isConcealed = $isConcealed();
    $isDisabled = $isDisabled();
    $statePath = $getStatePath();

    $inputAttributes = $getExtraInputAttributeBag()
        ->merge([
            'autofocus' => $isAutofocused(),
            'disabled' => $isDisabled,
            'id' => $id,
            'inputmode' => $getInputMode(),
            'max' => (! $isConcealed) ? $getMaxValue() : null,
            'maxlength' => (! $isConcealed) ? $getMaxLength() : null,
            'min' => (! $isConcealed) ? $getMinValue() : null,
            'minlength' => (! $isConcealed) ? $getMinLength() : null,
            'readonly' => $isReadOnly(),
            'required' => $isRequired() && (! $isConcealed),
            'type' => "text",
            $applyStateBindingModifiers('wire:model') => $statePath,
        ], escape: false)
        ->class([
            'w-full pr-10',
        ]);

@endphp

<x-dynamic-component
    :component="$fieldWrapperView"
    :field="$field"
    :inline-label-vertical-alignment="\Filament\Support\Enums\VerticalAlignment::Center"
>
    <x-filament::input.wrapper
        :disabled="$isDisabled"
        :valid="! $errors->has($statePath)"
        :attributes="
            \Filament\Support\prepare_inherited_attributes($extraAttributeBag)
                ->class(['fi-fo-text-input'])
        "
    >
        <div x-data="{ 
            state: $wire.$entangle('name'),
            formattedValue(value) {
                let options = { style: 'currency', currency: '{{ config('filament-money.currency', 'USD') }}', minimumFractionDigits: {{ config('filament-money.decimal_places', 2) }}, maximumFractionDigits: {{ config('filament-money.decimal_places', 2) }} };
                return new Intl.NumberFormat('en-US', options).format(value.replace(/[^0-9.-]+/g,''));
            },
            formatValue(htmlTag) {
                let options = { style: 'currency', currency: '{{ config('filament-money.currency', 'USD') }}', minimumFractionDigits: {{ config('filament-money.decimal_places', 2) }}, maximumFractionDigits: {{ config('filament-money.decimal_places', 2) }} };
                htmlTag.value = new Intl.NumberFormat('en-US', options).format(htmlTag.value.replace(/[^0-9.-]+/g,''));
                this.state = htmlTag.value.replace(/[^0-9.-]+/g,'');
            }
        }">
            <input x-model="state" style="display: none;" />
            <input {{ $inputAttributes->class(['fi-input']) }}
                @blur="formatValue($el)"
                :value="formattedValue($el.value)"
                @focus="$el.value = $el.value.replace(/[^0-9.-]+/g,'')">
        </div>
    </x-filament::input.wrapper>
</x-dynamic-component>