web.ComponentsGroup['COMPONENTS'] =
[/*"elements/accordion",*/ "html/alert","html/audio",
"html/badge", "html/blockquote", "html/breadcrumbs","html/btn", "html/btn-link","html/button","html/buttongroup", "html/buttontoolbar", 
"elements/code","html/container",
 "html/card","html/checkbox","html/creategrid",
"html/div","widgets/embed-video",
"elements/gallery", "widgets/googlemaps",
    "html/heading", "html/hr",
    "html/image",  
    "html/list", "html/listgroup", 
    "html/pagination" , "html/paragraph",  "html/progress",
    "html/radiobutton",
    "elements/section", "elements/svg-icon",
    "html/table", "elements/tabs", 
/*"html/textinput", "html/textareainput", "html/selectinput", "html/fileinput","html/link","html/preformatted", "html/navbar",*/
   
     "html/video",
 
   
  ];

web.Components.extend("_base", "html/heading", {
    image: "icons/heading.svg",
    name: "Heading",
    nodes: ["h1", "h2","h3", "h4","h5","h6"],
    html: "<h1>Heading</h1>",
    
	properties: [
	{
        name: "Size",
        key: "size",
        inputtype: SelectInput,
        
        onChange: function(node, value) {
			
			return changeNodeName(node, "h" + value);
		},	
			
        init: function(node) {
            var regex;
            regex = /H(\d)/.exec(node.nodeName);
            if (regex && regex[1]) {
                return regex[1]
            }
            return 1
        },
        
        data:{
			options: [{
                value: "1",
                text: "H1"
            }, {
                value: "2",
                text: "H2"
            }, {
                value: "3",
                text: "H3"
            }, {
                value: "4",
                text: "H4"
            }, {
                value: "5",
                text: "H5"
            }, {
                value: "6",
                text: "H6"
            }]
       },
    }]
});    


let linkComponentProperties = [
/*	{
		name: "Text",
		key: "text",
		sort:1,
		htmlAttr: "innerText",
		inputtype: TextInput
	},*/
	{
		name: "Url",
		key: "href",
		sort:2,
		htmlAttr: "href",
		inputtype: LinkInput
	}, {
		name: "Rel",
		key: "rel",
		sort:3,
		htmlAttr: "rel",
		inputtype: LinkInput
	}, {
		name: "Target",
		key: "target",
		sort:4,
		htmlAttr: "target",
		inputtype: SelectInput,
		data:{
			options: [{
				value: "",
				text: ""
			}, {
				value: "_blank",
				text: "Blank"
			}, {
				value: "_parent",
				text: "Parent"
			}, {
				value: "_self",
				text: "Self"
			}, {
				value: "_top",
				text: "Top"
			}]
	   },
	}, {
		name: "Download",
		sort:5,
		key: "download",
		htmlAttr: "download",
		inputtype: CheckboxInput,
}];

web.Components.extend("_base", "html/link", {
    nodes: ["a"],
    name: "Link",
    html: '<a href="#" rel="noopener">Link Text</a>',
	image: "icons/link.svg",
    properties: linkComponentProperties
});

web.Components.extend("_base", "html/div", {
    classes: ["div", "div-fluid","carousel-item"],
    image: "icons/div.svg",
    html: '<div  style="min-height:150px;"><div class="m-5">blank div</div></div>',
    name: "Slider",
    properties: [
     {
        name: "Type",
        key: "type",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["div", "div-fluid","carousel-item"],
        data: {
            options: [{
                value: "div",
                text: "Default"
            }, {
                value: "div-fluid",
                text: "Fluid"
            }, {
                value: "slider",
                text: "Fluid"
            }]
        }
    },
	{
        name: "Background",
        key: "background",
		htmlAttr: "class",
        validValues: bgcolorClasses,
        inputtype: SelectInput,
        data: {
            options: bgcolorSelectOptions
        }
    },
	{
        name: "Background Color",
        key: "background-color",
		htmlAttr: "style",
        inputtype: ColorInput,
    },
	{
        name: "Text Color",
        key: "color",
		htmlAttr: "style",
        inputtype: ColorInput,
    }],
});

web.Components.extend("_base", "html/image", {
    nodes: ["img"],
    name: "Image",
    html: '<img src="' +  web.baseUrl + 'icons/image.svg" width="100" class="mw-00 align-center">',
    image: "icons/image.svg",
    resizable:true,//show select box resize handlers
    
    properties: [{
        name: "Image",
        key: "src",
        htmlAttr: "src",
        col:12,
        inputtype: ImageInput
    }, {
        name: "Width",
        key: "width",
        htmlAttr: "width",
        col:6,
        inputtype: TextInput
    }, {
        name: "Height",
        key: "height",
        htmlAttr: "height",
        col:6,
        inputtype: TextInput
    }, {
        name: "Alt",
        key: "alt",
        col:12,
        htmlAttr: "alt",
        inputtype: TextInput
    }, {
        name: "Repeat",
        key: "background-repeat",
        htmlAttr: "style",
        col:6,
        inputtype: SelectInput,
        data: {
			options: [{
				value: "",
				text: "Default"
			}, {	
				value: "repeat-x",
				text: "repeat-x"
			}, {
				value: "repeat-y",
				text: "repeat-y"
			}, {
				value: "no-repeat",
				text: "no-repeat"
			}],
		}
   	}, {
        name: "Size",
        key: "background-size",
       	htmlAttr: "style",
           col:6,
        inputtype: SelectInput,
        data: {
			options: [{
				value: "",
				text: "Default"
			}, {	
				value: "contain",
				text: "contain"
			}, {
				value: "cover",
				text: "cover"
			}],
		}
   	}, {
        name: "Align",
        key: "align",
        htmlAttr: "class",
        inline:false,
        validValues: ["", "align-left", "align-center", "align-right"],
        inputtype: RadioButtonInput,
        data: {
			extraclass:"btn-group-sm btn-group-fullwidth",
            options: [{
                value: "",
                icon:"la la-times",
                //text: "None",
                title: "None",
                checked:true,
            }, {
                value: "align-left",
                //text: "Left",
                title: "text-start",
                icon:"la la-align-left",
                checked:false,
            }, {
                value: "align-center",
                //text: "Center",
                title: "Center",
                icon:"la la-align-center",
                checked:false,
            }, {
                value: "align-right",
                //text: "Right",
                title: "Right",
                icon:"la la-align-right",
                checked:false,
            }],
        },
    },{
		key: "link_options",
        inputtype: SectionInput,
        name:false,
        data: {header:"Link"},
    },{
        name: "Enable link",
        key: "enable_link",
        inputtype: CheckboxInput,
        data: {
            className: "form-switch"
        },
		setGroup: value => {
			let group = $('.mb-3[data-group="link"]');
			if (value) {	
				group.attr('style','');
			} else {
				group.attr('style','display:none !important');
			}
		}, 		
		onChange : function(node, value, input)  {
			this.setGroup(value);
			if (value) {
				$(node).wrap('<a href="#"></a>');
			} else {
				$(node).unwrap('a');
			}
			return node;
		}, 
		init: function (node) {
			let value = node.parentNode.tagName.toLowerCase() == "a"
			this.setGroup(value);
			return value;
		}
	}].concat(
	    //add link properties after setting parent to <a> element
		linkComponentProperties.map(
		(el) => {let a = Object.assign({}, el);a["parent"] = "a";a["group"] = "link";return a}
	)),
	
    init(node)	{

		let group = $('.mb-3[data-group="link"]');
		if (node.parentNode.tagName.toLowerCase() == "a") {	
			group.attr('style','');
		} else {
			group.attr('style','display:none !important');
		}

		return node;
	}	
});

web.Components.extend("_base", "html/hr", {
    image: "icons/hr.svg",
    nodes: ["hr"],
    name: "Horizontal Rule",
    html: "<hr>"
});

web.Components.extend("_base", "html/label", {
    name: "Label",
    nodes: ["label"],
    html: '<label for="">Label</label>',
    properties: [{
        name: "For id",
        htmlAttr: "for",
        key: "for",
        inputtype: TextInput
    }]
});


web.Components.extend("_base", "html/textinput", {
    name: "Input",
	nodes: ["input"],
	//attributes: {"type":"text"},
    image: "icons/text_input.svg",
    html: '<div class="mb-3"><label>Text</label><input type="text" class="form-control"></div></div>',
    properties: [{
        name: "Value",
        key: "value",
        htmlAttr: "value",
        inputtype: TextInput
    }, {
        name: "Type",
        key: "type",
        htmlAttr: "type",
		inputtype: SelectInput,
        data: {
            options: [{
                value: "text",
                text: "text"
            }, {
                value: "button",
                text: "button"
            }, {
                value: "checkbox",
                text: "checkbox"
            }, {
                value: "color",
                text: "color"
            }, {
                value: "date",
                text: "date"
            }, {
                value: "datetime-local",
                text: "datetime-local"
            }, {
                value: "email",
                text: "email"
            }, {
                value: "file",
                text: "file"
            }, {
                value: "hidden",
                text: "hidden"
            }, {
                value: "image",
                text: "image"
            }, {
                value: "month",
                text: "month"
            }, {
                value: "number",
                text: "number"
            }, {
                value: "password",
                text: "password"
            }, {
                value: "radio",
                text: "radio"
            }, {
                value: "range",
                text: "range"
            }, {
                value: "reset",
                text: "reset"
            }, {
                value: "search",
                text: "search"
            }, {
                value: "submit",
                text: "submit"
            }, {
                value: "tel",
                text: "tel"
            }, {
                value: "text",
                text: "text"
            }, {
                value: "time",
                text: "time"
            }, {
                value: "url",
                text: "url"
            }, {
                value: "week",
                text: "week"
            }]
        }
    }, {
        name: "Placeholder",
        key: "placeholder",
        htmlAttr: "placeholder",
        inputtype: TextInput
    }, {
        name: "Disabled",
        key: "disabled",
        htmlAttr: "disabled",
		col:6,
        inputtype: CheckboxInput,
	},{
        name: "Required",
        key: "required",
        htmlAttr: "required",
		col:6,
        inputtype: CheckboxInput,
    }]
});

web.Components.extend("_base", "html/selectinput", {
	nodes: ["select"],
    name: "Select Input",
    image: "icons/select_input.svg",
    html: '<div class="mb-3"><label>Choose an option </label><select class="form-control"><option value="value1">Text 1</option><option value="value2">Text 2</option><option value="value3">Text 3</option></select></div>',

	beforeInit: function (node)
	{
		console.log(node);
		properties = [];
		var i = 0;
		
		$(node).find('option').each(function(e) {
			data = {"value": this.value, "text": this.text};
			i++;
			properties.push({
				name: "Option " + i,
				key: "option" + i,
				//index: i - 1,
				optionNode: this,
				inline:true,
				inputtype: TextValueInput,
				data: data,
				onChange: function(node, value, input) {
					
					option = $(this.optionNode);
					
					//if remove button is clicked remove option and render row properties
					if (input.nodeName == 'BUTTON')
					{
						option.remove();
						web.Components.render("html/selectinput");
						return node;
					}

					if (input.name == "value") option.attr("value", value); 
					else if (input.name == "text") option.text(value);
					
					return node;
				},	
			});
		});
		
		//remove all option properties
		this.properties = this.properties.filter(function(item) {
			return item.key.indexOf("option") === -1;
		});
		
		//add remaining properties to generated column properties
		properties.push(this.properties[0]);
		
		this.properties = properties;
		return node;
	},
    
    properties: [{
        name: "Option",
        key: "option1",
        inputtype: TextValueInput
	}, {
        name: "Option",
        key: "option2",
        inputtype: TextValueInput
	}, {
        name: "",
        key: "addChild",
        inputtype: ButtonInput,
        data: {text:"Add option", icon:"la-plus"},
        onChange: function(node)
        {
			 $(node).append('<option value="value">Text</option>');
			 
			 //render component properties again to include the new column inputs
			 web.Components.render("html/selectinput");
			 
			 return node;
		}
	}]
});

web.Components.extend("_base", "html/textareainput", {
    name: "Text Area",
    image: "icons/text_area.svg",
    html: '<div class="mb-3"><label>Your response:</label><textarea class="form-control"></textarea></div>'
});
web.Components.extend("_base", "html/radiobutton", {
    name: "Radio Button",
	attributes: {"type":"radio"},
    image: "icons/radio.svg",
    html: `<div class="form-check">
			  <label class="form-check-label">
				<input class="form-check-input" type="radio" name="radiobutton"> Option 1
			  </label>
			</div>
			<div class="form-check">
			  <label class="form-check-label">
				<input class="form-check-input" type="radio" name="radiobutton" checked> Option 2
			  </label>
			</div>
			<div class="form-check">
			  <label class="form-check-label">
				<input class="form-check-input" type="radio" name="radiobutton"> Option 3
			  </label>
			</div>`,
    properties: [{
        name: "Name",
        key: "name",
        htmlAttr: "name",
        inputtype: TextInput,
        //inline:true,
        //col:6
    },{
        name: "Value",
        key: "value",
        htmlAttr: "value",
        inputtype: TextInput,
        //inline:true,
        //col:6
    },{
		name: "Checked",
        key: "checked",
        htmlAttr: "Checked",
        inputtype: CheckboxInput,
        //inline:true,
        //col:6
     }]
});

web.Components.extend("_base", "html/checkbox", {
    name: "Checkbox",
    attributes: {"type":"checkbox"},
    image: "icons/checkbox.svg",
    html: `<div class="form-check">
			  <label class="form-check-label">
				<input class="form-check-input" type="checkbox" value=""> Default checkbox
			  </label>
			</div>`,
    properties: [{
        name: "Name",
        key: "name",
        htmlAttr: "name",
        inputtype: TextInput,
        //inline:true,
        //col:6
    },{
        name: "Value",
        key: "value",
        htmlAttr: "value",
        inputtype: TextInput,
        //inline:true,
        //col:6
    },{
		name: "Checked",
        key: "checked",
        htmlAttr: "Checked",
        inputtype: CheckboxInput,
        //inline:true,
        //col:6
     }]
});

web.Components.extend("_base", "html/fileinput", {
    name: "Input group",
	attributes: {"type":"file"},
    image: "icons/text_input.svg",
    html: '<div class="mb-3">\
			  <input type="file" class="form-control">\
			</div>'
});


web.Components.extend("_base", "html/video", {
    nodes: ["video"],
    name: "Video",
    html: '<video width="320" height="240" playsinline loop autoplay><source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4"><video>',
    dragHtml: '<img  width="320" height="240" src="' + web.baseUrl + 'icons/video.svg">',
	image: "icons/video.svg",
    resizable:true,//show select box resize handlers
    properties: [{
        name: "Src",
        child: "source",
        key: "src",
        htmlAttr: "src",
        inputtype: LinkInput
    },{
        name: "Width",
        key: "width",
        htmlAttr: "width",
        inputtype: TextInput
    }, {
        name: "Height",
        key: "height",
        htmlAttr: "height",
        inputtype: TextInput
    },{
        name: "Muted",
        key: "muted",
        htmlAttr: "muted",
        inputtype: CheckboxInput
    },{
        name: "Loop",
        key: "loop",
        htmlAttr: "loop",
        inputtype: CheckboxInput
    },{
        name: "Autoplay",
        key: "autoplay",
        htmlAttr: "autoplay",
        inputtype: CheckboxInput
    },{
        name: "Plays inline",
        key: "playsinline",
        htmlAttr: "playsinline",
        inputtype: CheckboxInput
    },{
        name: "Controls",
        key: "controls",
        htmlAttr: "controls",
        inputtype: CheckboxInput
    },{
	name:"",
	key: "autoplay_warning",
        inline:false,
        col:12,
        inputtype: NoticeInput,
        data: {
			type:'warning',
			title:'Autoplay',
			text:'Most browsers allow autoplay only if video is muted and plays inline'
		}
	}]
});


web.Components.extend("_base", "html/button", {
    nodes: ["button"],
    name: "Button Html",
    image: "icons/button.svg",
    html: '<button>Button</button>',
    properties: [{
        name: "Text",
        key: "text",
        htmlAttr: "innerHTML",
        inputtype: TextInput
    }, {
        name: "Name",
        key: "name",
        htmlAttr: "name",
        inputtype: TextInput
    }, {
        name: "Type",
        key: "type",
		htmlAttr: "type",
        inputtype: SelectInput,
        data: {
			options: [{
				value: "button",
				text: "button"
			}, {	
				value: "reset",
				text: "reset"
			}, {
				value: "submit",
				text: "submit"
			}],
		}
   	},{
        name: "Autofocus",
        key: "autofocus",
        htmlAttr: "autofocus",
        inputtype: CheckboxInput,
		inline:true,
        col:6,
   	},{
		name: "Disabled",
        key: "disabled",
        htmlAttr: "disabled",
		inline:true,
        col:6,
        inputtype: CheckboxInput,
		inline:true,
        col:6,
	}]
});

web.Components.extend("_base", "html/paragraph", {
    nodes: ["p"],
    name: "Paragraph",
	image: "icons/paragraph.svg",
	html: '<p>Lorem ipsum</p>',
    properties: [{
        name: "Text align",
        key: "text-align",
        htmlAttr: "class",
        inline:false,
        validValues: ["", "text-start", "text-center", "text-end"],
        inputtype: RadioButtonInput,
        data: {
			extraclass:"btn-group-sm btn-group-fullwidth",
            options: [{
                value: "",
                icon:"la la-times",
                //text: "None",
                title: "None",
                checked:true,
            }, {
                value: "text-start",
                //text: "Left",
                title: "text-start",
                icon:"la la-align-left",
                checked:false,
            }, {
                value: "text-center",
                //text: "Center",
                title: "Center",
                icon:"la la-align-center",
                checked:false,
            }, {
                value: "text-end",
                //text: "Right",
                title: "Right",
                icon:"la la-align-right",
                checked:false,
            }],
        },
	}]
});

web.Components.extend("_base", "html/blockquote", {
    nodes: ["blockquote"],
    name: "Blockquote",
	image: "icons/blockquote.svg",
	html: `<blockquote>
				Today I shall be meeting with interference, ingratitude, insolence, disloyalty, ill-will, and selfishness all of them due to the offenders' ignorance of what is good or evil..
			</blockquote>`,
});

web.Components.extend("_base", "html/list", {
    nodes: ["ul", "ol"],
    name: "List",
	image: "icons/list.svg",
	html: `<ul>
				<li>Today I shall be meeting with interference, ingratitude, insolence, disloyalty, ill-will, and selfishness all of them due to the offenders' ignorance of what is good or evil..</li>
				<li>Today I shall be meeting with interference, ingratitude, insolence, disloyalty, ill-will, and selfishness all of them due to the offenders' ignorance of what is good or evil..</li>
				<li>Today I shall be meeting with interference, ingratitude, insolence, disloyalty, ill-will, and selfishness all of them due to the offenders' ignorance of what is good or evil..</li>
			</ul>`,
});

web.Components.extend("_base", "html/preformatted", {
    nodes: ["pre"],
    name: "Preformatted",
	image: "icons/paragraph.svg",
	html: `<pre>Today I shall be meeting with interference, 
ingratitude, insolence, disloyalty, ill-will, and
selfishness all of them due to the offenders'
ignorance of what is good or evil..</pre>`,
    properties: [{
        name: "Text",
        key: "text",
        inline:false,
        htmlAttr: "innerHTML",
        inputtype: TextareaInput,
        data:{
			rows:20,
		}
    }]
});

web.Components.extend("_base", "html/form", {
    nodes: ["form"],
    image: "icons/form.svg",
    name: "Form",
    html: `<form action="" method="POST">
	  <div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">Email address</label>
		<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
	  </div>
	  <div class="mb-3">
		<label for="exampleInputPassword1" class="form-label">Password</label>
		<input type="password" class="form-control" id="exampleInputPassword1">
	  </div>
	  <div class="mb-3 form-check">
		<input type="checkbox" class="form-check-input" id="exampleCheck1">
		<label class="form-check-label" for="exampleCheck1">Check me out</label>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>`,
    properties: [/*{
        name: "Style",
        key: "style",
        htmlAttr: "class",
        validValues: ["", "form-search", "form-inline", "form-horizontal"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "form-search",
                text: "Search"
            }, {
                value: "form-inline",
                text: "Inline"
            }, {
                value: "form-horizontal",
                text: "Horizontal"
            }]
        }
    }, */{
        name: "Action",
        key: "action",
        htmlAttr: "action",
        inputtype: TextInput
    }, {
        name: "Method",
        key: "method",
        htmlAttr: "method",
        inputtype: SelectInput,
        data: {
            options: [{
                value: "post",
                text: "Post"
            }, {
                value: "get",
                text: "Get"
            }]
        }
    }, {
        name: "Encoding type",
        key: "enctype",
        htmlAttr: "enctype",
        inputtype: SelectInput,
        data: {
            options: [{
                value: "",
                text: ""
            }, {
                value: "application/x-www-form-urlencoded",
                text: "Url encoded (default)"
            }, {
                value: "multipart/form-data",
                text: "Multipart (for file upload)"
            }, {
                value: "text/plain",
                text: "Text plain"
            }]
        }
    }]
});

web.Components.extend("_base", "html/tablerow", {
    nodes: ["tr"],
    name: "Table Row",
    html: "<tr><td>Cell 1</td><td>Cell 2</td><td>Cell 3</td></tr>",
    properties: [{
        name: "Type",
        key: "type",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["", "success", "danger", "warning", "active"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "success",
                text: "Success"
            }, {
                value: "error",
                text: "Error"
            }, {
                value: "warning",
                text: "Warning"
            }, {
                value: "active",
                text: "Active"
            }]
        }
    }]
});
web.Components.extend("_base", "html/tablecell", {
    nodes: ["td"],
    name: "Table Cell",
    html: "<td>Cell</td>"
});

web.Components.extend("_base", "html/tableheadercell", {
    nodes: ["th"],
    name: "Table Header Cell",
    html: "<th>Head</th>"
});

web.Components.extend("_base", "html/tablehead", {
    nodes: ["thead"],
    name: "Table Head",
    html: "<thead><tr><th>Head 1</th><th>Head 2</th><th>Head 3</th></tr></thead>",
    properties: [{
        name: "Type",
        key: "type",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["", "success", "danger", "warning", "info"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "success",
                text: "Success"
            }, {
                value: "anger",
                text: "Error"
            }, {
                value: "warning",
                text: "Warning"
            }, {
                value: "info",
                text: "Info"
            }]
        }
    }]
});

web.Components.extend("_base", "html/table", {
    nodes: ["table"],
    classes: ["table"],
    image: "icons/table.svg",
    name: "Table",
    html: `<table class="table table-striped table-hover">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">First</th>
				  <th scope="col">Last</th>
				  <th scope="col">Handle</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">1</th>
				  <td>Mark</td>
				  <td>Otto</td>
				  <td>@mdo</td>
				</tr>
				<tr>
				  <th scope="row">2</th>
				  <td>Jacob</td>
				  <td>Thornton</td>
				  <td>@fat</td>
				</tr>
				<tr>
				  <th scope="row">3</th>
				  <td colspan="2">Larry the Bird</td>
				  <td>@twitter</td>
				</tr>
			  </tbody>
			</table>`,
    properties: [
	{
        name: "Type",
        key: "type",
		htmlAttr: "class",
        validValues: ["table-primary", "table-secondary", "table-success", "table-danger", "table-warning", "table-info", "table-light", "table-dark", "table-white"],
        inputtype: SelectInput,
        data: {
            options: [{
				value: "Default",
				text: ""
			}, {
				value: "table-primary",
				text: "Primary"
			}, {
				value: "table-secondary",
				text: "Secondary"
			}, {
				value: "table-success",
				text: "Success"
			}, {
				value: "table-danger",
				text: "Danger"
			}, {
				value: "table-warning",
				text: "Warning"
			}, {
				value: "table-info",
				text: "Info"
			}, {
				value: "table-light",
				text: "Light"
			}, {
				value: "table-dark",
				text: "Dark"
			}, {
				value: "table-white",
				text: "White"
			}]
        }
    },
	{
        name: "Responsive",
        key: "responsive",
        htmlAttr: "class",
        col:6,
        validValues: ["table-responsive"],
        inputtype: ToggleInput,
        data: {
            on: "table-responsive",
            off: ""
        }
    },   
	{
        name: "Small",
        key: "small",
        htmlAttr: "class",
        col:6,
        validValues: ["table-sm"],
        inputtype: ToggleInput,
        data: {
            on: "table-sm",
            off: ""
        }
    },   
	{
        name: "Hover",
        key: "hover",
        htmlAttr: "class",
        col:6,
        validValues: ["table-hover"],
        inputtype: ToggleInput,
        data: {
            on: "table-hover",
            off: ""
        }
    },   
	{
        name: "Bordered",
        key: "bordered",
        htmlAttr: "class",
        col:6,
        validValues: ["table-bordered"],
        inputtype: ToggleInput,
        data: {
            on: "table-bordered",
            off: ""
        }
    },   
	{
        name: "Striped",
        key: "striped",
        htmlAttr: "class",
        col:6,
        validValues: ["table-striped"],
        inputtype: ToggleInput,
        data: {
            on: "table-striped",
            off: ""
        }
    },   
	{
        name: "Inverse",
        key: "inverse",
        htmlAttr: "class",
         col:6,
        validValues: ["table-inverse"],
        inputtype: ToggleInput,
        data: {
            on: "table-inverse",
            off: ""
        }
    },   
    {
        name: "Head options",
        key: "head",
        htmlAttr: "class",
        child:"thead",
        inputtype: SelectInput,
        validValues: ["", "thead-dark", "thead-light"],
        data: {
            options: [{
                value: "",
                text: "None"
            }, {
                value: "thead-default",
                text: "Default"
            }, {
                value: "thead-inverse",
                text: "Inverse"
            }]
        }
    }]
});

web.Components.extend("_base", "html/audio", {
    nodes: ["audio"],
    attributes: ["data-component-audio"],
    name: "Audio",
    image: "icons/audio.svg",
    html: `<figure data-component-audio><audio controls src="#"></audio></figure>`,
    properties: [{
        name: "Src",
        key: "src",
        child:"audio",
        htmlAttr: "src",
        inputtype: LinkInput
	}, {
       	key: "audio_options",
        inputtype: SectionInput,
        name:false,
        data: {header:"Options"},
    }, {
		name: "Autoplay",
        key: "autoplay",
        htmlAttr: "autoplay",
        child:"audio",
        inputtype: CheckboxInput,
        inline:true,
        col:4,
/*    }, {
        name: "Controls",
        key: "controls",
        htmlAttr: "controls",
        inputtype: CheckboxInput,
        child:"audio",
        inline:true,
        col:4,
*/    }, {
        name: "Loop",
        key: "loop",
        htmlAttr: "loop",
        inputtype: CheckboxInput,
        child:"audio",
        inline:true,
        col:4
    }]
});

web.Components.extend("_base", "html/video", {
    nodes: ["video"],
    name: "Video",
    image: "icons/video.svg",
    html: `<video controls playsinline src="/media/Sky Clouds Royalty Free HD Video Footage [CC0] [fmngCpy1O2E].webm" poster="/media/Sky Clouds Royalty Free HD Video Footage [CC0] [fmngCpy1O2E].webp"></video>`,
    properties: [{
        name: "Poster",
        key: "poster",
        htmlAttr: "poster",
        inputtype: ImageInput
    }, {
        name: "Src",
        key: "src",
        htmlAttr: "src",
        inputtype: LinkInput
    },{
		key: "video_options",
        inputtype: SectionInput,
        name:false,
        data: {header:"Options"},
    }, {
		name: "Auto play",
        key: "autoplay",
        htmlAttr: "autoplay",
        inputtype: CheckboxInput,
        data: {
            on: "true",
            off: "false"
        },
        inline:true,
        col:4,
	}, {
        name: "Controls",
        key: "controls",
        htmlAttr: "controls",
        inputtype: CheckboxInput,
        data: {
            on: "true",
            off: "false"
        },
        inline:true,
        col:4,
    }, {
        name: "Loop",
        key: "loop",
        htmlAttr: "loop",
        inputtype: CheckboxInput,
        data: {
            on: "true",
            off: "false"
        },
        inline:true,
        col:4,
    }, {
        name: "Play inline",
        key: "playsinline",
        htmlAttr: "playsinline",
        inputtype: CheckboxInput,
        data: {
            on: "true",
            off: "false"
        },
        inline:true,
        col:4,
	}, {
        name: "Muted",
        key: "muted",
        htmlAttr: "muted",
        inputtype: CheckboxInput,
        data: {
            on: "true",
            off: "false"
        },
        inline:true,
        col:4,
    },{
	name:"",
	key: "autoplay_warning",
        inline:false,
        col:12,
        inputtype: NoticeInput,
        data: {
			type:'warning',
			title:'Autoplay',
			text:'Most browsers allow auto play only if video is muted and plays inline'
		}
	}]
});

web.Components.extend("_base", "html/pdf", {
    attributes: ["data-component-pdf"],
    image: "icons/pdf.svg",
    name: "Pdf embed",
    html: `<object data="" type="application/pdf" data-component-pdf></object>`,
    properties: [{
        name: "Data",
        key: "data",
        htmlAttr: "data",
        inputtype: TextInput
    }]
});

web.Components.extend("_base", "html/embed", {
    attributes: ["data-component-embed"],
    image: "icons/embed.svg",
    name: "Embed",
    html: `<object data="" type="application/pdf" data-component-pdf></object>`,
    properties: [{
        name: "Data",
        key: "data",
        htmlAttr: "data",
        inputtype: TextInput
    }]
});

web.Components.extend("_base", "html/html", {
    nodes: ["html"],
    name: "Html Page",
    image: "icons/posts.svg",
    html: `<html><body></body></html>`,
    properties: [{
        name: "Title",
        key: "title",
        htmlAttr: "innerHTML",
        inputtype: TextInput,
        child:"title",
    }, {
        name: "Meta description",
        key: "description",
        htmlAttr: "content",
        inputtype: TextInput,
        child:'meta[name=description]',
    }, {
        name: "Meta keywords",
        key: "keywords",
        htmlAttr: "content",
        inputtype: TextInput,
        child:'meta[name=keywords]',
    }]
});

/*
web.ComponentsGroup['Base'] =
["html/heading", "html/image", "html/hr",  "html/form", "html/textinput", "html/textareainput", "html/selectinput", "html/fileinput", "html/checkbox", "html/radiobutton", "html/link", "html/video", "html/button", "html/paragraph", "html/blockquote", "html/list", "html/table", "html/preformatted"];

*/





web.Components.extend("_base","elements/svg-icon", {
    nodes: ["svg"],
    name: "Svg Icon",
    image: "icons/star.svg",
    html: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="64" height="64">
		<path d="M 30.335938 12.546875 L 20.164063 11.472656 L 16 2.132813 L 11.835938 11.472656 L 1.664063 12.546875 L 9.261719 19.394531 L 7.140625 29.398438 L 16 24.289063 L 24.859375 29.398438 L 22.738281 19.394531 Z"/>
    </svg>`,
    properties: [{
		name: "Icon",
		key: "icon",
		inline:false,
		inputtype: HtmlListSelectInput,
		onChange:function(element, value, input, component) {
			var newElement = $(value);
			let attributes = element.prop("attributes");
			
			//keep old svg size and colors
			$.each(attributes, function() {
				if (this.name == "viewBox") return;
                newElement.attr(this.name, this.value);
            });
            
			element.replaceWith(newElement);
			return newElement;
		},
		data: {
			url: web.baseUrl + "../../resources/svg/icons/{value}/index.html",
			clickElement:"li",
			insertElement:"svg",
			elements: 'Loading ...',
			options: [{
                value: "eva-icons",
                text: "Eva icons"
            }, {
                value: "ionicons",
                text: "IonIcons"
            }, {
                value: "linea",
                text: "Linea"
            }, {
                value: "remix-icon",
                text: "RemixIcon"
            }, {
                value: "unicons",
                text: "Unicons"
            }, {
                value: "clarity-icons",
                text: "Clarity icons"
            }, {
                value: "jam-icons",
                text: "Jam icons"
            }, {
                value: "ant-design-icons",
                text: "Ant design icons"
            }, {
                value: "themify",
                text: "Themify"
            }, {
                value: "css.gg",
                text: "Css.gg"
            }, {
                value: "olicons",
                text: "Olicons"
            }, {
		value: "open-iconic",
		text: "Open iconic"
            }, {
                value: "boxicons",
                text: "Box icons"
            }, {
                value: "elegant-font",
                text: "Elegant font"
            }, {
                value: "dripicons",
                text: "Dripicons"
            }, {
                value: "feather",
                text: "Feather"
            }, {
                value: "coreui-icons",
                text: "Coreui icons"
            }, {
                value: "heroicons",
                text: "Heroicons"
            }, {
                value: "iconoir",
                text: "Iconoir"
            }, {
                value: "iconsax",
                text: "Iconsax"
            }, {
                value: "ikonate",
                text: "Ikonate"
            }, {
                value: "tabler-icons",
                text: "Tabler icons"
            }, {
                value: "octicons",
                text: "Octicons"
            }, {
                value: "system-uicons",
                text: "System-uicons"
            }, {
                value: "font-awesome",
                text: "FontAwesome"
            }, {
                value: "pe-icon-7-stroke",
                text: "Pixeden icon 7 stroke"
            }, {
                value: "77_essential_icons",
                text: "77 essential icons"
            }, {
                value: "150-outlined-icons",
                text: "150 outlined icons"
            }, {
                value: "material-design",
                text: "Material Design"
            }]
		},
	}, {
		name: "Width",
		key: "width",
		htmlAttr: "width",
		inputtype: RangeInput,
		data:{
			max: 640,
			min:6,
			step:1
		}
   }, {
		name: "Height",
		key: "height",
		htmlAttr: "height",
		inputtype: RangeInput,
		data:{
			max: 640,
			min:6,
			step:1
		}			
   }, {
		name: "Stroke width",
		key: "stroke-width",
		htmlAttr: "stroke-width",
		inputtype: RangeInput,
		data:{
			max: 512,
			min:1,
			step:1
		}			
   },{
		key: "svg_style_header",
		inputtype: SectionInput,
		name:false,
		//sort: base_sort++,
		section: style_section,
		data: {header:"Svg colors"},
	}, {
        name: "Fill Color",
        key: "fill",
        //sort: base_sort++,
        col:4,
        inline:true,
		section: style_section,
		htmlAttr: "fill",
        inputtype: ColorInput,
   },{
        name: "Color",
        key: "color",
        //sort: base_sort++,
        col:4,
        inline:true,
		section: style_section,
		htmlAttr: "color",
        inputtype: ColorInput,
   },{
        name: "Stroke",
        key: "Stroke",
        //sort: base_sort++,
        col:4,
        inline:true,
		section: style_section,
		htmlAttr: "color",
        inputtype: ColorInput,
  	}]
});   


web.Components.add("elements/svg-element", {
    nodes: ["path", "line", "polyline", "polygon", "rect", "circle", "ellipse", "g"],
    name: "Svg element",
    image: "icons/star.svg",
    html: ``,
    properties: [{
        name: "Fill Color",
        key: "fill",
        //sort: base_sort++,
        col:4,
        inline:true,
		section: style_section,
		htmlAttr: "fill",
        inputtype: ColorInput,
   },{
        name: "Color",
        key: "color",
        //sort: base_sort++,
        col:4,
        inline:true,
		section: style_section,
		htmlAttr: "color",
        inputtype: ColorInput,
   },{
        name: "Stroke",
        key: "Stroke",
        //sort: base_sort++,
        col:4,
        inline:true,
		section: style_section,
		htmlAttr: "color",
        inputtype: ColorInput,
  	}, {
  		name: "Stroke width",
		key: "stroke-width",
		htmlAttr: "stroke-width",
		inputtype: RangeInput,
		data:{
			max: 512,
			min:1,
			step:1
		}			
	}]
});  

//Gallery
web.Components.add("elements/gallery", {
    attributes: ["data-component-gallery"],
    name: "Gallery",
    image: "icons/images.svg",
    html: `
	<div class="gallery masonry has-shadow" data-component-gallery>
	<div class="item">
		<a>
			<img src="../media/9.jpg">
		</a>
	</div>
	<div class="item">
		<a>
			<img src="../media/2.jpg">
		</a>
	</div>
	<div class="item">
		<a>
			<img src="../media/3.jpg">
		</a>
	</div>
	<div class="item">
		<a>
			<img src="../media/4.jpg">
		</a>
	</div>
	<div class="item">
		<a>
			<img src="../media/5.jpg">
		</a>
	</div>
	<div class="item">
		<a>
			<img src="../media/6.jpg">
		</a>
	</div>
	<div class="item">
		<a>
			<img src="../media/7.jpg">
		</a>
	</div>
	<div class="item">
		<a>
			<img src="../media/8.jpg">
		</a>
	</div>
</div>
			`,
		properties: [{
			name: "Masonry layout",
			key: "masonry",
			htmlAttr: "class",
      col:6,
			validValues: ["masonry", "flex"],
			inputtype: ToggleInput,
			data: {
				on: "masonry",
				off: "flex"
			},
			setGroup: group => {
				$('.mb-3[data-group]').attr('style','display:none !important');
				$('.mb-3[data-group="'+ group + '"]').attr('style','');
			}, 		
			onChange : function(node, value, input)  {
				this.setGroup(value);
				return node;
			}, 
			init: function (node) {
				if ($(node).hasClass("masonry")) {
					return "masonry";
				} else {
					return "flex";
				}
			},   			
		}, {
			name: "Image shadow",
			key: "shadow",
			htmlAttr: "class",
      col:6,
			validValues: [ "", "has-shadow"],
			inputtype: ToggleInput,
			data: {
				on: "has-shadow",
				off: ""
			},
		}, {
			name: "Horizontal gap",
			key: "column-gap",
			htmlAttr: "style",
      col:6,
			inputtype: CssUnitInput,
			data:{
				max: 100,
				min:0,
				step:1
			}
	   }, {
			name: "Vertical gap",
			key: "margin-bottom",
			htmlAttr: "style",
			child: ".item",
      col:6,
			inputtype: CssUnitInput,
			data:{
				max: 100,
				min:0,
				step:1
			}
	   }, {
			name: "Images per row masonry",
			key: "column-count",
			group:"masonry",
			htmlAttr: "style",
			inputtype: RangeInput,
			data:{
				max: 12,
				min:1,
				step:1
			}
		}, {
			name: "Images per row flex",
			group:"flex",
			key: "flex-basis",
			child: ".item",
			htmlAttr: "style",
			inputtype: RangeInput,
			data:{
				max: 12,
				min:1,
				step:1
			},
			onChange: function(node, value, input, component, inputElement) {
				if (value) {
					value = 100 / value;
					value += "%";
				} 
				
				return value;
			}  			
	   }, {
			name: "",
			key: "addChild",
			inputtype: ButtonInput,
			data: {text:"Add image", icon:"la la-plus"},
			onChange: function(node) {
				 $(node).append('<div class="item"><a><img src="/media/15.jpg"></a></div>');
				 
				 //render component properties again to include the new image
				 //web.Components.render("ellements/gallery");
				 
				 return node;
			}
	}],
    init(node)	{
		
		$('.mb-3[data-group]').attr('style','display:none !important');
		
		let source = "flex";
		if ($(node).hasClass("masonry")) {
			source = "masonry";
		} else {
			source = "flex";
		}

		$('.mb-3[data-group="'+ source + '"]').attr('style','');
	}	
});  

/* Section */
let ComponentSectionContent = [{
        name: "Title",
        key: "title",
        htmlAttr: "title",
        inputtype: TextInput
    },{
        name: "Content",
        key: "text",
        htmlAttr: "innerHTML",
        sort: base_sort++,
        inline:false,       
        inputtype: TextareaInput,
        data:{
			rows:5,
		}
    },
	
	
	{
        name: "Container width",
        key: "container-width",
		child:"> .container, > .container-fluid",
        htmlAttr: "class",
        validValues: ["container", "container-fluid"],
        inputtype: RadioButtonInput,
        data: {
			extraclass:"btn-group-sm btn-group-fullwidth",
            options: [{
				value: "container",
				icon:"la la-box",
				text: "Boxed",
				title: "Boxed"
			}, 
			{
				value: "container-fluid",
				icon:"la la-arrows-alt-h",
				title: "Full",
				text: "Full"
			}]
        }
	}, {
        name: "Container height",
        key: "container-height",
		child:"> .container:first-child, > .container-fluid:first-child",
        htmlAttr: "class",
        validValues: ["", "vh-100"],
        inputtype: RadioButtonInput,
        data: {
			extraclass:"btn-group-sm btn-group-fullwidth",
            options: [{
				value: "container",
				icon:"la la-expand",
				text: "Auto",
				title: "Auto",
				checked:true,
			}, 
			{
				value: "vh-100",
				icon:"la la-arrows-alt-v",
				title: "Full",
				text: "Full"
			}]
        }
	}
];
   

let ComponentSectionStyle =  [{
		key: "Section Style",
		inputtype: SectionInput,
		name:false,
		section: style_section,
		data: {header:"Style"},
}];

let ComponentSectionAdvanced =  [{
		key: "Section Advanced",
		inputtype: SectionInput,
		name:false,
		section: advanced_section,
		data: {header:"Advanced"},
 
}];

//header
web.Components.add("elements/section", {
    nodes: ["section"],
    name: "Section",
    image: "icons/stream-solid.svg",
    init: function (node)
	{
		$('.mb-3[data-group]').hide();
		if (node.dataset.type != undefined)
		{
			$('.mb-3[data-group="'+ node.dataset.type + '"]').show();
		} else
		{		
			$('.mb-3[data-group]:first').show();
		}
	},	
    html: `<section><div class="container p-3"></div>
			</section>`,
    properties: [
		...ComponentSectionContent, 
		...ComponentSectionStyle,
		...ComponentSectionAdvanced
	]
});  

web.Components.add("elements/header", {
    nodes: ["header"],
    name: "Header",
    image: "icons/stream-solid.svg",
    html: `<header>
				<div class="container">
					<h1>Section</h1>
				</div>
			</header>`,
    properties: [
		...ComponentSectionContent, 
		...ComponentSectionStyle,
		...ComponentSectionAdvanced
	]
});  

//footer
web.Components.add("elements/footer", {
    nodes: ["footer"],
    name: "Footer",
    image: "icons/stream-solid.svg",
    html: `<footer>
				<div class="container">
					<h1>Section</h1>
				</div>
			</footer>`,
    properties: [
		...ComponentSectionContent, 
		...ComponentSectionStyle,
		...ComponentSectionAdvanced
	]
});  





//Slider
web.Components.add("elements/slider", {
    name: "Slider",
    image: "icons/slider.svg",
    html: `<section>
	
	<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item">
        <img class="bd-placeholder-img" width="100%" height="100%"  preserveAspectRatio="xMidYMid slice" ><img>
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Example headline.</h1>
            <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item active">
      <img class="bd-placeholder-img" width="100%" height="100%"  preserveAspectRatio="xMidYMid slice" ><img>   
	   <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
	  <img class="bd-placeholder-img" width="100%" height="100%"  preserveAspectRatio="xMidYMid slice" ><img>
       <div class="container">
          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
		<style>
		/* GLOBAL STYLES
-------------------------------------------------- */
/* Padding below the footer and lighter body text */

body {
  padding-top: 3rem;
  padding-bottom: 3rem;
  color: rgb(var(--bs-tertiary-color-rgb));
}


/* CUSTOMIZE THE CAROUSEL
-------------------------------------------------- */

/* Carousel base class */
.carousel {
  margin-bottom: 4rem;
}
/* Since positioning the image, we need to help out the caption */
.carousel-caption {
  bottom: 3rem;
  z-index: 10;
}

/* Declare heights because of positioning of img element */
.carousel-item {
  height: 32rem;
}


/* MARKETING CONTENT
-------------------------------------------------- */

/* Center align the text within the three columns below the carousel */
.marketing .col-lg-4 {
  margin-bottom: 1.5rem;
  text-align: center;
}
/* rtl:begin:ignore */
.marketing .col-lg-4 p {
  margin-right: .75rem;
  margin-left: .75rem;
}
/* rtl:end:ignore */


/* Featurettes
------------------------- */

.featurette-divider {
  margin: 5rem 0; /* Space out the Bootstrap <hr> more */
}

/* Thin out the marketing headings */
/* rtl:begin:remove */
.featurette-heading {
  letter-spacing: -.05rem;
}

/* rtl:end:remove */

/* RESPONSIVE CSS
-------------------------------------------------- */

@media (min-width: 40em) {
  /* Bump up size of carousel content */
  .carousel-caption p {
    margin-bottom: 1.25rem;
    font-size: 1.25rem;
    line-height: 1.4;
  }

  .featurette-heading {
    font-size: 50px;
  }
}

@media (min-width: 62em) {
  .featurette-heading {
    margin-top: 7rem;
  }
}
		</style>	
			
			</section>`,
    properties: [
		  {
			name: "Width",
			key: "width",
			htmlAttr: "width",
			inputtype: RangeInput,
			data:{
				max: 640,
				min:6,
				step:1
			}
		   }, {
			name: "Height",
			key: "height",
			htmlAttr: "height",
			inputtype: RangeInput,
			data:{
				max: 640,
				min:6,
				step:1
		   },
		}
	]
}); 	




//Tabs


web.Components.add("elements/tabs", {
   nodes:[".tabs"],
    name: "Tabs",
    image: "icons/tabs.svg",
    html: `<section>
	<div data-component-tabs>
		<div class="shadow">
			<nav>
			  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
				<button class="nav-link" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" type="button" role="tab" aria-controls="nav-about" aria-selected="false">About</button>
				<button class="nav-link" id="nav-services-tab" data-bs-toggle="tab" data-bs-target="#nav-services" type="button" role="tab" aria-controls="nav-services" aria-selected="false">Services</button>
				<button class="nav-link" id="nav-blog-tab" data-bs-toggle="tab" data-bs-target="#nav-blog" type="button" role="tab" aria-controls="nav-blog" aria-selected="false">Blog</button>
				<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
				<button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
				<button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled></button>
			  </div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
			  <div class="tab-pane show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis perferendis rem accusantium ducimus animi nesciunt expedita omnis aut quas molestias!</p>
			  </div>
			  <div class="tab-pane show" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab" tabindex="0">
			  <p>This is the About tab!</p>
			  </div>
			<div class="tab-pane show" id="nav-services" role="tabpanel" aria-labelledby="nav-services-tab" tabindex="0">
			<p>This is the Services tab!</p>
		  </div>
		  <div class="tab-pane show" id="nav-blog" role="tabpanel" aria-labelledby="nav-blog-tab" tabindex="0">
		  <p>This is the Blog tab!</p>
		</div>
			  <div class="tab-pane" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
				<p>Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin</p>
			  </div>
			  <div class="tab-pane" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
				<p>Quisque sagittis non ex eget vestibulum</p>
			  </div>
			  <div class="tab-pane" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
				<p>Sed viverra pellentesque dictum.</p>
			  </div>
			</div>
		</div>
	</div></section>`,



}); 	

//Accordion
web.Components.add("elements/accordion", {
    nodes: [".accordion"],
    name: "Accordion",
    image: "icons/accordion.svg",
    html: `<section>
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Accordion Item #1</button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Accordion Item #2</button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Accordion Item #3</button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>

<div class="accordion-item">
<h2 class="accordion-header" id="headingFour">
  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Accordion Item #4</button>
</h2>
<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
  <div class="accordion-body">
	<strong>This is the Fourth item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
  </div>
</div>
</div>

<div class="accordion-item">
<h2 class="accordion-header" id="headingFive">
  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Accordion Item #5</button>
</h2>
<div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
  <div class="accordion-body">
	<strong>This is the Fifth item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
  </div>
</div>
</div>

<div class="accordion-item">
  <h2 class="accordion-header" id="headingSix">
	<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Accordion Item #6</button>
  </h2>
  <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
	<div class="accordion-body">
	  <strong>This is the Sixth item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
	</div>
  </div>
</div>

</div></section>    
`,

}); 


web.Components.add("elements/counter", {
    nodes: [".counter"],
    name: "Counter",
    image: "icons/stopwatch.svg",
    html: `<i class="font-icon la la-star"></i>`,
    properties: [
	]
});   

web.Components.add("elements/social-icons", {
    nodes: [".counter"],
    name: "Social icons",
    image: "icons/social-icons.svg",
    html: `<i class="font-icon la la-star"></i>`,
    properties: [
	]
});   

web.Components.add("elements/carousel", {
    nodes: [".counter"],
    name: "Carousel",
    image: "icons/carousel.svg",
    html: `<i class="font-icon la la-star"></i>`,
    properties: [
	]
});   


web.Components.add("elements/divider", {
    nodes: [".counter"],
    name: "Divider",
    image: "icons/stopwatch.svg",
    html: `<i class="font-icon la la-star"></i>`,
    properties: [
	]
});   

web.Components.add("elements/separator", {
    nodes: [".counter"],
    name: "Separator",
    image: "icons/separator.svg",
    html: `<i class="font-icon la la-star"></i>`,
    properties: [
	]
});   


web.Components.add("elements/animated-headline", {
    nodes: [".counter"],
    name: "Animated headline",
    image: "icons/heading.svg",
    html: `<i class="font-icon la la-star"></i>`,
    properties: [
	]
});   

web.Components.add("elements/price-table", {
    nodes: [".counter"],
    name: "Price table",
    image: "icons/price-table.svg",
    html: `<i class="font-icon la la-star"></i>`,
    properties: [
	]
});   
 

web.Components.add("elements/reviews", {
    nodes: [".counter"],
    name: "Reviews",
    image: "icons/reviews.svg",
    html: `<i class="font-icon la la-star"></i>`,
    properties: [
	]
});   


  
web.Components.add("elements/rating", {
    nodes: [".rating"],
    name: "Rating stars",
    image: "icons/rating.svg",
    html: `<div class="rating">
                <i class="la la-star text-warning"></i>
                <i class="la la-star text-warning"></i>
                <i class="la la-star text-warning"></i>
                <i class="la la-star text-warning"></i>
                <i class="la la-star text-secondary"></i>
            </div>`,
    properties: [
	]
});   


web.Components.add("elements/code", {
    nodes: [".code"],
    name: "Custom Code",
	image: "icons/code.svg",
	html: `<div>Please enter your custom code in the property section</div>`,
    properties: [{
        name: "code",
        key: "code",
        inline:false,
        htmlAttr: "innerHTML",
        inputtype: TextareaInput,
        data:{
			rows:20,
		}
    }]
});




web.Components.extend("_base", "html/container", {
    classes: ["container", "container-fluid"],
    image: "icons/container.svg",
    html: '<div class="container" style="min-height:150px;"><div class="m-5">Container</div></div>',
    name: "Container",
    properties: [
     {
        name: "Type",
        key: "type",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["container", "container-fluid"],
        data: {
            options: [{
                value: "container",
                text: "Default"
            }, {
                value: "container-fluid",
                text: "Fluid"
            }]
        }
    },
	{
        name: "Background",
        key: "background",
		htmlAttr: "class",
        validValues: bgcolorClasses,
        inputtype: SelectInput,
        data: {
            options: bgcolorSelectOptions
        }
    },
	{
        name: "Background Color",
        key: "background-color",
		htmlAttr: "style",
        col:6,
        inputtype: ColorInput,
    },
	{
        name: "Text Color",
        key: "color",
		htmlAttr: "style",
        col:6,
        inputtype: ColorInput,
    }],
});
web.Components.extend("_base", "html/div", {
    classes: ["div", "div-fluid"],
    image: "icons/div.svg",
    html: '<div  style="min-height:150px;"><div class="m-5">blank div</div></div>',
    name: "Div",
    properties: [
     {
        name: "Type",
        key: "type",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["div", "div-fluid"],
        data: {
            options: [{
                value: "div",
                text: "Default"
            }, {
                value: "div-fluid",
                text: "Fluid"
            }]
        }
    },
	{
        name: "Background",
        key: "background",
		htmlAttr: "class",
        validValues: bgcolorClasses,
        inputtype: SelectInput,
        data: {
            options: bgcolorSelectOptions
        }
    },
	{
        name: "Background Color",
        key: "background-color",
		htmlAttr: "style",
        col:6,
        inputtype: ColorInput,
    },
	{
        name: "Text Color",
        key: "color",
		htmlAttr: "style",
        col:6,
        inputtype: ColorInput,
    }],
});
web.Components.extend("html/link", "html/btn", {
    classes: ["btn"],
    nodes: null,
    name: "Button",
    image: "icons/button.svg",
    html: '<a class="btn btn-primary">Primary</a>',
    properties: [{
        name: "Background",
        key: "background",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["btn-default", "btn-primary", "btn-info", "btn-success", "btn-warning", "btn-info", "btn-light", "btn-dark", "btn-outline-primary", "btn-outline-info", "btn-outline-success", "btn-outline-warning", "btn-outline-info", "btn-outline-light", "btn-outline-dark", "btn-link"],
        data: {
            options: [{
                value: "btn-default",
                text: "Default"
            }, {
                value: "btn-primary",
                text: "Primary"
            }, {
                value: "btn btn-info",
                text: "Info"
            }, {
                value: "btn-success",
                text: "Success"
            }, {
                value: "btn-warning",
                text: "Warning"
            }, {
                value: "btn-info",
                text: "Info"
            }, {
                value: "btn-light",
                text: "Light"
            }, {
                value: "btn-dark",
                text: "Dark"
            }, {
                value: "btn-outline-primary",
                text: "Primary outline"
            }, {
                value: "btn btn-outline-info",
                text: "Info outline"
            }, {
                value: "btn-outline-success",
                text: "Success outline"
            }, {
                value: "btn-outline-warning",
                text: "Warning outline"
            }, {
                value: "btn-outline-info",
                text: "Info outline"
            }, {
                value: "btn-outline-light",
                text: "Light outline"
            }, {
                value: "btn-outline-dark",
                text: "Dark outline"
            }, {
                value: "btn-link",
                text: "Link"
            }]
        }
    }, {
        name: "Size",
        key: "size",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["btn-lg", "btn-sm"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "btn-lg",
                text: "Large"
            }, {
                value: "btn-sm",
                text: "Small"
            }]
        }
   	},{
        name: "Autofocus",
        key: "autofocus",
        htmlAttr: "autofocus",
        inputtype: CheckboxInput,
		inline:true,
        col:6,
   	},{
        name: "Disabled",
        key: "disabled",
        htmlAttr: "class",
		inline:true,
        col:6,
        inputtype: ToggleInput,
        validValues: ["disabled"],
        data: {
            on: "disabled",
            off: null
        }
    },{
	key: "link_options",
        inputtype: SectionInput,
        name:false,
        data: {header:"Link"},
    }]
});
	
web.Components.extend("_base", "html/buttongroup", {
    classes: ["btn-group"],
    name: "Button Group",
    image: "icons/button_group.svg",
    html: '<div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn btn-secondary">Left</button><button type="button" class="btn btn-secondary">Middle</button> <button type="button" class="btn btn-secondary">Right</button></div>',
	properties: [{
	    name: "Size",
        key: "size",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["btn-group-lg", "btn-group-sm"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "btn-group-lg",
                text: "Large"
            }, {
                value: "btn-group-sm",
                text: "Small"
            }]
        }
    }, {
	    name: "Alignment",
        key: "alignment",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["btn-group", "btn-group-vertical"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "btn-group",
                text: "Horizontal"
            }, {
                value: "btn-group-vertical",
                text: "Vertical"
            }]
        }
    }]
});
web.Components.extend("_base", "html/buttontoolbar", {
    classes: ["btn-toolbar"],
    name: "Button Toolbar",
    image: "icons/button_toolbar.svg",
    html: '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">\
		  <div class="btn-group me-2" role="group" aria-label="First group">\
			<button type="button" class="btn btn-secondary">1</button>\
			<button type="button" class="btn btn-secondary">2</button>\
			<button type="button" class="btn btn-secondary">3</button>\
			<button type="button" class="btn btn-secondary">4</button>\
		  </div>\
		  <div class="btn-group me-2" role="group" aria-label="Second group">\
			<button type="button" class="btn btn-secondary">5</button>\
			<button type="button" class="btn btn-secondary">6</button>\
			<button type="button" class="btn btn-secondary">7</button>\
		  </div>\
		  <div class="btn-group" role="group" aria-label="Third group">\
			<button type="button" class="btn btn-secondary">8</button>\
		  </div>\
		</div>'
});
web.Components.extend("_base","html/alert", {
    classes: ["alert"],
    name: "Alert",
    image: "icons/alert.svg",
    html: '<div class="alert alert-warning alert-dismissible fade show" role="alert">\
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">\
			<!--span aria-hidden="true">&times;</span-->\
		  </button>\
		  <strong>Holy guacamole!</strong> You should check in on some of those fields below.\
		</div>',
    properties: [{
        name: "Type",
        key: "type",
        htmlAttr: "class",
        validValues: ["alert-primary", "alert-secondary", "alert-success", "alert-danger", "alert-warning", "alert-info", "alert-light", "alert-dark"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "alert-primary",
                text: "Default"
            }, {
                value: "alert-secondary",
                text: "Secondary"
            }, {
                value: "alert-success",
                text: "Success"
            }, {
                value: "alert-danger",
                text: "Danger"
            }, {
                value: "alert-warning",
                text: "Warning"
            }, {
                value: "alert-info",
                text: "Info"
            }, {
                value: "alert-light",
                text: "Light"
            }, {
                value: "alert-dark",
                text: "Dark"
            }]
        }
    }]
});
web.Components.extend("_base", "html/badge", {
    classes: ["badge"],
    image: "icons/badge.svg",
    name: "Badge",
    html: '<span class="badge bg-primary">Primary badge</span>',
    properties: [{
        name: "Color",
        key: "color",
        htmlAttr: "class",
        validValues:["bg-primary", "bg-secondary", "bg-success", "bg-danger", "bg-warning", "bg-info", "bg-body-secondary", "bg-dark"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "bg-primary",
                text: "Primary"
            }, {
                value: "bg-secondary",
                text: "Secondary"
            }, {
                value: "bg-success",
                text: "Success"
            }, {
                value: "bg-warning",
                text: "Warning"
            }, {
                value: "bg-danger",
                text: "Danger"
            }, {
                value: "bg-info",
                text: "Info"
            }, {
                value: "bg-body-secondary",
                text: "Light"
            }, {
                value: "bg-dark",
                text: "Dark"
            }]
        }
     }]
});
web.Components.extend("_base", "html/card", {
    classes: ["card"],
    image: "icons/panel.svg",
    name: "Card",
    html: '<div class="card">\
		  <img class="card-img-top bg-body-secondary" src="' +  web.baseUrl + 'icons/image.svg" alt="Card image cap">\
		  <div class="card-body">\
			<h4 class="card-title">Card title</h4>\
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>\
			<a href="#" class="btn btn-primary">Go somewhere</a>\
		  </div>\
		</div>'
});

web.Components.extend("_base", "html/listgroup", {
    name: "List Group",
    image: "icons/list_group.svg",
    classes: ["list-group"],
    html: '<ul class="list-group">\n  <li class="list-group-item">\n    <span class="badge bg-success">14</span>\n    Cras justo odio\n  </li>\n  <li class="list-group-item">\n    <span class="badge bg-primary">2</span>\n    Dapibus ac facilisis in\n  </li>\n  <li class="list-group-item">\n    <span class="badge bg-danger">1</span>\n    Morbi leo risus\n  </li>\n</ul>',
	properties: [{
        name: "Flush",
        key: "flush",
        col:3,
        htmlAttr: "class",
        validValues: ["", "list-group-flush"],
        inputtype: ToggleInput,
        data: {
            on: "list-group-flush",
            off: ""
        }
    },{
        name: "Numbered",
        key: "numbered",
        htmlAttr: "class",
        col:3,
        validValues: ["", "list-group-numbered"],
        inputtype: ToggleInput,
        data: {
            on: "list-group-numbered",
            off: ""
        }
    },{
        name: "Horizontal",
        key: "horizontal",
        col:3,
        htmlAttr: "class",
        validValues: ["", "list-group-horizontal"],
        inputtype: ToggleInput,
        data: {
            on: "list-group-horizontal",
            off: ""
        }
    }]    
});

web.Components.extend("_base", "html/listitem", {
    name: "List Item",
    classes: ["list-group-item"],
    html: '<li class="list-group-item"><span class="badge bg-primary">14</span> Cras justo odio</li>',
	properties: [{
        name: "Background",
        key: "background",
        htmlAttr: "class",
        validValues:["list-group-item-primary", "list-group-item-secondary", "list-group-item-success", "list-group-item-danger", "list-group-item-warning", "list-group-item-info", "list-group-item-light", "list-group-item-dark"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "list-group-item-primary",
                text: "Primary"
            }, {
                value: "list-group-item-secondary",
                text: "Secondary"
            }, {
                value: "list-group-item-success",
                text: "Success"
            }, {
                value: "list-group-item-warning",
                text: "Warning"
            }, {
                value: "list-group-item-danger",
                text: "Danger"
            }, {
                value: "list-group-item-info",
                text: "Info"
            }, {
                value: "list-group-item-light",
                text: "Light"
            }, {
                value: "list-group-item-dark",
                text: "Dark"
            }]
        }
     },	{
        name: "Active",
        key: "active",
        htmlAttr: "class",
        validValues: ["", "active"],
        inputtype: ToggleInput,
        inline:true,
        col:6,
        data: {
            on: "active",
            off: ""
        }
    },{
        name: "Disabled",
        key: "disabled",
        htmlAttr: "class",
        validValues: ["", "disabled"],
        inputtype: ToggleInput,
        inline:true,
        col:6,
        data: {
            on: "disabled",
            off: ""
        }
    }]    
});

web.Components.extend("_base", "html/breadcrumbs", {
    classes: ["breadcrumb"],
    name: "Breadcrumbs",
    image: "icons/breadcrumbs.svg",
    html: `<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item"><a href="#">Library</a></li>
			s<li class="breadcrumb-item active" aria-current="page"><a href="#">Book</a></li>
		  </ol>`,
	properties: [{
		name: "Divider",
		key: "--bs-breadcrumb-divider",
		htmlAttr: "style",
		inputtype: TextInput
	}]        
});

web.Components.extend("_base", "html/breadcrumbitem", {
	classes: ["breadcrumb-item"],
    name: "Breadcrumb Item",
    html: '<li class="breadcrumb-item"><a href="#">Library</a></li>',
    properties: [{
        name: "Active",
        key: "active",
        htmlAttr: "class",
        validValues: ["", "active"],
        inputtype: ToggleInput,
        data: {
            on: "active",
            off: ""
        }
    }]
});
web.Components.extend("_base", "html/pagination", {
    classes: ["pagination"],
    name: "Pagination",
    image: "icons/pagination.svg",
    html: '<nav aria-label="Page navigation example">\
	  <ul class="pagination">\
		<li class="page-item"><a class="page-link" href="#">Previous</a></li>\
		<li class="page-item"><a class="page-link" href="#">1</a></li>\
		<li class="page-item"><a class="page-link" href="#">2</a></li>\
		<li class="page-item"><a class="page-link" href="#">3</a></li>\
		<li class="page-item"><a class="page-link" href="#">Next</a></li>\
	  </ul>\
	</nav>',

    properties: [{
        name: "Size",
        key: "size",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["pagination-lg", "pagination-sm"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "pagination-lg",
                text: "Large"
            }, {
                value: "pagination-sm",
                text: "Small"
            }]
        }
    },{
        name: "Alignment",
        key: "alignment",
        htmlAttr: "class",
        inputtype: SelectInput,
        validValues: ["justify-content-center", "justify-content-end"],
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "justify-content-center",
                text: "Center"
            }, {
                value: "justify-content-end",
                text: "Right"
            }]
        }
    }]	
});
web.Components.extend("_base", "html/pageitem", {
	classes: ["page-item"],
    html: '<li class="page-item"><a class="page-link" href="#">1</a></li>',
    name: "Pagination Item",
    properties: [{
        name: "Link To",
        key: "href",
        htmlAttr: "href",
        child:".page-link",
        inputtype: LinkInput
    }, {
        name: "Active",
        key: "active",
        htmlAttr: "class",
        validValues: ["active"],
        inputtype: ToggleInput,
        data: {
            on: "active",
            off: ""
        }
    }, {
        name: "Disabled",
        key: "disabled",
        htmlAttr: "class",
        validValues: ["disabled"],
        inputtype: ToggleInput,
        data: {
            on: "disabled",
            off: ""
        }
   }]
});
web.Components.extend("_base", "html/progress", {
    classes: ["progress"],
    name: "Progress Bar",
    image: "icons/progressbar.svg",
    html: '<div class="progress"><div class="progress-bar w-25"></div></div>',
    properties: [{
        name: "Background",
        key: "background",
		htmlAttr: "class",
        validValues: bgcolorClasses,
        inputtype: SelectInput,
        data: {
            options: bgcolorSelectOptions
        }
    },
    {
        name: "Progress",
        key: "background",
        child:".progress-bar",
		htmlAttr: "class",
        validValues: ["", "w-25", "w-50", "w-75", "w-100"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "",
                text: "None"
            }, {
                value: "w-25",
                text: "25%"
            }, {
                value: "w-50",
                text: "50%"
            }, {
                value: "w-75",
                text: "75%"
            }, {
                value: "w-100",
                text: "100%"
            }]
        }
    }, 
    {
        name: "Progress background",
        key: "background",
        child:".progress-bar",
		htmlAttr: "class",
        validValues: bgcolorClasses,
        inputtype: SelectInput,
        data: {
            options: bgcolorSelectOptions
        }
    }, {
        name: "Striped",
        key: "striped",
        child:".progress-bar",
        htmlAttr: "class",
        col:6,
        validValues: ["", "progress-bar-striped"],
        inputtype: ToggleInput,
        data: {
            on: "progress-bar-striped",
            off: "",
        }
    }, {
        name: "Animated",
        key: "animated",
        child:".progress-bar",
        htmlAttr: "class",
        col:6,
        validValues: ["", "progress-bar-animated"],
        inputtype: ToggleInput,
        data: {
            on: "progress-bar-animated",
            off: "",
        }
    }]
});
web.Components.extend("_base", "html/navbar", {
    classes: ["navbar"],
    image: "icons/navbar.svg",
    name: "Nav Bar",
    html: `<nav class="navbar navbar-expand-lg bg-body-secondary bg-body-tertiary">
			  <div class="container-fluid">
				<a class="navbar-brand" href="#">Navbar</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
					  <a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link disabled">Disabled</a>
					</li>
				  </ul>
				  <form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				  </form>
				</div>
			  </div>
			</nav>`,
    
    properties: [{
        name: "Color theme",
        key: "color",
        htmlAttr: "class",
        validValues: ["navbar-light", "navbar-dark"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "navbar-light",
                text: "Light"
            }, {
                value: "navbar-dark",
                text: "Dark"
            }]
        }
    },{
        name: "Background color",
        key: "background",
        htmlAttr: "class",
        validValues: bgcolorClasses,
        inputtype: SelectInput,
        data: {
            options: bgcolorSelectOptions
        }
    }, {
        name: "Placement",
        key: "placement",
        htmlAttr: "class",
        validValues: ["fixed-top", "fixed-bottom", "sticky-top"],
        inputtype: SelectInput,
        data: {
            options: [{
                value: "",
                text: "Default"
            }, {
                value: "fixed-top",
                text: "Fixed Top"
            }, {
                value: "fixed-bottom",
                text: "Fixed Bottom"
            }, {
                value: "sticky-top",
                text: "Sticky top"
            }]
        }
    }]
});

web.Components.extend("_base", "html/tablebody", {
    nodes: ["tbody"],
    name: "Table Body",
    html: "<tbody><tr><td>Cell 1</td><td>Cell 2</td><td>Cell 3</td></tr></tbody>"
});

web.Components.add("html/gridcolumn", {
    name: "Grid Column",
    image: "icons/grid_row.svg",
    classesRegex: ["col-"],
    html: '<div class="col-sm-4"><h3>col-sm-4</h3></div>',
    properties: [{
        name: "Column",
        key: "column",
        inline:false,
        inputtype: GridInput,
        data: {hide_remove:true},

		beforeInit: function(node) {
			_class = $(node).attr("class");
			
			var reg = /col-([^-\$ ]*)?-?(\d+)/g; 
			var match;

			while ((match = reg.exec(_class)) != null) {
				this.data["col" + ((match[1] != undefined)?"_" + match[1]:"")] = match[2];
			}
		},
		
		onChange: function(node, value, input) {
			var _class = node.attr("class");
			
			//remove previous breakpoint column size
			_class = _class.replace(new RegExp(input.name + '-\\d+?'), '');
			//add new column size
			if (value) _class +=  ' ' + input.name + '-' + value;
			node.attr("class", _class);
			
			return node;
		},				
	}]
});
web.Components.add("html/creategrid", {
    name: "Create Grid",
    image: "icons/grid_row.svg",
    classes: ["row"],
    html: '<div class="row"><div class="col-sm-4"><h3>col-sm-4</h3></div><div class="col-sm-4 col-5"><h3>col-sm-4</h3></div><div class="col-sm-4"><h3>col-sm-4</h3></div></div>',
    children :[{
		name: "html/gridcolumn",
		classesRegex: ["col-"],
	}],
	beforeInit: function (node)
	{
		properties = [];
		var i = 0;
		var j = 0;
		
		$(node).find('[class*="col-"]').each(function() {
			_class = $(this).attr("class");
			
			var reg = /col-([^-\$ ]*)?-?(\d+)/g; 
			var match;
			var data = {};

			while ((match = reg.exec(_class)) != null) {
				data["col" + ((match[1] != undefined)?"_" + match[1]:"")] = match[2];
			}
			
			i++;
			properties.push({
				name: "Column " + i,
				key: "column" + i,
				//index: i - 1,
				columnNode: this,
				col:12,
				inline:false,
				inputtype: GridInput,
				data: data,
				onChange: function(node, value, input) {

					//column = $('[class*="col-"]:eq(' + this.index + ')', node);
					var column = $(this.columnNode);
					
					//if remove button is clicked remove column and render row properties
					if (input.nodeName == 'BUTTON')
					{
						column.remove();
						web.Components.render("html/gridrow");
						return node;
					}

					//if select input then change column class
					_class = column.attr("class");
					
					//remove previous breakpoint column size
					_class = _class.replace(new RegExp(input.name + '-\\d+?'), '');
					//add new column size
					if (value) _class +=  ' ' + input.name + '-' + value;
					column.attr("class", _class);
					
					//console.log(this, node, value, input, input.name);
					
					return node;
				},	
			});
		});
		
		//remove all column properties
		this.properties = this.properties.filter(function(item) {
			return item.key.indexOf("column") === -1;
		});
		
		//add remaining properties to generated column properties
		properties.push(this.properties[0]);
		
		this.properties = properties;
		return node;
	},
    
    properties: [{
        name: "Column",
        key: "column1",
        inputtype: GridInput
	}, {
        name: "Column",
        key: "column1",
        inline:true,
        col:12,
        inputtype: GridInput
	}, {
        name: "",
        key: "addChild",
        inputtype: ButtonInput,
        data: {text:"Add column", icon:"la la-plus"},
        onChange: function(node)
        {
			 $(node).append('<div class="col p-3 border"></div>');
			 
			 //render component properties again to include the new column inputs
			 web.Components.render("html/gridrow");
			 
			 return node;
		}
	}]
});




web.Components.extend("_base", "widgets/embed-events", {
    name: "Events",
    attributes: ["data-component-events"],
    image: "icons/events.svg",
    dragHtml: '<img src="' +web.baseUrl +'icons/events.svg" width="100" height="100">',
    html: `<div data-component-events><div class="container"><div class="render_events" data-category-slug="null" data-filter="null" data-limit="null"><div class="render-event-list active-cursor"></div><div class="event-scripts"></div></div></div></div><style>.pb-event-action a,.render-event-list .pb-event-desc,.render-event-list .pb-event-info{font-size:16px;font-style:normal;font-weight:400;line-height:normal}.render-event-list.active-cursor *{pointer-events:none!important}.render-event-list{width:100%;display:flex;flex-wrap:wrap;gap:20px;padding:20px 0;justify-content:center}.render-event-list .pb-event{width:calc(33.33% - 14px);border-radius:12px;overflow:hidden;border:1px solid #eff8ff;background-color:#fff}.render-event-list .pb-event:hover{box-shadow:0 0 15px #d3d3d3;transition:.4s;border-color:#3595f6}.render-event-list .pb-event-img-container{width:100%;position:relative}.render-event-list .pb-event .pb-event-badge{position:absolute;top:20px;left:20px;padding:8px 20px;border-radius:4px;background:#3595f6;color:#fff;font-size:15px;font-style:normal;font-weight:500;line-height:normal}.render-event-list .pb-event-img-container a{display:block;height:277px}.render-event-list .pb-event-img-container img{width:100%;height:100%;object-fit:cover}.render-event-list .pb-event-body{padding:20px;display:flex;flex-direction:column;gap:15px}.render-event-list .pb-event-body h4{color:#231f20;font-size:24px;font-style:normal;font-weight:600;line-height:normal;text-transform:uppercase;margin:0;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;}.render-event-list .pb-event-body h4 a{color:#231f20;text-decoration:none}.render-event-list .pb-event-icon-content{width:100%;display:flex;gap:10px;align-items:center}.render-event-list .pb-event-icon{display:inline-flex;width:32px;height:32px;padding:6px;justify-content:center;align-items:center;border-radius:4px;background:#eff8ff}.render-event-list .pb-event-info{color:#231f20}.render-event-list .pb-event-desc{overflow: hidden;color:#231f20;margin:0;height:65px;word-break: break-word;}.pb-event-action{display:flex;padding:0;justify-content:center;align-items:flex-start;gap:10px;background:#eff8ff}.pb-event-action a{color:#3595f6;text-decoration:none;display:block;padding:20px;width:100%;text-align:center}.pb-event-action a:hover{color:#fff;background:#333}.pb-event-action a:hover svg path{fill:#fff}@media only screen and (max-width:991px){.render-event-list .pb-event{width:calc(50% - 10px)}.render-event-list .pb-event-body h4{font-size:18px}.render-event-list .pb-event-img-container a{height:200px}}@media only screen and (max-width:479px){.render-event-list .pb-event{width:100%}.render-event-list .pb-event-desc{height:auto}.pb-event-action a{padding:15px}}</style>`,
    init: async function (node) {
        const event_lists = jQuery(".render_events", node);
      const init_status = event_lists.attr('init-data')
      let default_category = event_lists.attr('data-category-slug');
      let default_filter = event_lists.attr('data-filter');
      let default_limit = event_lists.attr('data-limit');

      //catgeory dropdown
      const category_reuslt = await getCategory();
      if(category_reuslt.category_all.length > 0){
          let category_option = ``;
          category_reuslt.category_all.map((ls,i)=>{
              let selected = "";
              if(default_category == 0){ default_category = ls.slug; selected = "selected"};
              category_option += `<option value="${ls.slug}" ${selected}>${ls.name}</option>`;
              selected = "";
          });
          $('[name="drp_category_lists"]').html(category_option)
      }

      let category_slug = $(".component-properties select[name=drp_category_lists]");
      let event_filter = $(".component-properties select[name=drp_event_filter]");
      let event_limit = $(".component-properties select[name=drp_event_limit]");

      if(typeof init_status != "undefined"){
          //catgeory dropdown
          const initCall = async () => {
              const event_reuslt = await getEvents(default_category, default_filter, default_limit);
              const params_node = {
                  element : event_lists,
                  events: event_reuslt,
                  category_slug :default_category,
                  filter : default_filter,
                  limit: default_limit
              };
              renderEventsHtml(params_node);
              category_slug.val(default_category)
              event_filter.val(default_filter)
              event_limit.val(default_limit)
          }
          initCall();
          event_lists.attr('init-data',true)
      }else{

          //default
          if(category_slug.val() != null){
              default_category = category_slug.val();
          }
          if(event_filter.val() == null){
              default_filter = "desc";
              event_filter.val(default_filter)
          }
          if(event_limit.val() == null){
              default_limit = "6";
              event_limit.val(default_limit);
          }

          //catgeory dropdown
          const initCall = async () => {
              const event_reuslt = await getEvents(default_category, default_filter, default_limit);
              const params_node = {
                  element : event_lists,
                  events: event_reuslt,
                  category_slug :default_category,
                  filter : default_filter,
                  limit: default_limit
              };
              renderEventsHtml(params_node);
              category_slug.val(default_category)
              event_filter.val(default_filter)
              event_limit.val(default_limit)
          }
          initCall();
          event_lists.attr('init-data',true)
      }
    },
    onChange:  function (node, property, value) {},
    properties: [
      {
          name: "Filter Events",
          key: "drp_event_filter",
          inputtype: SelectInput,
          data: {
              options: [
                  {
                      text: "Newest",
                      value: "desc",
                  },
                  {
                      text: "Oldest",
                      value: "asc",
                  }
              ],
          },
          onChange: function (node, value, input, component) {
              const category_slug = $(".component-properties select[name=drp_category_lists]").val();
              const event_limit = $(".component-properties select[name=drp_event_limit]").val();
              const event_lists = jQuery(".render_events", node);
              const initCall = async () => {
                  const event_reuslt = await getEvents(category_slug, value, event_limit);
                  const params_node = {
                      element : event_lists,
                      events: event_reuslt,
                      category_slug :category_slug,
                      filter : value,
                      limit: event_limit
                  };
                  renderEventsHtml(params_node);
              }
              initCall();
              return node; 
          },
      },
      {
          name: "Category",
          key: "drp_category_lists",
          inputtype: SelectInput,
          data: { options: [] },
          onChange: async function (node, value, input, component) {
              const event_filter = $(".component-properties select[name=drp_event_filter]").val();
              const event_limit = $(".component-properties select[name=drp_event_limit]").val();
              const event_lists = jQuery(".render_events", node);
              const initCall = async () => {
                  const event_reuslt = await getEvents(value, event_filter, event_limit);
                  const params_node = {
                      element : event_lists,
                      events: event_reuslt,
                      category_slug :value,
                      filter : event_filter,
                      limit: event_limit
                  };
                  renderEventsHtml(params_node);
              }
              initCall();
              return node;   
          },
      },
      {
          name: "Show events",
          key: "drp_event_limit",
          inputtype: SelectInput,
          data: {
              options: [
                  {
                      text: "6",
                      value: "6",
                  },
                  {
                      text: "12",
                      value: "12",
                  },
                  {
                      text: "18",
                      value: "18",
                  },
                  {
                      text: "24",
                      value: "24",
                  }
              ],
          },
          onChange: function (node, value, input, component) {
              const category_slug = $(".component-properties select[name=drp_category_lists]").val();
              const event_filter = $(".component-properties select[name=drp_event_filter]").val();
              const event_lists = jQuery(".render_events", node);
              const initCall = async () => {
                  const event_reuslt = await getEvents(category_slug, event_filter, value);
                  const params_node = {
                      element : event_lists,
                      events: event_reuslt,
                      category_slug :category_slug,
                      filter : event_filter,
                      limit: value
                  };
                  renderEventsHtml(params_node);
              }
              initCall();
              return node;
          },
      },
  ]
});

web.Components.extend("_base", "widgets/embed-ecommerce", {
    name: "eCommerce",
    attributes: ["data-component-ecommerce"],
    image: "icons/ecommerce.svg",
    dragHtml: '<img src="' +web.baseUrl +'icons/ecommerce.svg" width="100" height="100">',
    html: `<div data-component-ecommerce><div class="container"><div class="render_ecommerce" data-category-slug="null" data-filter="null" data-limit="null"><div class="render-ecommerce-list active-cursor"></div><div class="ecommerce-scripts"></div></div></div></div><style>.pb-ecommerce-action a,.render-ecommerce-list .pb-ecommerce-desc,.render-ecommerce-list .pb-ecommerce-info{font-size:16px;font-style:normal;font-weight:400;line-height:normal}.render-ecommerce-list.active-cursor *{pointer-events:none!important}.render-ecommerce-list{width:100%;display:flex;flex-wrap:wrap;gap:20px;padding:20px 0;justify-content:center}.render-ecommerce-list .pb-ecommerce{width:calc(33.33% - 14px);border-radius:12px;overflow:hidden;border:1px solid #eff8ff;background-color:#fff}.render-ecommerce-list .pb-ecommerce:hover{box-shadow:0 0 15px #d3d3d3;transition:.4s;border-color:#3595f6}.render-ecommerce-list .pb-ecommerce-img-container{width:100%;position:relative}.render-ecommerce-list .pb-ecommerce .pb-ecommerce-badge{position:absolute;top:20px;left:20px;padding:8px 20px;border-radius:4px;background:#3595f6;color:#fff;font-size:15px;font-style:normal;font-weight:500;line-height:normal}.render-ecommerce-list .pb-ecommerce-img-container a{display:block;height:277px}.render-ecommerce-list .pb-ecommerce-img-container img{width:100%;height:100%;object-fit:cover}.render-ecommerce-list .pb-ecommerce-body{padding:20px;display:flex;flex-direction:column;gap:15px}.render-ecommerce-list .pb-ecommerce-body h4{color:#231f20;font-size:24px;font-style:normal;font-weight:600;line-height:normal;text-transform:uppercase;margin:0;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;}.render-ecommerce-list .pb-ecommerce-body h4 a{color:#231f20;text-decoration:none}.render-ecommerce-list .pb-ecommerce-icon-content{width:100%;display:flex;gap:10px;align-items:center}.render-ecommerce-list .pb-ecommerce-icon{display:inline-flex;width:32px;height:32px;padding:6px;justify-content:center;align-items:center;border-radius:4px;background:#eff8ff}.render-ecommerce-list .pb-ecommerce-info{color:#231f20}.render-ecommerce-list .pb-ecommerce-desc{overflow: hidden;color:#231f20;margin:0;height:65px;word-break: break-word;}.pb-ecommerce-action{display:flex;padding:0;justify-content:center;align-items:flex-start;gap:10px;background:#eff8ff}.pb-ecommerce-action a{color:#3595f6;text-decoration:none;display:block;padding:20px;width:100%;text-align:center}.pb-ecommerce-action a:hover{color:#fff;background:#333}.pb-ecommerce-action a:hover svg path{fill:#fff}@media only screen and (max-width:991px){.render-ecommerce-list .pb-ecommerce{width:calc(50% - 10px)}.render-ecommerce-list .pb-ecommerce-body h4{font-size:18px}.render-ecommerce-list .pb-ecommerce-img-container a{height:200px}}@media only screen and (max-width:479px){.render-ecommerce-list .pb-ecommerce{width:100%}.render-ecommerce-list .pb-ecommerce-desc{height:auto}.pb-ecommerce-action a{padding:15px}}</style>`,
    init: async function (node) {
        const ecommerce_lists = jQuery(".render_ecommerce", node);
      const init_status = ecommerce_lists.attr('init-data')
      let default_category = ecommerce_lists.attr('data-category-slug');
      let default_filter = ecommerce_lists.attr('data-filter');
      let default_limit = ecommerce_lists.attr('data-limit');

      //category dropdown
      const category_result = await getCategory();
      if(category_result.category_all.length > 0){
          let category_option = ``;
          category_result.category_all.map((ls,i)=>{
              let selected = "";
              if(default_category == 0){ default_category = ls.slug; selected = "selected"};
              category_option += `<option value="${ls.slug}" ${selected}>${ls.name}</option>`;
              selected = "";
          });
          $('[name="drp_category_lists"]').html(category_option)
      }

      let category_slug = $(".component-properties select[name=drp_category_lists]");
      let ecommerce_filter = $(".component-properties select[name=drp_ecommerce_filter]");
      let ecommerce_limit = $(".component-properties select[name=drp_ecommerce_limit]");

      if(typeof init_status != "undefined"){
          const initCall = async () => {
              const ecommerce_result = await getEcommerce(default_category, default_filter, default_limit);
              const params_node = {
                  element : ecommerce_lists,
                  ecommerce: ecommerce_result,
                  category_slug :default_category,
                  filter : default_filter,
                  limit: default_limit
              };
              renderEcommerceHtml(params_node);
              category_slug.val(default_category)
              ecommerce_filter.val(default_filter)
              ecommerce_limit.val(default_limit)
          }
          initCall();
          ecommerce_lists.attr('init-data',true)
      }else{

          if(category_slug.val() != null){
              default_category = category_slug.val();
          }
          if(ecommerce_filter.val() == null){
              default_filter = "desc";
              ecommerce_filter.val(default_filter)
          }
          if(ecommerce_limit.val() == null){
              default_limit = "6";
              ecommerce_limit.val(default_limit);
          }

          const initCall = async () => {
              const ecommerce_result = await getEcommerce(default_category, default_filter, default_limit);
              const params_node = {
                  element : ecommerce_lists,
                  ecommerce: ecommerce_result,
                  category_slug :default_category,
                  filter : default_filter,
                  limit: default_limit
              };
              renderEcommerceHtml(params_node);
              category_slug.val(default_category)
              ecommerce_filter.val(default_filter)
              ecommerce_limit.val(default_limit)
          }
          initCall();
          ecommerce_lists.attr('init-data',true)
      }
    },
    onChange:  function (node, property, value) {},
    properties: [
      {
          name: "Filter eCommerce",
          key: "drp_ecommerce_filter",
          inputtype: SelectInput,
          data: {
              options: [
                  {
                      text: "Newest",
                      value: "desc",
                  },
                  {
                      text: "Oldest",
                      value: "asc",
                  }
              ],
          },
          onChange: function (node, value, input, component) {
              const category_slug = $(".component-properties select[name=drp_category_lists]").val();
              const ecommerce_limit = $(".component-properties select[name=drp_ecommerce_limit]").val();
              const ecommerce_lists = jQuery(".render_ecommerce", node);
              const initCall = async () => {
                  const ecommerce_result = await getEcommerce(category_slug, value, ecommerce_limit);
                  const params_node = {
                      element : ecommerce_lists,
                      ecommerce: ecommerce_result,
                      category_slug :category_slug,
                      filter : value,
                      limit: ecommerce_limit
                  };
                  renderEcommerceHtml(params_node);
              }
              initCall();
              return node; 
          },
      },
      {
          name: "Category",
          key: "drp_category_lists",
          inputtype: SelectInput,
          data: { options: [] },
          onChange: async function (node, value, input, component) {
              const ecommerce_filter = $(".component-properties select[name=drp_ecommerce_filter]").val();
              const ecommerce_limit = $(".component-properties select[name=drp_ecommerce_limit]").val();
              const ecommerce_lists = jQuery(".render_ecommerce", node);
              const initCall = async () => {
                  const ecommerce_result = await getEcommerce(value, ecommerce_filter, ecommerce_limit);
                  const params_node = {
                      element : ecommerce_lists,
                      ecommerce: ecommerce_result,
                      category_slug :value,
                      filter : ecommerce_filter,
                      limit: ecommerce_limit
                  };
                  renderEcommerceHtml(params_node);
              }
              initCall();
              return node;   
          },
      },
      {
          name: "Show eCommerce",
          key: "drp_ecommerce_limit",
          inputtype: SelectInput,
          data: {
              options: [
                  {
                      text: "6",
                      value: "6",
                  },
                  {
                      text: "12",
                      value: "12",
                  },
                  {
                      text: "18",
                      value: "18",
                  },
                  {
                      text: "24",
                      value: "24",
                  }
              ],
          },
          onChange: function (node, value, input, component) {
              const category_slug = $(".component-properties select[name=drp_category_lists]").val();
              const ecommerce_filter = $(".component-properties select[name=drp_ecommerce_filter]").val();
              const ecommerce_lists = jQuery(".render_ecommerce", node);
              const initCall = async () => {
                  const ecommerce_result = await getEcommerce(category_slug, ecommerce_filter, value);
                  const params_node = {
                      element : ecommerce_lists,
                      ecommerce: ecommerce_result,
                      category_slug :category_slug,
                      filter : ecommerce_filter,
                      limit: value
                  };
                  renderEcommerceHtml(params_node);
              }
              initCall();
              return node;   
          },
      }
    ],
});


web.Components.extend("_base", "widgets/googlemaps", {
    name: "Google Maps",
    attributes: ["data-component-maps"],
    image: "icons/map.svg",
    dragHtml: '<img src="' + web.baseUrl + 'icons/maps.png">',
    html: '<div data-component-maps><iframe frameborder="0" src="https://maps.google.com/maps?q=Bucharest&z=15&t=q&key=&output=embed" width="100%" height="100%" style="width:100%;height:100%;left:0px"></iframe></div>',
    resizable:true,//show select box resize handlers
    resizeMode:"css",
    
    
    //url parameters
    z:3, //zoom
    q:'Paris',//location
    t: 'q', //map type q = roadmap, w = satellite
    key: '',
    
	init: function (node)
	{
		let iframe = jQuery('iframe', node);
		let url = new URL(iframe.attr("src"));
		let params = new URLSearchParams(url.search);
		
		this.z = params.get("z");
		this.q = params.get("q");
		this.t = params.get("t");
		this.key = params.get("key");

		$(".component-properties input[name=z]").val(this.z);
		$(".component-properties input[name=q]").val(this.q);
		$(".component-properties select[name=t]").val(this.t);
		$(".component-properties input[name=key]").val(this.key);
	},
	    
    onChange: function (node, property, value) {
		map_iframe = jQuery('iframe', node);
		
		this[property.key] = value;
		
		mapurl = 'https://maps.google.com/maps?q=' + this.q + '&z=' + this.z + '&t=' + this.t + '&output=embed';
		
		map_iframe.attr("src",mapurl);
		
		return node;
	},

    properties: [{
        name: "Address",
        key: "q",
        inputtype: TextInput
    }, {
        name: "Map type",
        key: "t",
        inputtype: SelectInput,
        data:{
			options: [{
                value: "q",
                text: "Roadmap"
            }, {
                value: "w",
                text: "Satellite"
            }]
       },
    }, {
        name: "Zoom",
        key: "z",
        inputtype: RangeInput,
        data:{
			max: 20, //max zoom level
			min:1,
			step:1
		}
    }, {
        name: "Key",
        key: "key",
        inputtype: TextInput
	}]
});

web.Components.extend("_base", "widgets/openstreetmap", {
    name: "Open Street Map",
    attributes: ["data-component-openstreetmap"],
    image: "icons/map.svg",
    dragHtml: '<img src="' + web.baseUrl + 'icons/maps.png">',
    html: `<div data-component-openstreetmap><iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-62.04673002474011%2C16.95487694424327%2C-61.60521696321666%2C17.196751341562923&layer=mapnik"></iframe></div>`,
    resizable:true,//show select box resize handlers
    resizeMode:"css",
    
    
    //url parameters
    bbox:'',//location
    layer: 'mapnik', //map type
    
	init: function (node)
	{
		let iframe = jQuery('iframe', node);
		let url = new URL(iframe.attr("src"));
		let params = new URLSearchParams(url.search);
		
		this.bbox = params.get("bbox");
		this.layer = params.get("layer");

		$(".component-properties input[name=bbox]").val(this.bbox);
		$(".component-properties input[name=layer]").val(this.layer);
	},
	    
    onChange: function (node, property, value) {
		map_iframe = jQuery('iframe', node);
		
		this[property.key] = value;
		
		mapurl = 'https://www.openstreetmap.org/export/embed.html?bbox=' + this.bbox + '&layer=' + this.layer;
		
		map_iframe.attr("src",mapurl);
		
		return node;
	},

    properties: [{
        name: "Map",
        key: "bbox",
        inputtype: TextInput
/*    }, {
        name: "Layer",
        key: "layer",
        inputtype: SelectInput,
        data:{
			options: [{
                value: "",
                text: "Default"
            }, {
                value: "Y",
                text: "CyclOSM"
            }, {
                value: "C",
                text: "Cycle Map"
            }, {
                value: "T",
                text: "Transport Map"
            }]
       }*/
	}]
});

web.Components.extend("_base", "widgets/embed-video", {
    name: "Embed Video",
    attributes: ["data-component-video"],
    image: "icons/youtube.svg",
    dragHtml: '<img src="' + web.baseUrl + 'icons/youtube.svg" width="100" height="100">', //use image for drag and swap with iframe on drop for drag performance
    html: '<div data-component-video style="width:640px;height:480px;"><iframe frameborder="0" src="https://player.vimeo.com/video/24253126?autoplay=false&controls=false&loop=false&playsinline=true&muted=false" width="100%" height="100%"></iframe></div>',
    
    
    //url parameters set with onChange
    t:'y',//video type
    video_id:'',//video id
    url: '', //html5 video src
    autoplay: false,
    controls: false,
    loop: false,
    playsinline: true,
    muted: false,
    resizable:true,//show select box resize handlers
    resizeMode:"css",//div unlike img/iframe etc does not have width,height attributes need to use css
	youtubeRegex:/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]+)/i,
	vimeoRegex : /(?:vimeo\.com(?:[^\d]+))(\d+)/i,

	init: function (node)
	{
		iframe = jQuery('iframe', node);
		video = jQuery('video', node);
		
		$(".component-properties [data-key=url]").hide();
		$(".component-properties [data-key=poster]").hide();
		
		//check if html5
		if (video.length) 
		{
			this.url = video.src;
		} else if (iframe.length) //vimeo or youtube
		{
			let src = iframe.attr("src");
			let match;

			if (src && src.indexOf("youtube") && (match = src.match(this.youtubeRegex))) {//youtube
				this.video_id = match[1];
				this.t = "y";
			} else if (src && src.indexOf("vimeo") && (match = src.match(this.vimeoRegex))) { //vimeo
				this.video_id = match[1];
				this.t = "v";
			} else {
				this.t = "h";
			}
		}
		
		$(".component-properties input[name=video_id]").val(this.video_id);
		$(".component-properties input[name=url]").val(this.url);
		$(".component-properties select[name=t]").val(this.t);
	},
	
	onChange: function (node, property, value)
	{
		this[property.key] = value;
		//if (property.key == "t")
		{
			switch (this.t)
			{
				case 'y':
					$(".component-properties [data-key=video_id]").show();
					$(".component-properties [data-key=url]").hide();
					$(".component-properties [data-key=poster]").hide();
					newnode = $(`<iframe width="100%" height="100%" allowfullscreen="true" frameborder="0" allow="autoplay" 
										src="https://www.youtube.com/embed/${this.video_id}?autoplay=${this.autoplay}&controls=${this.controls}&loop=${this.loop}&playsinline=${this.playsinline}&muted=${this.muted}">
								</iframe>`);
				break;
				case 'v':
					$(".component-properties [data-key=video_id]").show();
					$(".component-properties [data-key=url]").hide();
					$(".component-properties [data-key=poster]").hide();
					newnode = $(`<iframe width="100%" height="100%" allowfullscreen="true" frameborder="0" allow="autoplay" 
										src="https://player.vimeo.com/video/${this.video_id}?autoplay=${this.autoplay}&controls=${this.controls}&loop=${this.loop}&playsinline=${this.playsinline}&muted=${this.muted}">
								</iframe>`);
				break;
				case 'h':
					$(".component-properties [data-key=video_id]").hide();
					$(".component-properties [data-key=url]").show();
					$(".component-properties [data-key=poster]").show();
					newnode = $('<video poster="' + this.poster + '" src="' + this.url + '" ' + (this.autoplay?' autoplay ':'') + (this.controls?' controls ':'') + (this.loop?' loop ':'') + (this.playsinline?' playsinline ':'') + (this.muted?' muted ':'') + ' style="height: 100%; width: 100%;"></video>');
				break;
			}
			
			$("> iframe, > video", node).replaceWith(newnode);
			return node;
		}
		
		return node;
	},	
	
    properties: [{
        name: "Provider",
        key: "t",
        inputtype: SelectInput,
        data:{
			options: [{
                text: "Youtube",
                value: "y"
            }, {
                text: "Vimeo",
                value: "v"
            },{
                text: "HTML5",
                value: "h"
            }]
       },
	 },{
        name: "Video",
        key: "video_id",
        inputtype: TextInput,
   		onChange: function(node, value, input, component) {
			
			let youtube = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]+)/i;
			let vimeo = /(?:vimeo\.com(?:[^\d]+))(\d+)/i;
			let id = false;
			let t = false;

			if (((id = value.match(youtube)) && (t = "y")) || ((id = value.match(vimeo)) && (t = "v"))) {
				$(".component-properties select[name=t]").val(t);
				$(".component-properties select[name=video_id]").val(id[1]);

				component.t = t;
				component.video_id = id[1];

				return id[1];
			}
			
			return node;
		}
    },{
        name: "Poster",
        key: "poster",
        htmlAttr: "poster",
        inputtype: ImageInput
    }, {
        name: "Url",
        key: "url",
        inputtype: TextInput
    },{
		name: "Width",
        key: "width",
        htmlAttr: "style",
        inline:false,
        col:6,
        inputtype: CssUnitInput
    }, {
        name: "Height",
        key: "height",
        htmlAttr: "style",
        inline:false,
        col:6,
        inputtype: CssUnitInput
    },{
		key: "video_options",
        inputtype: SectionInput,
        name:false,
        data: {header:"Options"},
    },{
        name: "Auto play",
        key: "autoplay",
        htmlAttr: "autoplay",
        inline:true,
        col:3,
        inputtype: CheckboxInput
    },{
        name: "Plays inline",
        key: "playsinline",
        htmlAttr: "playsinline",
        inline:true,
        col:3,
        inputtype: CheckboxInput
    },{
        name: "Controls",
        key: "controls",
        htmlAttr: "controls",
        inline:true,
        col:3,
        inputtype: CheckboxInput
    },{
        name: "Loop",
        key: "loop",
        htmlAttr: "loop",
        inline:true,
        col:4,
        inputtype: CheckboxInput
    },{
        name: "Muted",
        key: "muted",
        htmlAttr: "muted",
        inline:true,
        col:4,
        inputtype: CheckboxInput
	},{
		name:"",
		key: "autoplay_warning",
        inline:false,
        col:12,
        inputtype: NoticeInput,
        data: {
			type:'warning',
			title:'Autoplay',
			text:'Most browsers allow auto play only if video is muted and plays inline'
		}
	}]
});

web.Components.extend("_base", "widgets/facebookcomments", {
    name: "Facebook Comments",
    attributes: ["data-component-facebookcomments"],
    image: "icons/facebook.svg",
    dragHtml: '<img src="' + web.baseUrl + 'icons/facebook.svg">',
    html: '<div  data-component-facebookcomments><script>(function(d, s, id) {\
			  var js, fjs = d.getElementsByTagName(s)[0];\
			  if (d.getElementById(id)) return;\
			  js = d.createElement(s); js.id = id;\
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=";\
			  fjs.parentNode.insertBefore(js, fjs);\
			}(document, \'script\', \'facebook-jssdk\'));</script>\
			<div class="fb-comments" \
			data-href="' + window.location.href + '" \
			data-numposts="5" \
			data-colorscheme="light" \
			data-mobile="" \
			data-order-by="social" \
			data-width="100%" \
			></div></div>',
    properties: [{
        name: "Href",
        key: "business",
        htmlAttr: "data-href",
        child:".fb-comments",
        inputtype: TextInput
    },{		
        name: "Item name",
        key: "item_name",
        htmlAttr: "data-numposts",
        child:".fb-comments",
        inputtype: TextInput
    },{		
        name: "Color scheme",
        key: "colorscheme",
        htmlAttr: "data-colorscheme",
        child:".fb-comments",
        inputtype: TextInput
    },{		
        name: "Order by",
        key: "order-by",
        htmlAttr: "data-order-by",
        child:".fb-comments",
        inputtype: TextInput
    },{		
        name: "Currency code",
        key: "width",
        htmlAttr: "data-width",
        child:".fb-comments",
        inputtype: TextInput
	}]
});
/*
web.Components.extend("_base", "widgets/instagram", {
    name: "Instagram",
    attributes: ["data-component-instagram"],
    image: "icons/instagram.svg",
    drophtml: '<img src="' + web.baseUrl + 'icons/instagram.png">',
    html: '<div align=center data-component-instagram>\
			<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/tsxp1hhQTG/" data-instgrm-version="8" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/tsxp1hhQTG/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">Text</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A post shared by <a href="https://www.instagram.com/instagram/" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px;" target="_blank"> Instagram</a> (@instagram) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="-">-</time></p></div></blockquote>\
			<script async defer src="//www.instagram.com/embed.js"></script>\
		</div>',
    properties: [{
        name: "Widget id",
        key: "instgrm-permalink",
        htmlAttr: "data-instgrm-permalink",
        child: ".instagram-media",
        inputtype: TextInput
    }],
});
*/
web.Components.extend("_base", "widgets/twitter", {
    name: "Twitter",
    attributes: ["data-component-twitter"],
    image: "icons/twitter.svg",
    dragHtml: '<img src="' + web.baseUrl + 'icons/twitter.svg">',
    html: '<div data-component-twitter><iframe width="100%" height="100%"src="https://platform.twitter.com/embed/Tweet.html?embedId=twitter-widget-0&frame=false&hideCard=false&hideThread=false&id=943901463998169088"></iframe></div>',
    resizable:true,//show select box resize handlers
    resizeMode:"css",
    twitterRegex : /(?:twitter\.com(?:[^\d]+))(\d+)/i,

    tweet:'',//location
	init: function (node)
	{
		let iframe = jQuery('iframe', node);
		let src = iframe.attr("src");
		let url = new URL(src);
		let params = new URLSearchParams(url.search);
		
		this.tweet = params.get("id");
		
		if (!this.tweet) {
			if (match = src.match(this.twitterRegex)) {
				this.tweet = match[1];
			}
			
		}

		$(".component-properties input[name=tweet]").val(this.tweet);
	},
	    
    onChange: function (node, property, value) {
		tweet_iframe = jQuery('iframe', node);

		if (property.key == "tweet") {
			this[property.key] = value;
			
			tweeturl = 'https://platform.twitter.com/embed/Tweet.html?embedId=twitter-widget-0&frame=false&hideCard=false&hideThread=false&id=' + this.tweet;
			
			tweet_iframe.attr("src",tweeturl);
		}
		
		return node;
	},

    properties: [{
        name: "Tweet",
        key: "tweet",
        inputtype: TextInput,
   		onChange: function(node, value, input, component) {
			
			let twitterRegex = /(?:twitter\.com(?:[^\d]+))(\d+)/i;
			let id = false;

			if (id = value.match(twitterRegex)) {
				$(".component-properties input[name=tweet]").val(id[1]);

				component.tweet = id[1];
				return id[1];
			}
			
			return node;
		}
	}]
});

web.Components.extend("_base", "widgets/paypal", {
    name: "Paypal",
    attributes: ["data-component-paypal"],
    image: "icons/paypal.svg",
    html: '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" data-component-paypal>\
\
				<!-- Identify your business so that you can collect the payments. -->\
				<input type="hidden" name="business"\
					value="givanz@yahoo.com">\
\
				<!-- Specify a Donate button. -->\
				<input type="hidden" name="cmd" value="_donations">\
\
				<!-- Specify details about the contribution -->\
				<input type="hidden" name="item_name" value="Vpgjs">\
				<input type="hidden" name="item_number" value="Support">\
				<input type="hidden" name="currency_code" value="USD">\
\
				<!-- Display the payment button. -->\
				<input type="image" name="submit"\
				src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"\
				alt="Donate">\
				<img alt="" width="1" height="1"\
				src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >\
\
			</form>',
    properties: [{
        name: "Email",
        key: "business",
        htmlAttr: "value",
        child:"input[name='business']",
        inputtype: TextInput
    },{		
        name: "Item name",
        key: "item_name",
        htmlAttr: "value",
        child:"input[name='item_name']",
        inputtype: TextInput
    },{		
        name: "Item number",
        key: "item_number",
        htmlAttr: "value",
        child:"input[name='item_number']",
        inputtype: TextInput
    },{		
        name: "Currency code",
        key: "currency_code",
        htmlAttr: "value",
        child:"input[name='currency_code']",
        inputtype: TextInput
	}],
});
    
web.Components.extend("_base", "widgets/facebookpage", {
    name: "Facebook Page Plugin",
    attributes: ["data-component-facebookpage"],
    image: "icons/facebook.svg",
    dropHtml: '<img src="' + web.baseUrl + 'icons/facebook.png">',
	html: `<div data-component-facebookpage><div class="fb-page" 
			 data-href="https://www.facebook.com/facebook" 
			 data-tabs="timeline"
			 data-width="" 
			 data-height="" 
			 data-small-header="true" 
			 data-adapt-container-width="true" 
			 data-hide-cover="false" 
			 data-show-facepile="true">
			 
				<blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore">
					<a href="https://www.facebook.com/facebook">Facebook</a>
				</blockquote>

			</div>

			<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ro_RO/sdk.js#xfbml=1&version=v15.0" nonce="o7Y7zPjy"></script>
		</div>`,

    properties: [{
        name: "Small header",
        key: "small-header",
        htmlAttr: "data-small-header",
        child:".fb-page",
        inputtype: TextInput
    },{		
        name: "Adapt container width",
        key: "adapt-container-width",
        htmlAttr: "data-adapt-container-width",
        child:".fb-page",
        inputtype: TextInput
    },{		
        name: "Hide cover",
        key: "hide-cover",
        htmlAttr: "data-hide-cover",
        child:".fb-page",
        inputtype: TextInput
    },{		
        name: "Show facepile",
        key: "show-facepile",
        htmlAttr: "data-show-facepile",
        child:".fb-page",
        inputtype: TextInput
    },{		
        name: "App Id",
        key: "appid",
        htmlAttr: "data-appId",
        child:".fb-page",
        inputtype: TextInput
	}],
   onChange: function(node, input, value, component) {
	   
	   var newElement = $(this.html);
	   newElement.find(".fb-page").attr(input.htmlAttr, value);

	   $("[data-fbcssmodules]", web.Builder.frameHead).remove();
	   $("[data-fbcssmodules]", web.Builder.frameBody).remove();
	   $("script[src^='https://connect.facebook.net']", web.Builder.frameHead).remove();


	   node.parent().html(newElement.html());
	   return newElement;
	}	
});
    
web.Components.extend("_base", "widgets/chartjs", {
    name: "Chart.js",
    attributes: ["data-component-chartjs"],
    image: "icons/chart.svg",
	dragHtml: '<img src="' + web.baseUrl + 'icons/chart.svg">',
    html: '<div data-component-chartjs class="chartjs" data-chart=\'{\
			"type": "line",\
			"data": {\
				"labels": ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],\
				"datasets": [{\
					"data": [12, 19, 3, 5, 2, 3],\
					"fill": false,\
					"borderColor":"rgba(255, 99, 132, 0.2)"\
				}, {\
					"fill": false,\
					"data": [3, 15, 7, 4, 19, 12],\
					"borderColor": "rgba(54, 162, 235, 0.2)"\
				}]\
			}}\' style="min-height:240px;min-width:240px;width:100%;height:100%;position:relative">\
			  <canvas></canvas>\
			</div>',
	chartjs: null,
	ctx: null,
	node: null,

	config: {/*
			type: 'line',
			data: {
				labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
				datasets: [{
					data: [12, 19, 3, 5, 2, 3],
					fill: false,
					borderColor:'rgba(255, 99, 132, 0.2)',
				}, {
					fill: false,
					data: [3, 15, 7, 4, 19, 12],
					borderColor: 'rgba(54, 162, 235, 0.2)',
				}]
			},*/
	},		

	dragStart: function (node)
	{
		//check if chartjs is included and if not add it when drag starts to allow the script to load
		body = web.Builder.frameBody;
		
		if ($("#chartjs-script", body).length == 0)
		{
			$(body).append('<script id="chartjs-script" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>');
			$(body).append('<script>\
				$(document).ready(function() {\
					$(".chartjs").each(function () {\
						ctx = $("canvas", this).get(0).getContext("2d");\
						config = JSON.parse(this.dataset.chart);\
						chartjs = new Chart(ctx, config);\
					});\
				\});\
			  </script>');
		}
		
		return node;
	},
	

	drawChart: function ()
	{
		if (this.chartjs != null) this.chartjs.destroy();
		this.node.dataset.chart = JSON.stringify(this.config);
		
		config = Object.assign({}, this.config);//avoid passing by reference to avoid chartjs to fill the object
		this.chartjs = new Chart(this.ctx, config);
	},
	
	init: function (node)
	{
		this.node = node;
		this.ctx = $("canvas", node).get(0).getContext("2d");
		this.config = JSON.parse(node.dataset.chart);
		this.drawChart();

		return node;
	},
  
  
	beforeInit: function (node)
	{
		return node;
	},
    
    properties: [
	{
        name: "Type",
        key: "type",
        inputtype: SelectInput,
        data:{
			options: [{
                text: "Line",
                value: "line"
            }, {
                text: "Bar",
                value: "bar"
            }, {
                text: "Pie",
                value: "pie"
            }, {
                text: "Doughnut",
                value: "doughnut"
            }, {
                text: "Polar Area",
                value: "polarArea"
            }, {
                text: "Bubble",
                value: "bubble"
            }, {
                text: "Scatter",
                value: "scatter"
            },{
                text: "Radar",
                value: "radar"
            }]
       },
		init: function(node) {
			return JSON.parse(node.dataset.chart).type;
		},
       onChange: function(node, value, input, component) {
		   component.config.type = value;
		   component.drawChart();
		   
		   return node;
		}
	 }]
});
