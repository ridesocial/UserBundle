<?php
namespace RideSocial\Bundle\UserBundle;

use \Sylius\Bundle\ResourceBundle\SyliusResourceBundle;

class RideSocialUserBundle extends \Sylius\Bundle\ResourceBundle\AbstractResourceBundle
{
    /**
     * {@inheritdoc}
     */
    public static function getSupportedDrivers()
    {
        return array(
            SyliusResourceBundle::DRIVER_DOCTRINE_ORM
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function build(\Symfony\Component\DependencyInjection\ContainerBuilder $container)
    {
        parent::build($container);
    }
    
    /**
     * {@inheritdoc}
     */
    protected function getBundlePrefix()
    {
        return 'ridesocial_user';
    }
}
