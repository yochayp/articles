<table class=" container table">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th class="">Author</th>
            <th>Date Created</th>
            <th></th>
        </tr>
    </thead>
    <?php foreach ($data['articles'] as $article) { ?>
        <tr>
            <td><?php echo $article->id ?></td>
            <td><?php echo $article->title ?></td>
            <td><?php echo $article->author ?></td>
            <td><?php echo $article->date_created ?></td>
            <td>
                <form action="<?php $_PHP_SELF ?>" method="post">
                    <button class="btn" name="delete" value="<?php echo $article->id ?>">
                        <i class='fas fa-trash-alt' style='font-size:20px'></i>
                    </button>
                    <button type="button" class="btn" data-toggle="modal" data-target="#updateModal">
                        <i class='fas fa-pencil-alt' style='font-size:20px'></i>
                    </button>
                    <button type="button" class="btn" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-eye" style="font-size:20px"></i>
                    </button>
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="<?php $_PHP_SELF ?>" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Article</h5>
                                    
                                    </div>
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label class="form-label">Article Title</label>
                                            <input type="text" name="title" class="form-control" value="<?php echo $article->title?>">
                                            <span class="invalid-feedback"><?php /*  @todo  */ echo $data['title_err']; ?> </span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Author Name</label>
                                            <input type="text" name="author" class="form-control" value="<?php echo $article->author?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Article Body</label>
                                            <input type="text" name="body" class="form-control" rows="8"  value="<?php echo $article->body?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary btn-block pull-left" name="update" value="<?php echo $article->id?>">

                                    </div>
                                </div>
                        </div>
                    </div>
                    </div>
                </form>
            </td>
        </tr>
    <?php }; ?>
</table>