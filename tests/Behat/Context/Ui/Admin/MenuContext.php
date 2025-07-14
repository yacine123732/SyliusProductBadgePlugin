<?php

declare(strict_types=1);

namespace Tests\YacDev\SyliusProductBadgePlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Webmozart\Assert\Assert;

final class MenuContext extends RawMinkContext implements Context
{
    /**
     * @Then I should see :item in the configuration menu
     */
    public function iShouldSeeInTheConfigurationMenu(string $item): void
    {
        $menu = $this->getSession()->getPage()->find('css', '#sidebar-menu');
        Assert::notNull($menu, 'Sidebar menu not found');

        $link = $menu->findLink($item);
        Assert::notNull($link, sprintf('Menu item "%s" not found in configuration menu.', $item));
    }
}
