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

use Xmf\Module\Helper;

// defined('XOOPS_ROOT_PATH') || exit('Restricted access.');

/**
 * Class TdmpicturePlaylist
 */
class TdmpicturePlaylist extends XoopsObject
{
    // constructor
    /**
     * TdmpicturePlaylist constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initVar('pl_id', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('pl_uid', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('pl_file', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('pl_album', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('pl_artiste', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('pl_genre', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('pl_num', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('pl_title', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('pl_display', XOBJ_DTYPE_INT, null, false, 1);
        $this->initVar('pl_hits', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('pl_votes', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('pl_counts', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('pl_indate', XOBJ_DTYPE_INT, null, false, 10);
    }

    /**
     * @param bool $action
     * @return XoopsThemeForm
     */
    public function getForm($action = false)
    {
        global $xoopsDB, $xoopsModule;
        $moduleDirName = basename(dirname(__DIR__));
        $moduleHelper  = Helper::getHelper($moduleDirName);

        if (false === $action) {
            $action = $_SERVER['REQUEST_URI'];
        }
        $title = $this->isNew() ? sprintf(_AM_TDMPICTURE_ADD) : sprintf(_AM_TDMPICTURE_EDIT);

        require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

        $form = new XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        //  $form->addElement(new XoopsFormText(_AM_TDMPICTURE_TITLE, 'filecat_title', 100, 255, $this->getVar('filecat_title')), true);
        if (!$this->isNew()) {
            //Load groups
            $form->addElement(new XoopsFormHidden('id', $this->getVar('pl_id')));
        }

        //load album
        $albHandler = xoops_getModuleHandler('TDMPICTURE_alb', $moduleDirName);
        $cat_select = new XoopsFormSelect(_AM_TDMPICTURE_ALBUM, 'pl_pid', $this->getVar('pl_pid'));
        $cat_select->addOptionArray($albHandler->getList());
        $form->addElement($cat_select, true);
        //

        //upload

        for ($i = 1; $i < 5; ++$i) {
            $form->insertBreak('<div align="center"></div>', 'odd');
            $form->addElement(new XoopsFormText(_AM_TDMPICTURE_TITLE, 'file_title[]', 100, 255, $this->getVar('filecat_title')));
            $form->addElement(new XoopsFormFile(_AM_TDMPICTURE_UPLOAD, 'attachedfile' . $i, $moduleHelper->getConfig('mimemax')));
        }

        $form->addElement(new XoopsFormRadioYN(_AM_TDMPICTURE_DISPLAYUSER, 'pl_display', $this->getVar('plcat_display'), _YES, _NO));
        $form->addElement(new XoopsFormHidden('op', 'save'));
        $form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));

        return $form;
    }
}

/**
 * Class TdmpicturePlaylistHandler
 */
class TdmpicturePlaylistHandler extends XoopsPersistableObjectHandler
{
    /**
     * TdmpicturePlaylistHandler constructor.
     * @param XoopsDatabase $db
     */
    public function __construct(XoopsDatabase $db)
    {
        parent::__construct($db, 'TDMPICTURE_pl', 'TdmpicturePlaylist', 'pl_id', 'pl_title');
    }
}
