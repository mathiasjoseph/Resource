<?php

/*
 * This file is part of the Miky package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Miky\Component\Resource\Repository;

/**
 * @author Gonzalo Vilaseca <gvilaseca@reiss.co.uk>
 */
interface TranslatableRepositoryInterface extends RepositoryInterface
{
    /**
     * @param array $translatableFields
     *
     * @return self
     */
    public function setTranslatableFields(array $translatableFields);
}
