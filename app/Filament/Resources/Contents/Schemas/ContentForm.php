<?php

namespace App\Filament\Resources\Contents\Schemas;

use App\Models\Menu;
use App\Models\SubMenu;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ContentForm
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
                    ->live()
                    ->afterStateUpdated(fn (Set $set) => $set('sub_menu_id', null))
                    ->columnSpanFull(),

                Select::make('sub_menu_id')
                    ->label('Sub menu')
                    ->helperText('Optional — leave empty to show this content directly on the menu\'s page.')
                    ->options(fn (Get $get) => SubMenu::query()
                        ->where('menu_id', $get('menu_id'))
                        ->orderBy('sort_order')
                        ->pluck('label', 'id'))
                    ->searchable()
                    ->disabled(fn (Get $get) => blank($get('menu_id')))
                    ->columnSpanFull(),

                TextInput::make('title')
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
                        modifyRuleUsing: fn ($rule, Get $get) => $rule->where(function ($query) use ($get) {
                            $query->where('menu_id', $get('menu_id'));

                            $get('sub_menu_id')
                                ? $query->where('sub_menu_id', $get('sub_menu_id'))
                                : $query->whereNull('sub_menu_id');
                        }),
                    )
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('contents')
                    ->maxSize(10240)
                    ->columnSpanFull(),

                Textarea::make('description_en')
                    ->label('Description (English)')
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('description_id')
                    ->label('Description (Bahasa Indonesia)')
                    ->rows(3)
                    ->columnSpanFull(),

                Repeater::make('urls')
                    ->label('Links')
                    ->schema([
                        TextInput::make('label')
                            ->required(),
                        TextInput::make('url')
                            ->label('URL')
                            ->url()
                            ->required(),
                    ])
                    ->columns(2)
                    ->defaultItems(0)
                    ->addActionLabel('Add link')
                    ->reorderable()
                    ->collapsible()
                    ->columnSpanFull(),

                RichEditor::make('body')
                    ->label('Detail page content')
                    ->fileAttachmentsMaxSize(10240)
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
