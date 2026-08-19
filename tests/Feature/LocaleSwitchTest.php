<?php

it('defaults to english', function () {
    $response = $this->get('/');

    $response->assertOk();
    $response->assertSee('Skip to content');
    $response->assertSee('Report it 24/7');
});

it('switches the locale to indonesian and persists it across requests', function () {
    $this->get('/lang/id')->assertRedirect();

    $response = $this->get('/');

    $response->assertOk();
    $response->assertSee('Lewati ke konten');
    $response->assertSee('Laporkan 24/7');
    $response->assertDontSee('Skip to content');
});

it('rejects an unsupported locale', function () {
    $this->get('/lang/fr')->assertNotFound();
});

it('translates the landing page content, not just the header and footer', function () {
    $this->get('/lang/id')->assertRedirect();

    $response = $this->get('/');

    $response->assertOk();
    $response->assertSee('Agenda Kegiatan');
    $response->assertSee('Berita Kami');
    $response->assertSee('Lakukan Secara Daring');
    $response->assertSee('Layanan');
    $response->assertSee('Temukan yang Terdekat dengan Anda');
    $response->assertDontSee("What's on");
    $response->assertDontSee('Our News');
});
