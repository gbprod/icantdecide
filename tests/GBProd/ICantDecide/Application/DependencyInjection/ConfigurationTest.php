<?php

namespace GBProd\ICantDecide\Application\DependencyInjection;

use GBProd\ICantDecide\Application\DependencyInjection\Configuration;

/**
 * Tests for Configuration
 *
 * @author Gilles <gilles@1001pharmacies.com>
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function testGetConfigTreeBuilder()
    {
        $configuration = new Configuration();

        $treeBuilder = $configuration->getConfigTreeBuilder();
        $tree = $treeBuilder->buildTree();

        $this->assertEquals(
            "icantdecide_application",
            $tree->getName()
        );
    }
}
