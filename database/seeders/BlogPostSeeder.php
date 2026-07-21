<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            // ── Destination 1: Imlil & Mount Toubkal ──────────────────────────
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

<p>While excursion agencies charge upwards of 600–800 DH per person for rigid group bus tours, **renting your own car from Car Airport Morocco** gives you total independence. You can leave early to avoid crowds, stop at scenic mountain lookouts whenever you wish, and explore hidden Berber hamlets at your own rhythm.</p>

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
<p>Perched on a rocky promontory overlooking the entire Imlil valley, the famous <strong>Kasbah du Toubkal</strong> (formerly a feudal castle) offers world-renowned rooftop lunches with 360-degree views of Toubkal’s snow-dusted peaks. Having your own rental car means you can reserve a lunch table without rushing back for a tour bus departure.</p>

<h3>4. Hiking Trails & Hidden Waterfalls (Cascade d\'Imlil & Aroumd)</h3>
<ul>
    <li><strong>Cascade d\'Imlil:</strong> A gentle 25-minute walk from the parking lot brings you to fresh mountain waterfalls where local cafes serve fresh orange juice right in the stream.</li>
    <li><strong>Aroumd Village (1,900m):</strong> A scenic 1-hour hike up a paved trail leads to Aroumd, an ancient stone village built on a massive glacial moraine with views of the Toubkal massif.</li>
</ul>

<div style="margin: 2rem 0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.12);">
    <img src="/images/marrakech_roadtrip.jpg" alt="Mountain Pass Drive to Imlil" style="width: 100%; display: block; object-fit: cover; max-height: 400px;">
    <div style="background: #f8fafc; padding: 0.75rem 1rem; font-size: 0.85rem; color: #64748b; font-style: italic; text-align: center;">The well-paved mountain highway R203 leading through the Asni Valley up into Imlil</div>
</div>

<h2>Step-by-Step Self-Drive Itinerary & Practical Advice</h2>

<h3>Distance, Duration & Driving Route</h3>
<ul>
    <li><strong>Distance:</strong> 67 km from Marrakech Menara Airport (RAK) or Gueliz.</li>
    <li><strong>Driving Time:</strong> 1 hour 25 minutes each way.</li>
    <li><strong>Route:</strong> Take the **R203 highway** south through Tahnaout to Asni. At the Asni roundabout, take the left exit onto the Imlil road (P2015).</li>
    <li><strong>Road Quality:</strong> 100% paved asphalt road. The mountain section after Asni features gentle hairpin bends and scenic curves. It is smooth, safe, and regularly maintained.</li>
</ul>

<h3>Recommended Car Choice</h3>
<p>While standard economy hatchbacks (like a <strong>Renault Clio 5</strong> or <strong>Dacia Logan</strong>) easily manage the climb, booking a diesel vehicle or compact SUV (such as a <strong>Volkswagen T-Roc</strong> or <strong>Audi Q3</strong>) gives you extra engine torque for climbing mountain inclines smoothly with passengers and luggage.</p>

<h3>Parking & Local Security</h3>
<p>Driving in Imlil is stress-free. Upon reaching the village square, you will find the main guarded municipal parking area. Official parking attendants wearing vests will guide you into a spot for a flat fee of **15 to 20 DH ($1.50 - $2.00 USD)** for the whole day.</p>

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

            // ── Destination 2: Agafay Desert ────────────────────────────────────
            [
                'title' => 'Self-Drive Guide to Agafay Desert from Marrakech: Dirt Roads, Sunset & Quad Biking',
                'slug' => 'agafay-desert-car-rental-guide',
                'translation_group' => 'agafay-desert-guide',
                'locale' => 'en',
                'category' => 'Marrakech Destination',
                'excerpt' => 'Everything you need to know about driving from Marrakech to the Agafay Desert. Route tips, vehicle recommendations, quad bike camps, and sunset spots.',
                'content' => '
<h2>Driving to the Agafay Desert: Marrakech\'s Nearest Desert Oasis</h2>
<p>Located just <strong>30 kilometers southwest of Marrakech</strong> (a 40-to-50-minute drive), the <strong>Agafay Desert</strong> is a dramatic landscape of rolling white limestone hills, rocky canyons, and luxury eco-camps. Unlike the distant Erg Chebbi sand dunes in Merzouga (which require a 9-hour drive), Agafay can easily be visited on an afternoon self-drive excursion from Marrakech.</p>

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

            // ── Destination 3: Lake Lalla Takerkoust ───────────────────────────
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
