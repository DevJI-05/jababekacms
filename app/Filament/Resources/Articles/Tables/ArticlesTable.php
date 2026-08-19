<?php

namespace App\Filament\Resources\Articles\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('')
                    ->disk('public')
                    ->square(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->sortable(),

                TextColumn::make('tags.name')
                    ->label('Tags')
                    ->badge()
                    ->color('gray')
                    ->separator(','),

                TextColumn::make('event_date')
                    ->label('Event date')
                    ->dateTime()
                    ->placeholder('—')
                    ->sortable(),

                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                TextColumn::make('published_at')
                    ->label('Published at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name'),
                TernaryFilter::make('is_published')
                    ->label('Published'),
            ])
            ->defaultSort('published_at', 'desc');
    }
}
