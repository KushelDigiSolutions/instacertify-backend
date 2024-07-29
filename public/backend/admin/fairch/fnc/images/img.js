function ucFirst(str) {
  if (!str) return str;

  return str[0].toUpperCase() + str.slice(1);
}
function addNewFolder(){
	$("#MediaModal").hide();
				
					  setTimeout(()=>{ $("#MediaModal").show();
									 }, 1000);
				//console.log(web.MediaModal.mediaPath + web.MediaModal.currentPath);
				Swal.fire({
				  title: 'Add Folder Name',
				  input: 'text',
				  inputAttributes: {
					autocapitalize: 'off'
				  },
				  showCancelButton: true,
				  confirmButtonText: 'Create New Folder',
				  showLoaderOnConfirm: true,
				  preConfirm: (foldername) => {
					  
					   $.post(createFolder,
							  {
						   folderName: foldername,
						   mediaPath: web.MediaModal.mediaPath + web.MediaModal.currentPath
					   },
						function(data, status){
						   return data.status;
					   });
				  },
				  allowOutsideClick: () => !Swal.isLoading()
				}).then((result) => {
					web.MediaModal.initGallery();
				  if (result) {
					  Swal.fire({
				  title: 'Folder Created!',
				  html: '\n <b></b>',
				  timer: 1000,
				  timerProgressBar: true,
				  didOpen: () => {
					Swal.showLoading()
					const b = Swal.getHtmlContainer().querySelector('b')
					timerInterval = setInterval(() => {
					  b.textContent = Swal.getTimerLeft()
					}, 100)
				  },
				  willClose: () => {
					clearInterval(timerInterval)
				  }});
									 
				  }else{
				  	Swal.fire({
				  title: 'Folder Already Exist!',
				  html:  '\n <b></b>',
				  timer: 1000,
				  timerProgressBar: true,
				  didOpen: () => {
					Swal.showLoading()
					const b = Swal.getHtmlContainer().querySelector('b')
					timerInterval = setInterval(() => {
					  b.textContent = Swal.getTimerLeft()
					}, 100)
				  },
				  willClose: () => {
					clearInterval(timerInterval)
				  }});
									 
				  }
				})
}
let mediaScanUrl = document.location.origin+'/backend/admin/fairch/fnc/scan.php';

class MediaModal {
	constructor (modal = true)
	{
		this.isInit = false;
		this.isModal = modal;

		this.modalHtml =
		`
		<div class="modal fade modal-full" id="MediaModal" tabindex="-1" role="dialog" aria-labelledby="MediaModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="MediaModalLabel">Media</h5>

				<button type="button" class="btn btn-sm" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true"><i class="la la-times la-lg"></i></span>
				</button>
			  </div>
			  <div class="modal-body">

                      <div class="filemanager">

						<div class="top-right d-flex justify-content-between">

                            <div class="align-left">
								<div class="breadcrumbs"></div>
							</div>


                            <div class="align-right">
								<div class="search">
									<input type="search" id="media-search-input" placeholder="Find a file.." />
								</div>

								<button class="btn btn-outline-secondary btn-sm btn-icon me-5 float-end"
								   data-bs-toggle="collapse"
								   data-bs-target=".upload-collapse"
								   aria-expanded="false"
								   >
								   <i class="la la-cloud-upload-alt la-lg"></i>
									Upload new file
								</button>
							</div>

						</div>

						<div class="top-panel">

							<div class="upload-collapse collapse">

								<button id="upload-close" type="button" class="btn btn-sm btn-light" aria-label="Close" data-bs-toggle="collapse" data-bs-target=".upload-collapse" aria-expanded="true">
								   <span aria-hidden="true"><i class="la la-times la-lg"></i></span>
								</button>

							   <h3>Drop or choose files to upload</h3>

							   <input type="file" multiple class="">

								<div class="status"></div>
							</div>


						</div>

						<div class="display-panel">

							<ul class="data" id="media-files"></ul>

							<div class="nothingfound">
								<div class="nofiles"></div>
								<span>No files here.</span>
							</div>
						</div>
					</div>

			  </div>
			  <div class="modal-footer justify-content-between">

				<div class="align-left">

				</div>

				<div class="align-right">
					<button type="button" class="btn btn-info" onclick="addNewFolder()" id="addNewFolder">Add New Folder</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-secondary rem-btn">Remove Background</button>
					<button type="button" class="btn btn-primary save-btn">Add selected</button>
					
				</div>
			  </div>
			</div>
		  </div>
		</div>`;

		this.response = [],
		this.currentPath = '';
		this.breadcrumbsUrls = [];
		this.filemanager = null;
		this.breadcrumbs = null;
		this.fileList = null;
		this.mediaPath = "../backend/admin/media";
		this.type = "single";
	}

	addModalHtml() {
		if (this.isModal) $("body").append(this.modalHtml);
		$("#MediaModal .save-btn").on("click", () => this.save());
		$("#MediaModal .rem-btn").on("click", () => this.remove());
		
	}
	
	showUploadLoading() {
		$("#MediaModal .upload-collapse .status").html(`
		<div class="spinner-border" style="width: 5rem; height: 5rem;margin: 5rem auto; display:block" role="status">
		  <span class="visually-hidden">Loading...</span>
		</div>`);
	}

	hideUploadLoading() {
		$("#MediaModal .upload-collapse .status").html('');
	}

	
	
	save() {

		let file = $("#MediaModal .files input:checked").eq(0).val();
		if (this.targetInput) {
			$(this.targetInput).val(file).trigger("change");
		}

		if (file.indexOf("//") == -1) {
			file = this.mediaPath + file;
			file = file.replace("../backend/admin/media../backend/","/backend/");
		}

		if (this.targetThumb) {
			file = file.replace("/master/media../", "/");
			file = file.replace("../backend/admin/media../backend/","/backend/");
			$(this.targetThumb).attr("src", file);
		}

		if (this.callback) {
			this.callback(file);
		}

		if (this.isModal) $("#MediaModal").modal('hide');
	}

		
	remove() {

		let file = "none";  // Set file to "none"
		if (this.targetInput) {
			$(this.targetInput).val(file).trigger("change");
		}

		if (file.indexOf("//") == -1) {
			file = this.mediaPath + file;
			file = file.replace("../backend/admin/media../backend/","/backend/");
		}

		if (this.targetThumb) {
			file = file.replace("/master/media../", "/");
			file = file.replace("../backend/admin/media../backend/","/backend/");
			$(this.targetThumb).attr("src", file);
		}

		if (this.callback) {
			this.callback(file);
		}

		if (this.isModal) $("#MediaModal").modal('hide');
	}


	init() {
		if (!this.isInit) {
			if (this.isModal) this.addModalHtml();
			let self = this;

			this.initGallery();
			this.isInit = true;

			$(".filemanager input[type=file]").on("change", this.onUpload);
			$(".filemanager").on("click", ".btn-delete", this.deleteFile);
			$(".filemanager .folders").on("click", ".btn-delete", this.deleteFolder);
			$(".filemanager").on("click", ".btn-rename", this.renameFile);

			$(window).trigger( "mediaModal:init", { type:this.type, targetInput:this.targetInput, targetThumb:this.targetThumb, callback:this.callback} );
		}
	}

	open(element, callback) {
		if (element instanceof Element) {
			this.targetInput = element.dataset.targetInput;
			this.targetThumb = element.dataset.targetThumb;
			if (element.dataset.type) {
				this.type = element.dataset.type;
			}
		} else if (element) {
			this.targetInput = element.targetInput;
			this.targetThumb = element.targetThumb;
			if (element.type) {
				this.type = element.type;
			}
		}

		this.callback = callback;
		this.init();

		if (this.isModal) $('#MediaModal').modal('show');
	}


	initGallery() {
		this.filemanager = $('.filemanager'),
		this.breadcrumbs = $('.breadcrumbs'),
		this.fileList = this.filemanager.find('.data');
		let _this = this;

		// Start by fetching the file data from scan.php with an AJAX request
		$.get(mediaScanUrl, function(data) {
		//$.get('/this.filemanager/scan.php', function(data) {


			 _this.response = [data],
			 _this.currentPath = '',
			 _this.breadcrumbsUrls = [];

			var folders = [],
				files = [];

			$(window).trigger('hashchange');
		});

		// This event listener monitors changes on the URL. We use it to
		// capture back/forward navigation in the browser.

		$(window).on('hashchange', function(){

			_this.goto(window.location.hash);

			// We are triggering the event. This will execute
			// this function on page load, so that we show the correct folder:

		});


		// Hiding and showing the search box

		this.filemanager.find('.search').click(function(){

			var search = $(this);

			search.find('span').hide();
			search.find('input[type=search]').show().focus();

		});


		// Listening for keyboard input on the search field.
		// We are using the "input" event which detects cut and paste
		// in addition to keyboard input.
		this.filemanager.find('input[type=search]').on('input', function(e){

			var folders = [];
			var files = [];

			var value = this.value.trim();

			if(value.length) {

				_this.filemanager.addClass('searching');

				// Update the hash on every key stroke
				window.location.hash = 'search=' + value.trim();

			}

			else {

				_this.filemanager.removeClass('searching');
				window.location.hash = encodeURIComponent(_this.currentPath);

			}

		}).on('keyup', function(e){

			// Clicking 'ESC' button triggers focusout and cancels the search

			var search = $(this);

			if(e.keyCode == 27) {

				search.trigger('focusout');

			}

		}).focusout(function(e){

			// Cancel the search

			var search = $(this);

			if(!search.val().trim().length) {

				window.location.hash = encodeURIComponent(_this.currentPath);
				search.hide();
				search.parent().find('span').show();

			}

		});

		// Clicking on folders

		this.fileList.on('click', 'li.folders', function(e){
			e.preventDefault();

			var nextDir = $(this).find('a.folders').attr('href');

			if(_this.filemanager.hasClass('searching')) {

				// Building the this.breadcrumbs

				_this.breadcrumbsUrls = _this.generateBreadcrumbs(nextDir);

				_this.filemanager.removeClass('searching');
				_this.filemanager.find('input[type=search]').val('').hide();
				_this.filemanager.find('span').show();
			}
			else {
				_this.breadcrumbsUrls.push(nextDir);
			}

			window.location.hash = encodeURIComponent(nextDir);
			_this.currentPath = nextDir;
		});


		// Clicking on this.breadcrumbs

		this.breadcrumbs.on('click', 'a', function(e){
			e.preventDefault();

			var index = _this.breadcrumbs.find('a').index($(this)),
				nextDir = _this.breadcrumbsUrls[index];

			_this.breadcrumbsUrls.length = Number(index);

			window.location.hash = encodeURIComponent(nextDir);

		});
	}


		// Navigates to the given hash (path)

		goto(hash) {

			hash = decodeURIComponent(hash).slice(1).split('=');
			let _this = this;

			if (hash.length) {
				var rendered = '';

				// if hash has search in it

				if (hash[0] === 'search') {

					this.filemanager.addClass('searching');
					rendered = _this.searchData(_this.response, hash[1].toLowerCase());

					if (rendered.length) {
						this.currentPath = hash[0];
						this.render(rendered);
					}
					else {
						this.render(rendered);
					}

				}

				// if hash is some path

				else if (hash[0].trim().length) {

					rendered = this.searchByPath(hash[0]);

					if (rendered.length) {

						this.currentPath = hash[0];
						this.breadcrumbsUrls = this.generateBreadcrumbs(hash[0]);
						this.render(rendered);

					}
					else {
						this.currentPath = hash[0];
						this.breadcrumbsUrls = this.generateBreadcrumbs(hash[0]);
						this.render(rendered);
					}

				}

				// if there is no hash

				else {
					this.currentPath = this.response[0].path;
					this.breadcrumbsUrls.push(this.response[0].path);
					this.render(this.searchByPath(this.response[0].path));
				}
			}
		}

		// Splits a file path and turns it into clickable breadcrumbs
_
		generateBreadcrumbs(nextDir){
			var path = nextDir.split('/').slice(0);
			for(var i=1;i<path.length;i++){
				path[i] = path[i-1]+ '/' +path[i];
			}
			return path;
		}


		// Locates a file by path

		searchByPath(dir) {
			var path = dir.split('/'),
				demo = this.response,
				flag = 0;

			for(var i=0;i<path.length;i++){
				for(var j=0;j<demo.length;j++){
					if(demo[j].name === path[i]){
						flag = 1;
						demo = demo[j].items;
						break;
					}
				}
			}

			//demo = flag ? demo : [];
			return demo;
		}


		// Recursively search through the file tree

		searchData(data, searchTerms) {

			let _this = this;
			let folders = [];
			let files = [];

			let _searchData = function (data, searchTerms) {
			data.forEach(function(d){
				if(d.type === 'folder') {

						_searchData(d.items,searchTerms);

						if(d.name.toLowerCase().indexOf(searchTerms) >= 0) {
						folders.push(d);
					}
				}
				else if(d.type === 'file') {
						if(d.name.toLowerCase().indexOf(searchTerms) >= 0) {
						files.push(d);
					}
				}
			});
			};

			_searchData(data, searchTerms);

			return {folders: folders, files: files};
		}


		onUpload(event) {
			let file;
			if (this.files && this.files[0]) {
				web.MediaModal.showUploadLoading();
				var reader = new FileReader();
				reader.onload = imageIsLoaded;
				reader.readAsDataURL(this.files[0]);
				//reader.readAsBinaryString(this.files[0]);
				file = this.files[0];
			}

			function imageIsLoaded(e) {

					let image = e.target.result;

					var formData = new FormData();
					formData.append("file", file);
					formData.append("mediaPath", web.MediaModal.mediaPath + web.MediaModal.currentPath);
					formData.append("onlyFilename", true);

					$.ajax({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						type: "POST",
                        url: document.location.origin+'/upload.php',//set your server side upload script url
						data: formData,
						processData: false,
						contentType: false,
						success: function (data) {

							let fileElement = web.MediaModal.addFile({
								name:data,
								type:"file",
								path: web.MediaModal.currentPath + "/" + data,
								size:1
							},true);
								Swal.fire('Image uploaded successfully')
							 $([document.documentElement, document.body]).animate({
								scrollTop:fileElement.offset().top
							}, 1000, function () {
								fileElement.fadeOut().fadeIn('slow');
							});

							web.MediaModal.hideUploadLoading();

						},
						error: function (data) {
							alert(data.responseText);
							web.MediaModal.hideUploadLoading();
						}
					});
			}
		}
	
	
		deleteFolder(e) {
			let parent = $(this).parents("li");
			let file = $('input[type="hidden"]', parent).val();
			let filePath =  file.split('/');
			let length = filePath.length;
			let fileName = filePath[parseInt(length)-1];
			
			Swal.fire({
				title: 'Are you sure?',
				text: `You want to delete "${fileName}"?`,
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
					method:"POST",
					url: deleteUrl,//set your server side save script url
					data: {file},
				}).done(function(data) {
						Swal.fire(
						'Deleted!',
						'Your file has been deleted.',
						'success'
					);
					delay(() => $("#top-toast .toast").removeClass("show"), 5000)
				}).fail(function (data) {
						Swal.fire(
						'Deleted!',
						data.responseText,
						'success'
					)
				}).always(function (data) {
				});

				parent.remove();
					
				}
			});
			
		}

		deleteFile(e) {
			let parent = $(this).parents("li");
			let file = $('input[type="hidden"]', parent).val();
			let filePath =  file.split('/');
			let length = filePath.length;
			let fileName = filePath[parseInt(length)-1];
			
			Swal.fire({
				title: 'Are you sure?',
				text: `You want to delete "${fileName}"?`,
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
					method:"POST",
					url: deleteUrl,//set your server side save script url
					data: {file},
				}).done(function(data) {
						Swal.fire(
						'Deleted!',
						'Your file has been deleted.',
						'success'
					);
					delay(() => $("#top-toast .toast").removeClass("show"), 5000)
				}).fail(function (data) {
						Swal.fire(
						'Deleted!',
						data.responseText,
						'success'
					)
				}).always(function (data) {
				});

				parent.remove();
					
				}
			});
			
		}
		
		renameFile(e) {
			let parent = $(this).parents("li");
			let file = $('input[type="hidden"]', parent).val();
			//let newfile = prompt(`Enter new file name for "${file}"`, file);
			$("#MediaModal").hide();
			let filePath =  file.split('/');
			let length = filePath.length;
			let fullFileName = filePath[parseInt(length)-1];
			let fileName = fullFileName.split('.');
			
			console.log(fileName[0]);
			Swal.fire({
			  title: 'Enter new file name for',
			  input: 'text',
			  inputValue:fileName[0],
			  inputAttributes: {
				autocapitalize: 'off'
			  },
			  showCancelButton: true,
			  confirmButtonText: 'Rename',
			  showLoaderOnConfirm: true,
			  preConfirm: (newFile) => {
				let newfile = filePath.splice(0,(parseInt(length)-1)).join('/')+"/"+newFile+"."+fileName[1];
				console.log(file);
				  console.log(newfile);
				  $.ajax({
					method:"POST",
					url: renameUrl,//set your server side save script url
					data: {file, newfile},
				}).done(function(data) {

					if (data.success) {
					} else {
						//bg = "bg-danger";
					}

					  Swal.fire(
					  'Rename Completed',
					  data,
					  'success'
					);
					  
					  web.MediaModal.initGallery();
				}).fail(function (data) {
					   Swal.fire(
					  'Rename Not Completed',
					  data.responseText,
					  'Error'
					);
					displayToast("bg-danger", data.responseText);
				}).always(function (data) {
				});
			  },
			  allowOutsideClick: () => !Swal.isLoading()
			}).then((result) => {
				$("#MediaModal").show();
			});
		}

		addFile(f, selected) {
				let _this= this;
				let isImage = false;
				let actions = '';
			
			

				var fileSize = _this.bytesToSize(f.size),
						name = _this.escapeHTML(f.name),
						fileType = name.split('.'),
						icon = '<span class="icon file"></span>';

					fileType = fileType[fileType.length-1];

					if (fileType == "jpg" || fileType == "jpeg" || fileType == "png" || fileType == "gif" || fileType == "svg" || fileType == "webp") {

						//icon = '<div class="image" style="background-image: url(' + _this.mediaPath + f.path + ');"></div>';
						var imgpath = _this.mediaPath + f.path;
						imgpath = imgpath.replace("../master/media", "../backend/admin/media");

						icon = '<img class="image" loading="lazy" src="' + imgpath + '">';
						isImage = true;
					} else {
						icon = '<span class="icon file f-'+fileType+'">.'+fileType+'</span>';
					}
					//icon = '<span class="icon file f-'+fileType+'">.'+fileType+'</span>';


				
				actions += '<a href="javascript:void(0);" title="Rename" class="btn btn-outline-primary btn-sm border-0 btn-rename"><i class="la la-edit"></i></a> <a href="javascript:void(0);" title="Delete" class="btn btn-outline-danger btn-sm border-0 btn-delete"><i class="la la-trash"></i></a>';
				var mimgpath = _this.mediaPath + f.path;
					mimgpath = mimgpath.replace("../master/media", "../backend/admin/media");
				let userActions = $(window).triggerHandler( "mediaModal:fileActions", { file: mimgpath, name, fileType, fileSize, isImage, fileType, actions} );

				if (userActions) actions = userActions;
				if (isImage) actions += '<a href="javascript:void(0);" class="preview-link p-2"><i class="la la-search-plus"></i></a>';


				
				var file = $('<li class="files">\
						<label class="form-check">\
						<input type="hidden" class="fileurl" value="' +  mimgpath + '" name="filename[]">\
						  <input type="' + ((_this.type == "single") ? "radio" : "checkbox") + '" class="form-check-input" value="' + mimgpath + '" name="file[]" ' + ((selected == "single") ? "checked" : "") + '><span class="form-check-label"></span>\
						  <div href="#\" class="files">'+icon+'<div class="info"><div class="name">'+ name +'</div><span class="details">'+fileSize+'</span>\
							' + actions + '\
							 <div class="preview">\
								<img class="l1" src="' + mimgpath + '">\
								<div>\
									<span class="name">'+ name +'</span><span class="details">'+fileSize+'</span>\
								</div>\
							</div>\
						  </div>\
						</label>\
					</li>');

				let fileelement = file.appendTo(_this.fileList);
				if (selected) {
					$("input[type='radio'], input[type='checkbox']", fileelement).prop("checked", true);
				}

				return file;
		}


		render(data) {

			var scannedFolders = [],
				scannedFiles = [];

			if(Array.isArray(data)) {

				data.forEach(function (d) {

					if (d.type === 'folder') {
						scannedFolders.push(d);
					}
					else if (d.type === 'file') {
						scannedFiles.push(d);
					}

				});

			}
			else if(typeof data === 'object') {

				scannedFolders = data.folders;
				scannedFiles = data.files;

			}


			// Empty the old result and make the new one

			this.fileList.empty();//.hide();
			if(!scannedFolders.length && !scannedFiles.length) {
				this.filemanager.find('.nothingfound').show();
			}
			else {
				this.filemanager.find('.nothingfound').hide();
			}

			let _this = this;

			if(scannedFolders.length) {

				scannedFolders.forEach(function(f) {

					var itemsLength = f.items.length,
						name = _this.escapeHTML(f.name),
						icon = '<span class="icon folder"></span>';

					if(itemsLength) {
						icon = '<span class="icon folder full"></span>';
					}

					if(itemsLength == 1) {
						itemsLength += ' item';
					}
					else if(itemsLength > 1) {
						itemsLength += ' items';
					}
					else {
						itemsLength = 'Empty <a href="javascript:void(0);" title="Delete" class="btn btn-outline-danger btn-sm border-0 btn-delete"><i class="la la-trash"></i></a>';
					}

					var folder = $('<li class="folders"><a href="'+ f.path +'" title="'+ f.path +'" class="folders">'+icon+'<div class="info"><span class="name">' + name + '</span> <span class="details">' + itemsLength + '</span></div></a></li>');
					folder.appendTo(_this.fileList);
				});

			}

			if(scannedFiles.length) {

				scannedFiles.forEach(function(f) {

					_this.addFile(f);

				});

			}


			// Generate the breadcrumbs

			var url = '';

			if(this.filemanager.hasClass('searching')){

				url = '<span>Search results: </span>';
				this.fileList.removeClass('animated');

			}
			else {

				this.fileList.addClass('animated');

				this.breadcrumbsUrls.forEach(function (u, i) {

					var name = u.split('/');

					if (i !== _this.breadcrumbsUrls.length - 1) {
						url += '<a href="'+u+'"><span class="folderName">' + name[name.length-1] + '</span></a> <span class="arrow">→</span> ';
					}
					else {
						url += '<span class="folderName">' + name[name.length-1] + '</span>';
					}

				});

			}
			this.breadcrumbs.html('<a href="/"><i class="la la-home"></i><span class="folderName">&ensp;home</span></a>').append(url);



			// Show the generated elements

			this.fileList.animate({'display':'inline-block'});

		}


		// This function escapes special html characters in names

		escapeHTML(text) {
			return text.replace(/\&/g,'&amp;').replace(/\</g,'&lt;').replace(/\>/g,'&gt;');
		}


		// Convert file sizes from bytes to human readable units

		bytesToSize(bytes) {
			var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
			if (bytes == 0) return '0 Bytes';
			var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
			return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
		}
	
	
}

/*
export {
  MediaModal
}
*/
