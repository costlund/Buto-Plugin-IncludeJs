# Buto-Plugin-IncludeJs
Include script element with time param to force browser to download lates version.


Via PHP.
```
wfPlugin::enable('include/js');
wfDocument::createWidget('include/js', 'include', array('src' => '/plugin/_folder_one_/_folder_two_/function.js'));
```


Via YML.
```
type: widget
data:
  plugin: 'include/js'
  method: include
  data:
    src: '/plugin/_folder_one_/_folder_two_/function.js'
```


