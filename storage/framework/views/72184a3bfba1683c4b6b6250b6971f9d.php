<?php $__env->startSection('title', 'Frequently Asked Questions - Car Airport Morocco'); ?>
<?php $__env->startSection('meta_description', 'Find answers to common questions about our meet and greet car rental delivery service at Marrakech Airport and local hotels.'); ?>

<?php $__env->startSection('content'); ?>
<div class="section-container" style="max-width: 800px; margin: 3rem auto 6rem auto; padding: 0 1.5rem;">
    <h1 style="font-family: var(--font-heading); font-size: 2.5rem; color: var(--primary-blue); margin-bottom: 1rem; font-weight: 800; text-align: center;">
        <?php echo e($locale === 'fr' ? 'Questions Fréquentes' : 'Frequently Asked Questions'); ?>

    </h1>
    <p style="color: var(--text-muted); text-align: center; margin-bottom: 3rem; font-size: 1.1rem;">
        <?php echo e($locale === 'fr' 
            ? 'Tout ce que vous devez savoir sur notre service personnalisé de livraison "Meet & Greet" à Marrakech.' 
            : 'Everything you need to know about our personalized "Meet & Greet" delivery service in Marrakech.'); ?>

    </p>

    <div style="display: flex; flex-direction: column; gap: 2rem;">
        <?php if($locale === 'fr'): ?>
            <!-- French FAQs -->
            <div style="background: var(--bg-white); padding: 2rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--primary-blue); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 0.75rem; font-weight: 700;">
                    Comment fonctionne la livraison "Meet & Greet" (Accueil) ?
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Nous n'avons pas de guichet physique fastidieux à l'aéroport. À votre arrivée à l'Aéroport de Marrakech-Ménara (RAK) ou à votre hôtel/riad, un agent dédié vous attendra avec un panneau nominatif. Il vous accompagnera directement à votre voiture, effectuera l'état des lieux et vous remettra les clés. C'est rapide, personnalisé et sans attente ! Veuillez noter que pour toute livraison tardive effectuée de nuit entre 00:00 et 06:00 du matin, des frais supplémentaires de 150 DH s'appliquent.
                </p>
            </div>

            <div style="background: var(--bg-white); padding: 2rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--primary-blue); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 0.75rem; font-weight: 700;">
                    Quels documents dois-je présenter lors de la livraison ?
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Vous devez présenter un permis de conduire original en cours de validité (détenu depuis au moins 2 ans) et un passeport en cours de validité. Les permis internationaux sont acceptés mais non obligatoires si votre permis d'origine est rédigé en caractères latins.
                </p>
            </div>

            <div style="background: var(--bg-white); padding: 2rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--primary-blue); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 0.75rem; font-weight: 700;">
                    Le kilométrage est-il limité ?
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Toutes nos locations incluent un kilométrage illimité. Vous pouvez parcourir tout le Maroc (de l'Atlas au Sahara) sans aucun frais supplémentaire. Veuillez noter que la conduite sur pistes non goudronnées ou hors-piste est interdite (sauf pour les véhicules 4x4 homologués).
                </p>
            </div>

            <div style="background: var(--bg-white); padding: 2rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--primary-blue); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 0.75rem; font-weight: 700;">
                    Comment se passe le paiement et le dépôt de garantie ?
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Le paiement de la location s'effectue au moment de la livraison de la voiture, soit en espèces (Euros ou Dirhams) soit par carte de crédit. Pour le dépôt de garantie (caution), nous effectuons une simple empreinte de votre carte de crédit (non débitée) ou acceptons d'autres arrangements selon le véhicule sélectionné.
                </p>
            </div>

            <div style="background: var(--bg-white); padding: 2rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--primary-blue); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 0.75rem; font-weight: 700;">
                    Puis-je restituer la voiture dans un autre lieu ?
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Oui. Lors de votre réservation, vous pouvez choisir de restituer le véhicule dans une ville différente (Casablanca, Agadir, Tanger, etc.). Veuillez noter que des frais supplémentaires de convoyage seront appliqués en fonction de la ville de retour choisie. Nos agents assureront la récupération de la voiture selon vos instructions de voyage.
                </p>
            </div>
        <?php else: ?>
            <!-- English FAQs -->
            <div style="background: var(--bg-white); padding: 2rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--primary-blue); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 0.75rem; font-weight: 700;">
                    How does the "Meet & Greet" delivery work?
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    We don't make you stand in long office lines. Upon your arrival at Marrakech-Menara Airport (RAK) or your hotel/riad, our agent will meet you holding a sign with your name. They will guide you to your car, complete the check-in inspection, and hand over the keys on the spot. It is fast, personal, and hassle-free! Please note that a late-night delivery charge of 150 DH applies for deliveries scheduled between 00:00 (midnight) and 06:00 AM.
                </p>
            </div>

            <div style="background: var(--bg-white); padding: 2rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--primary-blue); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 0.75rem; font-weight: 700;">
                    What documents do I need to present?
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    You will need to present your original valid driver's license (held for at least 2 years) and your valid passport. International driver permits are accepted but not mandatory if your primary license is in Roman characters.
                </p>
            </div>

            <div style="background: var(--bg-white); padding: 2rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--primary-blue); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 0.75rem; font-weight: 700;">
                    Is mileage limited?
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    No, all our rentals include unlimited mileage. You are free to travel anywhere across Morocco (from the Atlas peaks down to the Sahara) with no extra charges. Please note that driving off-road or on dirt tracks is strictly prohibited (except for authorized 4x4 vehicles).
                </p>
            </div>

            <div style="background: var(--bg-white); padding: 2rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--primary-blue); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 0.75rem; font-weight: 700;">
                    How do payment and security deposits work?
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    You pay for your rental at the time of delivery, either in cash (Euros or Moroccan Dirhams) or via credit card. For the security deposit, we perform a standard pre-authorization card hold (not debited) or accept alternative arrangements depending on the class of vehicle rented.
                </p>
            </div>

            <div style="background: var(--bg-white); padding: 2rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--primary-blue); font-family: var(--font-heading); font-size: 1.3rem; margin-bottom: 0.75rem; font-weight: 700;">
                    Can I return the car to a different location?
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Yes, you can select a different return location (Casablanca, Agadir, Tangier, etc.) when submitting your booking request. Please note that an extra delivery/recovery charge will be applied depending on the destination city. Our agent will coordinate the pickup according to your travel itinerary.
                </p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\GitHub\Car-rental\resources\views/faq.blade.php ENDPATH**/ ?>