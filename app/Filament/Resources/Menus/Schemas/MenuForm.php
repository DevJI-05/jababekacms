<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label_en')
                    ->label('Label (English)')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        if (($get('slug') ?? '') !== Str::slug($old)) {
                            return;
                        }

                        $set('slug', Str::slug($state));
                    })
                    ->columnSpanFull(),

                TextInput::make('label_id')
                    ->label('Label (Bahasa Indonesia)')
                    ->maxLength(255)
                    ->helperText('Optional — falls back to the English label if left empty.')
                    ->columnSpanFull(),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->helperText('Used in the front-end URL, e.g. /menu-slug.')
                    ->columnSpanFull(),

                TextInput::make('icon')
                    ->helperText('Optional Heroicon name, e.g. heroicon-o-building-office-2.')
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('description_en')
                    ->label('Mega menu blurb (English)')
                    ->rows(2)
                    ->columnSpanFull(),

                Textarea::make('description_id')
                    ->label('Mega menu blurb (Bahasa Indonesia)')
                    ->rows(2)
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
