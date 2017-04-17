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


class LocaleProvider implements LocaleProviderInterface
{
    /**
     * @var string
     */
    private $currentLocale;

    /**
     * @var string
     */
    private $fallbackLocale;

    /**
     * @var string
     */
    private $defaultLocale;

    /**
     * @param string $currentLocale
     * @param string $fallbackLocale
     * @param string|null $defaultLocale
     */
    public function __construct($currentLocale, $fallbackLocale, $defaultLocale = null)
    {
        $this->currentLocale = $currentLocale;
        $this->fallbackLocale = $fallbackLocale;
        $this->defaultLocale = $defaultLocale;
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentLocale()
    {
        return $this->currentLocale;
    }

    /**
     * {@inheritdoc}
     */
    public function getFallbackLocale()
    {
        return $this->fallbackLocale;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultLocale()
    {
        return $this->defaultLocale ?: $this->fallbackLocale;
    }
}
