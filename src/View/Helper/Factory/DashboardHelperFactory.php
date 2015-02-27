<?php
/*
* This file is part of prooph/link.
 * (c) prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 06.12.14 - 23:16
 */

namespace Prooph\Link\Dashboard\View\Helper\Factory;

use Prooph\Link\Dashboard\View\Helper\DashboardHelper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class DashboardHelperFactory
 *
 * @package Dashboard\View\Helper\Factory
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
class DashboardHelperFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new DashboardHelper($serviceLocator->getServiceLocator()->get('prooph.link.dashboard_provider'));
    }
}
 