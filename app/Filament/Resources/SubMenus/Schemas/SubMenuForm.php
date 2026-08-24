<?php

namespace App\Filament\Resources\SubMenus\Schemas;

use App\Models\Menu;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class SubMenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('menu_id')
                    ->label('Menu')
                    ->options(fn () => Menu::query()->orderBy('sort_order')->pluck('label_en', 'id'))
                    ->searchable()
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('label')
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

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(
                        ignoreRecord: true,
                        modifyRuleUsing: fn ($rule, Get $get) => $rule->where('menu_id', $get('menu_id')),
                    )
                    ->columnSpanFull(),

                TextInput::make('icon')
                    ->helperText('Optional Heroicon name, e.g. heroicon-o-home.')
                    ->maxLength(255)
                    ->columnSpanFull(),

                RichEditor::make('description_en')
                    ->label('Description (English)')
                    ->helperText('Optional — shown above this sub menu\'s content list. Leave empty to show only the content.')
                    ->fileAttachmentsMaxSize(10240)
                    ->columnSpanFull(),

                RichEditor::make('description_id')
                    ->label('Description (Bahasa Indonesia)')
                    ->helperText('Optional — falls back to the English description if left empty.')
                    ->fileAttachmentsMaxSize(10240)
                    ->columnSpanFull(),

                TextInput::make('button_url')
                    ->label('Button URL')
                    ->url()
                    ->maxLength(255)
                    ->helperText('Optional — shows a button linking to this URL. Leave empty to hide the button.')
                    ->columnSpanFull(),

                TextInput::make('button_label_en')
                    ->label('Button label (English)')
                    ->maxLength(255)
                    ->helperText('Optional — defaults to "Learn more".')
                    ->columnSpanFull(),

                TextInput::make('button_label_id')
                    ->label('Button label (Bahasa Indonesia)')
                    ->maxLength(255)
                    ->helperText('Optional — falls back to the English label, then "Learn more".')
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
