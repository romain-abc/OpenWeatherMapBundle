<?php

namespace Pyrrah\OpenWeatherMapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $treeBuilder
            ->root('pyrrah_open_weather_map')
                ->children()
                    ->scalarNode('api_key')->isRequired()->cannotBeEmpty()->end()
                    ->scalarNode('api_url')->defaultValue(null)->end()
                    ->scalarNode('units')->defaultValue(null)->end()
                    ->scalarNode('language')->defaultValue(null)->end()
                ->end()
        ;

        return $treeBuilder;
    }
}
