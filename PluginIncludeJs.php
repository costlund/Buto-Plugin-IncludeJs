<?php
class PluginIncludeJs{
  public static function widget_include($data){
    /**
     * 
     */
    $data = new PluginWfArray($data);
    /**
     * 
     */
    if(!$data->get('data/src')){
      throw new Exception(__CLASS__.' says: Param data/src is not set!');
    }
    /**
     * 
     */
    if(!wfFilesystem::fileExist(wfGlobals::getWebDir().$data->get('data/src'))){
      throw new Exception(__CLASS__.' says: File '.wfGlobals::getWebDir().$data->get('data/src').' does not exist!');
    }
    /**
     * 
     */
    $filetime = wfFilesystem::getFiletime(wfGlobals::getWebDir().$data->get('data/src'));
    $element = array();
    $element[] = wfDocument::createHtmlElement('script', null, array('src' => $data->get('data/src').'?t='.$filetime, 'type' => 'text/javascript'));
    wfDocument::renderElement($element);
  }
}