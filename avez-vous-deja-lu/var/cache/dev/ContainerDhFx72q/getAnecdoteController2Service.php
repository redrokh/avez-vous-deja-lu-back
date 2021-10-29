<?php

namespace ContainerDhFx72q;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAnecdoteController2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\Api\AnecdoteController' shared autowired service.
     *
     * @return \App\Controller\Api\AnecdoteController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/Api/AnecdoteController.php';

        $container->services['App\\Controller\\Api\\AnecdoteController'] = $instance = new \App\Controller\Api\AnecdoteController();

        $instance->setContainer(($container->privates['.service_locator.W9y3dzm'] ?? $container->load('get_ServiceLocator_W9y3dzmService'))->withContext('App\\Controller\\Api\\AnecdoteController', $container));

        return $instance;
    }
}
