@extends('layouts.default', ['sidebarSearch' => true])

@section('title', 'Session Setting')

@section('content')
	<!-- begin panel -->
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4 class="panel-title">Session Setting</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			</div>
		</div>
		<div class="panel-body">
			<div id="ref-session" style="height: 400px; width:100%;"></div>
		</div>
	</div>
	<!-- end panel -->
@endsection

@push('scripts')

<script>

var store = new DevExpress.data.CustomStore({
    key: "id",
    load: function() {
        return sendRequest(apiurl + "/ref-session");
    },
    insert: function(values) {
        return sendRequest(apiurl + "/ref-session", "POST", values);
    },
    update: function(key, values) {
        return sendRequest(apiurl + "/ref-session/"+key, "PUT", values);
    },
    remove: function(key) {
        return sendRequest(apiurl + "/ref-session/"+key, "DELETE");
    },
});

function moveEditColumnToLeft(dataGrid) {
    dataGrid.columnOption("command:edit", { 
        visibleIndex: -1,
        width: 80 
    });
}
// attribute
var dataGrid = $("#ref-session").dxDataGrid({    
    dataSource: store,
    allowColumnReordering: true,
    allowColumnResizing: true,
    columnsAutoWidth: true,
    // columnMinWidth: 80,
    wordWrapEnabled: true,
    showBorders: true,
    filterRow: { visible: false },
    filterPanel: { visible: false },
    headerFilter: { visible: true },
    editing: {
        useIcons:true,
        mode: "cell",
        allowAdding: true,
        allowUpdating: true,
        allowDeleting: false,
    },
    scrolling: {
        mode: "virtual"
    },
    columns: [
        { 
            dataField: "end_session",
            dataType: "datetime",
            caption: "Jam Masuk",
            format: 'shortTime',
            editorOptions: {
                type : 'time'
            }
        },
        { 
            dataField: "out_session",
            dataType: "datetime",
            caption: "Jam Pulang",
            format: 'shortTime',
            editorOptions: {
                type : 'time'
            }
        },
       
    ],
    export: {
        enabled: true,
        fileName: "referensi-session",
        excelFilterEnabled: true,
        allowExportSelectedData: true
    },
    onInitNewRow: function(e) {  

    } ,
    onContentReady: function(e){
        moveEditColumnToLeft(e.component);
    },
    onEditorPreparing: function(e) {

    },
    onToolbarPreparing: function(e) {
        dataGrid = e.component;

        e.toolbarOptions.items.unshift({						
            location: "after",
            widget: "dxButton",
            options: {
                hint: "Refresh Data",
                icon: "refresh",
                onClick: function() {
                    dataGrid.refresh();
                }
            }
        })
    },
}).dxDataGrid("instance");
</script>

@endpush