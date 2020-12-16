<script>
	$j(function(){
		var tn = 'bookings';

		/* data for selected record, or defaults if none is selected */
		var data = {
			id_number: <?php echo json_encode(array('id' => $rdata['id_number'], 'value' => $rdata['id_number'], 'text' => $jdata['id_number'])); ?>,
			fullname: <?php echo json_encode($jdata['fullname']); ?>,
			phone: <?php echo json_encode($jdata['phone']); ?>,
			amount: <?php echo json_encode($jdata['amount']); ?>,
			
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for id_number */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'id_number' && d.id == data.id_number.id)
				return { results: [ data.id_number ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for id_number autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'id_number' && d.id == data.id_number.id){
				$j('#fullname' + d[rnd]).html(data.fullname);
				$j('#phone' + d[rnd]).html(data.phone);
				return true;
			}

			return false;
		});

		/* saved value for bus */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'bus' && d.id == data.bus.id)
				return { results: [ data.bus ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for bus autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'bus' && d.id == data.bus.id){
				$j('#amount' + d[rnd]).html(data.amount);
				return true;
			}

			return false;
		});


		cache.start();
	});
</script>

