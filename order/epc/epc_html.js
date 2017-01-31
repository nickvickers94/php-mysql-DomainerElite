$(document).ready(function() {

	var epc_path = $("script[src$='epc_html.js']").attr('src');

	epc_path = epc_path.replace('/epc_html.js', '');

	

	var epc_lightbox = '\

		<div id="epc_lightbox" style="z-index: 999; background:transparent url('+epc_path+'/epc_bg.png);">\

			<div>\

				<div id="epc_top" style="background:transparent url('+epc_path+'/epc_top.png) no-repeat;">\

					<div id="epc_exit_btn" style="background: transparent url('+epc_path+'/epc_exit_btn.png) no-repeat;"></div>\

				</div>\

				<div id="epc_mid" style="background:transparent url('+epc_path+'/epc_mid.png) repeat-y;">\

					<div id="epc_message">'+epc_message_html+'</div>\

				</div>\

				<div id="epc_bot" style="background:transparent url('+epc_path+'/epc_bot.png) no-repeat; text-align: center">\

					<img id="epc_continue" src="'+epc_path+'/epc_continue.png" alt="click to continue" />\

				</div>\

			</div>\

		</div>\

	';



	var epc_exit_trig = '<div id="epc_trig" style="position: fixed; z-index: 999; top: 0; left: 0; height: 1px; width: 1px;"></div>';





	function show_epc() {

		$('#epc_lightbox').fadeIn('fast');

		epc_disable = true;

	}

	function hide_epc() {

		$('#epc_lightbox').fadeOut('slow');

	}

	

	$('body').prepend(epc_lightbox);

	$('body').prepend(epc_exit_trig);

	

	$('#epc_lightbox img').mouseover(function() {

		$('#epc_lightbox img').css('cursor', 'pointer');

	});	

	$('#epc_exit_btn').mouseover(function() {

		$('#epc_exit_btn').css('cursor', 'pointer');

	});		

	$('#epc_continue').click(function() {

		eval(epc_continue);

	});

	$('#epc_lightbox').click(function() {

		hide_epc();

	});	

	$('#epc_exit_btn').click(function() {

		hide_epc();

	});



	

	var rel_mouse_y = 0;

	var y_points = [6,3,9,2,8];

	var y_laps = [0, 0];

	var t_laps = 0;

	

	function sort_num(a, b) {

		return a - b;

	}



	//Collect mouse points and when the mouse gets neer the top of the page, check to see if the numbers are descending.  If they are, then we know the user is about to exit the page.

	var trig_check = false;

	$(document).mousemove(function(e){

		if(!trig_check && !epc_disable) {

			var trig_y = $('#epc_trig').offset().top;

			rel_mouse_y = e.pageY - trig_y;

			y_points.unshift(rel_mouse_y);

			y_points.pop();

			//get time between mousemove events

			y_laps.unshift(new Date().getTime());

			y_laps.pop();

			t_laps = y_laps[0] - y_laps[1];

			//alert(t_laps)

			if(rel_mouse_y < 20 && t_laps < 500) {

				y_points_str = y_points.toString();

				y_points_sort = y_points.sort(sort_num);

				if(y_points_str == y_points_sort) {

					trig_check = true;

					show_epc();

				}

			}

		}

	}); 



});



