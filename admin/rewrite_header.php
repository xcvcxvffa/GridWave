<?php
$content = file_get_contents(__DIR__ . '/includes/header.php');

$replacements = [
    'src="src/images/user/owner.jpg"' => 'src="<?= htmlspecialchars($_SESSION[\'user_data\'][\'avatar\'] ?: \'src/images/user/owner.jpg\') ?>"',
    'Musharof' => '<?= htmlspecialchars($_SESSION[\'user_data\'][\'first_name\'] ?: \'User\') ?>',
    'Musharof Chowdhury' => '<?= htmlspecialchars(($_SESSION[\'user_data\'][\'first_name\'] ?? \'\') . \' \' . ($_SESSION[\'user_data\'][\'last_name\'] ?? \'\')) ?>',
    'randomuser@pimjo.com' => '<?= htmlspecialchars($_SESSION[\'user_data\'][\'email\'] ?? \'\') ?>'
];

$content = str_replace(array_keys($replacements), array_values($replacements), $content);

file_put_contents(__DIR__ . '/includes/header.php', $content);
echo "Rewrote header.php\n";
