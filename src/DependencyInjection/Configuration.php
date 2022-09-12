<?php

namespace Pyrrah\OpenWeatherMapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('pyrrah_open_weather_map');

        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root('pyrrah_open_weather_map');
        }

        $rootNode
                ->children()
                    ->scalarNode('api_key')->defaultValue('element_to_define')->end()
                    ->scalarNode('api_url')->defaultValue('http://api.openweathermap.org/data/2.5/')->end()
                    ->scalarNode('units')->defaultValue('metric')->end()
                    ->scalarNode('language')->defaultValue('en')->end()
                ->end();

        return $treeBuilder;
    }
}
