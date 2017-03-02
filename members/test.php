<html lang="en">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
	var start;
		var received = 0;
		var posted = 0;
		$(document).ready(function() {
			start = performance.now();
			var json_domains = '["BATTERYDEAD.COM","FOODESCORT.COM","DEATHLABEL.COM"]';

			var arr_domains = JSON.parse(json_domains);
			posted = arr_domains.length;
			for (var i = 0; i < arr_domains.length; i++) {
				var domain = arr_domains[i];
				isAvailable(domain, function (result) {
					console.log(result);
				});
			}

		});
		
		function isAvailable(domain, callback) {
					
			var settings = {
				"async": true,
				"crossDomain": true,
				"url": "https://whois-v0.p.mashape.com/check?domain=" + domain,
				"method": "GET",
				"error": function() { received++; console.log(received); if (received==posted) {var end = performance.now(); alert(end-start);}},
				"headers": {
					"x-mashape-key": "FP0SwkUGKqmsh2dN4CJ8fekaI1mXp1AdNzvjsnjwl8Esoq9Dor",
					"accept": "application/json",
					"cache-control": "no-cache",
					"postman-token": "b62f8b24-ef91-96c6-8a5f-566e6efd5e86"
				}
			}

			$.ajax(settings).done(function (response) {
				received ++;
				if (response.available) {
					callback(domain + " is available");
				}
				if (received==posted) {var end = performance.now(); alert(end-start);}
				console.log(received);
			});
		}
	</script>
	</head>
	<body>
	</body>
</html>