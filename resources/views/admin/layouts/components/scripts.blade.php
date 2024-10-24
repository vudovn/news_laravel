	<!-- Libs JS -->
	<script src="/admin_asset/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="/admin_asset/libs/simplebar/dist/simplebar.min.js"></script>

	<!-- Theme JS -->
	<script src="/admin_asset/js/theme.min.js"></script>
	<script src="/admin_asset/js/statusUser.js"></script>
	<script src="/admin_asset/js/checkPermission.js"></script>

	{{-- <script src="/admin_asset/libs/apexcharts/dist/apexcharts.min.js"></script>
	<script src="/admin_asset/js/vendors/chart.js"></script> --}}
	<script src="/admin_asset/libs/datatable/dist/2.0.8/js/dataTables.js"></script>
	<script src="/admin_asset/libs/datatable/dist/2.0.8/js/dataTables.bootstrap5.js"></script>

	{{-- tagify --}}
	<script src="https://codescandy.com/geeks-bootstrap-5/assets/libs/@yaireo/tagify/dist/tagify.min.js"></script>

	{{-- ckeditor + ckfinder --}}
	<script src="/admin_asset/plugins/ckeditor/ckeditor.js"></script>
	<script src="/admin_asset/plugins/ckfinder_2/ckfinder.js"></script>
	<script src="/admin_asset/library/finder.js"></script>

	<script>
		const BASE_URL = "{{ env('BASE_URL') }}";
	</script>

	<script>
		// datatable
		new DataTable('#dataTable');

		// tagify
		var tagify_vd = document.querySelector('.tagify_vd');
		new Tagify(tagify_vd);
		
		// select2
		$(".select2_vd").select2({
  			maximumSelectionLength: 4,
			  placeholder: 'Chọn các danh mục',
			  allowClear: true
		});

	</script>

	@stack('scripts')
	