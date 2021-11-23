
<div class="page-footer">
        
</div>

</div>
<!-- END PAGE-WRAPPER -->

<script>
	var baseUrl = "{{ url('panel/') }}";
	var storageUrl = "{{ url('storage/') }}";
	// $.ajaxSetup({
	// 	headers: {
	// 		'X-CSRF-TOKEN': '{{ csrf_token() }}'
	// 	}
	// });
</script>
 
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('admin/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin/assets/global/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>


@stack('scripts')

</body>
</html>