<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\View\View;

class MenuPageController extends Controller
{
    /**
     * List page for a Menu: shows its Sub Menus (grouping nodes) and any
     * Content items attached directly to the menu (no sub menu).
     */
    public function show(string $menu): View
    {
        $menu = $this->findMenu($menu);

        $items = $menu->subMenus
            ->map(fn (SubMenu $subMenu) => $this->subMenuToListItem($menu, $subMenu))
            ->concat($menu->contents->map(fn (Content $content) => $this->contentToListItem($menu, $content)))
            ->sortBy('sort_order')
            ->values();

        return view('pages.listing', [
            'title' => $menu->label(),
            'description' => $menu->description(),
            'image' => null,
            'items' => $items,
            'activeNav' => $menu->slug,
            'breadcrumbs' => [
                'Home' => route('home'),
                $menu->label() => route('menu.show', $menu->slug),
            ],
        ]);
    }

    /**
     * A menu's second URL segment is either a Sub Menu (renders its list of
     * Content items) or a Content item attached directly to the menu
     * (renders that content's detail page).
     */
    public function showSection(string $menu, string $section): View
    {
        $menu = $this->findMenu($menu);

        $subMenu = SubMenu::where('menu_id', $menu->id)
            ->where('slug', $section)
            ->where('is_active', true)
            ->first();

        if ($subMenu) {
            $items = $subMenu->contents
                ->where('is_active', true)
                ->map(fn (Content $content) => $this->contentToListItem($menu, $content, $subMenu))
                ->values();

            return view('pages.listing', [
                'title' => $subMenu->label,
                'description' => $subMenu->description(),
                'buttonUrl' => $subMenu->button_url,
                'buttonLabel' => $subMenu->buttonLabel(),
                'image' => null,
                'items' => $items,
                'activeNav' => $menu->slug,
                'breadcrumbs' => [
                    'Home' => route('home'),
                    $menu->label() => route('menu.show', $menu->slug),
                    $subMenu->label => route('menu.section.show', [$menu->slug, $subMenu->slug]),
                ],
            ]);
        }

        $content = Content::where('menu_id', $menu->id)
            ->whereNull('sub_menu_id')
            ->where('slug', $section)
            ->where('is_active', true)
            ->firstOrFail();

        return $this->contentView($menu, null, $content);
    }

    /**
     * A Content item's detail page when it is nested under a Sub Menu.
     */
    public function showContent(string $menu, string $section, string $content): View
    {
        $menu = $this->findMenu($menu);

        $subMenu = SubMenu::where('menu_id', $menu->id)
            ->where('slug', $section)
            ->where('is_active', true)
            ->firstOrFail();

        $content = Content::where('sub_menu_id', $subMenu->id)
            ->where('slug', $content)
            ->where('is_active', true)
            ->firstOrFail();

        return $this->contentView($menu, $subMenu, $content);
    }

    private function findMenu(string $slug): Menu
    {
        return Menu::where('slug', $slug)
            ->where('is_active', true)
            ->with([
                'subMenus' => fn ($query) => $query->where('is_active', true),
                'contents' => fn ($query) => $query->where('is_active', true),
            ])
            ->firstOrFail();
    }

    private function subMenuToListItem(Menu $menu, SubMenu $subMenu): array
    {
        return [
            'label' => $subMenu->label,
            'description' => null,
            'image' => null,
            'icon' => $subMenu->icon,
            'sort_order' => $subMenu->sort_order,
            'href' => route('menu.section.show', [$menu->slug, $subMenu->slug]),
        ];
    }

    private function contentToListItem(Menu $menu, Content $content, ?SubMenu $subMenu = null): array
    {
        return [
            'label' => $content->title,
            'description' => $content->description(),
            'image' => $content->imageUrl(),
            'icon' => null,
            'sort_order' => $content->sort_order,
            'href' => $subMenu
                ? route('menu.content.show', [$menu->slug, $subMenu->slug, $content->slug])
                : route('menu.section.show', [$menu->slug, $content->slug]),
        ];
    }

    private function contentView(Menu $menu, ?SubMenu $subMenu, Content $content): View
    {
        $breadcrumbs = [
            'Home' => route('home'),
            $menu->label() => route('menu.show', $menu->slug),
        ];

        if ($subMenu) {
            $breadcrumbs[$subMenu->label] = route('menu.section.show', [$menu->slug, $subMenu->slug]);
        }

        $breadcrumbs[$content->title] = $subMenu
            ? route('menu.content.show', [$menu->slug, $subMenu->slug, $content->slug])
            : route('menu.section.show', [$menu->slug, $content->slug]);

        return view('pages.content-show', [
            'menu' => $menu,
            'content' => $content,
            'activeNav' => $menu->slug,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
