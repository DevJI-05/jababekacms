<?php

namespace App\Filament\Resources\FooterSettings\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class FooterSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Footer')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Contact')
                            ->schema([
                                TextInput::make('phone')
                                    ->tel()
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->email()
                                    ->maxLength(255),

                                TextInput::make('address')
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),

                        Tab::make('Social Media')
                            ->schema([
                                TextInput::make('facebook_url')
                                    ->label('Facebook URL')
                                    ->url()
                                    ->maxLength(255),

                                TextInput::make('instagram_url')
                                    ->label('Instagram URL')
                                    ->url()
                                    ->maxLength(255),

                                TextInput::make('linkedin_url')
                                    ->label('LinkedIn URL')
                                    ->url()
                                    ->maxLength(255),

                                TextInput::make('youtube_url')
                                    ->label('YouTube URL')
                                    ->url()
                                    ->maxLength(255),
                            ])
                            ->columns(2),

                        Tab::make('Links')
                            ->schema([
                                Repeater::make('quick_links')
                                    ->label('Quick links')
                                    ->schema([
                                        TextInput::make('label')->required(),
                                        TextInput::make('url')->label('URL')->required(),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->addActionLabel('Add link')
                                    ->reorderable()
                                    ->collapsible()
                                    ->columnSpanFull(),

                                Repeater::make('keep_up_to_date_links')
                                    ->label('Keep up to date links')
                                    ->schema([
                                        TextInput::make('label')->required(),
                                        TextInput::make('url')->label('URL')->required(),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->addActionLabel('Add link')
                                    ->reorderable()
                                    ->collapsible()
                                    ->columnSpanFull(),

                                Repeater::make('legal_links')
                                    ->label('Bottom bar links')
                                    ->schema([
                                        TextInput::make('label')->required(),
                                        TextInput::make('url')->label('URL')->required(),
                                    ])
                                    ->columns(2)
                                    ->defaultItems(0)
                                    ->addActionLabel('Add link')
                                    ->reorderable()
                                    ->collapsible()
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Acknowledgement & Misc')
                            ->schema([
                                Textarea::make('acknowledgement_primary')
                                    ->label('Acknowledgement text (primary)')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                Textarea::make('acknowledgement_secondary')
                                    ->label('Acknowledgement text (translation)')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                TextInput::make('subscribe_label')
                                    ->label('Subscribe button label')
                                    ->maxLength(255),

                                TextInput::make('copyright_text')
                                    ->label('Copyright text')
                                    ->helperText('Leave empty to use "'.config('app.name').' © '.date('Y').'".')
                                    ->maxLength(255),
                            ])
                            ->columns(2),
                    ]),
            ]);
    }
}
