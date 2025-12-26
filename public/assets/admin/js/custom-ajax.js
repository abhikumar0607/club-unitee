document.addEventListener('DOMContentLoaded', function () {
    //Delete Event
    $('body').on('click', '.delete_event_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var event_id = $(this).data('event_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, this event record cannot be recovered!",
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
                    url: base_url+'/admin/events/destroy',  
                    data: { 
                        event_id: event_id 
                    },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Event deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });

    //Delete Category
    $('body').on('click', '.delete_category_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var category_id = $(this).data('category_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, this category record cannot be recovered!",
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
                    url: base_url+'/admin/categories/destroy',  
                    data: { 
                        category_id: category_id 
                    },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Category deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });

    //Delete Blog
    $('body').on('click', '.delete_blog_record', function(event) {
        event.preventDefault();
        //Get data attribute
        var blog_id = $(this).data('blog_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, this blog record cannot be recovered!",
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
                    url: base_url+'/admin/blogs/destroy',  
                    data: { 
                        blog_id: blog_id 
                    },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Blog deleted successfully.",
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