# code-puzzles

## Challenge #1:
Find every permutation of a string where every repeating vowel pair is reversed.

Example:

Given 'road boat phoenix', you should return an array with values:
```
'road baot phoenix', // 1
'road boat phoenix', // 2
'road boat pheonix', // 3
'raod baot phoenix', // 1,2
'raod boat pheonix', // 1,3
'road baot pheonix', // 2,3
'raod baot pheonix', // 1,2,3
```
The numbers above represent the vowel pair that has been changed.  In the first line, only the first vowel pair was reversed. In the second line, only the second, 3rd line, only the third.  In the fourth line, the first and second were reversed, etc.

Vowels are defined as `'a, 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'`.
