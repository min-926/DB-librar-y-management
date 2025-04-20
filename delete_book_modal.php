<!-- Modal -->
<div id="delete_book<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <h3 id="myModalLabel">Delete Book</h3>
  </div>
  <div class="modal-body">
    <p>Are you sure you want to delete <strong><?php echo $row['book_title']; ?></strong>?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <a href="delete_book.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
  </div>
</div>
