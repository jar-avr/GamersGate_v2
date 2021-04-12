<!DOCTYPE html>
<html lang="en">
<body>

<?php
$txt = "PHP";
$x = 3;
$y = 19.2;
echo "<h2>I'm gonna code with $txt!</h2><br>";
echo "<h2>$x + $y = " .($x + $y), '</h2>';

$a = 'txt';
echo '<h2>', $$a, '</h2>';

echo '<br><br>';
$parts = array("CPU"=>200, "GPU"=>350, "RAM"=>80);
foreach($parts as $x => $x_value) {
    echo '<h2>', $x . " costs " . $x_value . " dollars.</h2>";
    echo "<br>";
}

$sentence = 'Combat is a blend of turn-based strategy and fierce card duelling.';
$words = explode(' ', $sentence);
echo "<h2>First and last words from sentence: $words[0] ", end($words), '</h2>';
echo '<h2>The whole sentence: ', implode(' ', $words), '</h2>';

$a = 5;
$b = 5;
if ($a === $b) {
    echo "<h2>$a === $b</h2>";
} elseif ($a == $b) {
    echo "<h2>$a == $b</h2>";
} else {
    echo "<h2>$a != $b</h2>";
}

$c = 2;
echo '<h2>', $c ?? $a, '</h2>';
?>

</body>
</html>