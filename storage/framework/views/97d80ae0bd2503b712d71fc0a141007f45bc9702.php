<div class="tile">
    <table class="table table-hover custom-data-table-style table-striped table-col-width" id="sampleTable">
        <tbody>
            <tr>
                <td>Author</td>
                <td><?php echo e($targetproduct->author); ?></td>
            </tr>
            <tr>
                <td>Binding </td>
                <td><?php echo e(empty($targetproduct->binding)? null:$targetproduct->binding); ?></td>
            </tr>
            <tr>
                <td>Pages</td>
                <td><?php echo e(empty($targetproduct->pages)? null:$targetproduct->pages); ?></td>
            </tr>
            <tr>
                <td>Language</td>
                <td><?php echo e(empty($targetproduct->language)? null:($targetproduct->language)); ?></td>
            </tr>
            <tr>
                <td>ISBN No</td>
                <td><?php echo e(empty($targetproduct->isbn_no)? null:$targetproduct->isbn_no); ?></td>
            </tr>
            <tr>
                <td>Publish Year</td>
                <td><?php echo e(empty($targetproduct->publish_year)? null:$targetproduct->publish_year); ?></td>
            </tr>
            <tr>
                <td>Edition</td>
                <td><?php echo e(empty($targetproduct->edition)? null:$targetproduct->edition); ?></td>
            </tr>
            <tr>
                <td>Overview</td>
                <td><?php echo empty($targetproduct->description)? null:$targetproduct->description; ?></td>
            </tr>
            <tr>
                <td>Keyword</td>
                <td><?php echo e(empty($targetproduct->meta_key)? null:$targetproduct->meta_key); ?></td>
            </tr>
            <tr>
                <td>Meta Description</td>
                <td><?php echo e(empty($targetproduct->meta_description)? null:$targetproduct->meta_description); ?></td>
            </tr>
        </tbody>
    </table>
</div><?php /**PATH F:\xampp\htdocs\utkarsh\resources\views/admin/product/includes/ads.blade.php ENDPATH**/ ?>