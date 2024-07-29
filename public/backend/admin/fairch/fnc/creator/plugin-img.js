var ImageInput = $.extend({}, ImageInput, {

    events: [
        ["change", "onChange", "input[type=text]"],
        ["click", "onClick", "button"],
        ["click", "onClick", "img"],
	 ],

	setValue: function(value) {
		if (value && value.indexOf("data:image") == -1 && value != "none") {
			$('input[type="text"]', this.element).val(value);
			$('img', this.element).attr("src",(value.indexOf("//") > -1 || value.indexOf("media/") > -1? '' : web.themeBaseUrl) + value);
		} else {
			$('img', this.element).attr("src", web.baseUrl + 'icons/image.svg');
		}
	},

    onChange: function(e, node) {
		//set initial relative path
		let src = this.value;
		
		delay(() => { 
			//get full image path
			let img = $("img", e.data.element).get(0);
			
			if (img.src) {
				src = img.src;
			}
			
			if (src) {
			    e.data.element.trigger('propertyChange', [src, this]);
			}
		}, 500);
		
		//e.data.element.trigger('propertyChange', [src, this]);
		
		//reselect image after loading to adjust highlight box size
		web.Builder.selectedEl.get(0).onload = function () {
				if (web.Builder.selectedEl) {
					web.Builder.selectedEl.click();
				}
		};
	},
		
    
    onClick: function(e, element) {
		if (!web.MediaModal) {
			web.MediaModal = new MediaModal(true);
			web.MediaModal.mediaPath = window.mediaPath;
		}
		
		web.MediaModal.open(this);        
    },
    
	init: function(data) {
		return this.render("imageinput-gallery", data);
	},
  }
);
