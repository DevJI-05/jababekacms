<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\ToggleButtons;

/**
 * A visual grid picker for the Heroicon (outline) names stored on Menu and
 * SubMenu records. Curated to the icons this CMS actually needs — building
 * types, city life, business, and common UI concepts — rather than exposing
 * the full multi-hundred Heroicon set.
 */
class IconPicker extends ToggleButtons
{
    /**
     * @var array<string, string>
     */
    public const ICONS = [
        'heroicon-o-home' => 'Home',
        'heroicon-o-building-office' => 'Office',
        'heroicon-o-building-office-2' => 'Office Building',
        'heroicon-o-building-library' => 'Civic / Library',
        'heroicon-o-building-storefront' => 'Storefront',
        'heroicon-o-briefcase' => 'Briefcase',
        'heroicon-o-user-group' => 'User Group',
        'heroicon-o-users' => 'Users',
        'heroicon-o-academic-cap' => 'Education',
        'heroicon-o-heart' => 'Community',
        'heroicon-o-shopping-bag' => 'Shopping',
        'heroicon-o-truck' => 'Logistics',
        'heroicon-o-globe-alt' => 'Global',
        'heroicon-o-map' => 'Map',
        'heroicon-o-map-pin' => 'Location',
        'heroicon-o-phone' => 'Phone',
        'heroicon-o-envelope' => 'Email',
        'heroicon-o-calendar' => 'Calendar',
        'heroicon-o-calendar-days' => 'Events',
        'heroicon-o-newspaper' => 'News',
        'heroicon-o-currency-dollar' => 'Investment',
        'heroicon-o-chart-bar' => 'Growth',
        'heroicon-o-shield-check' => 'Security',
        'heroicon-o-sparkles' => 'Highlight',
        'heroicon-o-sun' => 'Sustainability',
        'heroicon-o-bolt' => 'Utilities',
        'heroicon-o-wrench-screwdriver' => 'Facilities',
        'heroicon-o-wifi' => 'Connectivity',
        'heroicon-o-camera' => 'Gallery',
        'heroicon-o-photo' => 'Photo',
        'heroicon-o-video-camera' => 'Video',
        'heroicon-o-star' => 'Featured',
        'heroicon-o-book-open' => 'History',
        'heroicon-o-clipboard-document-list' => 'Regulations',
        'heroicon-o-cog-6-tooth' => 'Services',
        'heroicon-o-information-circle' => 'Information',
        'heroicon-o-check-circle' => 'Achievement',
        'heroicon-o-flag' => 'Milestone',
        'heroicon-o-light-bulb' => 'Innovation',
        'heroicon-o-rocket-launch' => 'Future Development',
        'heroicon-o-scale' => 'Legal',
        'heroicon-o-computer-desktop' => 'Technology',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->options(self::ICONS)
            ->icons(array_combine(array_keys(self::ICONS), array_keys(self::ICONS)))
            ->tooltips(self::ICONS)
            ->hiddenButtonLabels()
            ->columns(8);
    }
}
