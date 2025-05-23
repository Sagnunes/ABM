//== Class definition

var DatatableHtmlTableDemo = function() {
	//== Private functions

	// demo initializer
	var demo = function() {


		var datatable = $('.m-datatable').mDatatable({
			data: {
				saveState: {cookie: false},
				columnsDefs:[{targets:1,type:'natural'}]
			},
			search: {
				input: $('#generalSearch'),
			},
			columns: [
				{
					field: 'Caixa',
					type: 'string',
				},
				{
					field: 'Order Date',
					type: 'date',
					format: 'YYYY-MM-DD',
				}, {
					field: 'Status',
					title: 'Status',
					// callback function support for column rendering
					template: function(row) {
						var status = {
							1: {'title': 'Pending', 'class': 'm-badge--brand'},
							2: {'title': 'Delivered', 'class': ' m-badge--metal'},
							3: {'title': 'Canceled', 'class': ' m-badge--primary'},
							4: {'title': 'Success', 'class': ' m-badge--success'},
							5: {'title': 'Info', 'class': ' m-badge--info'},
							6: {'title': 'Danger', 'class': ' m-badge--danger'},
							7: {'title': 'Warning', 'class': ' m-badge--warning'},
						};
						return '<span class="m-badge ' + status[row.Status].class + ' m-badge--wide">' + status[row.Status].title + '</span>';
					},
				}, {
					field: 'Type',
					title: 'Type',
					// callback function support for column rendering
					template: function(row) {
						var status = {
							1: {'title': 'Online', 'state': 'danger'},
							2: {'title': 'Retail', 'state': 'primary'},
							3: {'title': 'Direct', 'state': 'accent'},
                            44:{'title':'Alfonso Orn V'}
						};
						return '<span class="m-badge m-badge--' + status[row.Type].state + ' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-' +
							status[row.Type].state + '">' +
							status[row.Type].title + '</span>';
					},
				},{
				field: 'Paroquia',
				title:'Paroquia',
					template:function (row) {
						let paroquia = {
							44:{'title':'Alfonso Orn V'}
						};
                        return '<span class="m-badge ' + paroquia[row.Paroquia].class + ' m-badge--wide">' + paroquia[row.Paroquia].title + '</span>';
                    }
				}
			],
		});

		$('#m_form_status').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'Status');
		});

		$('#m_form_type').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'Type');
		});

		$('#m_form_status, #m_form_type').selectpicker();

	};

	return {
		//== Public functions
		init: function() {
			// init dmeo
			demo();
		},
	};
}();

jQuery(document).ready(function() {
	DatatableHtmlTableDemo.init();
});