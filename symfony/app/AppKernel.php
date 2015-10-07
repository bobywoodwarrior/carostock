<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Valentin\StockBundle\ValentinStockBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle()
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    /**
     * @see https://github.com/symfony/symfony/issues/7555#issuecomment-15856713
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');

        $envParameters = $this->getEnvParameters();
        $loader->load(function (ContainerInterface $container) use ($envParameters) {

            $appName = $this->getName();
            if ('_' === substr($appName, -1)) {
                // It seems that are building a Symfony compiled container (app name ends with "_")
                // --> let's display the environment variables config overrides:
                echo "\033[36m" . sprintf(
                        '"%s" app config overrides with ENV variables: %s',
                        $appName,
                        json_encode($envParameters, JSON_PRETTY_PRINT)
                    ) . "\033[0m" . PHP_EOL;
            }

            $container->getParameterBag()->add($envParameters);
        });
    }
}
