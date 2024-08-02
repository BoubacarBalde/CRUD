<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- add new post model end -->
    <div class="modal fade" id="add_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data" id="add_post_form" novalidate>
                    <div class="modal-body p-2">
                        <div class="mb-3">
                            <label>Post Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" required>
                            <div class="invalid-feedback">Post title is required!</div>
                        </div>
                        <div class="mb-3">
                            <label>Post Category</label>
                            <input type="text" name="category" class="form-control" placeholder="Category" required>
                            <div class="invalid-feedback">Post cathegory is required</div>
                        </div>
                        <div class="mb-3">
                            <label>Post Body</label>
                            <textarea name="body" class="form-control" rows="4" placeholder="Body" required></textarea>
                            <div class="invalid-feedback">Post body is required</div>
                        </div>
                        <div class="mb-3">
                            <label>Post Image</label>
                            <input type="file" name="file" id="image" class="form-control" required>
                            <div class="invalid-feedback">Post image is required</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="add_post_btn">Add Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- add new post model end -->

     <!-- edit post model start -->
     <div class="modal fade" id="edit_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data" id="edit_post_form" novalidate>
                    <input type="hidden" name="id" id="pid">
                    <input type="hidden" name="old_image" id="old_image">
                    <div class="modal-body p-2">
                        <div class="mb-3">
                            <label>Post Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
                            <div class="invalid-feedback">Post title is required!</div>
                        </div>
                        <div class="mb-3">
                            <label>Post Category</label>
                            <input type="text" name="category" id="category" class="form-control" placeholder="Category" required>
                            <div class="invalid-feedback">Post cathegory is required</div>
                        </div>
                        <div class="mb-3">
                            <label>Post Body</label>
                            <textarea name="body" class="form-control" id="body" rows="4" placeholder="Body" required></textarea>
                            <div class="invalid-feedback">Post body is required</div>
                        </div>
                        <div class="mb-3">
                            <label>Post Image</label>
                            <input type="file" name="file" class="form-control">
                            <div class="invalid-feedback">Post image is required</div>
                            <div id="post_image"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="edit_post_btn">Update Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit post model end -->

    <!-- detail post model start -->
    <div class="modal fade" id="detail_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
          
                <div class="modal-body">
                    <img src="" id="detail_post_image" class="img-fluid" alt="">
                    <h3 id="detail_post_title" class="mt-3"></h3>
                    <h5 id="detail_post_category"></h5>
                    <p id="detail_post_body"></p>
                    <p id="detail_post_created" class="fst-italic"></p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- detail post model end -->

    <div class="container">
        <div class="row my-4">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="text-secondary fw-bold fs-3">All Posts</div>
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#add_post_modal">Add New Post</button>
                    </div>
                    <div class="card-body">
                        <div class="row" id="show_posts">
                            <h1 class="text-center text-secondary my-5">Posts Loading</h1>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function(){
            //add post
            $("#add_post_form").submit(function(e){
                e.preventDefault();
                const formData = new FormData(this);
                if(!this.checkValidity()){
                    e.preventDefault();
                    $(this).addClass('was-validated')
                }else{
                    $("#add_post_btn").text("Adding...");
                    const url = '<?= base_url('post/add')?>';
                    console.log('URL:', url);
                    console.log([...formData.entries()]);
                    $.ajax({
                        url: url,
                        method: 'post',
                        data: formData,
                        contentType: false,
                        cache:false,
                        processData: false,
                        dataType: 'json', 
                        success: function(response){
                            console.log('Response:', response);
                            if(response.error){
                              $("#image").addClass('is-invalid'); 
                              $("#image").next().text(response.message); 
                            }else{
                               $("#add_post_modal").modal('hide');
                               $("#add_post_form")[0].reset();
                               $("#image").removeClass('is-invalid'); 
                               $("#image").next().text('');
                               $("#add_post_form").removeClass('was-validated')
                               Swal.fire(
                                 'Added',
                                 response.message,
                                 'success'
                               );
                               fetchAllPosts();
                            }
                            $("#add_post_btn").text('Add Post');
                        },
                    });
                };
            });
        });

        //edit post ajax request
        $(document).delegate('.post_edit_btn','click',function(e){
            e.preventDefault();
            const id = $(this).attr('id');
            $.ajax({
                url:'<?= base_url('post/edit/')?>/' + id,
                method:'get', 
                success: function (response) {
                    $("#pid").val(response.message.id);
                    $("#old_image").val(response.message.image);
                    $("#title").val(response.message.title);
                    $("#category").val(response.message.category);
                    $("#body").val(response.message.body);
                    $("#post_image").html('<img src="<?= base_url('uploads/avatar/') ?>/' + response.message.image + '" class="img-fluid mt-2 img-thumbnail" width="150">')
                }
            });
        });

        //update post
        $("#edit_post_form").submit(function(e){
            e.preventDefault();
            const formData = new FormData(this);
            if(!this.checkValidity()){
                e.preventDefault();
                $(this).addClass('was-validated')
            }else{
                $("#edit_post_btn").text("Updating...");
                const url = `<?= base_url('post/update')?>`;
                console.log('URL:', url);
                console.log([...formData.entries()]);
                $.ajax({
                    url: url,
                    method: 'post',
                    data: formData,
                    contentType: false,
                    cache:false,
                    processData: false,
                    dataType: 'json', 
                    success: function(response){
                        $("#edit_post_modal").modal('hide');
                        $("#edit_post_form")[0].reset();
                        $("#image").removeClass('is-invalid'); 
                        $("#image").next().text('');
                        Swal.fire(
                            'Apdaded',
                            response.message,
                            'success'
                        );
                        fetchAllPosts();
                        $("#edit_post_btn").text('Udate post');
                    },
                });
            };
        });

        // Detail Post
        $(document).delegate('.post_detail_btn', 'click', function(e){
            e.preventDefault();
            const id = $(this).attr('id'); // Changement de $this à $(this)
            $.ajax({
                url:'<?= base_url('post/detail/')?>/' + id,
                method:'get', 
                dataType:'json',
                success: function (response) {
                $("#detail_post_image").attr('src','<?= base_url('uploads/avatar/') ?>/' + response.message.image);
                $("#detail_post_title").text(response.message.title);
                $("#detail_post_category").text(response.message.category);
                $("#detail_post_body").text(response.message.body);
                $("#detail_post_created").text(response.message.created_at);
                }
            });
        });


        // Delete Post
        $(document).delegate('.post_delete_btn', 'click', function(e){
            e.preventDefault();
            const id = $(this).attr('id');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('post/delete/')?>/' + id,
                        method: "get",
                        success: function (response) {
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );  
                            fetchAllPosts();  
                        }      
                    });
                }
            });
        });


        //fetch all post ajax request
        fetchAllPosts();
        function fetchAllPosts()
        {
           $.ajax({
              url:'<?= base_url('post/fetch') ?>',
              method:'get',
              contentType: false,
              cache:false,
              processData: false,
              success:function(response){
                $("#show_posts").html(response.message);
              }
           });
        }
    </script>
</body>
</html>
 