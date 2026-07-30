<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            // ── 1. Marrakech Airport Guide ──────────────────────────────────────
            [
                'title' => 'Marrakech Airport Car Rental Guide 2026: Terminal Pickup, Rates & Driving Rules',
                'slug' => 'marrakech-airport-car-rental-guide-2026',
                'translation_group' => 'marrakech-airport-guide',
                'locale' => 'en',
                'category' => 'Airport Guide',
                'excerpt' => 'Planning to rent a car at Marrakech Menara Airport (RAK)? Learn how terminal meeting works, road rules, avoiding hidden fees, and navigating the Medina.',
                'content' => '
<h2>Renting a Car at Marrakech Menara Airport (RAK)</h2>
<p>Marrakech Menara Airport is the gateway for millions of tourists visiting Morocco every year. Renting a car directly at the airport gives you instant freedom to head to your hotel, drive into the Medina, or set off toward the High Atlas Mountains.</p>

<h3>1. Terminal Pickup Process</h3>
<p>When you book with <strong>Car Airport Morocco</strong>, our agent meets you right outside the arrival terminal exits with your name sign. No waiting in long rental counter queues.</p>

<h3>2. Driving Rules & Tips in Marrakech</h3>
<ul>
    <li><strong>Speed Limits:</strong> 120 km/h on highways (Autoroutes), 80-100 km/h on open roads, and 40-60 km/h inside the city.</li>
    <li><strong>Medina Parking:</strong> Do not attempt to drive deep into pedestrian Medina alleys. Park in guarded parking lots ("Parking Gardé") near key gates like Bab Doukkala or Jemaa el-Fnaa.</li>
</ul>

<div class="blog-cta-box" style="background:#0f1d36; color:white; padding:2rem; border-radius:14px; margin:2.5rem 0; text-align:center;">
    <h3 style="color:#c5a059; margin-bottom:0.5rem; font-size: 1.5rem;">Ready to Explore Marrakech?</h3>
    <p style="margin-bottom:1.25rem; opacity: 0.9;">Book your vehicle directly with Car Airport Morocco. Zero hidden fees & instant WhatsApp support.</p>
    <a href="/en#cars" style="background:#c5a059; color:#0f1d36; padding:0.85rem 2rem; text-decoration:none; font-weight:800; border-radius:8px; display:inline-block; font-size: 1.05rem;">View Fleet & Reserve Car</a>
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

            // ── 2. Agadir Road Trip ─────────────────────────────────────────────
            [
                'title' => 'Agadir Coastal Road Trip: Renting a Car for Surfing, Taghazout & Paradise Valley',
                'slug' => 'agadir-road-trip-car-rental-guide',
                'translation_group' => 'agadir-road-trip',
                'locale' => 'en',
                'category' => 'Travel Guide',
                'excerpt' => 'Planning a coastal road trip around Agadir, Taghazout, and Paradise Valley? Learn why renting an SUV or economy car is the best choice for exploring Southern Morocco.',
                'content' => '
<h2>Exploring Agadir & Taghazout by Rental Car</h2>
<p>Agadir is famous for its year-round sunshine, golden beaches, and proximity to world-class surfing villages like <strong>Taghazout, Tamraght, and Imsouane</strong>. A rental car allows you to easily transport surfboard gear, visit hidden coves, and head inland to the palm-fringed gorge of Paradise Valley.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.12);">
    <img src="/images/taghazout_beach.jpg" alt="Taghazout Coast Road Trip by Rental Car" style="width: 100%; display: block; object-fit: cover; max-height: 400px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">Surfing road trip along the Taghazout coastline with a SUV vehicle</div>
</div>

<h3>1. Taghazout & Anchor Point (20 Minutes Drive / 19 km)</h3>
<p>Just 20 minutes north of Agadir along the scenic coastal route N1, Taghazout is Morocco\'s premier surf village. Having your own rental car makes it easy to chase the best swell from <em>Anchor Point</em> to <em>Killer Point</em> and <em>Boilers</em>.</p>

<h3>2. Paradise Valley Oasis (45 Minutes Drive / 35 km)</h3>
<p>Tucked into the foothills of the High Atlas, <strong>Paradise Valley</strong> features turquoise natural swimming pools surrounded by date palms and towering limestone cliffs.</p>

<div class="blog-cta-box" style="background:#0f1d36; color:white; padding:2rem; border-radius:14px; margin:2.5rem 0; text-align:center;">
    <h3 style="color:#c5a059; margin-bottom:0.5rem; font-size: 1.5rem;">Explore Agadir & Taghazout Today</h3>
    <p style="margin-bottom:1.25rem; opacity: 0.9;">Book your car at Agadir Al Massira Airport (AGA) with unlimited mileage & roof rack options for surfboards.</p>
    <a href="/en#cars" style="background:#c5a059; color:#0f1d36; padding:0.85rem 2rem; text-decoration:none; font-weight:800; border-radius:8px; display:inline-block; font-size: 1.05rem;">Book Car in Agadir</a>
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

            // ── 3. Driving in Morocco Rules ────────────────────────────────────
            [
                'title' => 'Driving in Morocco 2026: Road Rules, Speed Cameras & Police Checkpoints',
                'slug' => 'driving-in-morocco-road-rules-and-tips',
                'translation_group' => 'driving-rules-morocco',
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

            // ── 4. Casablanca Airport Guide (French) ───────────────────────────
            [
                'title' => 'Guide Complet de Location de Voiture à l\'Aéroport de Casablanca (CMN)',
                'slug' => 'guide-location-voiture-aeroport-casablanca',
                'translation_group' => 'casablanca-airport-guide',
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

            // ── 5. Destination 1: Imlil & Mount Toubkal ────────────────────────
            [
                'title' => 'Self-Drive Guide to Imlil & Mount Toubkal: High Atlas Roads, Parking, Hiking & Kasbah Views',
                'slug' => 'imlil-toubkal-mountain-drive-marrakech',
                'translation_group' => 'imlil-mountain-guide',
                'locale' => 'en',
                'category' => 'Marrakech Destination',
                'excerpt' => 'Deep-dive self-drive guide to Imlil & Mount Toubkal from Marrakech. Discover why renting a car gives you total freedom, exact road routes, parking tips, authentic Berber village stops, and Kasbah du Toubkal views.',
                'content' => '
<h2>Why Renting a Car to Visit Imlil is the Best Choice for Travelers</h2>
<p>Just <strong>67 kilometers south of Marrakech</strong> (a scenic 1.5-hour drive), the peaceful mountain village of <strong>Imlil</strong> sits at 1,740 meters altitude in the High Atlas Mountains. As the main gateway to <strong>Mount Toubkal (4,167m)</strong>—the highest peak in North Africa—Imlil feels a world away from the fast-paced energy of the Marrakech Medina.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.12);">
    <img src="/images/imlil_village.jpg" alt="Imlil Mountain Village Drive High Atlas Morocco" style="width: 100%; display: block; object-fit: cover; max-height: 420px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">Overlooking Imlil village and snow-capped Toubkal peaks from a High Atlas mountain road look-out</div>
</div>

<h2>What You Will Experience & Benefit from Visiting Imlil by Car</h2>

<h3>1. Refreshing Mountain Climate (15°C Cooler Than Marrakech)</h3>
<p>During the warm summer months when Marrakech temperatures reach 40°C+, Imlil remains delightfully cool (around 22°C to 25°C). Crisp mountain air, snow-melt streams, and shady walnut groves make it the ultimate day-trip escape.</p>

<h3>2. Authentic Berber Culture & Warm Hospitality</h3>
<p>Imlil is inhabited by indigenous Amazigh (Berber) villagers who have farmed these steep terraced valleys for centuries. Driving yourself allows you to stop at local pottery workshops in <strong>Tahnaout</strong>, buy fresh walnuts directly from roadside stalls, and enjoy traditional mint tea prepared over charcoal.</p>

<h3>3. Breathtaking Panoramic Views at Kasbah du Toubkal</h3>
<p>Perched on a rocky promontory overlooking the entire Imlil valley, the famous <strong>Kasbah du Toubkal</strong> (formerly a feudal castle) offers world-renowned rooftop lunches with 360-degree views of Toubkal’s snow-dusted peaks.</p>

<div class="blog-cta-box" style="background:#0f1d36; color:white; padding:2rem; border-radius:14px; margin:2.5rem 0; text-align:center; box-shadow: 0 10px 25px rgba(15,29,54,0.15);">
    <h3 style="color:#c5a059; margin-bottom:0.5rem; font-size: 1.5rem;">Ready to Drive to Imlil & The Atlas Mountains?</h3>
    <p style="margin-bottom:1.25rem; opacity: 0.9;">Book your rental car directly with Car Airport Morocco. Free airport delivery, zero credit card deposit holds & unlimited mileage.</p>
    <a href="/en#cars" style="background:#c5a059; color:#0f1d36; padding:0.85rem 2rem; text-decoration:none; font-weight:800; border-radius:8px; display:inline-block; font-size: 1.05rem;">Browse Vehicles & Reserve Online</a>
</div>
',
                'featured_image' => '/images/imlil_village.jpg',
                'author' => 'High Atlas Travel Team',
                'read_time_minutes' => 9,
                'meta_title' => 'Self-Drive Guide to Imlil & Mount Toubkal from Marrakech 2026',
                'meta_description' => 'Planning to visit Imlil & Mount Toubkal by car? Complete self-drive guide covering road routes, car choices, parking at Imlil, Kasbah du Toubkal & hiking benefits.',
                'meta_keywords' => 'imlil drive marrakech, rent car imlil, mount toubkal self drive, high atlas driving guide',
                'is_published' => true,
            ],

            // ── 6. Destination 2: Agafay Desert ────────────────────────────────
            [
                'title' => 'Self-Drive Guide to Agafay Desert from Marrakech: Dirt Roads, Sunset & Quad Biking',
                'slug' => 'agafay-desert-car-rental-guide',
                'translation_group' => 'agafay-desert-guide',
                'locale' => 'en',
                'category' => 'Marrakech Destination',
                'excerpt' => 'Everything you need to know about driving from Marrakech to the Agafay Desert. Route tips, vehicle recommendations, quad bike camps, and sunset spots.',
                'content' => '
<h2>Driving to the Agafay Desert: Marrakech\'s Nearest Desert Oasis</h2>
<p>Located just <strong>30 kilometers southwest of Marrakech</strong> (a 40-to-50-minute drive), the <strong>Agafay Desert</strong> is a dramatic landscape of rolling white limestone hills, rocky canyons, and luxury eco-camps.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.12);">
    <img src="/images/agafay_desert.jpg" alt="Agafay Desert Sunset Road Trip from Marrakech" style="width: 100%; display: block; object-fit: cover; max-height: 420px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">Driving a rental SUV across the rocky tracks of Agafay Desert at sunset</div>
</div>

<div class="blog-cta-box" style="background:#0f1d36; color:white; padding:2rem; border-radius:14px; margin:2.5rem 0; text-align:center;">
    <h3 style="color:#c5a059; margin-bottom:0.5rem; font-size: 1.5rem;">Need an SUV for Your Agafay Desert Excursion?</h3>
    <p style="margin-bottom:1.25rem; opacity: 0.9;">Reserve an SUV or Economy car directly at Marrakech Airport (RAK) with unlimited mileage & zero hidden deposit fees.</p>
    <a href="/en#cars" style="background:#c5a059; color:#0f1d36; padding:0.85rem 2rem; text-decoration:none; font-weight:800; border-radius:8px; display:inline-block; font-size: 1.05rem;">Browse Vehicles & Reserve Now</a>
</div>
',
                'featured_image' => '/images/agafay_desert.jpg',
                'author' => 'Marrakech Destination Team',
                'read_time_minutes' => 7,
                'meta_title' => 'Self-Drive Guide to Agafay Desert from Marrakech 2026',
                'meta_description' => 'Planning to drive to Agafay Desert from Marrakech? Read our complete self-drive guide covering routes, vehicle choice, desert camps & sunset spots.',
                'meta_keywords' => 'agafay desert drive marrakech, rent car agafay, agafay self drive route',
                'is_published' => true,
            ],

            // ── 7. Destination 3: Lake Lalla Takerkoust ───────────────────────
            [
                'title' => 'Driving to Lake Lalla Takerkoust: Jet Skis, Water Sports & Lakeside Dining',
                'slug' => 'lalla-takerkoust-lake-marrakech-car-guide',
                'translation_group' => 'lalla-takerkoust-guide',
                'locale' => 'en',
                'category' => 'Marrakech Destination',
                'excerpt' => 'Escape the city heat with a 40-minute drive to Lake Lalla Takerkoust. Discover water sports, jet ski rentals, lakeside restaurants, and parking tips.',
                'content' => '
<h2>Lake Lalla Takerkoust: Marrakech\'s Waterfront Gateway</h2>
<p>Just <strong>38 kilometers southwest of Marrakech</strong>, the artificial reservoir lake of <strong>Lalla Takerkoust</strong> offers a refreshing contrast to the bustling city medina.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.12);">
    <img src="/images/lalla_takerkoust.jpg" alt="Lake Lalla Takerkoust Road Trip by Car" style="width: 100%; display: block; object-fit: cover; max-height: 420px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">Parked by the waterfront terrace at Lake Lalla Takerkoust with High Atlas peaks in background</div>
</div>
',
                'featured_image' => '/images/lalla_takerkoust.jpg',
                'author' => 'Marrakech Destination Team',
                'read_time_minutes' => 6,
                'meta_title' => 'Driving to Lake Lalla Takerkoust from Marrakech Guide',
                'meta_description' => 'Complete driving guide to Lake Lalla Takerkoust near Marrakech. Discover road routes, jet ski rentals, lakeside restaurants & parking tips.',
                'meta_keywords' => 'lalla takerkoust drive, marrakech lake car rental, day trip lalla takerkoust',
                'is_published' => true,
            ],

            // ── 8. Destination 4: ANIMA Garden & Ourika Valley ────────────────
            [
                'title' => 'Visiting ANIMA Garden & Ourika Valley by Car: Driving Route, Tickets & Parking',
                'slug' => 'anima-garden-ourika-valley-car-guide',
                'translation_group' => 'anima-garden-guide',
                'locale' => 'en',
                'category' => 'Marrakech Destination',
                'excerpt' => 'Drive 28 km south of Marrakech to experience André Heller\'s ANIMA Garden and Ourika Valley. Self-drive route, parking spots, and combined day itinerary.',
                'content' => '
<h2>ANIMA Garden: An Enchanted Botanical Paradise Near Marrakech</h2>
<p>Located just <strong>28 kilometers south of Marrakech</strong> along the Ourika Valley road (P2017), <strong>ANIMA Garden</strong> created by Austrian artist André Heller is widely regarded as one of the most beautiful botanical gardens in the world.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.12);">
    <img src="/images/anima_garden.jpg" alt="ANIMA Garden Andre Heller Near Marrakech" style="width: 100%; display: block; object-fit: cover; max-height: 420px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">Exotic tropical flora and modern art sculptures inside ANIMA Garden with High Atlas views</div>
</div>
',
                'featured_image' => '/images/anima_garden.jpg',
                'author' => 'Marrakech Destination Team',
                'read_time_minutes' => 6,
                'meta_title' => 'ANIMA Garden & Ourika Valley Self-Drive Guide Marrakech',
                'meta_description' => 'Complete guide to visiting Andre Heller\'s ANIMA Garden by rental car from Marrakech. Includes driving directions, parking info & tickets.',
                'meta_keywords' => 'anima garden drive, marrakech ourika valley car rental, anima garden parking',
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
