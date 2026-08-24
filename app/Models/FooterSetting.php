<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'phone',
    'email',
    'address',
    'facebook_url',
    'instagram_url',
    'linkedin_url',
    'youtube_url',
    'quick_links',
    'keep_up_to_date_links',
    'legal_links',
    'subscribe_label',
    'acknowledgement_primary',
    'acknowledgement_secondary',
    'copyright_text',
])]
class FooterSetting extends Model
{
    /**
     * There is only ever one row of footer settings. Fetch (or lazily
     * create) it through this accessor rather than querying directly.
     */
    public static function current(): self
    {
        return static::query()->firstOrCreate(['id' => 1], [
            'phone' => '(08) 9439 0200',
            'email' => 'customer@kwinana.wa.gov.au',
            'address' => '11 Stidworthy Way, Kwinana Town Centre WA 6167',
            'facebook_url' => null,
            'instagram_url' => null,
            'linkedin_url' => null,
            'youtube_url' => null,
            'quick_links' => [
                ['label' => 'Online Payments', 'url' => '#'],
                ['label' => 'Make a Request', 'url' => '#'],
                ['label' => 'Submit a Rates Request', 'url' => '#'],
                ['label' => 'Provide Feedback', 'url' => '#'],
                ['label' => 'View Online Maps', 'url' => '#'],
            ],
            'keep_up_to_date_links' => [
                ['label' => 'News', 'url' => '#'],
                ['label' => 'Community Engagements', 'url' => '#'],
            ],
            'legal_links' => [
                ['label' => 'Sitemap', 'url' => '#'],
                ['label' => 'Accessibility', 'url' => '#'],
                ['label' => 'Terms and Conditions', 'url' => '#'],
                ['label' => 'Website Privacy Statement', 'url' => '#'],
                ['label' => 'Staff Portal', 'url' => '#'],
            ],
            'subscribe_label' => 'Subscribe to eNews',
        ]);
    }

    /**
     * @return array<int, array{network: string, url: string}>
     */
    public function socialLinks(): array
    {
        return collect([
            'facebook' => $this->facebook_url,
            'instagram' => $this->instagram_url,
            'linkedin' => $this->linkedin_url,
            'youtube' => $this->youtube_url,
        ])
            ->filter()
            ->map(fn (string $url, string $network) => ['network' => $network, 'url' => $url])
            ->values()
            ->all();
    }

    public function copyright(): string
    {
        return $this->copyright_text ?: config('app.name').' © '.date('Y');
    }

    /**
     * `acknowledgement_primary` is authored in English, `acknowledgement_secondary`
     * is its translation (currently always Bahasa Indonesia).
     */
    public function acknowledgement(?string $locale = null): ?string
    {
        $locale ??= app()->getLocale();

        return $locale === 'id'
            ? ($this->acknowledgement_secondary ?: $this->acknowledgement_primary)
            : ($this->acknowledgement_primary ?: $this->acknowledgement_secondary);
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'quick_links' => 'array',
            'keep_up_to_date_links' => 'array',
            'legal_links' => 'array',
        ];
    }
}
