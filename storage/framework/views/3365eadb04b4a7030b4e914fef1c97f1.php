<?php $__env->startSection('title', 'About Us - Car Airport Morocco'); ?>
<?php $__env->startSection('meta_description', 'Learn about Car Airport Morocco. Premium car rental services in Marrakech specializing in personalized Meet and Greet airport and hotel delivery.'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-container" style="max-width: 800px; margin: 3rem auto 6rem auto; padding: 0 1.5rem;">
    <h1 style="font-family: var(--font-heading); font-size: 2.5rem; color: var(--primary-blue); margin-bottom: 2rem; font-weight: 800; text-align: center;">
        <?php echo e($locale === 'fr' ? 'À Propos de Nous' : 'About Us'); ?>

    </h1>

    <div style="background: var(--bg-white); padding: 2.5rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); line-height: 1.7; color: var(--text-muted);">
        <?php if($locale === 'fr'): ?>
            <p style="font-size: 1.1rem; color: var(--primary-blue); font-weight: 600; margin-bottom: 1.5rem;">
                Bienvenue chez Car Airport Morocco, votre partenaire de confiance pour la location de voitures à Marrakech.
            </p>
            <p style="margin-bottom: 1.5rem;">
                Fondée avec la volonté de simplifier l'expérience de voyage en cours de route, notre entreprise s'est spécialisée dans un service hautement personnalisé d'accueil et de livraison de véhicules <strong>"Meet & Greet"</strong>.
            </p>
            <p style="margin-bottom: 1.5rem;">
                Nous pensons que vos vacances ou votre voyage d'affaires à Marrakech ne devraient pas commencer par de longues heures d'attente aux comptoirs d'agences traditionnelles. C'est pourquoi nous venons à votre rencontre : un représentant dédié vous attend dès la sortie de votre terminal à l'Aéroport de Marrakech-Ménara (RAK) ou directement dans le hall de votre hôtel ou Riad, avec votre véhicule prêt à partir.
            </p>

            <h3 style="color: var(--primary-blue); font-family: var(--font-heading); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 0.75rem; font-weight: 700;">Notre Engagement :</h3>
            <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem;">
                <li style="margin-bottom: 0.5rem;"><strong>Zéro attente</strong> : Pas de files d'attente à l'aéroport, livraison directe.</li>
                <li style="margin-bottom: 0.5rem;"><strong>Transparence totale</strong> : Aucun frais caché ni surprise lors de la signature du contrat.</li>
                <li style="margin-bottom: 0.5rem;"><strong>Flotte Premium</strong> : Des véhicules récents, rigoureusement entretenus et inspectés.</li>
                <li style="margin-bottom: 0.5rem;"><strong>Support 24/7</strong> : Une équipe locale réactive, toujours à votre écoute sur WhatsApp.</li>
            </ul>
        <?php else: ?>
            <p style="font-size: 1.1rem; color: var(--primary-blue); font-weight: 600; margin-bottom: 1.5rem;">
                Welcome to Car Airport Morocco, your premier car rental partner in Marrakech.
            </p>
            <p style="margin-bottom: 1.5rem;">
                Established with a vision to streamline your travel experience, we specialize in a tailored, stress-free **"Meet & Greet"** vehicle delivery service.
            </p>
            <p style="margin-bottom: 1.5rem;">
                We believe your holiday or business trip to Marrakech should not begin with long, tiring queues at traditional airport counters. Instead, we bring the rental service directly to you. A dedicated representative meets you holding a sign at the Marrakech-Menara Airport (RAK) arrivals terminal or at your hotel/riad lobby, completing your check-in and handing over keys within minutes.
            </p>

            <h3 style="color: var(--primary-blue); font-family: var(--font-heading); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 0.75rem; font-weight: 700;">Our Core Values:</h3>
            <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem;">
                <li style="margin-bottom: 0.5rem;"><strong>Convenience First</strong>: No airport office queues. Direct terminal-to-car delivery.</li>
                <li style="margin-bottom: 0.5rem;"><strong>Honest Pricing</strong>: Absolute transparency with no hidden surprises.</li>
                <li style="margin-bottom: 0.5rem;"><strong>Premium Fleet</strong>: Modern, clean, and strictly maintained vehicles.</li>
                <li style="margin-bottom: 0.5rem;"><strong>Dedicated Support</strong>: Helpful local team available 24/7 via WhatsApp.</li>
            </ul>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\GitHub\Car-rental\resources\views/about.blade.php ENDPATH**/ ?>