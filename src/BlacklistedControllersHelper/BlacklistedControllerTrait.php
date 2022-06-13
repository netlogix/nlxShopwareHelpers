<?php
declare(strict_types=1);

/*
 * Created by netlogix GmbH & Co. KG
 *
 * @copyright netlogix GmbH & Co. KG
 */

namespace nlxShopwareHelpers\BlacklistedControllersHelper;

trait BlacklistedControllerTrait
{
    public function isBlacklistedControllerName(string $controllerName): bool
    {
        $blacklistedControllers = $this->getBlacklistedControllers();
        return \in_array($controllerName, $blacklistedControllers);
    }

    public function isBlacklistedController(\Enlight_Controller_Action $controller): bool
    {
        return $this->isBlacklistedControllerName($controller->Request()->getControllerName());
    }

    /**
     * @return string[]
     */
    public function getBlacklistedControllers(): array
    {
        if (isset($this->blacklistedControllers)) {
            return $this->blacklistedControllers;
        }

        return [];
    }
}
