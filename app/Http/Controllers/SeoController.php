<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Tenant;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function robots(): Response
    {
        $content = <<<TEXT
        User-agent: *
        Disallow:

        Sitemap: {$this->sitemapUrl()}

        TEXT;

        return response($content, 200, ['Content-Type' => 'text/plain']);
    }

    public function sitemap(): Response
    {
        $urls = collect([
            ['loc' => route('home'), 'priority' => '1.0'],
            ['loc' => route('tenants.index'), 'priority' => '0.8'],
            ['loc' => route('articles.news'), 'priority' => '0.7'],
            ['loc' => route('articles.events'), 'priority' => '0.7'],
            ['loc' => route('carbon-tracker'), 'priority' => '0.5'],
        ]);

        Tenant::query()
            ->where('is_active', true)
            ->whereNotNull('slug')
            ->get(['slug', 'updated_at'])
            ->each(fn (Tenant $tenant) => $urls->push([
                'loc' => route('tenants.show', $tenant->slug),
                'lastmod' => $tenant->updated_at,
                'priority' => '0.6',
            ]));

        Article::query()
            ->where('is_published', true)
            ->get(['slug', 'updated_at'])
            ->each(fn (Article $article) => $urls->push([
                'loc' => route('articles.show', $article->slug),
                'lastmod' => $article->updated_at,
                'priority' => '0.6',
            ]));

        Menu::query()
            ->where('is_active', true)
            ->with([
                'subMenus' => fn ($query) => $query->where('is_active', true),
                'contents' => fn ($query) => $query->where('is_active', true),
            ])
            ->get()
            ->each(function (Menu $menu) use ($urls) {
                $urls->push(['loc' => route('menu.show', $menu->slug), 'priority' => '0.8']);

                $menu->subMenus->each(function (SubMenu $subMenu) use ($menu, $urls) {
                    $urls->push([
                        'loc' => route('menu.section.show', [$menu->slug, $subMenu->slug]),
                        'priority' => '0.7',
                    ]);

                    $subMenu->contents
                        ->where('is_active', true)
                        ->each(fn ($content) => $urls->push([
                            'loc' => route('menu.content.show', [$menu->slug, $subMenu->slug, $content->slug]),
                            'lastmod' => $content->updated_at,
                            'priority' => '0.6',
                        ]));
                });

                $menu->contents->each(fn ($content) => $urls->push([
                    'loc' => route('menu.section.show', [$menu->slug, $content->slug]),
                    'lastmod' => $content->updated_at,
                    'priority' => '0.6',
                ]));
            });

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'text/xml');
    }

    private function sitemapUrl(): string
    {
        return route('sitemap');
    }
}
