<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 2: Built-in Array Functions [6 marks]
 *
 * @author     [Tim Kiplimo]
 * @student    [ENE212-0063/2021]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [26/04/2026]
 */

// Working dataset — use this array for ALL exercises below
$scores = [72, 45, 88, 91, 63, 77, 55, 88, 49, 95, 63, 70];

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Counting & Summing
// ══════════════════════════════════════════════════════════════
// Use count() to print total number of scores
// Use array_sum() to print total marks
// Compute and print average (to 2 decimal places)

// TODO: Exercise A — your code here
echo "<h3>Exercise A — Counting & Summing</h3>";
$total_scores = count($scores); 
$total_marks = array_sum($scores);
$average = round($total_marks / $total_scores, 2);

echo "Total number of scores: $total_scores<br>";
echo "Total marks: $total_marks<br>";
echo "Average score: $average<br>";

// ══════════════════════════════════════════════════════════════
// EXERCISE B — Sorting
// ══════════════════════════════════════════════════════════════
// 1. Sort $scores ascending using sort() — print result
// 2. Sort $scores descending using rsort() — print result
// 3. Sort $scores ascending again and use array_reverse()
//    to get descending — print result
// Note: explain in a comment why sort() modifies the original array

// TODO: Exercise B — your code here
echo "<h3>Exercise B — Sorting</h3>";
/* 
 * PHP's sort() modifies the original array in place (passed by reference) 
 * instead of returning a newly created sorted array. It also drops the 
 * original keys and re-indexes the array numerically from zero.
 */
$asc_scores = $scores; 
sort($asc_scores);
echo "Ascending Sort: " . implode(", ", $asc_scores) . "<br>";

$desc_scores = $scores;
rsort($desc_scores);
echo "Descending Sort: " . implode(", ", $desc_scores) . "<br>";

$asc_reversed = $scores;
sort($asc_reversed);
$asc_reversed = array_reverse($asc_reversed);
echo "Sorted Ascending then Reversed: " . implode(", ", $asc_reversed) . "<br>";


// ══════════════════════════════════════════════════════════════
// EXERCISE C — Searching
// ══════════════════════════════════════════════════════════════
// 1. Use in_array() to check if 88 exists — print true/false
// 2. Use in_array() to check if 100 exists — print true/false
// 3. Use array_search() to find the index of 91 — print it
// 4. Use array_search() on a value that doesn't exist —
//    show how to handle the false return value safely

// TODO: Exercise C — your code here
echo "<h3>Exercise C — Searching</h3>";
echo "Contains 88? " . (in_array(88, $scores) ? 'true' : 'false') . "<br>";
echo "Contains 100? " . (in_array(100, $scores) ? 'true' : 'false') . "<br>";

$search_index = array_search(91, $scores);
// Strict inequality check is required because array_search can return 0 (a valid index)
if ($search_index !== false) {
    echo "Index of 91: $search_index<br>";
} else {
    echo "Value 91 not found.<br>";
}


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Transformation Functions
// ══════════════════════════════════════════════════════════════
// Use the original $scores array (re-declare if needed)
// 1. array_unique() — remove duplicates, print result
// 2. array_slice($scores, 2, 5) — print the slice and
//    explain what the parameters mean in a comment
// 3. implode(", ", $scores) — print as comma-separated string
// 4. array_reverse() — print reversed array

// TODO: Exercise D — your code here
echo "<h3>Exercise D — Transformation</h3>";
$unique_scores = array_unique($scores);
echo "Unique Scores: " . implode(", ", $unique_scores) . "<br>";

/* Developer Comment on array_slice:
 * Parameter '2' represents the offset (start extracting from the 3rd element).
 * Parameter '5' represents the length (extract exactly 5 elements from that offset).
 */
$sliced_scores = array_slice($scores, 2, 5);
echo "Sliced Array: " . implode(", ", $sliced_scores) . "<br>";

echo "Imploded String: " . implode(", ", $scores) . "<br>";
