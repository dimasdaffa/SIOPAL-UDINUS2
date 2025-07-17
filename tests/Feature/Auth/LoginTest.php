<?php

use Tests\TestCase;

test('halaman login melakukan redirect ke dashboard', function () {
    $response = $this->get('/login');

    $response->assertStatus(302);
    $response->assertRedirect(route('filament.admin.pages.dashboard'));
});
