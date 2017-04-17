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

/**
 * @author Anna Walasek <anna.walasek@lakion.com>
 */
interface AvailableLocalesProviderInterface
{
    /**
     * @return array
     */
    public function getAvailableLocales();
}
