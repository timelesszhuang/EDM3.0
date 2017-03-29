Ext.data.JsonP.CKEDITOR_tools_style_parse({"tagname":"class","name":"CKEDITOR.tools.style.parse","autodetected":{},"files":[{"filename":"tools.js","href":"tools.html#CKEDITOR-tools-style-parse"}],"since":"4.6.1","members":[{"name":"_findColor","tagname":"method","owner":"CKEDITOR.tools.style.parse","id":"method-_findColor","meta":{"private":true}},{"name":"background","tagname":"method","owner":"CKEDITOR.tools.style.parse","id":"method-background","meta":{}},{"name":"margin","tagname":"method","owner":"CKEDITOR.tools.style.parse","id":"method-margin","meta":{}}],"alternateClassNames":[],"aliases":{},"id":"class-CKEDITOR.tools.style.parse","component":false,"superclasses":[],"subclasses":[],"mixedInto":[],"mixins":[],"parentMixins":[],"requires":[],"uses":[],"html":"<div><pre class=\"hierarchy\"><h4>Files</h4><div class='dependency'><a href='source/tools.html#CKEDITOR-tools-style-parse' target='_blank'>tools.js</a></div></pre><div class='doc-contents'><p>The namespace with helper functions to parse some common CSS properties.</p>\n        <p>Available since: <b>4.6.1</b></p>\n</div><div class='members'><div class='members-section'><div class='definedBy'>Defined By</div><h3 class='members-title icon-method'>Methods</h3><div class='subsection'><div id='method-_findColor' class='member first-child not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.tools.style.parse'>CKEDITOR.tools.style.parse</span><br/><a href='source/tools.html#CKEDITOR-tools-style-parse-method-_findColor' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.tools.style.parse-method-_findColor' class='name expandable'>_findColor</a>( <span class='pre'>value</span> ) : String[]<span class=\"signature\"><span class='private' >private</span></span></div><div class='description'><div class='short'>Searches the value for any CSS color occurrences and returns it. ...</div><div class='long'><p>Searches the <code>value</code> for any CSS color occurrences and returns it.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>value</span> : String<div class='sub-desc'>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>String[]</span><div class='sub-desc'><p>An array of matched results.</p>\n</div></li></ul></div></div></div><div id='method-background' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.tools.style.parse'>CKEDITOR.tools.style.parse</span><br/><a href='source/tools.html#CKEDITOR-tools-style-parse-method-background' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.tools.style.parse-method-background' class='name expandable'>background</a>( <span class='pre'>value</span> ) : Object<span class=\"signature\"></span></div><div class='description'><div class='short'>Parses the value used as a background property shorthand and returns information as an object. ...</div><div class='long'><p>Parses the <code>value</code> used as a <code>background</code> property shorthand and returns information as an object.</p>\n\n<p><strong>Note:</strong> Currently only the <code>color</code> property is extracted. Any other parts will go into the <code>unprocessed</code> property.</p>\n\n<pre><code>var background = <a href=\"#!/api/CKEDITOR.tools.style.parse-method-background\" rel=\"CKEDITOR.tools.style.parse-method-background\" class=\"docClass\">CKEDITOR.tools.style.parse.background</a>( '#0C0 url(foo.png)' );\nconsole.log( background );\n// Logs: { color: '#0C0', unprocessed: 'url(foo.png)' }\n</code></pre>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>value</span> : String<div class='sub-desc'><p>The value of the <code>background</code> property.</p>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>Object</span><div class='sub-desc'><p>An object with information extracted from the background.</p>\n<ul><li><span class='pre'>color</span> : String<div class='sub-desc'><p>The <strong>first</strong> color value found. The color format remains the same as in input.</p>\n</div></li><li><span class='pre'>unprocessed</span> : String<div class='sub-desc'><p>The remaining part of the <code>value</code> that has not been processed.</p>\n</div></li></ul></div></li></ul></div></div></div><div id='method-margin' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.tools.style.parse'>CKEDITOR.tools.style.parse</span><br/><a href='source/tools.html#CKEDITOR-tools-style-parse-method-margin' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.tools.style.parse-method-margin' class='name expandable'>margin</a>( <span class='pre'>value</span> ) : Object<span class=\"signature\"></span></div><div class='description'><div class='short'>Parses the margin CSS property shorthand format. ...</div><div class='long'><p>Parses the <code>margin</code> CSS property shorthand format.</p>\n\n<pre><code>console.log( CKEDITOR.tools.parse.margin( '3px 0 2' ) );\n// Logs: { top: \"3px\", right: \"0\", bottom: \"2\", left: \"0\" }\n</code></pre>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>value</span> : String<div class='sub-desc'><p>The <code>margin</code> property value.</p>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>Object</span><div class='sub-desc'>\n<ul><li><span class='pre'>top</span> : Number<div class='sub-desc'><p>Top margin.</p>\n</div></li><li><span class='pre'>right</span> : Number<div class='sub-desc'><p>Right margin.</p>\n</div></li><li><span class='pre'>bottom</span> : Number<div class='sub-desc'><p>Bottom margin.</p>\n</div></li><li><span class='pre'>left</span> : Number<div class='sub-desc'><p>Left margin.</p>\n</div></li></ul></div></li></ul></div></div></div></div></div></div></div>","meta":{}});