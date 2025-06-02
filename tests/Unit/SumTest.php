<?php

// php artisan test --filter=SumTest

test('sum', function () {
    // $result = sum(1, 2);
    $result = 1 + 2;

    expect($result)->toBe(3);
});

// it('performs sums', function () {
//     $result = sum(1, 2);

//     expect($result)->toBe(3);
// });

// describe('sum', function () {
//     it('may sum integers', function () {
//         $result = sum(1, 2);

//         expect($result)->toBe(3);
//         // expect($result)->toBeFalse(3);
//         // expect($result)->toContain(3);
//     });

//     it('may sum floats', function () {
//         $result = sum(1.5, 2.5);

//         expect($result)->toBe(4.0);
//     });
// });

// test('sum', function () {
//     $result = sum(1, 2);

//     $this->assertSame(3, $result); // Same as expect($result)->toBe(3)
// });
