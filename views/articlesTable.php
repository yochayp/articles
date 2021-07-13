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
                <form id="tableForm" action="<?php $_PHP_SELF ?>" >
                    <button class="btn" name="delete" value="<?php echo $article->id ?>">
                        <i class='fas fa-trash-alt' style='font-size:20px'></i>
                    </button>
                    <button type="button" class="btn" >
                        <i class='fas fa-pencil-alt' style='font-size:20px'></i>
                    </button>
                    <button type="button" class="btn" >
                        <i class="fa fa-eye" style="font-size:20px"></i>
                    </button>
                    
                    </div>
                </form>
            </td>
        </tr>
    <?php }; ?>
</table>