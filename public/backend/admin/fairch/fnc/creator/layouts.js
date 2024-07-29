web.ComponentsGroup["Layouts"] = ["layouts/1-row","layouts/2-row-col", "layouts/2row-2col", "layouts/2-columns","layouts/3-columns","layouts/4-columns","layouts/6-columns","layouts/8-columns","layouts/2-col-var","layouts/3-col-var"];
  

web.Components.add("layouts/1-row", {
	name: "single row",
	image: "icons/1row.svg",
	html: `<section title="one-row"><div class="row p-3 border"></div></section>
 `
});
web.Components.add("layouts/2-row-col", {
	name: "two row",
	image: "icons/lay-row.svg",
	html: `<section title="one-row"><div class="row p-3 border"></div><div class="row p-3 border"></div></section>
 `
});
web.Components.add("layouts/2row-2col", {
	name: "two row 2 col",
	image: "icons/22row.svg",
	html: `<div class="container">
	<div class="row row-cols-2 border">
	  <div class="col p-3 border"></div>
	  <div class="col p-3 border"></div>
	  <div class="col p-3 border"></div>
	  <div class="col p-3 border"></div>
	</div>
  </div>
 `
});
web.Components.add("layouts/2-columns", {
	name: "2 columns",
	image: "icons/2col.svg",
	html: `<section title="two columns">
	<div class="container text-center">
	<div class="row p-3">
	  <div class="col-sm-6 p-3 border"></div>
	  <div class="col-sm-6 p-3 border"></div>
	</div>
  </div>
  </section>`
  });
  web.Components.add("layouts/3-columns", {
	name: "3 columns",
	image: "icons/3col.svg",
	html: `<section title="three columns">
	<div class="container text-center">
	<div class="row p-3">
	  <div class="col-sm-4 p-3 border"></div>
	  <div class="col-sm-4 p-3 border"></div>
	  <div class="col-sm-4 p-3 border"></div>
	</div>
  </div>
  </section>`
  });web.Components.add("layouts/4-columns", {
	name: "4 columns",
	image: "icons/4col.svg",
	html: `<section class="bg-alternate" title="four columns">
	<div class="container text-center">
	<div class="row p-3">
	  <div class="col-sm-3 p-3 border"></div>
	  <div class="col-sm-3 p-3 border"></div>
	  <div class="col-sm-3 p-3 border"></div>
	  <div class="col-sm-3 p-3 border"></div>
	</div></div>
  </section>`
  });web.Components.add("layouts/6-columns", {
	name: "6 columns",
	image: "icons/6col.svg",
	html: `<section title="six columns">
	<div class="container text-center">
	<div class="row p-3">
	  <div class="col-sm-2 p-3 border"></div>
	  <div class="col-sm-2 p-3 border"></div>
	  <div class="col-sm-2 p-3 border"></div>
	  <div class="col-sm-2 p-3 border"></div>
	  <div class="col-sm-2 p-3 border"></div>
	  <div class="col-sm-2 p-3 border"></div>
	</div></div>
  </section>`
  });web.Components.add("layouts/8-columns", {
	name: "8 columns",
	image: "icons/8col.svg",
	html: `<section title="eight columns">
	<div class="container text-center">
	<div class="row p-3">
	  <div class="col-sm p-3 border"></div>
	  <div class="col-sm p-3 border"></div>
	  <div class="col-sm p-3 border"></div>
	  <div class="col-sm p-3 border"></div>
	  <div class="col-sm p-3 border"></div>
	  <div class="col-sm p-3 border"></div>
	  <div class="col-sm p-3 border"></div>
	  <div class="col-sm p-3 border"></div>
	</div></div>
  </section>`
  });web.Components.add("layouts/2-col-var", {
	name: "2 Col Var",
	image: "icons/2-col-var.svg",
	html: `<section title="2 col var">
	<div class="container text-center">
	<div class="row p-3">
	  <div class="col-sm-8 p-3 border"></div>
	  <div class="col-sm-4 p-3 border"></div>
	</div>
  </section>`
  });
  web.Components.add("layouts/3-col-var", {
	name: "3 Col Var",
	image: "icons/3-col-var.svg",
	html: `<section title="3 Col Var">
  <div class="container text-center">
  <div class="row p-3">
  <div class=" col-sm-3 p-3 border"></div>
  <div class="col-sm-6 p-3 border"></div>
  <div class="col-sm-3 p-3 border"></div>
</div>
  </div>
  </section>`
  });
  