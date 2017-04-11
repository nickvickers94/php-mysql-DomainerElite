
<script type="text/javascript" src="plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plugins/dataTables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
				"use strict";
				
				$('#data-tables').dataTable({
				columnDefs: [{ targets: 'no-sort', orderable: false }],
				"order": [[ 2, "desc" ], [ 3, "desc" ]]
				});
		} );
</script>
