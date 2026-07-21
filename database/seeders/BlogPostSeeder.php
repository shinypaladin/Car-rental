<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Complete Guide to Renting a Car at Marrakech Airport (RAK): Tips & Avoid Scams',
                'slug' => 'marrakech-airport-car-rental-guide',
                'locale' => 'en',
                'category' => 'Airport Guide',
                'excerpt' => 'Everything you need to know about renting a car at Marrakech Menara Airport (RAK). Discover terminal pick-up procedures, hidden fees to avoid, and essential driving tips.',
                'content' => '
<h2>Renting a Car at Marrakech Airport (RAK): What You Need to Know</h2>
<p>Arriving at Marrakech Menara Airport (RAK) is the start of an exciting Moroccan adventure. Renting a car gives you ultimate freedom to explore Marrakech, the Atlas Mountains, Essaouira, and beyond without relying on crowded buses or negotiating taxi prices.</p>

<h3>1. Pick-Up at Marrakech Airport (Meet & Greet vs Terminal Desk)</h3>
<p>Most reputable car rental suppliers provide a direct <strong>Meet & Greet service</strong> right outside the arrival terminal exit. A representative meets you with a nameboard, assists with your luggage, and takes you straight to your inspected vehicle. This saves you from long terminal queues.</p>

<h3>2. Driving from Marrakech Airport to the City Center</h3>
<p>The drive from Menara Airport to Gueliz or the Medina perimeter takes approximately 15–20 minutes via Avenue Guemassa. Roads are well-paved, but keep an eye out for scooters, pedestrians, and roundabouts.</p>

<h3>3. Essential Rental Tips for Foreign Drivers</h3>
<ul>
    <li><strong>International Driver License:</strong> Most tourists can drive in Morocco using their home country driving license for up to 90 days.</li>
    <li><strong>Zero Deposit Options:</strong> Always check if full comprehensive insurance (CDW) is included to avoid high credit card hold deposits.</li>
    <li><strong>Fuel Policy:</strong> Standard policy is Fair (Same to Same). Check fuel levels on handover.</li>
</ul>

<div class="blog-cta-box" style="background:#0f1d36; color:white; padding:1.5rem; border-radius:12px; margin:2rem 0; text-align:center;">
    <h3 style="color:#c5a059; margin-bottom:0.5rem;">Ready to Explore Marrakech?</h3>
    <p style="margin-bottom:1rem;">Book your vehicle directly with Car Airport Morocco. Zero hidden fees & instant WhatsApp support.</p>
    <a href="/en#cars" style="background:#c5a059; color:#0f1d36; padding:0.75rem 1.5rem; text-decoration:none; font-weight:bold; border-radius:6px; display:inline-block;">View Fleet & Reserve Car</a>
</div>
',
                'featured_image' => '/images/marrakech_bg.jpg',
                'author' => 'Car Airport Morocco Team',
                'read_time_minutes' => 6,
                'meta_title' => 'Marrakech Airport Car Rental Guide 2026 | Tips & Rates',
                'meta_description' => 'Planning to rent a car at Marrakech Menara Airport? Read our expert guide on terminal pickup, driving rules, and how to avoid hidden rental fees in Morocco.',
                'meta_keywords' => 'rent car marrakech airport, car rental marrakech rak, cheap car rental morocco',
                'is_published' => true,
            ],
            [
                'title' => 'Driving in Morocco 2026: Road Rules, Speed Cameras & Police Checkpoints',
                'slug' => 'driving-in-morocco-road-rules-and-tips',
                'locale' => 'en',
                'category' => 'Driving Tips',
                'excerpt' => 'Navigating Moroccan highways and city roads. Learn speed limits, toll payments, police checkpoint etiquette, and parking rules in Medina areas.',
                'content' => '
<h2>Is Driving in Morocco Safe for Tourists?</h2>
<p>Driving in Morocco is straightforward, scenic, and safe. Morocco has heavily invested in modern dual-carriageway highways (Autoroutes du Maroc) linking major cities like Casablanca, Marrakech, Agadir, Tangier, and Rabat.</p>

<h3>Key Traffic Rules & Speed Limits</h3>
<ul>
    <li><strong>Highways (Autoroutes):</strong> 120 km/h</li>
    <li><strong>Open Country Roads:</strong> 80 km/h – 100 km/h</li>
    <li><strong>Cities & Built-up Areas:</strong> 40 km/h – 60 km/h</li>
</ul>

<h3>Handling Police Checkpoints</h3>
<p>Police checkpoints are common on entry and exit points of cities. When approaching a checkpoint, slow down to 20 km/h or stop completely at the <em>Halte Gendarmerie / Police</em> sign until the officer signals you to proceed.</p>

<h3>Parking Guardians ("Gardiens de Voitures")</h3>
<p>In Moroccan cities, official parking guardians wearing blue or yellow vests assist drivers with parking. The standard fee is 5 to 10 DH for daytime parking, or 20 DH overnight.</p>
',
                'featured_image' => '/images/clio5.jpg',
                'author' => 'Travel Safety Team',
                'read_time_minutes' => 5,
                'meta_title' => 'Driving in Morocco 2026: Rules, Speed Limits & Highway Tolls',
                'meta_description' => 'Complete tourist guide to driving in Morocco. Learn speed limits, highway tolls, police checkpoint rules, and parking etiquette.',
                'meta_keywords' => 'driving in morocco, moroccan road rules, rental car morocco driving',
                'is_published' => true,
            ],
            [
                'title' => 'Guide Complet de Location de Voiture à l\'Aéroport de Casablanca (CMN)',
                'slug' => 'guide-location-voiture-aeroport-casablanca',
                'locale' => 'fr',
                'category' => 'Guide Aéroport',
                'excerpt' => 'Tout savoir sur la location de voiture à l\'Aéroport Mohammed V de Casablanca. Astuces pour éviter les attentes et rejoindre rapidement le centre-ville.',
                'content' => '
<h2>Location de Voiture à l\'Aéroport Mohammed V de Casablanca</h2>
<p>L\'aéroport international Mohammed V de Casablanca (CMN) est la principale porte d\'entrée au Maroc. Réserver une voiture dès votre arrivée vous permet de vous déplacer en toute liberté vers le centre-ville ou l\'autoroute A3 vers Rabat et Marrakech.</p>

<h3>Conseils Utiles à l\'Arrivée</h3>
<ul>
    <li>Préparez votre passeport et votre permis de conduire original.</li>
    <li>Vérifiez l\'état des pneus et l\'ensemble des rayures lors de la remise des clés.</li>
    <li>Optez pour une transmission automatique si vous prévoyez de conduire fréquemment dans le trafic de Casablanca.</li>
</ul>
',
                'featured_image' => '/images/vw_troc.jpg',
                'author' => 'Équipe Car Airport',
                'read_time_minutes' => 4,
                'meta_title' => 'Location Voiture Aéroport Casablanca (CMN) | Conseils & Tarifs',
                'meta_description' => 'Louez votre voiture à l\'aéroport de Casablanca au meilleur prix. Service accueil terminal sans attente et kilométrage illimité.',
                'meta_keywords' => 'location voiture casablanca aeroport, louer voiture morocco',
                'is_published' => true,
            ],
            [
                'title' => 'Agadir Coastal Road Trip: Renting a Car for Surfing, Taghazout & Paradise Valley',
                'slug' => 'agadir-road-trip-car-rental-guide',
                'locale' => 'en',
                'category' => 'Travel Guide',
                'excerpt' => 'Planning a coastal road trip around Agadir, Taghazout, and Paradise Valley? Learn why renting an SUV or economy car is the best choice for exploring Southern Morocco.',
                'content' => '
<h2>Exploring Agadir & Taghazout by Rental Car</h2>
<p>Agadir is famous for its year-round sunshine, golden beaches, and proximity to world-class surfing villages like Taghazout, Tamraght, and Imsouane. A rental car allows you to easily transport surfboard gear, visit hidden coves, and head inland to Paradise Valley.</p>

<h3>Recommended Vehicle for Agadir Trips</h3>
<p>For city driving and coastal roads along the N1 highway, an Economy car like the <strong>Dacia Logan</strong> or <strong>Renault Clio 5</strong> is ideal. If you plan to explore the anti-Atlas mountain roads or off-road beach trails, consider booking a <strong>Volkswagen T-Roc or Touareg SUV</strong>.</p>
',
                'featured_image' => '/images/audi_q3.jpg',
                'author' => 'Morocco Travel Team',
                'read_time_minutes' => 5,
                'meta_title' => 'Agadir Car Rental & Road Trip Guide | Taghazout & Beaches',
                'meta_description' => 'Rent a car in Agadir to explore Taghazout surf spots, Paradise Valley, and southern Morocco. Compare rates and vehicle choices.',
                'meta_keywords' => 'agadir car rental, rent car taghazout, agadir airport car hire',
                'is_published' => true,
            ]
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
