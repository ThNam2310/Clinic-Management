$(window).on("load", function () {
    // Khởi tạo Footable cho bảng row-toggler
    $("#demo-foo-row-toggler").footable();

    // Khởi tạo Footable dạng accordion
    $("#demo-foo-accordion").footable().on("footable_row_expanded", function (e) {
        // Ẩn các dòng chi tiết khác khi một dòng được mở rộng
        $("#demo-foo-accordion tbody tr.footable-detail-show")
            .not(e.row)
            .each(function () {
                $("#demo-foo-accordion").data("footable").toggleDetail(this);
            });
    });

    // Khởi tạo Footable có phân trang
    $("#demo-foo-pagination").footable();

    // Thay đổi số lượng bản ghi hiển thị
    $("#demo-show-entries").change(function (e) {
        e.preventDefault();
        var pageSize = $(this).val();
        $("#demo-foo-pagination").data("page-size", pageSize);
        $("#demo-foo-pagination").trigger("footable_initialized");
    });

    // Lọc dữ liệu theo trạng thái
    var $filterTable = $("#demo-foo-filtering");
    $filterTable.footable().on("footable_filtering", function (e) {
        var status = $("#demo-foo-filter-status").find(":selected").val();
        e.filter += (e.filter && e.filter.length > 0) ? " " + status : status;
        e.clear = !e.filter;
    });

    // Khi thay đổi filter-status, cập nhật bảng
    $("#demo-foo-filter-status").change(function (e) {
        e.preventDefault();
        $filterTable.trigger("footable_filter", { filter: $(this).val() });
    });

    // Tìm kiếm trực tiếp khi gõ vào ô tìm kiếm
    $("#demo-foo-search").on("input", function (e) {
        e.preventDefault();
        $filterTable.trigger("footable_filter", { filter: $(this).val() });
    });

    // Bảng có thể thêm/xóa dòng
    var $addRowTable = $("#demo-foo-addrow");
    $addRowTable.footable().on("click", ".demo-delete-row", function () {
        var footable = $addRowTable.data("footable");
        var row = $(this).parents("tr:first");
        footable.removeRow(row);
    });

    // Tìm kiếm trong bảng thêm dòng
    $("#demo-input-search2").on("input", function (e) {
        e.preventDefault();
        $addRowTable.trigger("footable_filter", { filter: $(this).val() });
    });

    // Nút thêm dòng mới
    $("#demo-btn-addrow").click(function () {
        $addRowTable.data("footable").appendRow(`
            <tr>
                <td style="text-align: center;">
                    <button class="demo-delete-row btn btn-danger btn-xs btn-icon">
                        <i class="fa fa-times"></i>
                    </button>
                </td>
                <td>Adam</td>
                <td>Doe</td>
                <td>Traffic Court Referee</td>
                <td>22 Jun 1972</td>
                <td>
                    <span class="badge label-table badge-success">Active</span>
                </td>
            </tr>
        `);
    });
});