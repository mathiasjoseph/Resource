<?php

/*
 * This file is part of the Miky package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Miky\Component\Resource\StateMachine;

use SM\StateMachine\StateMachine as BaseStateMachine;

/**
 * Miky State Machine
 *
 * @author Alexandre Bacco <alexandre.bacco@gmail.com>
 */
class StateMachine extends BaseStateMachine implements StateMachineInterface
{
    /**
     * {@inheritdoc}
     */
    public function getTransitionFromState($fromState)
    {
        foreach ($this->getPossibleTransitions() as $transition) {
            $config = $this->config['transitions'][$transition];
            if (in_array($fromState, $config['from'])) {
                return $transition;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransitionToState($toState)
    {
        foreach ($this->getPossibleTransitions() as $transition) {
            $config = $this->config['transitions'][$transition];
            if ($toState === $config['to']) {
                return $transition;
            }
        }

        return null;
    }
}
