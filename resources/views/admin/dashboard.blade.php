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
        
        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10000;
            justify-content: center;
            align-items: center;
            padding: 1.5rem;
        }

        .modal-content {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            max-width: 600px;
            width: 100%;
            position: relative;
            box-shadow: 0 10px 25px rgba(15, 29, 54, 0.2);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-dark);
        }
    </style>
</head>
<body>

    <header>
        <h1>Car Airport Morocco - Fleet Manager</h1>
        <div class="header-links" style="display: flex; gap: 1rem; align-items: center;">
            <a href="/{{ $locale }}" target="_blank">View Main Site</a>
            <form action="/{{ $locale }}/admin/logout" method="POST" style="margin: 0; padding: 0; display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #fca5a5; font-weight: 600; cursor: pointer; font-size: 0.95rem;">Logout</button>
            </form>
        </div>
    </header>

    <div class="container">
        
        @if(session('success'))
        <div class="alert-success">
            ✓ {{ session('success') }}
        </div>
        @endif
        
        <!-- Stats Widgets -->
        <div class="stats-grid" style="margin-bottom: 2rem;">
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
            
            <div class="stat-card" style="border-left: 4px solid #10b981;">
                <h3>Projected Revenues</h3>
                <div class="value" style="color: #10b981;">{{ number_format($bookings->where('status', 'confirmed')->sum('total_price')) }} DH</div>
            </div>
        </div>

        <div class="stats-grid" style="margin-bottom: 2rem; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
            <div class="stat-card" style="border-left: 4px solid #ef4444;">
                <h3>Total Monthly Expenses</h3>
                <div class="value" style="color: #ef4444;">{{ number_format($totalMonthlyExpenses) }} DH</div>
                <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.25rem;">Loan/Insurance/Service/Fuel</div>
            </div>
            
            <div class="stat-card" style="border-left: 4px solid #c5a059;">
                <h3>Net Projected Revenue</h3>
                <div class="value" style="color: #c5a059;">
                    {{ number_format($bookings->where('status', 'confirmed')->sum('total_price') - $totalMonthlyExpenses) }} DH
                </div>
                <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.25rem;">Projected Rev - Monthly Exp</div>
            </div>

            <div class="stat-card" style="grid-column: span 2;">
                <h3>Unique Visitors (24h / 7d / 30d)</h3>
                <div class="value" style="font-size: 1.5rem; padding-top: 0.5rem;">
                    <strong>{{ $visits24h }}</strong> <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;">last 24h</span>
                    &nbsp;|&nbsp; <strong>{{ $visits7d }}</strong> <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;">7 days</span>
                    &nbsp;|&nbsp; <strong>{{ $visits30d }}</strong> <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;">30 days</span>
                </div>
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
                            <th>Monthly Exp</th>
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
                                <span style="font-weight:600; color: #ef4444;">
                                    {{ $car->loan_cost + $car->insurance_cost + $car->maintenance_cost + $car->fuel_cost + $car->other_cost }} DH
                                </span>
                            </td>
                            <td>
                                <a href="#" onclick="openEditModal({{ json_encode($car) }})" style="color: #c5a059; margin-right: 0.5rem; text-decoration: none; font-weight: 600;">Edit</a>
                                <form action="/{{ $locale }}/admin/cars/{{ $car->id }}" method="POST" onsubmit="return confirm('Remove vehicle from database?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:red; background:none; border:none; cursor:pointer; font-weight: 600;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="panel">
                <h2>Add Vehicle to Fleet</h2>
                <form action="/{{ $locale }}/admin/cars" method="POST">
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

                    <div style="margin-top: 1rem; border-top: 1px solid var(--border-color); padding-top: 1rem;">
                        <h3 style="font-size: 0.9rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 0.75rem;">Monthly Operating Expenses (DH)</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-bottom: 1.5rem;">
                            <div class="form-group">
                                <label>Loan/Lease Fee</label>
                                <input type="number" name="loan_cost" value="0" min="0">
                            </div>
                            <div class="form-group">
                                <label>Insurance Fee</label>
                                <input type="number" name="insurance_cost" value="0" min="0">
                            </div>
                            <div class="form-group">
                                <label>Service/Maintenance</label>
                                <input type="number" name="maintenance_cost" value="0" min="0">
                            </div>
                            <div class="form-group">
                                <label>Fuel Cost</label>
                                <input type="number" name="fuel_cost" value="0" min="0">
                            </div>
                            <div class="form-group" style="grid-column: span 2;">
                                <label>Other Fees (Taxes, cleaning...)</label>
                                <input type="number" name="other_cost" value="0" min="0">
                            </div>
                        </div>
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
                                <form action="/{{ $locale }}/admin/pricing/{{ $rule->id }}" method="POST" onsubmit="return confirm('Remove this rule?')" style="display:inline;">
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
                <form action="/{{ $locale }}/admin/pricing" method="POST">
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
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 1.5rem;">
                <h2>Recent Reservation Log</h2>
                <button onclick="openManualBookingModal()" style="background:var(--primary-dark); color:white; border:none; padding:0.6rem 1.2rem; border-radius:6px; font-weight:700; cursor:pointer;">+ Add Manual Booking</button>
            </div>
            
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
                        <td>{{ $booking->car ? $booking->car->brand . ' ' . $booking->car->model : 'Deleted Car' }}</td>
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
                            <form action="/{{ $locale }}/admin/bookings/{{ $booking->id }}/status" method="POST" style="display:flex; gap:0.25rem;">
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

    <!-- Edit Car Modal -->
    <div id="editCarModal" class="modal">
        <div class="modal-content">
            <button onclick="closeEditModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Edit Fleet Vehicle</h2>
            <form id="editCarForm" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label>Brand Name</label>
                    <input type="text" name="brand" id="edit_brand" required>
                </div>
                <div class="form-group">
                    <label>Model Name</label>
                    <input type="text" name="model" id="edit_model" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" id="edit_category">
                        <option value="Economy">Economy</option>
                        <option value="SUV">SUV</option>
                        <option value="Van">Van</option>
                        <option value="Luxury">Luxury</option>
                    </select>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Seats Count</label>
                        <input type="number" name="seats" id="edit_seats" min="2" max="15" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Transmission</label>
                        <select name="transmission" id="edit_transmission">
                            <option value="Manual">Manual</option>
                            <option value="Automatic">Automatic</option>
                        </select>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Fleet Quantity</label>
                        <input type="number" name="quantity" id="edit_quantity" min="1" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Base Price per Day (DH)</label>
                        <input type="number" name="base_price" id="edit_base_price" required>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.5rem;">
                    <label style="display:flex; gap:0.5rem; align-items:center; font-size: 0.8rem; font-weight:600; cursor:pointer;">
                        <input type="checkbox" name="ac" id="edit_ac" style="width:auto;"> Include AC
                    </label>
                    <label style="display:flex; gap:0.5rem; align-items:center; font-size: 0.8rem; font-weight:600; cursor:pointer;">
                        <input type="checkbox" name="allow_overbooking" id="edit_allow_overbooking" style="width:auto;"> Allow Overbooking (Overpass limits)
                    </label>
                </div>
                <div class="form-group">
                    <label>Static Image URL path</label>
                    <input type="text" name="image_path" id="edit_image_path">
                </div>
                <div class="form-group">
                    <label>Hover MP4 Video URL path</label>
                    <input type="text" name="video_path" id="edit_video_path">
                </div>
                <div style="margin-top: 1rem; border-top: 1px solid var(--border-color); padding-top: 1rem;">
                    <h3 style="font-size: 0.9rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 0.75rem;">Monthly Operating Expenses (DH)</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-bottom: 1.5rem;">
                        <div class="form-group">
                            <label>Loan/Lease Fee</label>
                            <input type="number" name="loan_cost" id="edit_loan_cost" min="0">
                        </div>
                        <div class="form-group">
                            <label>Insurance Fee</label>
                            <input type="number" name="insurance_cost" id="edit_insurance_cost" min="0">
                        </div>
                        <div class="form-group">
                            <label>Service/Maintenance</label>
                            <input type="number" name="maintenance_cost" id="edit_maintenance_cost" min="0">
                        </div>
                        <div class="form-group">
                            <label>Fuel Cost</label>
                            <input type="number" name="fuel_cost" id="edit_fuel_cost" min="0">
                        </div>
                        <div class="form-group" style="grid-column: span 2;">
                            <label>Other Fees (Taxes, cleaning...)</label>
                            <input type="number" name="other_cost" id="edit_other_cost" min="0">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-submit">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- Add Manual Booking Modal -->
    <div id="manualBookingModal" class="modal">
        <div class="modal-content">
            <button onclick="closeManualBookingModal()" class="modal-close">&times;</button>
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-dark); font-family: 'Outfit', sans-serif;">Add Manual Booking</h2>
            <form action="/{{ $locale }}/admin/bookings/manual" method="POST">
                @csrf
                <div class="form-group">
                    <label>Select Car Model</label>
                    <select name="car_id" required>
                        @foreach($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }} (Rate: {{ $car->base_price }} DH/day)</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="text" name="customer_name" required placeholder="e.g. John Doe">
                </div>
                <div class="form-group">
                    <label>Customer Email (Optional)</label>
                    <input type="email" name="customer_email" placeholder="e.g. john@example.com">
                </div>
                <div class="form-group">
                    <label>Customer Phone (WhatsApp preferred)</label>
                    <input type="tel" name="customer_phone" required placeholder="e.g. +2126000988632">
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Pickup Location</label>
                        <input type="text" name="pickup_location" value="Marrakech Airport (RAK)" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Return Location</label>
                        <input type="text" name="return_location" value="Marrakech Airport (RAK)" required>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Pickup Date & Time</label>
                        <input type="datetime-local" name="pickup_datetime" required>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Return Date & Time</label>
                        <input type="datetime-local" name="return_datetime" required>
                    </div>
                </div>
                <div style="display: flex; gap: 1rem;">
                    <div class="form-group" style="flex: 1;">
                        <label>Total Price (DH)</label>
                        <input type="number" name="total_price" required placeholder="e.g. 1500">
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>Source</label>
                        <select name="source">
                            <option value="website">Website</option>
                            <option value="whatsapp" selected>WhatsApp</option>
                            <option value="ota">OTA (Agency)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Booking Status</label>
                    <select name="status">
                        <option value="pending">Pending</option>
                        <option value="confirmed" selected>Confirmed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit">Save Booking</button>
            </form>
        </div>
    </div>

    <script>
        const locale = "{{ $locale }}";

        function openEditModal(car) {
            document.getElementById('editCarForm').action = '/' + locale + '/admin/cars/update/' + car.id;
            document.getElementById('edit_brand').value = car.brand;
            document.getElementById('edit_model').value = car.model;
            document.getElementById('edit_category').value = car.category;
            document.getElementById('edit_seats').value = car.seats;
            document.getElementById('edit_transmission').value = car.transmission;
            document.getElementById('edit_quantity').value = car.quantity;
            document.getElementById('edit_base_price').value = car.base_price;
            document.getElementById('edit_image_path').value = car.image_path || '';
            document.getElementById('edit_video_path').value = car.video_path || '';
            
            // Checkboxes
            document.getElementById('edit_ac').checked = car.ac == 1;
            document.getElementById('edit_allow_overbooking').checked = car.allow_overbooking == 1;

            // Expenses
            document.getElementById('edit_loan_cost').value = car.loan_cost || 0;
            document.getElementById('edit_insurance_cost').value = car.insurance_cost || 0;
            document.getElementById('edit_maintenance_cost').value = car.maintenance_cost || 0;
            document.getElementById('edit_fuel_cost').value = car.fuel_cost || 0;
            document.getElementById('edit_other_cost').value = car.other_cost || 0;

            document.getElementById('editCarModal').style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('editCarModal').style.display = 'none';
        }

        function openManualBookingModal() {
            document.getElementById('manualBookingModal').style.display = 'flex';
        }

        function closeManualBookingModal() {
            document.getElementById('manualBookingModal').style.display = 'none';
        }
        
        // Close modals on background click
        window.onclick = function(event) {
            const editModal = document.getElementById('editCarModal');
            const manualModal = document.getElementById('manualBookingModal');
            if (event.target == editModal) {
                closeEditModal();
            }
            if (event.target == manualModal) {
                closeManualBookingModal();
            }
        }
    </script>

</body>
</html>
