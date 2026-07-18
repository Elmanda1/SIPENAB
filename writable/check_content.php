<?php
$ch = curl_init('http://localhost:8080/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'username=admin&password=admin123');
curl_setopt($ch, CURLOPT_HEADER, true);
$resp = curl_exec($ch);
curl_close($ch);

preg_match('/ci_session=([^;]+)/', $resp, $m);
$session = $m[1] ?? '';

$ch = curl_init('http://localhost:8080/dashboard');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIE, 'ci_session=' . $session);
$html = curl_exec($ch);
curl_close($ch);

echo 'Winner: ' . (strpos($html, 'RANK #01') !== false ? 'YES' : 'NO') . "\n";
echo 'Table: ' . (strpos($html, 'Daftar Peringkat') !== false ? 'YES' : 'NO') . "\n";
echo 'Chart: ' . (strpos($html, 'Distribusi Bobot') !== false ? 'YES' : 'NO') . "\n";
echo 'LoadMore: ' . (strpos($html, 'Tampilkan Lebih Banyak') !== false ? 'YES' : 'NO') . "\n";
echo 'PHP Error: ' . (strpos($html, 'rror') !== false ? 'YES' : 'NO') . "\n";
echo 'Length: ' . strlen($html) . ' bytes' . "\n";
echo 'Has hash comment: ' . (strpos($html, '# Function') !== false ? 'YES' : 'NO') . "\n";

// Find the table section
$start = strpos($html, 'Daftar Peringkat');
if ($start !== false) {
    $section = substr($html, $start, 2000);
    echo "\n--- Table section ---\n";
    echo $section;
}
