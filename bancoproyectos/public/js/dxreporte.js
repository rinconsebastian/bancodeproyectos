//*********************************** VARIABLES ******************************************

var dataGrid;



var showExport = true;
var showDNI = false;
var showValidation = false;
var loadValidation = false;
var code = "";
//*********************************** funcLE ******************************************

var funcLE = {


    instanceDataGrid: function () {
        dataGrid = $("#gridContainer").dxDataGrid({
            dataSource: source,
            selection: {
                mode: "none",
                showCheckBoxesMode: "always",
                selectAllMode: "allPages"
            },
            noDataText: "No hay datos disponibles.",
            export: {
                enabled: true,
                fileName: "Proyectos_" + moment().format("DD-MM-YYYY_hh-mm-ss"),
                allowExportSelectedData: false
            },
            onExporting: function (e) {
                e.component.beginUpdate();
                
                    e.component.columnOption("Opciones", "visible", false);
                
                
            },
            onExported: function (e) {
                
                    e.component.columnOption("Opciones", "visible", true);
                
                e.component.endUpdate();
            },

            stateStoring: {
                enabled: true,
                type: "localStorage",
                storageKey: "storage"
            },
            loadPanel: {
                enabled: true
            },

            paging: {
                pageSize: 50
            },

            scrolling: {
                mode: "virtual"
            },
            height: '72vh',
            width: '100%',
            columnFixing: {
                enabled: true
            },
            wordWrapEnabled: false,
            rowAlternationEnabled: false,
            columnHidingEnabled: true,
            showRowLines: true,
            grouping: {
                contextMenuEnabled: true,
                expandMode: "rowClick"
            },
            groupPanel: {
                emptyPanelText: "Haga clic derecho en una columna para agruparla",
                visible: true
            },
            pager: {
                showPageSizeSelector: true,
                allowedPageSizes: [10, 20, 50, 100, 1000]
            },
            columnChooser: {
                enabled: false
            },
            allowColumnReordering: false,
            allowColumnResizing: true,
            columnAutoWidth: false,
            showBorders: true,
            filterRow: {
                visible: true,
                applyFilter: "auto"
            },
            searchPanel: {
                visible: true,
                width: 160,
                placeholder: "Buscar..."
            },
            headerFilter: {
                visible: true
            },
            columns: [

                {
                    dataField: "id",
                    caption: "Id",
                    headerCellTemplate: function (header, info) {
                        $("<div>").html(info.column.caption.replace(/\r\n/g, "<br/>")).appendTo(header);
                    },
                    alignment: "center",
                    width: '50',
                    hidingPriority: 10
                },

                {
                    dataField: "name",
                    caption: "Nombre",
                    headerCellTemplate: function (header, info) {
                        $("<div>").html(info.column.caption.replace(/\r\n/g, "<br/>")).appendTo(header);
                    },
                    alignment: "left",
                    width: '220',
                    hidingPriority: 5
                },
                {
                    dataField: "fuente",
                    caption: "Fuente",
                    headerCellTemplate: function (header, info) {
                        $("<div>").html(info.column.caption.replace(/\r\n/g, "<br/>")).appendTo(header);
                    },
                    alignment: "left",
                    width: '180',
                    hidingPriority: 5
                },
                {
                    dataField: "fase",
                    caption: "Fase",
                    headerCellTemplate: function (header, info) {
                        $("<div>").html(info.column.caption.replace(/\r\n/g, "<br/>")).appendTo(header);
                    },
                    alignment: "left",
                    width: '120',
                    hidingPriority: 5
                },
                {
                    dataField: "sector",
                    caption: "Sector",
                    headerCellTemplate: function (header, info) {
                        $("<div>").html(info.column.caption.replace(/\r\n/g, "<br/>")).appendTo(header);
                    },
                    alignment: "left",
                    width: '120',
                    hidingPriority: 5
                },
                {
                    dataField: "tiempo",
                    caption: "Duración",
                    dataType: "number",
                    headerCellTemplate: function (header, info) {
                        $("<div>").html(info.column.caption.replace(/\r\n/g, "<br/>")).appendTo(header);
                    },
                    alignment: "left",
                    width: '120',
                    hidingPriority: 5
                },
              
                {
                    dataField: "valor",
                    caption: "Valor",
                    dataType: "number",
                    width: 150,
                    alignment: "right",
                    format: "currency",
                    editorOptions: {
                        format: "currency",
                        showClearButton: true
    
                    },
                    headerFilter: {
                        dataSource: [{
                            text: "$0",
                            value: ["valor", "<", 1]
                        }, {
                            text: "$1 - $1.000.000",
                                value: [["valor", ">=", 1], ["valor", "<", 1000000]]
                        }, {
    
                            text: "$1.000.000 - $10.000.000",
                                value: [["valor", ">=", 1000000], ["valor", "<", 10000000]]
                        },{
    
                            text: "$10.000.000 - $100.000.000",
                                value: [["valor", ">=", 10000000], ["valor", "<", 100000000]]
                        },{
    
                            text: "$100.000.000 - $1000.000.000",
                                value: [["valor", ">=", 100000000], ["valor", "<", 100000000]]
                        },  {
                            text: "Mas de  $1.000.000.000",
                                value: ["valor", ">=", 100000000]
                        }]
                    }
                },
                {
                    dataField: "estado",
                    caption: "Estado",
                    alignment: "left",
                    width: '120',
                    hidingPriority: 2
                },
               
                {
                    dataField: "updated_at",
                    caption: "Fecha",
                    alignment: "center",
                    width: '100',
                    hidingPriority: 9,
                    dataType: "date",
                    calculateFilterExpression: function (value, selectedFilterOperations, target) {
                        if (target === "headerFilter" && value === "weekends") {
                            return [[getOrderDay, "=", 0], "or", [getOrderDay, "=", 6]];
                        }
                        return this.defaultCalculateFilterExpression.apply(this, arguments);
                    }
                },

                
                {
                    
                    caption: "Opciones",
                    visible: true,
                    alignment: "center",
                    hidingPriority: 7,
                    width: '80',
                    cellTemplate: function (container, options) {

                        var idKobo = options.data.idKobo;
                        var val = options.data.validation;
                        var Id = options.data.id;
                        var status = options.data.formalizacionEstado;

                        
                        contenido = '<a href="' + '../../proyectos/' + Id + '" title="Detalles" class="btn btn-primary btn-xs ml-1 py-0 text-white" >ver</a>'
                            

                        $("<div class='preventSelection'>")
                            .append(contenido)
                            .appendTo(container);
                    }

                },
                
            ],
            summary: {
                totalItems: [{
                    column: "id",
                    summaryType: "count",
                    showInColumn: "name",
                    displayFormat: "Total: {0}",
                },
                {
                    column: "valor",
                    summaryType: "sum",
                    showInColumn: "valor",
                    valueFormat: "currency",
                    displayFormat: " {0}",
                }],

            },

            onToolbarPreparing: function (e) {
                var dataGrid = e.component;
                e.toolbarOptions.items.unshift(
                    {
                        location: "after",
                        widget: "dxButton",
                        options: {
                            icon: "refresh",
                            hint: "Actualizar",
                            onClick: function () {
                                dataGrid.refresh();
                            }
                        }
                    },
                    {
                        location: "after",
                        widget: "dxButton",
                        options: {
                            icon: "clearformat",
                            hint: "Borrar filtros",
                            onClick: function () {
                                dataGrid.state(null);
                            }
                        }
                    }
                );
            },
            onRowPrepared: function (e) {
                if (e.rowType === "data") {
                    if (e.data.status == "Pend.") {
                        e.rowElement.css('background-color', '#ffe6de');
                    } else if (e.data.status == "Si") {
                        e.rowElement.css('background-color', '#d7ffd1');
                    }
                }

            }
        }).dxDataGrid('instance');
    },


    init: function () {
        // Carga las variables de configuración.
        root = $('#Root').val();
        code = $('#code').val();

        showExport = $('#showExport').val() == 1;

        if (typeof myShowDni !== "undefined") {
            showDNI = myShowDni;
        }
        if (typeof myShowValidation !== "undefined") {
            showValidation = myShowValidation;
        }
        if (typeof myLoadValidation !== "undefined") {
            loadValidation = myLoadValidation;
        }
       
        
        

        funcLE.instanceDataGrid();
      
    }
};

//************************************** ON READY **********************************************
$(function () {

    DevExpress.localization.locale("es-US");
    funcLE.init();
});
