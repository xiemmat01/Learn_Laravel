<form action="<?php echo e(route('postForm')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="text" name="Ten"/>
    <input type="text" name="sdt" value=""/>
    <button type="submit">Submit</button>
</form><?php /**PATH C:\wamp64\www\myLaravel\resources\views/postForm.blade.php ENDPATH**/ ?>