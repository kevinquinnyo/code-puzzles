<?php
namespace kevinquinnyo\CC\Test;

use kevinquinnyo\CC\InvertVowels;
use PHPUnit\Framework\TestCase;

class InvertVowelsTest extends TestCase
{
    public function testGetPowerSet()
    {
        $set = [
            1,
            2,
            3
        ];

        $expected = [
            [],
            [1],
            [2],
            [3],
            [2, 1],
            [3, 1],
            [3, 2],
            [3, 2, 1],
        ];

        $InvertVowels = new InvertVowels('asdf');
        $powerSet = $InvertVowels->getPowerSet($set);
        sort($powerSet);

        $this->assertEquals($expected, $powerSet);
    }

    public function testGetVowelPairs()
    {
        $string = 'cruel boat';
        $InvertVowels = new InvertVowels($string);
        $expected = [
            2 => ['u', 'e'],
            7 => ['o', 'a'],
        ];

        $pairs = $InvertVowels->getVowelPairs();
        $this->assertEquals($expected, $pairs);
    }

    public function testGetPermutations()
    {
        $string = 'ROAD BOAT PHOENIX';
        $InvertVowels = new InvertVowels($string);

        $expected = [
            'ROAD BOAT PHOENIX',
            'RAOD BOAT PHOENIX',
            'ROAD BAOT PHOENIX',
            'RAOD BAOT PHOENIX',
            'ROAD BOAT PHEONIX',
            'RAOD BOAT PHEONIX',
            'ROAD BAOT PHEONIX',
            'RAOD BAOT PHEONIX',
        ];
        $permutations = $InvertVowels->getPermutations();

        $this->assertEquals($expected, $permutations);
    }

    public function testGetPermutationsWithoutOriginalString()
    {
        $string = 'ROAD BOAT PHOENIX';
        $InvertVowels = new InvertVowels($string);

        $expected = [
            'RAOD BOAT PHOENIX',
            'ROAD BAOT PHOENIX',
            'RAOD BAOT PHOENIX',
            'ROAD BOAT PHEONIX',
            'RAOD BOAT PHEONIX',
            'ROAD BAOT PHEONIX',
            'RAOD BAOT PHEONIX',
        ];

        $options['includeOriginalString'] = false;
        $permutations = array_values($InvertVowels->getPermutations($options));

        $this->assertEquals($expected, $permutations);
    }
}
