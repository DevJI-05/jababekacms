<?php

use App\Models\Content;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows the menu list page with its sub menus and direct content', function () {
    $menu = Menu::factory()->create(['label_en' => 'Property and Pets', 'slug' => 'property-and-pets']);
    SubMenu::factory()->for($menu)->create(['label' => 'Rates and Property Details', 'slug' => 'rates-and-property-details', 'is_active' => true]);
    SubMenu::factory()->for($menu)->create(['label' => 'Hidden Sub Menu', 'is_active' => false]);
    Content::factory()->for($menu)->create(['title' => 'Community Support', 'is_active' => true, 'sub_menu_id' => null]);

    $response = $this->get('/property-and-pets');

    $response->assertOk();
    $response->assertSee('Property and Pets');
    $response->assertSee('Rates and Property Details');
    $response->assertSee('Community Support');
    $response->assertDontSee('Hidden Sub Menu');
});

it('shows the sub menu list page with its content items', function () {
    $menu = Menu::factory()->create(['slug' => 'property-and-pets']);
    $subMenu = SubMenu::factory()->for($menu)->create(['label' => 'Rates and Property Details', 'slug' => 'rates-and-property-details']);
    Content::factory()->for($menu)->for($subMenu, 'subMenu')->create(['title' => 'About Your Rates', 'description_en' => 'Everything about rates.']);
    Content::factory()->for($menu)->for($subMenu, 'subMenu')->create(['title' => 'Hidden Content', 'is_active' => false]);

    $response = $this->get('/property-and-pets/rates-and-property-details');

    $response->assertOk();
    $response->assertSee('Rates and Property Details');
    $response->assertSee('About Your Rates');
    $response->assertSee('Everything about rates.');
    $response->assertDontSee('Hidden Content');
});

it('shows the sub menu description above its content items', function () {
    $menu = Menu::factory()->create(['slug' => 'property-and-pets']);
    $subMenu = SubMenu::factory()->for($menu)->create([
        'label' => 'Rates and Property Details',
        'slug' => 'rates-and-property-details',
        'description_en' => '<p>Everything you need to know about rates.</p>',
    ]);
    Content::factory()->for($menu)->for($subMenu, 'subMenu')->create(['title' => 'About Your Rates']);

    $response = $this->get('/property-and-pets/rates-and-property-details');

    $response->assertOk();
    $response->assertSee('Everything you need to know about rates.');
    $response->assertSee('About Your Rates');
});

it('falls back to the English sub menu description when Indonesian is missing', function () {
    app()->setLocale('id');

    $menu = Menu::factory()->create(['slug' => 'property-and-pets']);
    SubMenu::factory()->for($menu)->create([
        'slug' => 'rates-and-property-details',
        'description_en' => '<p>English only description.</p>',
        'description_id' => null,
    ]);

    $response = $this->get('/property-and-pets/rates-and-property-details');

    $response->assertOk();
    $response->assertSee('English only description.');

    app()->setLocale('en');
});

it('shows only the sub menu description when it has no content items', function () {
    $menu = Menu::factory()->create(['slug' => 'property-and-pets']);
    SubMenu::factory()->for($menu)->create([
        'slug' => 'rates-and-property-details',
        'description_en' => '<p>Description only, no content yet.</p>',
    ]);

    $response = $this->get('/property-and-pets/rates-and-property-details');

    $response->assertOk();
    $response->assertSee('Description only, no content yet.');
    $response->assertDontSee('Content for this section is coming soon.');
});

it('shows the coming soon placeholder when a sub menu has neither description nor content', function () {
    $menu = Menu::factory()->create(['slug' => 'property-and-pets']);
    SubMenu::factory()->for($menu)->create(['slug' => 'rates-and-property-details']);

    $response = $this->get('/property-and-pets/rates-and-property-details');

    $response->assertOk();
    $response->assertSee('Content for this section is coming soon.');
});

it('shows a generated button when the sub menu has a button url', function () {
    $menu = Menu::factory()->create(['slug' => 'property-and-pets']);
    SubMenu::factory()->for($menu)->create([
        'slug' => 'rates-and-property-details',
        'button_url' => 'https://example.com/rates-portal',
        'button_label_en' => 'Go to rates portal',
    ]);

    $response = $this->get('/property-and-pets/rates-and-property-details');

    $response->assertOk();
    $response->assertSee('Go to rates portal');
    $response->assertSee('https://example.com/rates-portal', false);
});

it('defaults the sub menu button label to "Learn more" when not set', function () {
    $menu = Menu::factory()->create(['slug' => 'property-and-pets']);
    SubMenu::factory()->for($menu)->create([
        'slug' => 'rates-and-property-details',
        'button_url' => 'https://example.com/rates-portal',
    ]);

    $response = $this->get('/property-and-pets/rates-and-property-details');

    $response->assertOk();
    $response->assertSee('Learn more');
});

it('does not show a button when the sub menu has no button url', function () {
    $menu = Menu::factory()->create(['slug' => 'property-and-pets']);
    SubMenu::factory()->for($menu)->create(['slug' => 'rates-and-property-details']);

    $response = $this->get('/property-and-pets/rates-and-property-details');

    $response->assertOk();
    $response->assertDontSee('!w-auto mb-8 px-5 py-2.5', false);
});

it('shows the nested content detail page with its body, description and links', function () {
    $menu = Menu::factory()->create(['slug' => 'property-and-pets']);
    $subMenu = SubMenu::factory()->for($menu)->create(['slug' => 'rates-and-property-details']);
    Content::factory()->for($menu)->for($subMenu, 'subMenu')->create([
        'title' => 'About Your Rates',
        'slug' => 'about-your-rates',
        'description_en' => 'Everything about rates.',
        'urls' => [['label' => 'Rates Fact Sheet', 'url' => 'https://example.com/fact-sheet']],
        'body' => '<p>Full article content.</p>',
    ]);

    $response = $this->get('/property-and-pets/rates-and-property-details/about-your-rates');

    $response->assertOk();
    $response->assertSee('About Your Rates');
    $response->assertSee('Everything about rates.');
    $response->assertSee('Rates Fact Sheet');
    $response->assertSee('Full article content.');
});

it('shows content attached directly to a menu without a sub menu', function () {
    $menu = Menu::factory()->create(['slug' => 'community']);
    Content::factory()->for($menu)->create([
        'title' => 'Community Support',
        'slug' => 'community-support',
        'sub_menu_id' => null,
        'body' => '<p>Support services content.</p>',
    ]);

    $response = $this->get('/community/community-support');

    $response->assertOk();
    $response->assertSee('Community Support');
    $response->assertSee('Support services content.');
});

it('404s for an unknown menu', function () {
    $this->get('/does-not-exist')->assertNotFound();
});

it('404s for an inactive menu', function () {
    Menu::factory()->create(['slug' => 'hidden-menu', 'is_active' => false]);

    $this->get('/hidden-menu')->assertNotFound();
});

it('404s for an unknown section under a valid menu', function () {
    Menu::factory()->create(['slug' => 'property-and-pets']);

    $this->get('/property-and-pets/does-not-exist')->assertNotFound();
});

it('404s for an unknown content under a valid sub menu', function () {
    $menu = Menu::factory()->create(['slug' => 'property-and-pets']);
    SubMenu::factory()->for($menu)->create(['slug' => 'rates-and-property-details']);

    $this->get('/property-and-pets/rates-and-property-details/does-not-exist')->assertNotFound();
});
