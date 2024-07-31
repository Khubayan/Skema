<?php

// Check the app has homepage
it('Has a Homepage', function () {
    $response = $this->get('/');

    $response->assertStatus(404); //The app doesn't have home page so we expect 404
});
