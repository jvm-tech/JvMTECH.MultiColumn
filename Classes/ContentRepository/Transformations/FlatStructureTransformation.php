<?php
namespace JvMTECH\MultiColumn\ContentRepository\Transformations;

/*
 * This file is part of the JvMTECH.MultiColumn package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\ContentRepository\Migration\Transformations\AbstractTransformation;
use Neos\ContentRepository\Domain\Model\NodeData;
use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Neos\Controller\CreateContentContextTrait;

/**
 * Move content of collections to the container
 */
class FlatStructureTransformation extends AbstractTransformation
{
    use CreateContentContextTrait;

    /**
     * @var string
     */
    protected $nodeType = 'Neos.Neos:ContentCollection';

    /**
     * @param string $nodeType
     * @return void
     */
    public function setNodeType($nodeType)
    {
        $this->nodeType = $nodeType;
    }

    /**
     * @param NodeData $node
     * @return boolean
     */
    public function isTransformable(NodeData $node)
    {
        $numberOfChildNodes = $node->getNumberOfChildNodes($this->nodeType, $node->getWorkspace(), $node->getDimensions());
        return ($numberOfChildNodes > 0);
    }

    /**
     * @param NodeData $node
     * @return void
     */
    public function execute(NodeData $node)
    {
        $contentContext = $this->createContentContext('live', []);
        $containerNode = $contentContext->getNodeByIdentifier($node->getIdentifier());
        $contentCollections = $containerNode->getChildNodes($this->nodeType);

        foreach ($contentCollections as $contentCollection) {
            /** @var NodeInterface $contentCollection */
            if ($contentCollection->hasChildNodes()) {
                $this->moveChildNodes($contentCollection->getChildNodes(), $containerNode);
                $contentCollection->remove();
            }
        }
    }

    /**
     * @param array $children
     * @param NodeInterface $container
     */
    protected function moveChildNodes(array $children, NodeInterface $container)
    {
        foreach ($children as $childNode) {
            if ($childNode instanceof NodeInterface) {
                $childNode->moveInto($container);
            }
        }
    }
}
