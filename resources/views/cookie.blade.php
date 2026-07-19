@extends('layouts.app')

@section('title', 'Cookie Policy - Car Airport Morocco')
@section('meta_description', 'Cookie Policy for Car Airport Morocco. Understand how we use cookies to save your booking references and language preferences.')

@section('content')
<div class="section-container" style="max-width: 800px; margin: 3rem auto 6rem auto; padding: 0 1.5rem;">
    <h1 style="font-family: var(--font-heading); font-size: 2.5rem; color: var(--primary-blue); margin-bottom: 2rem; font-weight: 800; text-align: center;">
        {{ $locale === 'fr' ? 'Politique relative aux Cookies' : 'Cookie Policy' }}
    </h1>

    <div style="background: var(--bg-white); padding: 2.5rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); line-height: 1.7; color: var(--text-muted);">
        @if($locale === 'fr')
            <p style="margin-bottom: 1.5rem;">
                Cette politique explique comment Car Airport Morocco utilise les cookies pour assurer le bon fonctionnement technique de notre site de location.
            </p>
            
            <h2 style="color: var(--primary-blue); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 1rem;">1. Qu'est-ce qu'un cookie ?</h2>
            <p style="margin-bottom: 1.5rem;">
                Un cookie est un petit fichier texte stocké sur votre appareil (ordinateur ou mobile) lors de votre visite sur un site web.
            </p>

            <h2 style="color: var(--primary-blue); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 1rem;">2. Cookies utilisés</h2>
            <p style="margin-bottom: 1.5rem;">
                Nous utilisons uniquement des cookies fonctionnels essentiels :
            </p>
            <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem;">
                <li><strong>Langue & Devise</strong> : Pour mémoriser vos préférences de langue (Français/Anglais) et de devise (EUR/MAD) lors de vos visites futures.</li>
                <li><strong>Session & Sécurité</strong> : Pour maintenir la sécurité de la soumission du formulaire de réservation (jetons CSRF).</li>
                <li><strong>Référence de Réservation</strong> : Pour vous permettre d'accéder rapidement et de modifier votre réservation via le portail "Ma Réservation" sans devoir ressaisir vos informations à chaque fois.</li>
            </ul>

            <h2 style="color: var(--primary-blue); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 1rem;">3. Gestion des cookies</h2>
            <p style="margin-bottom: 1.5rem;">
                Vous pouvez configurer votre navigateur pour refuser ou supprimer les cookies. Veuillez noter que la désactivation des cookies fonctionnels peut perturber l'expérience utilisateur et bloquer la validation des réservations.
            </p>
        @else
            <p style="margin-bottom: 1.5rem;">
                This policy explains how Car Airport Morocco uses cookies to provide a functional and seamless booking experience.
            </p>
            
            <h2 style="color: var(--primary-blue); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 1rem;">1. What are Cookies?</h2>
            <p style="margin-bottom: 1.5rem;">
                Cookies are small text files placed on your device by your web browser when visiting a website.
            </p>

            <h2 style="color: var(--primary-blue); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 1rem;">2. How We Use Cookies</h2>
            <p style="margin-bottom: 1.5rem;">
                We use cookies exclusively to support essential functional features:
            </p>
            <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem;">
                <li><strong>Language & Currency Preferences</strong>: Storing your selection (English/French, EUR/MAD) so the site loads in your preferred settings automatically.</li>
                <li><strong>Security & Session</strong>: Safeguarding forms from CSRF injection exploits.</li>
                <li><strong>Reservation Lookup</strong>: Helping save your booking reference state on your browser locally so you can easily review and update your reservation.</li>
            </ul>

            <h2 style="color: var(--primary-blue); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 1rem;">3. Managing Cookies</h2>
            <p style="margin-bottom: 1.5rem;">
                You can block or delete cookies through your browser settings. However, disabling essential cookies may impact your ability to successfully submit or modify reservation requests.
            </p>
        @endif
    </div>
</div>
@endsection
