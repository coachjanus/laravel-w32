<?php

it('about test returns a successful response', function () {
    $response = $this->get('/about');

    $response->assertStatus(200);
});
