<?php
/**
 * ****************************************************************************
 *  - TDMPicture By TDM   - TEAM DEV MODULE FOR XOOPS
 *  - Licence PRO Copyright (c)  (http://www.tdmxoops.net)
 *
 * Cette licence, contient des limitations!!!
 *
 * 1. Vous devez posséder une permission d'exécuter le logiciel, pour n'importe quel usage.
 * 2. Vous ne devez pas l' étudier,
 * 3. Vous ne devez pas le redistribuer ni en faire des copies,
 * 4. Vous n'avez pas la liberté de l'améliorer et de rendre publiques les modifications
 *
 * @license     TDMFR PRO license
 * @author      TDMFR ; TEAM DEV MODULE
 *
 * ****************************************************************************
 */

require_once __DIR__ . '/header.php';
require_once XOOPS_ROOT_PATH . '/header.php';
$myts        = MyTextSanitizer::getInstance();
$fileHandler = xoops_getModuleHandler('file', $moduleDirName);

$post_st   = isset($_REQUEST['st']) ? $_REQUEST['st'] : false;
$post_size = isset($_REQUEST['size']) ? $_REQUEST['size'] : false;

if (empty($post_st)) {
    redirect_header('index.php', 2, _AM_TDMPICTURE_BASEERROR);
}

$document = $fileHandler->get($post_st);

if (!$document) {
    redirect_header('index.php', 2, _AM_TDMPICTURE_BASEERROR);
}

//apelle lien image
$filePaths = $document->getFilePath($document->getVar('file_file'));

if ('full' === $post_size) {
    $imagePath = $filePaths['image_path'];
} else {
    $imagePath = $filePaths['thumb_path'];
}

//on test l'existance de l'image
if (file_exists($imagePath)) {
    //$document_file = TDMPICTURE_UPLOADS_URL.$document->getVar("file_file");
    //    $document_file = $filePath2;
    if ('full' === $post_size) {
        $imageUrl = $filePaths['image_url'];
    } else {
        $imageUrl = $filePaths['thumb_url'];
    }
} else {
    redirect_header('index.php', 2, _AM_TDMPICTURE_BASEERROR);
}

$dl = $document->getVar('file_hits');
++$dl;
$document->setVar('file_hits', $dl);
$fileHandler->insert($document);

echo '<html><head><meta http-equiv="Refresh" content="0; URL=' . $imageUrl . '"></meta></head><body></body></html>';
