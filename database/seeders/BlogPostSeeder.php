<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Top 5 Scenic Road Trips from Marrakech by Car (Atlas, Essaouira & Ouarzazate)',
                'slug' => 'top-scenic-road-trips-from-marrakech',
                'locale' => 'en',
                'category' => 'Travel Guide',
                'excerpt' => 'Discover the best day trips and multi-day driving itineraries starting from Marrakech. Explore Ourika Valley, Ouzoud Waterfalls, coastal Essaouira, and Ait Ben Haddou.',
                'content' => '
<h2>Why Exploring Marrakech by Rental Car is the Ultimate Way to Travel</h2>
<p>While Marrakech’s bustling Medina and historic palaces offer endless magic, some of Morocco’s most breathtaking landscapes lie just a short drive beyond the city palm groves. Renting a car directly from <strong>Marrakech Menara Airport (RAK)</strong> or your hotel gives you the freedom to set your own schedule, stop at scenic mountain viewpoints, and visit authentic Berber villages far from crowded tour buses.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <img src="/images/marrakech_roadtrip.jpg" alt="High Atlas Mountain Road Trip from Marrakech" style="width: 100%; display: block; object-fit: cover; max-height: 400px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">The scenic mountain pass across the High Atlas (Tizi n\'Tichka Pass)</div>
</div>

<h3>1. Ourika Valley & Setti Fatma (1 Hour Drive / 60 km)</h3>
<p>Located at the foot of the High Atlas Mountains, the <strong>Ourika Valley</strong> is the easiest day trip from Marrakech. The route follows the winding Ourika River through lush green valleys and traditional terraced gardens.</p>
<ul>
    <li><strong>Driving Time:</strong> ~1 hour from Marrakech city center via the P2017 road.</li>
    <li><strong>Best Car Choice:</strong> Any Economy or Compact hatchback (e.g. Dacia Logan, Renault Clio 5).</li>
    <li><strong>Highlights:</strong> Hiking to the 7 waterfalls at Setti Fatma, enjoying riverside tagines served directly over the cool water stream, and visiting organic argan oil cooperatives.</li>
</ul>

<h3>2. Coastal Escape to Essaouira (2.5 Hours Drive / 175 km)</h3>
<p>Escape the desert heat for the breezy Atlantic ocean breeze of <strong>Essaouira</strong>. The highway (N8 / R207) connecting Marrakech to Essaouira is flat, well-paved, and straightforward to navigate.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <img src="/images/essaouira_coast.jpg" alt="Essaouira Coastal View and Ocean Drive" style="width: 100%; display: block; object-fit: cover; max-height: 400px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">The wind-swept Atlantic coastline near the ramparts of Essaouira</div>
</div>

<ul>
    <li><strong>Driving Time:</strong> ~2 hours 30 minutes on smooth, paved roads.</li>
    <li><strong>Highlights:</strong> Exploring the UNESCO-listed 18th-century Skala fortress walls, fresh grilled sardines at the fishing port, kite surfing at Moulay Bouzerktoun, and seeing the famous tree-climbing goats in the argan groves along the highway.</li>
</ul>

<h3>3. Ouarzazate & Ait Ben Haddou Kasbah (3.5 Hours Drive / 190 km)</h3>
<p>Crossing the spectacular <strong>Tizi n\'Tichka Pass</strong> (altitude 2,260m), this legendary driving route links Marrakech to the gateway of the Sahara Desert. The mountain highway has recently undergone major upgrades with wider lanes and safety barriers.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <img src="/images/ait_ben_haddou.jpg" alt="Ait Ben Haddou Ancient Kasbah Fortress" style="width: 100%; display: block; object-fit: cover; max-height: 400px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">Ait Ben Haddou — UNESCO World Heritage site and filming location for Gladiator & Game of Thrones</div>
</div>

<ul>
    <li><strong>Best Car Choice:</strong> A mid-size SUV (e.g. Volkswagen T-Roc or Audi Q3) provides enhanced ground clearance and engine power for mountain inclines.</li>
    <li><strong>Highlights:</strong> Wandering through the ancient earthen clay buildings of <em>Ait Ben Haddou</em>, visiting Atlas Film Studios in Ouarzazate, and exploring Kasbah Telouet.</li>
</ul>

<h3>4. Ouzoud Waterfalls (2.5 Hours Drive / 155 km)</h3>
<p>At over 110 meters tall, the <strong>Ouzoud Waterfalls</strong> are the highest and most impressive waterfalls in North Africa. Surrounded by olive groves and inhabited by wild Barbary macaque monkeys, it makes an unforgettable day excursion.</p>

<div class="blog-cta-box" style="background:#0f1d36; color:white; padding:2rem; border-radius:14px; margin:2.5rem 0; text-align:center; box-shadow: 0 10px 25px rgba(15,29,54,0.15);">
    <h3 style="color:#c5a059; margin-bottom:0.5rem; font-size: 1.5rem;">Planning Your Marrakech Road Trip?</h3>
    <p style="margin-bottom:1.25rem; opacity: 0.9;">Reserve your rental car with free Marrakech Menara Airport delivery, unlimited mileage & comprehensive insurance coverage included.</p>
    <a href="/en#cars" style="background:#c5a059; color:#0f1d36; padding:0.85rem 2rem; text-decoration:none; font-weight:800; border-radius:8px; display:inline-block; font-size: 1.05rem;">Browse Available Fleet & Reserve Online</a>
</div>
',
                'featured_image' => '/images/marrakech_roadtrip.jpg',
                'author' => 'Car Airport Morocco Team',
                'read_time_minutes' => 8,
                'meta_title' => 'Top 5 Scenic Road Trips from Marrakech by Car 2026',
                'meta_description' => 'Explore the best road trip itineraries from Marrakech by rental car. Driving guides for Atlas Mountains, Essaouira, Ouzoud Waterfalls & Ait Ben Haddou.',
                'meta_keywords' => 'road trip marrakech, car rental marrakech day trips, atlas mountains drive',
                'is_published' => true,
            ],
            [
                'title' => 'Complete Guide to Renting a Car at Marrakech Airport (RAK): Tips & Avoid Scams',
                'slug' => 'marrakech-airport-car-rental-guide',
                'locale' => 'en',
                'category' => 'Airport Guide',
                'excerpt' => 'Everything you need to know about renting a car at Marrakech Menara Airport (RAK). Discover terminal pick-up procedures, hidden fees to avoid, and essential driving tips.',
                'content' => '
<h2>Renting a Car at Marrakech Airport (RAK): What You Need to Know</h2>
<p>Arriving at <strong>Marrakech Menara Airport (RAK)</strong> is the start of an exciting Moroccan adventure. Renting a car gives you ultimate freedom to explore Marrakech, the Atlas Mountains, Essaouira, and beyond without relying on crowded buses or negotiating taxi prices.</p>

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
                'title' => 'Agadir Coastal Road Trip: Renting a Car for Surfing, Taghazout & Paradise Valley',
                'slug' => 'agadir-road-trip-car-rental-guide',
                'locale' => 'en',
                'category' => 'Travel Guide',
                'excerpt' => 'Planning a coastal road trip around Agadir, Taghazout, and Paradise Valley? Learn why renting an SUV or economy car is the best choice for exploring Southern Morocco.',
                'content' => '
<h2>Exploring Agadir & Taghazout by Rental Car</h2>
<p>Agadir is famous for its year-round sunshine, golden beaches, and proximity to world-class surfing villages like <strong>Taghazout, Tamraght, and Imsouane</strong>. A rental car allows you to easily transport surfboard gear, visit hidden coves, and head inland to the palm-fringed gorge of Paradise Valley.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <img src="/images/taghazout_beach.jpg" alt="Taghazout Coast Road Trip by Rental Car" style="width: 100%; display: block; object-fit: cover; max-height: 400px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">Surfing road trip along the Taghazout coastline with a SUV vehicle</div>
</div>

<h3>1. Taghazout & Anchor Point (20 Minutes Drive / 19 km)</h3>
<p>Just 20 minutes north of Agadir along the scenic coastal route N1, Taghazout is Morocco\'s premier surf village. Having your own rental car makes it easy to chase the best swell from <em>Anchor Point</em> to <em>Killer Point</em> and <em>Boilers</em>.</p>

<h3>2. Paradise Valley Oasis (45 Minutes Drive / 35 km)</h3>
<p>Tucked into the foothills of the High Atlas, <strong>Paradise Valley</strong> features turquoise natural swimming pools surrounded by date palms and towering limestone cliffs.</p>

<div class="blog-cta-box" style="background:#0f1d36; color:white; padding:1.5rem; border-radius:12px; margin:2rem 0; text-align:center;">
    <h3 style="color:#c5a059; margin-bottom:0.5rem;">Explore Agadir & Taghazout Today</h3>
    <p style="margin-bottom:1rem;">Book your car at Agadir Al Massira Airport (AGA) with unlimited mileage & roof rack options for surfboards.</p>
    <a href="/en#cars" style="background:#c5a059; color:#0f1d36; padding:0.75rem 1.5rem; text-decoration:none; font-weight:bold; border-radius:6px; display:inline-block;">Book Car in Agadir</a>
</div>
',
                'featured_image' => '/images/taghazout_beach.jpg',
                'author' => 'Morocco Travel Team',
                'read_time_minutes' => 7,
                'meta_title' => 'Agadir Car Rental & Road Trip Guide | Taghazout & Beaches',
                'meta_description' => 'Rent a car in Agadir to explore Taghazout surf spots, Paradise Valley, and southern Morocco. Compare rates and vehicle choices.',
                'meta_keywords' => 'agadir car rental, rent car taghazout, agadir airport car hire',
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
