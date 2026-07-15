<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleet Administration | Car Airport Morocco</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-dark: #0f1d36;
            --accent-gold: #c5a059;
            --text-dark: #334155;
            --bg-light: #f8fafc;
            --border-color: #cbd5e1;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            padding-bottom: 5rem;
        }
        
        header {
            background-color: var(--primary-dark);
            color: white;
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            color: var(--accent-gold);
        }
        
        .header-links a {
            color: white;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            background: rgba(255,255,255,0.1);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: background 0.3s;
        }
        
        .header-links a:hover {
            background: var(--accent-gold);
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        
        /* Stats Widgets */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            border-left: 4px solid var(--accent-gold);
        }
        
        .stat-card h3 {
            font-size: 0.8rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }
        
        .stat-card .value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-dark);
        }
        
        /* Layout Grid */
        .admin-grid {
            display: grid;
            grid-template-columns: 1.8fr 1.2fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .panel {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
        }
        
        .panel h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 0.75rem;
        }
        
        /* Forms styling */
        .form-group {
            margin-bottom: 1.2rem;
        }
        
        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 0.4rem;
            color: #475569;
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.7rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            outline: none;
            font-family: inherit;
        }
        
        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--accent-gold);
        }
        
        .btn-submit {
            background: var(--primary-dark);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            transition: opacity 0.3s;
        }
        
        .btn-submit:hover {
            opacity: 0.9;
        }
        
        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
            margin-top: 1rem;
        }
        
        th, td {
            padding: 0.75rem 1rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        
        th {
            background-color: #f8fafc;
            font-weight: 600;
            color: #475569;
        }
        
        tr:hover {
            background-color: #faf5eb;
        }
        
        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 700;
            display: inline-block;
        }
        
        .badge-pending { background-color: #fef3c7; color: #d97706; }
        .badge-confirmed { background-color: #d1fae5; color: #065f46; }
        .badge-cancelled { background-color: #fee2e2; color: #991b1b; }
        
        .badge-source-whatsapp { background-color: #dcfce7; color: #15803d; }
        .badge-source-web { background-color: #e0f2fe; color: #0369a1; }
        .badge-source-ota { background-color: #f3e8ff; color: #6b21a8; }
        
        /* Alert message */
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <header>
        <h1>Car Airport Morocco - Fleet Manager</h1>
        <div class="header-links">
            <a href="{{ route('home', ['locale' => $locale]) }}" target="_blank">View Main Site</a>
        </div>
    </header>

    <div class="container">
        
        @if(session('success'))
        <div class="alert-success">
            ✓ {{ session('success') }}
        </div>
        @endif
        
        <!-- Stats Widgets -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Fleet Size</h3>
                <div class="value">{{ $cars->sum('quantity') }} Vehicles</div>
            </div>
            
            <div class="stat-card">
                <h3>Active Bookings</h3>
                <div class="value">{{ $bookings->where('status', 'confirmed')->count() }} Confirmed</div>
            </div>
            
            <div class="stat-card">
                <h3>Pending Bookings</h3>
                <div class="value">{{ $bookings->where('status', 'pending')->count() }} Pending</div>
            </div>
            
            <div class="stat-card">
                <h3>Total Projected Earnings</h3>
                <div class="value">{{ number_format($bookings->where('status', 'confirmed')->sum('total_price')) }} DH</div>
            </div>
        </div>

        <!-- Section 1: Fleet Management & Add Car -->
        <div class="admin-grid">
            <div class="panel">
                <h2>Active Fleet Vehicles</h2>
                
                <table>
                    <thead>
                        <tr>
                            <th>Car Model</th>
                            <th>Category</th>
                            <th>Qty</th>
                            <th>Overbook?</th>
                            <th>Base Rate</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                        <tr>
                            <td><strong>{{ $car->brand }} {{ $car->model }}</strong></td>
                            <td>{{ $car->category }}</td>
                            <td>{{ $car->quantity }}</td>
                            <td>
                                <span class="badge" style="background-color: {{ $car->allow_overbooking ? '#d1fae5; color: #065f46;' : '#f1f5f9; color: #475569;' }}">
                                    {{ $car->allow_overbooking ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td>{{ $car->base_price }} DH</td>
                            <td>
                                <form action="{{ route('admin.car.delete', ['locale' => $locale, 'id' => $car->id]) }}" method="POST" onsubmit="return confirm('Remove vehicle from database?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel">
                <h2>Add Vehicle to Fleet</h2>
                <form action="{{ route('admin.car.store', ['locale' => $locale]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" name="brand" placeholder="e.g. Dacia" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Model Name</label>
                        <input type="text" name="model" placeholder="e.g. Logan" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category">
                            <option value="Economy">Economy</option>
                            <option value="SUV">SUV</option>
                            <option value="Van">Van</option>
                            <option value="Luxury">Luxury</option>
                        </select>
                    </div>
                    
                    <div style="display: flex; gap: 1rem;">
                        <div class="form-group" style="flex: 1;">
                            <label>Seats Count</label>
                            <input type="number" name="seats" value="5" min="2" max="15" required>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label>Transmission</label>
                            <select name="transmission">
                                <option value="Manual">Manual</option>
                                <option value="Automatic">Automatic</option>
                            </select>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 1rem;">
                        <div class="form-group" style="flex: 1;">
                            <label>Fleet Quantity</label>
                            <input type="number" name="quantity" value="1" min="1" required>
                        </div>
                        <div class="form-group" style="flex: 1;">
                            <label>Base Price per Day (DH)</label>
                            <input type="number" name="base_price" placeholder="350" required>
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.5rem;">
                        <label style="display:flex; gap:0.5rem; align-items:center; font-size: 0.8rem; font-weight:600; cursor:pointer;">
                            <input type="checkbox" name="ac" checked style="width:auto;"> Include AC
                        </label>
                        <label style="display:flex; gap:0.5rem; align-items:center; font-size: 0.8rem; font-weight:600; cursor:pointer;">
                            <input type="checkbox" name="allow_overbooking" style="width:auto;"> Allow Overbooking (Overpass limits)
                        </label>
                    </div>

                    <div class="form-group">
                        <label>Static Image URL path</label>
                        <input type="text" name="image_path" placeholder="/images/dacia_logan.jpg">
                    </div>
                    
                    <div class="form-group">
                        <label>Hover MP4 Video URL path</label>
                        <input type="text" name="video_path" placeholder="/videos/dacia_logan.mp4">
                    </div>
                    
                    <button type="submit" class="btn-submit">Save New Vehicle</button>
                </form>
            </div>
        </div>

        <!-- Section 2: Seasonal Pricing & Rules -->
        <div class="admin-grid">
            <div class="panel">
                <h2>Active Seasonal Adjustments</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Rule Name</th>
                            <th>Vehicle Filter</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Adjustment</th>
                            <th>Value</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seasonalPrices as $rule)
                        <tr>
                            <td><strong>{{ $rule->name }}</strong></td>
                            <td>{{ $rule->car ? $rule->car->brand . ' ' . $rule->car->model : 'All Vehicles' }}</td>
                            <td>{{ $rule->start_date }}</td>
                            <td>{{ $rule->end_date }}</td>
                            <td>{{ $rule->adjustment_type == 'percentage' ? 'Percentage' : 'Flat Price Override' }}</td>
                            <td>
                                {{ $rule->adjustment_type == 'percentage' ? ($rule->value > 1.0 ? '+' . (($rule->value - 1.0)*100) . '%' : ($rule->value*100) . '%') : ($rule->value . ' DH') }}
                            </td>
                            <td>
                                <form action="{{ route('admin.pricing.delete', ['locale' => $locale, 'id' => $rule->id]) }}" method="POST" onsubmit="return confirm('Remove this rule?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel">
                <h2>Add Seasonal Price Rule</h2>
                <form action="{{ route('admin.pricing.store', ['locale' => $locale]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Rule Name</label>
                        <input type="text" name="name" placeholder="e.g. Summer Season Peak" required>
                    </div>

                    <div class="form-group">
                        <label>Apply to Vehicle</label>
                        <select name="car_id">
                            <option value="">All Vehicles (Global)</option>
                            @foreach($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="display:flex; gap:1rem;">
                        <div class="form-group" style="flex:1;">
                            <label>Start Date</label>
                            <input type="date" name="start_date" required>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label>End Date</label>
                            <input type="date" name="end_date" required>
                        </div>
                    </div>

                    <div style="display:flex; gap:1rem;">
                        <div class="form-group" style="flex:1;">
                            <label>Adjustment Type</label>
                            <select name="adjustment_type">
                                <option value="percentage">Percentage Multiplier</option>
                                <option value="flat_rate">Flat Price Override</option>
                            </select>
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label>Value</label>
                            <input type="number" step="0.01" name="value" placeholder="e.g. 1.30 or 400" required>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">Save Pricing Rule</button>
                </form>
            </div>
        </div>

        <!-- Section 3: Booking Log -->
        <div class="panel" style="margin-bottom: 5rem;">
            <h2>Recent Reservation Log</h2>
            
            <table>
                <thead>
                    <tr>
                        <th>Ref</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Car</th>
                        <th>Pickup Date</th>
                        <th>Return Date</th>
                        <th>Total</th>
                        <th>Source</th>
                        <th>Status</th>
                        <th>Update Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td><code>{{ $booking->booking_reference }}</code></td>
                        <td>{{ $booking->customer_name }}</td>
                        <td><a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->customer_phone) }}" target="_blank">{{ $booking->customer_phone }}</a></td>
                        <td>{{ $booking->car->brand }} {{ $booking->car->model }}</td>
                        <td>{{ $booking->pickup_datetime->format('Y-m-d H:i') }}</td>
                        <td>{{ $booking->return_datetime->format('Y-m-d H:i') }}</td>
                        <td><strong>{{ number_format($booking->total_price) }} DH</strong></td>
                        <td>
                            <span class="badge badge-source-{{ $booking->source == 'website' ? 'web' : ($booking->source == 'whatsapp' ? 'whatsapp' : 'ota') }}">
                                {{ strtoupper($booking->source) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-{{ $booking->status }}">
                                {{ strtoupper($booking->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.booking.status', ['locale' => $locale, 'id' => $booking->id]) }}" method="POST" style="display:flex; gap:0.25rem;">
                                @csrf
                                <select name="status" style="padding: 0.2rem; font-size:0.75rem;">
                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirm</option>
                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancel</option>
                                </select>
                                <button type="submit" style="padding:0.2rem 0.4rem; font-size:0.75rem; background:#cbd5e1; border:none; cursor:pointer; border-radius:4px;">Go</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
