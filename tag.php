<?php
$tags = ["PHP", "Web Development", "Programming", "MySQL", "Backend"];
echo "Tags as array: [\"" . implode('", "', $tags) . "\"]<br><br>";
$tagString = implode(", ", $tags);
echo "Tags as string: $tagString<br><br>";
$tagArray = explode(", ", $tagString);
if (in_array("PHP", $tagArray)) {
    echo "\"PHP\" tag exists<br>";
} else {
    echo "\"PHP\" tag not found<br>";
}

if (in_array("JavaScript", $tagArray)) {
    echo "\"JavaScript\" tag exists<br>";
} else {
    echo "\"JavaScript\" tag not found<br>";
}
sort($tagArray);
echo "<br>Sorted tags: " . implode(", ", $tagArray) . "<br>";
echo "Total tags: " . count($tagArray);
?>
