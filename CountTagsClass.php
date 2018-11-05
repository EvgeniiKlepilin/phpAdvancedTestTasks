<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CountTagsClass
 *
 * @author eugene
 * 
 * Class to handle reading of an HTML Page and 
 * then counting how many given tags are there.
 * Constructor params: string string
 */
class CountTagsClass
{

    private $url;
    private $html;
    private $tag;
    private $tagsNumber;

    public function __construct($url, $tag)
    {
        $this->url = $url;
        $this->tag = $tag;
        $this->getPageContent();
        $this->countTags();
    }

    //read HTML page in a string from given URL
    private function getPageContent()
    {
        $html = file_get_contents($this->url);
        $this->html = $html;
    }

    //count occurrences of given HTML tag in a given page
    private function countTags()
    {
        //$count = substr_count($this->html, $this->tag);
        $countOneBracket = substr_count($this->html, "<" . $this->tag);
        $countTwoBrackets = substr_count($this->html, "<" . $this->tag . ">");
        $this->tagsNumber = $countOneBracket + $countTwoBrackets;
    }

    public function getTagsNumber()
    {
        return $this->tagsNumber;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function getTag()
    {
        return $this->tag;
    }
}
