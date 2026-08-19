<?php

namespace App\Filament\Resources\CarouselSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CarouselSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Toggle::make('autoplay')
                    ->label('Autoplay')
                    ->helperText('Automatically advance to the next slide.')
                    ->default(true)
                    ->columnSpanFull(),

                TextInput::make('interval_seconds')
                    ->label('Slide interval (seconds)')
                    ->numeric()
                    ->minValue(2)
                    ->maxValue(60)
                    ->default(6)
                    ->required(),
            ]);
    }
}
