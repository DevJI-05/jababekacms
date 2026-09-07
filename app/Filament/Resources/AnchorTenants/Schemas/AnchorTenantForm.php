<?php

namespace App\Filament\Resources\AnchorTenants\Schemas;

use Filament\Forms\Components\FileUpload;
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

class AnchorTenantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('is_anchor')->default(true),

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
                        'Otomotif' => 'Otomotif',
                        'Plastik' => 'Plastik',
                        'Tekstil' => 'Tekstil',
                        'Elektronik' => 'Elektronik',
                        'Kimia' => 'Kimia',
                        'Makanan' => 'Makanan',
                        'FMCG' => 'FMCG',
                        'Farmasi' => 'Farmasi',
                        'Gudang' => 'Gudang',
                        'Jasa' => 'Jasa',
                        'Mesin' => 'Mesin',
                        'Baja/Logam' => 'Baja/Logam',
                        'Metal Fabrication' => 'Metal Fabrication',
                        'Packaging' => 'Packaging',
                        'Trading' => 'Trading',
                        'Material Bangunan' => 'Material Bangunan',
                        'Pertanian' => 'Pertanian',
                        'Listrik' => 'Listrik',
                        'Komersil' => 'Komersil',
                        'Kosmetik' => 'Kosmetik',
                        'Migas' => 'Migas',
                        'Konstruksi' => 'Konstruksi',
                        'Others' => 'Others',
                    ])
                    ->searchable()
                    ->createOptionForm([
                        TextInput::make('value')->required(),
                    ])
                    ->createOptionUsing(fn (array $data) => $data['value'])
                    ->columnSpanFull(),

                FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->disk('public')
                    ->directory('tenants')
                    ->maxSize(4096)
                    ->required()
                    ->columnSpanFull(),

                RichEditor::make('description')
                    ->fileAttachmentsMaxSize(10240)
                    ->columnSpanFull(),

                Textarea::make('address')
                    ->rows(2)
                    ->columnSpanFull(),

                TextInput::make('estate')
                    ->label('Kawasan')
                    ->maxLength(255),

                TextInput::make('land_area')
                    ->label('Land area')
                    ->numeric()
                    ->suffix('m²'),

                Select::make('building_type')
                    ->options([
                        'Kavling' => 'Kavling',
                        'TOB' => 'TOB',
                        'SFB' => 'SFB',
                        'SIB' => 'SIB',
                    ])
                    ->searchable()
                    ->createOptionForm([
                        TextInput::make('value')->required(),
                    ])
                    ->createOptionUsing(fn (array $data) => $data['value']),

                TextInput::make('investment_country')
                    ->label('Investment country')
                    ->maxLength(255),

                Textarea::make('industry_type')
                    ->label('Industry type')
                    ->rows(2)
                    ->columnSpanFull(),

                TextInput::make('website')
                    ->url()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('sort_order')
                    ->label('Sort order')
                    ->helperText('Controls the order anchor tenants are displayed in.')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
            ]);
    }
}
