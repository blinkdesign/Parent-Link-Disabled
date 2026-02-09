<?php
/**
 * @project:   Update Package Autonav Template Parent Link Disabled
 * @copyright  (C) 2025 www.blink.ch
 * @author     blinkbox 2025-11-25
 * @version    1.0.1
 */

namespace Concrete\Package\ParentLinkDisabled;

defined('C5_EXECUTE') or die('Access denied.');

/*
Autonav template using built-in "Responsive Header Navigation" for pages without Link, similar to attribute "Replace Link with First in Nav". Page has no link (dead link), but on hover or click it shows all links to available subpages. Installs a page attribute "parent_link_disabled". © blink.ch 2020-02-28 für dancestudiomaja.ch 
*/

use Concrete\Core\Package\Package;
use Concrete\Core\Attribute\Key\Category as AttributeCategory;

class Controller extends Package
{
    protected $pkgHandle = 'parent_link_disabled';
    protected $appVersionRequired = '9.0.0';
    protected $pkgVersion = '1.0.1';

    public function getPackageName()
    {
        return t('Parent Link Disabled');
    }

    public function getPackageDescription()
    {
        return t('Responsive Header Navigation that disables parent links.');
    }

    public function install()
    {
        $pkg = parent::install();

        // Installiert ein Seiten Attribute
        $category = AttributeCategory::getByHandle('collection');
        $attributeKey = \Concrete\Core\Attribute\Key\CollectionKey::getByHandle('parent_link_disabled');

        if (!$attributeKey) {
            $type = \Concrete\Core\Attribute\Type::getByHandle('boolean');
            $key = \Concrete\Core\Attribute\Key\CollectionKey::add(
                $type,
                [
                    'akHandle' => 'parent_link_disabled',
                    'akName'   => 'Disable Parent Link',
                ],
                $pkg
            );
        }
    }
}
