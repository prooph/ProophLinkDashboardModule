<?php
/*
* This file is part of prooph/link.
 * (c) prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Date: 06.12.14 - 21:26
 */

namespace Prooph\Link\Dashboard\Service;

use Prooph\Link\Dashboard\Controller\AbstractWidgetController;
use Prooph\Link\Dashboard\View\DashboardWidget;

/**
 * Class DashboardProvider
 *
 * @package Application\Service
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class DashboardProvider
{
    /**
     * @var AbstractWidgetController[]
     */
    private $widgetControllers;

    /**
     * @param array $widgetControllers
     */
    public function __construct(array $widgetControllers)
    {
        $this->widgetControllers = $widgetControllers;
    }

    /**
     * @return DashboardWidget[]
     */
    public function provideWidgets()
    {
        return array_filter(array_map(function (AbstractWidgetController $controller) { return $controller->widgetAction(); }, $this->widgetControllers));
    }
}
 