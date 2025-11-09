<?php
$prices = [
    "Amazon" => 5000,
    "Flipkart" => 4500,
    "eBay" => 4800,
    "Snapdeal" => 5200
];
echo "<h3>PRICE COMPARISON</h3>";
foreach ($prices as $seller => $price) {
    echo "$seller: Rs. " . number_format($price) . "<br>";
}
$highest_price = max($prices);
$lowest_price = min($prices);

$highest_seller = array_search($highest_price, $prices);
$lowest_seller = array_search($lowest_price, $prices);
$average_price = array_sum($prices) / count($prices);
$savings = $highest_price - $lowest_price;

echo "<br><strong>Statistics:</strong><br>";
echo "Highest Price: Rs. " . number_format($highest_price) . " ($highest_seller)<br>";
echo "Lowest Price: Rs. " . number_format($lowest_price) . " ($lowest_seller)<br>";
echo "Average Price: Rs. " . number_format($average_price) . "<br>";
echo "Savings: Rs. " . number_format($savings) . " (if you buy from $lowest_seller)<br>";
asort($prices);
echo "<br><strong>Sorted by Price (Low to High):</strong><br>";
foreach ($prices as $seller => $price) {
    echo "$seller: Rs. " . number_format($price) . "<br>";
}
?>
