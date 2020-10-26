<?php
namespace Neos\Flow\Core\Migrations;

/*
 * This file is part of the JvMTECH.MultiColumn package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

class Version20201022140500 extends AbstractMigration
{
    /**
     * @return string
     */
    public function getIdentifier()
    {
        return 'JvMTECH.MultiColumn-20201022140500';
    }

    /**
     * @return void
     */
    public function up()
    {
        $this->searchAndReplace('WebExcess.MultiColumn:Row', 'JvMTECH.MultiColumn:Content.Row', ['yaml', 'fusion']);
        $this->searchAndReplace('WebExcess.MultiColumn:Column', 'JvMTECH.MultiColumn:Content.Column', ['yaml', 'fusion']);
        $this->searchAndReplace('WebExcess.MultiColumn:Break', 'JvMTECH.MultiColumn:Content.Break', ['yaml']);

        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Column.Offset', 'JvMTECH.MultiColumn:Mixin.Column.Offset', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Column.Offset.All', 'JvMTECH.MultiColumn:Mixin.Column.Offset.All', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Column.Offset.SM', 'JvMTECH.MultiColumn:Mixin.Column.Offset.SM', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Column.Offset.MD', 'JvMTECH.MultiColumn:Mixin.Column.Offset.MD', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Column.Offset.LG', 'JvMTECH.MultiColumn:Mixin.Column.Offset.LG', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Column.Offset.XL', 'JvMTECH.MultiColumn:Mixin.Column.Offset.XL', ['yaml']);

        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Column.Width', 'JvMTECH.MultiColumn:Mixin.Column.Width', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Column.Width.All', 'JvMTECH.MultiColumn:Mixin.Column.Width.All', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Column.Width.SM', 'JvMTECH.MultiColumn:Mixin.Column.Width.SM', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Column.Width.MD', 'JvMTECH.MultiColumn:Mixin.Column.Width.MD', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Column.Width.LG', 'JvMTECH.MultiColumn:Mixin.Column.Width.LG', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Column.Width.XL', 'JvMTECH.MultiColumn:Mixin.Column.Width.XL', ['yaml']);

        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Row.Alignment', 'JvMTECH.MultiColumn:Mixin.Row.Alignment', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Row.Alignment.All', 'JvMTECH.MultiColumn:Mixin.Row.Alignment.All', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Row.Alignment.SM', 'JvMTECH.MultiColumn:Mixin.Row.Alignment.SM', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Row.Alignment.MD', 'JvMTECH.MultiColumn:Mixin.Row.Alignment.MD', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Row.Alignment.LG', 'JvMTECH.MultiColumn:Mixin.Row.Alignment.LG', ['yaml']);
        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Row.Alignment.XL', 'JvMTECH.MultiColumn:Mixin.Row.Alignment.XL', ['yaml']);

        $this->searchAndReplace('WebExcess.MultiColumn:Mixin.Row.Dialog', 'JvMTECH.MultiColumn:Mixin.Row.CreationDialog', ['yaml']);

        $this->processConfiguration(
            'NodeTypes',
            function (&$configuration) {
                foreach ($configuration as &$nodeType) {
                    if (isset($nodeType['superTypes']) && isset($nodeType['superTypes']['WebExcess.MultiColumn:Constraint.Column.Allowed'])) {
                        unset($nodeType['superTypes']['WebExcess.MultiColumn:Constraint.Column.Allowed']);
                    }
                }
            },
            true
        );
    }
}
