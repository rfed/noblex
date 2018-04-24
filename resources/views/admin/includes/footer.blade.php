
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

@stack('scripts')

</body>
</html>