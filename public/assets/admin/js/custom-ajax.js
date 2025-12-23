document.addEventListener('DOMContentLoaded', function () {
    //Delete Event
    $('body').on('click', '.delete_event_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var inqury_id = $(this).data('inqury_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, this Inquiry record cannot be recovered!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                //Call ajax
                $.ajax({
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/admin/delete-inquiry',  
                    data: { 
                        inqury_id: inqury_id 
                    },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Inquiry deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });
});