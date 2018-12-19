<table class="highlight">
        <thead>
          <tr>
              <th>ID</th>
              <th>title</th>
              <th>category</th>
              <th>contact_email</th>
              <th>Edit</th>
              <th>Preview</th>
              <th>Publish</th>
          </tr>
        </thead>

        <tbody>
            <?php foreach($postings as $posting) {
            if($posting->status == 0) { ?>
          <tr>
            <td><?=$posting->id?></td>
            <td><?=$posting->title?></td>
            <td><?=$posting->category?></td>
            <td><?=$posting->contact_email?></td>
            <td>
                <form method="post" action="<?php echo site_url('admin/AdminAllPostingsController/addPosting/'.$posting->id); ?>">
                    <button id="submit-buttons" type="submit" class="waves-effect waves-light btn green accent-3" ​​​​​><i class="material-icons">edit</i></button>
                </form>
            </td>
            <td>
                <form method="post" action="<?php echo site_url('admin/AdminAllPostingsController/previewPosting/'.$posting->id); ?>">
                    <button id="submit-buttons" type="submit" class="waves-effect waves-light btn green accent-3" ​​​​​><i class="material-icons">photo</i></button>
                </form>
            </td>
            <td>
                <form method="post" action="<?php echo site_url('admin/AdminAllPostingsController/publishPosting/'.$posting->id); ?>">
                    <button id="submit-buttons" type="submit" class="waves-effect waves-light btn orange accent-3"><i class="material-icons">publish</i></button>
                </form>
            </td>
          </tr>
            <?php }} ?>
        </tbody>
</table>