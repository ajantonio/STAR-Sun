class DataTableHelpers {
    dt_id = null;
    with_action = false;
    with_checkbox = false;
    with_header_search = false;
    not_searchable = [];

    constructor(dt_id) {
        this.dt_id = dt_id;

        return this;
    }

    withAction() {
        this.with_action = true;

        return this;
    }

    withCheckbox() {
        this.with_checkbox = true;
        return this;
    }

    addHeaderSearch() {
        let self = this;
        self.with_header_search = true;
        let dt_table = window.LaravelDataTables[self.dt_id];
        let header_count = dt_table.columns().header().length;

        $(`#${self.dt_id} thead`).append("<tr class='d-none d-md-table-row'></tr>");

        dt_table.columns().every(function (index) {
            if ($(`#${self.dt_id} thead tr:eq(0) th:eq(${index})`).is(':visible')) {
                $(`#${self.dt_id} thead tr:eq(1)`).append("<th></th>");
            }
        });

        $(`#${self.dt_id} thead tr:eq(1) th`).each(function (i) {
            let header = $(`#${self.dt_id} thead tr:eq(0) th:eq(${i})`);

            var title = $(header).text();

            if ($(header).is(':visible')) {

                if (!self.not_searchable.includes(i)) {
                    if (self.with_action) {
                        if (header_count == (i + 1)) {

                        } else {
                            if (self.with_checkbox && i === 0) {
                                return null;
                            }
                            $(this).html('<input type="text" class="dt-column-search form-control form-control-sm" placeholder="Search ' + title + '" />');
                            $('input', this).on('change', function () {
                                if (dt_table.column(i).search() !== this.value) {
                                    dt_table
                                        .column(i)
                                        .search(this.value)
                                        .draw();
                                }
                            });
                        }
                    } else {
                        $(this).html('<input type="text" class="dt-column-search form-control form-control-sm" placeholder="Search ' + title + '" />');
                        $('input', this).on('change', function () {
                            if (dt_table.column(i).search() !== this.value) {
                                dt_table
                                    .column(i)
                                    .search(this.value)
                                    .draw();
                            }
                        });
                    }
                }

            }
        });

        return this;
    }

    notSearchable(cols_index = []) {
        this.not_searchable = cols_index;
        return this;
    }
}