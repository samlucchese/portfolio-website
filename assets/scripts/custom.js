jQuery(function($) {
  $('.wp-block-kadence-column.kadence-swiper-template.swiper').each(function() {
	// Grab the direct child <div> (assuming that's the wrapper container)
	$(this).children('div').first().addClass('swiper-wrapper');
  });
});


jQuery(function($){
  console.log('custom ready');
  
  const swiper2 = new Swiper('.test-swiper', {
	  // Optional parameters
	  direction: 'horizontal',
	  loop: false,
	
	  // If we need pagination
	  pagination: {
		el: '.swiper-pagination',
	  },
	
	  // Navigation arrows
	  navigation: {
		nextEl: ' .test-swiper .swiper-button-next',
		prevEl: ' .test-swiper .swiper-button-prev',
	  },
	
	  // And if we need scrollbar
	  scrollbar: {
		el: '.swiper-scrollbar',
	  },
	});
	
  // Swiper v8 — single instance, same markup you already have
  jQuery(function () {
	new Swiper('.kadence-swiper-template.swiper', {
	  loop: false,
	  direction: 'horizontal',
	  slidesPerView: 'auto',
	  navigation: {
		nextEl: '.mywork.swiper-button-next',
		prevEl: '.mywork.swiper-button-prev'
	  },
	  autoHeight: true,
	  centeredSlides: true,
	  watchOverflow: false
	});
  });
  
  
});

