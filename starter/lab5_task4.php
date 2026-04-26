<?php
/**
 * ICS 2371 — Lab 5: Arrays and Array Operations
 * Task 4: Engineering Analysis Using Arrays & Loops [6 marks]
 *
 * IMPORTANT: Pseudocode AND flowchart required in PDF report
 * before writing code.
 *
 * @author     [Tim Kiplimo]
 * @student    [ENE212-0063/2021]
 * @lab        Lab 5 of 14
 * @unit       ICS 2371
 * @date       [26/04/2026]
 */

// ── Scenario: Bridge Load Sensor Analysis ────────────────────
// A bridge has 8 load sensors recording weight in tonnes.
// Analyse the readings to support a structural safety report.

$sensor_readings = [12.4, 8.7, 15.2, 19.8, 7.3, 14.6, 11.9, 16.3];
$sensor_labels   = ["S1", "S2", "S3", "S4", "S5", "S6", "S7", "S8"];
$max_safe_load   = 18.0; // tonnes — safety threshold

// ── STEP 1: Basic statistics ─────────────────────────────────
// Compute WITHOUT using array_sum(), max(), min() PHP functions
// Use loops only:
//   $mean   — average of all readings (2 decimal places)
//   $max    — highest reading + which sensor
//   $min    — lowest reading + which sensor
//   $total  — sum of all readings

// TODO: Step 1 — your code here
function generateBridgeReport($readings, $labels, $max_safe_load, $dataset_name) {
    echo "<h3>Dataset: $dataset_name</h3>";
    $n = count($readings);
    
    // Step 1: Basic Statistics
    $total = 0;
    $max = $readings[0];
    $min = $readings[0];
    $max_sensor = $labels[0];
    $min_sensor = $labels[0];
    
    for ($i = 0; $i < $n; $i++) {
        $val = $readings[$i];
        $total += $val;
        
        if ($val > $max) {
            $max = $val;
            $max_sensor = $labels[$i];
        }
        if ($val < $min) {
            $min = $val;
            $min_sensor = $labels[$i];
        }
    }
    
    $mean = $total / $n;
    echo "<strong>Step 1: Statistics</strong><br>";
    echo "Total Load: {$total}t | Mean: " . round($mean, 2) . "t<br>";
    echo "Max: {$max}t (Sensor $max_sensor) | Min: {$min}t (Sensor $min_sensor)<br><br>";


// ── STEP 2: Above-average count ──────────────────────────────
// Count how many sensors recorded ABOVE the mean.
// Store their labels in an $above_avg array.
// Print: "X of 8 sensors recorded above-average load"
// Print the list of those sensor labels.

// TODO: Step 2 — your code here
    $above_avg = [];
    for ($i = 0; $i < $n; $i++) {
        if ($readings[$i] > $mean) {
            $above_avg[] = $labels[$i];
        }
    }
    echo "<strong>Step 2: Above-Average Validation</strong><br>";
    echo count($above_avg) . " of $n sensors recorded above-average load.<br>";
    echo "Sensors: " . implode(", ", $above_avg) . "<br><br>";


// ── STEP 3: Safety threshold check ───────────────────────────
// Check each sensor against $max_safe_load (18.0 tonnes)
// If reading > $max_safe_load: flag as "UNSAFE"
// Otherwise: "SAFE"
// Print a formatted safety report table:
//   Sensor | Reading | Status
//   S1     | 12.4t   | SAFE
//   S4     | 19.8t   | UNSAFE  ← flag clearly

// TODO: Step 3 — your code here
    echo "<strong>Step 3: Raw Safety Check</strong><br>";
    echo "<pre>Sensor | Reading | Status\n-------------------------</pre>";
    for ($i = 0; $i < $n; $i++) {
        $status = ($readings[$i] > $max_safe_load) ? "UNSAFE" : "SAFE";
        echo "<pre>" . str_pad($labels[$i], 6) . " | " . str_pad(number_format($readings[$i], 1), 7) . " | $status</pre>";
    }
    echo "<br>";


// ── STEP 4: Sorted safety report ─────────────────────────────
// Sort the sensor readings in DESCENDING order using your
// bubble sort from Task 3 (copy the function here).
// Print the sorted readings alongside their original sensor labels.
// Note: you must track which label belongs to which reading
// as you sort — use a parallel array technique.

// TODO: Step 4 — your code here
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($readings[$j] < $readings[$j + 1]) {
                // Swap readings
                $temp_val = $readings[$j];
                $readings[$j] = $readings[$j + 1];
                $readings[$j + 1] = $temp_val;
                
                // Swap labels
                $temp_label = $labels[$j];
                $labels[$j] = $labels[$j + 1];
                $labels[$j + 1] = $temp_label;
            }
        }
    }
    
    echo "<strong>Step 4: Sorted Safety Report</strong><br>";
    echo "<pre>Sensor | Reading\n-----------------</pre>";
    for ($i = 0; $i < $n; $i++) {
        echo "<pre>" . str_pad($labels[$i], 6) . " | " . number_format($readings[$i], 1) . "</pre>";
    }
    echo "<hr>";
}

$max_safe_load = 18.0;

// Dataset A: Default
$readings_a = [12.4, 8.7, 15.2, 19.8, 7.3, 14.6, 11.9, 16.3];
$labels_a   = ["S1", "S2", "S3", "S4", "S5", "S6", "S7", "S8"];
generateBridgeReport($readings_a, $labels_a, $max_safe_load, "Default Dataset");

// Dataset B: All Safe
$readings_b = [5.1, 5.8, 5.2, 5.5, 5.3, 5.7, 5.6, 5.4];
$labels_b   = ["S1", "S2", "S3", "S4", "S5", "S6", "S7", "S8"];
generateBridgeReport($readings_b, $labels_b, $max_safe_load, "All Safe Dataset [5.1...5.8]");

// Dataset C: All Unsafe
$readings_c = [20.1, 21.3, 19.9, 22.0, 18.5, 20.8, 19.2, 21.7];
$labels_c   = ["S1", "S2", "S3", "S4", "S5", "S6", "S7", "S8"];
generateBridgeReport($readings_c, $labels_c, $max_safe_load, "All Unsafe Dataset");


// ── Required Test Data Sets — screenshot each ────────────────
// Set A (default above): expect S4 UNSAFE, mean ~13.28t
// Set B: [5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8]
//        → all SAFE, mean 5.45t, above-avg = 4 sensors
// Set C: [20.1, 21.3, 19.9, 22.0, 18.5, 20.8, 19.2, 21.7]
//        → all UNSAFE (all exceed 18.0t)
