<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = Category::updateOrCreate(
            ['slug' => 'news'],
            ['name' => 'News', 'is_event' => false, 'sort_order' => 1, 'is_active' => true],
        );

        $events = Category::updateOrCreate(
            ['slug' => 'events'],
            ['name' => 'Events', 'is_event' => true, 'sort_order' => 2, 'is_active' => true],
        );

        $tags = collect(['Council', 'Community', 'Environment', 'Business'])
            ->mapWithKeys(fn (string $name) => [$name => Tag::updateOrCreate(['slug' => Str::slug($name)], ['name' => $name])]);

        $articles = [
            [
                'category' => $news,
                'title' => 'New partnership to transform early childhood outcomes in Kwinana',
                'excerpt' => 'The City of Kwinana and Minderoo Foundation have today announced a $4 million partnership to transform early childhood development outcomes and create lasting change for children and families in Kwinana.',
                'tags' => ['Council', 'Community'],
                'published_at' => now()->subDays(9),
            ],
            [
                'category' => $news,
                'title' => 'Kwinana leading WA in small business growth',
                'excerpt' => "The City of Kwinana has been recognised as one of Western Australia's fastest-growing small business communities, ranking second in the State for percentage growth over the past five years.",
                'tags' => ['Business'],
                'published_at' => now()->subDays(11),
            ],
            [
                'category' => $news,
                'title' => "Balanced budget adopted to build Kwinana's future",
                'excerpt' => 'The City of Kwinana Council adopted its 2026/27 Annual Budget at a Special Council Meeting, delivering continued investment in essential services, asset renewal and infrastructure for the City\'s growing community.',
                'tags' => ['Council'],
                'published_at' => now()->subDays(31),
            ],
            [
                'category' => $events,
                'title' => 'RESCHEDULED City Centre Community Clean Up Day',
                'excerpt' => "Join us in keeping the City Centre beautiful and learn how the City's Waste Team can support you in Adopting A Spot!",
                'tags' => ['Community', 'Environment'],
                'event_date' => now()->addDays(1),
                'published_at' => now()->subDays(1),
            ],
            [
                'category' => $events,
                'title' => 'Darius Block Walk',
                'excerpt' => 'Celebrate World Pedestrian Day with a relaxed, interactive walk around the block—from Chisham Ave to Darius Drive.',
                'tags' => ['Community'],
                'event_date' => now()->addDays(3),
                'published_at' => now()->subDays(1),
            ],
            [
                'category' => $events,
                'title' => 'Cafe Connect - Dementia awareness',
                'excerpt' => 'Offering a safe and compassionate space for like-minded people to come together, connect, learn and heal.',
                'tags' => ['Community'],
                'event_date' => now()->addDays(4),
                'published_at' => now()->subDays(1),
            ],
        ];

        foreach ($articles as $data) {
            $tagNames = $data['tags'];
            unset($data['tags']);
            $category = $data['category'];
            unset($data['category']);

            $article = Article::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    ...$data,
                    'category_id' => $category->id,
                    'is_published' => true,
                ],
            );

            $article->tags()->sync($tags->only($tagNames)->map->id);
        }
    }
}
