# Buto-Plugin-IncludeJs
Include script or link (js or css extension) element with time param to force browser to download latest version. The file must exist in web root folder.

##PHP
```
wfPlugin::enable('include/js');
wfDocument::createWidget('include/js', 'include', array('src' => '/plugin/_folder_one_/_folder_two_/function.js'));
```

##YML
```
type: widget
data:
  plugin: 'include/js'
  method: include
  data:
    src: '/plugin/_folder_one_/_folder_two_/function.js'
```

##Param src as array
One could set param src as array to include multiple files.
```
type: widget
data:
  plugin: 'include/js'
  method: include
  data:
    src:
      - '/plugin/_folder_one_/_folder_two_/function.js'
      - '/plugin/_folder_one_/_folder_two_/style.css'
```
