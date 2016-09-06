var TableDatatablesAjax = function() {
    var datatableAjax = function(){
        dt = $('#datatable_ajax');
        ajax_datatable = dt.DataTable({
            "processing": true,
            "serverSide": true,
            "searching" : false,
            "ajax": {
                'url' : '/admin/article',
                "data": function ( d ) {
                    d.title = $('.filter input[name="title"]').val();
                    d.desc = $('.filter input[name="desc"]').val();
                    d.author = $('.filter input[name="author"]').val();
                    d.from = $('.filter input[name="from"]').val();
                    d.created_at_from = $('.filter input[name="created_at_from"]').val();
                    d.created_at_to = $('.filter input[name="created_at_to"]').val();
                    d.updated_at_from = $('.filter input[name="updated_at_from"]').val();
                    d.updated_at_to = $('.filter input[name="updated_at_to"]').val();
                }
            },
            "pagingType": "bootstrap_full_number",
            "order" : [],
            "orderCellsTop": true,
            "dom" : "<'row'<'col-sm-3'l><'col-sm-6'<'customtoolbar'>><'col-sm-3'f>>" +"<'row'<'col-sm-12'tr>>" +"<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "columns": [
                {
                    "data": "id",
                    "name" : "id",
                },
                {
                    "data": "title",
                    "name" : "title",
                    "orderable" : false,
                },
                {
                    "data": "desc",
                    "name": "desc",
                    "orderable" : false,
                },
                {
                    "data": "author",
                    "name": "author",
                    "orderable" : false,

                },
                {
                    "data": "from",
                    "name": "from",
                    "orderable" : false,

                },

                {
                    "data": "created_at",
                    "name": "created_at",
                    "orderable" : true,
                },
                {
                    "data": "updated_at",
                    "name": "updated_at",
                    "orderable" : true,
                },
                {
                    "data": "actionButton",
                    "name": "actionButton",
                    "type": "html",
                    "orderable" : false,
                },

            ],
            "drawCallback": function( settings ) {
                ajax_datatable.$('.tooltips').tooltip( {
                    placement : 'top',
                    html : true
                });
            },
            "language": {
                url: '/admin/i18n'
            }
        });

        dt.on('click', '.filter-submit', function(){
            ajax_datatable.ajax.reload();
        });

        dt.on('click', '.filter-cancel', function(){
            $('textarea.form-filter, select.form-filter, input.form-filter', dt).each(function() {
                $(this).val("");
            });

            $('select.form-filter').selectpicker('refresh');

            $('input.form-filter[type="checkbox"]', dt).each(function() {
                $(this).attr("checked", false);
            });
            ajax_datatable.ajax.reload();
        });

        $('.input-group.date').datepicker({
            autoclose: true
        });
        $(".bs-select").selectpicker({
            iconBase: "fa",
            tickIcon: "fa-check"
        });
    };

    return {
        init : datatableAjax
    }
}();