<?php
class PluginIncludeJs{
  public static function widget_include($data){
    $data = new PluginWfArray($data);
    $filetime = wfFilesystem::getFiletime(wfGlobals::getWebDir().$data->get('data/src'));
    $element = array();
    $element[] = wfDocument::createHtmlElement('script', null, array('src' => $data->get('data/src').'?t='.$filetime, 'type' => 'text/javascript'));
    wfDocument::renderElement($element);
  }
}