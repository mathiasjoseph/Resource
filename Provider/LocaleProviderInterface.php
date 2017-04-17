<?php

/*
 * This file is part of the Miky package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Miky\Component\Resource\Provider;


interface LocaleProviderInterface
{
    /**
     * @return string
     */
    public function getCurrentLocale();

    /**
     * @return string
     */
    public function getFallbackLocale();

    /**
     * @return string
     */
    public function getDefaultLocale();
}
