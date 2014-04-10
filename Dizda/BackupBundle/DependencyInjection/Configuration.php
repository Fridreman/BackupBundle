<?php

namespace Dizda\BackupBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dizda_backup');

        $rootNode
        ->children()
            ->scalarNode('output_file_prefix')->defaultValue(gethostname())->end()
            ->arrayNode('databases')
                ->children()
                    ->arrayNode('mongodb')
                        ->children()
                            ->booleanNode('all_databases')->defaultTrue()->end()
                            ->scalarNode('database')->defaultFalse()->end()
                            ->scalarNode('db_host')->defaultValue('localhost')->end()
                            ->scalarNode('db_port')->defaultValue(27017)->end()
                            ->scalarNode('db_user')->defaultValue(null)->end()
                            ->scalarNode('db_password')->defaultValue(null)->end()
                        ->end()
                    ->end()
                    ->arrayNode('mysql')
                        ->children()
                            ->booleanNode('all_databases')->defaultTrue()->end()
                            ->scalarNode('database')->defaultNull()->end()
                            ->scalarNode('db_host')->defaultNull()->end()
                            ->scalarNode('db_port')->defaultValue(3306)->end()
                            ->scalarNode('db_user')->defaultNull()->end()
                            ->scalarNode('db_password')->defaultNull()->end()
                        ->end()
                    ->end()
                    ->arrayNode('postgresql')
                        ->children()
                            ->scalarNode('database')->defaultNull()->end()
                            ->scalarNode('db_host')->defaultValue('localhost')->end()
                            ->scalarNode('db_port')->defaultValue(5432)->end()
                            ->scalarNode('db_user')->defaultNull()->end()
                            ->scalarNode('db_password')->defaultNull()->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
