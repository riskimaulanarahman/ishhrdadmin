@extends('layouts.default', ['sidebarSearch' => true])

@section('title', 'Dashboard Admin')

@section('content')
	<!-- begin panel -->
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4 class="panel-title">Summary - Absensi</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="panel-body">
			<div id="popup"></div>
       	 	<div id="pivotgrid"></div>
		</div>
	</div>
	<!-- end panel -->
@endsection

@push('scripts')

<script>

	$.get(apiurl + '/getsummary', function(items) {
		let drillDownDataSource = {};

		const pivotGrid = $('#pivotgrid')
			.dxPivotGrid({
				allowSortingBySummary: true,
				allowFiltering: true,
				showBorders: true,
				showColumnGrandTotals: true,
				showRowGrandTotals: true,
				rowHeaderLayout: 'tree',
				showRowTotals: false,
				showColumnTotals: false,
				// onCellClick: function(e) {
				// 	if (e.area == 'data') {
				// 		const pivotGridDataSource = e.component.getDataSource();
				// 		const rowPathLength = e.cell.rowPath.length;
				// 		const rowPathName = e.cell.rowPath[rowPathLength - 1];
				// 		const popupTitle = `${rowPathName || 'Total'} : Drill Down Data`;

				// 		drillDownDataSource = pivotGridDataSource.d(e.cell);
				// 		popup.option('title', popupTitle);
				// 		popup.show();
				// 	}
				// },
				export: {
					enabled: true,
					fileName: 'DxExport'
				},
				onCellPrepared: function(e) {
					if (typeof e.cell.rowPath !== 'undefined') {
						e.cellElement.css('color', 'blue');
					}
				},
				fieldChooser: {
					enabled: true,
					height: 400
				},
				dataSource: {
					fields: [
						{
							width: 120,
							dataField: 'full_name',
							area: 'row',
							expanded: true
						},
						// {
						// 	width: 120,
						// 	dataField: 'nama_kelurahan',
						// 	area: 'row'
						// 	// expanded: true
						// },
						// {
						// 	width: 120,
						// 	dataField: 'nomor_rt',
						// 	area: 'row'
						// },
						// {
						// 	caption: 'City',
						// 	dataField: 'city',
						// 	width: 150,
						// 	area: 'row'
						// },
						{
							dataField: 'session_date',
							area: 'column',
							dataType: 'date',
							groupInterval: 'month',
							expanded: true
						},
						{
							dataField: 'stat',
							area: 'column',
						},
						{
							dataField: 'jml',
							area: 'data',
						},
						// {
						// 	dataField: 'session_date',
						// 	groupName: 'date',
						// 	groupInterval: 'month',
						// 	visible: false
						// },
						// {
						// 	dataField: 'present_on_time',
						// 	dataType: 'number',
						// 	summaryType: 'sum',
						// 	area: 'data'
						// }
					],
					store: items
				}
			})
			.dxPivotGrid('instance');

		// const popup = $('#popup')
		// 	.dxPopup({
		// 		width: 1200,
		// 		height: 700,
		// 		contentTemplate(contentElement) {
		// 			$('<div />')
		// 				.addClass('drill-down')
		// 				.dxDataGrid({
		// 					width: 1150,
		// 					height: 620,
		// 					scrolling: {
		// 						mode: 'virtual'
		// 					},
		// 					allowColumnReordering: true,
		// 					allowColumnResizing: true,
		// 					columnsAutoWidth: true,
		// 					columnMinWidth: 130,
		// 					columnHidingEnabled: false,
		// 					wordWrapEnabled: true,
		// 					showBorders: true,
		// 					rowAlternationEnabled: true,
		// 					filterRow: { visible: true },
		// 					// filterPanel: { visible: true },
		// 					headerFilter: { visible: true },
		// 					pager: {
		// 						visible: true,
		// 						showInfo: true
		// 					},
		// 					sorting: {
		// 						mode: 'multiple'
		// 					},
		// 					columns: [
		// 						{
		// 							dataField: 'nama_kecamatan',
		// 							sortOrder: 'asc'
		// 						},
		// 						{
		// 							dataField: 'nama_kelurahan',
		// 							sortOrder: 'asc'
		// 						},
		// 						{
		// 							dataField: 'nomor_rt',
		// 							sortOrder: 'asc'
		// 						},
		// 						{
		// 							dataField: 'id_bangunan'
		// 						}
		// 					],
		// 					export: {
		// 						enabled: true,
		// 						fileName: 'Detail Data'
		// 					}
		// 				})
		// 				.appendTo(contentElement);
		// 		},
		// 		onShowing() {
		// 			$('.drill-down').dxDataGrid('instance').option('dataSource', drillDownDataSource);
		// 		},
		// 		onShown() {
		// 			$('.drill-down').dxDataGrid('instance').updateDimensions();
		// 		}
		// 	})
		// .dxPopup('instance');

		// pivotGrid.bindChart(pivotGridChart, {
		// 	dataFieldsDisplayMode: 'splitPanes',
		// 	alternateDataFields: false
		// });

		// function expand() {
		// 	const dataSource = pivotGrid.getDataSource();
		// 	dataSource.expandHeaderItem('row', [ 'North America' ]);
		// 	dataSource.expandHeaderItem('column', [ 2013 ]);
		// }

		// setTimeout(expand, 0);
	});

</script>

@endpush