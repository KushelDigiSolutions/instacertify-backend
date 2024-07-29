<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="{{ asset('fab_icon.png') }}" />
	<base href="">
	<title>Page Builder</title>
	<link href="{{ asset('backend/admin/css/pbstyles.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('backend/admin/css/afb-styles.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/theme/dracula.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/css/css.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.27/sweetalert2.css" integrity="sha512-eRBMRR/qeSlGYAb6a7UVwNFgXHRXa62u20w4veTi9suM2AkgkJpjcU5J8UVcoRCw0MS096e3n716Qe9Bf14EyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="body-page-builder">
	<div id="pagebuilder">


		<div id="top-panel">

			<div class="tp-left">
				<ul class="app-breadcrumbs">
					<li>
						<a href="{{ route('admin.dashboard') }}">
							<b>Home</b>
							<i class="la la-angle-right"></i>
						</a>
					</li>
					<li>
						<a href="{{route('admin.pages.index')}}">Pages</a>
					</li>
				</ul>
			</div>

			<div class="tp-center">
				<div class="viewport-setting" role="group">

					<button class="port-btn active" id="desktop-view" data-view="desktop" title="Desktop view" data-web-action="viewport">
						<i class="la la-desktop"></i>
					</button>

					<button class="port-btn" id="tablet-view" data-view="tablet" title="Tablet view" data-web-action="viewport">
						<i class="la la-tablet"></i>
					</button>

					<button class="port-btn" id="mobile-view" data-view="mobile" title="Mobile view" data-web-action="viewport">
						<i class="la la-mobile"></i>
					</button>

				</div>
			</div>

			<div class="tp-right">

				<div>
					<button class="topbar-btn-theme-icon tpr-arrows" title="Undo (Ctrl/Cmd + Z)" id="undo-btn" data-web-action="undo" data-web-shortcut="ctrl+z">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M4.25583 5.84909L6.73682 8.33009L5.35303 9.71387L0.509766 4.87061L5.35303 0.0273438L6.73682 1.41114L4.25583 3.89212H11.2731C15.5964 3.89212 19.101 7.39679 19.101 11.7201C19.101 16.0432 15.5964 19.548 11.2731 19.548H2.46674V17.591H11.2731C14.5155 17.591 17.144 14.9625 17.144 11.7201C17.144 8.47759 14.5155 5.84909 11.2731 5.84909H4.25583Z" fill="#7E8299"></path>
						</svg>
					</button>

					<button class="topbar-btn-theme-icon tpr-arrows" title="Redo (Ctrl/Cmd + Y)" id="redo-btn" data-web-action="redo" data-web-shortcut="ctrl+y">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15.8169 5.84909H8.79957C5.55715 5.84909 2.92865 8.47759 2.92865 11.7201C2.92865 14.9625 5.55715 17.591 8.79957 17.591H17.606V19.548H8.79957C4.47634 19.548 0.97168 16.0432 0.97168 11.7201C0.97168 7.39679 4.47634 3.89212 8.79957 3.89212H15.8169L13.3358 1.41114L14.7197 0.0273438L19.5629 4.87061L14.7197 9.71387L13.3358 8.33009L15.8169 5.84909Z" fill="#7E8299"></path>
						</svg>
					</button>
				</div>


				<button class="topbar-btn-theme-icon" title="Fullscreen (F11)" id="fullscreen-btn" data-bs-toggle="button" aria-pressed="false" data-web-action="fullscreen">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M19.8114 4.4027V8.8052C19.8114 8.9998 19.7341 9.18643 19.5965 9.32403C19.4589 9.46164 19.2723 9.53895 19.0777 9.53895C18.8831 9.53895 18.6965 9.46164 18.5589 9.32403C18.4213 9.18643 18.3439 8.9998 18.3439 8.8052V6.17378L14.4606 10.0581C14.3229 10.1958 14.1362 10.2731 13.9414 10.2731C13.7467 10.2731 13.56 10.1958 13.4223 10.0581C13.2846 9.92039 13.2073 9.73366 13.2073 9.53895C13.2073 9.34423 13.2846 9.1575 13.4223 9.01982L17.3066 5.13645H14.6752C14.4806 5.13645 14.294 5.05914 14.1564 4.92153C14.0188 4.78393 13.9414 4.5973 13.9414 4.4027C13.9414 4.20809 14.0188 4.02146 14.1564 3.88386C14.294 3.74625 14.4806 3.66895 14.6752 3.66895H19.0777C19.2723 3.66895 19.4589 3.74625 19.5965 3.88386C19.7341 4.02146 19.8114 4.20809 19.8114 4.4027ZM9.01982 13.4223L5.13645 17.3066V14.6752C5.13645 14.4806 5.05914 14.294 4.92153 14.1564C4.78393 14.0188 4.5973 13.9414 4.4027 13.9414C4.20809 13.9414 4.02146 14.0188 3.88386 14.1564C3.74625 14.294 3.66895 14.4806 3.66895 14.6752V19.0777C3.66895 19.2723 3.74625 19.4589 3.88386 19.5965C4.02146 19.7341 4.20809 19.8114 4.4027 19.8114H8.8052C8.9998 19.8114 9.18643 19.7341 9.32403 19.5965C9.46164 19.4589 9.53895 19.2723 9.53895 19.0777C9.53895 18.8831 9.46164 18.6965 9.32403 18.5589C9.18643 18.4213 8.9998 18.3439 8.8052 18.3439H6.17378L10.0581 14.4606C10.1958 14.3229 10.2731 14.1362 10.2731 13.9414C10.2731 13.7467 10.1958 13.56 10.0581 13.4223C9.92039 13.2846 9.73366 13.2073 9.53895 13.2073C9.34423 13.2073 9.1575 13.2846 9.01982 13.4223ZM19.0777 13.9414C18.8831 13.9414 18.6965 14.0188 18.5589 14.1564C18.4213 14.294 18.3439 14.4806 18.3439 14.6752V17.3066L14.4606 13.4223C14.3229 13.2846 14.1362 13.2073 13.9414 13.2073C13.7467 13.2073 13.56 13.2846 13.4223 13.4223C13.2846 13.56 13.2073 13.7467 13.2073 13.9414C13.2073 14.1362 13.2846 14.3229 13.4223 14.4606L17.3066 18.3439H14.6752C14.4806 18.3439 14.294 18.4213 14.1564 18.5589C14.0188 18.6965 13.9414 18.8831 13.9414 19.0777C13.9414 19.2723 14.0188 19.4589 14.1564 19.5965C14.294 19.7341 14.4806 19.8114 14.6752 19.8114H19.0777C19.2723 19.8114 19.4589 19.7341 19.5965 19.5965C19.7341 19.4589 19.8114 19.2723 19.8114 19.0777V14.6752C19.8114 14.4806 19.7341 14.294 19.5965 14.1564C19.4589 14.0188 19.2723 13.9414 19.0777 13.9414ZM6.17378 5.13645H8.8052C8.9998 5.13645 9.18643 5.05914 9.32403 4.92153C9.46164 4.78393 9.53895 4.5973 9.53895 4.4027C9.53895 4.20809 9.46164 4.02146 9.32403 3.88386C9.18643 3.74625 8.9998 3.66895 8.8052 3.66895H4.4027C4.20809 3.66895 4.02146 3.74625 3.88386 3.88386C3.74625 4.02146 3.66895 4.20809 3.66895 4.4027V8.8052C3.66895 8.9998 3.74625 9.18643 3.88386 9.32403C4.02146 9.46164 4.20809 9.53895 4.4027 9.53895C4.5973 9.53895 4.78393 9.46164 4.92153 9.32403C5.05914 9.18643 5.13645 8.9998 5.13645 8.8052V6.17378L9.01982 10.0581C9.1575 10.1958 9.34423 10.2731 9.53895 10.2731C9.73366 10.2731 9.92039 10.1958 10.0581 10.0581C10.1958 9.92039 10.2731 9.73366 10.2731 9.53895C10.2731 9.34423 10.1958 9.1575 10.0581 9.01982L6.17378 5.13645Z" fill="#7E8299" />
					</svg>
				</button>


				<button class="topbar-btn-theme-icon" title="Preview" id="preview-btn" type="button" data-bs-toggle="button" aria-pressed="false" data-web-action="preview" style="border-color: #fff;">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M11.7422 3.43359C17.0183 3.43359 21.4078 7.22989 22.328 12.24C21.4078 17.25 17.0183 21.0464 11.7422 21.0464C6.46599 21.0464 2.07653 17.25 1.15625 12.24C2.07653 7.22989 6.46599 3.43359 11.7422 3.43359ZM11.7422 19.0894C15.8866 19.0894 19.4331 16.2048 20.3307 12.24C19.4331 8.27518 15.8866 5.39057 11.7422 5.39057C7.59759 5.39057 4.05118 8.27518 3.15348 12.24C4.05118 16.2048 7.59759 19.0894 11.7422 19.0894ZM11.7422 16.6432C9.31031 16.6432 7.33893 14.6718 7.33893 12.24C7.33893 9.80816 9.31031 7.83678 11.7422 7.83678C14.1739 7.83678 16.1454 9.80816 16.1454 12.24C16.1454 14.6718 14.1739 16.6432 11.7422 16.6432ZM11.7422 14.6862C13.0932 14.6862 14.1884 13.591 14.1884 12.24C14.1884 10.889 13.0932 9.79376 11.7422 9.79376C10.3912 9.79376 9.29591 10.889 9.29591 12.24C9.29591 13.591 10.3912 14.6862 11.7422 14.6862Z" fill="#7E8299"/>
					</svg>
				</button>

				<div class="btn-group me-3" role="group">
						<a href="#" class="btn btn-outline-primary border-0 btn-sm btn-preview-url" target="blank">
							Bwowser view 
						</a>
						
					</div>


				<button class="page-save-button" title="Export (Ctrl + E)" id="save-btn" data-web-action="saveAjax" data-web-url="{{route('admin.save',request()->get('id'))}}" data-v-web-shortcut="ctrl+e">

					<span class="loading d-none">
						<span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true">
						</span>
						<span>Saving </span> ...
					</span>

					<span class="button-text">
						<span>Save</span>
					</span>

				</button>




			</div>

			<!-- <div class="btn-group me-3" role="group">
				<a href="#" class="btn btn-outline-primary border-0 btn-sm btn-preview-url" target="blank">
					View page <i class="la la-external-link-alt la-lg"></i>
				</a>
			</div> -->


		</div>

		<div class="page-left-siderbar">

			<a class="ls-back-arrow" title="Return to Pagelist" href="{{route('admin.pages.index')}}">
				<i class="la la-angle-left"></i>
			</a>

			<ul class="ls-navigation" id="elements-tabs" role="tablist">

				<li>
					<a title="Components" class="active" data-bs-toggle="tab" href="#components-tab" role="tab" aria-controls="components" aria-selected="false" title="Components">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M19.647 3C20.1691 3.1498 20.5843 3.43509 20.8289 3.93518C20.9357 4.15438 20.9952 4.38459 20.9952 4.63133C20.9941 6.33536 20.9974 8.04048 20.993 9.74451C20.9908 10.6378 20.2429 11.388 19.3473 11.388C14.1108 11.3913 8.87314 11.3902 3.63659 11.388C2.93272 11.388 2.30046 10.9143 2.06804 10.2358C2.04601 10.1719 2.02398 10.108 2.00195 10.043C2.00195 8.13962 2.00195 6.23732 2.00195 4.33392C2.04161 4.22487 2.07465 4.11252 2.12202 4.00678C2.35554 3.46814 2.78402 3.15862 3.33587 3C8.7729 3 14.2099 3 19.647 3ZM11.4936 10.227C14.0634 10.227 16.6321 10.227 19.2019 10.227C19.6525 10.227 19.8342 10.0485 19.8342 9.60242C19.8353 7.98981 19.8353 6.37831 19.8342 4.76571C19.8342 4.32511 19.6547 4.14667 19.2152 4.14667C14.0634 4.14556 8.91279 4.14556 3.76106 4.14667C3.32486 4.14667 3.14752 4.32731 3.14642 4.77012C3.14531 5.51804 3.14642 6.26486 3.14642 7.01278C3.14642 7.88958 3.14862 8.76748 3.14531 9.64427C3.14421 9.89101 3.23123 10.0761 3.45704 10.1862C3.56719 10.2402 3.68725 10.2259 3.80291 10.2259C6.36722 10.227 8.93042 10.227 11.4936 10.227Z" fill="#F8FAFC" />
							<path d="M2 14.9372C2.15201 14.4161 2.4373 13.9998 2.93848 13.7574C3.16319 13.6484 3.40111 13.59 3.65336 13.59C5.33976 13.5911 7.02617 13.5878 8.71257 13.5922C9.64334 13.5944 10.3858 14.3357 10.388 15.2654C10.3924 16.9518 10.3924 18.6382 10.388 20.3246C10.3858 21.2532 9.64114 21.9912 8.70926 21.9923C7.0537 21.9956 5.39814 21.978 3.74258 22C2.98915 22.0099 2.25775 21.5286 2.03745 20.7498C2.02754 20.7145 2.01212 20.6804 2 20.6451C2 18.744 2 16.8406 2 14.9372ZM6.19012 14.7543C5.38052 14.7543 4.57201 14.7532 3.76241 14.7543C3.33392 14.7554 3.14777 14.9349 3.14777 15.3579C3.14556 16.9826 3.14556 18.6074 3.14777 20.2321C3.14777 20.6485 3.33282 20.8324 3.74699 20.8335C5.37171 20.8346 6.99642 20.8346 8.62114 20.8335C9.04192 20.8335 9.22697 20.6451 9.22807 20.22C9.22917 18.6019 9.22917 16.9826 9.22807 15.3645C9.22807 14.9405 9.04192 14.7554 8.61894 14.7543C7.80933 14.7532 6.99973 14.7543 6.19012 14.7543Z" fill="#F8FAFC" />
							<path d="M20.9932 17.8042C20.991 20.1372 19.1218 21.9954 16.7778 21.9932C14.4492 21.991 12.5865 20.1141 12.5898 17.7723C12.5932 15.4481 14.4767 13.5854 16.8174 13.5899C19.135 13.5954 20.9943 15.4712 20.9932 17.8042ZM16.7822 20.8333C18.4785 20.8378 19.8234 19.506 19.8322 17.813C19.8411 16.1068 18.5038 14.7574 16.802 14.7541C15.1013 14.7508 13.7596 16.0804 13.7519 17.7745C13.7453 19.4807 15.0792 20.8289 16.7822 20.8333Z" fill="#F8FAFC" />
							<path d="M8.42565 5.21338C9.15484 5.21338 9.88404 5.21228 10.6132 5.21338C11.7478 5.21669 12.6147 6.06815 12.618 7.17846C12.6202 8.29098 11.7577 9.15677 10.6287 9.16117C9.15154 9.16668 7.67552 9.16668 6.1984 9.16117C5.14977 9.15677 4.27848 8.34386 4.2168 7.33268C4.15181 6.25651 4.90414 5.34556 5.98031 5.2266C6.29754 5.19135 6.62248 5.21448 6.94302 5.21448C7.4365 5.21228 7.93107 5.21338 8.42565 5.21338ZM8.43336 6.37877C7.67442 6.37877 6.91548 6.37327 6.15655 6.38098C5.71044 6.38538 5.38219 6.73346 5.37889 7.17736C5.37668 7.63339 5.70493 7.99248 6.15655 7.99358C7.66891 7.99909 9.18018 7.99578 10.6925 7.99578C10.8864 7.99578 11.0527 7.92198 11.1948 7.7931C11.4438 7.56619 11.5308 7.22583 11.4195 6.91631C11.3039 6.59357 11.0219 6.38318 10.6727 6.38098C9.9259 6.37437 9.18018 6.37767 8.43336 6.37877Z" fill="#F8FAFC" />
							<path d="M4.79802 17.2218C4.97646 17.2196 5.11966 17.2967 5.24193 17.419C5.42588 17.6018 5.61313 17.7814 5.79047 17.9708C5.8797 18.0656 5.94028 18.0611 6.0295 17.9697C6.48442 17.5082 6.94375 17.05 7.40418 16.5939C7.6399 16.3604 7.89435 16.3142 8.14219 16.453C8.47484 16.6391 8.53873 17.083 8.26115 17.3716C7.92739 17.7186 7.58262 18.0545 7.24116 18.3949C6.94926 18.6879 6.65736 18.982 6.36326 19.2717C6.07687 19.5537 5.74641 19.557 5.46443 19.2794C5.10424 18.9236 4.74515 18.5667 4.39156 18.2043C4.21092 18.0193 4.16686 17.7979 4.2682 17.5556C4.35632 17.3463 4.56009 17.2196 4.79802 17.2218Z" fill="#F8FAFC" />
							<path d="M18.7662 17.7931C18.7673 18.8858 17.8816 19.7703 16.7879 19.7692C15.7084 19.7681 14.8195 18.8803 14.8184 17.7997C14.8162 16.7158 15.7161 15.8181 16.8 15.8203C17.8794 15.8236 18.7651 16.7125 18.7662 17.7931ZM17.6008 17.7997C17.6019 17.3382 17.2593 16.989 16.8022 16.9857C16.345 16.9824 15.9871 17.3305 15.9838 17.7832C15.9793 18.2535 16.3263 18.6038 16.7945 18.6038C17.2538 18.6038 17.5997 18.259 17.6008 17.7997Z" fill="#F8FAFC" />
						</svg>
					</a>
				</li>

				<li>
					<a title="Sections" id="sections-tab" data-bs-toggle="tab" href="#sections" role="tab" aria-controls="sections" aria-selected="true" title="Sections">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M12.1905 12.4985C12.1905 15.3907 12.1905 18.2858 12.1905 21.1779C12.1905 21.7546 11.948 21.997 11.3654 21.997C8.51471 21.997 5.66397 21.997 2.81323 21.997C2.25432 21.997 2 21.7457 2 21.1868C2 15.3936 2 9.60047 2 3.81027C2 3.24545 2.24545 3 2.81323 3C5.66988 3 8.52949 3 11.3861 3C11.9362 3 12.1905 3.25432 12.1905 3.79844C12.1905 6.69946 12.1905 9.60047 12.1905 12.4985ZM10.8065 12.4985C10.8065 9.8814 10.8036 7.26132 10.8095 4.6442C10.8095 4.44311 10.7592 4.37805 10.5493 4.37805C8.24856 4.38397 5.94786 4.38397 3.64716 4.37805C3.42833 4.37805 3.37805 4.44311 3.37805 4.65307C3.38397 9.8814 3.38397 15.1097 3.37805 20.341C3.37805 20.551 3.42833 20.619 3.64716 20.616C5.94195 20.6072 8.23377 20.6101 10.5286 20.6101C10.8036 20.6101 10.8036 20.6101 10.8036 20.3292C10.8065 17.7209 10.8065 15.1097 10.8065 12.4985Z" fill="#7E8299" />
							<path d="M20.9963 7.41805C20.9963 8.63051 20.9963 9.84591 20.9963 11.0584C20.9963 11.5788 20.7361 11.8361 20.2156 11.8361C18.2402 11.8361 16.2648 11.8361 14.2894 11.8361C13.7867 11.8361 13.5176 11.567 13.5176 11.0672C13.5176 8.63346 13.5176 6.19969 13.5176 3.76591C13.5176 3.26023 13.7778 3 14.2894 3C16.2707 3 18.255 3 20.2363 3C20.7272 3 20.9963 3.26911 20.9993 3.75704C20.9993 4.97837 20.9963 6.19673 20.9963 7.41805ZM19.6124 7.4358C19.6124 6.49837 19.6064 5.55798 19.6153 4.62054C19.6183 4.43128 19.5562 4.38101 19.3728 4.38397C17.9622 4.38988 16.5517 4.38988 15.1381 4.38397C14.9548 4.38397 14.8956 4.43128 14.8956 4.62054C14.9015 6.48358 14.9015 8.34661 14.8956 10.2097C14.8956 10.4078 14.9577 10.4581 15.15 10.4581C16.5546 10.4521 17.9593 10.4521 19.364 10.4581C19.5562 10.4581 19.6212 10.4107 19.6183 10.2097C19.6064 9.28405 19.6124 8.35844 19.6124 7.4358Z" fill="#7E8299" />
							<path d="M20.9963 17.9276C20.9963 19.0277 20.9963 20.1278 20.9963 21.2308C20.9963 21.7365 20.7331 21.9997 20.2275 21.9997C18.2461 21.9997 16.2619 21.9997 14.2805 21.9997C13.7896 21.9997 13.5176 21.7306 13.5176 21.2456C13.5176 19.0307 13.5176 16.8157 13.5176 14.6008C13.5176 14.1069 13.7808 13.8438 14.2776 13.8438C16.2678 13.8438 18.258 13.8438 20.2452 13.8438C20.7302 13.8438 20.9993 14.1158 20.9993 14.6097C20.9993 15.7127 20.9963 16.8187 20.9963 17.9276ZM19.6124 17.9188C19.6124 17.0937 19.6094 16.2687 19.6153 15.4406C19.6153 15.278 19.571 15.2188 19.3994 15.2188C17.9741 15.2248 16.5487 15.2248 15.1233 15.2188C14.9429 15.2188 14.8956 15.278 14.8956 15.4495C14.9015 17.0937 14.9015 18.7379 14.8956 20.3821C14.8956 20.5536 14.9429 20.6157 15.1233 20.6128C16.5428 20.6069 17.9593 20.6069 19.3787 20.6128C19.568 20.6128 19.6183 20.5536 19.6153 20.3703C19.6094 19.5571 19.6124 18.7379 19.6124 17.9188Z" fill="#7E8299" />
						</svg>
					</a>
				</li>
<li>
					<a title="File Uploader" id="file-upload" href="#"  data-bs-toggle="modal" data-bs-target="#FileUploaderModel">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z"/>
</svg>
					</a>
				</li>

				<li>
					<a title="Theme Css" id="theme-css" href="#"  data-bs-toggle="modal" data-bs-target="#ThemeCss">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M19.1401 12.9384C19.1801 12.6384 19.2001 12.3284 19.2001 11.9984C19.2001 11.6784 19.1801 11.3584 19.1301 11.0584L21.1601 9.47844C21.3401 9.33844 21.3901 9.06844 21.2801 8.86844L19.3601 5.54844C19.2401 5.32844 18.9901 5.25844 18.7701 5.32844L16.3801 6.28844C15.8801 5.90844 15.3501 5.58844 14.7601 5.34844L14.4001 2.80844C14.3601 2.56844 14.1601 2.39844 13.9201 2.39844H10.0801C9.84011 2.39844 9.65011 2.56844 9.61011 2.80844L9.25011 5.34844C8.66011 5.58844 8.12011 5.91844 7.63011 6.28844L5.24011 5.32844C5.02011 5.24844 4.77011 5.32844 4.65011 5.54844L2.74011 8.86844C2.62011 9.07844 2.66011 9.33844 2.86011 9.47844L4.89011 11.0584C4.84011 11.3584 4.80011 11.6884 4.80011 11.9984C4.80011 12.3084 4.82011 12.6384 4.87011 12.9384L2.84011 14.5184C2.66011 14.6584 2.61011 14.9284 2.72011 15.1284L4.64011 18.4484C4.76011 18.6684 5.01011 18.7384 5.23011 18.6684L7.62011 17.7084C8.12011 18.0884 8.65011 18.4084 9.24011 18.6484L9.60011 21.1884C9.65011 21.4284 9.84011 21.5984 10.0801 21.5984H13.9201C14.1601 21.5984 14.3601 21.4284 14.3901 21.1884L14.7501 18.6484C15.3401 18.4084 15.8801 18.0884 16.3701 17.7084L18.7601 18.6684C18.9801 18.7484 19.2301 18.6684 19.3501 18.4484L21.2701 15.1284C21.3901 14.9084 21.3401 14.6584 21.1501 14.5184L19.1401 12.9384ZM12.0001 15.5984C10.0201 15.5984 8.40011 13.9784 8.40011 11.9984C8.40011 10.0184 10.0201 8.39844 12.0001 8.39844C13.9801 8.39844 15.6001 10.0184 15.6001 11.9984C15.6001 13.9784 13.9801 15.5984 12.0001 15.5984Z" fill="#7E8299" />
						</svg>
					</a>
				</li>

				<!--<li>
					<a title="Global" id="configuration-tab" data-bs-toggle="tab" href="#configuration" role="tab" aria-controls="configuration" aria-selected="true">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M19.1401 12.9384C19.1801 12.6384 19.2001 12.3284 19.2001 11.9984C19.2001 11.6784 19.1801 11.3584 19.1301 11.0584L21.1601 9.47844C21.3401 9.33844 21.3901 9.06844 21.2801 8.86844L19.3601 5.54844C19.2401 5.32844 18.9901 5.25844 18.7701 5.32844L16.3801 6.28844C15.8801 5.90844 15.3501 5.58844 14.7601 5.34844L14.4001 2.80844C14.3601 2.56844 14.1601 2.39844 13.9201 2.39844H10.0801C9.84011 2.39844 9.65011 2.56844 9.61011 2.80844L9.25011 5.34844C8.66011 5.58844 8.12011 5.91844 7.63011 6.28844L5.24011 5.32844C5.02011 5.24844 4.77011 5.32844 4.65011 5.54844L2.74011 8.86844C2.62011 9.07844 2.66011 9.33844 2.86011 9.47844L4.89011 11.0584C4.84011 11.3584 4.80011 11.6884 4.80011 11.9984C4.80011 12.3084 4.82011 12.6384 4.87011 12.9384L2.84011 14.5184C2.66011 14.6584 2.61011 14.9284 2.72011 15.1284L4.64011 18.4484C4.76011 18.6684 5.01011 18.7384 5.23011 18.6684L7.62011 17.7084C8.12011 18.0884 8.65011 18.4084 9.24011 18.6484L9.60011 21.1884C9.65011 21.4284 9.84011 21.5984 10.0801 21.5984H13.9201C14.1601 21.5984 14.3601 21.4284 14.3901 21.1884L14.7501 18.6484C15.3401 18.4084 15.8801 18.0884 16.3701 17.7084L18.7601 18.6684C18.9801 18.7484 19.2301 18.6684 19.3501 18.4484L21.2701 15.1284C21.3901 14.9084 21.3401 14.6584 21.1501 14.5184L19.1401 12.9384ZM12.0001 15.5984C10.0201 15.5984 8.40011 13.9784 8.40011 11.9984C8.40011 10.0184 10.0201 8.39844 12.0001 8.39844C13.9801 8.39844 15.6001 10.0184 15.6001 11.9984C15.6001 13.9784 13.9801 15.5984 12.0001 15.5984Z" fill="#7E8299" />
						</svg>
					</a>
				</li>-->

			</ul>
		</div>


		<div id="left-panel">

			<div class="drag-elements">

				<div class="header">


					<div class="tab-content">


						<div class="tab-pane active show components" id="components-tab" data-section="components" role="tabpanel" aria-labelledby="components-tab">
							<div class="drag-elements-sidepane sidepane">
								<div>
									<ul class="components-list clearfix" data-type="leftpanel"></ul>
								</div>
							</div>
						</div>

						<div class="tab-pane sections" id="sections" role="tabpanel" aria-labelledby="sections-tab">

							<ul class="section-properties-tabs" id="properties-tabs" role="tablist">
								<li>
									<a class="active" data-bs-toggle="tab" href="#sections-new-tab" role="tab" aria-controls="components" aria-selected="false">
										Add section
									</a>
								</li>
								<li>
									<a data-bs-toggle="tab" href="#sections-list" role="tab" aria-controls="sections" aria-selected="true">
										Page Sections
									</a>
								</li>
							</ul>

							<div class="tab-content">

								<div class="tab-pane" id="sections-list" data-section="style" role="tabpanel" aria-labelledby="style-tab">
									<div class="drag-elements-sidepane sidepane">
										<div>
											<div class="sections-container p-2">

												<div class="section-item" draggable="true">
													<div class="controls">
														<div class="handle"></div>
														<div class="info">
															<div class="name">&nbsp;
																<div class="type">&nbsp;</div>
															</div>
														</div>
													</div>
												</div>
												<div class="section-item" draggable="true">
													<div class="controls">
														<div class="handle"></div>
														<div class="info">
															<div class="name">&nbsp;
																<div class="type">&nbsp;</div>
															</div>
														</div>
													</div>
												</div>
												<div class="section-item" draggable="true">
													<div class="controls">
														<div class="handle"></div>
														<div class="info">
															<div class="name">&nbsp;
																<div class="type">&nbsp;</div>
															</div>
														</div>
													</div>
												</div>
												<!--<div class="section-item" draggable="true">
														  <div class="controls">
															  <div class="handle"></div>
															  <div class="info">
																  <div class="name">welcome area
																	  <div class="type">section</div>
																  </div>
															  </div>
															  <div class="buttons"> <a class="delete-btn" href="" title="Remove section"><i class="la la-trash text-danger"></i></a>

																  <a class="properties-btn" href="" title="Properties"><i class="la la-cog"></i></a> </div>
														  </div>
														  <input class="header_check" type="checkbox" id="section-components-9338">
														  <label for="section-components-9338">
															  <div class="header-arrow"></div>
														  </label>
														  <div class="tree">
															  <ol></ol>
														  </div>
												</div>-->


											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane show active" id="sections-new-tab" data-section="content" role="tabpanel" aria-labelledby="content-tab">




									<div class="drag-elements-sidepane sidepane">
										<div class="block-preview"><img src="" style="display:none"></div>
										<div>

											<ul class="sections-list clearfix" data-type="leftpanel">
											</ul>

										</div>
									</div>

								</div>

							</div>

						</div>


						<div class="tab-pane " id="configuration" role="tabpanel" aria-labelledby="configuration-tab">

							<div class="drag-elements-sidepane sidepane">
								<div>
									<div class="component-properties">
										<!-- color palette -->
										<!--
									  <label class="header" data-header="default" for="header_pallette"><span>Global styles</span>
										  <div class="header-arrow"></div>
									  </label> -->
										<input class="header_check" type="checkbox" checked="true" id="header_pallette">
										<div class="tab-pane section px-0" data-section="content">

										</div>


										<!-- typography -->
										<!--
									  <label class="header" data-header="element_header" for="header_element_typography"><span>Typography</span>
										  <div class="header-arrow"></div>
									  </label>

									  <input class="header_check" type="checkbox" checked="true" id="header_element_typography">
									  <div class="section" data-section="element_header">

									  </div>
									  -->

									</div>
								</div>
							</div>


						</div>

						<div class="tab-pane" id="properties" role="tabpanel" aria-labelledby="properties-tab">
							<div class="component-properties-sidepane">
								<div>
									<div class="component-properties">
										<ul class="nav nav-tabs nav-fill" id="properties-tabs" role="tablist">
										<li class="nav-item content-tab">
						<a class="nav-link active" data-bs-toggle="tab" href="#content-tab" role="tab" aria-controls="components" aria-selected="true">
							<!--<i class="la la-lg la-edit"></i>-->
							<div><span>Content</span></div>
						</a>
					</li>
					<li class="nav-item style-tab">
						<a class="nav-link" data-bs-toggle="tab" href="#style-tab" role="tab" aria-controls="blocks" aria-selected="false">
							<!--<i class="la la-lg la-clipboard"></i>-->
							<div><span>Style</span></div>
						</a>
					</li>
					<li class="nav-item advanced-tab">
						<a class="nav-link" data-bs-toggle="tab" href="#advanced-tab" role="tab" aria-controls="blocks" aria-selected="false">
							<!--<i class="la la-lg la-eye-slash"></i>-->
							<div><span>Advanced</span></div>
						</a>
					</li>
										</ul>

										<div class="tab-content">
											<div class="tab-pane show active" id="content-left-panel-tab" data-section="content" role="tabpanel" aria-labelledby="content-tab">
												<div class="alert alert-dismissible fade show alert-light m-3" role="alert" style="">
													<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
													<strong>No selected element!</strong><br> Click on an element to
													edit.
												</div>
											</div>

											<div class="tab-pane show" id="style-left-panel-tab" data-section="style" role="tabpanel" aria-labelledby="style-tab">
											</div>

											<div class="tab-pane show" id="advanced-left-panel-tab" data-section="advanced" role="tabpanel" aria-labelledby="advanced-tab">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>


		<div id="canvas">
			<div id="iframe-wrapper">
				<div id="iframe-layer">

					<div class="loading-message active">


						<svg xmlns="http://www.w3.org/2000/svg" version="1.1">
							<defs>
								<filter id="goo">
									<feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
									<feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 21 -7" />
								</filter>
							</defs>
						</svg>

					</div>

					<div id="highlight-box">
						<div id="highlight-name"></div>

						<div id="section-actions">
							<a id="add-section-btn" href="" title="Add element"><i class="la la-plus"></i></a>
						</div>
					</div>

					<div id="select-box">

						<div id="wysiwyg-editor" class="default-editor">


							<a id="bold-btn" class="hint" href="" title="Bold" aria-label="Bold">
								<svg height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
									<path d="M6,4h8a4,4,0,0,1,4,4h0a4,4,0,0,1-4,4H6Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
									<path d="M6,12h9a4,4,0,0,1,4,4h0a4,4,0,0,1-4,4H6Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
								</svg>
							</a>
							<a id="italic-btn" class="hint" href="" title="Italic" aria-label="Italic">
								<svg height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
									<line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="19" x2="10" y1="4" y2="4" />
									<line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="14" x2="5" y1="20" y2="20" />
									<line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="15" x2="9" y1="4" y2="20" />
								</svg>
							</a>
							<a id="underline-btn" class="hint" href="" title="Underline" aria-label="Underline">
								<svg height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
									<path d="M6,4v7a6,6,0,0,0,6,6h0a6,6,0,0,0,6-6V4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" y1="2" y2="2" />
									<line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="4" x2="20" y1="22" y2="22" />
								</svg>
							</a>


							<a id="strike-btn" class="hint" href="" title="Strikeout" aria-label="Strikeout">
								<del>S</del>
							</a>

							<div class="dropdown">
								<a class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="hint" aria-label="Text align"><i class="la la-align-left"></i></span>
								</a>

								<div id="justify-btn" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="#" data-value="Left"><i class="la la-lg la-align-left"></i> Align Left</a>
									<a class="dropdown-item" href="#" data-value="Center"><i class="la la-lg la-align-center"></i> Align Center</a>
									<a class="dropdown-item" href="#" data-value="Right"><i class="la la-lg la-align-right"></i> Align Right</a>
									<a class="dropdown-item" href="#" data-value="Full"><i class="la la-lg la-align-justify"></i> Align Justify</a>
								</div>
							</div>

							<div class="separator"></div>

							<a id="link-btn" class="hint" href="" title="Create link" aria-label="Create link">
								<i class="la la-link">
								</i></a>

							<div class="separator"></div>

							<input id="fore-color" name="color" type="color" aria-label="Text color" pattern="#[a-f0-9]{6}" class="form-control form-control-color hint">
							<input id="back-color" name="background-color" type="color" aria-label="Background color" pattern="#[a-f0-9]{6}" class="form-control form-control-color hint">

							<div class="separator"></div>

							<select id="font-size" class="form-select" aria-label="Font size">
								<option value="">- Font size -</option>
								<option value="8px">8 px</option>
								<option value="9px">9 px</option>
								<option value="10px">10 px</option>
								<option value="11px">11 px</option>
								<option value="12px">12 px</option>
								<option value="13px">13 px</option>
								<option value="14px">14 px</option>
								<option value="15px">15 px</option>
								<option value="16px">16 px</option>
								<option value="17px">17 px</option>
								<option value="18px">18 px</option>
								<option value="19px">19 px</option>
								<option value="20px">20 px</option>
								<option value="21px">21 px</option>
								<option value="22px">22 px</option>
								<option value="23px">23 px</option>
								<option value="24px">24 px</option>
								<option value="25px">25 px</option>
								<option value="26px">26 px</option>
								<option value="27px">27 px</option>
								<option value="28px">28 px</option>
							</select>

							<div class="separator"></div>

							<select id="font-family" class="form-select" title="Font family">
								<option value=""> - Font family - </option>
								<optgroup label="System default">
								<option value="LoveloBlack">LoveloBlack</option>
									<option value="Arial, Helvetica, sans-serif">Arial</option>
									<option value="Helvetica, sans-serif">Helvetica</option>
									<option value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Lucida Grande
									</option>
									<option value="'Palatino Linotype', 'Book Antiqua', Palatino, serif">Palatino
										Linotype</option>
									<option value="'Times New Roman', Times, serif">Times New Roman</option>
									<option value="Georgia, serif">Georgia, serif</option>
									<option value="Tahoma, Geneva, sans-serif">Tahoma</option>
									<option value="'Comic Sans MS', cursive, sans-serif">Comic Sans</option>
									<option value="Verdana, Geneva, sans-serif">Verdana</option>
									<option value="Impact, Charcoal, sans-serif">Impact</option>
									<option value="'Arial Black', Gadget, sans-serif">Arial Black</option>
									<option value="'Trebuchet MS', Helvetica, sans-serif">Trebuchet</option>
									<option value="'Courier New', Courier, monospace">Courier New</option>
									<option value="'Brush Script MT', sans-serif">Brush Script</option>
								</optgroup>
							</select>
						</div>

						<div id="select-actions">
							<a id="drag-btn" href="" title="Drag element"><i class="la la-arrows-alt"></i></a>
							<a id="parent-btn" href="" title="Select parent" class="la-rotate-180"><i class="la la-level-up-alt"></i></a>

							<a id="up-btn" href="" title="Move element up"><i class="la la-arrow-up"></i></a>
							<a id="down-btn" href="" title="Move element down"><i class="la la-arrow-down"></i></a>
							<a id="clone-btn" href="" title="Clone element"><i class="la la-copy"></i></a>
							<a id="delete-btn" href="" title="Remove element"><i class="la la-trash"></i></a>
						</div>

						<div class="resize">
							<!-- top -->
							<div class="top-left">
							</div>
							<div class="top-center">
							</div>
							<div class="top-right">
							</div>
							<!-- center -->
							<div class="center-left">
							</div>
							<div class="center-right">
							</div>
							<!-- bottom -->
							<div class="bottom-left">
							</div>
							<div class="bottom-center">
							</div>
							<div class="bottom-right">
							</div>
						</div>

					</div>

					<!-- add section box -->
					<div id="add-section-box" class="drag-elements">

						<div class="popup-header">
							<p class="header-text">Add Layout</p>

							<ul class="nav-tabs" id="box-elements-tabs" role="tablist">
								<li class="component-tab">
									<a class="active" id="box-components-tab" data-bs-toggle="tab" href="#box-components" role="tab" aria-controls="components" aria-selected="true">
										Elements
									</a>
								</li>
								<li class="sections-tab">
									<a id="box-sections-tab" data-bs-toggle="tab" href="#box-sections" role="tab" aria-controls="sections" aria-selected="true">
										Sections
									</a>
								</li>
							</ul>

							<div class="section-box-actions">

								<div id="close-section-btn" class="btn btn-light btn-sm bg-white btn-sm float-end"><i class="la la-times la-lg"></i></div>

								<div class="before-after-radio">

									<div class="form-check d-inline-block me-1">
										<input type="radio" id="add-section-insert-mode-after" value="after"  name="add-section-insert-mode" class="form-check-input">
										<label class="form-check-label small" for="add-section-insert-mode-after">After</label>
									</div>

									<div class="form-check d-inline-block">
										<input type="radio" id="add-section-insert-mode-inside" value="inside" checked="checked" name="add-section-insert-mode" class="form-check-input">
										<label class="form-check-label small" for="add-section-insert-mode-inside">Inside</label>
									</div>

								</div>

							</div>
						</div>

						<div class="popup-body">
							<div class="tab-content">
									<div class="tab-pane show active" id="box-components" role="tabpanel" aria-labelledby="components-tab">
										<div>
											<div>

												<ul class="components-list clearfix" data-type="addbox">
												</ul>

											</div>
										</div>

									</div>
									<div class="tab-pane show " id="box-sections" role="tabpanel" aria-labelledby="sections-tab">
										<div>
											<div>

												<ul class="sections-list clearfix" data-type="addbox">
												</ul>
											</div>
										</div>

									</div>
									<div class="tab-pane" id="box-blocks" role="tabpanel" aria-labelledby="blocks-tab">

										<div class="search">
											<div class="expand">
												<button class="text-sm" title="Expand All" data-web-action="expand"><i class="la la-plus"></i></buttona>
													<button title="Collapse all" data-web-action="collapse"><i class="la la-minus"></i></button>
											</div>

											<input class="form-control block-search" placeholder="Search blocks" type="text" data-web-action="search" data-web-on="keyup">
											<button class="clear-backspace" data-web-action="clearSearch">
												<i class="la la-times"></i>
											</button>
										</div>

										<div>
											<div>

												<ul class="blocks-list clearfix" data-type="addbox">
												</ul>

											</div>
										</div>

									</div>

								</div>
						</div>

					</div>
					<!-- //add section box -->

					<div id="drop-highlight-box">
					</div>
				</div>


				<iframe src="" id="iframe1">
				</iframe>
			</div>


		</div>

		<div id="right-panel">
			<div class="component-properties">

				<ul class="nav nav-tabs nav-fill" id="properties-tabs" role="tablist">
					<li class="nav-item content-tab">
						<a class="nav-link active" data-bs-toggle="tab" href="#content-tab" role="tab" aria-controls="components" aria-selected="true">
						Content
						</a>
					</li>
					<li class="nav-item style-tab">
						<a class="nav-link" data-bs-toggle="tab" href="#style-tab" role="tab" aria-controls="blocks" aria-selected="false">
						Style
						</a>
					</li>
					<li class="nav-item advanced-tab">
						<a class="nav-link" data-bs-toggle="tab" href="#advanced-tab" role="tab" aria-controls="blocks" aria-selected="false">
						Advanced
						</a>
					</li>
				</ul>

				<div class="tab-content">

					<div class="tab-pane show active" id="content-tab" data-section="content" role="tabpanel" aria-labelledby="content-tab">
						<div class="no-selected-element fade show m-3" role="alert">
							<!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
							<strong>No selected element!</strong>
							<br>
							Click on an element to edit.
						</div>
					</div>

					<div class="tab-pane show" id="style-tab" data-section="style" role="tabpanel" aria-labelledby="style-tab">
					</div>

					<div class="tab-pane show" id="advanced-tab" data-section="advanced" role="tabpanel" aria-labelledby="advanced-tab">
					</div>


				</div>



			</div>
		</div>

		<div id="bottom-panel">

			<div>

				<div class="breadcrumb-navigator px-2" style="--bs-breadcrumb-divider: '>';">

					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">body</a></li>
						<li class="breadcrumb-item"><a href="#">section</a></li>
						<li class="breadcrumb-item"><a href="#">img</a></li>
					</ol>
				</div>


				<div class="btn-group" role="group">

					<div id="toggleEditorJsExecute" class="form-check mt-1" style="display:none">
						<input type="checkbox" class="form-check-input" id="runjs" name="runjs" data-web-action="toggleEditorJsExecute">
						<label class="form-check-label" for="runjs"><small>Run JS</small></label>&ensp;
					</div>


					<button id="code-editor-btn" data-view="mobile" class="btn btn-sm btn-light btn-sm" title="Code editor" data-web-action="toggleEditor">
						<i class="la la-code"></i> Code editor
					</button>


				</div>

			</div>

			<div id="web-code-editor">
				<textarea class="form-control"></textarea>
				<div>

				</div>
			</div>
		</div>


		<!-- templates -->

		<script id="web-input-textinput" type="text/html">
			<div>
				<input name="{%=key%}" type="text" class="form-control" />
			</div>
		</script>

		<script id="web-input-textareainput" type="text/html">
			<div>
				<textarea name="{%=key%}" {% if (typeof rows !== 'undefined') { %} rows="{%=rows%}" {% } else { %} rows="3" {% } %} class="form-control" />
			</div>
		</script>

		<script id="web-input-checkboxinput" type="text/html">
			<div class="form-check{% if (typeof className !== 'undefined') { %} {%=className%}{% } %}">
				<input name="{%=key%}" class="form-check-input" type="checkbox" id="{%=key%}_check">
				<label class="form-check-label" for="{%=key%}_check">{% if (typeof text !== 'undefined') { %} {%=text%}
					{% } %}</label>
			</div>
		</script>

		<script id="web-input-radioinput" type="text/html">
			<div>

				{% for ( var i = 0; i < options.length; i++ ) { %}

				<label class="form-check-input  {% if (typeof inline !== 'undefined' && inline == true) { %}custom-control-inline{% } %}" title="{%=options[i].title%}">
					<input name="{%=key%}" class="form-check-input" type="radio" value="{%=options[i].value%}" id="{%=key%}{%=i%}" {%if (options[i].checked) { %}checked="{%=options[i].checked%}" {% } %}>
					<label class="form-check-label" for="{%=key%}{%=i%}">{%=options[i].text%}</label>
				</label>

				{% } %}

			</div>
		</script>

		<script id="web-input-radiobuttoninput" type="text/html">
			<div class="btn-group {%if (extraclass) { %}{%=extraclass%}{% } %} clearfix" role="group">
				{% var namespace = 'rb-' + Math.floor(Math.random() * 100); %}

				{% for ( var i = 0; i < options.length; i++ ) { %}

				<input name="{%=key%}" class="btn-check" type="radio" value="{%=options[i].value%}" id="{%=namespace%}{%=key%}{%=i%}" {%if (options[i].checked) { %}checked="{%=options[i].checked%}" {% } %} autocomplete="off">
				<label class="btn btn-outline-primary {%if (options[i].extraclass) { %}{%=options[i].extraclass%}{% } %}" for="{%=namespace%}{%=key%}{%=i%}" title="{%=options[i].title%}">
					{%if (options[i].icon) { %}<i class="{%=options[i].icon%}"></i>{% } %}
					{%=options[i].text%}
				</label>

				{% } %}

			</div>
		</script>


		<script id="web-input-toggle" type="text/html">
			<div class="form-check form-switch">
				<input type="checkbox" name="{%=key%}" value="{%=on%}" {%if (off) { %} data-value-off="{%=off%}" {% } %} {%if (on) { %} data-value-on="{%=on%}" {% } %} class="form-check-input" type="checkbox" role="switch" id="{%=key%}">
				<label class="form-check-label" for="{%=key%}">
				</label>
			</div>
		</script>

		<script id="web-input-header" type="text/html">
			<h6 class="header">{%=header%}</h6>
		</script>


		<script id="web-input-select" type="text/html">
			<div>

				<select class="form-select" name="{%=key%}">
					{% var optgroup = false; for ( var i = 0; i < options.length; i++ ) { %}
					{% if (options[i].optgroup) {  %}
					{% if (optgroup) {  %}
					</optgroup>
					{% } %}
					<optgroup label="{%=options[i].optgroup%}">
						{% optgroup = true; } else { %}
						<option value="{%=options[i].value%}" {%
					for (attr in options[i]) {
							if (attr != "value" && attr != "text") {
						 %} {%=attr%}={%=options[i][attr]%} {% }
					} %}>
							{%=options[i].text%}</option>
						{% } } %}
				</select>

			</div>
		</script>

		<script id="web-input-icon-select" type="text/html">
			<div class="input-list-select">

				<div class="elements">
					<div class="row">
						{% for ( var i = 0; i < options.length; i++ ) { %}
						<div class="col">
							<div class="element">
								{%=options[i].value%}
								<label>{%=options[i].text%}</label>
							</div>
						</div>
						{% } %}
					</div>
				</div>
			</div>
		</script>

		<script id="web-input-html-list-select" type="text/html">
			<div class="input-html-list-select">

				<div class="current-element">

				</div>

				<div class="popup">
					<select class="form-select">
						{% var optgroup = false; for ( var i = 0; i < options.length; i++ ) { %}
						{% if (options[i].optgroup) {  %}
						{% if (optgroup) {  %}
						</optgroup>
						{% } %}
						<optgroup label="{%=options[i].optgroup%}">
							{% optgroup = true; } else { %}
							<option value="{%=options[i].value%}">{%=options[i].text%}</option>
							{% } } %}
					</select>

					<div class="search">
						<input class="form-control search" placeholder="Search elements" type="text">
						<button class="clear-backspace">
							<i class="la la-times"></i>
						</button>
					</div>

					<div class="elements">
						{%=elements%}
					</div>
				</div>
			</div>
			</div>
		</script>

		<script id="web-input-html-list-dropdown" type="text/html">
			<div class="input-html-list-select" {% if (typeof id !== "undefined") { %} id={%=id%} {% } %}>

				<div class="current-element">

				</div>

				<div class="popup">
					<select class="form-select">
						{% var optgroup = false; for ( var i = 0; i < options.length; i++ ) { %}
						{% if (options[i].optgroup) {  %}
						{% if (optgroup) {  %}
						</optgroup>
						{% } %}
						<optgroup label="{%=options[i].optgroup%}">
							{% optgroup = true; } else { %}
							<option value="{%=options[i].value%}">{%=options[i].text%}</option>
							{% } } %}
					</select>

					<div class="search">
						<input class="form-control search" placeholder="Search elements" type="text">
						<button class="clear-backspace">
							<i class="la la-times"></i>
						</button>
					</div>

					<div class="elements">
						{%=elements%}
					</div>
				</div>
			</div>
			</div>
		</script>

		<script id="web-input-dateinput" type="text/html">
			<div>
				<input name="{%=key%}" type="date" class="form-control" {% if (typeof min_date === 'undefined') { %} min="{%=min_date%}" {% } %} {% if (typeof max_date === 'undefined') { %} max="{%=max_date%}" {% } %} />
			</div>
		</script>

		<script id="web-input-listinput" type="text/html">
			<div class="row">

				{% for ( var i = 0; i < options.length; i++ ) { %}
				<div class="col-6">
					<div class="input-group">
						<input name="{%=key%}_{%=i%}" type="text" class="form-control" value="{%=options[i].text%}" />
						<div class="input-group-append">
							<button class="input-group-text btn btn-sm btn-danger">
								<i class="la la-trash la-lg"></i>
							</button>
						</div>
					</div>
					<br />
				</div>
				{% } %}


				{% if (typeof hide_remove === 'undefined') { %}
				<div class="col-12">

					<button class="btn btn-sm btn-outline-primary">
						<i class="la la-trash la-lg"></i> Add new
					</button>

				</div>
				{% } %}

			</div>
		</script>

		<script id="web-input-grid" type="text/html">
			<div class="row">

				<div class="col-6 mb-3 px-2">

					<label>Extra small</label>
					<select class="form-select" name="col">

						<option value="">None</option>
						{% for ( var i = 1; i <= 12; i++ ) { %}
						<option value="{%=i%}" {% if ((typeof col !== 'undefined') && col == i) { %} selected {% } %}>{%=i%}
						</option>
						{% } %}

					</select>
				</div>


				<div class="col-6 mb-3 px-2">
					<label>Small</label>
					<select class="form-select" name="col-sm">

						<option value="">None</option>
						{% for ( var i = 1; i <= 12; i++ ) { %}
						<option value="{%=i%}" {% if ((typeof col_sm !== 'undefined') && col_sm == i) { %} selected {% } %}>
							{%=i%}</option>
						{% } %}

					</select>
				</div>

				<div class="col-6 mb-3 px-2">
					<label>Medium</label>
					<select class="form-select" name="col-md">

						<option value="">None</option>
						{% for ( var i = 1; i <= 12; i++ ) { %}
						<option value="{%=i%}" {% if ((typeof col_md !== 'undefined') && col_md == i) { %} selected {% } %}>
							{%=i%}</option>
						{% } %}

					</select>
				</div>

				<div class="col-6 mb-3 px-2">
					<label>Large</label>
					<select class="form-select" name="col-lg">

						<option value="">None</option>
						{% for ( var i = 1; i <= 12; i++ ) { %}
						<option value="{%=i%}" {% if ((typeof col_lg !== 'undefined') && col_lg == i) { %} selected {% } %}>
							{%=i%}</option>
						{% } %}

					</select>
				</div>


				<div class="col-6 mb-3 px-2">
					<label>Extra large </label>
					<select class="form-select" name="col-xl">

						<option value="">None</option>
						{% for ( var i = 1; i <= 12; i++ ) { %}
						<option value="{%=i%}" {% if ((typeof col_lg !== 'undefined') && col_lg == i) { %} selected {% } %}>
							{%=i%}</option>
						{% } %}

					</select>
				</div>

				<div class="col-6 mb-3 px-2">
					<label>Extra extra large</label>
					<select class="form-select" name="col-xxl">

						<option value="">None</option>
						{% for ( var i = 1; i <= 12; i++ ) { %}
						<option value="{%=i%}" {% if ((typeof col_lg !== 'undefined') && col_lg == i) { %} selected {% } %}>
							{%=i%}</option>
						{% } %}

					</select>
				</div>

				{% if (typeof hide_remove === 'undefined') { %}
				<div class="col-12">

					<button class="btn btn-sm btn-outline-light text-danger">
						<i class="la la-trash la-lg"></i> Remove
					</button>

				</div>
				{% } %}

			</div>
		</script>

		<script id="web-input-textvalue" type="text/html">
			<div class="row">
				<div class="col-6 mb-1">
					<label>Value</label>
					<input name="value" type="text" value="{%=value%}" class="form-control" autocomplete="off" />
				</div>

				<div class="col-6 mb-1">
					<label>Text</label>
					<input name="text" type="text" value="{%=text%}" class="form-control" autocomplete="off" />
				</div>

				{% if (typeof hide_remove === 'undefined') { %}
				<div class="col-12">

					<button class="btn btn-sm btn-outline-light text-danger">
						<i class="la la-trash la-lg"></i> Remove
					</button>

				</div>
				{% } %}

			</div>
		</script>

		<script id="web-input-rangeinput" type="text/html">
			<div class="input-range">

				<input name="{%=key%}" type="range" min="{%=min%}" max="{%=max%}" step="{%=step%}" class="form-range" data-input-value />
				<input name="{%=key%}" type="number" min="{%=min%}" max="{%=max%}" step="{%=step%}" class="form-control" data-input-value />
			</div>
		</script>

		<script id="web-input-imageinput" type="text/html">
			<div>
				<input name="{%=key%}" type="text" class="form-control" />
				<input name="file" type="file" class="form-control" />
			</div>
		</script>

		<script id="web-input-imageinput-gallery" type="text/html">
			<div>
				<img id="thumb-{%=key%}" class="img-thumbnail p-0" data-target-input="#input-{%=key%}" data-target-thumb="#thumb-{%=key%}" style="cursor:pointer" src="" width="225" height="225">
				<input name="{%=key%}" type="text" class="form-control mt-1" id="input-{%=key%}" />
				<button name="button" class="btn btn-primary btn-sm btn-icon mt-2" data-target-input="#input-{%=key%}" data-target-thumb="#thumb-{%=key%}"><i class="la la-image la-lg"></i>&ensp;Set image</button>
			</div>
		</script>

		<script id="web-input-colorinput" type="text/html">
			<div>
				<input name="{%=key%}" type="color" {% if (typeof value !== 'undefined' && value != false) { %} value="{%=value%}" {% } %} pattern="#[a-f0-9]{6}" class="form-control form-control-color" />
			</div>
		</script>

		<script id="web-input-bootstrap-color-picker-input" type="text/html">
			<div>
				<div id="cp2" class="input-group" title="Using input value">
					<input name="{%=key%}" type="text" {% if (typeof value !== 'undefined' && value != false) { %} value="{%=value%}" {% } %} class="form-control" />
					<span class="input-group-append">
						<span class="input-group-text colorpicker-input-addon"><i></i></span>
					</span>
				</div>
			</div>
		</script>

		<script id="web-input-numberinput" type="text/html">
			<div>
				<input name="{%=key%}" type="number" value="{%=value%}" {% if (typeof min !== 'undefined' && min != false) { %}min="{%=min%}" {% } %} {% if (typeof max !== 'undefined' && max != false) { %}max="{%=max%}" {% } %} {% if (typeof step !== 'undefined' && step != false) { %}step="{%=step%}" {% } %} class="form-control" />
			</div>
		</script>

		<script id="web-input-button" type="text/html">
			<div>
				<button class="btn btn-sm btn-primary">
					<i class="la  {% if (typeof icon !== 'undefined') { %} {%=icon%} {% } else { %} la-plus {% } %} la-lg"></i>
					{%=text%}
				</button>
			</div>
		</script>

		<script id="web-input-cssunitinput" type="text/html">
			<div class="input-group css-unit" id="cssunit-{%=key%}">
				<input name="number" type="number" {% if (typeof value !== 'undefined' && value != false) { %} value="{%=value%}" {% } %} {% if (typeof min !== 'undefined' && min != false) { %}min="{%=min%}" {% } %} {% if (typeof max !== 'undefined' && max != false) { %}max="{%=max%}" {% } %} {% if (typeof step !== 'undefined' && step != false) { %}step="{%=step%}" {% } %} class="form-control" />
				<div class="input-group-append">
					<select class="form-select small-arrow" name="unit">
						<option value="em">em</option>
						<option value="rem">rem</option>
						<option value="px">px</option>
						<option value="%">%</option>
						<option value="vw">vw</option>
						<option value="vh">vh</option>
						<option value="ex">ex</option>
						<option value="ch">ch</option>
						<option value="cm">cm</option>
						<option value="mm">mm</option>
						<option value="in">in</option>
						<option value="pt">pt</option>
						<option value="auto">auto</option>
					</select>
				</div>
			</div>
		</script>


		<script id="web-filemanager-folder" type="text/html">
			<li data-folder="{%=folder%}" class="folder">
				<label for="{%=folder%}"><span>{%=folderTitle%}</span></label> <input type="checkbox" id="{%=folder%}" />
				<ol></ol>
			</li>
		</script>

		<script id="web-filemanager-page" type="text/html">
			<li data-url="{%=url%}" data-file="{%=file%}" data-page="{%=name%}" class="file{% if (typeof className !== 'undefined') { %} {%=className%}{% } %}">
				<label for="{%=name%}" {% if (typeof description !== 'undefined') { %} title="{%=description%}" {% } %}>
					<span>{%=title%}</span>
					<div class="file-actions">
						<button href="#" class="delete btn btn-outline-danger" title="Delete"><i class="la la-trash"></i></button>
						<button href="#" class="rename btn btn-outline-primary" title="Rename"><i class="la la-pen"></i></button>
						<button href="#" class="duplicate btn btn-outline-primary" title="Clone"><i class="la la-copy"></i></button>
					</div>
				</label> <input type="checkbox" id="{%=name%}" />
				<!-- <ol></ol> -->
			</li>
		</script>

		<script id="web-filemanager-component" type="text/html">
			<li data-url="{%=url%}" data-component="{%=name%}" class="component">
				<a href="{%=url%}"><span>{%=title%}</span></a>
			</li>
		</script>

		<script id="web-breadcrumb-navigaton-item" type="text/html">
			<li class="breadcrumb-item"><a href="#">{%=name%}</a></li>
		</script>

		<script id="web-input-sectioninput" type="text/html">
			<label class="header" data-header="{%=key%}" for="header_{%=key%}"><span>{%=header%}</span>
				<div class="header-arrow"></div>
			</label>
			<input class="header_check" type="checkbox" {% if (typeof expanded !== 'undefined' && expanded == false) { %} {% } else { %}checked="true" {% } %} id="header_{%=key%}">
			<div class="section row" data-section="{%=key%}"></div>
		</script>


		<script id="web-property" type="text/html">
			<div class="mb-3 {% if (typeof col !== 'undefined' && col != false) { %} col-sm-{%=col%} {% } else { %}row{% } %} {% if (typeof inline !== 'undefined' && inline == true) { %}inline{% } %} " data-key="{%=key%}" {% if (typeof group !== 'undefined' && group != null) { %}data-group="{%=group%}" {% } %}>

				{% if (typeof name !== 'undefined' && name != false) { %}<label class="{% if (typeof inline === 'undefined' ) { %}col-sm-4{% } %} form-label" for="input-model">{%=name%}</label>{% } %}

				<div class="{% if (typeof inline === 'undefined') { %}col-sm-{% if (typeof name !== 'undefined' && name != false) { %}8{% } else { %}12{% } } %} input">
				</div>

			</div>
		</script>

		<script id="web-input-autocompletelist" type="text/html">
			<div>
				<input name="{%=key%}" type="text" class="form-control" />

				<div class="form-control autocomplete-list" style="min=height: 150px; overflow: auto;">
				</div>
			</div>
		</script>

		<script id="web-input-tagsinput" type="text/html">
			<div>
				<div class="form-control tags-input" style="height:auto;">


					<input name="{%=key%}" type="text" class="form-control" style="border:none;min-width:60px;" />
				</div>
			</div>
		</script>

		<script id="web-input-noticeinput" type="text/html">
			<div>
				<div class="alert alert-dismissible fade show alert-{%=type%}" role="alert" style="">
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					<h6><b>{%=title%}</b></h6>

					{%=text%}
				</div>
			</div>
		</script>

		<script id="web-section" type="text/html">
			{% var suffix = Math.floor(Math.random() * 10000); %}

			<div class="section-item" draggable="true">
				<div class="controls">
					<div class="handle"></div>
					<div class="info">
						<div class="name">{%=name%}
							<div class="type">{%=type%}</div>
						</div>
					</div>
					<div class="buttons">
						<a class="delete-btn" href="" title="Remove section"><i class="la la-trash text-danger"></i></a>

						<a class="properties-btn" href="" title="Properties"><i class="la la-cog"></i></a>
					</div>
				</div>


				<input class="header_check" type="checkbox" id="section-components-{%=suffix%}">

				<label for="section-components-{%=suffix%}">
					<div class="header-arrow"></div>
				</label>

				<div class="tree">
					<ol>
						<li data-component="Products" class="file">
							<label for="idNaN" style="background-image:url(/js/vpgjs/icons/products.svg)"><span>Products</span></label>
							<input type="checkbox" id="idNaN">
						</li>
						<li data-component="Posts" class="file">
							<label for="idNaN" style="background-image:url(/js/vpgjs/icons/posts.svg)"><span>Posts</span></label>
							<input type="checkbox" id="idNaN">
						</li>
					</ol>
				</div>
			</div>
		</script>


		<!--// end templates -->


		<!-- export html modal-->
		<div class="modal fade" id="textarea-modal" tabindex="-1" role="dialog" aria-labelledby="textarea-modal" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<p class="modal-title text-primary"><i class="la la-lg la-save"></i> Export html</p>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
							<!-- span aria-hidden="true"><small><i class="la la-times"></i></small></span -->
						</button>
					</div>
					<div class="modal-body">

						<textarea rows="25" cols="150" class="form-control"></textarea>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal"><i class="la la-times"></i> Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- message modal-->
		<div class="modal fade" id="message-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<p class="modal-title text-primary"><i class="la la-lg la-comment"></i> Vpgjs</p>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
							<!-- span aria-hidden="true"><small><i class="la la-times"></i></small></span -->
						</button>
					</div>
					<div class="modal-body">
						<p>Page was successfully saved!.</p>
					</div>
					<div class="modal-footer">
						<!-- <button type="button" class="btn btn-primary">Ok</button> -->
						<button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal"><i class="la la-times"></i> Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- new page modal-->
		<div class="modal fade" id="new-page-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">

				<form action="#" method="POST" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="modal-title text-primary fw-normal"><i class="la la-lg la-file"></i> New page
							</h6>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
								<!-- span aria-hidden="true"><small><i class="la la-times"></i></small></span -->
							</button>
						</div>

						<div class="modal-body text">
							<div class="mb-3 row" data-key="type">
								<label class="col-sm-3 col-form-label">
									Template
									<abbr title="The contents of this template will be used as a start for the new template">
										<i class="la la-lg la-question-circle text-primary"></i>
									</abbr>

								</label>
								<div class="col-sm-9 input">
									<div>
										<select class="form-select" name="startTemplateUrl">
											<option value="{{ asset('master/new-page-blank-template.html') }}">Blank
												Template</option>

										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 row" data-key="href">
								<label class="col-sm-3 col-form-label">Page name</label>
								<div class="col-sm-9 input">
									<div>
										<input name="title" type="text" value="My page" class="form-control" placeholder="My page" required>
									</div>
								</div>
							</div>

							<div class="mb-3 row" data-key="href">
								<label class="col-sm-3 col-form-label">File name</label>
								<div class="col-sm-9 input">
									<div>
										<input name="file" type="text" value="my-page.html" class="form-control" placeholder="my-page.html" required>
									</div>
								</div>
							</div>



							<div class="mb-3 row" data-key="href">
								<label class="col-sm-3 col-form-label">Save to folder</label>
								<div class="col-sm-9 input">
									<div>
										<input name="folder" type="text" value="my-pages" class="form-control" placeholder="/" required>
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-secondary btn-lg" type="reset" data-bs-dismiss="modal"><i class="la la-times"></i> Cancel</button>
							<button class="btn btn-primary btn-lg" type="submit"><i class="la la-check"></i> Create
								page</button>
						</div>
					</div>

				</form>

			</div>
		</div>

		<!-- save toast -->
		<div class="toast-container position-fixed end-0 bottom-0 me-3 mb-3" id="top-toast">
			<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-header text-white">
					<strong class="me-auto">Page save</strong>
					<!-- <small class="badge bg-success">status</small> -->
					<button type="button" class="btn-close text-white px-2" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
				<div class="toast-body ">
					<div class="flex-grow-1">
						<div class="message">Elements saved!
							<div>Template backup was saved!</div>
							<div>Template was saved!</div>
						</div>
						<div><a class="btn btn-success  btn-icon btn-sm w-100 mt-2" href="">View page</a></div>
					</div>
				</div>
			</div>
		</div>

		
		<!-- file uploader -->
		<div class="modal fade modal-full" id="FileUploaderModel" tabindex="-1" role="dialog" aria-labelledby="MediaModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="MediaModalLabel">Upload Files</h5>

				<button type="button" class="btn btn-sm" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true"><i class="la la-times la-lg"></i></span>
				</button>
			  </div>
			  <div class="modal-body">

                      <div class="filemanager" id="mfileUpload">

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
					<button type="button" class="btn btn-info" id="addFolder">Add New Folder</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary save-btn" id="copyClipboard">Copy Link</button>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<!-- file uploader -->
		
		

	
		<!-- theme css -->
		<div class="modal fade modal-full" id="ThemeCss" tabindex="-1" role="dialog" aria-labelledby="MediaModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document" style="max-width:100% !important;margin-top:0px !important;">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="MediaModalLabel">Edit Theme Css</h5>
				<button id="saveButton"  class="css-save-button">Save CSS</button>
				<button type="button" class="btn btn-sm" data-bs-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true"><i class="la la-times la-lg"></i></span>
				</button>
			  </div>
			  <div id="editor" class="modal-body" style="opacity:1 !important;"></div>


<style>
	.modal-dialog-1{max-width:100%; width:100% !important;}
    .CodeMirror {
        height: auto;
        border: 1px solid #ccc;
        font-family: monospace;
    }
</style>




			  
			</div>
		  </div>
		</div>
		<!-- theme css -->


		
		<script>
    var editor = CodeMirror(document.getElementById("editor"), {
        lineNumbers: true,
        mode: "css",
        theme: "dracula", // You can change the theme here
        indentUnit: 4,
        indentWithTabs: true,
        lineWrapping: true,
        autoCloseBrackets: true,
        matchBrackets: true
    });

    // Fetch CSS from the server and display it in the editor
    $(document).ready(function() {
        $.ajax({
            url: '../../../fetch_css.php', // PHP script to fetch CSS
            method: 'GET',
            success: function(response) {
                editor.setValue(response);
            },
            error: function() {
                alert('Failed to fetch CSS');
            }
        });
    });

    // Save CSS function
    $('#saveButton').click(function() {
        var editedCSS = editor.getValue();

        // Send the edited CSS to the server to save
        $.ajax({
            url: '../../../save_css.php', // PHP script to save CSS
            method: 'POST',
            data: { cssContent: editedCSS },
            success: function() {
                alert('CSS saved successfully');
            },
            error: function() {
                alert('Failed to save CSS');
            }
        });
    });
</script>


		<!-- jquery-->
		<script src="{{ asset('backend/admin/js/jquery.min.js') }}"></script>
		<script src="{{ asset('backend/admin/js/jquery.hotkeys.js') }}"></script>


		<!-- bootstrap-->
		<script src="{{ asset('backend/admin/js/popper.min.js') }}"></script>
		<script src="{{ asset('backend/admin/js/bootstrap.min.js') }}"></script>


		<!-- builder code-->
		<script src="{{ asset('backend/admin/fairch/fnc/creator/creator.js') }}"></script>

		<!-- undo manager-->
		<script src="{{ asset('backend/admin/fairch/fnc/creator/undo.js') }}"></script>

		<!-- inputs-->
		<script src="{{ asset('backend/admin/fairch/fnc/creator/inputs.js') }}"></script>



		<!-- media gallery -->
		<link href="{{ asset('backend/admin/fairch/fnc/images/img.css') }}" rel="stylesheet" type="text/css" />

		<script>
			window.mediaPath = '../backend/admin/media';
			web.themeBaseUrl = 'backend/admin/demo/';
		</script>
		<script src="{{ asset('backend/admin/fairch/fnc/images/img.js') }}"></script>
		<script src="{{ asset('backend/admin/fairch/fnc/creator/plugin-img.js') }}"></script>



		<!-- components-->
		
		<script src="{{ asset('backend/admin/fairch/fnc/creator/plugin-google-fonts.js') }}"></script>
		<script src="{{ asset('backend/admin/fairch/fnc/creator/layouts.js') }}"></script>
		<script src="{{ asset('backend/admin/fairch/fnc/creator/common.js') }}"></script>
		<script src="{{ asset('backend/admin/fairch/fnc/creator/components.js') }}"></script>
		<script src="{{ asset('backend/admin/fairch/fnc/creator/plugin-aos.js') }}"></script>

		<!-- sections-->
		<!-- <script src="demo/landing/sections/sections.js"></script> -->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
		<script src="{{ asset('backend/admin/fairch/fnc/creator/sections.js') }}"></script>


		<!-- plugins -->

		<!-- code mirror - code editor syntax highlight -->
		<link href="{{ asset('backend/admin/fairch/fnc/codemirror/lib/codemirror.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend/admin/fairch/fnc/codemirror/theme/material.css') }}" rel="stylesheet" type="text/css" />
		<script src="{{ asset('backend/admin/fairch/fnc/codemirror/lib/codemirror.js') }}"></script>
		<script src="{{ asset('backend/admin/fairch/fnc/codemirror/lib/xml.js') }}"></script>
		<script src="{{ asset('backend/admin/fairch/fnc/codemirror/lib/formatting.js') }}"></script>
		<script src="{{ asset('backend/admin/fairch/fnc/creator/plugin-codemirror.js') }}"></script>
		
		<!-- autocomplete plugin used by autocomplete input-->
		<script src="{{ asset('backend/admin/fairch/fnc/autocomplete/jquery.autocomplete.js') }}"></script>


		<script>
			let renameUrl = '{{env('APP_URL')}}/save.php?action=rename';
			let deleteUrl = '{{env('APP_URL')}}/save.php?action=delete';
			let createFolder = '{{env('APP_URL')}}/save.php?action=create-folder';
			let deleteFolder = '{{env('APP_URL')}}/save.php?action=delete-folder';

			let pages = [{
					name: "home",
					title: "Home",
					url: "{{route('admin.pages.page-build',$string)}}",
					file: "{{route('admin.pages.page-build',$string)}}",
					folder: "",
					assets: ['']
				},
				{
					name: "about",
					title: "About Us",
					url: "{{ asset('master/my-pages/about.html') }}",
					file: "{{ asset('master/my-pages/about.html') }}",
					folder: "",
					assets: ['']
				},

			];

			$(function() {

				let firstPage = Object.keys(pages)[0];
				web.Builder.init(pages[firstPage]["url"], function() {
					//load code after page is loaded here
				});

				web.Gui.init();
				web.FileManager.init();
				web.SectionList.init();
				web.Breadcrumb.init();

				web.FileManager.addPages(pages);
				web.FileManager.loadPage(pages[firstPage]["name"]);
				web.Breadcrumb.init();

				//if url has #no-right-panel set one panel demo
				if (window.location.hash.indexOf("no-right-panel") != -1) {
					web.Gui.toggleRightColumn();
				}
			});

			$(".viewport-setting").on('click', '.port-btn', function() {
				$(".viewport-setting .port-btn").removeClass('active')
				$(this).addClass('active')
			});

			$("#theme-css").on('click',  function() {
				web.MediaModal = new MediaModal(true);
				web.MediaModal.init();
			});

			$("#file-upload").on('click',  function() {
				web.MediaModal = new MediaModal(true);
				web.MediaModal.init();
			});
			
			
			$("#addFolder").on("click",()=>{
				$("#FileUploaderModel").hide();
				
					  setTimeout(()=>{ $("#FileUploaderModel").show();
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
					$("#file-upload").click();
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
			});
			
			$("#copyClipboard").on("click",function(){
				var imgUrl ="";
				$("#FileUploaderModel #media-files li").each(function(e){
					
					if($(this).find(".form-check-input").is(':checked') ){
						imgUrl = $(this).find(".fileurl").val().replace("../",location.origin+"/");
					//	console.log(imgUrl);
						 navigator.clipboard.writeText(imgUrl.replace("/\/\//g","/"));
						$("#FileUploaderModel").modal('hide');
						return;
					}
				});
				let timerInterval
				Swal.fire({
				  title: 'Link Copied!',
				  html: imgUrl+'\n <b></b>',
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
				  }
				}).then((result) => {
				  /* Read more about handling dismissals below */
				  if (result.dismiss === Swal.DismissReason.timer) {
					console.log('I was closed by the timer')
				  }
				});
			});
		</script>
</body>

</html>