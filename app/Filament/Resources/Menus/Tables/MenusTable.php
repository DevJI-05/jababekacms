<?php

namespace App\Filament\Resources\Menus\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label_en')
                    ->label('Label (English)')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('label_id')
                    ->label('Label (ID)')
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('slug')
                    ->toggleable(),

                TextColumn::make('sub_menus_count')
                    ->label('Sub menus')
                    ->counts('subMenus')
                    ->badge(),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order');
    }
}
