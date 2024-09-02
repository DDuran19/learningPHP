<?php

use Core\Container;

test('it can resolve something out of the container', function () {
    // expect(true)->toBeTrue();

    // arrange

    $container = new Container();

    $container->bind('foo', fn() => 'bar');
    $result = $container->resolve('foo');

    // assert/expect

    expect($result)->toEqual('bar');
});
