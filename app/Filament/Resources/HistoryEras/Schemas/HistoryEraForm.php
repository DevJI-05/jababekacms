<?php

namespace App\Filament\Resources\HistoryEras\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HistoryEraForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label_en')
                    ->label('Label (English)')
                    ->required()
                    ->maxLength(255)
                    ->helperText('e.g. "Early Development" — shown as the era heading.')
                    ->columnSpanFull(),

                TextInput::make('label_id')
                    ->label('Label (Bahasa Indonesia)')
                    ->maxLength(255)
                    ->helperText('Optional — falls back to the English label if left empty.')
                    ->columnSpanFull(),

                TextInput::make('year_range')
                    ->label('Year range')
                    ->maxLength(255)
                    ->placeholder('1989–1996')
                    ->helperText('Shown above the label, e.g. "1989–1996".')
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),

                TextInput::make('sort_order')
                    ->label('Sort order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
