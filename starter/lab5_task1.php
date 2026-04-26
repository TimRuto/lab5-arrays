<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 1: Array Declaration, Initialisation & Traversal [6 marks]
 *
 * @author     [Tim Kiplimo]
 * @student    [ENE212-0063/2021]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [26/04/2026]
 */

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Indexed Array: Sensor Readings
// ══════════════════════════════════════════════════════════════
// Declare an indexed array $temperatures with 6 float values:
// 36.5, 37.1, 38.4, 36.9, 39.2, 37.8
// 1. Print the array using print_r()
// 2. Access and print the 3rd and 5th elements by index
// 3. Traverse using a for loop — print each value with its index:
//    "Reading [0]: 36.5°C"
// 4. Traverse using foreach — same output format

// TODO: Exercise A — your code here
echo "<h3>Exercise A — Indexed Array: Sensor Readings</h3>";
$temperatures = [36.5, 37.1, 38.4, 36.9, 39.2, 37.8];
echo "<pre>"; print_r($temperatures); echo "</pre>";

echo "3rd element: " . $temperatures[2] . "<br>";
echo "5th element: " . $temperatures[4] . "<br><br>";

echo "<strong>For Loop Traversal:</strong><br>";
for ($i = 0; $i < count($temperatures); $i++) {
    echo "Reading [{$i}]: {$temperatures[$i]}°C<br>";
}

echo "<br><strong>Foreach Loop Traversal:</strong><br>";
foreach ($temperatures as $index => $temp) {
    echo "Reading [{$index}]: {$temp}°C<br>";
}

// ══════════════════════════════════════════════════════════════
// EXERCISE B — Associative Array: Student Record
// ══════════════════════════════════════════════════════════════
// Declare an associative array $student with keys:
// "name", "reg_number", "course", "year", "gpa"
// Use your own details as values.
// 1. Print the full array with print_r()
// 2. Access and print name and gpa individually
// 3. Traverse with foreach (key => value) and print:
//    "name: Jane Wanjiku"
//    "reg_number: SCT212-0001/2024"  etc.

// TODO: Exercise B — your code here
echo "<h3>Exercise B — Associative Array: Student Record</h3>";
$student = [
    'name' => 'Tim',
    'reg_number' => '[ENE212-0063/2021]',
    'course' => 'Electronics and Computer Engineering',
    'year' => '[3RD]',
    'gpa' => '[3.75]'
];
echo "<pre>"; print_r($student); echo "</pre>";

foreach ($student as $key => $value) {
    // Formatting the key for cleaner output
    echo ucfirst(str_replace('_', ' ', $key)) . ": $value<br>";
}


// ══════════════════════════════════════════════════════════════
// EXERCISE C — Array Modification
// ══════════════════════════════════════════════════════════════
// Start with: $fruits = ["mango", "banana", "avocado"];
// 1. Add "pawpaw" using array_push()
// 2. Add "guava" using the [] syntax
// 3. Print the array after each addition
// 4. Remove the last element using array_pop() — print result
// 5. Remove "banana" using unset() — print result
// 6. Print count() before and after each modification

// TODO: Exercise C — your code here
echo "<h3>Exercise C — Array Modification</h3>";
$fruits = ["mango", "banana", "avocado"];
echo "Initial count: " . count($fruits) . "<br>";

array_push($fruits, "pawpaw");
echo "Count after array_push (added pawpaw): " . count($fruits) . " | Array: " . implode(", ", $fruits) . "<br>";

$fruits[] = "guava";
echo "Count after [] syntax (added guava): " . count($fruits) . " | Array: " . implode(", ", $fruits) . "<br>";

array_pop($fruits);
echo "Count after array_pop (removed guava): " . count($fruits) . " | Array: " . implode(", ", $fruits) . "<br>";

unset($fruits[1]); // "banana" is at index 1
echo "Count after unset (removed banana): " . count($fruits) . " | Array: " . implode(", ", $fruits) . "<br>";


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Nested Array
// ══════════════════════════════════════════════════════════════
// Declare a nested associative array $lab_results with
// at least 3 students, each having: name, cat_total, exam
// Traverse with nested foreach and print a formatted
// result for each student showing name and total marks.

// TODO: Exercise D — your code here
echo "<h3>Exercise D — Nested Array</h3>";
$lab_results = [
    ['name' => 'Alice', 'cat_total' => 25, 'exam' => 60],
    ['name' => 'Bob', 'cat_total' => 18, 'exam' => 55],
    ['name' => 'Charlie', 'cat_total' => 28, 'exam' => 68]
];

foreach ($lab_results as $result) {
    $total = $result['cat_total'] + $result['exam'];
    echo "Student: {$result['name']} | CAT: {$result['cat_total']} | Exam: {$result['exam']} | Total Score: $total<br>";
}
