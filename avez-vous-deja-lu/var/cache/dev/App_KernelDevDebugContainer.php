<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXpyRdXM\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXpyRdXM/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerXpyRdXM.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerXpyRdXM\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerXpyRdXM\App_KernelDevDebugContainer([
    'container.build_hash' => 'XpyRdXM',
    'container.build_id' => 'bd9392b3',
    'container.build_time' => 1635509820,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXpyRdXM');