Ext.data.JsonP.CKEDITOR_plugins_undo_UndoManager({"tagname":"class","name":"CKEDITOR.plugins.undo.UndoManager","autodetected":{},"files":[{"filename":"plugin.js","href":"plugin98.html#CKEDITOR-plugins-undo-UndoManager"}],"private":true,"members":[{"name":"limit","tagname":"property","owner":"CKEDITOR.plugins.undo.UndoManager","id":"property-limit","meta":{"readonly":true}},{"name":"locked","tagname":"property","owner":"CKEDITOR.plugins.undo.UndoManager","id":"property-locked","meta":{"readonly":true}},{"name":"previousKeyGroup","tagname":"property","owner":"CKEDITOR.plugins.undo.UndoManager","id":"property-previousKeyGroup","meta":{"readonly":true}},{"name":"strokesLimit","tagname":"property","owner":"CKEDITOR.plugins.undo.UndoManager","id":"property-strokesLimit","meta":{"readonly":true}},{"name":"strokesRecorded","tagname":"property","owner":"CKEDITOR.plugins.undo.UndoManager","id":"property-strokesRecorded","meta":{}},{"name":"keyGroups","tagname":"property","owner":"CKEDITOR.plugins.undo.UndoManager","id":"static-property-keyGroups","meta":{"readonly":true,"static":true}},{"name":"navigationKeyCodes","tagname":"property","owner":"CKEDITOR.plugins.undo.UndoManager","id":"static-property-navigationKeyCodes","meta":{"readonly":true,"static":true}},{"name":"constructor","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-constructor","meta":{}},{"name":"getNextImage","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-getNextImage","meta":{}},{"name":"keyGroupChanged","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-keyGroupChanged","meta":{}},{"name":"lock","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-lock","meta":{}},{"name":"redo","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-redo","meta":{}},{"name":"redoable","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-redoable","meta":{}},{"name":"refreshState","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-refreshState","meta":{}},{"name":"reset","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-reset","meta":{}},{"name":"resetType","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-resetType","meta":{}},{"name":"restoreImage","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-restoreImage","meta":{}},{"name":"save","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-save","meta":{}},{"name":"type","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-type","meta":{}},{"name":"undo","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-undo","meta":{}},{"name":"undoable","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-undoable","meta":{}},{"name":"unlock","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-unlock","meta":{}},{"name":"update","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-update","meta":{}},{"name":"updateSelection","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"method-updateSelection","meta":{}},{"name":"getKeyGroup","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"static-method-getKeyGroup","meta":{"static":true}},{"name":"getOppositeKeyGroup","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"static-method-getOppositeKeyGroup","meta":{"static":true}},{"name":"ieFunctionalKeysBug","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"static-method-ieFunctionalKeysBug","meta":{"static":true}},{"name":"isNavigationKey","tagname":"method","owner":"CKEDITOR.plugins.undo.UndoManager","id":"static-method-isNavigationKey","meta":{"static":true}}],"alternateClassNames":[],"aliases":{},"id":"class-CKEDITOR.plugins.undo.UndoManager","component":false,"superclasses":[],"subclasses":[],"mixedInto":[],"mixins":[],"parentMixins":[],"requires":[],"uses":[],"html":"<div><pre class=\"hierarchy\"><h4>Files</h4><div class='dependency'><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager' target='_blank'>plugin.js</a></div></pre><div class='doc-contents'><div class='rounded-box private-box'><p><strong>NOTE:</strong> This is a private utility class for internal use by the framework. Don't rely on its existence.</p></div><p>Main logic for the Redo/Undo feature.</p>\n</div><div class='members'><div class='members-section'><h3 class='members-title icon-property'>Properties</h3><div class='subsection'><div class='definedBy'>Defined By</div><h4 class='members-subtitle'>Instance properties</h3><div id='property-limit' class='member first-child not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-property-limit' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-property-limit' class='name expandable'>limit</a> : Number<span class=\"signature\"><span class='readonly' >readonly</span></span></div><div class='description'><div class='short'>The maximum number of snapshots in the stack. ...</div><div class='long'><p>The maximum number of snapshots in the stack. Configurable via <a href=\"#!/api/CKEDITOR.config-cfg-undoStackSize\" rel=\"CKEDITOR.config-cfg-undoStackSize\" class=\"docClass\">CKEDITOR.config.undoStackSize</a>.</p>\n</div></div></div><div id='property-locked' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-property-locked' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-property-locked' class='name expandable'>locked</a> : Object<span class=\"signature\"><span class='readonly' >readonly</span></span></div><div class='description'><div class='short'>When the locked property is not null, the undo manager is locked, so\noperations like save or update are forbidden. ...</div><div class='long'><p>When the <code>locked</code> property is not <code>null</code>, the undo manager is locked, so\noperations like <code>save</code> or <code>update</code> are forbidden.</p>\n\n<p>The manager can be locked and unlocked by the <a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager-method-lock\" rel=\"CKEDITOR.plugins.undo.UndoManager-method-lock\" class=\"docClass\">lock</a> and <a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager-method-unlock\" rel=\"CKEDITOR.plugins.undo.UndoManager-method-unlock\" class=\"docClass\">unlock</a>\nmethods, respectively.</p>\n<p>Defaults to: <code>null</code></p></div></div></div><div id='property-previousKeyGroup' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-property-previousKeyGroup' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-property-previousKeyGroup' class='name expandable'>previousKeyGroup</a> : Number<span class=\"signature\"><span class='readonly' >readonly</span></span></div><div class='description'><div class='short'>Contains the previously processed key group, based on keyGroups. ...</div><div class='long'><p>Contains the previously processed key group, based on <a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager-static-property-keyGroups\" rel=\"CKEDITOR.plugins.undo.UndoManager-static-property-keyGroups\" class=\"docClass\">keyGroups</a>.\n<code>-1</code> means an unknown group.</p>\n<p>Defaults to: <code>-1</code></p>        <p>Available since: <b>4.4.4</b></p>\n</div></div></div><div id='property-strokesLimit' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-property-strokesLimit' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-property-strokesLimit' class='name expandable'>strokesLimit</a> : Number<span class=\"signature\"><span class='readonly' >readonly</span></span></div><div class='description'><div class='short'>The maximum number of characters typed/deleted in one undo step. ...</div><div class='long'><p>The maximum number of characters typed/deleted in one undo step.</p>\n<p>Defaults to: <code>25</code></p>        <p>Available since: <b>4.4.5</b></p>\n</div></div></div><div id='property-strokesRecorded' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-property-strokesRecorded' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-property-strokesRecorded' class='name expandable'>strokesRecorded</a> : Array<span class=\"signature\"></span></div><div class='description'><div class='short'>An array storing the number of key presses, count in a row. ...</div><div class='long'><p>An array storing the number of key presses, count in a row. Use <a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager-static-property-keyGroups\" rel=\"CKEDITOR.plugins.undo.UndoManager-static-property-keyGroups\" class=\"docClass\">keyGroups</a> members as index.</p>\n\n<p><strong>Note:</strong> The keystroke count will be reset after reaching the limit of characters per snapshot.</p>\n<p>Defaults to: <code>[0, 0]</code></p>        <p>Available since: <b>4.4.4</b></p>\n</div></div></div></div><div class='subsection'><div class='definedBy'>Defined By</div><h4 class='members-subtitle'>Static properties</h3><div id='static-property-keyGroups' class='member first-child not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-static-property-keyGroups' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-static-property-keyGroups' class='name expandable'>keyGroups</a> : Object<span class=\"signature\"><span class='readonly' >readonly</span><span class='static' >static</span></span></div><div class='description'><div class='short'>Key groups identifier mapping. ...</div><div class='long'><p>Key groups identifier mapping. Used for accessing members in\n<a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager-property-strokesRecorded\" rel=\"CKEDITOR.plugins.undo.UndoManager-property-strokesRecorded\" class=\"docClass\">strokesRecorded</a>.</p>\n\n<ul>\n<li><code>FUNCTIONAL</code> &ndash; identifier for the <em>Backspace</em> / <em>Delete</em> key.</li>\n<li><code>PRINTABLE</code> &ndash; identifier for printable keys.</li>\n</ul>\n\n\n<p>Example usage:</p>\n\n<pre><code>undoManager.strokesRecorded[ undoManager.keyGroups.FUNCTIONAL ];\n</code></pre>\n<p>Defaults to: <code>{PRINTABLE: 0, FUNCTIONAL: 1}</code></p>        <p>Available since: <b>4.4.5</b></p>\n</div></div></div><div id='static-property-navigationKeyCodes' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-static-property-navigationKeyCodes' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-static-property-navigationKeyCodes' class='name expandable'>navigationKeyCodes</a> : Object<span class=\"signature\"><span class='readonly' >readonly</span><span class='static' >static</span></span></div><div class='description'><div class='short'>Codes for navigation keys like Arrows, Page Up/Down, etc. ...</div><div class='long'><p>Codes for navigation keys like <em>Arrows</em>, <em>Page Up/Down</em>, etc.\nUsed by the <a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager-static-method-isNavigationKey\" rel=\"CKEDITOR.plugins.undo.UndoManager-static-method-isNavigationKey\" class=\"docClass\">isNavigationKey</a> method.</p>\n<p>Defaults to: <code>{37: 1, 38: 1, 39: 1, 40: 1, 36: 1, 35: 1, 33: 1, 34: 1}</code></p>        <p>Available since: <b>4.4.5</b></p>\n</div></div></div></div></div><div class='members-section'><h3 class='members-title icon-method'>Methods</h3><div class='subsection'><div class='definedBy'>Defined By</div><h4 class='members-subtitle'>Instance methods</h3><div id='method-constructor' class='member first-child not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-constructor' target='_blank' class='view-source'>view source</a></div><strong class='new-keyword'>new</strong><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-constructor' class='name expandable'>CKEDITOR.plugins.undo.UndoManager</a>( <span class='pre'>editor</span> ) : <a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager\" rel=\"CKEDITOR.plugins.undo.UndoManager\" class=\"docClass\">CKEDITOR.plugins.undo.UndoManager</a><span class=\"signature\"></span></div><div class='description'><div class='short'>Creates an UndoManager class instance. ...</div><div class='long'><p>Creates an UndoManager class instance.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>editor</span> : <a href=\"#!/api/CKEDITOR.editor\" rel=\"CKEDITOR.editor\" class=\"docClass\">CKEDITOR.editor</a><div class='sub-desc'>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'><a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager\" rel=\"CKEDITOR.plugins.undo.UndoManager\" class=\"docClass\">CKEDITOR.plugins.undo.UndoManager</a></span><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='method-getNextImage' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-getNextImage' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-getNextImage' class='name expandable'>getNextImage</a>( <span class='pre'>isUndo</span> ) : <a href=\"#!/api/CKEDITOR.plugins.undo.Image\" rel=\"CKEDITOR.plugins.undo.Image\" class=\"docClass\">CKEDITOR.plugins.undo.Image</a><span class=\"signature\"></span></div><div class='description'><div class='short'>Gets the closest available image. ...</div><div class='long'><p>Gets the closest available image.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>isUndo</span> : Boolean<div class='sub-desc'><p>If <code>true</code>, it will return the previous image.</p>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'><a href=\"#!/api/CKEDITOR.plugins.undo.Image\" rel=\"CKEDITOR.plugins.undo.Image\" class=\"docClass\">CKEDITOR.plugins.undo.Image</a></span><div class='sub-desc'><p>Next image or <code>null</code>.</p>\n</div></li></ul></div></div></div><div id='method-keyGroupChanged' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-keyGroupChanged' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-keyGroupChanged' class='name expandable'>keyGroupChanged</a>( <span class='pre'>keyCode</span> ) : Boolean<span class=\"signature\"></span></div><div class='description'><div class='short'>Whether the new keyCode belongs to a different group than the previous one (previousKeyGroup). ...</div><div class='long'><p>Whether the new <code>keyCode</code> belongs to a different group than the previous one (<a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager-property-previousKeyGroup\" rel=\"CKEDITOR.plugins.undo.UndoManager-property-previousKeyGroup\" class=\"docClass\">previousKeyGroup</a>).</p>\n        <p>Available since: <b>4.4.5</b></p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>keyCode</span> : Number<div class='sub-desc'>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>Boolean</span><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='method-lock' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-lock' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-lock' class='name expandable'>lock</a>( <span class='pre'>[dontUpdate], [forceUpdate]</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Locks the snapshot stack to prevent any save/update operations and when necessary,\nupdates the tip of the snapshot st...</div><div class='long'><p>Locks the snapshot stack to prevent any save/update operations and when necessary,\nupdates the tip of the snapshot stack with the DOM changes introduced during the\nlocked period, after the <a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager-method-unlock\" rel=\"CKEDITOR.plugins.undo.UndoManager-method-unlock\" class=\"docClass\">unlock</a> method is called.</p>\n\n<p>It is mainly used to ensure any DOM operations that should not be recorded\n(e.g. auto paragraphing) are not added to the stack.</p>\n\n<p><strong>Note:</strong> For every <code>lock</code> call you must call <a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager-method-unlock\" rel=\"CKEDITOR.plugins.undo.UndoManager-method-unlock\" class=\"docClass\">unlock</a> once to unlock the undo manager.</p>\n        <p>Available since: <b>4.0</b></p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>dontUpdate</span> : Boolean (optional)<div class='sub-desc'><p>When set to <code>true</code>, the last snapshot will not be updated\nwith current content and selection. By default, if undo manager was up to date when the lock started,\nthe last snapshot will be updated to the current state when unlocking. This means that all changes\ndone during the lock will be merged into the previous snapshot or the next one. Use this option to gain\nmore control over this behavior. For example, it is possible to group changes done during the lock into\na separate snapshot.</p>\n</div></li><li><span class='pre'>forceUpdate</span> : Boolean (optional)<div class='sub-desc'><p>When set to <code>true</code>, the last snapshot will always be updated with the\ncurrent content and selection regardless of the current state of the undo manager.\nWhen not set, the last snapshot will be updated only if the undo manager was up to date when locking.\nAdditionally, this option makes it possible to lock the snapshot when the editor is not in the <code>wysiwyg</code> mode,\nbecause when it is passed, the snapshots will not need to be compared.</p>\n</div></li></ul></div></div></div><div id='method-redo' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-redo' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-redo' class='name expandable'>redo</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Performs a redo operation on current index. ...</div><div class='long'><p>Performs a redo operation on current index.</p>\n</div></div></div><div id='method-redoable' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-redoable' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-redoable' class='name expandable'>redoable</a>( <span class='pre'></span> ) : Boolean<span class=\"signature\"></span></div><div class='description'><div class='short'>Checks the current redo state. ...</div><div class='long'><p>Checks the current redo state.</p>\n<h3 class='pa'>Returns</h3><ul><li><span class='pre'>Boolean</span><div class='sub-desc'><p>Whether the document has a previous state to retrieve.</p>\n</div></li></ul></div></div></div><div id='method-refreshState' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-refreshState' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-refreshState' class='name expandable'>refreshState</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Refreshes the state of the undo manager\nas well as the state of the undo and redo commands. ...</div><div class='long'><p>Refreshes the state of the <a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager\" rel=\"CKEDITOR.plugins.undo.UndoManager\" class=\"docClass\">undo manager</a>\nas well as the state of the <code>undo</code> and <code>redo</code> commands.</p>\n</div></div></div><div id='method-reset' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-reset' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-reset' class='name expandable'>reset</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Resets the undo stack. ...</div><div class='long'><p>Resets the undo stack.</p>\n</div></div></div><div id='method-resetType' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-resetType' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-resetType' class='name expandable'>resetType</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Resets all typing variables. ...</div><div class='long'><p>Resets all typing variables.</p>\n\n<h1>type</h1>\n</div></div></div><div id='method-restoreImage' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-restoreImage' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-restoreImage' class='name expandable'>restoreImage</a>( <span class='pre'>image</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Sets editor content/selection to the one stored in image. ...</div><div class='long'><p>Sets editor content/selection to the one stored in <code>image</code>.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>image</span> : <a href=\"#!/api/CKEDITOR.plugins.undo.Image\" rel=\"CKEDITOR.plugins.undo.Image\" class=\"docClass\">CKEDITOR.plugins.undo.Image</a><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='method-save' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-save' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-save' class='name expandable'>save</a>( <span class='pre'>onContentOnly, image, [autoFireChange]</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Saves a snapshot of the document image for later retrieval. ...</div><div class='long'><p>Saves a snapshot of the document image for later retrieval.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>onContentOnly</span> : Boolean<div class='sub-desc'><p>If set to <code>true</code>, the snapshot will be saved only if the content has changed.</p>\n</div></li><li><span class='pre'>image</span> : <a href=\"#!/api/CKEDITOR.plugins.undo.Image\" rel=\"CKEDITOR.plugins.undo.Image\" class=\"docClass\">CKEDITOR.plugins.undo.Image</a><div class='sub-desc'><p>An optional image to save. If skipped, current editor will be used.</p>\n</div></li><li><span class='pre'>autoFireChange</span> : Boolean (optional)<div class='sub-desc'><p>If set to <code>false</code>, will not trigger the <a href=\"#!/api/CKEDITOR.editor-event-change\" rel=\"CKEDITOR.editor-event-change\" class=\"docClass\">CKEDITOR.editor.change</a> event to editor.</p>\n<p>Defaults to: <code>true</code></p></div></li></ul></div></div></div><div id='method-type' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-type' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-type' class='name expandable'>type</a>( <span class='pre'>keyCode, [strokesPerSnapshotExceeded]</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Handles keystroke support for the undo manager. ...</div><div class='long'><p>Handles keystroke support for the undo manager. It is called on <code>keyup</code> event for\nkeystrokes that can change the editor content.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>keyCode</span> : Number<div class='sub-desc'><p>The key code.</p>\n</div></li><li><span class='pre'>strokesPerSnapshotExceeded</span> : Boolean (optional)<div class='sub-desc'><p>When set to <code>true</code>, the method will\nbehave as if the strokes limit was exceeded regardless of the <a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager-property-strokesRecorded\" rel=\"CKEDITOR.plugins.undo.UndoManager-property-strokesRecorded\" class=\"docClass\">strokesRecorded</a> value.</p>\n</div></li></ul></div></div></div><div id='method-undo' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-undo' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-undo' class='name expandable'>undo</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Performs an undo operation on current index. ...</div><div class='long'><p>Performs an undo operation on current index.</p>\n</div></div></div><div id='method-undoable' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-undoable' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-undoable' class='name expandable'>undoable</a>( <span class='pre'></span> ) : Boolean<span class=\"signature\"></span></div><div class='description'><div class='short'>Checks the current undo state. ...</div><div class='long'><p>Checks the current undo state.</p>\n<h3 class='pa'>Returns</h3><ul><li><span class='pre'>Boolean</span><div class='sub-desc'><p>Whether the document has a future state to restore.</p>\n</div></li></ul></div></div></div><div id='method-unlock' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-unlock' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-unlock' class='name expandable'>unlock</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Unlocks the snapshot stack and checks to amend the last snapshot. ...</div><div class='long'><p>Unlocks the snapshot stack and checks to amend the last snapshot.</p>\n\n<p>See <a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager-method-lock\" rel=\"CKEDITOR.plugins.undo.UndoManager-method-lock\" class=\"docClass\">lock</a> for more details.</p>\n        <p>Available since: <b>4.0</b></p>\n</div></div></div><div id='method-update' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-update' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-update' class='name expandable'>update</a>( <span class='pre'>[newImage]</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Updates the last snapshot of the undo stack with the current editor content. ...</div><div class='long'><p>Updates the last snapshot of the undo stack with the current editor content.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>newImage</span> : <a href=\"#!/api/CKEDITOR.plugins.undo.Image\" rel=\"CKEDITOR.plugins.undo.Image\" class=\"docClass\">CKEDITOR.plugins.undo.Image</a> (optional)<div class='sub-desc'><p>The image which will replace the current one.\nIf it is not set, it defaults to the image taken from the editor.</p>\n</div></li></ul></div></div></div><div id='method-updateSelection' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-method-updateSelection' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-method-updateSelection' class='name expandable'>updateSelection</a>( <span class='pre'>newSnapshot</span> ) : Boolean<span class=\"signature\"></span></div><div class='description'><div class='short'>Amends the last snapshot and changes its selection (only in case when content\nis equal between these two). ...</div><div class='long'><p>Amends the last snapshot and changes its selection (only in case when content\nis equal between these two).</p>\n        <p>Available since: <b>4.4.4</b></p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>newSnapshot</span> : <a href=\"#!/api/CKEDITOR.plugins.undo.Image\" rel=\"CKEDITOR.plugins.undo.Image\" class=\"docClass\">CKEDITOR.plugins.undo.Image</a><div class='sub-desc'><p>New snapshot with new selection.</p>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>Boolean</span><div class='sub-desc'><p>Returns <code>true</code> if selection was amended.</p>\n</div></li></ul></div></div></div></div><div class='subsection'><div class='definedBy'>Defined By</div><h4 class='members-subtitle'>Static methods</h3><div id='static-method-getKeyGroup' class='member first-child not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-static-method-getKeyGroup' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-static-method-getKeyGroup' class='name expandable'>getKeyGroup</a>( <span class='pre'>keyCode</span> ) : Number<span class=\"signature\"><span class='static' >static</span></span></div><div class='description'><div class='short'>Returns the group to which the passed keyCode belongs. ...</div><div class='long'><p>Returns the group to which the passed <code>keyCode</code> belongs.</p>\n        <p>Available since: <b>4.4.5</b></p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>keyCode</span> : Number<div class='sub-desc'>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>Number</span><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='static-method-getOppositeKeyGroup' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-static-method-getOppositeKeyGroup' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-static-method-getOppositeKeyGroup' class='name expandable'>getOppositeKeyGroup</a>( <span class='pre'>keyGroup</span> ) : Number<span class=\"signature\"><span class='static' >static</span></span></div><div class='description'><div class='short'> ...</div><div class='long'>\n        <p>Available since: <b>4.4.5</b></p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>keyGroup</span> : Number<div class='sub-desc'>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>Number</span><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='static-method-ieFunctionalKeysBug' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-static-method-ieFunctionalKeysBug' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-static-method-ieFunctionalKeysBug' class='name expandable'>ieFunctionalKeysBug</a>( <span class='pre'>keyCode</span> ) : Boolean<span class=\"signature\"><span class='static' >static</span></span></div><div class='description'><div class='short'>Whether we need to use a workaround for functional (Backspace, Delete) keys not firing\nthe keypress event in Internet...</div><div class='long'><p>Whether we need to use a workaround for functional (<em>Backspace</em>, <em>Delete</em>) keys not firing\nthe <code>keypress</code> event in Internet Explorer in this environment and for the specified <code>keyCode</code>.</p>\n        <p>Available since: <b>4.4.5</b></p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>keyCode</span> : Number<div class='sub-desc'>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>Boolean</span><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='static-method-isNavigationKey' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.plugins.undo.UndoManager'>CKEDITOR.plugins.undo.UndoManager</span><br/><a href='source/plugin98.html#CKEDITOR-plugins-undo-UndoManager-static-method-isNavigationKey' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.plugins.undo.UndoManager-static-method-isNavigationKey' class='name expandable'>isNavigationKey</a>( <span class='pre'>keyCode</span> ) : Boolean<span class=\"signature\"><span class='static' >static</span></span></div><div class='description'><div class='short'>Checks whether a key is one of navigation keys (Arrows, Page Up/Down, etc.). ...</div><div class='long'><p>Checks whether a key is one of navigation keys (<em>Arrows</em>, <em>Page Up/Down</em>, etc.).\nSee also the <a href=\"#!/api/CKEDITOR.plugins.undo.UndoManager-static-property-navigationKeyCodes\" rel=\"CKEDITOR.plugins.undo.UndoManager-static-property-navigationKeyCodes\" class=\"docClass\">navigationKeyCodes</a> property.</p>\n        <p>Available since: <b>4.4.5</b></p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>keyCode</span> : Number<div class='sub-desc'>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>Boolean</span><div class='sub-desc'>\n</div></li></ul></div></div></div></div></div></div></div>","meta":{"private":true}});