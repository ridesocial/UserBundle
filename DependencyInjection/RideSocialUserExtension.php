<?php
namespace RideSocial\Bundle\UserBundle\DependencyInjection;

use \Symfony\Component\DependencyInjection\ContainerBuilder;
use \Symfony\Component\Config\FileLocator;
use \Symfony\Component\DependencyInjection\Loader;

class RideSocialUserExtension extends \Symfony\Component\HttpKernel\DependencyInjection\Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
