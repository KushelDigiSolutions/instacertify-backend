// Simple JavaScript Templating
// John Resig - https://johnresig.com/ - MIT Licensed
(function(){
  var cache = {};
  var startTag = "{%";
  var endTag = "%}";
  var re1 = new RegExp(`((^|${endTag})[^\t]*)'`,"g");
  var re2 = new RegExp(`\t=(.*?)${endTag}`,"g");
	
  this.tmpl = function tmpl(str, data){
    // Figure out if we're getting a template, or if we need to
    // load the template - and be sure to cache the result.
	var fn = /^[-a-zA-Z0-9]+$/.test(str) ?
      cache[str] = cache[str] ||
        tmpl(document.getElementById(str).innerHTML) :

      // Generate a reusable function that will serve as a template
      // generator (and which will be cached).
      new Function("obj",
        "var p=[],print=function(){p.push.apply(p,arguments);};" +

        // Introduce the data as local variables using with(){}
        "with(obj){p.push('" +

        // Convert the template into pure JavaScript
        str
          .replace(/[\r\t\n]/g, " ")
          .split(startTag).join("\t")
          .replace(re1, "$1\r")
          .replace(re2, "',$1,'")
          .split("\t").join("');")
          .split(endTag).join("p.push('")
          .split("\r").join("\\'")
      + "');}return p.join('');");
    // Provide some basic currying to the user
    return data ? fn( data ) : fn;
  };
})();

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

function isElement(obj){
   return (typeof obj==="object") &&
      (obj.nodeType===1) && (typeof obj.style === "object") &&
      (typeof obj.ownerDocument ==="object")/* && obj.tagName != "BODY"*/;
}

if (web === undefined) var web = {};

web.defaultComponent = "_base";
web.preservePropertySections = true;
//icon = use component icon when dragging | html = use component html to create draggable element
web.dragIcon = 'icon';
//if empty the html of the component is used to view dropping in real time but for large elements it can jump around for this you can set a html placeholder with this option
web.dragHtml = '<div style="background:limegreen;;width:100%;height:3px;border:1px solid limegreen;box-shadow:0px 0px 2px 1px rgba(0,0,0,0.14);"></div>';

web.baseUrl =  document.currentScript?document.currentScript.src.replace(/[^\/]*?\.js$/,''):'';
web.imgBaseUrl =  web.baseUrl;

web.ComponentsGroup = {};
web.SectionsGroup = {};
web.BlocksGroup = {};

web.Components = {

	_components: {},

	_nodesLookup: {},

	_attributesLookup: {},

	_classesLookup: {},

	_classesRegexLookup: {},

	componentPropertiesElement: "#right-panel .component-properties",

	componentPropertiesDefaultSection: "content",

	get: function(type) {
		return this._components[type];
	},

	updateProperty: function(type, key, value) {
		let properties = this._components[type]["properties"];
		for (property in properties) {
			if (key == properties[property]["key"])  {
				return this._components[type]["properties"][property] =
				Object.assign(properties[property], value);
			}
		}
	},

	getProperty: function(type, key) {
		let properties = this._components[type] ? this._components[type]["properties"] : [];
		for (property in properties) {
			if (key == properties[property]["key"])  {
				return properties[property];
			}
		}
	},

	add: function(type, data) {
		data.type = type;

		this._components[type] = data;

		if (data.nodes)
		{
			for (var i in data.nodes)
			{
				this._nodesLookup[ data.nodes[i] ] = data;
			}
		}

		if (data.attributes)
		{
			if (data.attributes.constructor === Array)
			{
				for (var i in data.attributes)
				{
					this._attributesLookup[ data.attributes[i] ] = data;
				}
			} else
			{
				for (var i in data.attributes)
				{
					if (typeof this._attributesLookup[i] === 'undefined')
					{
						this._attributesLookup[i] = {};
					}

					if (typeof this._attributesLookup[i][ data.attributes[i] ] === 'undefined')
					{
						this._attributesLookup[i][ data.attributes[i] ] = {};
					}

					this._attributesLookup[i][ data.attributes[i] ] = data;
				}
			}
		}

		if (data.classes)
		{
			for (var i in data.classes)
			{
				this._classesLookup[ data.classes[i] ] = data;
			}
		}

		if (data.classesRegex)
		{
			for (var i in data.classesRegex)
			{
				this._classesRegexLookup[ data.classesRegex[i] ] = data;
			}
		}
	},

	extend: function(inheritType, type, data) {

		 var newData = data;

		 if (inheritData = this._components[inheritType])
		 {
			newData = $.extend(true,{}, inheritData, data);
			newData.properties = $.merge( $.merge([], inheritData.properties?inheritData.properties:[]), data.properties?data.properties:[]);
		 }

		 //sort by order
		 newData.properties.sort(function (a,b)
			{
				if (typeof a.sort  === "undefined") a.sort = 0;
				if (typeof b.sort  === "undefined") b.sort = 0;

				if (a.sort < b.sort)
					return -1;
				if (a.sort > b.sort)
					return 1;
				return 0;
			});
/*
		var output = array.reduce(function(o, cur) {

		  // Get the index of the key-value pair.
		  var occurs = o.reduce(function(n, item, i) {
			return (item.key === cur.key) ? i : n;
		  }, -1);

		  // If the name is found,
		  if (occurs >= 0) {

			// append the current value to its list of values.
			o[occurs].value = o[occurs].value.concat(cur.value);

		  // Otherwise,
		  } else {

			// add the current item to o (but make sure the value is an array).
			var obj = {name: cur.key, value: [cur.value]};
			o = o.concat([obj]);
		  }

		  return o;
		}, newData.properties);
*/

		this.add(type, newData);
	},


	matchNode: function(node) {
		var component = {};

		if (!node || !node.tagName) return false;

		if (node.attributes && node.attributes.length)
		{
			//search for attributes
			for (var i in node.attributes)
			{
				if (node.attributes[i])
				{
				attr = node.attributes[i].name;
				value = node.attributes[i].value;

				if (attr in this._attributesLookup)
				{
					component = this._attributesLookup[ attr ];

					//currently we check that is not a component by looking at name attribute
					//if we have a collection of objects it means that attribute value must be checked
					if (typeof component["name"] === "undefined")
					{
						if (value in component)
						{
							return component[value];
						}
					} else
					return component;
				}
			}
			}

			for (var i in node.attributes)
			{
				attr = node.attributes[i].name;
				value = node.attributes[i].value;

				//check for node classes
				if (attr == "class")
				{
					classes = value.split(" ");

					for (j in classes)
					{
						if (classes[j] in this._classesLookup)
						return this._classesLookup[ classes[j] ];
					}

					for (regex in this._classesRegexLookup)
					{
						regexObj = new RegExp(regex);
						if (regexObj.exec(value))
						{
							return this._classesRegexLookup[ regex ];
						}
					}
				}
			}
		}

		tagName = node.tagName.toLowerCase();
		if (tagName in this._nodesLookup) return this._nodesLookup[ tagName ];

		return false;
		//return false;
	},

	render: function(type, panel = false) {

		var component = this._components[type];
		if (!component) return;

		if (panel) {
			componentsPanel = panel;
		} else {
			panel = this.componentPropertiesElement;
		}

		var componentsPanel = $(panel);
		var defaultSection = this.componentPropertiesDefaultSection;
		var componentsPanelSections = {};

		$(panel + " .tab-pane").each(function ()
		{
			var sectionName = this.dataset.section;
			componentsPanelSections[sectionName] = $(this);
			$('.section[data-section!="default"]', this).remove();
			$('label[for!="header_default"]', this).remove();
			$('input[id!="header_default"]', this).remove();
		});

		var section = componentsPanelSections[defaultSection].find('.section[data-section="default"]');

		if (!(web.preservePropertySections && section.length))
		{
			componentsPanelSections[defaultSection].html('').append(tmpl("web-input-sectioninput", {key:"default", header:component.name}));
			section = componentsPanelSections[defaultSection].find(".section");
		}

		componentsPanelSections[defaultSection].find('[data-header="default"] span').html(component.name);
		section.html("");

		if (component.beforeInit) component.beforeInit(web.Builder.selectedEl.get(0));

		var element;

		var fn = function(component, property) {
			return property.input.on('propertyChange', function (event, value, input) {

					var element = selectedElement = web.Builder.selectedEl;

					if (property.child) element = element.find(property.child);
					if (property.parent) element = element.parent(property.parent);

					if (property.onChange) {
						let ret = property.onChange(element, value, input, component);
						//if on change returns an object then is returning the dom node otherwise is returning the new value
						if (typeof ret == "object")  {
							element = ret;
						} else {
							value = ret;
						}
					}/* else */
					if (property.htmlAttr)
					{
						oldValue = element.attr(property.htmlAttr);

						if (property.htmlAttr == "class" && property.validValues) {
							element.removeClass(property.validValues.join(" "));
							element = element.addClass(value);
						}
						else if (property.htmlAttr == "style") {
							//keep old style for undo
							oldStyle = $("#vps-styles", window.FrameDocument).html();
							element = web.StyleManager.setStyle(element, property.key, value);
						} else if (property.htmlAttr == "innerHTML")  {
							element = web.ContentManager.setHtml(element, value);
						} else if (property.htmlAttr == "innerText")  {
							element = web.ContentManager.setText(element, value);
						} else {
							//if value is empty then remove attribute useful for attributes without values like disabled
							if (value) {
								element = element.attr(property.htmlAttr, value);
							} else {
								element = element.removeAttr(property.htmlAttr);
							}
						}

						if (property.htmlAttr == "style")  {
							mutation = {
								type: 'style',
								target: element.get(0),
								attributeName: property.htmlAttr,
								oldValue: oldStyle,
								newValue: $("#vps-styles", window.FrameDocument).html()};

							web.Undo.addMutation(mutation);
						} else {
								web.Undo.addMutation(
									{type: 'attributes',
									target: element.get(0),
									attributeName: property.htmlAttr,
									oldValue: oldValue,
									newValue: element.attr(property.htmlAttr)});
						}
					}

					if (component.onChange) {
						element = component.onChange(element, property, value, input);
					}

					if (property.child || property.parent) {
						web.Builder.selectNode(selectedElement);
					} else {
						web.Builder.selectNode(element);
					}

					return element;
			});
		};

		var nodeElement = web.Builder.selectedEl;

		for (var i in component.properties)
		{
			var property = component.properties[i];
			var element = nodeElement;

			if (property.beforeInit) property.beforeInit(element.get(0));

			if (property.child) element = element.find(property.child);
			if (property.parent) element = element.parent(property.parent);

			if (property.data) {
				property.data["key"] = property.key;
			} else
			{
				property.data = {"key" : property.key};
			}

			if (typeof property.group  === 'undefined') property.group = null;

			property.input = property.inputtype.init(property.data);

			let value;
			if (property.init)
			{
				property.inputtype.setValue(property.init(element.get(0)));
			} else if (property.htmlAttr)
			{
				if (property.htmlAttr == "style")
				{
					//value = element.css(property.key);//jquery css returns computed style
					value = web.StyleManager.getStyle(element, property.key);//getStyle returns declared style
				} else
				if (property.htmlAttr == "innerHTML") {
					value = web.ContentManager.getHtml(element);
				} else if (property.htmlAttr == "innerText") {
					value = web.ContentManager.getText(element);
				} else {
					value = element.attr(property.htmlAttr);
				}

				//if attribute is class check if one of valid values is included as class to set the select
				if (value && property.htmlAttr == "class" && property.validValues)
				{
					let valid = value.split(" ").filter(function(el) {
						return property.validValues.indexOf(el) != -1
					});
					if (valid && valid.length) {
						value = valid[0];
					} else  {
						value = "";
					}
				}

				if (!value && property.defaultValue) {
					value = property.defaultValue;
				}

				property.inputtype.setValue(value);
			} else {
				if (!value && property.defaultValue) {
					value = property.defaultValue;
				}

				property.inputtype.setValue(value);
			}

			fn(component, property);

			var propertySection = defaultSection;
			if (property.section)
			{
				propertySection = property.section;
			}

			if (property.inputtype == SectionInput)
			{
				section = componentsPanelSections[propertySection].find('.section[data-section="' + property.key + '"]');

				if (web.preservePropertySections && section.length)
				{
					section.html("");
				} else
				{
					componentsPanelSections[propertySection].append(property.input);
					section = componentsPanelSections[propertySection].find('.section[data-section="' + property.key + '"]');
				}
			}
			else
			{
				var row = $(tmpl('web-property', property));
				row.find('.input').append(property.input);
				section.append(row);
			}

			if (property.inputtype.afterInit)
			{
				property.inputtype.afterInit(property.input);
			}

			if (property.afterInit)
			{
				property.afterInit(element.get(0), property.input);
			}
		}

		if (component.init) component.init(web.Builder.selectedEl.get(0));
	}
};


web.Blocks = {

	_blocks: {},

	get: function(type) {
		return this._blocks[type];
	},

	add: function(type, data) {
		data.type = type;
		this._blocks[type] = data;
	},
};

web.Sections = {

	_sections: {},

	get: function(type) {
		return this._sections[type];
	},

	add: function(type, data) {
		data.type = type;
		this._sections[type] = data;
	},
};



web.WysiwygEditor = {

	isActive: false,
	oldValue: '',
	doc:false,


	editorSetStyle: function (tag, style = {}, toggle = false) {
		let iframeWindow = web.Builder.iframe.contentWindow;
		let selection = iframeWindow.getSelection();
		let element = this.element;
		let range;

		if (!tag) {
			tag = "span";
		}

		if (selection.rangeCount > 0) {
			//check if the whole text is inside an existing node to use the node directly
			if ((selection.baseNode && selection.baseNode.nextSibling == null && selection.baseNode.previousSibling == null
				&& selection.anchorOffset == 0 && selection.focusOffset == selection.baseNode.length)
				|| (selection.anchorOffset == selection.focusOffset)) {

				element = selection.baseNode.parentNode;

			} else {
				element = document.createElement(tag);
				range = selection.getRangeAt(0);
				range.surroundContents(element);
				range.selectNodeContents(element.childNodes[0], 0);
			}
		}

		if (element && style) {
			for (name in style) {

				if ( !style[name] ||
					(toggle && element.style.getPropertyValue(name))) {

					element.style.removeProperty(name);

				} else {
					element.style.setProperty(name, style[name]);
				}
			}
		}

		//if edited text is an empty span remove the span
		if (element.tagName == "SPAN" && element.style.length == 0 && element.attributes.length <= 1) {
			let textNode = iframeWindow.document.createTextNode(element.innerText);
			element.replaceWith(textNode);
			element = textNode;

			range = iframeWindow.document.createRange();
			range.selectNodeContents(element);
			selection.removeAllRanges();
			selection.addRange(range);
        }

		//select link element to edit link etc
		if (tag == "a") {
			web.Builder.selectNode(element);
			web.Builder.loadNodeComponent(element);
		}
		return element;
	},

	init: function(doc) {
		this.doc = doc;
		let self = this;

		$("#bold-btn").on("click", function (e) {
				//doc.execCommand('bold',false,null);
				//self.editorSetStyle("b", {"font-weight" : "bold"}, true);
				self.editorSetStyle(false, {"font-weight" : "bold"}, true);
				e.preventDefault();
				return false;
		});

		$("#italic-btn").on("click", function (e) {
				//doc.execCommand('italic',false,null);
				//self.editorSetStyle("i", {"font-style" : "italic"}, true);
				self.editorSetStyle(false, {"font-style" : "italic"}, true);
				e.preventDefault();
				return false;
		});

		$("#underline-btn").on("click", function (e) {
				//doc.execCommand('underline',false,null);
				//self.editorSetStyle("u", {"text-decoration" : "underline"}, true);
				self.editorSetStyle(false, {"text-decoration" : "underline"}, true);
				e.preventDefault();
				return false;
		});

		$("#strike-btn").on("click", function (e) {
				//doc.execCommand('strikeThrough',false,null);
				//self.editorSetStyle("strike",  {"text-decoration" : "line-through"}, true);
				self.editorSetStyle(false,  {"text-decoration" : "line-through"}, true);
				e.preventDefault();
				return false;
		});

		$("#link-btn").on("click", function (e) {
				//doc.execCommand('createLink',false,"#");
				self.editorSetStyle("a");
				e.preventDefault();
				return false;
		});

		$("#fore-color").on("change", function (e) {
				//doc.execCommand('foreColor',false,this.value);
				self.editorSetStyle(false, {"color" : this.value});
				e.preventDefault();
				return false;
		});


		$("#back-color").on("change", function (e) {
				//doc.execCommand('hiliteColor',false,this.value);
				self.editorSetStyle(false, {"background-color" : this.value});
				e.preventDefault();
				return false;
		});

		$("#font-size").on("change", function (e) {
				//doc.execCommand('fontSize',false,this.value);
				self.editorSetStyle(false, {"font-size" : this.value});
				e.preventDefault();
				return false;
		});

		let sizes = "<option value=''> - Font size - </option>";
		for (i = 1;i <= 128; i++) {
			sizes += "<option value='"+ i +"px'>"+ i +"</option>";
		}
		$("#font-size").html(sizes);

		$("#font-family").on("change", function (e) {
				let option = this.options[this.selectedIndex];
				let element = self.editorSetStyle(false, {"font-family" : this.value});
				web.FontsManager.addFont(option.dataset.provider, this.value, element);
				//doc.execCommand('fontName',false,this.value);
				e.preventDefault();
				return false;
		});

		$("#justify-btn a").on("click", function (e) {
				//var command = "justify" + this.dataset.value;
				//doc.execCommand(command,false,"#");
				self.editorSetStyle(false, {"text-align" : this.dataset.value});
				e.preventDefault();
				return false;
		});
	},

	undo: function(element) {
		this.doc.execCommand('undo',false,null);
	},

	redo: function(element) {
		this.doc.execCommand('redo',false,null);
	},

	edit: function(element) {
		element.attr({'contenteditable':true, 'spellcheckker':false});
		$("#wysiwyg-editor").show();

		this.element = element;
		this.isActive = true;
		this.oldValue = element.html();

		$("#font-familly").val(getComputedStyle(element[0])['font-family']);
		element.focus();
	},

	destroy: function(element) {
		element.removeAttr('contenteditable spellcheckker');
		$("#wysiwyg-editor").hide();
		this.isActive = false;


		node = this.element.get(0);
		web.Undo.addMutation({type:'characterData',
								target: node,
								oldValue: this.oldValue,
								newValue: node.innerHTML});
	}
}

web.Builder = {

	component : {},
	dragMoveMutation : false,
	isPreview : false,
	runJsOnSetHtml : false,
	designerMode : false,
	highlightEnabled : false,
	selectPadding: 0,
	leftPanelWidth: 275,
	ignoreClasses: ["clearfix"],

	init: function(url, callback) {

		var self = this;

		self.loadControlGroups();
		self.loadBlockGroups();
		self.loadSectionGroups();

		self.selectedEl = null;
		self.highlightEl = null;
		self.initCallback = callback;

        self.documentFrame = $("#iframe-wrapper > iframe");
        self.canvas = $("#canvas");

		self._loadIframe(url);

		self._initDragdrop();

		self._initBox();

		self.dragElement = null;

		self.highlightEnabled = true;

		self.leftPanelWidth = $("#left-panel").width();

		self.adjustListsHeight();
	},

/* controls */
	loadControlGroups : function() {

		var componentsList = $(".components-list");
		componentsList.empty();
		var item = {}, component = {};
		var count = 0;

		componentsList.each(function ()
		{
			var list = $(this);
			var type = this.dataset.type;
			count ++;

			for (group in web.ComponentsGroup)
			{

				list.append(
				`<li class="header" data-section="${group}"  data-search="">
					<label class="header" for="${type}_comphead_${group}${count}">
						${group}<div class="header-arrow"></div>
					</label>
					<input class="header_check" type="checkbox" checked="true" id="${type}_comphead_${group}${count}">
					<ol></ol>
				</li>`);

				//list.append('<li class="header clearfix" data-section="' + group + '"  data-search=""><label class="header" for="' + type + '_comphead_' + group + count + '">' + group + '  <div class="header-arrow"></div>\
					//				   </label><input class="header_check" type="checkbox" checked="true" id="' + type + '_comphead_' + group + count + '">  <ol></ol></li>');

				var componentsSubList = list.find('li[data-section="' + group + '"]  ol');

				components = web.ComponentsGroup[ group ];

				for (i in components)
				{
					componentType = components[i];
					component = web.Components.get(componentType);

					if (component)
					{
						item = $(`<li data-section="${group}" data-drag-type="component" data-type="${componentType}" data-search="${component.name.toLowerCase()}">
							<span>${component.name}</span>
						</li>`);
						//item = $('<li data-section="' + group + '" data-drag-type=component data-type="' + componentType + '" data-search="' + component.name.toLowerCase() + '"><span>' + component.name + "</span></li>");

						if (component.image) {

							item.css({
								backgroundImage: "url(" + web.imgBaseUrl + component.image + ")",
								backgroundRepeat: "no-repeat"
							})
						}

						componentsSubList.append(item);
					}
				}
			}
		});
	 },

	loadSectionGroups : function() {

		var sectionsList = $(".sections-list");
		sectionsList.empty();
		var item = {};

		sectionsList.each(function ()
		{

			var list = $(this);
			var type = this.dataset.type;

			for (group in web.SectionsGroup)
			{
				list.append(
				`<li class="header" data-section="${group}"  data-search="">
					<label class="header" for="${type}_sectionhead_${group}">
						${group}<div class="header-arrow"></div>
					</label>
					<input class="header_check" type="checkbox" checked="true" id="${type}_sectionhead_${group}">
					<ol></ol>
				</li>`);

				var sectionsSubList = list.find('li[data-section="' + group + '"]  ol');
				sections = web.SectionsGroup[ group ];

				for (i in sections)
				{
					sectionType = sections[i];
					section = web.Sections.get(sectionType);

					if (section)
					{
						item = $(`<li data-section="${group}" data-type="${sectionType}" data-search="${section.name.toLowerCase()}">
									<span class="name">${section.name}</span>
									<div class="add-section-btn" title="Add section"><i class="la la-plus"></i></div>
									<img class="preview" src="" loading="lazy">
								</li>`);

						if (section.image) {

							var image = ((section.image.indexOf('/') == -1) ? web.imgBaseUrl:'') + section.image;

							item.css({
								//backgroundImage: "url(" + image + ")",
								backgroundRepeat: "no-repeat"
							}).find("img").attr("src", image);


						}

						sectionsSubList.append(item)
					}
				}
			}
		});
	 },

	loadBlockGroups : function() {

		var blocksList = $(".blocks-list");
		blocksList.empty();
		var item = {};

		blocksList.each(function ()
		{

			var list = $(this);
			var type = this.dataset.type;

			for (group in web.BlocksGroup)
			{
				list.append(
				`<li class="header" data-section="${group}"  data-search="">
					<label class="header" for="${type}_blockhead_${group}">
						${group}<div class="header-arrow"></div>
					</label>
					<input class="header_check" type="checkbox" checked="true" id="${type}_blockhead_${group}">
					<ol></ol>
				</li>`);

				var blocksSubList = list.find('li[data-section="' + group + '"]  ol');
				blocks = web.BlocksGroup[ group ];

				for (i in blocks)
				{
					blockType = blocks[i];
					block = web.Blocks.get(blockType);

					if (block)
					{
						item = $(`<li data-section="${group}" data-drag-type="block" data-type="${blockType}" data-search="${block.name.toLowerCase()}">
									<span class="name">${block.name}</span>
									<img class="preview" src="" loading="lazy">
								</li>`);

						if (block.image) {

							var image = ((block.image.indexOf('/') == -1) ? web.imgBaseUrl:'') + block.image;

							item.css({
								backgroundImage: "url(" + image + ")",
								backgroundRepeat: "no-repeat"
							}).find("img").attr("src", image);


						}

						blocksSubList.append(item);
					}
				}
			}
		});
	 },

	 adjustListsHeight: function () {
		 let lists = $(".drag-elements-sidepane > div:not(.block-preview)");
		 let properties =$(".component-properties >.tab-content");
		 let wHeight = $(window).height();

		 function adjust(elements) {
			 let maxOffset = 0;

			 elements.each(function (i,e) {
				 maxOffset = Math.max(maxOffset, e.getBoundingClientRect()["top"]);
			});

			 elements.each(function (i,e) {
				 e.style.height = (wHeight - maxOffset) + "px";
			});
		}

		adjust(lists);
		adjust(properties);
	},


	loadUrl : function(url, callback) {
		var self = this;
		$("#select-box").hide();

		self.initCallback = callback;
		if (web.Builder.iframe.src != url) web.Builder.iframe.src = url;
	},

/* iframe */
	_loadIframe : function(url) {

		var self = this;
		self.iframe = this.documentFrame.get(0);
		self.iframe.src = url;

	return this.documentFrame.on("load", function()
        {
				window.FrameWindow = self.iframe.contentWindow;
				window.FrameDocument = self.iframe.contentWindow.document;
				var addSectionBox = $("#add-section-box");
				var highlightBox = $("#highlight-box").hide();


				$(window.FrameWindow).on( "beforeunload", function(event) {
					if (web.Undo.undoIndex >= 0) {
						var dialogText = "You have unsaved changes";
						event.returnValue = dialogText;
						return dialogText;
					}
				});

				$(window.FrameWindow).on( "unload", function(event) {
					$(".loading-message").addClass("active");
					web.Undo.reset();
				});

				//prevent accidental clicks on links when editing text
				$(window.FrameDocument).on("click", "a", function(event) {
					if (web.WysiwygEditor.isActive)  {
						event.preventDefault();
						return false;
					}
				});

				$(window.FrameWindow).on("scroll resize", function(event) {

						if (self.selectedEl)
						{
							var offset = self.selectedEl.offset();

							$("#select-box").css(
								{"top": offset.top - self.frameDoc.scrollTop() - self.selectPadding,
								 "left": offset.left - self.frameDoc.scrollLeft() - self.selectPadding,
								 });

						}

						if (self.highlightEl)
						{
							var offset = self.highlightEl.offset();

							highlightBox.css(
								{"top": offset.top - self.frameDoc.scrollTop() - self.selectPadding,
								 "left": offset.left - self.frameDoc.scrollLeft() - self.selectPadding,
								 });


							//addSectionBox.hide();
						}

						self.adjustListsHeight();

				});

				web.WysiwygEditor.init(window.FrameDocument);
				web.StyleManager.init(window.FrameDocument);
				web.ColorPaletteManager.init(window.FrameDocument);

				if (self.initCallback) self.initCallback();

                return self._frameLoaded();
        });

	},

    _frameLoaded : function() {

		var self = web.Builder;

		self.frameDoc = $(window.FrameDocument);
		self.frameHtml = $(window.FrameDocument).find("html");
		self.frameBody = $(window.FrameDocument).find("body");
		self.frameHead = $(window.FrameDocument).find("head");

		//insert editor helpers like non editable areas
		self.frameHead.append('<link data-web-helpers href="' + web.baseUrl + '../../css/pb-creator-helpers.css" rel="stylesheet">');

		self._initHighlight();

		$(window).triggerHandler("web.iframe.loaded", self.frameDoc);
		$(".loading-message").removeClass("active");


		//enable save button only if changes are made
		web.Builder.frameBody.on("web.undo.add web.undo.restore", function (e) {
			if (web.Undo.hasChanges()){
				$("#top-panel .save-btn").removeAttr("disabled");
			} else {
				$("#top-panel .save-btn").attr("disabled", "true");
			}
		});
    },

    _getElementType: function(el) {

		//search for component attribute
		var componentName = '';
		var componentAttribute = '';

		if (el.attributes) {
			for (var j = 0; j < el.attributes.length; j++){
			  var nodeName = el.attributes[j].nodeName;

			  if (nodeName.indexOf('data-component') > -1)	 {
				componentName = nodeName.replace('data-component-', '');
			  }

			  if (nodeName.indexOf('data-v-') > -1)	 {
				componentAttribute = (componentAttribute ? componentAttribute + " - " : "") +
										nodeName.replace('data-v-', '') + " ";
			  }
			}
		}
		if (componentName != '') return componentName;

		return el.tagName + (componentName ? " - " + componentName : "" ) + (componentAttribute ? " - " + componentAttribute : "");
	},

	loadNodeComponent:  function(node) {
		data = web.Components.matchNode(node);
		var component;

		if (data)
			component = data.type;
		else
			component = web.defaultComponent;

		web.component = web.Components.get(component);
		web.Components.render(component);

	},

	moveNodeUp:  function(node) {
		if (!node) {
			node = web.Builder.selectedEl.get(0);
		}

		oldParent = node.parentNode;
		oldNextSibling = node.nextSibling;

		next = $(node).prev();

		if (next.length > 0)
		{
			next.before(node);
		} else
		{
			$(node).parent().before(node);
		}

		newParent = node.parentNode;
		newNextSibling = node.nextSibling;

		web.Undo.addMutation({type: 'move',
								target: node,
								oldParent: oldParent,
								newParent: newParent,
								oldNextSibling: oldNextSibling,
								newNextSibling: newNextSibling});

	},

	moveNodeDown:  function(node) {
			if (!node) {
				node = web.Builder.selectedEl.get(0);
			}

			oldParent = node.parentNode;
			oldNextSibling = node.nextSibling;

			next = $(node).next();

			if (next.length > 0)
			{
				next.after(node);
			} else
			{
				$(node).parent().after(node);
			}

			newParent = node.parentNode;
			newNextSibling = node.nextSibling;

			web.Undo.addMutation({type: 'move',
									target: node,
									oldParent: oldParent,
									newParent: newParent,
									oldNextSibling: oldNextSibling,
									newNextSibling: newNextSibling});
	},

	cloneNode:  function(node) {
		if (!node) {
			node = web.Builder.selectedEl;
		}

		clone = node.clone();

		node.after(clone);

		node = clone.click();

		element = clone.get(0);

		web.Undo.addMutation({type: 'childList',
								target: node.parentNode,
								addedNodes: [element],
								nextSibling: node.nextSibling});

	},


	selectNode:  function(node) {
		var self = this;

		if (!node)
		{
			$("#select-box").hide();
			return;
		}

		if (self.texteditEl && self.selectedEl.get(0) != node) {
			web.WysiwygEditor.destroy(self.texteditEl);
			self.selectPadding = 0;
			$("#select-box").removeClass("text-edit").find("#select-actions").show();
			self.texteditEl = null;
		}

		var target = $(node);

		if (target)
		{
			self.selectedEl = target;

			try {
				var offset = target.offset();

				$("#select-box").css(
					{"top": offset.top - self.frameDoc.scrollTop() - self.selectPadding,
					 "left": offset.left - self.frameDoc.scrollLeft() - self.selectPadding,
					 "width" : target.outerWidth() + self.selectPadding * 2,
					 "height": target.outerHeight() + self.selectPadding * 2,
					 "display": "block",
					 });

				web.Breadcrumb.loadBreadcrumb(target.get(0));

			} catch(err) {
				console.log(err);
				return false;
			}
		}

		$("#highlight-name").html(this._getElementType(node));

	},

/* iframe highlight */
    _initHighlight: function() {

		var self = web.Builder;

		self.frameBody.on("mousemove dragover touchmove", function(event) {

			if (self.highlightEnabled == true && event.target && isElement(event.target) && event.originalEvent)
			{
				self.highlightEl = target = $(event.target);
				var offset = target.offset();
				var height = target.outerHeight();
				var halfHeight = Math.max(height / 2, 50);
				var width = target.outerWidth();
				var halfWidth = Math.max(width / 2, 50);
				var prepend = true;

				var x = event.originalEvent.x;
				var y = event.originalEvent.y;

				if (self.isResize) {
					if (!self.initialPosition) {
						self.initialPosition = {x,y};
					}

					var deltaX = x - self.initialPosition.x;
					var deltaY = y - self.initialPosition.y;

					offset = self.selectedEl.offset();

					width = self.initialSize.width;
					height = self.initialSize.height;

					switch (self.resizeHandler) {
						// top
						case "top-left":
							height -= deltaY;
							width -= deltaX;
						break;

						case "top-center":
							height -= deltaY;
						break;

						case "top-right":
							height -= deltaY;
							width += deltaX;
						break;

						// center
						case "center-left":
							width -= deltaX;
						break;

						case "center-right":
							width += deltaX;
						break;

						// bottom
						case "bottom-left":
							width -= deltaX;
							height += deltaY;
						break;

						case "bottom-center":
							height += deltaY;
						break;

						case "bottom-right":
							width += deltaX;
							height += deltaY;
						break;
					}

				    if (self.resizeMode == "css") {
				        self.selectedEl.css({width, height});
				    } else {
					self.selectedEl.attr({width, height});
				    }
					$("#select-box").css(
						{"top": offset.top - self.frameDoc.scrollTop() ,
						 "left": offset.left - self.frameDoc.scrollLeft() ,
						 "width" : width,
						 "height": self.selectedEl.outerHeight(),
						 });

				} else
				if (self.isDragging)
				{
					var parent = self.highlightEl;

					try {
							if ((offset.top  < (y - halfHeight)) || (offset.left  < (x - halfWidth)))
							{
								self.dragElement.appendTo(parent);
								prepend = true;
							} else
							{
								prepend = false;
								self.dragElement.prependTo(parent);
							};

							if (self.designerMode)
							{
								var parentOffset = self.dragElement.offsetParent().offset();

								self.dragElement.css({
									"position": "absolute",
									'left': x - (parentOffset.left - self.frameDoc.scrollLeft()),
									'top': y - (parentOffset.top - self.frameDoc.scrollTop()),
									});
							}

							/*
							$("#drop-highlight-box").css(
								{"top": offset.top - self.frameDoc.scrollTop() ,
								 "left": offset.left - self.frameDoc.scrollLeft() ,
								 "width" : parentWidth,
								 "height": "5px",
								  "display" :"block",
								 });
							*/

					} catch(err) {
						console.log(err);
						return false;
					}

					if (!self.designerMode && self.iconDrag) {
						self.iconDrag.css({'left': x + self.leftPanelWidth + 10, 'top': y + 60});
					}
				}// else //uncomment else to disable parent highlighting when dragging
				{
					//if text editor is open check if the highlighted element is not inside the editor
					if (web.WysiwygEditor.isActive )  {
						if (self.texteditEl.get(0).contains(event.target)) {
							return true;
						}
					}

					$("#highlight-box").css(
						{"top": offset.top - self.frameDoc.scrollTop() ,
						 "left": offset.left - self.frameDoc.scrollLeft() ,
						 "width" : width,
						 "height": height,
						  "display" : event.target.hasAttribute('contenteditable')?"none":"block",
						  "border":self.isDragging?"1px dashed #0d6efd":"",//when dragging highlight parent with green
						 });

					if (height < 50)
					{
						$("#section-actions").addClass("outside");
					} else
					{
						$("#section-actions").removeClass("outside");
					}

					$("#highlight-name").html(self._getElementType(event.target));
				}
			}

		});

		self.frameHtml.on("mouseup dragend touchend", function(event) {
			self.isResize = false;
			$("#section-actions, #highlight-name, #select-box").show();

			if (self.isDragging)
			{
				self.isDragging = false;
				web.Builder.highlightEnabled = true;
				if (self.iconDrag) self.iconDrag.remove();
				$("#component-clone").remove();

				if (self.dragMoveMutation === false)
				{
					if (self.component.dragHtml || web.dragHtml) { //if dragHtml is set for dragging then set real component html
						newElement = $(self.component.html);
						self.dragElement.replaceWith(newElement);
						self.dragElement = newElement;
					}

					if (self.component.afterDrop) self.dragElement = self.component.afterDrop(self.dragElement);
				}

				self.dragElement.css("border", "");

				node = self.dragElement.get(0);
				self.selectNode(node);
				self.loadNodeComponent(node);

				if (self.dragMoveMutation === false)
				{
					web.Undo.addMutation({type: 'childList',
											target: node.parentNode,
											addedNodes: [node],
											nextSibling: node.nextSibling});
				} else
				{
					self.dragMoveMutation.newParent = node.parentNode;
					self.dragMoveMutation.newNextSibling = node.nextSibling;

					web.Undo.addMutation(self.dragMoveMutation);
					self.dragMoveMutation = false;
				}
			}
		});

		self.frameHtml.on("dblclick", function(event) {

			if (web.Builder.isPreview == false) {

				if (!web.WysiwygEditor.isActive)  {
					self.selectPadding = 10;
					self.texteditEl = target = $(event.target);

					web.WysiwygEditor.edit(self.texteditEl);

					_updateSelectBox = function(event) {
						if (!self.texteditEl) return;
						var offset = self.selectedEl.offset();

						$("#select-box").css({
								"top": offset.top - self.frameDoc.scrollTop() - self.selectPadding,
								"left": offset.left - self.frameDoc.scrollLeft() - self.selectPadding,
								"width" : self.texteditEl.outerWidth() + self.selectPadding *2,
								"height": self.texteditEl.outerHeight() + self.selectPadding *2
							 });
					};

					//update select box when the text size is changed
					self.texteditEl.on("blur keyup paste input", _updateSelectBox);
					_updateSelectBox();

					$("#select-box").addClass("text-edit").find("#select-actions").hide();
					$("#highlight-box").hide();
				}
			}
		});


		self.frameHtml.on("click", function(event) {
		
			if (web.Builder.isPreview == false){
				if (event.target) {
					if (web.WysiwygEditor.isActive )  {
						if (self.texteditEl.get(0).contains(event.target)) {
							return true;
						}
					}
					//if component properties is loaded in left panel tab instead of right panel show tab
					if ($(".component-properties-tab").is(":visible"))//if properites tab is enabled/visible
						$('.component-properties-tab a').show().tab('show');

					self.selectNode(event.target);
					self.loadNodeComponent(event.target);

					if (web.component.resizable) {
						$("#select-box").addClass("resizable");
                      				  self.resizeMode = web.component.resizeMode;
					} else {
						$("#select-box").removeClass("resizable");
					}
					$("#add-section-box").hide();
					event.preventDefault();
					return false;
				}
			}

		});

	},

	_initBox: function() {
		var self = this;

		$("#drag-btn").on("mousedown", function(event) {
			self.dragElement = self.selectedEl.css("position","");
			self.isDragging = true;
			$("#section-actions, #highlight-name, #select-box").hide();

			node = self.dragElement.get(0);

			self.dragMoveMutation = {type: 'move',
								target: node,
								oldParent: node.parentNode,
								oldNextSibling: node.nextSibling};

			//self.selectNode(false);
			event.preventDefault();
			return false;
		});

		$(".resize > div").on("mousedown", function(event) {
			$("#section-actions, #highlight-name, #highlight-box").hide();

			self.isResize = true;
			self.initialSize = {"width" : self.selectedEl.outerWidth(), "height" : self.selectedEl.outerHeight()};
			self.initialPosition = false;
			self.resizeHandler = this.className;

			event.preventDefault();
			return false;
		});

		$("#down-btn").on("click", function(event) {

			$("#select-box").hide();

			web.Builder.moveNodeDown();

			event.preventDefault();
			return false;
		});

		$("#up-btn").on("click", function(event) {
			$("#select-box").hide();

			web.Builder.moveNodeUp();

			event.preventDefault();
			return false;
		});

		$("#clone-btn").on("click", function(event) {

			web.Builder.cloneNode();

			event.preventDefault();
			return false;
		});

		$("#parent-btn").on("click", function(event) {

			node = self.selectedEl.parent().get(0);

			self.selectNode(node);
			self.loadNodeComponent(node);

			event.preventDefault();
			return false;
		});

		$("#delete-btn").on("click", function(event) {
			$("#select-box").hide();

			node = self.selectedEl.get(0);

			web.Undo.addMutation({type: 'childList',
									target: node.parentNode,
									removedNodes: [node],
									nextSibling: node.nextSibling});

			self.selectedEl.remove();

			event.preventDefault();
			return false;
		});

		var addSectionBox = $("#add-section-box");
		var addSectionElement = {};

		$("#add-section-btn").on("click", function(event) {
		
			addSectionElement = self.highlightEl;
			if(addSectionElement[0].tagName.toLowerCase() == "body"){
				$(".before-after-radio .me-1").attr('style', 'display: none !important;');
			}else{
				$(".before-after-radio .me-1").attr('style', '');
			}
			var offset = $(addSectionElement).offset();
			var top = (offset.top - self.frameDoc.scrollTop()) + addSectionElement.outerHeight();
			var left = (offset.left - self.frameDoc.scrollLeft()) + (addSectionElement.outerWidth() / 2) - (addSectionBox.outerWidth() / 2);
			var outerHeight = $(window.FrameWindow).height() + self.frameDoc.scrollTop();

			//check if box is out of viewport and move inside
			if (left < 0) left = 0;
			if (top < 0) top = 0;
			if ((left + addSectionBox.outerWidth()) > self.frameDoc.outerWidth()) left = self.frameDoc.outerWidth() - addSectionBox.outerWidth();
			if (((top + addSectionBox.outerHeight()) + self.frameDoc.scrollTop()) > outerHeight) top = top - addSectionBox.outerHeight();


			addSectionBox.css(
				{"top": top,
				 "left": left,
				 "display": "block",
				 });

			event.preventDefault();
			return false;
		});

		$("#close-section-btn").on("click", function(event) {
			addSectionBox.hide();
		});

		function addSectionComponent(html, after = true)
		{
			var node = $(html);
			
			if (after)
			{
				addSectionElement.after(node);
			} else
			{
				addSectionElement.append(node);
			}

			node = node.get(0);

			web.Undo.addMutation({type: 'childList',
									target: node.parentNode,
									addedNodes: [node],
									nextSibling: node.nextSibling});
		}

		$(".components-list li ol li", addSectionBox).on("click", function(event) {
			var html = web.Components.get(this.dataset.type).html;
			
			addSectionComponent(html, ($("[name='add-section-insert-mode']:checked").val() == "after"));

			addSectionBox.hide();
		});

		$(".blocks-list li ol li", addSectionBox).on("click", function(event) {
			var html = web.Blocks.get(this.dataset.type).html;

			addSectionComponent(html, ($("[name='add-section-insert-mode']:checked").val() == "after"));

			addSectionBox.hide();
		});


		$(".sections-list li ol li", addSectionBox).on("click", function(event) {
			var html = web.Sections.get(this.dataset.type).html;
			addSectionComponent(html, ($("[name='add-section-insert-mode']:checked").val() == "after"));

			addSectionBox.hide();
		});

	},

/* drag and drop */
	_initDragdrop : function() {

		var self = this;
		self.isDragging = false;

		$('.drag-elements-sidepane ul > li > ol > li[data-drag-type]').on("mousedown touchstart", function(event) {

			$this = $(this);

			$("#component-clone").remove();
			$("#section-actions, #highlight-name, #select-box").hide();

			if ($this.data("drag-type") == "component") {
				self.component = web.Components.get($this.data("type"));
			}
			else if ($this.data("drag-type") == "section") {
				self.component = web.Sections.get($this.data("type"));
			}
			else if ($this.data("drag-type") == "block") {
				self.component = web.Blocks.get($this.data("type"));
			}

			if (self.component.dragHtml) {
				html = self.component.dragHtml;
			} else if (web.dragHtml) {
				html = web.dragHtml;
			} else {
				html = self.component.html;
			}

			self.dragElement = $(html);
			//self.dragElement.css("border", "1px dashed #4285f4");

			if (self.component.dragStart) self.dragElement = self.component.dragStart(self.dragElement);

			self.isDragging = true;
			if (web.dragIcon == 'html')
			{
				self.iconDrag = $(html).attr("id", "dragElement-clone").css('position', 'absolute');
			}
			else if (self.designerMode == false)
			{
				self.iconDrag = $('<img src=""/>').attr({"id": "dragElement-clone", 'src': $this.css("background-image").replace(/^url\(['"](.+)['"]\)/, '$1')}).
				css({'z-index':100, 'position':'absolute', 'width':'64px', 'height':'64px', 'top': event.originalEvent.y, 'left': event.originalEvent.x});
			}

			$('body').append(self.iconDrag);

			event.preventDefault();
			return false;
		});

		$('body').on('mouseup dragend touchend', function(event) {
			if (self.iconDrag && self.isDragging == true)
			{
				self.isDragging = false;
				$("#component-clone").remove();
				$("#section-actions, #highlight-name, #select-box").show();
				self.iconDrag.remove();
				if(self.dragElement){
					self.dragElement.remove();
				}
			}
		});

		$('body').on('mousemove dragover touchmove', function(event) {
			if (self.iconDrag && self.isDragging == true)
			{
				var x = (event.clientX || event.originalEvent.clientX);
				var y = (event.clientY || event.originalEvent.clientY);

				self.iconDrag.css({'left': x - 60, 'top': y - 30});

				elementMouseIsOver = document.elementFromPoint(x - 60, y - 40);

				//if drag elements hovers over iframe switch to iframe mouseover handler
				return;
				if (elementMouseIsOver && elementMouseIsOver.tagName == 'IFRAME')
				{
					self.frameBody.trigger("mousemove", event);
					event.stopPropagation();
					self.selectNode(false);
				}
			}
		});

		$('.drag-elements-sidepane ul > ol > li > li').on("mouseup dragend touchend", function(event) {
			self.isDragging = false;
			$("#component-clone").remove()
			$("#section-actions, #highlight-name, #select-box").show();;
		});

	},

	removeHelpers: function (html, keepHelperAttributes = false)
	{
		//tags like stylesheets or scripts
		html = html.replace(/<[^>]+?data-web-helpers.+?>/gi, "");
		//attributes
		if (!keepHelperAttributes)
		{
			html = html.replace(/\s*data-web-\w+(=["'].*?["'])?\s*/gi, "");
		}

		return html;
	},

	getHtml: function(keepHelperAttributes = true)
	{
		var doc = window.FrameDocument;
		var hasDoctpe = (doc.doctype !== null);
		var html = "";

		$("[contenteditable]", doc).removeAttr("contenteditable");
		$("[spellcheckker]", doc).removeAttr("spellcheckker");

		$(window).triggerHandler("web.getHtml.before", doc);

		if (hasDoctpe) html =
		"<!DOCTYPE "
         + doc.doctype.name
         + (doc.doctype.publicId ? ' PUBLIC "' + doc.doctype.publicId + '"' : '')
         + (!doc.doctype.publicId && doc.doctype.systemId ? ' SYSTEM' : '')
         + (doc.doctype.systemId ? ' "' + doc.doctype.systemId + '"' : '')
         + ">\n";

        // web.FontsManager.cleanUnusedFonts();

         html +=  doc.documentElement.outerHTML;
         html = this.removeHelpers(html, keepHelperAttributes);

	 $(window).triggerHandler("web.getHtml.after", doc);

         var filter = $(window).triggerHandler("web.getHtml.filter", html);
         if (filter) return filter;

         return html;
	},

	setHtml: function(html)
	{
		//documentElement.innerHTML resets <head> each time and the page flickers
		//return window.FrameDocument.documentElement.innerHTML = html;

		function getTag(html, tag, outerHtml = false) {
			start = html.indexOf("<" + tag);
			end = html.indexOf("</" + tag);

			if (start >= 0 && end >= 0) {
				if (outerHtml)
					return html.slice(start, end + 3 + tag.length);
				else
					return html.slice(html.indexOf(">", start) + 1, end);
			} else {
				return html;
			}
		}

		if (this.runJsOnSetHtml)
			this.frameBody.html(getTag(html, "body"));
		else
			window.FrameDocument.body.innerHTML = getTag(html, "body");

		//use outerHTML if you want to set body tag attributes
		//window.FrameDocument.body.outerHTML = getTag(html, "body", true);

		//set head html only if changed to avoid page flicker
		let headHtml = getTag(html, "head");
		if (window.FrameDocument.head.innerHTML != headHtml) {
			window.FrameDocument.head.innerHTML = getTag(html, "head");
		}
	},

	saveAjax: function(fileName, startTemplateUrl, callback, saveUrl)
	{
		var data = {};
		data["file"] = (fileName && fileName != "") ? fileName : web.FileManager.getCurrentFileName();
		data["startTemplateUrl"] = startTemplateUrl;
		if (!startTemplateUrl || startTemplateUrl == null)
		{
			data["html"] = this.getHtml();
		}

		return $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			type: "POST",
			url: saveUrl,//set your server side save script url
			data: data,
			cache: false,
		}).done(function (data) {
				if (callback) callback(data);
				web.Undo.reset();
				$("#top-panel .save-btn").attr("disabled", "true");
		}).fail(function (data) {
				Swal.fire({title: 'data.responseText',});
		});
	},

	setDesignerMode: function(designerMode = false)
	{
		this.designerMode = designerMode;
	}

};

web.CodeEditor = {

	isActive: false,
	oldValue: '',
	doc:false,

	init: function(doc) {
		$("#web-code-editor textarea").val(web.Builder.getHtml());

		$("#web-code-editor textarea").keyup(function ()  {
			delay(() => web.Builder.setHtml(this.value), 1000);
		});

		//load code on document changes
		web.Builder.frameBody.on("web.undo.add web.undo.restore", function (e) {
			web.CodeEditor.setValue();
		});
		//load code when a new url is loaded
		web.Builder.documentFrame.on("load", function (e) { web.CodeEditor.setValue();});

		this.isActive = true;
	},

	setValue: function(value) {
		if (this.isActive)
		{
			$("#web-code-editor textarea").val(web.Builder.getHtml());
		}
	},

	destroy: function(element) {
		//this.isActive = false;
	},

	toggle: function() {
		if (this.isActive != true)
		{
			this.isActive = true;
			return this.init();
		}
		this.isActive = false;
		this.destroy();
	}
}


function displayToast(bg, message) {

	Swal.fire({
  position: 'center',
  icon: 'success',
  title: message,
  showConfirmButton: false,
  timer: 3000
})
	/*$("#top-toast .toast-body").html(message);
	$("#top-toast .toast-header").removeClass(["bg-danger", "bg-success"]).addClass(bg);
	$("#top-toast .toast").addClass("show");
	delay(() => $("#top-toast .toast").removeClass("show"), 5000);*/
}

web.Gui = {

	init: function() {
		$("[data-web-action]").each(function () {
			on = "click";
			if (this.dataset.webOn) on = this.dataset.webOn;

			$(this).on(on, web.Gui[this.dataset.webAction]);
			if (this.dataset.webShortcut)
			{
				$(document).bind('keydown', this.dataset.webShortcut, web.Gui[this.dataset.webAction]);
				$(window.FrameDocument, window.FrameWindow).bind('keydown', this.dataset.webShortcut, web.Gui[this.dataset.webAction]);
			}
		});

		let theme = localStorage.getItem("theme", "light");
		if ((!theme || theme === 'auto') && window.matchMedia('(prefers-color-scheme: light)').matches) {
			theme = "light";
		}
		if (theme) {
			$("html").attr("data-bs-theme", theme);
		}
	},

	undo : function () {
		if (web.WysiwygEditor.isActive)
		{
			web.WysiwygEditor.undo();
		} else
		{
			web.Undo.undo();
		}
		web.Builder.selectNode();
	},

	redo : function () {
		if (web.WysiwygEditor.isActive)
		{
			web.WysiwygEditor.redo();
		} else
		{
			web.Undo.redo();
		}
		web.Builder.selectNode();
	},

	//show modal with html content
	save : function () {
		$('#textarea-modal textarea').val(web.Builder.getHtml());
		$('#textarea-modal').modal();
	},

	//post html content through ajax to save to filesystem/db
	saveAjax : function () {
		var btn = $(this);
		var saveUrl = this.dataset.webUrl;
		var url = web.FileManager.getPageData('file');

		$(".loading", btn).toggleClass("d-none");
		$(".button-text", btn).toggleClass("d-none");

		return web.Builder.saveAjax(url, null, null, saveUrl).done(function (data, text) {
			/*
			//use modal to show save status
			var messageModal = new bootstrap.Modal(document.getElementById('message-modal'), {
			  keyboard: false
			});

			$("#message-modal .modal-body").html(data);
			messageModal.show();
			*/

			//use toast to show save status

			let bg = "bg-success";
			if (data.success || text == "success") {
				$("#top-panel .save-btn").attr("disabled", "true");
			} else {
				bg = "bg-danger";
			}
			displayToast(bg, data.message ?? data);
		}, saveUrl).fail(function (data, text, errorThrown) {
			displayToast("bg-danger", "Error saving!");
		}, saveUrl).always(function (data) {
			$(".loading", btn).toggleClass("d-none");
			$(".button-text", btn).toggleClass("d-none");
		});
	},

	download : function () {
		filename = /[^\/]+$/.exec(web.Builder.iframe.src)[0];
		uriContent = "data:application/octet-stream,"  + encodeURIComponent(web.Builder.getHtml());

		var link = document.createElement('a');
		if ('download' in link)
		{
			link.dataset.download = filename;
			link.href = uriContent;
			link.target = "_blank";

			document.body.appendChild(link);
			result = link.click();
			document.body.removeChild(link);
			link.remove();

		} else
		{
			location.href = uriContent;
		}
	},

	viewport : function () {
		$("#canvas").attr("class", this.dataset.view);
	},

	toggleEditor : function () {
		$("#pagebuilder").toggleClass("bottom-panel-expand");
		$("#toggleEditorJsExecute").toggle();
		//hide breadcrumb when showing the editor
		$(".breadcrumb-navigator .breadcrumb").toggle();
		web.CodeEditor.toggle();
	},

	toggleEditorJsExecute : function () {
		web.Builder.runJsOnSetHtml = this.checked;
	},

	preview : function () {
		(web.Builder.isPreview == true)?web.Builder.isPreview = false:web.Builder.isPreview = true;
		$("#iframe-layer").toggle();
		$("#pagebuilder").toggleClass("preview");
	},

	fullscreen : function () {
		launchFullScreen(document); // the whole page
	},

	search : function () {
		let searchText = this.value;
		let panel = $("div > ul", this.parentNode.parentNode)

		$("li ol li", panel).each(function () {
			$this = $(this);

			$this.hide();
			if ($this.data("search").indexOf(searchText) > -1) $this.show();
		});
	},

	clearSearch : function (e) {
		$("input", this.parentNode).val("").keyup();
	},

	expand : function (e) {
		$('input.header_check[type="checkbox"]', this.parentNode.parentNode.parentNode).prop("checked", true);
	},

	collapse : function (e) {
		$('input.header_check[type="checkbox"]', this.parentNode.parentNode.parentNode).prop("checked", false);
	},


	//Pages, file/components tree
	newPage : function () {

		var newPageModal = $('#new-page-modal');

		newPageModal.modal("show").find("form").off("submit").submit(function( e ) {

			var data = {};
			$.each($(this).serializeArray(), function() {
				data[this.name] = this.value;
			});

			data['title']  = data['file'].replace('/', '').replace('.html', '');
			var name = data['name'] = data['folder'].replace('/', '_') + "-" + data['title'];
			data['url']  = data['file'] = data['folder'] + "/" + data['file'];

			web.FileManager.addPage(data.name, data);
			e.preventDefault();

			return web.Builder.saveAjax(data.file, data.startTemplateUrl, function (data) {
					web.FileManager.loadPage(name);
					web.FileManager.scrollBottom();
					newPageModal.modal("hide");
			}, this.action);

			e.preventDefault();
			return false;
		});

	},

	setDesignerMode : function () {
		//aria-pressed attribute is updated after action is called and we check for false instead of true
		var designerMode = this.attributes["aria-pressed"].value != "true";
		web.Builder.setDesignerMode(designerMode);
	},
//layout
	togglePanel: function (panel, cssVar) {
		var panel = $(panel);
		var body = $("body");
		var prevValue = body.css(cssVar);
		if (prevValue !== "0px")
		{
			panel.data("layout-toggle", prevValue);
			body.css(cssVar, "0px");
			panel.hide();
			return false;
		} else
		{
			prevValue= panel.data("layout-toggle");
			body.css(cssVar, '');
			panel.show();
			return true;
		}
	},

	toggleFileManager: function () {
		web.Gui.togglePanel("#filemanager", "--builder-filemanager-height");
	},

	toggleLeftColumn: function () {
		web.Gui.togglePanel("#left-panel", "--builder-left-panel-width");
	},


	toggleRightColumn: function (rightColumnEnabled = null) {
		rightColumnEnabled = web.Gui.togglePanel("#right-panel", "--builder-right-panel-width");

		$("#pagebuilder").toggleClass("no-right-panel");
		$(".component-properties-tab").toggle();

		web.Components.componentPropertiesElement = (rightColumnEnabled ? "#right-panel" :"#left-panel #properties") + " .component-properties";
		if ($("#properties").is(":visible")) $('.component-tab a').show().tab('show');

	},

	darkMode: function () {
		let theme = $("html").attr("data-bs-theme");

		if (theme == "dark") {
			theme = "light";
			$(".btn-dark-mode i").removeClass("la-moon").addClass("la-sun");
		} else if (theme == "light" || theme == "auto") {
			theme = "dark";
			$(".btn-dark-mode i").removeClass("la-moon").addClass("la-sun");
		} else {
			theme = "light";
		}

		$("html").attr("data-bs-theme", theme);
		localStorage.setItem('theme', theme);
		//document.cookie = 'theme=' + theme;
	},
}

web.StyleManager = {

	styles: {},
	cssContainer: false,
	mobileWidth: '320px',
	tabletWidth: '768px',

	init: function (doc) {
		if (doc) {

			var style = false;
			var _style = false;

			//check if editor style is present
			for (let i = 0; i < doc.styleSheets.length; i++) {
				_style = doc.styleSheets[i];
				if (_style.ownerNode.id && _style.ownerNode.id == "") {
					style = _style;
					break;
				}
			}

			//if style element does not exist create it
			if (!style) {
				this.cssContainer = $('');
				$(doc.head).append(this.cssContainer);
				return this.cssContainer;
			}

			//if style exist then load all css styles for editor
			for (let j = 0; j < style.cssRules.length; j++) {
				media = (typeof style.cssRules[j].media === "undefined") ?
					"desktop" : (style.cssRules[j].media[0] === "screen and (max-width: 1220px)")
					? "tablet" : (style.cssRules[j].media[0] === "screen and (max-width: 320px)")
					? "mobile" : "desktop";

				selector = (media === "desktop") ? style.cssRules[j].selectorText : style.cssRules[j].cssRules[0].selectorText;
				styles = (media === "desktop") ? style.cssRules[j].style : style.cssRules[j].cssRules[0].style;

				if (media) {
					this.styles[media] = {};
					if (selector) {
						this.styles[media][selector] = {};

						for (let k = 0; k < styles.length; k++) {

							property = styles[k];
							value = styles[property];

							this.styles[media][selector][property] = value;
						}
					}
				}
			}

			return this.cssContainer = $("#vps-styles", doc);
		}
	},

	getSelectorForElement: function (element) {
		var currentElement = element;
		var selector = [];

		while (currentElement.parentElement) {
			let elementSelector = "";
			let classSelector = Array.from(currentElement.classList).map(function (className) {
					if (web.Builder.ignoreClasses.indexOf(className) == -1) {
						return "." + className;
					}
				}).join("");

			//stop at a unique element (with id)
			if (currentElement.id) {
				elementSelector = "#" + currentElement.id;
				selector.push(elementSelector);
				break;
			} else if (classSelector) {
				//class selector
				elementSelector = classSelector;

			} else {
				//element (tag) selector
				var tag = currentElement.tagName.toLowerCase();
				//exclude top most element body unless the parent element is body
				if (tag != "body" || (tag == "body" && selector.length <= 1)) {
					elementSelector = tag
				}
			}

			if (elementSelector) {
				selector.push(elementSelector);
			}

			currentElement = currentElement.parentElement;
		}

		return selector.reverse().join(" > ");
	},

	setStyle: function (element, styleProp, value) {
		if (typeof(element) == "string") {
			selector = element;
		} else {
			selector = this.getSelectorForElement(element.get(0));
		}

		media = $("#canvas").hasClass("tablet") ? "tablet" : $("#canvas").hasClass("mobile") ? "mobile" : "desktop";

		//styles[media][selector][styleProp] = value
		if (!this.styles[media]) {
			this.styles[media] = {};
		}
		if (!this.styles[media][selector]) {
			this.styles[media][selector] = {};
		}
		if (!this.styles[media][selector][styleProp]) {
			this.styles[media][selector][styleProp] = {};
		}
		this.styles[media][selector][styleProp] = value;

		this.generateCss(media);

		//return element;
		//uncomment bellow code to set css in element's style attribute
		return element.css(styleProp, value);
	},

	generateCss: function (media) {
		//var css = "";
		//for (selector in this.styles[media]) {

		//	css += `${selector} {`;
		//	for (property in this.styles[media][selector]) {
		//		value = this.styles[media][selector][property];
		//		css += `${property}: ${value};`;
		//	}
		//	css += '}';
		//}

		//this.cssContainer.html(css);

		//return element;
		var css = "";
		for (media in this.styles) {
			if (media === "tablet" || media === "mobile") {
				css += `@media screen and (max-width: ${(media === 'tablet') ? this.tabletWidth : this.mobileWidth}){`
			}
			for (selector in this.styles[media]) {
				css += `${selector} {`;
				for (property in this.styles[media][selector]) {
					value = this.styles[media][selector][property];
					css += `${property}: ${value};`;
				}
				css += '}';
			}
			if (media === "tablet" || media === "mobile") {
				css += `}`
			}
		}

		this.cssContainer.html(css);
	},


	_getCssStyle: function (element, styleProp) {
		var value = "";
		var el = element.get(0);

		if (typeof(element) == "string") {
			selector = element;
		} else {
			selector = this.getSelectorForElement(el);
		}

		media = $("#canvas").hasClass("tablet") ? "tablet" : $("#canvas").hasClass("mobile") ? "mobile" : "desktop";

		if (el.style && el.style.length > 0 && el.style[styleProp])//check inline
			var value = el.style[styleProp];
		else if (this.styles[media] !== undefined &&  this.styles[media][selector] !== undefined && this.styles[media][selector][styleProp] !== undefined) {	//check defined css
			var value = this.styles[media][selector][styleProp];
		}
		else if (window.getComputedStyle) {
			var value = document.defaultView.getDefaultComputedStyle ?
				document.defaultView.getDefaultComputedStyle(el, null).getPropertyValue(styleProp) :
				window.getComputedStyle(el, null).getPropertyValue(styleProp);
		}

		return value;
	},

	getStyle: function (element, styleProp) {
		return this._getCssStyle(element, styleProp);
	}
}

web.ContentManager = {
	getAttr: function(element, attrName) {
		return element.attr(attrName);
	},

	setAttr: function(element, attrName, value) {
		return element.attr(attrName, value);
	},

	setHtml: function(element, html) {
		return element.html(html);
	},

	getHtml: function(element) {
		return element.html();
	},

	setText: function(element, text) {
		return element.text(text);
	},

	getText: function(element) {
		return element.text();
	},
};

function getNodeTree (node, parent, allowedComponents) {

	function getNodeTreeTraverse (node, parent) {

		if (node.hasChildNodes()) {
			for (var j = 0; j < node.childNodes.length; j++) {

				child = node.childNodes[j];

				//skip text and comments nodes
				if (child.nodeType == 3 || child.nodeType == 8) {
					continue;
				}

				if (child && child["attributes"] != undefined &&
					(matchChild = web.Components.matchNode(child))) {

					if (Array.isArray(allowedComponents)
						&& allowedComponents.indexOf(matchChild.type) == -1) {

						element = getNodeTreeTraverse(child, parent);
						continue;
					}

					element = {
						name: matchChild.name,
						image: matchChild.image,
						type: matchChild.type,
						node: child,
						children: []
					};

					element.children = [];
					parent.push(element);

					element = getNodeTreeTraverse(child, element.children);
				} else
				{
					element = getNodeTreeTraverse(child, parent);
				}
			}
		}

		return false;
	}

	getNodeTreeTraverse(node, parent);
}
function drawComponentsTrees(tree) {
	console.log(tree);
}
function drawComponentsTree(tree) {
	var j = 1;
	var prefix = Math.floor(Math.random() * 100);

	function drawComponentsTreeTraverse(tree) {
		var panelName = "panel_"+Math.floor((Math.random() * 100) + 1);
		var html = $("<ol id=\""+panelName+"\"></ol>");
		j++;
		var slideNum = 1;
		var isSlider = 0;
		for (i in tree)
		{
			var node = tree[i];
			var id = prefix + '-' + j + '-' + i;
			if(node.name.toLowerCase() == "slider"){
				node.name = node.name+" "+slideNum;
				isSlider = 1;
				slideNum++;
			}
			if (tree[i].children.length > 0)
			{
				//item with inner component
				var li = null;
				if(node.name.toLowerCase().indexOf("slider")!=-1){
					li =  $('<li data-component="' + node.name + '">\
								<i class="la la-trash delete-slider-item text-danger" style="right: 10px;position: absolute;cursor:pointer;top: 5px;"></i><label for="id' + id + '" style="background-image:url(' + web.imgBaseUrl + node.image + ')"><span>' + node.name + '</span>  </label>\
								<input type="checkbox" id="id' + id + '">\
							</li>');
				}else{
				 li = $('<li data-component="' + node.name + '">\
								<label for="id' + id + '" style="background-image:url(' + web.imgBaseUrl + node.image + ')"><span>' + node.name + '</span></label>\
								<input type="checkbox" id="id' + id + '">\
							</li>');
				}
				li.append(drawComponentsTreeTraverse(node.children));
			}
			else
			{
				//item without sub items
				var li =$('<li data-component="' + node.name + '" class="file">\
							<label for="id' +  id + '" style="background-image:url(' + web.imgBaseUrl + node.image + ')"><span>' + node.name + '</span></label>\
							<input type="checkbox" id="id' + id + '">\
							</li>');
			}
			
			li.data("node", node.node);
			html.append(li);
		}
		if(isSlider == 1){
			// onClick=\"addNewSlide(\''+panelName+'\')\" 
			html.append('<li data-component="addBtn"><input type=\"button\"class=\"addNewSlide primary-btn-sm\" value=\"Add New Slide\" style=\"    opacity: 1;position: relative;height: 40px;width: 100%;\"></li>');
		}
		return html;
	}

	return drawComponentsTreeTraverse(tree);
}
function addNewSlide(panelName){
	$("#"+panelName+" li").first().find('label').click();
}

var selected = null;
var dragover = null;

web.SectionList = {

	selector: '.sections-container',
	allowedComponents: {},

	init: function(allowedComponents = {}) {

		this.allowedComponents = allowedComponents;

		$(this.selector).on("click", "> div .controls", function (e) {
			var node = $(e.currentTarget.parentNode).data("node");
			if (node) {

			delay(
				() => web.Builder.frameHtml.animate({
					scrollTop: $(node).offset().top - ($(node).height() / 2)
				}, 500),
			300);

				//node.click();
				web.Builder.selectNode(node);
				web.Builder.loadNodeComponent(node);
			}
		}).on("dblclick", "> div", function (e) {
			node = $(e.currentTarget).data("node");
			node.click();
		});


		$(this.selector).on("click", "li[data-component] label ", function (e) {
			node = $(e.currentTarget.parentNode).data("node");
			console.log("item node clicked");
			console.log(e.currentTarget.parentNode);
			if(e.currentTarget.parentNode.getAttribute("data-component").toLocaleLowerCase().indexOf("slider")!=-1){
			var nodeId =e.currentTarget.parentNode.getAttribute("data-component").toLocaleLowerCase().replace("slider","").replace(" ","");
			var elementId = node.parentNode.parentNode.getAttribute('id');
				console.log(elementId);
				console.log(nodeId);
				$("#iframe1").contents().find("#"+elementId).carousel(parseInt(nodeId-1));

			}
			
			delay(
				() => web.Builder.frameHtml.animate({
					scrollTop: $(node).offset().top - ($(node).height() / 2)
				}, 1000),
			300);

			node.click();
		}).on("click", "li[data-component] .addNewSlide", function (e) {
			node = $(e.currentTarget.parentNode.previousSibling.previousSibling.previousSibling).data("node");
			var elementId = node.parentNode.parentNode.getAttribute('id');
			var currentId = node.getAttribute('data-id');
			newNode = "<div class=\"carousel-item\" data-id=\""+(parseInt(currentId)+1)+"\"><img src=\"https://admin.mwrdev.com/sliders/slide1.jpg\" class=\"d-block w-100\" alt=\"...\"><div class=\"carousel-caption d-md-block\"><h5>New slide label</h5><p>Some representative placeholder content for the new slide.</p></div></div>";
			//newNode.setAttribute('data-id',parseInt(currentId)+1);
			$("#iframe1").contents().find("#"+elementId+" .carousel-inner").append(newNode);
			$(".page-save-button").click();
			setTimeout(function() {web.FileManager.reloadCurrentPage();}, 3000);
			console.log("add node clicked");
			console.log(newNode);
		}).on("click", "li[data-component] .delete-slider-item", function (e) {
			
			console.log("add node clicked");
			node = $(e.currentTarget.parentNode).data("node");
			if(e.currentTarget.parentNode.getAttribute("data-component").toLocaleLowerCase().indexOf("slider")!=-1){
			var nodeId =e.currentTarget.parentNode.getAttribute("data-component").toLocaleLowerCase().replace("slider","").replace(" ","");
			var elementId = node.parentNode.parentNode.getAttribute('id');
				console.log(elementId);
				console.log(node.getAttribute('class'));
				
				Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.isConfirmed) {
				  
				  node.remove();
				   if (node.getAttribute('class').toLocaleLowerCase().indexOf("active")!=-1)
					{
						$("#iframe1").contents().find("#"+elementId+" .carousel-inner .carousel-item:first").addClass( "carousel-item active" );
					}
					
				  $(".page-save-button").click();
				  setTimeout(function() {web.FileManager.reloadCurrentPage();}, 3000);
				Swal.fire(
				  'Deleted!',
				  'Your file has been deleted.',
				  'success'
				)
			  }
			})
			}
			
			
		}).on("mouseenter", "li[data-component] label", function (e) {
			node = $($(e.currentTarget.parentNode).data("node"));
			node.css("outline","1px dashed blue");
			/*
			delay(
				() => web.Builder.frameHtml.animate({
					scrollTop: $(node).offset().top - ($(node).height() / 2)
				}, 500),
			1000);

			$(node).trigger("mousemove");
			*/
		}).on("mouseleave",  "li[data-component] label",  function (e){
			node = $($(e.currentTarget.parentNode).data("node"));
			node.css("outline","");
			if (node.attr("style") == "") node.removeAttr("style");
		});

		$(this.selector).on("dragstart", "> div", this.dragStart);
		$(this.selector).on("dragover", "> div", this.dragOver);
		$(this.selector).on("dragend", "> div", this.dragEnd);

		$(this.selector).on("click", ".delete-btn", function (e) {
			var section = $(e.currentTarget).parents(".section-item");
			var node = section.data("node");
			node.remove();
			section.remove();

			e.stopPropagation();
			e.preventDefault();
		});

		$(".sections-list").on("mouseenter", "li[data-section]", function (e) {
			var src = $("img", this).attr("src");
			$(".block-preview img").attr("src", src ).show();
		}).on("mouseleave", "li[data-section]", function (e) {
			$(".block-preview img").attr("src", "").hide();
		});
		/*
		$(this.selector).on("click", ".up-btn", function (e) {
			var section = $(e.currentTarget).parents(".section-item");
			var node = section.data("node");
			web.Builder.moveNodeUp(node);
			web.Builder.moveNodeUp(section.get(0));

			e.preventDefault();
		});


		$(this.selector).on("click", ".down-btn", function (e) {
			var section = $(e.currentTarget).parents(".section-item");
			var node = section.data("node");
			web.Builder.moveNodeDown(node);
			web.Builder.moveNodeDown(section.get(0));

			e.preventDefault();
		});
		*/


		var self = this;
		$("#sections .sections-list").on("click", " .add-section-btn", function (e) {
			var section = web.Sections.get(this.parentNode.dataset.type);
			let counter = Math.floor((Math.random() * 100) + 1);
			var node = $(section.html.replaceAll("carouselExampleCaptions", "mycarousel"+counter));
			var sectionType = node[0].tagName.toLowerCase();
			var afterSection = $(sectionType + ":last", web.Builder.frameBody);
			console.log("section logs");
			console.log(section);
			console.log(section.name)
			console.log(node);
			console.log(sectionType);
			console.log(afterSection);
			
			if (afterSection.length) {
				afterSection.after(node);
			} else {
				if (sectionType != "footer") {
					afterSection = $("footer:first", web.Builder.frameBody);

					if (afterSection.length) {
						afterSection.before(node);
					} else {
						$(web.Builder.frameBody).append(node);
					}
				} else {
					$(web.Builder.frameBody).append(node);
				}
			}

			web.Builder.frameHtml.animate({
				scrollTop: $(node).offset().top
			}, 1000);

			delay(() => node.click(), 1000);

			node = node.get(0);
			web.Undo.addMutation({type: 'childList',
									target: node.parentNode,
									addedNodes: [node],
									nextSibling: node.nextSibling});


			self.loadSections();
			e.preventDefault();
		});

		$(this.selector).on("click", ".properties-btn", function (e) {
			var section = $(e.currentTarget).parents(".section-item");
			var node = section.data("node");
			node.click();

			e.preventDefault();
		});

	},

	getSections: function() {
		var sections = [];
		var sectionList =
			$('> section, > header, > footer, > main, > nav', window.FrameDocument.body);

			sectionList.each(function (i, node) {
			var id = node.id ? node.id : (node.title ? node.title : node.className);
			if (!id) {
					id = 'section-' +  Math.floor(Math.random() * 10000);
			}
			var section = {
				name: id.replace(/[^\w+]+/g,' '),
				id: node.id,
				type: node.tagName.toLowerCase(),
				node: node
			};
			sections.push(section);
		});

		return sections;
	},

	loadComponents: function(sectionListItem, section, allowedComponents = {}) {

		var tree = [];
		getNodeTree(section, tree, allowedComponents);

		var html = drawComponentsTree(tree);
		$("ol", sectionListItem).replaceWith(html);
	},


	addSection: function(data) {
		var section = $(tmpl("web-section", data));
		section.data("node", data.node);
		$(this.selector).append(section);

		this.loadComponents(section, data.node, this.allowedComponents);
	},

	loadSections: function() {
		var sections = this.getSections();

		$(this.selector).html("");
		for (i in sections) {
			this.addSection(sections[i]);
		}

	},

	//drag and drop
	dragOver: function(e) {
		if (e.target != dragover &&
			e.target.className == "section-item") {

			if (dragover) {
				dragover.classList.remove("drag-over");
			}
			dragover = e.target;
			dragover.classList.add("drag-over");
		}
	},

	dragEnd: function (e) {

		if (dragover) {
			var parent = selected.parentNode;
			var selectedNode = $(selected).data("node");
			var replaceNode = $(dragover).data("node");

			if ((dragover.offsetTop > selected.offsetTop)) {
				//replace section item list
				parent.insertBefore(selected, dragover.nextElementSibling);
				//replace section
				replaceNode.parentNode.insertBefore(selectedNode, replaceNode.nextElementSibling);
			} else {
				//replace section item list
				parent.insertBefore(selected, dragover);
				//replace section
				replaceNode.parentNode.insertBefore(selectedNode, replaceNode);
			}

			dragover.classList.remove("drag-over");

			var node = selectedNode.get(0);

			self.dragMoveMutation = {type: 'move',
								target: node,
								oldParent: node.parentNode,
								oldNextSibling: node.nextSibling};

		}

		selected = null
		dragover = null
	},

	dragStart: function (e) {
		selected = e.target
	},
}

web.FileManager = {
	tree:false,
	pages:{},
	currentPage: false,
	allowedComponents: {},

	init: function(allowedComponents = {}) {

		this.allowedComponents = allowedComponents;
		this.tree = $("#filemanager .tree > ol").html("");

		$(this.tree).on("click", "a", function (e) {
			e.preventDefault();
			return false;
		});

		$(this.tree).on("click", ".delete", function (e) {
			let element = $(e.target).closest("li");
			web.FileManager.deletePage(element, e);
			e.preventDefault();
			return false;
		});

		$(this.tree).on("click", ".rename", function (e) {
			let element = $(e.target).closest("li");
			web.FileManager.renamePage(element, e, false);
			e.preventDefault();
			return false;
		});

		$(this.tree).on("click", ".duplicate", function (e) {
			let element = $(e.target).closest("li");
			web.FileManager.renamePage(element, e, true);
			e.preventDefault();
			return false;
		});

		$(this.tree).on("click", "li[data-page] label", function (e) {
			var page = $(this.parentNode).data("page");
			if (page) web.FileManager.loadPage(page, allowedComponents);
			return false;
		})

		$(this.tree).on("click", "li[data-component] label ", function (e) {
			node = $(e.currentTarget.parentNode).data("node");

			delay(
				() => web.Builder.frameHtml.animate({
					scrollTop: $(node).offset().top - ($(node).height() / 2)
				}, 500),
			500);


			node.click();

		}).on("mouseenter", "li[data-component] label", function (e) {

			node = $(e.currentTarget.parentNode).data("node");

			delay(
				() => web.Builder.frameHtml.animate({
					scrollTop: $(node).offset().top - ($(node).height() / 2)
				}, 500),
			 1000);

			$(node).trigger("mousemove");

		});
	},

	deletePage: function(element, e) {
		let page = element[0].dataset;
		if (confirm(`Are you sure you want to delete "${page.file}"template?`)) {
			$.ajax({
				type: "POST",
				url: deleteUrl,//set your server side save script url
				data: {file:page.file},
				success: function (data, text) {
					let bg = "bg-success";
					if (data.success) {
						$("#top-panel .save-btn").attr("disabled", "true");
					} else {
						//bg = "bg-danger";
					}

					displayToast(bg, data.message ?? data);
				},
				error: function (data) {
					displayToast("bg-danger", data.responseText);
				}
			});
			element.remove();
		}
	},

	renamePage: function(element, e, duplicate = false) {
		let page = element[0].dataset;
		let newfile = prompt(`Enter new file name for "${page.file}"`, page.file);
		let _self = this;
		if (newfile) {
			$.ajax({
				type: "POST",
				url: renameUrl,//set your server side save script url
				data: {file:page.file, newfile:newfile, duplicate},
				success: function (data, text) {
					let bg = "bg-success";
					if (data.success) {
						$("#top-panel .save-btn").attr("disabled", "true");
					} else {
						//bg = "bg-danger";
					}

					displayToast(bg, data.message ?? data);
					let baseName = newfile.replace('.html', '');
					let newName = friendlyName(newfile.replace(/.*[\/\\]+/, '')).replace('.html', '');

					if (duplicate) {
						let data = _self.pages[page.page];
						data["file"] = newfile;
						data["title"] = newName;
						web.FileManager.addPage(baseName, data);
					} else {
					_self.pages[page.page]["file"] = newfile;
						_self.pages[page.page]["title"] = newName;
						$("> label span", element).html(newName);
					page.url = page.url.replace(page.file, newfile);
					page.file = newfile;
					_self.pages[page.page]["url"] = page.url;
					_self.pages[page.page]["file"] = page.file;
					}

				},
				error: function (data) {
					displayToast("bg-danger", data.responseText);
				}
			});


		}
	},

	addPage: function(name, data) {
		this.pages[name] = data;
		data['name'] = name;

		var folder = this.tree;
		if (data.folder)
		{
			if (!(folder = this.tree.find('li[data-folder="' + data.folder + '"]')).length)
			{
				data.folderTitle = data.folder[0].toUpperCase() + data.folder.slice(1);
				folder = $(tmpl("web-filemanager-folder", data));
				this.tree.append(folder);
			}

			folder = folder.find("> ol");
		}

		folder.append(
			tmpl("web-filemanager-page", data));
	},

	addPages: function(pages) {
		for (page in pages) {
			this.addPage(pages[page]['name'], pages[page]);
		}
	},

	addComponent: function(name, url, title, page) {
		$("[data-page='" + page + "'] > ol", this.tree).append(
			tmpl("web-filemanager-component", {name:name, url:url, title:title}));
	},

	loadComponents: function(allowedComponents = {}) {

		var tree = [];
		getNodeTree(window.FrameDocument.body, tree, allowedComponents);

		var html = drawComponentsTree(tree);
		$("[data-page='" + this.currentPage + "'] > ol", this.tree).replaceWith(html);
	},

	getCurrentUrl: function() {
		if (this.currentPage) {
		return this.pages[this.currentPage]['url'];
		}
	},

   	getPageData: function(key) {
		if (this.currentPage) {
		return this.pages[this.currentPage][key];
		}
	},


    getCurrentFileName: function() {
		if (this.currentPage)
        {
            var folder = this.pages[this.currentPage]['folder'];
            folder = folder ? folder + '/': '';
            return folder + this.pages[this.currentPage]['file'];
        }
	},

	reloadCurrentPage: function() {
		if (this.currentPage)
		return this.loadPage(this.currentPage);
	},

	loadPage: function(name, allowedComponents = false, disableCache = true, loadComponents = false) {
		let page = $("[data-page='" + name + "']", this.tree);
		//remove active from current active page
		$("[data-page]", this.tree).removeClass("active");
		//set loaded page as active
		page.addClass("active");
		//open parent folder if closed
		$("> input[type=checkbox]", $(page).parents("[data-folder]")).prop("checked", true);

		this.currentPage = name;
		var url = this.pages[name]['url'];
		$(".btn-preview-url").attr("href", url);

		web.Builder.loadUrl(url + (disableCache ? (url.indexOf('?') > -1 ? '&r=':'?r=') + Math.random():''),
			function () {
				if (loadComponents) { web.FileManager.loadComponents(allowedComponents); }
				web.SectionList.loadSections(allowedComponents);
				web.StyleManager.init();
			});
	},

	scrollBottom: function() {
		var scroll = this.tree.parent();
		scroll.scrollTop(scroll.prop("scrollHeight"));
	},
}

web.Breadcrumb = {
	tree:false,

	init: function() {
		this.tree = $(".breadcrumb-navigator > .breadcrumb").html("");

		$(this.tree).on("click", ".breadcrumb-item", function (e) {
			let node = $(this).data("node");
			if (node) {
				node.click();

				delay(
					() => web.Builder.frameHtml.animate({
						scrollTop: $(node).offset().top - ($(node).height() / 2)
					}, 500),
				 100);
			}
			e.preventDefault();
		}).on("mouseenter", ".breadcrumb-item", function (e) {
			let node = $($(this).data("node"));
			node.css("outline","1px dashed blue");
			/*
			delay(
				() => web.Builder.frameHtml.animate({
					scrollTop: $(node).offset().top - ($(node).height() / 2)
				}, 500),
			 1000);

			$(node).trigger("mousemove");
			*/

		}).on("mouseleave", ".breadcrumb-item", function (e){
			let node = $($(this).data("node"));
			node.css("outline","");
			if (node.attr("style") == "") node.removeAttr("style");
		});
	},

	addElement: function(data, element) {
		var li = $(tmpl("web-breadcrumb-navigaton-item", data));
		li.data("node", element);
		$(this.tree).prepend(li);
	},

	loadBreadcrumb: function(element) {
		this.tree.html("");
		var currentElement = element;

		while (currentElement.parentElement) {
			this.addElement({
				"name": web.Builder._getElementType(currentElement).toLowerCase(),
			}, currentElement);

			currentElement = currentElement.parentElement;
		}
	}
}

web.FontsManager = {

	activeFonts:[],
	providers: {},//{"google":GoogleFontsManager};

	addProvider: function(provider, Obj) {
		this.providers[provider] = Obj;
	},

	//add also element so we can keep track of the used fonts to remove unused ones
	addFont: function(provider, fontFamily, element = false) {
		if (!provider) return;

		let providerObj = this.providers[provider];
		if (providerObj) {
			providerObj.addFont(fontFamily);
			this.activeFonts.push({provider, fontFamily, element});
		}
	},

	removeFont: function(provider, fontFamily) {
		let providerObj = this.providers[provider];
		if (provider!= "default" && providerObj) {
			providerObj.removeFont(fontFamily);
		}
	},

	//check if the added fonts are still used for the elements they were set and remove unused ones
	// cleanUnusedFonts: function (){
	// 	for (i in this.activeFonts) {
	// 		let elementFont = this.activeFonts[i];
	// 		if (elementFont.element) {
	// 			//if (getComputedStyle(elementFont.element)['font-family'] != elementFont.fontFamily) {
	// 			if (web.StyleManager.getStyle(element,'font-family') != elementFont.fontFamily) {
	// 				this.removeFont(elementFont.provider, elementFont.fontFamily);
	// 			}
	// 		}
	// 	}
	// }
};


function friendlyName(name) {
	name = name.replaceAll("--bs-","").replaceAll("-", " ").trim();
	return name = name[0].toUpperCase() + name.slice(1);
}

web.ColorPaletteManager = {

	getAllCSSVariableNames:  function (styleSheets = document.styleSheets, selector){
	   let cssVars = {"font": {}, "color" : {}, "dimensions": {}};
	   for(var i = 0; i < styleSheets.length; i++){
		  try{
			 let cssRules =  styleSheets[i].cssRules;
			 for( var j = 0; j < cssRules.length; j++){
				try{
				   let style = cssRules[j].style;
				   if (selector && cssRules[j].selectorText && cssRules[j].selectorText != selector) continue;
				   for(var k = 0; k < style.length; k++){
					  let name = style[k];
					  let value = style.getPropertyValue(name).trim();
					  let type = "";


					  if(name.startsWith("--")){
						//ignore bootstrap rgb variables
						if (name.endsWith("-rgb")) continue;
						//ignore variables depending on other variables
						if (value.startsWith("var(")) continue;

						 let friendlyName = name.replace("--bs-","").replaceAll("-", " ");

						 if (value.startsWith("#")) {
							 type = "color";
						} else if (value.indexOf('"') >= 0 || value.indexOf("'") >= 0) {
							type = "font";
						} else if (value.endsWith('em') > 0 || value.endsWith('px') > 0) {
							type = "dimensions";
						} else if (!isNaN(parseFloat(value))) {
							type = "dimensions";
						}

						if (type) {
							 if (!cssVars[type]) cssVars[type] = {};
							 cssVars[type][name] = {value, type, friendlyName};
						 }
					  }
				   }
				} catch (error) {}
			 }
		  } catch (error) {}
	   }
	   return cssVars;
	},

	getCssWithVars:  function (styleSheets = document.styleSheets, vars){
	   let cssVars = {};
	   let css = "";
	   let cssStyles = "";
	   for(var i = 0; i < styleSheets.length; i++){
		  try{
			 let cssRules =  styleSheets[i].cssRules;
			 for( var j = 0; j < cssRules.length; j++){
				try{
				   let style = cssRules[j].style;
				   //if (selector && cssRules[j].selectorText && cssRules[j].selectorText != selector) continue;
				   cssStyles = "";
				   for(var k = 0; k < style.length; k++){
					  let name = style[k];
					  let value = style.getPropertyValue(name);
					  if(name.startsWith('--bs-btn-')) {
						  for (v in vars) {
							  if (value == vars[v]) {
								  cssVars[name] = v;
								  cssStyles += name + ":var(" + v + ");\n";
							}
						  }
					  }

				   }
				   if (cssStyles) {
				   css += cssRules[j].selectorText + "{\n"
				   css += cssStyles;
				   css += "}\n";
					}
				} catch (error) {}
			 }
		  } catch (error) {}
	   }
	   return cssVars;
	},

	init: function(document) {
		web.Builder.selectedEl = $(document.body);
		web.Components.render("config/bootstrap", "#configuration .component-properties");
	},

};


// Toggle fullscreen
function launchFullScreen(document) {
  if(document.documentElement.requestFullScreen) {

		if (document.FullScreenElement)
			document.exitFullScreen();
		else
			document.documentElement.requestFullScreen();
//mozilla
  } else if(document.documentElement.mozRequestFullScreen) {

		if (document.mozFullScreenElement)
			document.mozCancelFullScreen();
		else
			document.documentElement.mozRequestFullScreen();
//webkit
  } else if(document.documentElement.webkitRequestFullScreen) {

		if (document.webkitFullscreenElement)
			document.webkitExitFullscreen();
		else
			document.documentElement.webkitRequestFullScreen();
//ie
  } else if(document.documentElement.msRequestFullscreen) {

		if (document.msFullScreenElement)
			document.msExitFullscreen();
		else
			document.documentElement.msRequestFullscreen();
  }
}


let fontList = [{
	value: "",
	text: "Default"
}, {
	value: "LoveloBlack, sans-serif",
	text: "LoveloBlack"
}, {
	value: "Helvetica, sans-serif",
	text: "Helvetica"
}, {
	value: "Arial, Helvetica, sans-serif",
	text: "Arial"
}, {
	value: "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
	text: 'Lucida Grande'
}, {
	value: "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
	text: 'Palatino Linotype'
}, {
	value: "'Times New Roman', Times, serif",
	text: 'Times New Roman'
}, {
	value: "Georgia, serif",
	text: "Georgia, serif"
}, {
	value: "Tahoma, Geneva, sans-serif",
	text: "Tahoma"
}, {
	value: "'Comic Sans MS', cursive, sans-serif",
	text: 'Comic Sans'
}, {
	value: "Verdana, Geneva, sans-serif",
	text: 'Verdana'
}, {
	value: "Impact, Charcoal, sans-serif",
	text: 'Impact'
}, {
	value: "'Arial Black', Gadget, sans-serif",
	text: 'Arial Black'
}, {
	value: "'Trebuchet MS', Helvetica, sans-serif",
	text: 'Trebuchet'
}, {
	value: "'Courier New', Courier, monospace",
	text: 'Courier New'
}, {
	value: "'Brush Script MT', sans-serif",
	text: 'Brush Script'
}
];



