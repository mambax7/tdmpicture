<?php

use Xmf\Module\Admin;

/**
 * ****************************************************************************
 *  - TDMCreate By TDM   - TEAM DEV MODULE FOR XOOPS
 *  - Licence GPL Copyright (c)  (http://xoops.org)
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @license     TDM GPL license
 * @author      TDM TEAM DEV MODULE
 *
 * ****************************************************************************
 */

$moduleDirName = basename(dirname(__DIR__));
include_once __DIR__ . '/../../../include/cp_header.php';
include_once __DIR__ . '/../class/utilities.php';
include_once __DIR__ . '/../include/common.php';
//require __DIR__ . '/../class/utilities.php';
include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH . '/class/tree.php';
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';

global $xoopsModule;
$pathIcon16      = \Xmf\Module\Admin::iconUrl('', 16);
$pathIcon32      = \Xmf\Module\Admin::iconUrl('', 32);
//$pathModuleAdmin =& $xoopsModule->getInfo('dirmoduleadmin');

//include_once $GLOBALS['xoops']->path($pathModuleAdmin . '/moduleadmin.php');

//Load languages
xoops_loadLanguage('admin', $xoopsModule->getVar('dirname'));
xoops_loadLanguage('modinfo', $xoopsModule->getVar('dirname'));
xoops_loadLanguage('main', $xoopsModule->getVar('dirname'));

$myts = MyTextSanitizer::getInstance();
$adminObject = Admin::getInstance();
