(function(document,window,$){
	'use strict';

	$(document).ready(function(){
		menu_height_margin();

	});

	$(window).on('resize', function(){
		menu_height_margin();
	});

	(function(){
		$('.menu-filter li').click(function() {
			$('.menu-filter li').removeClass('active');
			$(this).addClass('active');
		});
	})();
	

	function menu_height_margin(){
		var height = $('.navbar').height();
  		var footer_height = $('.footer-page').height();
  		$('#main-content').css({ 
		    'margin-top': ( height + 16 ) + 'px'
		  });
	}

	(function(){
		$('.project').on('click', function(e){
			e.defaultPrevented;
			var a_href = $(this).children('a').data('href');
			var id_articulo = $(this).attr('id');
			var id_particle = $('#'+id_articulo+' .particles-js').attr('id');
			
			$('#'+id_articulo).addClass('active');
			$('#'+id_particle).css('display', 'block');


			particlesJS(id_particle,
			    {
			      "particles": {
			        "number": {
			          "value": 80,
			          "density": {
			            "enable": true,
			            "value_area": 150
			          }
			        },
			        "color": {
			          "value": "#fff"
			        },
			        "shape": {
			          "type": "circle",
			          "stroke": {
			            "width": 0,
			            "color": "#000000"
			          },
			          "polygon": {
			            "nb_sides": 5
			          },
			          "image": {
			            "src": "img/github.svg",
			            "width": 100,
			            "height": 100
			          }
			        },
			        "opacity": {
			          "value": 0.5,
			          "random": false,
			          "anim": {
			            "enable": false,
			            "speed": 6,
			            "opacity_min": 0.1,
			            "sync": false
			          }
			        },
			        "size": {
			          "value": 6,
			          "random": true,
			          "anim": {
			            "enable": false,
			            "speed": 40,
			            "size_min": 0.1,
			            "sync": false
			          }
			        },
			        "line_linked": {
			          "enable": true,
			          "distance": 150,
			          "color": "#fff",
			          "opacity": 0.4,
			          "width": 1
			        },
			        "move": {
			          "enable": true,
			          "speed": 4,
			          "direction": "none",
			          "random": false,
			          "straight": false,
			          "out_mode": "out",
			          "attract": {
			            "enable": true,
			            "rotateX": 500,
			            "rotateY": 500
			          }
			        }
			      },
			      "interactivity": {
			        "detect_on": "canvas",
			        "events": {
			          "onhover": {
			            "enable": false,
			            "mode": "grab"
			          },
			          "onclick": {
			            "enable": false,
			            "mode": "push"
			          },
			          "resize": true
			        },
			        "modes": {
			          "grab": {
			            "distance": 400,
			            "line_linked": {
			              "opacity": 1
			            }
			          },
			          "bubble": {
			            "distance": 400,
			            "size": 40,
			            "duration": 2,
			            "opacity": 8,
			            "speed": 3
			          },
			          "repulse": {
			            "distance": 200
			          },
			          "push": {
			            "particles_nb": 4
			          },
			          "remove": {
			            "particles_nb": 2
			          }
			        }
			      },
			      "retina_detect": true,
			      "config_demo": {
			        "hide_card": false,
			        "background_color": "#b61924",
			        "background_image": "",
			        "background_position": "50% 50%",
			        "background_repeat": "no-repeat",
			        "background_size": "cover"
			      }
			    }
			);

			setTimeout(function(){
			    window.location.href = a_href;
			 },1000);
		});
	})();


})(document,window,jQuery);
