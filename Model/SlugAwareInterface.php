<?php

/*
 * This file is part of the Miky package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Miky\Component\Resource\Model;

/**
 * @author Joseph Bielawski <stloyd@gmail.com>
 */
interface SlugAwareInterface
{
    /**
     * @return string
     */
    public function getSlug();

    /**
     * @param string $slug
     */
    public function setSlug($slug = null);
}
