<?php

/*
 * This file is part of the Miky package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Miky\Component\Resource\Metadata;

use Doctrine\Common\Inflector\Inflector;


class Metadata implements MetadataInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $applicationName;

    /**
     * @var string
     */
    private $templatesNamespace;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @param string $name
     * @param string $applicationName
     * @param array $parameters
     */
    private function __construct($name, $applicationName, array $parameters)
    {
        $this->name = $name;
        $this->applicationName = $applicationName;

        $this->templatesNamespace = array_key_exists('templates', $parameters) ? $parameters['templates'] : null;

        $this->parameters = $parameters;
    }

    /**
     * @param string $alias
     * @param array $parameters
     *
     * @return self
     */
    public static function fromAliasAndConfiguration($alias, array $parameters)
    {
        list($applicationName, $name) = self::parseAlias($alias);

        return new self($name, $applicationName, $parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return $this->applicationName.'.'.$this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getApplicationName()
    {
        return $this->applicationName;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getHumanizedName()
    {
        return trim(strtolower(preg_replace(['/([A-Z])/', '/[_\s]+/'], ['_$1', ' '], $this->name)));
    }

    /**
     * {@inheritdoc}
     */
    public function getPluralName()
    {
        return Inflector::pluralize($this->name);
    }


    /**
     * {@inheritdoc}
     */
    public function getTemplatesNamespace()
    {
        return $this->templatesNamespace;
    }

    /**
     * {@inheritdoc}
     */
    public function getParameter($name)
    {
        if (!$this->hasParameter($name)) {
            throw new \InvalidArgumentException(sprintf('Parameter "%s" is not configured for resource "%s".', $name, $this->getAlias()));
        }

        return $this->parameters[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function hasParameter($name)
    {
        return array_key_exists($name, $this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function getClass($name)
    {
        if (!$this->hasClass($name)) {
            throw new \InvalidArgumentException(sprintf('Class "%s" is not configured for resource "%s".', $name, $this->getAlias()));
        }

        return $this->parameters['classes'][$name];
    }

    /**
     * {@inheritdoc}
     */
    public function hasClass($name)
    {
        return isset($this->parameters['classes'][$name]);
    }

    public function hasContexts()
    {
        return isset($this->parameters['contexts']);
    }

    public function hasContext($name)
    {
        return isset($this->parameters['contexts'][$name]);
    }

    public function getContexts()
    {
        return $this->parameters['contexts'];
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceId($serviceName)
    {
        return sprintf('%s.%s.%s', $this->applicationName, $serviceName, $this->name);
    }

    public function getServiceContextId($serviceName, $context)
    {
        return sprintf('%s.%s.%s.%s', $this->applicationName, $serviceName, $context, $this->name);
    }

    /**
     * {@inheritdoc}
     */
    public function getPermissionCode($permissionName)
    {
        return sprintf('%s.%s.%s', $this->applicationName, $this->name, $permissionName);
    }

    /**
     * @param string $alias
     *
     * @return array
     */
    private static function parseAlias($alias)
    {
        if (false === strpos($alias, '.')) {
            throw new \InvalidArgumentException('Invalid alias supplied, it should conform to the following format "<applicationName>.<name>".');
        }

        return explode('.', $alias);
    }
}
