<?php
/**
 * Création du fichier de config 'config/autoload/deploy-info.local.php'
 * contenant la version courante de l'application.
 *
 * La version est obtenue grâce à git.
 */

use Zend\Config\Writer\PhpArray;

require __DIR__ . '/../vendor/autoload.php';

$OUTPUT_CONFIG_FILE = __DIR__ . '/../config/autoload/deploy-info.local.php';

function versionFromGit()
{
    $GIT_BRANCH  = 'git rev-parse --abbrev-ref HEAD';
    $GIT_VERSION = 'git --no-pager describe --tags --always';
    $GIT_COMMIT  = 'git rev-parse --verify --short=8 HEAD';

    $output = [];
    exec($GIT_BRANCH, $output, $return);
    var_dump('c');

    if ($output[0] !== 'HEAD') {
        $tag = $output[0];
    } else {
        $output = [];
        exec($GIT_VERSION, $output, $return);
        $tag = $return === 0 ? implode('', $output) : 'Version inconnue';
    }
    $output = [];
    exec($GIT_COMMIT, $output, $return);
    $commit = $return === 0 ? implode('', $output) : 'Commit inconnu';

    $version = sprintf("%s (%s)", $tag, $commit);

    return $version;
}

$version = versionFromGit();

$config = [
    'deploy-info' => [
        'about'   => sprintf("Ce fichier de config est généré par %s le %s", __FILE__, date('d/m/Y H:i:s')),
        'version' => $version,
    ],
];

$configWriter = new PhpArray();
$configWriter->setUseBracketArraySyntax(true);
$configWriter->toFile($OUTPUT_CONFIG_FILE, $config);

echo "Fichier '$OUTPUT_CONFIG_FILE' créé avec succès." . PHP_EOL;
echo "Version détectée: $version." . PHP_EOL;
