<?php

namespace CodeWithDiki\FilamentMoney\Forms\Components;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\TextInput;

class Money extends TextInput
{
    protected string $view = 'filament-money::forms.components.money';
}