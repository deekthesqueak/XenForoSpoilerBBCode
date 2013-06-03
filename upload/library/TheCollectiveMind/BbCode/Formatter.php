<?php

class TheCollectiveMind_BbCode_Formatter extends XFCP_TheCollectiveMind_BbCode_Formatter
{
    /**
     * Post tags
     * @var array
     */
    protected $_tags;

    /**
     * Get current set of tags and add the spoiler
     * 
     * @return array Available tags
     */
    public function getTags()
    {
        $this->_tags = parent::getTags();

        $this->_tags['spoiler'] = array(
            'trimLeadingLinesAfter' => 1,
            'callback' => array($this, 'renderTagSpoiler')
        );

        return $this->_tags;
    }

    /**
     * [renderTagSpoiler description]
     * 
     * @param array $tag            [description]
     * @param array $rendererStates [description]
     * 
     * @return string Template output
     */
    public function renderTagSpoiler(array $tag, array $rendererStates)
    {
        $content = $this->renderSubTree($tag['children'], $rendererStates);
        $spoiler = $tag['option'];

        if ($this->_view) {
            $template = $this->_view->createTemplateObject(
                'TheCollectiveMind_Spoiler', array(
                    'content' => $content,
                    'spoiler' => $spoiler
                )
            );
            return $template->render();
        }
    }
}