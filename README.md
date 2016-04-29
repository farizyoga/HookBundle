# Symfony Hook Bundle
## Installation
```
composer require fys/hook-bundle
```
## Creating first hook
first, create a service that tagged to hook.type
```
// services.yml

app.hook.head:
    class: AppBundle\Component\Hooks\HeadHook
    tags:
        - { name: hook.type }
```
second, create the class that you mentioned in the service
```
// AppBundle/Component/Hooks/HeadHook.php

namespace AppBundle/Component/Hooks;

class HeadHook
{
    public function getName()
    {
        // the hook name, for example "head"
        return 'head';
    }
    
    pubilc function getAction()
    {
        // the action when the hook is called
        return 'HELLO THIS IS MY FIRST HOOK';
    }
    
    public function getPriority()
    {   
        // the priority of this hook
        return 1;
    }
}
```
then, you can call ```{{ call_hook('hookname') }}``` in twig template, it will print "HELLO THIS IS MY FIRST HOOK" 
