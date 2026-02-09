<?php defined('C5_EXECUTE') or die('Access Denied.');

/** @var $navItems array */

$nav = $controller;
$c = \Concrete\Core\Page\Page::getCurrentPage();
?>

<ul class="nav-parent-disabled">
    <?php foreach ($navItems as $ni):
        $page = $ni->getCollectionObject();
        $isDisabled = $page->getAttribute('parent_link_disabled');
        $hasChildren = count($ni->getChildren()) > 0;

        $classes = implode(" ", $ni->getClasses());
    ?>
        <li class="<?php echo $classes ?>">
            <?php if ($hasChildren && $isDisabled): ?>
                <span class="nolink"><?php echo h($ni->getName()) ?></span>
            <?php else: ?>
                <a href="<?php echo h($ni->getURL()) ?>" target="<?php echo h($ni->getLinkTarget()) ?>">
                    <?php echo h($ni->getName()) ?>
                </a>
            <?php endif; ?>

            <?php if ($ni->hasChildren()): ?>
                <ul>
                    <?php foreach ($ni->getChildren() as $child): ?>
                        <li class="<?php echo implode(" ", $child->getClasses()); ?>">
                            <a href="<?php echo h($child->getURL()) ?>">
                                <?php echo h($child->getName()) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

<script src="<?php echo $view->getThemePath() ?>/blocks/autonav/templates/parent_link_disabled/view.js"></script>
<link rel="stylesheet" href="<?php echo $view->getThemePath() ?>/blocks/autonav/templates/parent_link_disabled/view.css">
