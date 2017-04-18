Ext.data.JsonP.dev_codesnippetgeshi({"guide":"<!--\nCopyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.\nFor licensing, see LICENSE.md.\n-->\n\n\n<h1 id='dev_codesnippetgeshi-section-inserting-code-snippets-using-geshi'>Inserting Code Snippets Using GeSHi</h1>\n<div class='toc'>\n<p><strong>Contents</strong></p>\n<ol>\n<li><a href='#!/guide/dev_codesnippetgeshi-section-requirements'>Requirements</a></li>\n<li>\n<a href='#!/guide/dev_codesnippetgeshi-section-installation'>Installation</a><ol>\n<li>\n<a href='#!/guide/dev_codesnippetgeshi-section-back-end-configuration'>Back-end Configuration</a></li>\n<li>\n<a href='#!/guide/dev_codesnippetgeshi-section-editor-configuration'>Editor Configuration</a></li>\n<li>\n<a href='#!/guide/dev_codesnippetgeshi-section-summary'>Summary</a></li></ol></ol>\n</div>\n\n<p class=\"requirements\">\n    This feature was introduced in <strong>CKEditor 4.4</strong>. It is provided through optional plugins that are not included in the CKEditor presets available from the <a href=\"http://ckeditor.com/download\">Download</a> site and <a href=\"#!/guide/dev_widget_installation\">need to be added to your custom build</a> with <a href=\"http://ckeditor.com/builder\">CKBuilder</a>.\n</p>\n\n\n<p>The <a href=\"http://ckeditor.com/addon/codesnippetgeshi\">Code Snippet GeSHi</a> plugin is an extension of the <a href=\"#!/guide/dev_codesnippet\">Code Snippet</a> plugin, which uses the <a href=\"http://qbnz.com/highlighter/\">GeSHi</a> PHP server-side syntax highlighting engine instead of the default, client-side <a href=\"http://highlightjs.org\">highlight.js</a> library.</p>\n\n<p><p><img src=\"guides/dev_codesnippetgeshi/codesnippetgeshi_01.png\" alt=\"\" width=\"964\" height=\"349\"></p></p>\n\n<h2 id='dev_codesnippetgeshi-section-requirements'>Requirements</h2>\n\n<ul>\n<li>CKEditor 4.4+,</li>\n<li>PHP 4.4+,</li>\n<li>A modern web browser or <strong>IE9+</strong>,</li>\n<li>CKEditor plugin dependencies &mdash; these will be resolved automatically if you follow the recommended CKBuilder installation process.</li>\n</ul>\n\n\n<h2 id='dev_codesnippetgeshi-section-installation'>Installation</h2>\n\n<h3 id='dev_codesnippetgeshi-section-back-end-configuration'>Back-end Configuration</h3>\n\n<p>First of all you need to add both the Code Snippet GeSHi plugin and its dependencies to your CKEditor build and also install the GeSHi library itself.</p>\n\n<ol>\n<li>Add the <a href=\"http://ckeditor.com/addon/codesnippetgeshi\">Code Snippet GeSHi</a> plugin to your build (as explained in the <a href=\"#!/guide/dev_widget_installation\">Installing Widgets</a> article). Mind the dependencies &mdash; these will be resolved automatically by <a href=\"http://ckeditor.com/builder\">CKBuilder</a>.</li>\n<li>Download the GeSHi library from the Download page at the <a href=\"http://qbnz.com/highlighter\">GeSHi website</a>.</li>\n<li>Create a <code>lib</code> directory next to your <code>ckeditor</code> directory.</li>\n<li>Extract GeSHi files to the chosen location &mdash; for example into the <code>lib/geshi/</code> directory.</li>\n<li><p>Create a <code>colorize.php</code> file (e.g. in the <code>lib/</code> directory) and set its content to the following:</p>\n\n<pre><code> &lt;?php\n\n if ( function_exists( 'stream_resolve_include_path' ) &amp;&amp; stream_resolve_include_path( 'geshi/geshi.php' ) === FALSE ) {\n     die( '&lt;pre class=\"html\"&gt;Please install the GeSHi library. Refer to plugins/codesnippetgeshi/README.md for more information.&lt;/pre&gt;' );\n }\n\n include_once 'geshi/geshi.php';\n\n $json_string = file_get_contents( 'php://input' );\n $json_object = json_decode( $json_string );\n\n $geshi = new GeSHi( $json_object-&gt;html, $json_object-&gt;lang );\n\n echo $geshi-&gt;parse_code();\n</code></pre>\n\n<p> This file will be queried each time the syntax highlighting is needed.</p></li>\n<li><p>At this point you may have a following directory structure:</p>\n\n<pre><code> lib/\n     geshi/\n         &lt;GeSHi directories...&gt;\n         geshi.php\n     colorize.php\n ckeditor/\n     &lt;CKEditor files and directories...&gt;\n     ckeditor.js\n</code></pre></li>\n</ol>\n\n\n<p class=\"tip\">\n    It is a good practice to place external libraries outside the CKEditor directory as it makes <a href=\"#!/guide/dev_upgrade\">future updates</a> easier.\n</p>\n\n\n<h3 id='dev_codesnippetgeshi-section-editor-configuration'>Editor Configuration</h3>\n\n<p>Go to your <a href=\"#!/guide/dev_configuration\">CKEditor configuration</a> and set the <a href=\"#!/api/CKEDITOR.config-cfg-codeSnippetGeshi_url\" rel=\"CKEDITOR.config-cfg-codeSnippetGeshi_url\" class=\"docClass\">CKEDITOR.config.codeSnippetGeshi_url</a> option. For example for in-page configuration you can use the following code:</p>\n\n<pre><code><a href=\"#!/api/CKEDITOR-method-replace\" rel=\"CKEDITOR-method-replace\" class=\"docClass\">CKEDITOR.replace</a>( 'editor1', {\n    extraPlugins: 'codesnippetgeshi',\n    codeSnippetGeshi_url: '../lib/colorize.php'\n} );\n</code></pre>\n\n<p>You can find more information about setting configuration in the <a href=\"#!/guide/dev_configuration\">Setting Configuration guide</a>.</p>\n\n<p><strong>Note:</strong> The value of the <a href=\"#!/api/CKEDITOR.config-cfg-codeSnippetGeshi_url\" rel=\"CKEDITOR.config-cfg-codeSnippetGeshi_url\" class=\"docClass\">CKEDITOR.config.codeSnippetGeshi_url</a> option might also be set to an absolute URL.</p>\n\n<h3 id='dev_codesnippetgeshi-section-summary'>Summary</h3>\n\n<p>This tutorial uses the <code>lib/</code> directory as an example of organizing the directory structure outside CKEditor. Most likely you will want to adjust it to match your needs, but remember to update the path in the <a href=\"#!/api/CKEDITOR.config-cfg-codeSnippetGeshi_url\" rel=\"CKEDITOR.config-cfg-codeSnippetGeshi_url\" class=\"docClass\">CKEDITOR.config.codeSnippetGeshi_url</a> configuration option.</p>\n\n<p>You can now open your page with CKEditor and insert some code into its content by using the <strong>Insert code snippet</strong> feature. As long as the <a href=\"#!/guide/dev_codesnippetgeshi\">Code Snippet GeSHi</a> plugin is enabled, it will send Ajax requests to the GeSHi adapter file set in the <a href=\"#!/api/CKEDITOR.config-cfg-codeSnippetGeshi_url\" rel=\"CKEDITOR.config-cfg-codeSnippetGeshi_url\" class=\"docClass\">CKEDITOR.config.codeSnippetGeshi_url</a> configuration option.</p>\n","title":"Code Snippets (GeSHi)","meta_description":"Using GeSHi syntax highlighter in CKEditor.","meta_keywords":"ckeditor, editor, wysiwyg, code, snippet, snippets, coloring, syntax, highlighting, geshi, widget, widgets, configure, configuration, setup, settings, options, customization, customize, customise, customisation, config, modification, modify, change"});