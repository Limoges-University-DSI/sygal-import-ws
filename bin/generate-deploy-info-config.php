<?php

use Zend\Config\Writer\PhpArray;

require __DIR__ . '/../vendor/autoload.php';

$OUTPUT_CONFIG_FILE = __DIR__ . '/../config/autoload/deploy-info.local.php';

function versionFromGit()
{
    $GIT_VERSION = 'git --no-pager describe --tags --always';
    $GIT_COMMIT = 'git rev-parse --verify --short=8 HEAD';

    $output = [];
    exec($GIT_VERSION, $output, $return);
    $tag = $return === 0 ? implode('', $output) : 'Version inconnue';
    $output = [];
    exec($GIT_COMMIT, $output, $return);
    $commit = $return === 0 ? implode('', $output) : 'Commit inconnu';

    $version = sprintf("%s (%s)", $tag, $commit);

    return $version;
}

$version = versionFromGit();

$config = [
    'deploy-info' => [
        'about'   => "Ce fichier de config est généré par " . __FILE__,
        'version' => $version,
    ],
];

$configWriter = new PhpArray();
$configWriter->setUseBracketArraySyntax(true);
$configWriter->toFile($OUTPUT_CONFIG_FILE, $config);
