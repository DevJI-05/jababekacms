<?php

namespace App\Filament\Resources\Tenants\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TenantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('is_anchor')->default(false),

                TextInput::make('name')
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
                    ->unique(ignoreRecord: true)
                    ->columnSpanFull(),

                Select::make('category')
                    ->options([
                        'Consumer Goods' => 'Consumer Goods',
                        'Technology' => 'Technology',
                        'Pharmacy' => 'Pharmacy',
                        'Warehouse' => 'Warehouse',
                        'Chemical' => 'Chemical',
                        'Food' => 'Food',
                        'Automotive' => 'Automotive',
                        'Plastic' => 'Plastic',
                        'Textile' => 'Textile',
                    ])
                    ->searchable()
                    ->createOptionForm([
                        TextInput::make('value')->required(),
                    ])
                    ->createOptionUsing(fn (array $data) => $data['value'])
                    ->helperText('Used as the filter tab this tenant appears under.')
                    ->columnSpanFull(),

                RichEditor::make('description')
                    ->fileAttachmentsMaxSize(10240)
                    ->columnSpanFull(),

                Textarea::make('address')
                    ->rows(2)
                    ->columnSpanFull(),

                TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('website')
                    ->url()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
            ]);
    }
}
