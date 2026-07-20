<x-mail::message>
# Hello {{ $booking->customer_name }},

Thank you for choosing **Car Airport Morocco**! We have received your booking request and compiled your reservation summary below.

---

### 🚗 Reservation Reference: `{{ $booking->booking_reference }}`

*   **Vehicle Model:** {{ $car->brand }} {{ $car->model }}
*   **Pick-up Location:** {{ $booking->pickup_location }}
*   **Return Location:** {{ $booking->return_location ?? $booking->pickup_location }}
*   **Pick-up Date & Time:** {{ \Carbon\Carbon::parse($booking->pickup_datetime)->format('M d, Y H:i') }}
*   **Return Date & Time:** {{ \Carbon\Carbon::parse($booking->return_datetime)->format('M d, Y H:i') }}
*   **Estimated Cost:** {{ round($booking->total_price) }} MAD (approx. {{ round($booking->total_price / 11) }} EUR)

---

### 🗺️ Airport Pick-up Meet & Greet Guide
To make your arrival at the airport seamless:
1. Upon landing, proceed past the baggage claim area to the exit doors.
2. Our representative will be waiting for you inside the terminal arrivals lounge or right outside the passenger terminal exits holding a sign displaying: **"{{ $booking->customer_name }}"**.
3. If you have any trouble locating our staff, please tap the WhatsApp chat button below to contact our coordinator instantly.

<x-mail::button :url="'https://wa.me/212600988632?text=Hello%20I%20arrived%20at%20the%20airport%20Reference%3A%20' . $booking->booking_reference">
💬 Contact Coordinator via WhatsApp
</x-mail::button>

### 🛠️ Need to change your reservation details?
You can view, modify or cancel your booking at any time via the link below:

<x-mail::button :url="url('/' . app()->getLocale())">
🔗 View/Manage My Booking
</x-mail::button>

Safe travels and we look forward to meeting you!

Best regards,<br>
**The Car Airport Morocco Team**
</x-mail::message>
