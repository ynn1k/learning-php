<?php

use Core\Validator;

it('validates a string with a minimum length ', function () {
    $result = Validator::string('foobar', 6);
    expect($result)->toBeTrue();
});

it('validates an email ', function () {
    expect(Validator::email('foobar'))->toBeFalse()
        ->and(Validator::email('foo@bar.mail'))->toBeTrue();
});