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

namespace Prooph\Link\Dashboard\Controller;

use Prooph\Link\Application\Service\AbstractQueryController;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 *
 * This controller is the application entry point. In the associated view the DashboardViewHelper requests and
 * renders all activated dashboard widgets.
 *
 *
 * @package Dashboard\Controller
 * @author Alexander Miertsch <alexander.miertsch.extern@sixt.com>
 */
class IndexController extends AbstractQueryController
{
    public function indexAction()
    {
        $viewModel = new ViewModel();

        $viewModel->setTemplate('application/index/index');

        return $viewModel;
    }
}
