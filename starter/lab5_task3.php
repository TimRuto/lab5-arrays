<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 3: Bubble Sort & Linear Search [7 marks]
 *
 * IMPORTANT: You must write pseudocode AND a flowchart for BOTH
 * the bubble sort and linear search in your PDF report BEFORE
 * writing any code below.
 *
 * @author     [Tim Kiplimo]
 * @student    [ENE212-0063/2021]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [26/04/2026]
 */

// Working dataset
$data = [64, 34, 25, 12, 22, 11, 90, 47, 55, 38];

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Manual Bubble Sort (ascending)
// ══════════════════════════════════════════════════════════════
// Implement bubble sort WITHOUT using PHP's sort() function.
// Use nested for loops.
// Rules:
//   - Outer loop: runs (n-1) times
//   - Inner loop: compares adjacent pairs
//   - Swap if left > right using a $temp variable
//   - Print the array after EACH full outer pass to show progress
//
// Expected: [11, 12, 22, 25, 34, 38, 47, 55, 64, 90]
//
// After sorting, answer in a comment:
// Q: How many comparisons does bubble sort make for n=10 elements
//    in the worst case? Show your working.

// TODO: Exercise A — Bubble Sort — your code here
$data = [64, 34, 25, 12, 22, 11, 90, 47, 55, 38];

echo "<h3>Exercise A — Bubble Sort</h3>";
/* Developer Comment:
 * In the worst-case scenario (an array sorted in reverse), the inner loop 
 * makes comparisons based on the formula: n(n-1)/2. 
 * For n=10, worst-case comparisons = 10 * 9 / 2 = 45 comparisons.
 */
$data_a = $data;
$n = count($data_a);

for ($i = 0; $i < $n - 1; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
        if ($data_a[$j] > $data_a[$j + 1]) {
            $temp = $data_a[$j];
            $data_a[$j] = $data_a[$j + 1];
            $data_a[$j + 1] = $temp;
        }
    }
    echo "Pass " . ($i + 1) . ": " . implode(", ", $data_a) . "<br>";
}


// ══════════════════════════════════════════════════════════════
// EXERCISE B — Optimised Bubble Sort
// ══════════════════════════════════════════════════════════════
// Modify your bubble sort to use a $swapped flag.
// If no swaps occur in a full pass, the array is already sorted
// — break early. This is the optimised version.
// Test it on an already-sorted array and show it exits early.

// TODO: Exercise B — Optimised Bubble Sort — your code here
echo "<h3>Exercise B — Optimised Bubble Sort</h3>";
$sorted_data = [1, 2, 3, 4, 5];
$n_opt = count($sorted_data);

for ($i = 0; $i < $n_opt - 1; $i++) {
    $swapped = false;
    for ($j = 0; $j < $n_opt - $i - 1; $j++) {
        if ($sorted_data[$j] > $sorted_data[$j + 1]) {
            $temp = $sorted_data[$j];
            $sorted_data[$j] = $sorted_data[$j + 1];
            $sorted_data[$j + 1] = $temp;
            $swapped = true;
        }
    }
    if (!$swapped) {
        echo "Early exit triggered at pass " . ($i + 1) . "! The array is already sorted.<br>";
        break;
    }
}


// ══════════════════════════════════════════════════════════════
// EXERCISE C — Linear Search
// ══════════════════════════════════════════════════════════════
// Implement a linear search function:
//   linearSearch(array $arr, $target): int|false
// Returns the INDEX of $target if found, false if not found.
// Do NOT use in_array() or array_search() — implement manually.
//
// Test with:
//   linearSearch($data, 22)  → should return index 4 (original array)
//   linearSearch($data, 99)  → should return false
//
// Print clearly: "Found 22 at index 4" or "99 not found"

// TODO: Exercise C — Linear Search — your code here
echo "<h3>Exercise C — Linear Search</h3>";
function linearSearch(array $arr, $target) {
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] === $target) {
            return $i; // Return the index
        }
    }
    return false;
}

$test22 = linearSearch($data, 22);
echo "linearSearch(\$data, 22) returned: " . ($test22 !== false ? "Index $test22" : "false") . "<br>";

$test99 = linearSearch($data, 99);
echo "linearSearch(\$data, 99) returned: " . ($test99 !== false ? "Index $test99" : "false") . "<br>";


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Sort then Search
// ══════════════════════════════════════════════════════════════
// 1. Sort $data using your bubble sort from Exercise A
// 2. Run linearSearch() on the sorted array for value 47
// 3. In a comment, explain: after sorting, has the index of 47
//    changed compared to the original array? Why does this matter?

// TODO: Exercise D — your code here
echo "<h3>Exercise D — Sort then Search</h3>";
/* Developer Comment:
 * Does the index of 47 change after sorting? 
 * Yes. In the original array, 47 is at index 7. In the sorted array, it moves to index 6.
 * Why this matters: In real-world processing, if arrays act as parallel data stores 
 * (e.g., array A holds IDs, array B holds scores), sorting one without parallel 
 * sorting the other permanently breaks the relational mapping between the two datasets.
 */
$sorted_data_result = $data_a; // Sorted from Exercise A
$search_sorted = linearSearch($sorted_data_result, 47);
echo "linearSearch(\$sorted_data, 47) returned: Index $search_sorted<br>";
