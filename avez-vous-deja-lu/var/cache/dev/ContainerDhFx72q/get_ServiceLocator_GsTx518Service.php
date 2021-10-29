<?php

namespace ContainerDhFx72q;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_GsTx518Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.GsTx518' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.GsTx518'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'anecdoteRepository' => ['privates', 'App\\Repository\\AnecdoteRepository', 'getAnecdoteRepositoryService', true],
        ], [
            'anecdoteRepository' => 'App\\Repository\\AnecdoteRepository',
        ]);
    }
}
