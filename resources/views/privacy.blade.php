@extends('layouts.app')

@section('title', 'Privacy Policy - Car Airport Morocco')
@section('meta_description', 'Privacy Policy for Car Airport Morocco. Read about how we handle and protect your personal reservation and contact information.')

@section('content')
<div class="section-container" style="max-width: 800px; margin: 3rem auto 6rem auto; padding: 0 1.5rem;">
    <h1 style="font-family: var(--font-heading); font-size: 2.5rem; color: var(--primary-blue); margin-bottom: 2rem; font-weight: 800; text-align: center;">
        {{ $locale === 'fr' ? 'Politique de Confidentialité' : 'Privacy Policy' }}
    </h1>

    <div style="background: var(--bg-white); padding: 2.5rem; border-radius: 12px; border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); line-height: 1.7; color: var(--text-muted);">
        @if($locale === 'fr')
            <p style="margin-bottom: 1.5rem;">
                Chez Car Airport Morocco, nous accordons une grande importance à la protection de vos données personnelles. Cette politique explique comment nous recueillons et utilisons vos données dans le cadre de notre service de location de voitures.
            </p>
            
            <h2 style="color: var(--primary-blue); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 1rem;">1. Informations collectées</h2>
            <p style="margin-bottom: 1.5rem;">
                Nous collectons uniquement les informations nécessaires au traitement et à la validation de votre location : nom, adresse e-mail, numéro de téléphone (WhatsApp), numéro de passeport, numéro de permis de conduire, ainsi que les détails de vos vols d'arrivée et de départ.
            </p>

            <h2 style="color: var(--primary-blue); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 1rem;">2. Utilisation de vos données</h2>
            <p style="margin-bottom: 1.5rem;">
                Vos données sont utilisées exclusivement pour :
            </p>
            <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem;">
                <li>Créer et gérer votre réservation de véhicule.</li>
                <li>Coordonner la livraison personnalisée à l'aéroport ou à votre hôtel à Marrakech.</li>
                <li>Rédiger votre contrat de location légal.</li>
                <li>Assurer le support client 24h/24 en cas d'assistance routière.</li>
            </ul>

            <h2 style="color: var(--primary-blue); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 1rem;">3. Sécurité & Partage des données</h2>
            <p style="margin-bottom: 1.5rem;">
                Toutes les informations soumises via notre site web sont cryptées et stockées de manière sécurisée. Nous ne vendons ni ne partageons vos données à des fins marketing. Cependant, veuillez noter que vos documents officiels (permis de conduire et passeport) seront transmis aux autorités gouvernementales compétentes en cas d'infractions routières ou d'excès de vitesse enregistrés durant la période de votre location.
            </p>
        @else
            <p style="margin-bottom: 1.5rem;">
                At Car Airport Morocco, we are committed to protecting your personal data. This privacy policy explains how we collect and use your information when booking a car rental with us.
            </p>
            
            <h2 style="color: var(--primary-blue); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 1rem;">1. Information We Collect</h2>
            <p style="margin-bottom: 1.5rem;">
                We collect personal information necessary to arrange and manage your car rental, including: your name, email address, phone number (WhatsApp), driver's license number, passport details, and flight information.
            </p>

            <h2 style="color: var(--primary-blue); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 1rem;">2. How We Use Your Data</h2>
            <p style="margin-bottom: 1.5rem;">
                Your data is processed solely for:
            </p>
            <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem;">
                <li>Creating and validating your car rental booking.</li>
                <li>Coordinating the personal delivery at Marrakech Airport or your hotel/riad.</li>
                <li>Preparing your official rental contract agreement.</li>
                <li>Communicating with you regarding pickup details and support queries.</li>
            </ul>

            <h2 style="color: var(--primary-blue); font-size: 1.3rem; margin-top: 2rem; margin-bottom: 1rem;">3. Data Security & Sharing</h2>
            <p style="margin-bottom: 1.5rem;">
                All data transmitted through our website is encrypted. We do not sell, rent, or share your personal data with external third parties for marketing purposes. However, please note that your official identity and driver documents (passport and driver ID) will be submitted to the government authorities in case of speeding tickets or other traffic violations incurred during your rental duration.
            </p>
        @endif
    </div>
</div>
@endsection
