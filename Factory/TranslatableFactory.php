<?php

/*
 * This file is part of the Miky package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Miky\Component\Resource\Factory;

use Miky\Component\Resource\Exception\UnexpectedTypeException;
use Miky\Component\Resource\Model\TranslatableInterface;
use Miky\Component\Resource\Provider\LocaleProviderInterface;


class TranslatableFactory implements TranslatableFactoryInterface
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var LocaleProviderInterface
     */
    private $localeProvider;

    /**
     * @param FactoryInterface $factory
     * @param LocaleProviderInterface $localeProvider
     */
    public function __construct(FactoryInterface $factory, LocaleProviderInterface $localeProvider)
    {
        $this->factory = $factory;
        $this->localeProvider = $localeProvider;
    }

    /**
     * {@inheritdoc}
     */
    public function createNew()
    {
        $resource = $this->factory->createNew();

        if (!$resource instanceof TranslatableInterface) {
            throw new UnexpectedTypeException($resource, TranslatableInterface::class);
        }

        $resource->setCurrentLocale($this->localeProvider->getCurrentLocale());
        $resource->setFallbackLocale($this->localeProvider->getFallbackLocale());

        return $resource;
    }
}
