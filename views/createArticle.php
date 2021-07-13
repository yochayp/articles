<div class="modal fade" id="myModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?php $_PHP_SELF ?>" id="createForm" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create New Article </h5>
          <?php /*<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>*/ ?>
        </div>
        <div class="modal-body">


          <div class="mb-3">
            <label class="form-label">Article Title</label>
            <input type="text" name="title" class="form-control">
            <span class="invalid-feedback"><?php /*  @todo  */ echo $data['title_err']; ?> </span>
          </div>
          <div class="mb-3">
            <label class="form-label">Author Name</label>
            <input type="text" name="author" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Article Body</label>
            <textarea name="body" class="form-control" rows="8"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary btn-block pull-left" name="create" value="Create Article">

        </div>
      </div>
      <form>
  </div>
</div>
</div>
<script>


// this is the id of the form
$("#createForm").submit(function(e) {

e.preventDefault(); // avoid to execute the actual submit of the form.
console.log('inside sub');
var form = $(this);


$.ajax({
       type: "get",
       url: "",
       data: {
         data: form,
        route: 'create',
        }, // serializes the form's elements.
       success: function(data)
       {
           alert(data); // show response from the php script.
       }
     });


});
</script>