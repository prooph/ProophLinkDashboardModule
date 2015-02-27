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

namespace Prooph\Link\Dashboard\Service\Factory;

use Prooph\Link\Dashboard\Service\DashboardProvider;
use Prooph\Link\Application\Projection\ProcessingConfig;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DashboardProviderFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @throws \RuntimeException
     * @return DashboardProvider
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');

        $controllerLoader = $serviceLocator->get('ControllerLoader');

        /** @var $systemConfig ProcessingConfig */
        $systemConfig = $serviceLocator->get('prooph.link.system_config');

        $controllers = [];

        $sortArr = [];

        if ($systemConfig->isConfigured()) {

            foreach ($config['prooph.link.dashboard'] as $widgetName => $widgetConfig) {

                if (! array_key_exists('controller', $widgetConfig)) {
                    throw new \RuntimeException('controller key missing in widget config: ' . $widgetName);
                }

                $sortArr[$widgetName] = (isset($widgetConfig['order']))? (int)$widgetConfig['order'] : 0;
            }

            asort($sortArr);

        } else {
            $sortArr['system_config_widget'] = 1;
        }

        foreach ($sortArr as $widgetName => $order) {
            $controllers[] = $controllerLoader->get($config['prooph.link.dashboard'][$widgetName]['controller']);
        }

        return new DashboardProvider($controllers);
    }
}
 