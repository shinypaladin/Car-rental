<?php echo '<' . '?xml version="1.0" encoding="UTF-8"?' . '>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">
    <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <url>
        <loc><?php echo e($url['loc']); ?></loc>
        <lastmod><?php echo e($url['lastmod']); ?></lastmod>
        <changefreq><?php echo e($url['changefreq']); ?></changefreq>
        <priority><?php echo e($url['priority']); ?></priority>
        <?php $__currentLoopData = $url['alternates']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <xhtml:link rel="alternate" hreflang="<?php echo e($alt['lang']); ?>" href="<?php echo e($alt['href']); ?>" />
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset>
<?php /**PATH C:\Users\ASUS\Documents\GitHub\Car-rental\resources\views/sitemap.blade.php ENDPATH**/ ?>