<?php

/*
 * (c) Pierre-Yves Dick <hello@pierreyvesdick.fr>
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Pyrrah\Bundle\OpenWeatherMap\DependencyInjection;

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
            ->root('pyrrah_openweathermap')
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
