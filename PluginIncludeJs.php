<?php
class PluginIncludeJs{
  public static function widget_include($data){
    /**
     *
     */
    $self = new PluginIncludeJs();
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
    $element = array();
    if(!is_array($data->get('data/src'))){
      /**
       * 
       */
      if(!wfFilesystem::fileExist(wfGlobals::getWebDir().$data->get('data/src'))){
        throw new Exception(__CLASS__.' says: File '.wfGlobals::getWebDir().$data->get('data/src').' does not exist!');
      }
      /**
       * 
       */
      $element[] = $self->get_element($data->get('data/src'));
    }else{
      foreach ($data->get('data/src') as $value) {
        /**
         * 
         */
        if(!wfFilesystem::fileExist(wfGlobals::getWebDir().$value)){
          throw new Exception(__CLASS__.' says: File '.wfGlobals::getWebDir().$value.' does not exist!');
        }
        $element[] = $self->get_element($value);
      }
    }
    wfDocument::renderElement($element);
  }
  public function get_element($value){
    $filetime = wfFilesystem::getFiletime(wfGlobals::getWebDir().$value);
    $extension = strtolower(pathinfo($value, PATHINFO_EXTENSION));
    if($extension=='js'){
      $element = wfDocument::createHtmlElement('script', null, array('src' => $value.'?t='.$filetime, 'type' => 'text/javascript'));
    }elseif($extension=='css'){
      $element = wfDocument::createHtmlElement('link', null, array('href' => $value.'?t='.$filetime, 'rel' => 'stylesheet'));
    }else{
      throw new Exception(__CLASS__.' says: File '.wfGlobals::getWebDir().$value.' must have extension js or css!');
    }
    return $element;
  }
}
