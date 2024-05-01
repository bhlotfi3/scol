<script context="module">

</script>

<script>
	let siteUrl = helpie_faq_object.site_url;


	let params = {
		mainSettingsURL: siteUrl + '/wp-admin/edit.php?post_type=helpie_faq&page=helpie-review-settings',
		allFAQsPageURL: siteUrl + '/all_helpie_faq_page',
		faqGroupsURL: siteUrl + '/wp-admin/edit-tags.php?taxonomy=helpie_faq_group&post_type=helpie_faq',
		woocommerceSettingsUrl: siteUrl + '/wp-admin/edit.php?post_type=helpie_faq&page=helpie-review-settings#tab=integrations/woocommerce',
		docsURL: 'https://helpiewp.com/docs/home/getting-started-with-helpie-faq-plugin/',
		docsLmsFaqURL: 'https://helpiewp.com/docs/home/faq-groups/#helpie-sp-3',
		docsFaqGroupsURL: 'https://helpiewp.com/docs/home/faq-groups/',
		docsUserSubmitURL: 'https://helpiewp.com/docs/home/features-2/#helpie-sp-3',
		landingPageURL: 'https://helpiewp.com/wordpress-faq-plugin/',
		qnaSettingsURL: siteUrl + '/wp-admin/edit.php?post_type=helpie_faq&page=helpie-review-settings#tab=questions-answers-beta',
		userSubmissionSettingsURL: siteUrl + '/wp-admin/edit.php?post_type=helpie_faq&page=helpie-review-settings#tab=user-submission',
		generalFAQPlaylist: 'https://www.youtube.com/watch?v=oN-e6Fmdolk&list=PLHEMj5fR2DUqaSVL5II9DURg0yPvrhfsY',
		allFAQsvideo: 'https://youtu.be/oN-e6Fmdolk?t=48',
		wooQAvideo: 'https://youtu.be/Dop12EXY5fk?t=56',
		wooFAQvideo: 'https://youtu.be/uqTDDdwiSJc?t=6',
		kbLandingPage: 'https://helpiewp.com/features/'
	};
</script>

<h1>Welcome to Helpie FAQ</h1>
<div class="helpie-faq-onboarding">
	
	<div class='card'>
		<h3>All FAQs</h3>
		<p>I want to create a Single Page of FAQs.</p>
		<br>
		<a class="button" href={params.allFAQsPageURL} target="_blank">See All FAQs</a>
		<a class="button" href={params.mainSettingsURL} target="_blank">Main Settings</a>
		<a class="button red" href={params.allFAQsvideo} target="_blank">See Video</a>

	</div>
	<div class='card'>
		<h3>FAQ Groups</h3>
		<p>I want to create multiple separate pages of different FAQs (using FAQ Group taxonomy).</p>
		<a class="button" href={params.faqGroupsURL} target="_blank">Check out FAQ Groups</a>
		<a class="button red" href={params.docsFaqGroupsURL} target="_blank">See Docs</a>
	</div>
	<div class='card'>
		<h3>Woocommerce FAQs</h3>
		<p>I want to add FAQs to Woocommerce.</p>
		<a class="button" href={params.woocommerceSettingsUrl} target="_blank">Enable Woocommerce FAQ</a>
		<a class="button red" href={params.wooFAQvideo} target="_blank">See Video</a>
	</div>
	<div class='card'>
		<h3>Create Q&A sections to Woocommerce (Pro)</h3>
		<p>Create a Q&A sections just like amazon for your ecommerce store</p>
		<a class="button" href={params.qnaSettingsURL} target="_blank">Try Woocommerce Q&A</a>
		<a class="button red" href={params.wooQAvideo} target="_blank">See Video</a>
	</div>
	<div class='card'>
		<h3>Enable User Submission (Pro)</h3>
		<p>Let users submit FAQs for helpie_faq or woocommerce product post_types.</p>
		<a class="button" href={params.userSubmissionSettingsURL} target="_blank">Try User Submission</a>
		<a class="button red" href={params.docsUserSubmitURL} target="_blank">See Docs</a>
	</div>
	<div class='card'>
		<h3>LMS Lesson or Course FAQs (Pro)</h3>
		<p>I want to add FAQs to an LMS Lesson or Course.</p>
		<a class="button red" href={params.docsLmsFaqURL} target="_blank">See Docs</a>
	</div>
</div>
<h2>External Links</h2>
<div class="helpie-faq-onboarding">

	<div class='card'>
		<h3>Documentation</h3>
		<p>Basic Documentation of Helpie FAQ</p>
		<a class="button red" href={params.docsURL} target="_blank">See Docs</a>
	</div>
	<div class='card'>
		<h3>Features</h3>
		<p>Features and Pricing Plans</p>
		<a class="button red" href={params.landingPageURL} target="_blank">See All Features</a>
	</div>
	<div class='card'>
		<h3>Create Docs / KB with Helpie KB</h3>
		<p>Helpie KB Plugin</p>
		<a class="button red" href={params.kbLandingPage} target="_blank">See Helpie KB Features</a>
	</div>
	<div class='card'>
		<h3>FAQ Videos - Playlist</h3>
		<p>All FAQ walkthrough videos</p>
		<a class="button red" href={params.generalFAQPlaylist} target="_blank">FAQ Videos - Playlist</a>
	</div>
</div>
<!-- 
<style>
	.tablesome-onboarding {
		@apply tablesome-shadow tablesome-mr-5 tablesome-mt-4 tablesome-px-8 tablesome-py-6 tablesome-bg-white tablesome-font-roboto;
	}

	.tablesome-onboarding__title {
		@apply tablesome-text-center;
		color: #3a4f67;
	}

	.tablesome-onboarding__subtitle {
		@apply tablesome-text-sm  tablesome-text-inherit sm:tablesome-text-xl;
	}

	.tablesome-onboarding h1 {
		@apply tablesome-text-lg tablesome-font-bold tablesome-text-inherit sm:tablesome-text-4xl;
	}
	.tablesome-onboarding__top {
		@apply tablesome-flex tablesome-justify-center tablesome-items-center tablesome-flex-col tablesome-gap-2;
	}
	.tablesome-onboarding__logo {
		@apply tablesome-rounded-md tablesome-w-20 tablesome-h-20;
	}

	.tablesome-onboarding__feature {
		@apply tablesome-rounded-xl tablesome-shadow-sm tablesome-p-6 tablesome-px-8  tablesome-flex tablesome-flex-col tablesome-gap-4 tablesome-border-solid tablesome-border-gray-300 tablesome-border tablesome-min-w-full  tablesome-text-xs md:tablesome-text-base  md:tablesome-min-w-120 lg:tablesome-min-w-144;
	}

	.tablesome-onboarding__grid {
		@apply tablesome-grid lg:tablesome-grid-cols-2 xl:tablesome-grid-cols-3 tablesome-gap-4 tablesome-justify-center tablesome-items-center tablesome-mb-6 tablesome-mt-8;
	}

	.tablesome-onboarding__buttons {
		@apply tablesome-flex tablesome-flex-col sm:tablesome-flex-row tablesome-justify-center tablesome-items-center;
	}
	.tablesome-onboarding__button {
		background: #4a5e76;
		font-size: 15px;
		font-weight: 500;
		@apply tablesome-inline-flex tablesome-items-center tablesome-justify-between tablesome-text-white tablesome-ml-5 tablesome-px-4  tablesome-py-2 tablesome-my-3 tablesome-rounded tablesome-no-underline  hover:tablesome-bg-gray-600 tablesome-text-center focus:tablesome-bg-gray-700 focus:tablesome-shadow-lg focus:tablesome-outline-none focus:tablesome-ring-0;
	}

	.tablesome-onboarding__button span {
		@apply tablesome-mr-1;
	}

	.tablesome-onboarding__button--pro {
		@apply tablesome-bg-white hover:tablesome-bg-white focus:tablesome-bg-white tablesome-text-teal-500 tablesome-border-teal-500 tablesome-border-solid tablesome-border tablesome-font-medium;
	}

	.tablesome-onboarding__button--allTables {
		@apply tablesome-bg-white hover:tablesome-bg-white focus:tablesome-bg-white tablesome-border-gray-600 tablesome-text-gray-600 tablesome-border-solid tablesome-border tablesome-font-medium;
	}

	.tablesome-onboarding__button--support {
		@apply tablesome-bg-white hover:tablesome-bg-white focus:tablesome-bg-white  tablesome-text-gray-600 tablesome-font-semibold tablesome-underline;
	}

	.tablesome-onboarding__title--vidoelist {
		@apply tablesome-mb-2;
	}
</style> -->
