$(document).ready(function() {
    /**
     * Clear filter input
     */
    $('#clear-filter').on('click', function () {
        $('#filter-input').val('');
        $('#filter-form').submit();
    });
});
