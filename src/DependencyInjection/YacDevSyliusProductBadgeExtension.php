<?php

declare(strict_types=1);

namespace YacDev\SyliusProductBadgePlugin\DependencyInjection;

use Sylius\Bundle\CoreBundle\DependencyInjection\PrependDoctrineMigrationsTrait;
use Sylius\Bundle\ResourceBundle\DependencyInjection\Extension\AbstractResourceExtension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

final class YacDevSyliusProductBadgeExtension extends AbstractResourceExtension implements PrependExtensionInterface
{
    use PrependDoctrineMigrationsTrait;

    /** @psalm-suppress UnusedVariable */
    public function load(array $configs, ContainerBuilder $container): void
    {
        //$configuration = new Configuration();
        $config = $this->processConfiguration($this->getConfiguration([], $container), $configs);

        $container->setParameter(
            'yac_dev_sylius_product_badge.css_classes',
            $config['css_classes']
        );

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../../config'));

        $loader->load('services.xml');
    }

    public function prepend(ContainerBuilder $container): void
    {
        $this->prependDoctrineMigrations($container);
    }

    protected function getMigrationsNamespace(): string
    {
        return 'DoctrineMigrations';
    }

    protected function getMigrationsDirectory(): string
    {
        return '@AcmeSyliusExamplePlugin/src/Migrations';
    }

    protected function getNamespacesOfMigrationsExecutedBefore(): array
    {
        return [
            'Sylius\Bundle\CoreBundle\Migrations',
        ];
    }
}
