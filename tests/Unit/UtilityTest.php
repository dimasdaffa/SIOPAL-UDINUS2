<?php

// Simple function for testing
function addNumbers($a, $b) {
    return $a + $b;
}

function multiplyNumbers($a, $b) {
    return $a * $b;
}

function isEven($number) {
    return $number % 2 === 0;
}

function formatRupiah($amount) {
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

// Basic test using Pest
test('dapat menjumlahkan dua angka', function () {
    $result = addNumbers(2, 3);
    expect($result)->toBe(5);
});

// Test with multiple assertions
test('dapat mengalikan dua angka', function () {
    $result = multiplyNumbers(3, 4);
    expect($result)
        ->toBe(12)
        ->toBeGreaterThan(10)
        ->toBeLessThan(15);
});

// Test with dataset
dataset('numbers', [
    'positive' => [10, true],
    'negative' => [-4, true], // Fixed: Negative even numbers are still even
    'zero' => [0, true],
]);

test('dapat memeriksa bilangan genap', function ($number, $expected) {
    $result = isEven($number);
    expect($result)->toBe($expected);
})->with('numbers');

// Test with descriptions
describe('format rupiah', function () {
    it('menggunakan prefix "Rp"', function () {
        $formatted = formatRupiah(1000);
        expect($formatted)->toStartWith('Rp ');
    });

    it('memisahkan ribuan dengan titik', function () {
        $formatted = formatRupiah(1000000);
        expect($formatted)->toBe('Rp 1.000.000');
    });

    test('tidak menampilkan desimal', function () {
        $formatted = formatRupiah(1500);
        expect($formatted)->not->toContain(',');
    });
});

// Higher-order test
it('mengembalikan string saat memformat rupiah')
    ->expect(fn() => formatRupiah(5000))
    ->toBeString();

// Grouping related tests
test('group operasi matematika', function () {
    expect(addNumbers(5, 5))->toBe(10);
    expect(multiplyNumbers(5, 5))->toBe(25);
});
