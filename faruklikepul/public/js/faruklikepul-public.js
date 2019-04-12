jQuery(document).ready(function() {
  jQuery("#faruklikepul-tags-table").DataTable({
    order: [[1, "desc"]],
    searching: false,
    destroy: true,
    bLengthChange: false,
    bFilter: true,
    bInfo: false
  });
}); //end
