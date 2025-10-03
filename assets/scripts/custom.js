jQuery(function($) {
  $('.wp-block-kadence-column.kadence-swiper-template.swiper').each(function() {
	// Grab the direct child <div> (assuming that's the wrapper container)
	$(this).children('div').first().addClass('swiper-wrapper');
  });
});


jQuery(function($){
  console.log('custom ready');
  console.log(Swiper.version);
	
  // Swiper v8 — single instance, same markup you already have
	new Swiper('.kadence-swiper-template.swiper', {
	  direction: 'horizontal',
	  slidesPerView: 1,
	  spaceBetween: 20,
	  autoHeight: true,
	  loop: false,
	  navigation: {
		nextEl: '.mywork.swiper-button-next',
		prevEl: '.mywork.swiper-button-prev'
	  },
	  breakpoints: {
		  540: {
			  slidesPerView: 2,
		  }, 
		  1024: {
			slidesPerView: 3,  
		  },
		  
	  }
	});
  
  
});

