<?php
/**
 * ****************************************************************************
 *  - TDMPicture By TDM   - TEAM DEV MODULE FOR XOOPS
 *  - Licence PRO Copyright (c)  (http://www.tdmxoops.net)
 *
 * Cette licence, contient des limitations!!!
 *
 * 1. Vous devez poss�der une permission d'ex�cuter le logiciel, pour n'importe quel usage.
 * 2. Vous ne devez pas l' �tudier,
 * 3. Vous ne devez pas le redistribuer ni en faire des copies,
 * 4. Vous n'avez pas la libert� de l'am�liorer et de rendre publiques les modifications
 *
 * @license     TDMFR PRO license
 * @author      TDMFR ; TEAM DEV MODULE
 *
 * ****************************************************************************
 */

// defined('XOOPS_ROOT_PATH') || exit('Restricted access.');

$moduleDirName = basename(__DIR__);

// ------------------- Informations ------------------- //
$modversion = [
    'version'             => 1.08,
    'module_status'       => 'RC 2',
    'release_date'        => '2017/02/25',
    'name'                => _MI_TDMPICTURE_NAME,
    'description'         => _MI_TDMPICTURE_NAME_DESC,
    'official'            => 0,
    //1 indicates official XOOPS module supported by XOOPS Dev Team, 0 means 3rd party supported
    'author'              => 'TDM, Venom',
    //'pseudo'              => 'Venom',
    'author_mail'         => 'author-email',
    'author_website_url'  => 'https://xoops.org',
    'author_website_name' => 'XOOPS',
    'credits'             => 'Mamba, XOOPS Development Team',
    'license'             => 'GPL 2.0 or later',
    'license_url'         => 'www.gnu.org/licenses/gpl-2.0.html/',
    'help'                => 'page=help',
    // ------------------- Folders & Files -------------------
    'release_info'        => 'Changelog',
    'release_file'        => XOOPS_URL . "/modules/$moduleDirName/docs/changelog.txt",
    'manual'              => 'link to manual file',
    'manual_file'         => XOOPS_URL . "/modules/$moduleDirName/docs/install.txt",
    // ------------------- Min Requirements -------------------
    'min_php'             => '5.5',
    'min_xoops'           => '2.5.9',
    'min_admin'           => '1.2',
    'min_db'              => ['mysql' => '5.5'],
    // images
    'image'               => 'assets/images/logoModule.png',
    'iconsmall'           => 'assets/images/iconsmall.png',
    'iconbig'             => 'assets/images/iconbig.png',
    'dirname'             => $moduleDirName,
    //Frameworks
    //    'dirmoduleadmin'      => 'Frameworks/moduleclasses/moduleadmin',
    //    'sysicons16'          => 'Frameworks/moduleclasses/icons/16',
    //    'sysicons32'          => 'Frameworks/moduleclasses/icons/32',
    // Local path icons
    'modicons16'          => 'assets/images/icons/16',
    'modicons32'          => 'assets/images/icons/32',
    'modimages'           => 'assets/images',
    //About
    'demo_site_url'       => 'https://xoops.org',
    'demo_site_name'      => 'XOOPS Demo Site',
    'support_url'         => 'https://xoops.org/modules/newbb/viewforum.php?forum=28/',
    'support_name'        => 'Support Forum',
    'module_website_url'  => 'www.xoops.org',
    'module_website_name' => 'XOOPS Project',
    // ------------------- Admin Menu -------------------
    'system_menu'         => 1,
    'hasAdmin'            => 1,
    'adminindex'          => 'admin/index.php',
    'adminmenu'           => 'admin/menu.php',
    // ------------------- Main Menu -------------------
    'hasMain'             => 1,
    'sub'                 => [
        //        array(
        //            'name' => _MI_TDMPICTURE_SUB_SMNAME1,
        //            'url'  => 'movies.php'
        //        ),
        //        array(
        //            'name' => _MI_TDMPICTURE_SUB_SMNAME2,
        //            'url'  => 'clips.php'
        //        ),
        [
            'name' => _MI_TDMPICTURE_VIEWALBUM,
            'url'  => 'search.php'
        ],
    ],
    // -------------------  PayPal ---------------------------
    'paypal'              => [
        'business'      => 'foundation@xoops.org',
        'item_name'     => 'Donation : ' . _MI_TDMPICTURE_NAME,
        'amount'        => 0,
        'currency_code' => 'USD'
    ],
    // ------------------- Search ---------------------------
    'hasSearch'           => 1,
    'search'              => [
        'file' => 'include/search.inc.php',
        'func' => 'tdmpicture_search'
    ],
    // ------------------- Comments -------------------------
    'hasComments'         => 1,
    'comments'            => [
        'pageName'     => 'viewfile.php',
        'itemName'     => 'st',
        'callbackFile' => 'include/comment_functions.php',
        'callback'     => [
            'approve' => 'picture_comments_approve',
            'update'  => 'picture_comments_update'
        ],
    ],
    // ------------------- Notification ----------------------
    'hasNotification'     => 0,
    // ------------------- Install/Update -------------------
    'onInstall'           => 'include/oninstall.php',
    'onUpdate'            => 'include/onupdate.php',
    'onUninstall'         => 'include/onuninstall.php',
    // ------------------- Mysql -----------------------------
    'sqlfile'             => ['mysql' => 'sql/mysql.sql'],
    // ------------------- Tables ----------------------------
    'tables'              => [
        $moduleDirName . '_' . 'file',
        $moduleDirName . '_' . 'cat',
        $moduleDirName . '_' . 'pl',
        $moduleDirName . '_' . 'vote',
    ]
];

// ------------------- Help files ------------------- //
$modversion['helpsection'] = [
    [
        'name' => _MI_TDMPICTURE_OVERVIEW,
        'link' => 'page=help'
    ],
    [
        'name' => _MI_TDMPICTURE_DISCLAIMER,
        'link' => 'page=disclaimer'
    ],
    [
        'name' => _MI_TDMPICTURE_LICENSE,
        'link' => 'page=license'
    ],
    [
        'name' => _MI_TDMPICTURE_SUPPORT,
        'link' => 'page=support'
    ],
];
// ------------------- Templates ------------------- //
$modversion['templates'] = [
    [
        'file'        => 'tdmpicture_index.tpl',
        'description' => ''
    ],
    [
        'file'        => 'tdmpicture_viewcat.tpl',
        'description' => ''
    ],
    [
        'file'        => 'tdmpicture_tpfile.tpl',
        'description' => ''
    ],
    [
        'file'        => 'tdmpicture_tplecteur.tpl',
        'description' => ''
    ],
    [
        'file'        => 'tdmpicture_tpplaylist.tpl',
        'description' => ''
    ],
    [
        'file'        => 'tdmpicture_viewfile.tpl',
        'description' => ''
    ],
    [
        'file'        => 'tdmpicture_modfile.tpl',
        'description' => ''
    ],
    [
        'file'        => 'tdmpicture_liste.tpl',
        'description' => ''
    ],
    [
        'file'        => 'tdmpicture_rss.tpl',
        'description' => 'RSS'
    ],

];

// ------------------- Blocks ------------------- //
//should blocks have have hardcoded numbers?
$modversion['blocks'][] = [
    'file'        => 'tdmpicture_minitable.php',
    'name'        => _AM_TDMPICTURE_BLOCK_DATE,
    'description' => '',
    'show_func'   => 'b_tdmpicture',
    'edit_func'   => 'b_tdmpicture_edit',
    'options'     => 'file_indate|10|50|5|30|30|0',
    'template'    => 'tdmpicture_minitable.tpl'
];

$modversion['blocks'][] = [
    'file'        => 'tdmpicture_minitable.php',
    'name'        => _AM_TDMPICTURE_BLOCK_COUNTS,
    'description' => '',
    'show_func'   => 'b_tdmpicture',
    'edit_func'   => 'b_tdmpicture_edit',
    'options'     => 'file_counts|10|50|5|30|30|0',
    'template'    => 'tdmpicture_minitable.tpl'
];

$modversion['blocks'][] = [
    'file'        => 'tdmpicture_minitable.php',
    'name'        => _AM_TDMPICTURE_BLOCK_HITS,
    'description' => '',
    'show_func'   => 'b_tdmpicture',
    'edit_func'   => 'b_tdmpicture_edit',
    'options'     => 'file_hits|10|50|5|30|30|0',
    'template'    => 'tdmpicture_minitable.tpl'
];

$modversion['blocks'][] = [
    'file'        => 'tdmpicture_minitable.php',
    'name'        => _AM_TDMPICTURE_BLOCK_DL,
    'description' => '',
    'show_func'   => 'b_tdmpicture',
    'edit_func'   => 'b_tdmpicture_edit',
    'options'     => 'file_dl|10|50|5|30|30|0',
    'template'    => 'tdmpicture_minitable.tpl'
];

$modversion['blocks'][] = [
    'file'        => 'tdmpicture_minitable.php',
    'name'        => _AM_TDMPICTURE_BLOCK_COMMENTS,
    'description' => '',
    'show_func'   => 'b_tdmpicture',
    'edit_func'   => 'b_tdmpicture_edit',
    'options'     => 'file_comments|10|50|5|30|30|0',
    'template'    => 'tdmpicture_minitable.tpl'
];

$modversion['blocks'][] = [
    'file'        => 'tdmpicture_minitable.php',
    'name'        => _AM_TDMPICTURE_BLOCK_RANDS,
    'description' => '',
    'show_func'   => 'b_tdmpicture',
    'edit_func'   => 'b_tdmpicture_edit',
    'options'     => 'RAND()|10|50|5|30|30|0',
    'template'    => 'tdmpicture_minitable.tpl'
];

global $xoopsUser;
$gpermHandler = xoops_getHandler('groupperm');
/** @var XoopsModuleHandler $moduleHandler */
$moduleHandler = xoops_getHandler('module');
$xoopsModule   = $moduleHandler->getByDirname($moduleDirName);

//permission
if (is_object($xoopsUser)) {
    $groups = $xoopsUser->getGroups();
    $uid    = $xoopsUser->getVar('uid');
} else {
    $groups = XOOPS_GROUP_ANONYMOUS;
    $uid    = false;
}

if ($xoopsModule) {
    //perm
    if ($gpermHandler->checkRight('tdmpicture_view', 8, $groups, $xoopsModule->getVar('mid'))) {
        $modversion['sub'][1]['name'] = _MI_TDMPICTURE_UPLOAD;
        $modversion['sub'][1]['url']  = 'submit.php';
    }

    if ($gpermHandler->checkRight('tdmpicture_view', 1024, $groups, $xoopsModule->getVar('mid'))) {
        $modversion['sub'][2]['name'] = _MI_TDMPICTURE_CAT;
        $modversion['sub'][2]['url']  = 'submit.php?op=cat';
    }

    if ($uid) {
        $modversion['sub'][3]['name'] = _MI_TDMPICTURE_VIEWMYALBUM;
        $modversion['sub'][3]['url']  = 'user.php?ut=' . $uid;
    }
}

// ------------------- Config Options ------------------- //
$modversion['config'][] = [
    'name'        => 'tdm_upload_path',
    'title'       => '_MI_TDMPICTURE_UPLOAD_PATH',
    'description' => '_MI_TDMPICTURE_UPLOAD_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    //'default'     => '/modules/' . $modversion['dirname' . '/upload/',
    'default'     => '/uploads/' . $moduleDirName
];

$modversion['config'][] = [
    'name'        => 'tdm_upload_thumb',
    'title'       => '_MI_TDMPICTURE_UPLOAD_THUMB',
    'description' => '_MI_TDMPICTURE_UPLOAD_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    //'default'     => '/modules/' . $modversion['dirname' . '/upload/thumb/',
    'default'     => '/uploads/' . $moduleDirName . '/thumb'
];

$modversion['config'][] = [
    'name'        => 'tdm_myalbum_path',
    'title'       => '_MI_TDMPICTURE_MYALBUM_PATH',
    'description' => '_MI_TDMPICTURE_UPLOAD_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '/uploads/myalbum/photos'
];

$modversion['config'][] = [
    'name'        => 'tdm_myalbum_thumb',
    'title'       => '_MI_TDMPICTURE_MYALBUM_THUMB',
    'description' => '_MI_TDMPICTURE_UPLOAD_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    //'default'     => '/uploads/thumbs/',
    'default'     => '/uploads/myalbum/thumbs'
];

$modversion['config'][] = [
    'name'        => 'tdm_extgallery_path',
    'title'       => '_MI_TDMPICTURE_EXTGALLERY_PATH',
    'description' => '_MI_TDMPICTURE_UPLOAD_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '/uploads/extgallery/public-photo/medium'
];

$modversion['config'][] = [
    'name'        => 'tdm_extgallery_thumb',
    'title'       => '_MI_TDMPICTURE_EXTGALLERY_THUMB',
    'description' => '_MI_TDMPICTURE_UPLOAD_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '/uploads/extgallery/public-photo/thumb'
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_mimemax',
    'title'       => '_MI_TDMPICTURE_MIMEMAX',
    'description' => '',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => '10485760'
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_upmax',
    'title'       => '_MI_TDMPICTURE_UPMAX',
    'description' => '',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => '5'
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_mimetype',
    'title'       => '_MI_TDMPICTURE_MIMETYPE',
    'description' => '',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => 'image/png|image/bmp|image/gif|image/ief|image/jpeg|image/pipeg|image/tiff|image/x-portable-anymap|image/x-portable-bitmap|image/x-portable-graymap|image/x-portable-pixmap|image/x-rgb|image/x-xbitmap|image/x-xwindowdump'
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_size',
    'title'       => '_MI_TDMPICTURE_SIZE',
    'description' => '_MI_TDMPICTURE_SIZEDESC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => '100x75|150x112|320x240|640x480|800x600|1024x768|1280x1024|1600x1200'
];

//$modversion['config'][] = array(
//'name' => 'tdmpicture_java_width',
//'title' => '_MI_TDMPICTURE_JAVA_WIDTH',
//'description' => '',
//'formtype' => 'textbox',
//'valuetype' => 'int',
//'default' => 640);

//$modversion['config'][] = array(
//'name' => 'tdmpicture_java_heigth',
//'title' => '_MI_TDMPICTURE_JAVA_HEIGTH',
//'description' => '',
//'formtype' => 'textbox',
//'valuetype' => 'int',
//'default' => 400);

$modversion['config'][] = [
    require_once XOOPS_ROOT_PATH . '/class/xoopslists.php',
    'name'        => 'tdmpicture_editor',
    'title'       => '_MI_TDMPICTURE_EDITOR',
    'description' => '',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'dhtmltextarea',
    'options'     => XoopsLists::getDirListAsArray(XOOPS_ROOT_PATH . '/class/xoopseditor'),
    'category'    => 'global'
];

$modversion['config'][] = [

    'name'        => 'tdmpicture_favourite',
    'title'       => '_MI_TDMPICTURE_FAVOURITE',
    'description' => '',
    'formtype'    => 'text',
    'valuetype'   => 'int',
    'default'     => '10'
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_page',
    'title'       => '_MI_TDMPICTURE_PAGE',
    'description' => '',
    'formtype'    => 'text',
    'valuetype'   => 'int',
    'default'     => '10'
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_width',
    'title'       => '_MI_TDMPICTURE_WIDTH',
    'description' => '',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 600
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_heigth',
    'title'       => '_MI_TDMPICTURE_HEIGTH',
    'description' => '',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 400
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_thumb_style',
    'title'       => '_MI_TDMPICTURE_THUMB_STYLE',
    'description' => '',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'limit-width-height',
    'options'     => [
        _MI_TDMPICTURE_THUMB_STYLE_CENTER => 'center',
        _MI_TDMPICTURE_THUMB_STYLE_HW     => 'limit-width-height',
        _MI_TDMPICTURE_THUMB_STYLE_W      => 'limit-width',
        _MI_TDMPICTURE_THUMB_STYLE_H      => 'limit-height'
    ]
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_thumb_width',
    'title'       => '_MI_TDMPICTURE_THUMB_WIDTH',
    'description' => '',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 150
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_thumb_heigth',
    'title'       => '_MI_TDMPICTURE_THUMB_HEIGTH',
    'description' => '',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 150
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_thumb_quality',
    'title'       => '_MI_TDMPICTURE_THUMB_QUALITY',
    'description' => '',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 75
];

//$modversion['config'][] = array(
//'name' => 'tdmpicture_thumb_deco',
//'title' => '_MI_TDMPICTURE_THUMB_DECO',
//'description' => '',
//'formtype' => 'select',
//'valuetype' => 'text',
//'default' => 'paper-clip',
//'options' => array('paper-clip' => 'paper-clip', 'tape' => 'tape', 'pin' => 'pin', 'None' => 'None'));

$modversion['config'][] = [
    'name'        => 'tdmpicture_slide_width',
    'title'       => '_MI_TDMPICTURE_SLIDE_WIDTH',
    'description' => '',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 600
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_slide_height',
    'title'       => '_MI_TDMPICTURE_SLIDE_HEIGTH',
    'description' => '',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 400
];

//$modversion['config'][] = array(
//'name' => 'tdmpicture_cat_cel',
//'title' => '_MI_TDMPICTURE_CAT_CEL',
//'description' => '',
//'formtype' => 'textbox',
//'valuetype' => 'int',
//'default' => 2);
//$modversion['config'][] = array(
//'name' => 'tdmpicture_cat_souscel',
//'title' => '_MI_TDMPICTURE_CAT_SOUSCEL',
//'description' => '',
//'formtype' => 'textbox',
//'valuetype' => 'int',
//'default' => 10);

$modversion['config'][] = [
    'name'        => 'tdmpicture_display',
    'title'       => '_MI_TDMPICTURE_DISPLAY',
    'description' => '',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'display thumb_view',
    'options'     => [
        'minimal' => 'display thumb_view',
        'full'    => 'display'
    ]
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_social',
    'title'       => '_MI_TDMPICTURE_SOCIAL',
    'description' => '',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => '1'
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_rss',
    'title'       => '_MI_TDMPICTURE_RSS',
    'description' => '',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => '1'
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_pdf',
    'title'       => '_MI_TDMPICTURE_PDF',
    'description' => '',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => '1'
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_description',
    'title'       => '_MI_TDMPICTURE_DESCRIPTION',
    'description' => '',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => ''
];

$modversion['config'][] = [
    'name'        => 'tdmpicture_keywords',
    'title'       => '_MI_TDMPICTURE_KEYWORDS',
    'description' => '',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => ''
];
