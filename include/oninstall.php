<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright    XOOPS Project https://xoops.org/
 * @license      GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author       XOOPS Development Team
 */

/**
 *
 * Prepares system prior to attempting to install module
 * @param XoopsModule $module {@link XoopsModule}
 *
 * @return bool true if ready to install, false if not
 */
function xoops_module_pre_install_tdmpicture(XoopsModule $module)
{
    $moduleDirName = basename(dirname(__DIR__));
    $utilityClass  = ucfirst($moduleDirName) . 'Utility';
    if (!class_exists($utilityClass)) {
        xoops_load('utility', $moduleDirName);
    }
    //check for minimum XOOPS version
    if (!$utilityClass::checkVerXoops($module)) {
        return false;
    }

    // check for minimum PHP version
    if (!$utilityClass::checkVerPhp($module)) {
        return false;
    }

    $mod_tables = $module->getInfo('tables');
    foreach ($mod_tables as $table) {
        $GLOBALS['xoopsDB']->queryF('DROP TABLE IF EXISTS ' . $GLOBALS['xoopsDB']->prefix($table) . ';');
    }

    return true;
}

/**
 *
 * Performs tasks required during installation of the module
 * @param XoopsModule $xoopsModule {@link XoopsModule}
 *
 * @return bool true if installation successful, false if not
 */
function xoops_module_install_tdmpicture(XoopsModule $xoopsModule)
{
    require_once dirname(dirname(dirname(__DIR__))) . '/mainfile.php';

    //    $moduleDirName = $xoopsModule->getVar('dirname');
    $moduleDirName = basename(dirname(__DIR__));
    xoops_loadLanguage('admin', $moduleDirName);
    xoops_loadLanguage('modinfo', $moduleDirName);

    $configurator = include __DIR__ . '/config.php';
    /** @var TdmpictureUtility $utilityClass */
    $utilityClass = ucfirst($moduleDirName) . 'Utility';
    if (!class_exists($utilityClass)) {
        xoops_load('utility', $moduleDirName);
    }

    //  ---  CREATE FOLDERS ---------------
    if (count($configurator['uploadFolders']) > 0) {
        //    foreach (array_keys($GLOBALS['uploadFolders']) as $i) {
        foreach (array_keys($configurator['uploadFolders']) as $i) {
            $utilityClass::createFolder($configurator['uploadFolders'][$i]);
        }
    }

    //  ---  COPY blank.png FILES ---------------
    if (count($configurator['blankFiles']) > 0) {
        $file = __DIR__ . '/../assets/images/blank.png';
        foreach (array_keys($configurator['blankFiles']) as $i) {
            $dest = $configurator['blankFiles'][$i] . '/blank.png';
            $utilityClass::copyFile($file, $dest);
        }
    }

    //delete .html entries from the tpl table
    $sql = 'DELETE FROM ' . $GLOBALS['xoops']->prefix('tplfile') . " WHERE `tpl_module` = '" . $xoopsModule->getVar('dirname', 'n') . "' AND `tpl_file` LIKE '%.html%'";
    $GLOBALS['xoops']->queryF($sql);

    return true;
}
