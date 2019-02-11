<?php
namespace kevinquinnyo\CC;

class InvertVowels
{
    private $string;
    const VOWELS = [
        'a', 'e', 'i', 'o', 'u',
        'A', 'E', 'I', 'O', 'U',
    ];
    public function __construct(string $string)
    {
        $this->string = $string;
    }

    public function getPowerSet(array $array): array
    {
        $results= [[]]; // include empty set
        foreach ($array as $value) {
            foreach ($results as $set) {
                $results[] = array_merge(array($value), $set);
            }
        }

        return $results;
    }

    public function getVowelPairs(): array
    {
        $chars = str_split($this->string);
        $found = 0;
        foreach ($chars as $idx => $char) {
            if (in_array($char, self::VOWELS)) {
                ++$found;
                if ($found === 2) {
                    $matches[$idx - 1] = [$chars[$idx - 1], $char];
                    $found = 0;
                }
            }
        }

        return $matches;
    }

    public function getPermutations(array $options= []): array
    {
        $options += ['includeOriginalString' => true];
        $mutations = [];
        $pairs = $this->getVowelPairs();
        $powerSet = $this->getPowerSet(array_keys($pairs));
        foreach ($powerSet as $keys) {
            $mutated = $this->string;
            foreach ($keys as $key) {
                $mutated[$key] = $pairs[$key][1];
                $mutated[$key + 1]= $pairs[$key][0];
            }
            $mutations[] = $mutated;
        }

        if ($options['includeOriginalString'] === false) {
            unset($mutations[array_search($this->string, $mutations)]);
        }

        return $mutations;
    }
}
