<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            // ── Destination 1: Agafay Desert ────────────────────────────────────
            [
                'title' => 'Self-Drive Guide to Agafay Desert from Marrakech: Dirt Roads, Sunset & Quad Biking',
                'slug' => 'agafay-desert-car-rental-guide',
                'translation_group' => 'agafay-desert-guide',
                'locale' => 'en',
                'category' => 'Marrakech Destination',
                'excerpt' => 'Everything you need to know about driving from Marrakech to the Agafay Desert. Route tips, vehicle recommendations, quad bike camps, and sunset spots.',
                'content' => '
<h2>Driving to the Agafay Desert: Marrakech\'s Nearest Desert Oasis</h2>
<p>Located just <strong>30 kilometers southwest of Marrakech</strong> (a 40-to-50-minute drive), the <strong>Agafay Desert</strong> is a dramatic landscape of rolling white limestone hills, rocky canyons, and luxury eco-camps. Unlike the distant Erg Chebbi sand dunes in Merzouga (which require a 9-hour drive), Agafay can easily be visited on a afternoon self-drive excursion from Marrakech.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.12);">
    <img src="/images/agafay_desert.jpg" alt="Agafay Desert Sunset Road Trip from Marrakech" style="width: 100%; display: block; object-fit: cover; max-height: 420px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">Driving a rental SUV across the rocky tracks of Agafay Desert at sunset</div>
</div>

<h3>1. Driving Route & Road Conditions</h3>
<p>From Marrakech city center or Menara Airport, take the <strong>R212 road</strong> toward Tameslouht. After passing Tameslouht, follow the signs turning right onto the P2013 road towards Agafay.</p>
<ul>
    <li><strong>Road Quality:</strong> The main connecting roads (R212 and P2013) are 100% paved tarmac. However, accessing individual desert camps and quad biking centers requires driving on unpaved dirt tracks ("pistes").</li>
    <li><strong>Recommended Vehicle:</strong> While a standard economy sedan (like a Dacia Logan) can navigate main dirt tracks at slow speeds during dry weather, booking a compact SUV like the <strong>Volkswagen T-Roc</strong> or <strong>Audi Q3</strong> provides superior ground clearance and peace of mind over rocky gravel.</li>
</ul>

<h3>2. Top Things to Do in Agafay with Your Rental Car</h3>
<ul>
    <li><strong>Sunset Dinner at a Desert Camp:</strong> Camps like <em>Inara Camp</em>, <em>Scarabeo Camp</em>, and <em>Le Bedouin</em> offer day passes for pool access and sunset candlelit Moroccan dinners.</li>
    <li><strong>Quad & Buggy Adventures:</strong> Park your car at any major camp and hire a 2-hour guided quad bike tour across the dry riverbeds.</li>
    <li><strong>Stargazing:</strong> Thanks to zero light pollution, staying until after dark offers magnificent views of the Milky Way against the Atlas Mountain silhouette.</li>
</ul>

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

            // ── Destination 2: Lake Lalla Takerkoust ───────────────────────────
            [
                'title' => 'Driving to Lake Lalla Takerkoust: Jet Skis, Water Sports & Lakeside Dining',
                'slug' => 'lalla-takerkoust-lake-marrakech-car-guide',
                'translation_group' => 'lalla-takerkoust-guide',
                'locale' => 'en',
                'category' => 'Marrakech Destination',
                'excerpt' => 'Escape the city heat with a 40-minute drive to Lake Lalla Takerkoust. Discover water sports, jet ski rentals, lakeside restaurants, and parking tips.',
                'content' => '
<h2>Lake Lalla Takerkoust: Marrakech\'s Waterfront Gateway</h2>
<p>Just <strong>38 kilometers southwest of Marrakech</strong>, the artificial reservoir lake of <strong>Lalla Takerkoust</strong> offers a refreshing contrast to the bustling city medina. Built in the 1920s to supply Marrakech with electricity and irrigation, today it is a premier recreation hotspot for jet skiing, quad biking, and lakeside dining with panoramic High Atlas mountain views.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.12);">
    <img src="/images/lalla_takerkoust.jpg" alt="Lake Lalla Takerkoust Road Trip by Car" style="width: 100%; display: block; object-fit: cover; max-height: 420px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">Parked by the waterfront terrace at Lake Lalla Takerkoust with High Atlas peaks in background</div>
</div>

<h3>1. Driving Directions & Road Route</h3>
<p>The drive from Marrakech to Lake Lalla Takerkoust takes roughly <strong>40 to 45 minutes</strong> along smooth, fully paved two-lane asphalt roads (R212).</p>
<ul>
    <li><strong>Driving Ease:</strong> Very easy. The road is flat and direct, making it ideal even for first-time drivers in Morocco.</li>
    <li><strong>Best Car Choice:</strong> Any vehicle class (Economy sedan like Dacia Logan or Renault Clio 5).</li>
    <li><strong>Parking:</strong> Plentiful dedicated parking lots are located right in front of major lakefront restaurants for 10–20 DH.</li>
</ul>

<h3>2. Top Activities at the Lake</h3>
<ul>
    <li><strong>Jet Skiing & Stand-Up Paddleboarding:</strong> Several water sports centers along the northern dam wall rent jet skis by the half-hour.</li>
    <li><strong>Lakeside Lunch:</strong> Places like <em>Le Relais du Lac</em> and <em>Flouka</em> serve traditional tagines, grilled fish, and French Mediterranean cuisine on outdoor garden terraces directly over the water.</li>
    <li><strong>Combine with Agafay:</strong> Since Agafay Desert borders the west side of Lake Lalla Takerkoust, you can easily combine both destinations in a single afternoon loop!</li>
</ul>
',
                'featured_image' => '/images/lalla_takerkoust.jpg',
                'author' => 'Marrakech Destination Team',
                'read_time_minutes' => 6,
                'meta_title' => 'Driving to Lake Lalla Takerkoust from Marrakech Guide',
                'meta_description' => 'Complete driving guide to Lake Lalla Takerkoust near Marrakech. Discover road routes, jet ski rentals, lakeside restaurants & parking tips.',
                'meta_keywords' => 'lalla takerkoust drive, marrakech lake car rental, day trip lalla takerkoust',
                'is_published' => true,
            ],

            // ── Destination 3: Imlil & Mount Toubkal ──────────────────────────
            [
                'title' => 'Driving to Imlil & Mount Toubkal Foothills: Mountain Roads & Berber Trails',
                'slug' => 'imlil-toubkal-mountain-drive-marrakech',
                'translation_group' => 'imlil-mountain-guide',
                'locale' => 'en',
                'category' => 'Marrakech Destination',
                'excerpt' => 'A complete guide to driving from Marrakech into the High Atlas mountain village of Imlil. Mountain pass advice, parking at Imlil, and hiking trails.',
                'content' => '
<h2>Imlil: The Gateway to Mount Toubkal (4,167m)</h2>
<p>Nestled deep in the High Atlas range <strong>67 kilometers south of Marrakech</strong>, the peaceful Berber mountain village of <strong>Imlil</strong> is the starting point for trekking to Mount Toubkal, the highest peak in North Africa. Surrounded by walnut orchards, cascading mountain streams, and stone hamlets, driving to Imlil is one of Morocco’s most rewarding alpine journeys.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.12);">
    <img src="/images/imlil_village.jpg" alt="Imlil Mountain Village Drive High Atlas Morocco" style="width: 100%; display: block; object-fit: cover; max-height: 420px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">Overlooking Imlil village and snow-capped Toubkal peaks from a mountain road overlook</div>
</div>

<h3>1. Mountain Driving Route & Conditions</h3>
<p>Take the <strong>R203 highway</strong> south from Marrakech through Tahnaout and Asni. At Asni, turn left onto the mountain road leading up the Imlil valley.</p>
<ul>
    <li><strong>Driving Time:</strong> ~1 hour 30 minutes from Marrakech.</li>
    <li><strong>Road Condition:</strong> The entire road up to Imlil is paved. It features sharp hairpin turns and scenic mountain inclines, so drive at moderate speeds.</li>
    <li><strong>Recommended Vehicle:</strong> While compact cars can reach Imlil, a vehicle with strong engine torque (or an SUV like the <strong>Volkswagen Touareg or T-Roc</strong>) makes mountain climbing effortless and comfortable.</li>
</ul>

<h3>2. Parking & Exploring Imlil</h3>
<p>Upon arriving in Imlil village center, park your vehicle at the secure central municipal parking lot (15–20 DH per day). From there, you can hike on foot or hire a local mule guide to visit <strong>Armed Village</strong> or the <strong>Cascade d\'Imlil waterfalls</strong>.</p>
',
                'featured_image' => '/images/imlil_village.jpg',
                'author' => 'High Atlas Travel Team',
                'read_time_minutes' => 7,
                'meta_title' => 'Driving to Imlil & Mount Toubkal from Marrakech Guide 2026',
                'meta_description' => 'Self-drive guide from Marrakech to Imlil in the High Atlas Mountains. Route tips, mountain pass safety, parking info & hiking trails.',
                'meta_keywords' => 'imlil drive marrakech, toubkal car rental, high atlas driving guide',
                'is_published' => true,
            ],

            // ── Destination 4: ANIMA Garden & Ourika Valley ────────────────────
            [
                'title' => 'Visiting ANIMA Garden & Ourika Valley by Car: Driving Route, Tickets & Parking',
                'slug' => 'anima-garden-ourika-valley-car-guide',
                'translation_group' => 'anima-garden-guide',
                'locale' => 'en',
                'category' => 'Marrakech Destination',
                'excerpt' => 'Drive 28 km south of Marrakech to experience André Heller\'s ANIMA Garden and Ourika Valley. Self-drive route, parking spots, and combined day itinerary.',
                'content' => '
<h2>ANIMA Garden: An Enchanted Botanical Paradise Near Marrakech</h2>
<p>Located just <strong>28 kilometers south of Marrakech</strong> along the Ourika Valley road (P2017), <strong>ANIMA Garden</strong> created by Austrian artist André Heller is widely regarded as one of the most beautiful and whimsical botanical gardens in the world.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.12);">
    <img src="/images/anima_garden.jpg" alt="ANIMA Garden Andre Heller Near Marrakech" style="width: 100%; display: block; object-fit: cover; max-height: 420px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">Exotic tropical flora and modern art sculptures inside ANIMA Garden with High Atlas views</div>
</div>

<h3>1. How to Get There by Rental Car</h3>
<p>Drive south from Marrakech along the <strong>Route de l\'Ourika (P2017)</strong> for approximately 30 minutes. Signs for ANIMA will be visible on your left at Douar Setti Fatma junction.</p>
<ul>
    <li><strong>Parking:</strong> Free, guarded private parking is available right at the garden entrance for visitors.</li>
    <li><strong>Driving Time:</strong> ~30 minutes from Marrakech Gueliz or Airport.</li>
</ul>

<h3>2. Combined Day Itinerary</h3>
<p>After spending 1.5 to 2 hours wandering through ANIMA Garden\'s shady palm paths and art installations, continue 25 minutes further south along the same road to reach <strong>Setti Fatma</strong> in the Ourika Valley for a riverside lunch!</p>
',
                'featured_image' => '/images/anima_garden.jpg',
                'author' => 'Marrakech Destination Team',
                'read_time_minutes' => 6,
                'meta_title' => 'ANIMA Garden & Ourika Valley Self-Drive Guide Marrakech',
                'meta_description' => 'Complete guide to visiting Andre Heller\'s ANIMA Garden by rental car from Marrakech. Includes driving directions, parking info & tickets.',
                'meta_keywords' => 'anima garden drive, marrakech ourika valley car rental, anima garden parking',
                'is_published' => true,
            ],

            // ── French Translations ───────────────────────────────────────────
            [
                'title' => 'Guide de Conduite au Désert d\'Agafay depuis Marrakech : Route, Pistes & Coucher de Soleil',
                'slug' => 'guide-desert-agafay-location-voiture-marrakech',
                'translation_group' => 'agafay-desert-guide',
                'locale' => 'fr',
                'category' => 'Destination Marrakech',
                'excerpt' => 'Tout savoir sur le trajet en voiture de Marrakech au Désert d\'Agafay. Conseils de route, choix du véhicule, camps désertiques et points de vue.',
                'content' => '
<h2>Conduire vers le Désert d\'Agafay depuis Marrakech</h2>
<p>Situé à seulement <strong>30 kilomètres au sud-ouest de Marrakech</strong> (40 minutes de route), le <strong>Désert d\'Agafay</strong> offre un paysage spectaculaire de collines rocheuses et de camps de luxe sous les étoiles.</p>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.12);">
    <img src="/images/agafay_desert.jpg" alt="Road Trip Désert Agafay Marrakech" style="width: 100%; display: block; object-fit: cover; max-height: 420px;">
</div>

<h3>1. État de la Route et Véhicule Conseillé</h3>
<p>Les routes principales (R212) sont 100% goudronnées. Pour accéder aux camps au cœur des dunes rocheuses, optez idéalement pour un <strong>SUV (ex: Volkswagen T-Roc ou Audi Q3)</strong> pour une garde au sol optimale sur les pistes en gravier.</p>
',
                'featured_image' => '/images/agafay_desert.jpg',
                'author' => 'Équipe Car Airport',
                'read_time_minutes' => 6,
                'meta_title' => 'Guide Conduite Désert d\'Agafay depuis Marrakech 2026',
                'meta_description' => 'Prévoyez votre excursion en voiture au Désert d\'Agafay. Conseils itinéraire, choix de voiture SUV et camps nomades.',
                'meta_keywords' => 'desert agafay voiture marrakech, louer voiture agafay',
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
